<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_metapost.php
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
*    CPMetaPostDisableSidebar
* Descripton:
*    Implementation of CPMetaPostDisableSidebar
***********************************************************/
class CPMetaPostDisableSidebar extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_nosidebar';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to display post as full width page without sidebar.';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
         // echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<div style="margin-top:5px;"><input type="checkbox" id="'.$this->_name.'" name="'.$this->_name.'" '.($value ? ' checked="checked" ' : '').' /> <span >'.$this->_title.'</span></div>';                          
    } 
} // class CPMetaPostDisableSidebar   


/*********************************************************** 
* Class name:
*    CPMetaPostDisableVoting
* Descripton:
*    Implementation of CPMetaPostDisableVoting
***********************************************************/
class CPMetaPostDisableVoting extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_novoting';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to hide voting for this post.';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
         // echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<div style="margin-top:5px;"><input type="checkbox" id="'.$this->_name.'" name="'.$this->_name.'" '.($value ? ' checked="checked" ' : '').' /> <span >'.$this->_title.'</span></div>';                          
    } 
} // class CPMetaPostDisableVoting   

/*********************************************************** 
* Class name:
*    CPMetaPostCustomContent
* Descripton:
*    Implementation of CPMetaPostCustomContent
***********************************************************/
class CPMetaPostCustomContent extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_custom';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to display fully custom content.';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
         // echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<div style="margin-top:5px;"><input type="checkbox" id="'.$this->_name.'" name="'.$this->_name.'" '.($value ? ' checked="checked" ' : '').' /> <span >'.$this->_title.'</span></div>';                          
    } 
} // class CPMetaPostCustomContent 

/*********************************************************** 
* Class name:
*    CPMetaPostSidebar
* Descripton:
*    Implementation of page siedabar selecting meta box
***********************************************************/
class CPMetaPostSidebar extends DCC_Meta 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_sidebar';              
        $this->_std = CMS_NOT_SELECTED;
        $this->_title = 'Post sidebar:<br /><span class="cms-span-10-normal">(if not set blog or default sidebar will be used)</span>';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                                
        // box value
        
        $dccp = GetDCCPInterface();
        $pi_general = $dccp->getIGeneral();
        echo $pi_general->printSidebarsList(300, $this->_name, $value);

    } // display    
} // class CPMetaPostSidebar

/*********************************************************** 
* Class name:
*    CPMetaPostMainImage
* Descripton:
*    Implementation of CPMetaPostMainImage
***********************************************************/
class CPMetaPostMainImage extends DCC_Meta 
{
    const THUMB_WIDTH = 265;
    const THUMB_HEIGHT = 120;      
    const THUMB_QUALITY = 100;     
    const THUMB_META_NAME = 'post_thumb_image'; 

    const MINI_STAGE_THUMB_WIDTH = 110;
    const MINI_STAGE_THUMB_HEIGHT = 50;     
    const MINI_THUMB_WIDTH = 50;
    const MINI_THUMB_HEIGHT = 50;      
    const MINI_THUMB_META_NAME = 'post_mini_thumb_image';
    const MINI_THUMB_COPY_OFFSET_X = 30;
    const MINI_THUMB_COPY_OFFSET_Y = 0;
   
    const SMALL_THUMB_WIDTH = 130;
    const SMALL_THUMB_HEIGHT = 59;      
    const SMALL_THUMB_META_NAME = 'post_small_thumb_image';
    const SMALL_THUMB_COPY_OFFSET = 14;
    
    const THUMBS_FOLDER_PATH = '/blog';
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_image';              
        $this->_std = '';
        $this->_title = 'Post main image URL: <br /><span class="cms-span-10-normal">(600x270 px, JPG)</span>';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';        
                         
            if($value != '')
            {
                echo '<div style="width:600px;height:270px;border:1px solid #eeeeee;margin-bottom:10px;">';
                echo '<img style="display:block;width:600px;height:270px;" src="'.$value.'"/>';
                echo '</div>';
            }
                                   
        // box value
        echo '<input style="width:460px;" type="text" id="'.$this->_name.'_path" name="'.$this->_name.'" value="'.$value.'" />'; 
        echo '<input style="width:140px;" class="cms-upload upload_image_button" type="button" value="Upload (600x270)" name="'.$this->_name.'_path" />';                                
    }
    
    public function save($postID)
    {
        parent::save($postID);
        
        // generate 50% thumb, mini thumb 50x50px
        $bigimage = get_post_meta($postID, $this->_name, true);
        if($bigimage != '')
        {
            if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaPostMainImage::THUMBS_FOLDER_PATH))
            {
                mkdir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaPostMainImage::THUMBS_FOLDER_PATH);
            }
            
            // thumb
            /////////////////////////////////////            
            $upload_dir = wp_upload_dir();
            $info = pathinfo($bigimage);         
            $subdir =  str_replace($upload_dir['baseurl'], '', str_replace($info['basename'], '', $bigimage));  
            $bigimage = $upload_dir['basedir'].$subdir.$info['basename'];             
            
            $img = imagecreatefromjpeg($bigimage);
            $width = imagesx($img);
            $height = imagesy($img);   

            // create a new temporary image
            $tmp_img = imagecreatetruecolor(CPMetaPostMainImage::THUMB_WIDTH, CPMetaPostMainImage::THUMB_HEIGHT);

            // copy and resize old image into new image 
            imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, CPMetaPostMainImage::THUMB_WIDTH, CPMetaPostMainImage::THUMB_HEIGHT, $width, $height );
            $info = pathinfo($bigimage);
            
            // get thumb meta data for post   
            $url = get_post_meta($postID, CPMetaPostMainImage::THUMB_META_NAME, true);
            $thumbname = '';
            if($url == '')
            {
               $thumbname = $info['filename'].'_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname; 
            } else
            {
               $info = pathinfo($url);
               $thumbname = $info['basename']; 
            }
            
            // save thumbnail into a file            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname;
            update_post_meta($postID, CPMetaPostMainImage::THUMB_META_NAME, $url);            
            imagejpeg($tmp_img, $path, CPMetaPostMainImage::THUMB_QUALITY);             
            
            
            
            
            // mini thumb 50x50px
            ////////////////////////////////////////
            $mini_stage = imagecreatetruecolor(CPMetaPostMainImage::MINI_STAGE_THUMB_WIDTH, CPMetaPostMainImage::MINI_STAGE_THUMB_HEIGHT);
            imagecopyresampled($mini_stage, $img, 0, 0, 0, 0, CPMetaPostMainImage::MINI_STAGE_THUMB_WIDTH, CPMetaPostMainImage::MINI_STAGE_THUMB_HEIGHT, $width, $height );
            $mini_img = imagecreatetruecolor(CPMetaPostMainImage::MINI_THUMB_WIDTH, CPMetaPostMainImage::MINI_THUMB_HEIGHT);
            imagecopy($mini_img, $mini_stage, 0, 0, CPMetaPostMainImage::MINI_THUMB_COPY_OFFSET_X, CPMetaPostMainImage::MINI_THUMB_COPY_OFFSET_Y, CPMetaPostMainImage::MINI_THUMB_WIDTH, CPMetaPostMainImage::MINI_THUMB_HEIGHT);
            
            $url = get_post_meta($postID, CPMetaPostMainImage::MINI_THUMB_META_NAME, true);
            $minithumbname = '';
            if($url == '')
            {
               $minithumbname = $info['filename'].'_mini_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$minithumbname;  
            } else
            {
               $info = pathinfo($url);
               $minithumbname = $info['basename'];                 
            }
                        
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$minithumbname; 
            update_post_meta($postID, CPMetaPostMainImage::MINI_THUMB_META_NAME, $url);            
            imagejpeg($mini_img, $path, CPMetaPostMainImage::THUMB_QUALITY);
            
            
            
            
            // small thumb
            ////////////////////////////////////////
            $small_img = imagecreatetruecolor(CPMetaPostMainImage::SMALL_THUMB_WIDTH, CPMetaPostMainImage::SMALL_THUMB_HEIGHT); 
            imagecopyresampled($small_img, $img, 0, 0, 0, 0, CPMetaPostMainImage::SMALL_THUMB_WIDTH, CPMetaPostMainImage::SMALL_THUMB_HEIGHT, $width, $height );
            
            $url = get_post_meta($postID, CPMetaPostMainImage::SMALL_THUMB_META_NAME, true);
            $smallthumbname = '';
            if($url == '')
            {
               $smallthumbname = $info['filename'].'_small_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$smallthumbname; 
            } else
            {
               $info = pathinfo($url);
               $smallthumbname = $info['basename'];                
            }
            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaPostMainImage::THUMBS_FOLDER_PATH.'/'.$smallthumbname;
            update_post_meta($postID, CPMetaPostMainImage::SMALL_THUMB_META_NAME, $url);            
            imagejpeg($small_img, $path, CPMetaPostMainImage::THUMB_QUALITY);                                         
                        
        }        
    }  
} // class CPMetaPostMainImage


/*********************************************************** 
* Class name:
*    CPMetaPostBigImage
* Descripton:
*    Implementation of CPMetaPostBigImage
***********************************************************/
class CPMetaPostBigImage extends DCC_Meta 
{    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_big_image';              
        $this->_std = '';
        $this->_title = 'Post big image URL: <br /><span class="cms-span-10-normal">(920x420 px, JPG, use only when you want to display post as full width page, in this mode you must also set 600x270 image)</span>';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';        
                         
            if($value != '')
            {
                echo '<div style="width:800px;height:365px;border:1px solid #eeeeee;margin-bottom:10px;">';
                echo '<img style="display:block;width:800px;height:365px;" src="'.$value.'"/>';
                echo '</div>';
            }
                                   
        // box value
        echo '<input style="width:460px;" type="text" id="'.$this->_name.'_path" name="'.$this->_name.'" value="'.$value.'" />'; 
        echo '<input style="width:140px;" class="cms-upload upload_image_button" type="button" value="Upload (920x420)" name="'.$this->_name.'_path" />';                                
    }
    

} // class CPMetaPostMainImage


/*********************************************************** 
* Class name:
*    CPMetaPostMainImageDesc
* Descripton:
*    Implementation of CPMetaPostMainImageDesc
***********************************************************/
class CPMetaPostMainImageDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_image_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for post image or leave this field empty:';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<input style="width:480px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPostMainImageDesc

/*********************************************************** 
* Class name:
*    CPMetaPostDesc
* Descripton:
*    Implementation of CPMetaPostDesc
***********************************************************/
class CPMetaPostDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for post: <br/><span class="cms-span-10-normal">(this description will be used in featured posts widget, use it only when you want to 
        use some shortcodes at the begining of post content, if not specified, orginal post content will be displayed)</span>';
        $this->_type = 'post';
        $this->_desc = '';                                                  
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<textarea style="padding:8px;max-width:620px;width:620px;height:100px;color:#444444;font-size:11px;" id="'.$this->_name.'" name="'.$this->_name.'">'.$value.'</textarea>';                          
    } 
} // class CPMetaPostDesc       
    
/*********************************************************** 
* Class name:
*    CPMetaPostVideo
* Descripton:
*    Implementation of CPMetaPostVideo
***********************************************************/
class CPMetaPostVideo extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_video';              
        $this->_std = '';
        $this->_title = 'Post video URL / Shortcode:<br /> <span class="cms-span-10-normal">(Width: 600px, to read how to insert videos or shortcode go the documentation)</span>';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';        
                    
        if($value != '')
        {
            echo '<div style="margin-bottom:10px;">'.$value.'</div>';  
        }            
                               
        // box value
        echo '<textarea style="padding:8px;max-width:620px;width:620px;height:100px;color:#444444;font-size:11px;" id="'.$this->_name.'" name="'.$this->_name.'">'.$value.'</textarea>';                              
    }      
} // class CPMetaPostVideo

/*********************************************************** 
* Class name:
*    CPMetaPostVideoFull
* Descripton:
*    Implementation of CPMetaPostVideoFull
***********************************************************/
class CPMetaPostVideoFull extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_video_full';              
        $this->_std = '';
        $this->_title = 'Post full width video URL / Shortcode:<br /> <span class="cms-span-10-normal">(Width: 920px, to read how to insert videos or shortcode go the documentation)</span>';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';        
                    
        if($value != '')
        {
           // echo '<div style="margin-bottom:10px;">'.$value.'</div>';  
        }            
                               
        // box value
        echo '<textarea style="padding:8px;max-width:620px;width:620px;height:100px;color:#444444;font-size:11px;" id="'.$this->_name.'" name="'.$this->_name.'">'.$value.'</textarea>';                              
    }      
} // class CPMetaPostVideoFull

/*********************************************************** 
* Class name:
*    CPMetaPostDisableVideo
* Descripton:
*    Implementation of CPMetaPostDisableVideo
***********************************************************/
class CPMetaPostDisableVideo extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'post_disable_video';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to disable video code / shortcode without deleting it.';
        $this->_type = 'post';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
         // echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        echo '<div style="margin-top:5px;"><input type="checkbox" id="'.$this->_name.'" name="'.$this->_name.'" '.($value ? ' checked="checked" ' : '').' /> <span >'.$this->_title.'</span></div>';                          
    } 
} // class CPMetaPostDisableVideo    
        
?>