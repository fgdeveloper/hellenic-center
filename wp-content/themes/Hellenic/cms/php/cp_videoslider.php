<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_videoslider.php
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
*    CPVideoSliderSlide
* Descripton:
*    Implementation of CPVideoSliderSlide 
***********************************************************/
class CPVideoSliderSlide  
{
    const MODE_IMAGE = 1;
    const MODE_VIDEO = 2;
    const LINK_MANUALLY = 1;
    const LINK_PAGE = 2;    
    
    public function __construct() 
    {
        $this->_video = '';
        $this->_image = '';
        $this->_link = '';
        $this->_linkuse = false;
        $this->_linktype = CPVideoSliderSlide::LINK_MANUALLY;
        $this->_linkpage = CMS_NOT_SELECTED;
        $this->_mode = CPVideoSliderSlide::MODE_VIDEO; 
        $this->_title = 'Slide title'; 
        $this->_text = ''; 
        $this->_author = ''; 
        $this->_hide = false;            
    }   
    
    public $_video;
    public $_image;
    public $_mode;
    public $_link;
    public $_linktype;
    public $_linkpage;
    public $_linkuse; 
    public $_title;
    public $_text;
    public $_author;
    public $_hide; 
}

/*********************************************************** 
* Class name:
*    CPVideoSlider
* Descripton:
*    Implementation of CPVideoSlider 
***********************************************************/
class CPVideoSlider extends DCC_CPBaseClass 
{
    const DBIDOPT_VS_GENERAL_OPT = 'PRESTIGE_VIDEO_SLIDER_OPT';  // data base id options      
    const DBIDOPT_VS_SLIDES_OPT = 'PRESTIGE_VIDEO_SLIDER_SLIDES_OPT';  // data base id options
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // temp
        $this->_general = get_option(CPVideoSlider::DBIDOPT_VS_GENERAL_OPT);
        if (!is_array($this->_general))
        {
            add_option(CPVideoSlider::DBIDOPT_VS_GENERAL_OPT, $this->_generalDef);
            $this->_general = get_option(CPVideoSlider::DBIDOPT_VS_GENERAL_OPT);
        }           

        // slides
        $this->_slides = get_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT);
        if (!is_array($this->_slides))
        {
            add_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, Array());
            $this->_slides = get_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT);
        }  
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_general;
     private $_saved = false;
     private $_slides = Array();     
     private $_generalDef = Array(
        'interval_time' => 7000,
        'slide_time' => 800,
        'autoplay' => true
     );
   
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

     public function renderSlider()
     {
        $out = '';
        
        $out .= '<div id="video-slider-wrapper">';
            $out .= '<div id="video-slider">';
                
                $count_slides = count($this->_slides);
                
                for($i = 0; $i < $count_slides; $i++)
                {                    
                    if($this->_slides[$i]->_hide) continue;
                    
                    
                    $out .= '<div class="video-slide">'; 
                         if($this->_slides[$i]->_mode == CPVideoSliderSlide::MODE_IMAGE and $this->_slides[$i]->_image != '')
                         {
                             $src = get_bloginfo('template_url').'/thumb.php?src='.$this->_slides[$i]->_image.'&w=480&h=270&zc=1';
                             $out .= '<img style="width:480px;height:270px;" src="'.$src.'" alt="" />';
                         } else
                         {
                             // find viemo or you tube
                             $is_vimeo = strstr($this->_slides[$i]->_video, 'vimeo');
                             $is_youtube = strstr($this->_slides[$i]->_video, 'youtube');  
                             
                             if($is_youtube)
                             {  
                                $out .= '<object width="480" height="270"><param name="movie" value="'.$this->_slides[$i]->_video.'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$this->_slides[$i]->_video.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="270" wmode="transparent"></embed></object>';           
                             } else
                             if($is_vimeo)
                             {
                                $out .= '<iframe src="'.$this->_slides[$i]->_video.'" width="480" height="270" frameborder="0"></iframe>';  
                             }
                             
                         }                      
                    $out .= '</div>';
                    
                    $out .= '<div class="text-slide">';                        
                        $out .= '<h1>'.stripcslashes($this->_slides[$i]->_title).'</h1>';
                        $out .= '<p>'.stripcslashes($this->_slides[$i]->_text);

                    if($this->_slides[$i]->_linkuse)
                    {
                        if($this->_slides[$i]->_linktype == CPVideoSliderSlide::LINK_MANUALLY)
                        {
                            $out .= ' <a class="read-more" href="'.$this->_slides[$i]->_link.'">Read&nbsp;more</a>';    
                        } else
                        {
                            $out .= ' <a class="read-more" href="'.get_permalink($this->_slides[$i]->_linkpage).'">Read&nbsp;more</a>'; 
                        }
                    }                      
                    $out .= '</p>';
                      
                    if($this->_slides[$i]->_author != '')
                    {
                        $out .= '<p class="photo-author">'.$this->_slides[$i]->_author.'</p>';
                    }  
                        
                    $out .= '</div>'; 
                    
             
                }

                $out .= '<div class="control-panel">
                            <a id="prev"></a>
                            <a id="play"></a> 
                            <a id="next"></a>
                         </div>';                    
                
            $out .= '</div>'; 
        $out .= '</div>';
        echo $out;   
     }
 

     public function javaScript()
    {
        $out = '';
        $out .= '<script type="text/javascript">'; 
        
            $out .= 'homeVideoSlider.autoplayAllow = '.($this->_general['autoplay'] ? 'true' : 'false').';'; 
            $out .= 'homeVideoSlider.interval = '.$this->_general['interval_time'].';';      
            $out .= 'homeVideoSlider.animateTime = '.$this->_general['slide_time'].';';  
            
        $out .= '</script>';
        echo $out;          
    } 
 
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['vs_general_settings']))
        {                    
            $this->_general['interval_time'] = $_POST['interval_time'];
            $this->_general['slide_time'] = $_POST['slide_time'];
            $this->_general['autoplay'] = isset($_POST['autoplay']) ? true : false;
            
            update_option(CPVideoSlider::DBIDOPT_VS_GENERAL_OPT, $this->_general);
            $this->_saved = true;   
        }              

        if(isset($_POST['vs_add_slide']))
        {       
            $slide = new CPVideoSliderSlide();
            
            array_push($this->_slides, $slide);  
            update_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, $this->_slides);
            $this->_saved = true;   
        }  

        if(isset($_POST['vs_save_slide']))
        {       
            
            $index = $_POST['index'];
            $this->_slides[$index]->_image = $_POST['vs_media_image']; 
            $this->_slides[$index]->_video = $_POST['vs_media_video']; 
            $this->_slides[$index]->_mode = $_POST['media_mode']; 

            $this->_slides[$index]->_title = $_POST['title']; 
            $this->_slides[$index]->_text = $_POST['text']; 
            $this->_slides[$index]->_author = $_POST['author']; 
            
            $this->_slides[$index]->_linkuse = isset($_POST['linkuse']) ? true : false; 
            $this->_slides[$index]->_hide = isset($_POST['hide']) ? true : false;
            $this->_slides[$index]->_linkpage = $_POST['linkpage'];
            $this->_slides[$index]->_linktype = $_POST['linktype'];
            $this->_slides[$index]->_link = $_POST['link']; 
            
            update_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, $this->_slides);
            $this->_saved = true;   
        }  
        
        if(isset($_POST['vs_slide_delete']))
        {
            $index = $_POST['index'];
            unset($this->_slides[$index]);
            $this->_slides = array_values($this->_slides);
            update_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, $this->_slides);
            $this->_saved = true;                       
        }     
        
        if(isset($_POST['vs_slide_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_slides[$index - 1];
                $this->_slides[$index - 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, $this->_slides); 
                $this->_saved = true; 
            }                      
        } 
        
        if(isset($_POST['vs_slide_movedown']))
        {
            
            $index = $_POST['index'];
            $count = count($this->_slides); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_slides[$index + 1];
                $this->_slides[$index + 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPVideoSlider::DBIDOPT_VS_SLIDES_OPT, $this->_slides); 
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
        
         // Video slider core settings
         $out = '';
         $out .= '<a name="vs_general_settings"></a>';         
         $out .= '<h6 class="cms-h6">Video Slider Core Settings</h6><hr class="cms-hr"/>';
         $out .= '<form action="#vs_general_settings" method="post" >';           
         
         $out .= '<input type="text" style="width:60px;text-align:center;" name="interval_time" value="'.$this->_general['interval_time'].'" /> Slide switch time interval (ms)<br />';
         $out .= '<input type="text" style="width:60px;text-align:center;" name="slide_time" value="'.$this->_general['slide_time'].'" /> Slide fade time (ms)<br /><br />'; 
         $out .= '<input type="checkbox" '.$this->attrChecked($this->_general['autoplay']).' name="autoplay" /> Autoplay';
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="vs_general_settings" /> ';         
         $out .= '<input class="cms-submit" type="submit" value="Add New Slide" name="vs_add_slide" />'; 
         $out .= '</form>';
         
         $cout_slides = count($this->_slides);
         if($cout_slides)
         {
             $out .= '<div style="height:40px;"></div>';
         }
         for($i = 0; $i < $cout_slides; $i++)
         {             
             $out .= '<a name="vs_slide_'.$i.'"></a>';         
             $out .= '<h6 class="cms-h6">Slide No '.($i+1).':</h6><hr class="cms-hr"/>';
             $out .= '<form action="#vs_slide_'.$i.'" method="post" >';           
             
              
             $out .= '<div style="width:480px;float:left;">';
             $out .= '<h6 class="cms-h6s">URL link for image or video:</h6>';
             
             if($this->_slides[$i]->_mode == CPVideoSliderSlide::MODE_IMAGE and $this->_slides[$i]->_image != '')
             {
                 $src = get_bloginfo('template_url').'/thumb.php?src='.$this->_slides[$i]->_image.'&w=480&h=270&zc=1';
                 $out .= '<img style="width:480px;height:270px;" src="'.$src.'" alt="" />';
             } else
             {
                 // find viemo or you tube
                 $is_vimeo = strstr($this->_slides[$i]->_video, 'vimeo');
                 $is_youtube = strstr($this->_slides[$i]->_video, 'youtube');  
                 
                 if($is_youtube)
                 {  
                    $out .= '<object width="480" height="270"><param name="movie" value="'.$this->_slides[$i]->_video.'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$this->_slides[$i]->_video.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="270"></embed></object>';           
                 } else
                 if($is_vimeo)
                 {
                    $out .= '<iframe src="'.$this->_slides[$i]->_video.'" width="480" height="270" frameborder="0"></iframe>';  
                 }
                 
             }
             
             $out .= '<span class="cms-span-10">Path image (JPG file):</span><br />';
             $out .= '<input style="width:100%;" id="vs_media_image_'.$i.'" type="text" name="vs_media_image" value="'.$this->_slides[$i]->_image.'" />'; 
             $out .= '<span class="cms-span-10">Path to video on Vimeo or YouTube:</span><br />'; 
             $out .= '<input style="width:100%;" type="text" name="vs_media_video" value="'.$this->_slides[$i]->_video.'" />';  
             
             $out .= '<span class="cms-span-10">Choose slide mode:</span><br />'; 
             $out .= '<input type="radio" value="'.CPVideoSliderSlide::MODE_VIDEO.'" name="media_mode"  '.($this->_slides[$i]->_mode == CPVideoSliderSlide::MODE_VIDEO ? 'checked="checked" ' : '').' /> Show video <br />';             
             $out .= '<input type="radio" value="'.CPVideoSliderSlide::MODE_IMAGE.'" name="media_mode" '.($this->_slides[$i]->_mode == CPVideoSliderSlide::MODE_IMAGE ? 'checked="checked" ' : '').' /> Show image<br />';               
             $out .= '<br /><input type="checkbox" '.($this->_slides[$i]->_hide ? ' checked="checked" ' : '').' name="hide" /> Hide slide <br />'; 
             $out .= '</div>';

             
             $out .= '<div style="width:330px;float:right;">';
             $out .= '<h6 class="cms-h6s">Slide title:</h6>';
             $out .= '<input style="width:100%;" type="text" name="title" value="'.stripcslashes($this->_slides[$i]->_title).'" />';
             $out .= '<h6 class="cms-h6s">Description:</h6>';
             $out .= '<textarea style="font-size:11px;padding:8px;width:300px;height:100px;max-width:300px;color:#444444;" name="text">'.stripcslashes($this->_slides[$i]->_text).'</textarea>';  
             $out .= '<h6 class="cms-h6s">Author:</h6>';
             $out .= '<input style="width:100%;" type="text" name="author" value="'.stripcslashes($this->_slides[$i]->_author).'" />'; 
             
             $out .= '<div style="height:20px;"></div>';
             $out .= '<h6 class="cms-h6s">URL link for slide image:</h6>';
              
             $out .= '<span class="cms-span-10">Insert manually:</span><br />'; 
             $out .= '<input style="width:240px;" type="text" name="link" value="'.$this->_slides[$i]->_link.'" /><br />';
             $out .= '<span class="cms-span-10">Select page:</span><br />'; 
             $out .= $this->selectCtrlPagesList($this->_slides[$i]->_linkpage, 'linkpage', 240);
             $out .= '<br /><br /><input type="checkbox" '.($this->_slides[$i]->_linkuse ? ' checked="checked" ' : '').' name="linkuse" /> Use link <br />';
              
             $out .= '<input type="radio" value="'.CPVideoSliderSlide::LINK_MANUALLY.'" name="linktype"  '.($this->_slides[$i]->_linktype == CPVideoSliderSlide::LINK_MANUALLY ? 'checked="checked" ' : '').' /> Use manually link <br />';
             $out .= '<input type="radio" value="'.CPVideoSliderSlide::LINK_PAGE.'" name="linktype" '.($this->_slides[$i]->_linktype == CPVideoSliderSlide::LINK_PAGE ? 'checked="checked" ' : '').' /> Use page link<br />';                                                                                            
             $out .= '</div>';
             
             $out .= '<div style="height:20px;clear:both;"></div>';
             $out .= '<input type="hidden" value="'.$i.'" name="index" />';  
             $out .= '<input class="cms-submit" type="submit" value="Save" name="vs_save_slide" /> ';
             $out .= '<input class="cms-submit" type="submit" value="Up" name="vs_slide_moveup" /> '; 
             $out .= '<input class="cms-submit" type="submit" value="Down" name="vs_slide_movedown" /> '; 
             $out .= '<input onclick="return confirm('."'Delete this slide?'".')" class="cms-submit-delete" type="submit" value="Delete" name="vs_slide_delete" /> ';
             $out .= '<input class="cms-upload upload_image_button" type="button" value="Upload image (480x270)" name="vs_media_image_'.$i.'" /> ';          
             $out .= '</form>';
             $out .= '<div style="height:30px;"></div>';             
             
         }
         
         $out .= '</div>';
         
         echo $out;           
    }
         
} // class CPVideoSlider
        
        
?>