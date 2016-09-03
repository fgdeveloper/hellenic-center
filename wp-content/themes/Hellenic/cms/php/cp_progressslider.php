<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      cp_progressslider.php
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
* Definitions
************************************************************/


/*********************************************************** 
* Class name:
*    CPProgressSliderSlide
* Descripton:
*    Implementation of CPProgressSliderSlide 
***********************************************************/
class CPProgressSliderSlide 
{
    const LINK_MANUALLY = 1;
    const LINK_PAGE = 2;     
                  
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_x = 0;
        $this->_y = 0;
        $this->_width = 300;
        $this->_header_bgcolor = '#FFFFFF';
        $this->_header_textcolor = '#000000';
        $this->_header_usetextcolor = false;                
        $this->_hide = false; 
        $this->_hideheader = true;
        $this->_hidedescription = true;
        $this->_headertext = '';
        $this->_hidetitle = true;
        $this->_title = '';
        $this->_text = '';
        $this->_imagelink = '';
        $this->_pagelink = CMS_NOT_SELECTED;       
        $this->_linktype = CPProgressSliderSlide::LINK_MANUALLY;
        $this->_uselink = false;


        $this->_image = '';       
        $this->_thumb = '';
        $this->_thumbblack = '';
       
        $this->_btnlinkAhide = true;
        $this->_btnlinkAname = 'Read more';
        $this->_btnlinkA = '';
        $this->_btnlinkAtype = CPProgressSliderSlide::LINK_MANUALLY;
        $this->_btnlinkApage = CMS_NOT_SELECTED;        
        $this->_btnfloatleftA = true;
        $this->_btnfloatrightA = false;        
        
        $this->_btnlinkBhide = true;
        $this->_btnlinkBname = 'Read more';
        $this->_btnlinkB = '';
        $this->_btnlinkBtype = CPProgressSliderSlide::LINK_MANUALLY;
        $this->_btnlinkBpage = CMS_NOT_SELECTED;
        $this->_btnfloatleftB = true;
        $this->_btnfloatrightB = false;                             
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/
    
    public $_x;
    public $_y;
    public $_width;
    public $_header_bgcolor;
    public $_header_textcolor;
    public $_header_usetextcolor;           
    public $_hide;
    public $_hideheader;
    public $_hidedescription;
    public $_headertext;
    public $_hidetitle;
    public $_title;
    public $_text;
    public $_imagelink;
    public $_pagelink;
    public $_linktype;
    public $_uselink; 
  
    public $_image;
    public $_thumb;
    public $_thumbblack; // thumb grayscaled
    
    public $_btnlinkAhide;
    public $_btnlinkAname;
    public $_btnlinkA;
    public $_btnfloatleftA;
    public $_btnfloatrightA;
    public $_btnlinkAtype;
    public $_btnlinkApage;
    
    public $_btnlinkBhide;
    public $_btnlinkBname;
    public $_btnlinkB; 
    public $_btnfloatleftB;
    public $_btnfloatrightB;          
    public $_btnlinkBtype;
    public $_btnlinkBpage;
    
} // class CPProgressSliderSlide


/*********************************************************** 
* Class name:
*    CPProgressSlider
* Descripton:
*    Implementation of CPProgressSlider 
***********************************************************/
class CPProgressSlider extends DCC_CPBaseClass 
{
    const DBIDOPT_PROGRESS_SLIDER = 'PRESTIGE_PROGRESS_SLIDER_OPT';
    const DBIDOPT_PROGRESS_SLIDER_SLIDES = 'PRESTIGE_PROGRESS_SLIDES_OPT';
    
    const TRANSITION_FADE = 1;
    const TRANSITION_MOVE = 2;
        
    const TRANSITION_DESC_FADE = 1;
    const TRANSITION_DESC_MOVE = 2;
    
    const THUMB_WIDTH = 59;
    const THUMB_HEIGHT = 26; 
    const THUMB_QUALITY = 100; 
    const THUMB_FOLDER_PATH = '/progress_slider'; 
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    { 
        // slider settings
        $this->_slider = get_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER);
        if (!is_array($this->_slider))
        {
            add_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER, $this->_sliderDef);
            $this->_slider = get_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER);
        }          

        // slider slides
        $this->_slides = get_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES);
        if (!is_array($this->_slides))
        {
            add_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, Array());
            $this->_slides = get_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES);
        }   
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/          
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
    
    private $_slides = Array();
    
    private $_slider = Array(); // menu top items list 
    private $_sliderDef = Array(
        'autoplay' => true,
        'firstrandom' => false,
        'hidecontrol' => false,
        'transition' => CPProgressSlider::TRANSITION_MOVE,
        'switchtime' => 4500,
        'transitiondesc' => CPProgressSlider::TRANSITION_DESC_MOVE,
        'thumbbordercolor' => '#FFFFFF'
    ); // menu top items list 
    
    private $_saved = false;
   
    /*********************************************************** 
    * Public functions
    ************************************************************/               
 
     public function renderTab()
     {
        echo '<div class="cms-content-wrapper">';
        $this->process(); 
        $this->renderCoreSettingsCMS();
        $this->renderSlidesCMS();
        echo '</div>';
     }
     
     public function javaScript()
     {
        echo '<script type="text/javascript">'; 
        
            echo 'slider_a.allowAutoPlay = '.($this->_slider['autoplay'] ? 'true' : 'false').';'; 
            echo 'slider_a.first_random = '.($this->_slider['firstrandom'] ? 'true' : 'false').';';
            
            if($this->_slider['transition'] == CPProgressSlider::TRANSITION_MOVE) 
            {
                echo 'slider_a.mode = slider_a.TRANS_MODE_MOVE;';
            } else
            if($this->_slider['transition'] == CPProgressSlider::TRANSITION_FADE) 
            {
                echo 'slider_a.mode = slider_a.TRANS_MODE_FADE;';
            }


            if($this->_slider['transitiondesc'] == CPProgressSlider::TRANSITION_DESC_MOVE) 
            {
                echo 'slider_a.descMode = slider_a.MOVE_DESC_MODE;';
            } else
            if($this->_slider['transitiondesc'] == CPProgressSlider::TRANSITION_DESC_FADE) 
            {
                echo 'slider_a.descMode = slider_a.FADE_DESC_MODE;';
            }
            
            echo 'slider_a.timeSwitch = '.$this->_slider['switchtime'].';';
            echo 'slider_a.thumbBorderColorOn = \'#'.$this->_slider['thumbbordercolor'].'\';';
            
        echo '</script>';    
     }
     
     public function renderSlider()
     {
        $count = count($this->_slides);

            echo '<div id="slider-a-container-wrapper">';
            echo '<div id="slider-a-container">';

                      
            // output slides
            for($i = 0; $i < $count; $i++)
            {
                if($this->_slides[$i]->_hide) { continue; }
                
                $out = '<a class="slide async-img" rel="'.$this->_slides[$i]->_image.'" ';
                if($this->_slides[$i]->_uselink)
                {
                    if($this->_slides[$i]->_linktype == CPProgressSliderSlide::LINK_MANUALLY)
                    {
                        $out .= ' target="_self" href="'.$this->_slides[$i]->_imagelink.'" ';
                    } else
                    {
                        if($this->_slides[$i]->_pagelink != CMS_NOT_SELECTED)
                        {
                            $out .= ' target="_self" href="'.get_permalink($this->_slides[$i]->_pagelink).'" ';
                        } 
                    }
                }
                $out .= ' ></a>';
                echo $out;    
            } // for 
            
            // slides description 
            for($i = 0; $i < $count; $i++)
            {
                if($this->_slides[$i]->_hide) { continue; }    
                if($this->_slides[$i]->_hidedescription) 
                {
                    echo '<div class="desc"></div>'; 
                    continue; 
                }             
                
                
                $out = '<div class="desc">';
                
                    if(!$this->_slides[$i]->_hideheader)
                    {
                        $out .= '<div class="head"><h3>'.stripcslashes($this->_slides[$i]->_headertext).'</h3></div>';
                    }     
                                        
                    $out .= '<div class="foot">';
                    if(!$this->_slides[$i]->_hidetitle)
                    {    
                        $out .= '<h3 class="title">'.stripcslashes($this->_slides[$i]->_title).'</h3>';
                    }
                    
                    $out .= '<div class="text">'.stripcslashes($this->_slides[$i]->_text).'</div>                        
                    </div> <!-- foot -->';
                    
                    //  buttons bar
                    if(!$this->_slides[$i]->_btnlinkAhide or !$this->_slides[$i]->_btnlinkBhide)
                    {                    
                        $out .= '<div class="btn-bar">';
                        // button a
                        if(!$this->_slides[$i]->_btnlinkAhide)
                        {
                            $out .= '<a class="'.($this->_slides[$i]->_btnfloatleftA ? 'btn-left' : 'btn-right').'" target="_self" href="';
                            if($this->_slides[$i]->_btnlinkAtype == CPProgressSliderSlide::LINK_MANUALLY)
                            {
                                $out .= $this->_slides[$i]->_btnlinkA;
                            } else
                            {
                                $out .= get_permalink($this->_slides[$i]->_btnlinkApage);
                            }
                            $out .= '">'.$this->_slides[$i]->_btnlinkAname.'</a>'; 
                        }
                        // button b
                        if(!$this->_slides[$i]->_btnlinkBhide)
                        {
                            $out .= '<a class="'.($this->_slides[$i]->_btnfloatleftB ? 'btn-left' : 'btn-right').'" target="_self" href="';
                            if($this->_slides[$i]->_btnlinkBtype == CPProgressSliderSlide::LINK_MANUALLY)
                            {
                                $out .= $this->_slides[$i]->_btnlinkB;
                            } else
                            {
                                $out .= get_permalink($this->_slides[$i]->_btnlinkBpage);
                            }
                            $out .= '">'.$this->_slides[$i]->_btnlinkBname.'</a>'; 
                        }                        
                        $out .= '</div>';
                    }
                                        
                    $out .= '<span class="x">'.$this->_slides[$i]->_x.'</span><span class="y">'.$this->_slides[$i]->_y.'</span>
                        <span class="width">'.$this->_slides[$i]->_width.'</span>
                    <span class="hbgcolor">#'.$this->_slides[$i]->_header_bgcolor.'</span>';
                    if($this->_slides[$i]->_header_usetextcolor)
                    {
                        $out .= '<span class="hcolor">#'.$this->_slides[$i]->_header_textcolor.'</span>';
                    } 
                $out .= '</div> <!-- desc -->'; 
                
                echo $out;
                                    
            } // for                             
            
            
            // thumb bar
            echo '<div class="black-bar"></div>
            <div class="thumb-bar">';
            for($i = 0; $i < $count; $i++)
            {
                if($this->_slides[$i]->_hide) { continue; }
                            
                $out = '<div class="thumb"><div class="color"><img src="';
                $out .= CMS_THEME_TEMP_FOLDER_URL.CPProgressSlider::THUMB_FOLDER_PATH.'/'.$this->_slides[$i]->_thumb;
                $out .= '" /></div><div class="black"><img src="';
                $out .= CMS_THEME_TEMP_FOLDER_URL.CPProgressSlider::THUMB_FOLDER_PATH.'/'.$this->_slides[$i]->_thumbblack; 
                $out .= '" /></div></div>';
                echo $out;
            } // for       
            echo '</div>';                
            
            if(!$this->_slider['hidecontrol'])
            {
                echo '<div class="prev"></div> 
                      <div class="pause"></div> 
                      <div class="play"></div>
                      <div class="next"></div>';
            }                         
                      
            echo '</div> <!-- slider-a-container -->';                    
            echo '</div> <!-- slider-a-container-wrapper -->'; 
     }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
         if(isset($_POST['slider_save']))
         {
            $this->_slider['autoplay'] = isset($_POST['autoplay']) ? true : false;
            $this->_slider['firstrandom'] = isset($_POST['firstrandom']) ? true : false;
            $this->_slider['hidecontrol'] = isset($_POST['hidecontrol']) ? true : false;
            $this->_slider['transition'] = $_POST['transition']; 
            $this->_slider['transitiondesc'] = $_POST['transitiondesc']; 
            $this->_slider['switchtime'] = $_POST['switchtime'];
            $this->_slider['thumbbordercolor'] = $_POST['thumbbordercolor'];            
                                      
            update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER, $this->_slider);
            $this->_saved = true;        
         }
         
         if(isset($_POST['slide_add']))
         {
            $slide = new CPProgressSliderSlide();
            array_push($this->_slides, $slide);
            update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, $this->_slides);
            $this->_saved = true;       
         } 
         
        if(isset($_POST['slide_delete']))
        {
            $index = $_POST['index'];
            unset($this->_slides[$index]);
            $this->_slides = array_values($this->_slides);
            update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, $this->_slides);
            $this->_saved = true;                       
        }                 
        
        if(isset($_POST['slide_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_slides[$index - 1];
                $this->_slides[$index - 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, $this->_slides);
                $this->_saved = true; 
            }                      
        } 
        
        if(isset($_POST['slide_movedown']))
        {
            
            $index = $_POST['index'];
            $count = count($this->_slides); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_slides[$index + 1];
                $this->_slides[$index + 1] = $this->_slides[$index];
                $this->_slides[$index] = $temp;
                
                update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, $this->_slides);
                $this->_saved = true; 
            }                      
        }        
         
        if(isset($_POST['slide_save']))
        {          
            $index = $_POST['index'];
            
            $this->_slides[$index]->_x = $_POST['posx'];
            $this->_slides[$index]->_y = $_POST['posy'];
            $this->_slides[$index]->_width = $_POST['width'];
            $this->_slides[$index]->_header_bgcolor = $_POST['headercolor'];
            $this->_slides[$index]->_header_textcolor = $_POST['headertextcolor'];
            $this->_slides[$index]->_header_usetextcolor = isset($_POST['headerusetextcolor']) ? true : false; ;
            
            $this->_slides[$index]->_hide = isset($_POST['hide']) ? true : false; 
            $this->_slides[$index]->_hideheader = isset($_POST['hideheader']) ? true : false; 
            $this->_slides[$index]->_hidedescription = isset($_POST['hidedescription']) ? true : false;
            $this->_slides[$index]->_linktype = $_POST['linktype'];
            $this->_slides[$index]->_uselink = $_POST['uselink'];
            
            $this->_slides[$index]->_title = $_POST['title'];
            $this->_slides[$index]->_hidetitle = isset($_POST['hidetitle']) ? true : false;              

            $this->_slides[$index]->_headertext = $_POST['headertext'];
            $this->_slides[$index]->_text = $_POST['text'];
            
            $this->_slides[$index]->_imagelink = $_POST['imagelink'];
            $this->_slides[$index]->_pagelink = $_POST['pagelink'];   
            
            $this->_slides[$index]->_btnlinkAhide = isset($_POST['btnlinkAhide']) ? true : false;
            $this->_slides[$index]->_btnlinkAname = $_POST['btnlinkAname'];
            $this->_slides[$index]->_btnlinkA = $_POST['btnlinkA']; 
            $this->_slides[$index]->_btnlinkAtype = $_POST['btnlinkAtype'];
            $this->_slides[$index]->_btnlinkApage = $_POST['btnlinkApage']; 
            $this->_slides[$index]->_btnfloatleftA = isset($_POST['btnfloatleftA']) ? true : false;  
            $this->_slides[$index]->_btnfloatrightA = isset($_POST['btnfloatrightA']) ? true : false;             
            
            $this->_slides[$index]->_btnlinkBhide = isset($_POST['btnlinkBhide']) ? true : false;
            $this->_slides[$index]->_btnlinkBname = $_POST['btnlinkBname'];
            $this->_slides[$index]->_btnlinkB = $_POST['btnlinkB'];
            $this->_slides[$index]->_btnlinkBtype = $_POST['btnlinkBtype'];
            $this->_slides[$index]->_btnlinkBpage = $_POST['btnlinkBpage'];
            $this->_slides[$index]->_btnfloatleftB = isset($_POST['btnfloatleftB']) ? true : false;  
            $this->_slides[$index]->_btnfloatrightB = isset($_POST['btnfloatrightB']) ? true : false;                          
            
            $old = $this->_slides[$index]->_image;
            $this->_slides[$index]->_image = $_POST['image'];           
            
            if($old != $this->_slides[$index]->_image)
            {
                if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH.CPProgressSlider::THUMB_FOLDER_PATH))
                {
                    mkdir(CMS_THEME_TEMP_FOLDER_PATH.CPProgressSlider::THUMB_FOLDER_PATH);
                }
                
                $upload_dir = wp_upload_dir();
                $info = pathinfo($this->_slides[$index]->_image);         
                $subdir =  str_replace($upload_dir['baseurl'], '', str_replace($info['basename'], '', $this->_slides[$index]->_image));  
                $new_path = $upload_dir['basedir'].$subdir.$info['basename'];
                
                $img = imagecreatefromjpeg($new_path);
                $width = imagesx( $img );
                $height = imagesy( $img );   
                                        
                // create a new temporary image
                $tmp_img = imagecreatetruecolor(CPProgressSlider::THUMB_WIDTH, CPProgressSlider::THUMB_HEIGHT);

                // copy and resize old image into new image 
                imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, CPProgressSlider::THUMB_WIDTH, CPProgressSlider::THUMB_HEIGHT, $width, $height );
                $info = pathinfo($new_path);

                // save thumbnail into a file
                $this->_slides[$index]->_thumb = $info['filename'].'thumb.jpg';
                $path = CMS_THEME_TEMP_FOLDER_PATH.CPProgressSlider::THUMB_FOLDER_PATH.'/'.$this->_slides[$index]->_thumb;
                imagejpeg($tmp_img, $path, CPProgressSlider::THUMB_QUALITY);           
                
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
                
                $this->_slides[$index]->_thumbblack = $info['filename'].'thumbblack.jpg'; 
                $path = CMS_THEME_TEMP_FOLDER_PATH.CPProgressSlider::THUMB_FOLDER_PATH.'/'.$this->_slides[$index]->_thumbblack;
                imagejpeg($tmp_img, $path, CPProgressSlider::THUMB_QUALITY);                
            }                            
            update_option(CPProgressSlider::DBIDOPT_PROGRESS_SLIDER_SLIDES, $this->_slides);
            $this->_saved = true;                   
        }                   
    }
                     
    private function renderCoreSettingsCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        } 
        
         echo '
         <h6 class="cms-h6">Progress Slider Settings</h6>
         <hr class="cms-hr"/>
         <form action="#" method="post" >';
         
         echo '<div style="width:340px;float:left;background-color:transparent;">';
                                        
         echo '<table>
               <tr><td style="padding-right:5px;"><input type="checkbox" name="autoplay" '.($this->_slider['autoplay'] ? 'checked="checked" ' : '').' /></td><td> Autoplay</td></tr> 
               <tr><td style="padding-right:5px;"><input type="checkbox" name="firstrandom" '.($this->_slider['firstrandom'] ? 'checked="checked" ' : '').' /></td><td> Display random first slide</td></tr>
               <tr><td style="padding-right:5px;"><input type="checkbox" name="hidecontrol" '.($this->_slider['hidecontrol'] ? 'checked="checked" ' : '').' /></td><td> Hide control panel</td></tr>
               <tr><td style="padding-right:5px;padding-top:10px;"><input type="radio" value="'.CPProgressSlider::TRANSITION_FADE.'" '.($this->_slider['transition'] == CPProgressSlider::TRANSITION_FADE ? 'checked="checked" ' : '').' name="transition" /></td><td style="padding-top:10px;"> Use fade effect for slides transition</td></tr>
               <tr><td style="padding-right:5px;"><input type="radio" value="'.CPProgressSlider::TRANSITION_MOVE.'" '.($this->_slider['transition'] == CPProgressSlider::TRANSITION_MOVE ? 'checked="checked" ' : '').' name="transition" /></td><td> Use move effect for slides transition</td> </tr>                
               <tr><td style="padding-right:5px;padding-top:10px;"><input type="radio" value="'.CPProgressSlider::TRANSITION_DESC_FADE.'" '.($this->_slider['transitiondesc'] == CPProgressSlider::TRANSITION_DESC_FADE ? 'checked="checked" ' : '').' name="transitiondesc" /></td><td style="padding-top:10px;"> Use fade effect for description box</td></tr>
               <tr><td style="padding-right:5px;"><input type="radio" value="'.CPProgressSlider::TRANSITION_DESC_MOVE.'" '.($this->_slider['transitiondesc'] == CPProgressSlider::TRANSITION_DESC_MOVE ? 'checked="checked" ' : '').' name="transitiondesc" /></td><td> Use move effect for description box</td> </tr> 
               </table>';         
        echo '</div>';
                          
        echo '<div style="width:300px;float:left;">'; 
        echo '<input style="width:70px;text-align:center;" type="text" name="switchtime" value="'.$this->_slider['switchtime'].'" /> Slides switch time (ms)<br />';
        echo '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_slider['thumbbordercolor'].'" name="thumbbordercolor" /> Border color of selected thumb <br />';
        echo '</div>';
                            
               
        echo '<div style="clear:both"></div>';
        
        echo '<div style="margin-bottom:20px;"></div>';      
        echo '<input class="cms-submit" type="submit" value="Save" name="slider_save" /> 
        <input class="cms-submit" type="submit" value="Add new slide" name="slide_add" /></form>';
    }
    
    private function renderSlidesCMS()   
    {
         $count = count($this->_slides);
         if($count == 0) { return; }
        
        for($i = 0; $i < $count; $i++)
        {
             echo '<a name="slide_'.$i.'"></a>';
             echo '<div style="margin-top:30px;">';
             echo '<h6 class="cms-h6">Slide No '.($i+1).':</h6><hr class="cms-hr"/>';
             
             echo '<form action="#slide_'.$i.'" method="post" >';
         
             echo '<div style="float:left;width:240px;margin-right:30px;">
                <div style="width:240px;height:105px;border:1px solid #CCC;"><img style="width:240px;height:105px;border:none;" src="'.$this->_slides[$i]->_image.'" /></div>
                <input style="width:100%;" id="mslide_image'.$i.'" type="text" name="image" value="'.$this->_slides[$i]->_image.'" />          
             </div>';         
                     
             echo '<div style="float:left;width:240px;margin-right:30px;">';
             echo '<h6 class="cms-h6s">Slide options:</h6>';     
             echo '<input style="width:40px;text-align:center;" type="text" name="posx" value="'.$this->_slides[$i]->_x.'" /> Description position X <br />'; 
             echo '<input style="width:40px;text-align:center;" type="text" name="posy" value="'.$this->_slides[$i]->_y.'" /> Description position Y <br />';
             echo '<input style="width:40px;text-align:center;" type="text" name="width" value="'.$this->_slides[$i]->_width.'" /> Description width <br />'; 
             echo '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_slides[$i]->_header_bgcolor.'" name="headercolor" /> Header color <br />';  
           //  echo '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_slides[$i]->_header_textcolor.'" name="headertextcolor" /> Header text color <br />';
           //  echo '<input type="checkbox" '.($this->_slides[$i]->_header_usetextcolor ? ' checked="checked" ' : '').' name="headerusetextcolor" /> Use header text color <br />';
             echo '<input type="checkbox" '.($this->_slides[$i]->_hide ? ' checked="checked" ' : '').' name="hide" /> Hide slide <br />';       
             echo '<input type="checkbox" '.($this->_slides[$i]->_hidedescription ? ' checked="checked" ' : '').' name="hidedescription" /> Hide description <br />';                                                                      
             echo '<input type="checkbox" '.($this->_slides[$i]->_hideheader ? ' checked="checked" ' : '').' name="hideheader" /> Hide header <br />';
             echo '<input type="checkbox" '.($this->_slides[$i]->_hidetitle ? ' checked="checked" ' : '').' name="hidetitle" /> Hide title <br />';                                           
             echo '</div>';
            


             echo '<div style="float:left;width:320px;margin-right:0px;">
                <h6 class="cms-h6s">Description box:</h6>
                Header text:<br />
                <input style="width:320px;" type="text" name="headertext" value="'.stripcslashes($this->_slides[$i]->_headertext).'" />
                Title:<br />
                <input style="width:320px;" type="text" name="title" value="'.stripcslashes($this->_slides[$i]->_title).'" />                
                Description text:<br />
                <textarea style="font-size:11px;padding:8px;width:320px;height:100px;max-width:320px;color:#444444;" name="text">'.stripcslashes($this->_slides[$i]->_text).'</textarea>';
             echo '</div>';
           
             // clear both
             echo '<div style="clear:both;margin-bottom:30px;height:1px;"></div>';
             
             // slide image link
             echo '<div style="margin-bottom:20px;width:240px;float:left;margin-right:30px;">'; 
             
             echo '<h6 class="cms-h6s">URL link for slide image:</h6>';
              
             echo 'Insert manually:<br /><input style="width:240px;" type="text" name="imagelink" value="'.$this->_slides[$i]->_imagelink.'" />
                Page:<br>';
             echo $this->selectCtrlPagesList($this->_slides[$i]->_pagelink, 'pagelink', 240);
             echo '<br /><br /><input type="checkbox" '.($this->_slides[$i]->_uselink ? ' checked="checked" ' : '').' name="uselink" /> Use link <br />';

              
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_MANUALLY.'" name="linktype"  '.($this->_slides[$i]->_linktype == CPProgressSliderSlide::LINK_MANUALLY ? 'checked="checked" ' : '').' /> Use manually link <br />';
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_PAGE.'" name="linktype" '.($this->_slides[$i]->_linktype == CPProgressSliderSlide::LINK_PAGE ? 'checked="checked" ' : '').' /> Use page link<br />';              
             echo '</div>';               
             
             // button A
             echo '<div style="margin-bottom:20px;width:240px;float:left;margin-right:30px;">';        
             echo '<h6 class="cms-h6s">Button A:</h6>';
             echo 'Insert manually:<br /> <input style="width:240px;" type="text" name="btnlinkA" value="'.$this->_slides[$i]->_btnlinkA.'" />';
             echo 'Page:<br>';
             echo $this->selectCtrlPagesList($this->_slides[$i]->_btnlinkApage, 'btnlinkApage', 240);
             echo 'Name:<br /><input style="width:240px;" type="text" name="btnlinkAname" value="'.$this->_slides[$i]->_btnlinkAname.'" /><br /><br />';
             echo '<input type="checkbox" name="btnlinkAhide" '.($this->_slides[$i]->_btnlinkAhide ? ' checked="checked" ' : '').' /> Hide<br />';
             
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_MANUALLY.'" name="btnlinkAtype"  '.($this->_slides[$i]->_btnlinkAtype == CPProgressSliderSlide::LINK_MANUALLY ? 'checked="checked" ' : '').' /> Use manually link <br />';
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_PAGE.'" name="btnlinkAtype" '.($this->_slides[$i]->_btnlinkAtype == CPProgressSliderSlide::LINK_PAGE ? 'checked="checked" ' : '').' /> Use page link<br />';                                  
             echo '<input type="checkbox" name="btnfloatleftA" '.($this->_slides[$i]->_btnfloatleftA ? ' checked="checked" ' : '').' /> Float left<br />';
             echo '<input type="checkbox" name="btnfloatrightA" '.($this->_slides[$i]->_btnfloatrightA ? ' checked="checked" ' : '').' /> Float right<br />'; 
             echo '</div>';
             
             // button B
             echo '<div style="margin-bottom:20px;width:240px;float:left;margin-right:30px;">';        
             echo '<h6 class="cms-h6s">Button B:</h6>';
             echo 'Insert manually:<br /> <input style="width:240px;" type="text" name="btnlinkB" value="'.$this->_slides[$i]->_btnlinkB.'" />';
             echo 'Page:<br>';
             echo $this->selectCtrlPagesList($this->_slides[$i]->_btnlinkBpage, 'btnlinkBpage', 240);
             echo 'Name:<br /><input style="width:240px;" type="text" name="btnlinkBname" value="'.$this->_slides[$i]->_btnlinkBname.'" /><br /><br />';
             echo '<input type="checkbox" name="btnlinkBhide" '.($this->_slides[$i]->_btnlinkBhide ? ' checked="checked" ' : '').' /> Hide<br />';
             
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_MANUALLY.'" name="btnlinkBtype"  '.($this->_slides[$i]->_btnlinkBtype == CPProgressSliderSlide::LINK_MANUALLY ? 'checked="checked" ' : '').' /> Use manually link <br />';
             echo '<input type="radio" value="'.CPProgressSliderSlide::LINK_PAGE.'" name="btnlinkBtype" '.($this->_slides[$i]->_btnlinkBtype == CPProgressSliderSlide::LINK_PAGE ? 'checked="checked" ' : '').' /> Use page link<br />';
             echo '<input type="checkbox" name="btnfloatleftB" '.($this->_slides[$i]->_btnfloatleftB ? ' checked="checked" ' : '').' /> Float left<br />';
             echo '<input type="checkbox" name="btnfloatrightB" '.($this->_slides[$i]->_btnfloatrightB ? ' checked="checked" ' : '').' /> Float right<br />';                                                
             echo '</div>';                   
             
             // clear both
             echo '<div style="clear:both;margin-bottom:20px;height:1px;"></div>';           
             
                                                      
             echo '<input type="hidden" value="'.$i.'" name="index" />
                   <input class="cms-submit" type="submit" value="Save" name="slide_save" />
                   <input class="cms-submit" type="submit" value="Up" name="slide_moveup" />
                   <input class="cms-submit" type="submit" value="Down" name="slide_movedown" />
                   <input class="cms-upload upload_image_button" type="button" value="Upload (920x420)" name="mslide_image'.$i.'" />
                   <input onclick="return confirm('."'Delete this slide?'".')" class="cms-submit-delete" type="submit" value="Delete" name="slide_delete" /></form>';
             
             echo '</div>';
        } // for
                      
    }
         
} // class CPProgressSlider
        
        
?>
