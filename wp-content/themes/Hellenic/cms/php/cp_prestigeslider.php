<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_prestigeslider.php
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
*    CPPrestigeSliderSlide
* Descripton:
*    Implementation of CPPrestigeSliderSlide 
***********************************************************/
class CPPrestigeSliderSlide
{  
    const LINK_MANUALLY = 1;
    const LINK_PAGE = 2;     
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_image = '';
        $this->_title = 'Type here some text';
        $this->_text = 'Here you can write slide description';
        $this->_link = '';
        $this->_linkuse = false;
        $this->_hide = false;
        $this->_thumb = '';
        $this->_thumbblack = '';
        $this->_author = '';
        $this->_pagelink = CMS_NOT_SELECTED;
        $this->_typelink = CPPrestigeSliderSlide::LINK_PAGE;
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/     
    
    public $_title;
    public $_text;
    public $_link;
    public $_pagelink;
    public $_typelink; 
    public $_linkuse;
    public $_image; // image url
    public $_hide;
    public $_thumb;
    public $_thumbblack;
    public $_author;
       
} // class

/*********************************************************** 
* Class name:
*    CPMainSlider
* Descripton:
*    Implementation of CPMainSlider 
***********************************************************/
class CPPrestigeSlider extends DCC_CPBaseClass
{
    const DBIDOPT_SLIDER_OPT = 'PRESTIGE_PRESTIGE_SLIDER_OPT';  // data base id options 
    const DBIDOPT_SLIDER_SLIDES_OPT = 'PRESTIGE_PRESTIGE_SLIDES_OPT';  // data base id options 
    
    const SLIDER_MODE_FADE = 1;
    const SLIDER_MODE_MOVE = 2;
    const SLIDER_MODE_STRIP = 3;
    const SLIDER_MODE_MIX = 4; 
    
    const THUMBS_FOLDER = '/prestige_slider'; 
    const THUMB_WIDTH = 40;
    const THUMB_HEIGHT = 26;
    const THUMB_QUALITY = 100;   
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // slides
        $this->_slides = get_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT);
        if (!is_array($this->_slides))
        {
            add_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, Array());
            $this->_slides = get_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT);
        } 

        // slider options
        $this->_slider = get_option(CPPrestigeSlider::DBIDOPT_SLIDER_OPT);
        if (!is_array($this->_slider))
        {
            add_option(CPPrestigeSlider::DBIDOPT_SLIDER_OPT, $this->_sliderDef);
            $this->_slider = get_option(CPPrestigeSlider::DBIDOPT_SLIDER_OPT);
        }           
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_slides = Array();
     private $_sliderDef = Array(
        'mode' => CPPrestigeSlider::SLIDER_MODE_FADE,
        'autoplay_time' => 5000,
        'autoplay' => true    
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
     
     public function getSliderMode()
     {
         return $this->_slider['mode'];
     }
     
     public function javaScript()
     {
          $out = '';
          $out .= '<script type="text/javascript">';
            
            $mode = $this->_slider['mode'];
            if(GetDCCPInterface()->getIGeneral()->showClientPanel())
            {
                if(GetDCCPInterface()->getIClientPanel()->getSliderMode() !== null)
                {
                   $mode = GetDCCPInterface()->getIClientPanel()->getSliderMode();
                }
            }            
            
            switch($mode)
            {
                case CPPrestigeSlider::SLIDER_MODE_FADE: $out .= 'homeImageSlider.mode = homeImageSlider.TMODE_FADE;'; break;
                case CPPrestigeSlider::SLIDER_MODE_MOVE: $out .= 'homeImageSlider.mode = homeImageSlider.TMODE_MOVE;'; break;
                case CPPrestigeSlider::SLIDER_MODE_STRIP: $out .= 'homeImageSlider.mode = homeImageSlider.TMODE_STRIP;'; break;
                case CPPrestigeSlider::SLIDER_MODE_MIX: $out .= 'homeImageSlider.mode = homeImageSlider.TMODE_MIX;'; break;
            } //switch
            
            $out .= 'homeManagerSlider.shouldAutoplay = '.($this->_slider['autoplay'] ? 'true' : 'false').';';
            $out .= 'homeManagerSlider.duration = '.$this->_slider['autoplay_time'].';';

          $out .= '</script>'; 
          echo $out;
    }
 
    public function renderSlider()
    {        
        $count = count($this->_slides);
        
        $out = '';
        $out .= '<div id="features">';
            $out .= '<div id="text-feature-container">';
            
            for($i = 0; $i < $count; $i++)
            {
                if($this->_slides[$i]->_hide) { continue; }
                
                $out .= '<div class="text-feature"><h1>'.stripcslashes($this->_slides[$i]->_title).'</h1>';
                $out .= '<p class="home-slider">'.stripcslashes($this->_slides[$i]->_text);
                if($this->_slides[$i]->_linkuse)
                {
                    if($this->_slides[$i]->_typelink == CPPrestigeSliderSlide::LINK_MANUALLY)
                    {                    
                        $out .= ' <a href="'.$this->_slides[$i]->_link.'" class="read-more">Read More</a>';
                    } else
                    {
                        $out .= ' <a href="'.get_permalink($this->_slides[$i]->_pagelink).'" class="read-more">Read More</a>';
                    }
                }
                $out .= '</p>';
                if($this->_slides[$i]->_author != '')
                {
                    $out .= '<p class="photo-author">'.stripcslashes($this->_slides[$i]->_author).'</p>';
                }
                $out .= '</div>';                              
            }
                
            $out .= '</div>  <!-- text-feature-container -->'; 
            
            $out .= '<div id="fader-slider">';
            
                $out .= '<div class="slides-wrapper">';
                    $out .= '<div class="slides-container">';
                    for($i = 0; $i < $count; $i++)
                    {
                        if($this->_slides[$i]->_hide) { continue; }
                        
                        $out .= '<a ';
                        if($this->_slides[$i]->_linkuse)
                        {
                            if($this->_slides[$i]->_typelink == CPPrestigeSliderSlide::LINK_MANUALLY)
                            {
                                $out .= ' href="'.$this->_slides[$i]->_link.'" ';
                            } else
                            {
                               $out .= ' href="'.get_permalink($this->_slides[$i]->_pagelink).'" ';  
                            }
                        }
                        $out .= ' class="slide async-img" rel="'.$this->_slides[$i]->_image.'"></a> ';
                    }                    
                    $out .= '</div>';
                $out .= '</div> <!--slides-wrapper-->';
                
                $out .= '<div class="control-panel">
                            <a id="prev"></a>
                            <a id="play"></a> 
                            <a id="next"></a>
                         </div>';                
                
                
                $out .= '<div class="thumbs-container">';
                    for($i = 0; $i < $count; $i++)
                    {
                        if($this->_slides[$i]->_hide) { continue; }
                    
                         $out .= '<div class="thumb">
                            <img class="image" src="'.$this->_slides[$i]->_thumb.'" alt="" />   
                            <img class="image" src="'.$this->_slides[$i]->_thumbblack.'" alt="" />
                        </div>';                        
                    }                
                $out .= '</div> <!--thumbs-container-->';
            

            
            $out .= '</div> <!--fader-slider-->';  
        
        $out .= '</div> <!--features-->';
        echo $out; 
          
    }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['slider_save_options']))
        {
            $this->_slider['mode'] = $_POST['slider_mode'];
            $this->_slider['autoplay'] = isset($_POST['slider_autoplay']) ? true : false;
            $this->_slider['autoplay_time'] = $_POST['slider_autoplay_time'];
            if($this->_slider['autoplay_time'] < 2000)
            {
                $this->_slider['autoplay_time'] = 2000;
            }
            
            update_option(CPPrestigeSlider::DBIDOPT_SLIDER_OPT, $this->_slider); 
            
            $this->_saved = true; 
        } 
        
        if(isset($_POST['slider_slide_save']))
        {
            $index = $_POST['index'];
            
            $this->_slides[$index]->_title = $_POST['title'];            
            $this->_slides[$index]->_text = $_POST['text'];
            $this->_slides[$index]->_link = $_POST['link'];
            $this->_slides[$index]->_pagelink = $_POST['pagelink'];
            $this->_slides[$index]->_typelink = $_POST['typelink'];  
            $this->_slides[$index]->_author = $_POST['author'];
            $this->_slides[$index]->_linkuse = isset($_POST['linkuse']) ? true : false; 
            $this->_slides[$index]->_hide = isset($_POST['hide']) ? true : false;
            
            $old = $this->_slides[$index]->_image;
            $this->_slides[$index]->_image = $_POST['image'];            
            
            if($old != $this->_slides[$index]->_image)
            {
                $this->createSlideThumbs($index);                            
            }             
        
            update_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, $this->_slides);
            
            $this->_saved = true; 
        }        
        
        if(isset($_POST['slider_add_slide']))
        {
            $slide = new CPPrestigeSliderSlide();
            array_push($this->_slides, $slide);
            
            update_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, $this->_slides);
            
            $this->_saved = true; 
        }  
        
        if(isset($_POST['slider_slide_delete']))
        {
            $index = $_POST['index'];
            unset($this->_slides[$index]);
            $this->_slides = array_values($this->_slides);
            update_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, $this->_slides);
            
            $this->_saved = true;                       
        }                 
        
        if(isset($_POST['slider_slide_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_slides[$index - 1];
                $this->_slides[$index - 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, $this->_slides);
                
                $this->_saved = true; 
            }                      
        } 
        
        if(isset($_POST['slider_slide_movedown']))
        {
            
            $index = $_POST['index'];
            $count = count($this->_slides); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_slides[$index + 1];
                $this->_slides[$index + 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPPrestigeSlider::DBIDOPT_SLIDER_SLIDES_OPT, $this->_slides);
                
                $this->_saved = true;
            }                      
        }  
                            
    }

    private function renderCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        }          
        
         echo '<h6 class="cms-h6">General Settings</h6><hr class="cms-hr"/>';
         echo '<form action="#" method="post" >';
         
            $out = '';
            $out .= '<table>';
            $out .= '<tr><td style="padding-right:5px;"><input type="radio" name="slider_mode" value="'.CPPrestigeSlider::SLIDER_MODE_FADE.'" '.($this->_slider['mode'] == CPPrestigeSlider::SLIDER_MODE_FADE ? ' checked="checked" ' : '' ).' /></td><td> Use fade effect for slides transition </td></tr>';
            $out .= '<tr><td style="padding-right:5px;"><input type="radio" name="slider_mode" value="'.CPPrestigeSlider::SLIDER_MODE_MOVE.'" '.($this->_slider['mode'] == CPPrestigeSlider::SLIDER_MODE_MOVE ? ' checked="checked" ' : '' ).' /></td><td> Use move effect for slides transition </td></tr>';
            $out .= '<tr><td style="padding-right:5px;"><input type="radio" name="slider_mode" value="'.CPPrestigeSlider::SLIDER_MODE_STRIP.'" '.($this->_slider['mode'] == CPPrestigeSlider::SLIDER_MODE_STRIP ? ' checked="checked" ' : '' ).' /></td><td> Use strip effect for slides transition </td></tr>';
            $out .= '<tr><td style="padding-right:5px;"><input type="radio" name="slider_mode" value="'.CPPrestigeSlider::SLIDER_MODE_MIX.'" '.($this->_slider['mode'] == CPPrestigeSlider::SLIDER_MODE_MIX ? ' checked="checked" ' : '' ).' /></td><td> Use effects mix for slides transition </td></tr>';            
            $out .= '</table>';
            
            $out .= '<div style="height:20px;"></div>';
            $out .= '<input style="width:80px;text-align:center;margin-bottom:5px;" type="text" name="slider_autoplay_time" value="'.$this->_slider['autoplay_time'].'" /> Autoplay time <span style="color:#999999;">(min. 2000)</span><br />'; 
            $out .= '<input type="checkbox" name="slider_autoplay" '.($this->_slider['autoplay'] ? ' checked="checked" ' : '' ).' /> Slider autoplay on/off';
            echo $out;
         
         echo '<div style="height:20px;"></div>';    
         echo '<input class="cms-submit" type="submit" value="Save" name="slider_save_options" /> <input class="cms-submit" type="submit" value="Add new slide" name="slider_add_slide" /></form>';                
    
        $this->renderSlidesCMS();
    }
      
      
    private function renderSlidesCMS()
    {        
        $count = count($this->_slides);
        if($count == 0) { return; }

        for($i = 0; $i < $count; $i++)
        {
             $out = '';
             $out .= '<a name="slide_'.$i.'"></a>';
             $out .= '<div style="margin-top:30px;">';
             $out .= '<h6 class="cms-h6">Slide No '.($i+1).':</h6><hr class="cms-hr"/>';
             
             $out .= '<form action="#slide_'.$i.'" method="post" >';
        
         
             
             $out .=  '<div style="float:left;width:232px;margin-right:30px;">
                <span class="cms-span-10">Image (JPG):</span><br /><div style="width:230px;height:114px;border:1px solid #CCC;"><img style="width:230px;height:114px;border:none;" src="'.$this->_slides[$i]->_image.'" /></div>
                <input style="width:100%;" id="slider_slide_image'.$i.'" type="text" name="image" value="'.$this->_slides[$i]->_image.'" /><br /><br />
                
                <span class="cms-span-10">Manually link:</span><br /><input type="text" style="margin-bottom:5px;width:100%;" name="link" value="'.$this->_slides[$i]->_link.'" /><br />
                <span class="cms-span-10">Page link:</span><br />'.$this->selectCtrlPagesList($this->_slides[$i]->_pagelink, 'pagelink', 232).'<br /><br /> 
                <input type="checkbox" name="linkuse" '.($this->_slides[$i]->_linkuse ? ' checked="checked" ' : '').' /> Use link<br />
                <input type="radio" name="typelink" '.$this->attrChecked($this->_slides[$i]->_typelink == CPPrestigeSliderSlide::LINK_PAGE).' value="'.CPPrestigeSliderSlide::LINK_PAGE.'" /> Use page link<br />
                <input type="radio" name="typelink" '.$this->attrChecked($this->_slides[$i]->_typelink == CPPrestigeSliderSlide::LINK_MANUALLY).' value="'.CPPrestigeSliderSlide::LINK_MANUALLY.'" /> Use manually link<br />                             
             </div>'; 
             
             $out .=  '<div style="float:left;width:532px;margin-right:30px;"> 
                <span class="cms-span-10">Slide title:</span><br /><input type="text" style="width:350px;" name="title" value="'.stripcslashes($this->_slides[$i]->_title).'" /><br />
                <span class="cms-span-10">Slide description:</span><br /><textarea name="text" style="margin-bottom:5px;width:500px;max-width:500px;height:120px;color:#444444;padding:5px;font-size:11px;">'.stripcslashes($this->_slides[$i]->_text).'</textarea><br />   
                <span class="cms-span-10">Slide display:</span><br /><input type="checkbox" style="margin-bottom:5px;" name="hide" '.($this->_slides[$i]->_hide ? ' checked="checked" ' : '').' /> Hide slide<br />
                <span class="cms-span-10">Author description:</span><br /><input type="text" style="width:350px;" name="author" value="'.stripcslashes($this->_slides[$i]->_author).'" /> 
             </div>';            
             
             $out .= '<div style="clear:both;"></div>';
             $out .= '<div style="height:20px;"></div>';
             
             $out .= '<input type="hidden" value="'.$i.'" name="index" />
                   <input class="cms-submit" type="submit" value="Save" name="slider_slide_save" />
                   <input class="cms-submit" type="submit" value="Up" name="slider_slide_moveup" />
                   <input class="cms-submit" type="submit" value="Down" name="slider_slide_movedown" />
                   <input class="cms-upload upload_image_button" type="button" value="Upload (460x227)" name="slider_slide_image'.$i.'" />
                   <input onclick="return confirm('."'Delete this slide?'".')" class="cms-submit-delete" type="submit" value="Delete" name="slider_slide_delete" />';             
             
             $out .= '</form>';
             $out .= '</div>';
             
             echo $out;   
        } // for
    } 
    
    private function createSlideThumbs($index)
    {
        if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH.CPPrestigeSlider::THUMBS_FOLDER))
        {
            mkdir(CMS_THEME_TEMP_FOLDER_PATH.CPPrestigeSlider::THUMBS_FOLDER);
        }
        
        $upload_dir = wp_upload_dir();
        $info = pathinfo($this->_slides[$index]->_image);         
        $subdir =  str_replace($upload_dir['baseurl'], '', str_replace($info['basename'], '', $this->_slides[$index]->_image));  
        $new_path = $upload_dir['basedir'].$subdir.$info['basename']; 
        
        $img = imagecreatefromjpeg($new_path);
        $width = imagesx( $img );
        $height = imagesy( $img );   
                                
        // create a new temporary image
        $tmp_img = imagecreatetruecolor(CPPrestigeSlider::THUMB_WIDTH, CPPrestigeSlider::THUMB_HEIGHT);
        $tmp_full = imagecreatetruecolor(53, 26);
        
        // copy and resize old image into new image
        // 53x26 have the same aspect ratio as 460x227
        imagecopyresampled($tmp_full, $img, 0, 0, 0, 0, 53, 26, $width, $height ); 
        imagecopy($tmp_img, $tmp_full, 0, 0, 6, 0, CPPrestigeSlider::THUMB_WIDTH, CPPrestigeSlider::THUMB_HEIGHT); 
        $info = pathinfo($new_path);

        // save thumbnail into a file
        $this->_slides[$index]->_thumb = CMS_THEME_TEMP_FOLDER_URL.CPPrestigeSlider::THUMBS_FOLDER.'/'.$info['filename'].'thumb.jpg';
        $path = CMS_THEME_TEMP_FOLDER_PATH.CPPrestigeSlider::THUMBS_FOLDER.'/'.$info['filename'].'thumb.jpg';
        imagejpeg($tmp_img, $path, CPPrestigeSlider::THUMB_QUALITY);           
        
        // save grayscaled thumbnail into a file                  
        $width = imagesx($tmp_img);
        $height = imagesy($tmp_img);
        for($y = 0; $y < $height; $y++)
        {
            for($x = 0; $x < $width; $x++)
            {
                 $pix = imagecolorat($tmp_img, $x, $y);
                 $pix_color = imagecolorsforindex($tmp_img, $pix);
                 $color = $pix_color['red']*0.3 + $pix_color['green']*0.59 + $pix_color['blue']*0.11;
                 imagesetpixel($tmp_img, $x, $y, imagecolorallocate($tmp_img, $color, $color, $color));
            }
        }                 
        
        $this->_slides[$index]->_thumbblack = CMS_THEME_TEMP_FOLDER_URL.CPPrestigeSlider::THUMBS_FOLDER.'/'.$info['filename'].'thumbblack.jpg';
        $path = CMS_THEME_TEMP_FOLDER_PATH.CPPrestigeSlider::THUMBS_FOLDER.'/'.$info['filename'].'thumbblack.jpg'; 
        imagejpeg($tmp_img, $path, CPPrestigeSlider::THUMB_QUALITY);          
    }    
            
} // class
        
        
?>
