<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_metaproject.php
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
*    CPMetaProjectSidebar
* Descripton:
*    Implementation of page siedabar selecting meta box
***********************************************************/
class CPMetaProjectSidebar extends DCC_Meta 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_sidebar';              
        $this->_std = CMS_NOT_SELECTED;
        $this->_title = 'Page sidebar:<br /><span class="cms-span-10-normal">(if not set default sidebar will be used)</span>';
        $this->_type = 'project';
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
} // class CPMetaProjectSidebar

/*********************************************************** 
* Class name:
*    CPMetaProjectDisableSidebar
* Descripton:
*    Implementation of CPMetaProjectDisableSidebar
***********************************************************/
class CPMetaProjectDisableSidebar extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_nosidebar';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to display project as full width page without sidebar.';
        $this->_type = 'project';
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
} // class CPMetaProjectDisableSidebar   


/*********************************************************** 
* Class name:
*    CPMetaProjectDisableVoting
* Descripton:
*    Implementation of CPMetaProjectDisableVoting
***********************************************************/
class CPMetaProjectDisableVoting extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_novoting';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to hide voting for this project.';
        $this->_type = 'project';
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
} // class CPMetaProjectDisableVoting 

/*********************************************************** 
* Class name:
*    CPMetaProjectCustomContent
* Descripton:
*    Implementation of CPMetaProjectCustomContent
***********************************************************/
class CPMetaProjectCustomContent extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_custom';              
        $this->_std = '';
        $this->_title = 'Check this field if you want to display fully custom content.';
        $this->_type = 'project';
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
} // class CPMetaProjectCustomContent   

/*********************************************************** 
* Class name:
*    CPMetaProjectMainImage
* Descripton:
*    Implementation of CPMetaProjectMainImage
***********************************************************/
class CPMetaProjectMainImage extends DCC_Meta 
{
    const THUMB_META_NAME_460 = 'project_thumb'; 
    const THUMB_META_NAME_600 = 'project_post_thumb'; 
    const THUMBS_FOLDER_PATH = '/projects';
    const THUMB_QUALITY = 100;
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_image';              
        $this->_std = '';
        $this->_title = 'Project main image URL: <br /><span class="cms-span-10-normal">(920x420 px, JPG)</span>';
        $this->_type = 'project';
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
        echo '<input style="width:480px;" type="text" id="'.$this->_name.'_path" name="'.$this->_name.'" value="'.$value.'" />'; 
        echo '<input style="width:140px;" class="cms-upload upload_image_button" type="button" value="Upload (920x420)" name="'.$this->_name.'_path" />';                                
    }
    
    
    public function save($postID)
    {
        parent::save($postID);
        
        $imgurl = get_post_meta($postID, $this->_name, true);
        
        if($imgurl != '')
        {
            if(!is_dir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaProjectMainImage::THUMBS_FOLDER_PATH))
            {
                mkdir(CMS_THEME_TEMP_FOLDER_PATH.CPMetaProjectMainImage::THUMBS_FOLDER_PATH);
            }
            
        
            $upload_dir = wp_upload_dir();
            $info = pathinfo($imgurl);         
            $subdir =  str_replace($upload_dir['baseurl'], '', str_replace($info['basename'], '', $imgurl));  
            $imgurl = $upload_dir['basedir'].$subdir.$info['basename'];              
             
            $img = imagecreatefromjpeg($imgurl);
            $width = imagesx($img);
            $height = imagesy($img);

            // thumb 460x210
            /////////////////////////////////////             
            $thumb460 = imagecreatetruecolor(460, 210);
            imagecopyresampled($thumb460, $img, 0, 0, 0, 0, 460, 210, $width, $height );
            $info = pathinfo($imgurl);
            
            // get thumb meta data for post   
            $url = get_post_meta($postID, CPMetaProjectMainImage::THUMB_META_NAME_460, true);
            $thumbname = '';
            if($url == '')
            {
               $thumbname = $info['filename'].'_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaProjectMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname; 
            } else
            {
               $info = pathinfo($url);
               $thumbname = $info['basename']; 
            } 
            
            // save thumbnail into a file            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaProjectMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname;
            update_post_meta($postID, CPMetaProjectMainImage::THUMB_META_NAME_460, $url);            
            imagejpeg($thumb460, $path, CPMetaProjectMainImage::THUMB_QUALITY); 
            
            // thumb 600x270
            /////////////////////////////////////
            $thumb600 = imagecreatetruecolor(600, 270);
            imagecopyresampled($thumb600, $img, 0, 0, 0, 0, 600, 270, $width, $height );
            $info = pathinfo($imgurl);
            
            // get thumb meta data for post   
            $url = get_post_meta($postID, CPMetaProjectMainImage::THUMB_META_NAME_600, true);
            $thumbname = '';
            if($url == '')
            {
               $thumbname = $info['filename'].'_post_'.time().'.jpg';
               $url = CMS_THEME_TEMP_FOLDER_URL.CPMetaProjectMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname; 
            } else
            {
               $info = pathinfo($url);
               $thumbname = $info['basename']; 
            }                                                                                         
            
            // save thumbnail into a file            
            $path = CMS_THEME_TEMP_FOLDER_PATH.CPMetaProjectMainImage::THUMBS_FOLDER_PATH.'/'.$thumbname;
            update_post_meta($postID, CPMetaProjectMainImage::THUMB_META_NAME_600, $url);            
            imagejpeg($thumb600, $path, CPMetaProjectMainImage::THUMB_QUALITY);             
            
            
        } # if                
    }
     
} // class CPMetaProjectMainImage


/*********************************************************** 
* Class name:
*    CPMetaProjectMainImageDesc
* Descripton:
*    Implementation of CPMetaProjectMainImageDesc
***********************************************************/
class CPMetaProjectMainImageDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_image_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for project main image or leave this field empty:';
        $this->_type = 'project';
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
} // class CPMetaProjectMainImageDesc

/*********************************************************** 
* Class name:
*    CPMetaProjectDesc
* Descripton:
*    Implementation of CPMetaProjectDesc
***********************************************************/
class CPMetaProjectDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for project: <br/><span class="cms-span-10-normal">(this description will be used when portfolio items are displayed, use it only when you want to 
        use some shortcodes or put some images on post content beginning, if not sepcified, orginal post content will be displayed)</span>';
        $this->_type = 'project';
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
} // class CPMetaProjectDesc


/*********************************************************** 
* Class name:
*    CPMetaProjectInfo
* Descripton:
*    Implementation of CPMetaProjectInfo
***********************************************************/
class CPMetaProjectInfo extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'project_info';              
        $this->_std = '';
        $this->_title = 'Here you can type some additional project information, grouped in piar (name, value): <br/><span class="cms-span-10-normal">(use shortcode dcs_info e.g [dcs_info name="Name" value="Value"] for more information go to shortcode help or documentation)</span>';
        $this->_type = 'project';
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
} // class CPMetaProjectInfo       
