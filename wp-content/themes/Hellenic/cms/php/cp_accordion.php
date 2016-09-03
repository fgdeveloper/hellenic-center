<?php
 /**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      cp_accordion.php
* Brief:       
*      accordion slider cms implementation
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/

/*********************************************************** 
* Definitions
************************************************************/

/*********************************************************** 
* Class name:
*    CPAccordionSliderSlide
* Descripton:
*    Implementation of CPAccordionSliderSlide 
***********************************************************/
class CPAccordionSliderSlide 
{
    const LINK_MANUALLY = 1;
    const LINK_PAGE = 2;     
                  
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
       $this->_header = 'Header title';
       $this->_link = '#';
       $this->_linktype = CPAccordionSliderSlide::LINK_MANUALLY;
       $this->_linkuse = false;
       $this->_linkpage = CMS_NOT_SELECTED;
       $this->_image = '';
       $this->_strip = '';
       $this->_hide = false;
       $this->_shadow = true;
       $this->_text = 'Slide description text';
       $this->_title = 'Place for<br />slide title';
       $this->_showstrip = true;
                 
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/    
    
    public $_link;
    public $_linkpage;
    public $_linkuse;
    public $_linktype;
    
    public $_header;
    public $_image;
    public $_strip;
    public $_text;
    public $_title;
    public $_hide;
    public $_shadow; 
    public $_showstrip;
    
} // class CPAccordionSliderSlide


/*********************************************************** 
* Class name:
*    CPAccordionSlider
* Descripton:
*    Implementation of CPAccordionSlider 
***********************************************************/
class CPAccordionSlider extends DCC_CPBaseClass
{
    const DBIDOPT_ACCORDION_OPT = 'PRESTIGE_ACCORDION_OPT';  // data base id options      
    const DBIDOPT_ACCORDION_SLIDES_OPT = 'PRESTIGE_ACCORDION_SLIDES_OPT';  // data base id options 
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {    
        // accordion slider settings
        $this->_slider = get_option(CPAccordionSlider::DBIDOPT_ACCORDION_OPT);
        if (!is_array($this->_slider))
        {
            add_option(CPAccordionSlider::DBIDOPT_ACCORDION_OPT, $this->_sliderDef);
            $this->_slider = get_option(CPAccordionSlider::DBIDOPT_ACCORDION_OPT);
        }           
                
        // accordion slides
        $this->_slides = get_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT);
        if (!is_array($this->_slides))
        {
            add_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, Array());
            $this->_slides = get_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT);
        }          
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_slider;
     private $_slides;
     private $_sliderDef = Array(
        'auto_play' => true,
        'auto_close' => true,
        'close_after_time' => false,
        'slides_shadow' => true,
        'slides_strip' => true,
        'overwrite_strip' => false,
        'overwrite_strip_img' => '',
        'overwrite_show_title' => true
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
 
     public function renderSlider()
     {
        $count = count($this->_slides);
               
              echo '<div id="accordion-container-wrapper">';
              echo '<div id="accordion-container">';     
                echo '<div class="clt"></div>
                      <div class="crt"></div>
                      <div class="clb"></div>
                      <div class="crb"></div>';                      
       
       $to_display = 0;
       for($i = 0; $i < $count; $i++) 
       {
           if($this->_slides[$i]->_hide) { continue; }  
           $to_display++;    
       }
       $stripe_width = round(920/$to_display);
       
       $rendered = 0;
       for($i = 0; $i < $count; $i++)
       {
           if($this->_slides[$i]->_hide) { continue; }
           
           $slide_style = '';
           if($this->_slider['overwrite_strip'])
           {
                $slide_style = ' style="overflow:hidden;" ';    
           }
           
           $out = '';
           
           $out .= '<div id="as'.$i.'" class="slide" '.$slide_style.'>';
                if($this->_slider['slides_shadow'] and !$this->_slider['overwrite_strip'])
                {
                    if($this->_slides[$i]->_shadow)
                    {
                        $out .= '<div class="shadow"></div>';
                    }
                }
                $out .= '<a ';                
                if($this->_slides[$i]->_linkuse)
                {
                    if($this->_slides[$i]->_linktype == CPAccordionSliderSlide::LINK_MANUALLY)
                    {
                        $out .= ' href="'.$this->_slides[$i]->_link.'" target="_self" ';
                    } else
                    {
                        $out .= ' href="'.get_permalink($this->_slides[$i]->_linkpage).'" target="_self" ';
                    }   
                } 
                $out .= ' id="slideimg'.$i.'" class="image async-img" rel="'.$this->_slides[$i]->_image.'"></a>';
                
                $out .= '<div class="text-back"></div>';
                $out .= '<div class="text">';
                    $out .= '<h3><a ';
                        if($this->_slides[$i]->_linkuse)
                        {                    
                            if($this->_slides[$i]->_linktype == CPAccordionSliderSlide::LINK_MANUALLY)
                            {
                                $out .= ' href="'.$this->_slides[$i]->_link.'" target="_self" ';
                            } else
                            {
                                $out .= ' href="'.get_permalink($this->_slides[$i]->_linkpage).'" target="_self" ';
                            }
                        }                                          
                    $out .= '>'.stripcslashes($this->_slides[$i]->_header).'</a></h3>';
                    $out .= stripcslashes($this->_slides[$i]->_text);
                $out .= '</div>';
                
                if($this->_slider['overwrite_strip'])
                {         
                        $out .= '<a ';                    
                        $out .= ' class="stripe async-img-none" rel="'.$this->_slider['overwrite_strip_img'].'" style="left:-'.($stripe_width*$rendered).'px;"></span>';
                        if($this->_slider['overwrite_show_title'])
                        {
                            $out .= '<p class="strip-title" style="left:'.($stripe_width*$rendered).'px;">'.stripcslashes($this->_slides[$i]->_title).'</p>';     
                        }                       
                        $out .= '</a>';             
                } else
                {
                    if($this->_slides[$i]->_strip != '' and $this->_slides[$i]->_showstrip and $this->_slider['slides_strip'])
                    {
                        $out .= '<a ';                    
                        $out .= ' class="stripe async-img-none" rel="'.$this->_slides[$i]->_strip.'"></span>'; 
                            if($this->_slider['overwrite_show_title'])
                            {                                              
                                $out .= '<p class="strip-title">'.stripcslashes($this->_slides[$i]->_title).'</p>';
                            }   
                        $out .= '</a>';
                    } else
                    {
                        if($this->_slider['overwrite_show_title'])
                        {                        
                            $out .= '<p class="strip-title">'.stripcslashes($this->_slides[$i]->_title).'</p>';
                        }     
                    }                       
                }
                
           $out .= '</div>'; // slide
           echo $out;
           
           $rendered++;
       } // for              
                     
        echo '</div> <!-- accordion-container -->';
        echo '</div> <!-- accordion-container-wrapper -->';                                     
                      
     } 
 
     public function javaScript()
    {
        echo '<script type="text/javascript">'; 
        
            echo 'slider_acc.auto_play = '.($this->_slider['auto_play'] ? 'true' : 'false').';'; 
            echo 'slider_acc.auto_close = '.($this->_slider['auto_close'] ? 'true' : 'false').';';      
            echo 'slider_acc.auto_close_after_time = '.($this->_slider['close_after_time'] ? 'true' : 'false').';'; 
            
        echo '</script>';          
    }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['acc_save_core']))
        {
            $this->_slider['auto_play'] = isset($_POST['auto_play']) ? true : false;
            $this->_slider['auto_close'] = isset($_POST['auto_close']) ? true : false; 
            $this->_slider['close_after_time'] = isset($_POST['close_after_time']) ? true : false; 
            $this->_slider['slides_shadow'] = isset($_POST['slides_shadow']) ? true : false; 
            $this->_slider['slides_strip'] = isset($_POST['slides_strip']) ? true : false;
            $this->_slider['overwrite_strip'] = isset($_POST['overwrite_strip']) ? true : false;
            $this->_slider['overwrite_show_title'] = isset($_POST['overwrite_show_title']) ? true : false;
            
            $this->_slider['overwrite_strip_img'] = $_POST['overwrite_strip_img']; 
            update_option(CPAccordionSlider::DBIDOPT_ACCORDION_OPT, $this->_slider);
            
            $this->_saved = true;
        }
        
        if(isset($_POST['acc_add_slide']))
        {
            $slide = new CPAccordionSliderSlide();
            array_push($this->_slides, $slide);
            update_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, $this->_slides); 
            
            $this->_saved = true;
        }             
        
        if(isset($_POST['acc_slide_save']))
        {
            $index = $_POST['index'];
            
            $this->_slides[$index]->_hide = isset($_POST['hide']) ? true : false;
            $this->_slides[$index]->_image = $_POST['image'];
            $this->_slides[$index]->_strip = $_POST['strip'];
            $this->_slides[$index]->_text = $_POST['text'];
            $this->_slides[$index]->_title = $_POST['title']; 
            $this->_slides[$index]->_header = $_POST['header']; 
            
            $this->_slides[$index]->_linkuse = isset($_POST['linkuse']) ? true : false;
            $this->_slides[$index]->_shadow = isset($_POST['shadow']) ? true : false; 
            $this->_slides[$index]->_showstrip = isset($_POST['showstrip']) ? true : false; 
            $this->_slides[$index]->_linktype = $_POST['linktype'];
            $this->_slides[$index]->_link = $_POST['link'];
            $this->_slides[$index]->_linkpage = $_POST['linkpage'];
            
            update_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, $this->_slides); 
            
            $this->_saved = true;
        }          
        

        if(isset($_POST['acc_slide_delete']))
        {
            $index = $_POST['index'];
            unset($this->_slides[$index]);
            $this->_slides = array_values($this->_slides);
            update_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, $this->_slides); 
            
            $this->_saved = true;                     
        }                 
        
        if(isset($_POST['acc_slide_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_slides[$index - 1];
                $this->_slides[$index - 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, $this->_slides);
                
                $this->_saved = true;
            }                      
        } 
        
        if(isset($_POST['acc_slide_movedown']))
        {
            
            $index = $_POST['index'];
            $count = count($this->_slides); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_slides[$index + 1];
                $this->_slides[$index + 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPAccordionSlider::DBIDOPT_ACCORDION_SLIDES_OPT, $this->_slides);
                
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
        
         // core accordion settings
         $out = '';
         $out .= '<h6 class="cms-h6">Accordion Slider Settings</h6><hr class="cms-hr"/>';
         $out .= '<form action="#" method="post" >';
         $out .= '<input type="checkbox" '.($this->_slider['auto_play'] ? ' checked="checked" ' : '').' name="auto_play" /> Autoplay <br />';
         $out .= '<input type="checkbox" '.($this->_slider['auto_close'] ? ' checked="checked" ' : '').' name="auto_close" /> Close slider when mouse cursor leaves accordion <br />';
         $out .= '<input type="checkbox" '.($this->_slider['close_after_time'] ? ' checked="checked" ' : '').' name="close_after_time" /> Close slider after some time when mouse cursor leaves accordion slider <br />';
         $out .= '<input type="checkbox" '.($this->_slider['slides_shadow'] ? ' checked="checked" ' : '').' name="slides_shadow" /> Show slides auto shadow <br />';
         $out .= '<input type="checkbox" '.($this->_slider['slides_strip'] ? ' checked="checked" ' : '').' name="slides_strip" /> Show slides strip <br /><br />'; 
         
         $out .= '<span class="cms-span-10">Path to 920x420 image, which automatically cover all slides strip:</span><br />'; 
         $out .= '<input type="text" style="width:600px;" id="overwrite_strip_img" name="overwrite_strip_img" value="'.$this->_slider['overwrite_strip_img'].'" /> ';
         $out .= '<input class="cms-upload upload_image_button" type="button" value="Upload/Select Image 920x420" name="overwrite_strip_img" /> <br />';         
         $out .= '<input type="checkbox" '.($this->_slider['overwrite_strip'] ? ' checked="checked" ' : '').' name="overwrite_strip" /> Overwrite individual slide strip images with one big image defined above <br />';
         $out .= '<input type="checkbox" '.($this->_slider['overwrite_show_title'] ? ' checked="checked" ' : '').' name="overwrite_show_title" /> Show strips title <br />';
                                                                                                        
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="acc_save_core" /> ';
         $out .= '<input class="cms-submit" type="submit" value="Add new slide" name="acc_add_slide" />'; 
         $out .= '</div></form>';     
         echo $out;
         
         // accordion slides                                                                                   
         $count = count($this->_slides);
         
         if($count > 0)
         {                                                        
             for($i = 0; $i < $count; $i++)
             {
                    echo '<a name="slide_'.$i.'"></a>';
                    echo '<div style="margin-top:30px;">';
                    echo '<h6 class="cms-h6">Slide No '.($i+1).':</h6><hr class="cms-hr"/>';
                    
                    echo '<form action="#slide_'.$i.'" method="post" >';

                    echo '<div style="float:left;width:240px;margin-right:30px;">
                    <div style="width:240px;height:105px;border:1px solid #CCC;"><img style="width:240px;height:105px;border:none;" src="'.$this->_slides[$i]->_image.'" /></div>
                    <input style="width:100%;" id="acc_slide_image'.$i.'" type="text" name="image" value="'.$this->_slides[$i]->_image.'" /><br /><br />';
                    
                    echo '<span class="cms-h6s">Strip image path:</span><input style="width:100%;" id="acc_slide_strip'.$i.'" type="text" name="strip" value="'.$this->_slides[$i]->_strip.'" /><br /><br />';
                    echo '<input type="checkbox" '.($this->_slides[$i]->_hide ? ' checked="checked" ' : '').' name="hide" /> Hide slide <br />          
                          <input type="checkbox" '.($this->_slides[$i]->_showstrip ? ' checked="checked" ' : '').' name="showstrip" /> Show strip <br /> 
                    </div>';
                    
                    // slide image link
                    echo '<div style="margin-bottom:20px;width:200px;float:left;margin-right:30px;">'; 

                    echo '<h6 class="cms-h6s">URL link for slide image:</h6>';

                    echo 'Insert manually:<br /><input style="width:200px;" type="text" name="link" value="'.$this->_slides[$i]->_link.'" />
                    Page:<br>';
                    echo $this->selectCtrlPagesList($this->_slides[$i]->_linkpage, 'linkpage', 200);
                    echo '<br /><br /><input type="checkbox" '.($this->_slides[$i]->_linkuse ? ' checked="checked" ' : '').' name="linkuse" /> Use link <br />';
                    echo '<input type="checkbox" '.($this->_slides[$i]->_shadow ? ' checked="checked" ' : '').' name="shadow" /> Show shadow <br />';
                    
                    echo '<input type="radio" value="'.CPAccordionSliderSlide::LINK_MANUALLY.'" name="linktype"  '.($this->_slides[$i]->_linktype == CPAccordionSliderSlide::LINK_MANUALLY ? 'checked="checked" ' : '').' /> Use manually link <br />';
                    echo '<input type="radio" value="'.CPAccordionSliderSlide::LINK_PAGE.'" name="linktype" '.($this->_slides[$i]->_linktype == CPAccordionSliderSlide::LINK_PAGE ? 'checked="checked" ' : '').' /> Use page link<br />';              
                    echo '</div>';                     
                    
                    // slide desc
                    echo '<div style="float:left;width:340px;margin-right:0px;">
                        <h6 class="cms-h6s">Description box:</h6>
                        Strip title:<br />
                        <input style="width:340px;" type="text" name="title" value="'.stripcslashes($this->_slides[$i]->_title).'" />                           
                        Description header text:<br />
                        <input style="width:340px;" type="text" name="header" value="'.stripcslashes($this->_slides[$i]->_header).'" />             
                        Description text:<br />
                        <textarea style="font-size:11px;padding:8px;width:340px;height:120px;max-width:340px;color:#444444;" name="text">'.stripcslashes($this->_slides[$i]->_text).'</textarea>';
                    echo '</div>';                                         
   
                    // clear both
                    echo '<div style="clear:both;margin-bottom:30px;height:1px;"></div>';                    
                    
                    
                    // buttons
                    echo '<input type="hidden" value="'.$i.'" name="index" />
                    <input class="cms-submit" type="submit" value="Save" name="acc_slide_save" />
                   <input class="cms-submit" type="submit" value="Up" name="acc_slide_moveup" />
                   <input class="cms-submit" type="submit" value="Down" name="acc_slide_movedown" />
                   <input class="cms-upload upload_image_button" type="button" value="Upload (920x420)" name="acc_slide_image'.$i.'" />
                   <input class="cms-upload upload_image_button" type="button" value="Upload Strip Image (Wx420)" name="acc_slide_strip'.$i.'" /> 
                   <input onclick="return confirm('."'Delete this slide?'".')" class="cms-submit-delete" type="submit" value="Delete" name="acc_slide_delete" />';
                    
                    echo '</form></div>'; 
             } // for 
              
                      
         } // if 
         
                
    }
            
            
} // class CPAccordion
        
        
?>