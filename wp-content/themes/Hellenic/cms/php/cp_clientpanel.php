<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_clientpanel.php
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
*    CPClientPanel
* Descripton:
*    Implementation of CPClientPanel 
***********************************************************/
class CPClientPanel 
{   

    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        if(isset($_COOKIE['dc_theme_skin']))
        {
            $this->_settings['set'] = true;
            $this->_settings['theme_skin'] = $_COOKIE['dc_theme_skin'];
            $this->_settings['main_slider_mode'] = $_COOKIE['dc_main_slider_mode'];
            $this->_settings['cufon_font'] = $_COOKIE['dc_cufon_font'];
            $this->_settings['slider_type'] = $_COOKIE['dc_slider_type'];
            $this->_settings['header_icons_set'] = $_COOKIE['dc_header_icons_set']; 
            $this->_settings['main_color'] = $_COOKIE['dc_main_color'];
            $this->_settings['main_hover_color'] = $_COOKIE['dc_main_hover_color']; 
        }
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    public $_settings = Array(
      'set' => false,
      'theme_skin' => '',
      'main_slider_mode' => 0,
      'cufon_font' => '',
      'slider_type' => 1,
      'header_icons_set' => '',
      'main_color' => 'FFA319',
      'main_hover_color' => 'FFC602' 
    );
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
  
    /*********************************************************** 
    * Public functions
    ************************************************************/               
 
    public function getThemeSkin()
    {
        $skin = null;
        if($this->_settings['set'])
        {
            $skin = $this->_settings['theme_skin'];    
        }        
        return $skin;
    }
    
    public function getSliderMode()
    {
        $mode = null;
        if($this->_settings['set'])
        {
            $mode = $this->_settings['main_slider_mode'];    
        }        
        return $mode;
    }  
    
    public function getHeaderIconsSet()
    {
        $set = null;
        if($this->_settings['set'])
        {
            $set = $this->_settings['header_icons_set'];    
        }        
        return $set;
    }       
    
    public function getMainColor()
    {
        $color = null;
        if($this->_settings['set'])
        {
            $color = $this->_settings['main_color'];    
        }        
        return $color;
    }  
    
    public function getMainHoverColor()
    {
        $color = null;
        if($this->_settings['set'])
        {
            $color = $this->_settings['main_hover_color'];    
        }        
        return $color;
    }            
    
    public function getSliderType()
    {
        $slider = null;
        if($this->_settings['set'])
        {
            $slider = $this->_settings['slider_type'];    
        }        
        return $slider;
    }       

    public function getCufonFont()
    {
        $mode = null;
        if($this->_settings['set'])
        {
            $mode = $this->_settings['cufon_font'];    
        }        
        return $mode;
    }  
 
    public function process()
    {
        if(isset($_POST['apply_client_panel']))
        {
            $this->_settings['set'] = true;
            
            $this->_settings['theme_skin'] = $_POST['dc_theme_skin'];
            setcookie('dc_theme_skin', $_POST['dc_theme_skin'], 0, '/'); 
            
            $this->_settings['main_slider_mode'] = $_POST['dc_main_slider_mode'];
            setcookie('dc_main_slider_mode', $_POST['dc_main_slider_mode'], 0, '/');
            
            $this->_settings['cufon_font'] = $_POST['dc_cufon_font'];
            setcookie('dc_cufon_font', $_POST['dc_cufon_font'], 0, '/'); 
           
            $this->_settings['slider_type'] = $_POST['dc_slider_type'];
            setcookie('dc_slider_type', $_POST['dc_slider_type'], 0, '/');   
            
            $this->_settings['header_icons_set'] = $_POST['dc_header_icons_set'];
            setcookie('dc_header_icons_set', $_POST['dc_header_icons_set'], 0, '/');  
            
            $this->_settings['main_color'] = $_POST['dc_main_color'];
            setcookie('dc_main_color', $_POST['dc_main_color'], 0, '/');  
            
            $this->_settings['main_hover_color'] = $_POST['dc_main_hover_color'];
            setcookie('dc_main_hover_color', $_POST['dc_main_hover_color'], 0, '/');                                                                   
        }   
    }

    public function renderPanel()
    {
         $p = GetDCCPInterface();
         $skin = $p->getIGeneral()->getThemeSkin();
         if($this->_settings['set'])
         {
             $skin = $this->_settings['theme_skin'];
         }
         $skins = Array();
        
         $skinsspath = TEMPLATEPATH.'/skins';
         $dirhandle = null;
         $skindir = null;
               
         if(is_dir($skinsspath)) 
         {      
             $dirs_list = scandir($skinsspath);
             //if($dirhandle = opendir($skinsspath)) 
            {   
                //while(($skindir = readdir($dirhandle)) !== false) 
                foreach($dirs_list as $skindir)
                {             
                    if($skindir != '.' and $skindir != '..' and is_dir($skinsspath.'/'.$skindir)) 
                    {
                        array_push($skins, $skindir);
                    }    
                }
                //closedir($dirhandle);      
            }     
         }        
        
         $out = '';
         
         $out .= '<div id="client-panel-open-btn"></div>'; 
         $out .= '<div id="client-panel">';
         
           $out .= '<div class="close-btn"></div>';
         
            $out .= '<form action="#" method="post">';
            
            // theme skin
            $out .= '<strong>Theme skin:</strong> (Here you can choose from 150 site skins)';            
            $out .= '<select name="dc_theme_skin">';
                foreach($skins as $key => $value)
                {
                    $out .= '<option ';
                    $out .= ' value="'.$value.'" ';
                    if($skin == $value)
                    {
                        $out .= ' selected="selected" ';
                    }
                    $out .= ' >'.$value;
                    $out .= '</option>';
                }
            $out .= '</select>';
            
             // header icon set
             $icons_set = $p->getIGeneral()->getHeaderIconsSet();
             if($this->_settings['set'])
             {
                 $icons_set = $this->_settings['header_icons_set'];
             }               
             
             $iconsspath = TEMPLATEPATH.'/img/icons/header';
             $dirhandle = null;
             $icondir = null;
             
             $out .= '<strong>Header icons set:</strong> (Here you can choose icons displayed at the top)'; 
             $out .= '<select name="dc_header_icons_set">';         
             if(is_dir($iconsspath)) 
             {      
                if($dirhandle = opendir($iconsspath)) 
                {   
                    while(($icondir = readdir($dirhandle)) !== false) 
                    {   
                        if($icondir != '.' and $icondir != '..' and is_dir($iconsspath.'/'.$icondir)) 
                        {
                            $out .= '<option value="'.$icondir.'" ';
                            $out .= $icons_set == $icondir ? ' selected="selected" ' : '';
                            $out .= '>';
                            $out .= $icondir.'</option>';
                        }    
                    }
                    closedir($dirhandle);      
                }     
             }
             $out .= '</select>';            
            
            // slider type
            $slider = $p->getIGeneral()->getSliderType();
            $slider_types = $p->getIGeneral()->getSlidersArray();
            
            $out .= '<strong>Homepage slider type:</strong> (Here you can choose one of 4 sliders)';
            $out .= '<select name="dc_slider_type">';
                foreach($slider_types as $key => $value)
                {
                    $out .= '<option ';
                    $out .= ' value="'.$value.'" ';
                    if($slider == $value)
                    {
                        $out .= ' selected="selected" ';
                    }
                    $out .= ' >'.$value;
                    $out .= '</option>';
                }            
            $out .= '</select>';              
            
            // main slider mode
         $mode = $p->getIPrestigeSlider()->getSliderMode();
         if($this->_settings['set'])
         {
             $mode = $this->_settings['main_slider_mode'];
         }         
         $slider_modes = Array(
            CPPrestigeSlider::SLIDER_MODE_FADE => 'Fade effect',
            CPPrestigeSlider::SLIDER_MODE_MOVE => 'Move effect',
            CPPrestigeSlider::SLIDER_MODE_STRIP => 'Strip effect',
            CPPrestigeSlider::SLIDER_MODE_MIX => 'Fade &amp; Strip Mix');            
            
            $out .= '<strong>Homepage slider mode:</strong> (Here you can change transition effect. Option works only for Prestige slider. Other sliders have this setting too in CMS)';
            $out .= '<select name="dc_main_slider_mode">';
                foreach($slider_modes as $key => $value)
                {
                    $out .= '<option ';
                    $out .= ' value="'.$key.'" ';
                    if($mode == $key)
                    {
                        $out .= ' selected="selected" ';
                    }
                    $out .= ' >'.$value;
                    $out .= '</option>';
                }            
            $out .= '</select>';
            
            // cufon font
            $font = $p->getIGeneral()->getCufonFontFile();
            if($this->_settings['set'])
            {
                $font = $this->_settings['cufon_font'];
            }             
            
            $out .= '<strong>Cufon font:</strong> (Here you can choose font)';
            
             $fontspath = TEMPLATEPATH.'/fonts';
             $dirhandle = null;
             $fontfile = null;
             
             $out .= '<select name="dc_cufon_font">';         
             if(is_dir($fontspath)) 
             {
                if($dirhandle = opendir($fontspath)) 
                {
                    while(($fontfile = readdir($dirhandle)) !== false) 
                    {
                        if($fontfile != '.' and $fontfile != '..' and is_file($fontspath.'/'.$fontfile)) 
                        {
                            $out .= '<option value="'.$fontfile.'" ';
                            $out .= $font == $fontfile ? ' selected="selected" ' : '';
                            $out .= '>';
                            $out .= $fontfile.'</option>';
                        }    
                    }
                    closedir($dirhandle);      
                }     
             }
             $out .= '</select>'; 
             
             // main color, and main hover color
             $main_color = $p->getIGeneral()->getThemeMainColor();
             $main_hover_color = $p->getIGeneral()->getThemeMainHoverColor();
            if($this->_settings['set'])
            {
                 $main_color = $this->_settings['main_color'];
                 $main_hover_color = $this->_settings['main_hover_color'];
            }               
             
             $out .= '<strong>Main colors:</strong> (Here you can change main color and main hover color. In CMS you can easy change also colors for main menu and for homepage slogan)<br />';  
             $out .= '<input style="width:70px;text-align:center;margin-top:8px;" type="text" class="colorpicker {hash:true}" value="'.$main_color.'" name="dc_main_color" /> Main color<br />';             
             $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$main_hover_color.'" name="dc_main_hover_color" /> Main hover color';
            
            $out .= '<hr /><input type="submit" class="submit-btn" value="Apply Changes" name="apply_client_panel" />';
            $out .= '</form>';            
            
         $out .= '</div>'; 
         echo $out;               
    }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    

            
} // class
        
        
?>