<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_home.php
* Brief:       
*      Part of theme control panel.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/

/*********************************************************** 
* Definitions
************************************************************/

/*********************************************************** 
* Class name:
*    CPHome
* Descripton:
*    Implementation of CPHome 
***********************************************************/
class CPHome extends DCC_CPBaseClass
{
    const DBIDOPT_HOMEPAGE_OPT = 'PRESTIGE_HOMEPAGE_OPT';  // data base id options      
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // temp
        $this->_home = get_option(CPHome::DBIDOPT_HOMEPAGE_OPT);
        if (!is_array($this->_home))
        {
            add_option(CPHome::DBIDOPT_HOMEPAGE_OPT, $this->_homeDef);
            $this->_home = get_option(CPHome::DBIDOPT_HOMEPAGE_OPT);
        }           

    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_home;
     private $_homeDef = Array(
        'home_show_extra_content' => false,
        'home_extra_content' => '', 
        'home_show_slider_extra_content' => false,
        'home_slider_extra_content' => '', 
        'home_slogan' => 'Type here homepage slogan text',
        'home_slogan_show' => true,
        'home_slogan_author' => 'Slogan author',
        'home_slogan_color' => '444444',
        'home_slogan_author_color' => '333333',
        'home_slogan_author_show' => true,
        'home_sidebar' => true,
        'home_page' => CMS_NOT_SELECTED,         
     );
     private $_saved = false;
   
    /*********************************************************** 
    * Public functions
    ************************************************************/               
 
     public function renderTab()
     {
         echo '<div class="cms-content-wrapper">'; 
         $this->process();
         $this->renderCMS();
         echo '</div>';
     }
 
    public function renderExtraContent()
    {
        if($this->_home['home_show_extra_content'])  
        {
            $out = '';
            $out .= '<div class="page-extra-920">';
            $out .= apply_filters('the_content', stripcslashes($this->_home['home_extra_content'])); 
            $out .= '<div class="clear-both"></div></div>';
            
            echo $out;
        }  
    }

    public function renderSliderExtraContent()
    {
        if($this->_home['home_show_slider_extra_content'])  
        {
            $out = '';                     
            $out .= '<div class="page-extra-slider-920">';
            $out .= apply_filters('the_content', stripcslashes($this->_home['home_slider_extra_content'])); 
            $out .= '<div class="clear-both"></div></div>';
            
            echo $out;
        }  
    }
    
    public function getHomepageID()
    {
        return $this->_home['home_page']; 
    }   
 
    public function showHomepageSidebar()
    {
        return $this->_home['home_sidebar']; 
    } 
    
    public function renderHomepageSlogan()
    {
        $out = '';
        if($this->_home['home_slogan_show'])
        {
            $out .= '<div id="homepage-slogan">';
            $out .= '<span class="text" style="color:#'.$this->_home['home_slogan_color'].';">'.stripcslashes($this->_home['home_slogan']).'</span><br />';
            if($this->_home['home_slogan_author_show']) 
            {                                 
                $out .= '<span class="author" style="color:#'.$this->_home['home_slogan_author_color'].';">'.stripcslashes($this->_home['home_slogan_author']).'</span>';                
            }
            $out .= '</div>';   
        } else
        {
           $out .= '<div id="homepage-slogan-empty"></div>'; 
        }
        echo $out;
    }    
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['home_save_settings']))
        {
            $this->_home['home_slogan'] = $_POST['home_slogan'];
            $this->_home['home_slogan_show'] = isset($_POST['home_slogan_show']) ? true : false;
            $this->_home['home_slogan_author'] = $_POST['home_slogan_author'];
            $this->_home['home_slogan_author_show'] = isset($_POST['home_slogan_author_show']) ? true : false; 
            $this->_home['home_sidebar'] = isset($_POST['home_sidebar']) ? true : false;
            $this->_home['home_page'] = $_POST['home_page'];
            
            $this->_home['home_slogan_color'] = $_POST['home_slogan_color']; 
            $this->_home['home_slogan_author_color'] = $_POST['home_slogan_author_color']; 
             
                         
            update_option(CPHome::DBIDOPT_HOMEPAGE_OPT, $this->_home);
            $this->_saved = true;
        }   
        
        if(isset($_POST['home_save_extra_content']))
        {       
            $this->_home['home_extra_content'] = $_POST['home_extra_content'];
            $this->_home['home_show_extra_content'] = isset($_POST['home_show_extra_content']) ? true : false;
              
            update_option(CPHome::DBIDOPT_HOMEPAGE_OPT, $this->_home);
            $this->_saved = true;   
        }
        
        if(isset($_POST['home_save_slider_extra_content']))
        {       
            $this->_home['home_slider_extra_content'] = $_POST['home_slider_extra_content'];
            $this->_home['home_show_slider_extra_content'] = isset($_POST['home_show_slider_extra_content']) ? true : false;
              
            update_option(CPHome::DBIDOPT_HOMEPAGE_OPT, $this->_home);
            $this->_saved = true;   
        }                           
    }

    private function renderCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        }  
        
         // Homepage slogan
         $out = '';                 
         $out .= '<div>';         
         $out .= '<h6 class="cms-h6">Homepage settings</h6><hr class="cms-hr"/>';
         $out .= '<form action="#" method="post" >';                                                                                         
         $out .= '<span class="cms-span-10">Homepage slogan text:</span><br /><textarea style="font-size:11px;padding:8px;color:#444444;width:500px;max-width:500px;height:50px;" name="home_slogan">'.stripcslashes($this->_home['home_slogan']).'</textarea><br />';
         $out .= '<input type="checkbox" style="margin-bottom:5px;" '.$this->attrChecked($this->_home['home_slogan_show']).' name="home_slogan_show" /> Show slogan<br />';

         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_home['home_slogan_color'].'" name="home_slogan_color" /> Slogan color <br /><br />'; 
         
         $out .= '<span class="cms-span-10">Homepage slogan author description:</span><br /><textarea style="font-size:11px;padding:8px;color:#444444;width:500px;max-width:500px;height:50px;" name="home_slogan_author">'.stripcslashes($this->_home['home_slogan_author']).'</textarea><br />';
         $out .= '<input type="checkbox" '.$this->attrChecked($this->_home['home_slogan_author_show']).' name="home_slogan_author_show" /> Show author<br />';
         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_home['home_slogan_author_color'].'" name="home_slogan_author_color" /> Slogan author color <br /><br />'; 
         $out .= '<div style="height:20px;"></div>';  
          
         $out .= '<span class="cms-span-10">Select page displayed as homepage:</span><br />';
         $out .= $this->selectCtrlPagesList($this->_home['home_page'], 'home_page', 240);
         $out .= '<br /><br /><input type="checkbox" '.$this->attrChecked($this->_home['home_sidebar']).' name="home_sidebar" /> Display homepage sidebar';
          
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="home_save_settings" /><br />';
         $out .= '</form></div>';  
         
         echo $out;         

         // Homepage slider extra content
         $out = '';
         $out .= '<a name="homepage_slider_extra_content"></a>';         
         $out .= '<div style="margin-top:50px;">'; 
         $out .= '<h6 class="cms-h6">Homepage slider extra content</h6><hr class="cms-hr"/>';
         $out .= '<form action="#homepage_slider_extra_content" method="post" >';
               
         $out .= '<span class="cms-span-10">Homepage slider extra full width content:</span><br /><textarea style="font-size:11px;padding:8px;color:#444444;width:800px;max-width:800px;height:350px;" name="home_slider_extra_content">'.stripcslashes($this->_home['home_slider_extra_content']).'</textarea><br />';          
         $out .= '<input type="checkbox" '.$this->attrChecked($this->_home['home_show_slider_extra_content']).' name="home_show_slider_extra_content" /> Show homepage slider extra content';
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="home_save_slider_extra_content" />';         
         $out .= '</form></div>';
         
         echo $out;
        
         // Homepage extra content
         $out = '';
         $out .= '<a name="homepage_extra_content"></a>';         
         $out .= '<div style="margin-top:50px;">'; 
         $out .= '<h6 class="cms-h6">Homepage extra content</h6><hr class="cms-hr"/>';
         $out .= '<form action="#homepage_extra_content" method="post" >';
               
         $out .= '<span class="cms-span-10">Homepage extra full width content:</span><br /><textarea style="font-size:11px;padding:8px;color:#444444;width:800px;max-width:800px;height:650px;" name="home_extra_content">'.stripcslashes($this->_home['home_extra_content']).'</textarea><br />';          
         $out .= '<input type="checkbox" '.$this->attrChecked($this->_home['home_show_extra_content']).' name="home_show_extra_content" /> Show homepage extra content';
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="home_save_extra_content" />';         
         $out .= '</form></div>';
         
         echo $out;
         
         
                        
    }
    

            
} // class CPHome
        
        
?>