<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_metanews.php
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
*    CPMetaNewsCustomContent
* Descripton:
*    Implementation of CPMetaNewsCustomContent
***********************************************************/
class CPMetaNewsCustomContent extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_custom';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to display fully custom content.';
        $this->_type = 'news';
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
} // class CPMetaNewsCustomContent
 

/*********************************************************** 
* Class name:
*    CPMetaNewsDisableVoting
* Descripton:
*    Implementation of CPMetaNewsDisableVoting
***********************************************************/
class CPMetaNewsDisableVoting extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_novoting';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to hide voting for this news.';
        $this->_type = 'news';
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
} // class CPMetaNewsDisableVoting  
 
 
/*********************************************************** 
* Class name:
*    CPMetaNewsMainImage
* Descripton:
*    Implementation of CPMetaNewsMainImage
***********************************************************/
class CPMetaNewsMainImage extends DCC_Meta 
{
    const THUMB_WIDTH = 265;
    const THUMB_HEIGHT = 120;      
    const THUMB_QUALITY = 100;     
    const THUMB_META_NAME = 'news_thumb_image'; 

    const MINI_STAGE_THUMB_WIDTH = 110;
    const MINI_STAGE_THUMB_HEIGHT = 50;     
    const MINI_THUMB_WIDTH = 50;
    const MINI_THUMB_HEIGHT = 50;      
    const MINI_THUMB_META_NAME = 'news_mini_thumb_image';
    const MINI_THUMB_COPY_OFFSET_X = 30;
    const MINI_THUMB_COPY_OFFSET_Y = 0;
   
    const SMALL_THUMB_WIDTH = 130;
    const SMALL_THUMB_HEIGHT = 59;      
    const SMALL_THUMB_META_NAME = 'news_small_thumb_image';
    const SMALL_THUMB_COPY_OFFSET = 14;
    
    const THUMBS_FOLDER_PATH = '/news';
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_image';              
        $this->_std = '';
        $this->_title = 'News main image URL: <br /><span class="cms-span-10-normal">(600x270 px, JPG)</span>';
        $this->_type = 'news';
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
            if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaNewsMainImage::THUMBS_FOLDER_PATH))
            {
                mkdir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaNewsMainImage::THUMBS_FOLDER_PATH);
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
            $tmp_img = imagecreatetruecolor(CPMetaNewsMainImage::THUMB_WIDTH, CPMetaNewsMainImage::THUMB_HEIGHT);

            // copy and resize old image into new image 
            imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, CPMetaNewsMainImage::THUMB_WIDTH, CPMetaNewsMainImage::THUMB_HEIGHT, $width, $height );
            $info = pathinfo($bigimage);
            
            // get thumb meta data for post   
            $url = get_post_meta($postID, CPMetaNewsMainImage::THUMB_META_NAME, true);
            $thumbname = '';
            if($url == '')
            {
               $thumbname = $info['filename'].'_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname; 
            } else
            {
               $info = pathinfo($url);
               $thumbname = $info['basename']; 
            }
            
            // save thumbnail into a file            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname;
            update_post_meta($postID, CPMetaNewsMainImage::THUMB_META_NAME, $url);            
            imagejpeg($tmp_img, $path, CPMetaNewsMainImage::THUMB_QUALITY);             
            
            
            
            
            // mini thumb 50x50px
            ////////////////////////////////////////
            $mini_stage = imagecreatetruecolor(CPMetaNewsMainImage::MINI_STAGE_THUMB_WIDTH, CPMetaNewsMainImage::MINI_STAGE_THUMB_HEIGHT);
            imagecopyresampled($mini_stage, $img, 0, 0, 0, 0, CPMetaNewsMainImage::MINI_STAGE_THUMB_WIDTH, CPMetaNewsMainImage::MINI_STAGE_THUMB_HEIGHT, $width, $height );
            $mini_img = imagecreatetruecolor(CPMetaNewsMainImage::MINI_THUMB_WIDTH, CPMetaNewsMainImage::MINI_THUMB_HEIGHT);
            imagecopy($mini_img, $mini_stage, 0, 0, CPMetaNewsMainImage::MINI_THUMB_COPY_OFFSET_X, CPMetaNewsMainImage::MINI_THUMB_COPY_OFFSET_Y, CPMetaNewsMainImage::MINI_THUMB_WIDTH, CPMetaNewsMainImage::MINI_THUMB_HEIGHT);
            
            $url = get_post_meta($postID, CPMetaNewsMainImage::MINI_THUMB_META_NAME, true);
            $minithumbname = '';
            if($url == '')
            {
               $minithumbname = $info['filename'].'_mini_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$minithumbname;  
            } else
            {
               $info = pathinfo($url);
               $minithumbname = $info['basename'];                 
            }
                        
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$minithumbname; 
            update_post_meta($postID, CPMetaNewsMainImage::MINI_THUMB_META_NAME, $url);            
            imagejpeg($mini_img, $path, CPMetaNewsMainImage::THUMB_QUALITY);
            
            
            
            
            // small thumb
            ////////////////////////////////////////
            $small_img = imagecreatetruecolor(CPMetaNewsMainImage::SMALL_THUMB_WIDTH, CPMetaNewsMainImage::SMALL_THUMB_HEIGHT); 
            imagecopyresampled($small_img, $img, 0, 0, 0, 0, CPMetaNewsMainImage::SMALL_THUMB_WIDTH, CPMetaNewsMainImage::SMALL_THUMB_HEIGHT, $width, $height );
            
            $url = get_post_meta($postID, CPMetaNewsMainImage::SMALL_THUMB_META_NAME, true);
            $smallthumbname = '';
            if($url == '')
            {
               $smallthumbname = $info['filename'].'_small_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$smallthumbname; 
            } else
            {
               $info = pathinfo($url);
               $smallthumbname = $info['basename'];                
            }
            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaNewsMainImage::THUMBS_FOLDER_PATH.'/'.$smallthumbname;
            update_post_meta($postID, CPMetaNewsMainImage::SMALL_THUMB_META_NAME, $url);            
            imagejpeg($small_img, $path, CPMetaNewsMainImage::THUMB_QUALITY);                                         
                        
        }        
    }  
} // class CPMetaNewsMainImage


/*********************************************************** 
* Class name:
*    CPMetaNewsMainImageDesc
* Descripton:
*    Implementation of CPMetaNewsMainImageDesc
***********************************************************/
class CPMetaNewsMainImageDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_image_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for news image or leave this field empty:';
        $this->_type = 'news';
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
} // class CPMetaNewsMainImageDesc

/*********************************************************** 
* Class name:
*    CPMetaNewsDesc
* Descripton:
*    Implementation of CPMetaNewsDesc
***********************************************************/
class CPMetaNewsDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for news: <br/><span class="cms-span-10-normal">(this description will be used in featured news widget, use it only when you want 
        use some shortcodes at the beginning of news content, if not sepcified, orginal news content will be displayed)</span>';
        $this->_type = 'news';
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
} // class CPMetaNewsDesc 
                             
/*********************************************************** 
* Class name:
*    CPMetaNewsVideo
* Descripton:
*    Implementation of CPMetaNewsVideo
***********************************************************/
class CPMetaNewsVideo extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_video';              
        $this->_std = '';
        $this->_title = 'News video URL / Shortcode:<br /> <span class="cms-span-10-normal">(Width: 600px, to read how to insert videos or shortcode go the documentation, or check Shortcode Details / FX Blog pages)</span>';
        $this->_type = 'news';
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
} // class CPMetaNewsVideo


/*********************************************************** 
* Class name:
*    CPMetaNewsDisableVideo
* Descripton:
*    Implementation of CPMetaNewsDisableVideo
***********************************************************/
class CPMetaNewsDisableVideo extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_disable_video';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to disable video code / shortcode without deleting it.';
        $this->_type = 'news';
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
} // class CPMetaNewsDisableVideo    
     
