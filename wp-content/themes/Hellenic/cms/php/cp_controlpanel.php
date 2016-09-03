<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      cp_controlpanel.php
* Brief:       
*      Core PHP code for wordpress admin panel
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/
   
/*********************************************************** 
* Class name:
*    CPrestigeControlPanel
* Descripton:   
***********************************************************/
class CPrestigeControlPanel 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {           
        load_theme_textdomain(CMS_TXT_DOMAIN, get_template_directory().'/languages');
                                        
        // call only if admin page is displayed
        if(is_admin())
        {                      
            // check and create theme temp directory
            if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH))
            {
               mkdir(CMS_THEME_TEMP_FOLDER_PATH);
            }              
            
            add_action('admin_print_scripts', array(&$this, 'loadAdminScripts'));
            add_action('admin_print_styles', array(&$this, 'loadAdminStyles'));               
            add_action('admin_menu', array(&$this, 'adminMenu'));
            add_action('admin_head', array(&$this, 'adminHead'));         
            
            $this->getIMeta();                                       
        } else
        {            
            $this->add_actions();
            add_action('wp_print_scripts', array(&$this, 'loadScripts'));
            
            $this->_theme_main_color = $this->getIGeneral()->getThemeMainColor();
            $this->_theme_main_hover_color = $this->getIGeneral()->getThemeMainHoverColor();
            
            if($this->getIGeneral()->showClientPanel()) 
            {
                $this->getIClientPanel()->process();
                $main_color = $this->getIClientPanel()->getMainColor();
                $main_hover_color = $this->getIClientPanel()->getMainHoverColor(); 
                
                if($main_color !== null) { $this->_theme_main_color = $main_color; }
                if($main_hover_color !== null) { $this->_theme_main_hover_color = $main_hover_color; }
            }
            
             
            $this->getIShortCodes();
            
        }     
        $this->registerWordPressCustomMenus();       
        $this->getICustomPosts();
        $this->getIGeneral()->registerSidebars();                          
    } // constructor

    /*********************************************************** 
    * Public members
    ************************************************************/     
    public $_theme_main_color = '#FFFFFF';
    public $_theme_main_hover_color = '#FFFFFF';
    
    public $_general = null;
    public $_home = null; 
    public $_menu = null;
    public $_prestigeslider = null;
    public $_progressslider = null;
    public $_chainslider = null;
    public $_accordion = null;
    public $_clientpanel = null;
    public $_meta = null;
    public $_shortcodes = null;
    public $_customposts = null;
    public $_help = null;
    public $_videoslider = null; 
    
    /*********************************************************** 
    * Private members
    ************************************************************/ 
    
    private $_navigaton = Array(
        'General' => 'dc-theme-opt',
        'Menu' => 'dc-theme-opt-menu',
        'Home' => 'dc-theme-opt-home',
        'Prestige slider' => 'dc-theme-opt-prestige-slider',
        'Accordion slider' => 'dc-theme-opt-accordion-slider',
        'Progress slider' => 'dc-theme-opt-progress-slider',
        'Chain slider' => 'dc-theme-opt-chain-slider',
        'Video slider' => 'dc-theme-opt-video-slider',
        'Shortcode help' => 'dc-theme-opt-shortcode-help' 
    );    
    
    /*********************************************************** 
    * Public functions
    ************************************************************/      
    public function add_actions()
    {
        add_action('init', array(&$this, 'add_filters'), 0);    
    }
    
    
    function add_filters() {

        add_filter( 'option_posts_per_page', array(&$this, 'option_posts_per_page'));
    }

    function option_posts_per_page($value) 
    {
        if(is_tax('project_cat'))
        {
            $mode = GetDCCPInterface()->getIGeneral()->projectCatMode();
            $rows = GetDCCPInterface()->getIGeneral()->projectCatRows();
            
            if(CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR == $mode)
            {
                $value = $rows*4;    
            } else
            if(CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE == $mode)
            {
                $value = $rows;    
            } else
            if(CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE == $mode)
            {
                $value = $rows*3;    
            } else
            if(CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO == $mode)
            {
                $value = $rows*2;    
            }                                         
        }                        
        return $value;
    }         
     
    public function & getIGeneral()
    {                                 
        if($this->_general === null){ $this->_general = new CPGeneral(); }
        return $this->_general;
    } // getIGeneral
    
    public function & getIVideoSlider()
    {                                 
        if($this->_videoslider === null){ $this->_videoslider = new CPVideoSlider(); }
        return $this->_videoslider;
    } // getIVideoSlider    
    
    public function & getIHome()
    {                                 
        if($this->_home === null){ $this->_home = new CPHome(); }
        return $this->_home;
    } // getIHome    

    public function & getIHelp()
    {                                 
        if($this->_help === null){ $this->_help = new CPHelp(); }
        return $this->_help;
    } // getIHelp   
    
    public function & getIShortCodes()
    {   
       //                               
        if($this->_shortcodes === null){ $this->_shortcodes = new CPThemeShortCodes($this->_theme_main_color, $this->_theme_main_hover_color); }
        return $this->_shortcodes;
    } // getIShortCodes    
    
    public function & getICustomPosts()
    {                                 
        if($this->_customposts === null){ $this->_customposts = new CPThemeCustomPosts(); }
        return $this->_customposts;
    } // getICustomPosts     
  
    public function & getIMenu()
    {                                 
        if($this->_menu === null){ $this->_menu = new CPMenu(); }
        return $this->_menu;
    } // getIMenu    
    
    public function & getIPrestigeSlider()
    {                                 
        if($this->_prestigeslider === null){ $this->_prestigeslider = new CPPrestigeSlider(); }
        return $this->_prestigeslider;
    } // getIPrestigeSlider          
    
    public function & getIAccordionSlider()
    {                                 
        if($this->_accordion === null){ $this->_accordion = new CPAccordionSlider(); }
        return $this->_accordion;
    } // getIAccordionSlider     
    
    public function & getIProgressSlider()
    {                                 
        if($this->_progressslider === null){ $this->_progressslider = new CPProgressSlider(); }
        return $this->_progressslider;
    } // getIProgressSlider      

    public function & getIChainSlider()
    {                                 
        if($this->_chainslider === null){ $this->_chainslider = new CPChainSlider(); }
        return $this->_chainslider;
    } // getIChainSlider       
    
    public function & getIClientPanel()
    {                                 
        if($this->_clientpanel === null){ $this->_clientpanel = new CPClientPanel(); }
        return $this->_clientpanel;
    } // getIClientPanel      
    
    public function & getIMeta()
    {                                 
        if($this->_meta === null){ $this->_meta = new CPMetaDataCreator(); }
        return $this->_meta;
    } // getIMeta  
             
    public function adminMenu() 
    {
        add_menu_page('Prestige Theme Options', 'Prestige', 10, 'dc-theme-opt', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'General', 10, 'dc-theme-opt', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Menu', 10, 'dc-theme-opt-menu', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Home', 10, 'dc-theme-opt-home', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Prestige slider', 10, 'dc-theme-opt-prestige-slider', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Accordion slider', 10, 'dc-theme-opt-accordion-slider', array(&$this, 'showOptions'));  
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Progress slider', 10, 'dc-theme-opt-progress-slider', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Chain slider', 10, 'dc-theme-opt-chain-slider', array(&$this, 'showOptions')); 
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Video slider', 10, 'dc-theme-opt-video-slider', array(&$this, 'showOptions'));
        add_submenu_page('dc-theme-opt', 'Prestige Theme Options', 'Shortcode help', 10, 'dc-theme-opt-shortcode-help', array(&$this, 'showOptions'));       
    } // adminMenu

    public function adminHead() 
    {        
        // echo '<script type="text/javascript"></script>';           
    } // adminHead
    
    public function printMeta() 
    {        
        echo '<meta name="cms_theme_url" content="'.get_bloginfo('template_url').'" />';
        echo '<meta name="cms_theme_name" content="'.CMS_THEME_NAME.'" />';
        echo '<meta name="cms_lightbox_mode" content="'.$this->getIGeneral()->getLightBoxMode().'" />';        
    } // adminHead    
          
    public function loadAdminScripts() 
    {           
        wp_enqueue_script('jquery'); 
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        
        wp_register_script(CMS_THEME_NAME.'_admin_color_picker', get_bloginfo('template_url').'/cms/lib/js/color/jscolor.js', array('jquery'), ''); 
        wp_register_script(CMS_THEME_NAME.'_admin_js', get_bloginfo('template_url').'/cms/js/cms.js', array('jquery'), '');
		wp_register_script(CMS_THEME_NAME.'_htmleditor', get_bloginfo('template_url').'/cms/js/htmleditor.js', array('quicktags'), '');
		
        wp_enqueue_script(CMS_THEME_NAME.'_admin_color_picker');         
        wp_enqueue_script(CMS_THEME_NAME.'_admin_js');
		wp_enqueue_script(CMS_THEME_NAME.'_htmleditor');  
        
        if(CMS_TURN_OFF_AUTOSAVE)
        {
            wp_deregister_script('autosave');
        }                      
    } // loadAdminScripts

    public function loadAdminStyles() 
    {
        wp_enqueue_style('thickbox');
        wp_enqueue_style(CMS_THEME_NAME.'_admin_css', get_bloginfo('template_url').'/cms/css/cms.css', false); 
    } // loadAdminStyles   
    

    public function loadScripts()
    {
        if (!is_admin())
        {          
            wp_register_script( 'cms_easing', get_bloginfo("template_url").'/lib/js/jquery.easing.1.2.js', array('jquery'), '');
            wp_register_script( 'cms_cufon', get_bloginfo("template_url").'/lib/js/cufon-yui.js', array('jquery'), '');
            $fontfile = GetDCCPInterface()->getIGeneral()->getCufonFontFile();
            wp_register_script( 'cms_cufon_font', get_bloginfo("template_url").'/fonts/'.$fontfile, false, '');                 
            wp_register_script( 'cms_admin_color_picker', get_bloginfo('template_url').'/cms/lib/js/color/jscolor.js', array('jquery'), '');
            
            wp_register_script( 'cms_flowplayer', get_bloginfo("template_url").'/lib/js/flowplayer-3.2.4.min.js', array('jquery'), '');
            wp_register_script( 'cms_hoverintent', get_bloginfo("template_url").'/lib/js/jquery.hoverIntent.js', array('jquery'), ''); 
            wp_register_script( 'cms_pphoto', get_bloginfo("template_url").'/lib/js/jquery.prettyPhoto.js', array('jquery'), '');
             
            
            wp_register_script( 'cms_sh_core', get_bloginfo("template_url").'/js/sh/shCore.js', array('jquery'), '');
            wp_register_script( 'cms_sh_plain', get_bloginfo("template_url").'/js/sh/shBrushPlain.js', array('jquery'), '');                   
            //wp_register_script( 'cms_sh_php', get_bloginfo("template_url").'/js/sh/shBrushPhp.js', array('jquery'), '');
            //wp_register_script( 'cms_sh_cpp', get_bloginfo("template_url").'/js/sh/shBrushCpp.js', array('jquery'), ''); 
            //wp_register_script( 'cms_sh_sql', get_bloginfo("template_url").'/js/sh/shBrushSql.js', array('jquery'), '');
            wp_register_script( 'cms_sh_css', get_bloginfo("template_url").'/js/sh/shBrushCss.js', array('jquery'), ''); 
            //wp_register_script( 'cms_sh_jscript', get_bloginfo("template_url").'/js/sh/shBrushJScript.js', array('jquery'), ''); 
            //wp_register_script( 'cms_sh_delphi', get_bloginfo("template_url").'/js/sh/shBrushDelphi.js', array('jquery'), '');
            //wp_register_script( 'cms_sh_csharp', get_bloginfo("template_url").'/js/sh/shBrushCsharp.js', array('jquery'), '');
            
            
            wp_register_script( 'cms_home_slider_pres', get_bloginfo("template_url").'/js/slider_prestige.js', array('jquery'), ''); 
            wp_register_script( 'cms_home_slider_acco', get_bloginfo("template_url").'/js/slider_accordion.js', array('jquery'), '');
            wp_register_script( 'cms_home_slider_prog', get_bloginfo("template_url").'/js/slider_progress.js', array('jquery'), ''); 
            wp_register_script( 'cms_home_slider_vid', get_bloginfo("template_url").'/js/slider_video.js', array('jquery'), ''); 
            
            
            
            wp_register_script( 'cms_tipsy', get_bloginfo("template_url").'/lib/js/jquery.tipsy.js', array('jquery'), ''); 
            wp_register_script( 'cms_common', get_bloginfo("template_url").'/js/common.js', array('jquery'), '');
            

            wp_enqueue_script('jquery');
            
            wp_enqueue_script('cms_sh_core');
            wp_enqueue_script('cms_sh_plain');            
            //wp_enqueue_script('cms_sh_php'); 
            //wp_enqueue_script('cms_sh_cpp');
            //wp_enqueue_script('cms_sh_sql'); 
            wp_enqueue_script('cms_sh_css');
            //wp_enqueue_script('cms_sh_jscript');
            //wp_enqueue_script('cms_sh_csharp'); 
            //wp_enqueue_script('cms_sh_delphi');
            
            wp_enqueue_script('cms_easing');
            wp_enqueue_script('cms_cufon');
            wp_enqueue_script('cms_cufon_font');
            wp_enqueue_script('cms_admin_color_picker');
            wp_enqueue_script('cms_flowplayer'); 
            wp_enqueue_script('cms_hoverintent');
            wp_enqueue_script('cms_pphoto');
            
            wp_enqueue_script('cms_home_slider_pres');
            wp_enqueue_script('cms_home_slider_acco');
            wp_enqueue_script('cms_home_slider_prog'); 
            wp_enqueue_script('cms_home_slider_vid'); 
            wp_enqueue_script('cms_tipsy');
            wp_enqueue_script('cms_common');
                       
        }          
    }    
    
    public function showOptions()
    {
        switch($_GET['page'])
        {
            case 'dc-theme-opt':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - General Options</h2>';             
                $this->renderNavigation('General');
                $this->getIGeneral()->renderTab();
                echo '</div>';             
            break;
            
            case 'dc-theme-opt-home':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Home Options</h2>';    
                $this->renderNavigation('Home');
                $this->getIHome()->renderTab();                            
                echo '</div>';            
            break;
            
            case 'dc-theme-opt-prestige-slider':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Prestige Slider Options</h2>';    
                $this->renderNavigation('Prestige slider');
                $this->getIPrestigeSlider()->renderTab();                            
                echo '</div>';            
            break;  
            
            case 'dc-theme-opt-accordion-slider':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Accordion Slider Options</h2>';    
                $this->renderNavigation('Accordion slider');
                $this->getIAccordionSlider()->renderTab();                            
                echo '</div>';            
            break; 
            
            case 'dc-theme-opt-progress-slider':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Progress Slider Options</h2>';    
                $this->renderNavigation('Progress slider');
                $this->getIProgressSlider()->renderTab();                            
                echo '</div>';            
            break;                                    

            case 'dc-theme-opt-chain-slider':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Chain Slider Options</h2>';    
                $this->renderNavigation('Chain slider');
                $this->getIChainSlider()->renderTab();                            
                echo '</div>';            
            break;  
            
            case 'dc-theme-opt-menu':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Menu Options</h2>';            
                $this->renderNavigation('Menu');  
                $this->getIMenu()->renderTab();                                     
                echo '</div>';             
            break;
            
            case 'dc-theme-opt-video-slider':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Video Slider Options</h2>';    
                $this->renderNavigation('Video slider');
                $this->getIVideoSlider()->renderTab();                            
                echo '</div>';            
            break;             
            
            case 'dc-theme-opt-shortcode-help':
                echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>
                <h2>Prestige - Shortcode Help Manual</h2>';            
                $this->renderNavigation('Shortcode help');  
                $this->getIHelp()->renderTab();                                     
                echo '</div>';             
            break;            
        }
    }
    
    /*********************************************************** 
    * Private functions
    ************************************************************/  
    
    private function registerWordPressCustomMenus()
    {
        register_nav_menus(array('dcm_primary' => 'Prestige Primary Navigation'));         
    }
    
    private function renderNavigation($selected=null)
    {
        $out = '';
         $out .= '    
        <div id="cms-tabs">
            <ul>';
            foreach($this->_navigaton as $key => $value)
            {
                $out .= '<li ';
                if($selected !== null)
                {
                    if($selected == $key)
                    {
                       $out .= ' class="cms-tabs-selected" '; 
                    }
                } 
                $out .= ' ><a href="'.admin_url().'admin.php?page='.$value.'">'.$key.'</a></li>';  
            }
            $out .= '</ul>
            <div style="clear:both;margin-bottom:0px;height:15px;"></div><hr class="cms-hr"/></div>';
            
          echo $out;           
    }        
    
} // class
 
?>
