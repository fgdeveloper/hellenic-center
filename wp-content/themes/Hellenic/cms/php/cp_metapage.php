<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_metapage.php
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
*    CPMetaPageDesc
* Descripton:
*    Implementation of CPMetaPageDesc
***********************************************************/
class CPMetaPageDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_desc';              
        $this->_std = '';
        $this->_title = 'Type here description for page: <br/><span class="cms-span-10-normal">(this description will be displayed in search results, and it is used also for dcs_page shortcode)</span>';
        $this->_type = 'page';
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
} // class CPMetaPageDesc


/*********************************************************** 
* Class name:
*    CPMetaPageExtraTop
* Descripton:
*    Implementation of CPMetaPageExtraTop
***********************************************************/
class CPMetaPageExtraTop extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_extra_top';              
        $this->_std = '';
        $this->_title = 'Write here page extra top content: <br/><span class="cms-span-10-normal">(you can write regular HTML code and any shorcodes)</span>';
        $this->_type = 'page';
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
        echo '<textarea style="padding:8px;max-width:620px;width:620px;height:160px;color:#444444;font-size:11px;" id="'.$this->_name.'" name="'.$this->_name.'">'.$value.'</textarea>';                          
    } 
} // class CPMetaPageExtraTop


/*********************************************************** 
* Class name:
*    CPMetaPageDisableExtraTop
* Descripton:
*    Implementation of CPMetaPageDisableExtraTop
***********************************************************/
class CPMetaPageDisableExtraTop extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_disable_extra_top';              
        $this->_std = '';
        $this->_title = 'Check this field if you want disable page extra top content.';
        $this->_type = 'page';
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
} // class CPMetaPageDisableExtraTop 


/*********************************************************** 
* Class name:
*    CPMetaPageBlogAuthor
* Descripton:
*    Implementation of CPMetaPageBlogAuthor
***********************************************************/
class CPMetaPageBlogAuthors extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'blog_authors';              
        $this->_std = '';
        $this->_title = 'Select author or authors. Only posts from these authors (or author) will be displayed on blog page. If nothing is selected, posts from all authors can be displayed: <br/><span class="cms-span-10-normal">(works only for blog page template)</span>';
        $this->_type = 'page';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();
        if(!is_array($value))
        {
           $value = Array(); 
        } 
        
        // other method to get single user data is get_userdata(userid)
        $users = get_users_of_blog();
                  
        // title        
        $out = '';
        $out .= '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        $count = count($users);        
        $out .= '<select id="'.$this->_name.'" name="'.$this->_name.'[]" multiple="multiple" style="height:120px;min-width:300px;">';
            for($i = 0; $i < $count; $i++)
            {
                $out .= '<option value="'.$users[$i]->ID.'" ';
                $out .= (in_array($users[$i]->ID, $value)) ? ' selected="selected" ' : ''; 
                $out .= ' >'.$users[$i]->display_name.'</option>';    
            }            
        
        $out .= '</select><br />';
        $out .= '<span style="font-size:10px;line-height:16px;color:#AAAAAA;">Ctrl+Mouse</span><br />';
        
        echo $out;                          
    } 
} // class CPMetaPageBlogAuthors


/*********************************************************** 
* Class name:
*    CPMetaPageSubtitle
* Descripton:
*    Implementation of CPMetaPageSubtitle
***********************************************************/
class CPMetaPageSubtitle extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_subtitle';              
        $this->_std = '';
        $this->_title = 'Page subtitle:<br /><span class="cms-span-10-normal">(works only for pages with title displayed automatically)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageSubtitle


/*********************************************************** 
* Class name:
*    CPMetaPagePortfolioCat
* Descripton:
*    Implementation of CPMetaPagePortfolioCat
***********************************************************/
class CPMetaPagePortfolioCat extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'portfolio_categories';              
        $this->_std = '';
        $this->_title = 'Type here ID numbers for categories which should be displayed in portfolio e.g. "1,23,4":<br /><span class="cms-span-10-normal">(works only with portfolio-post page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPagePortfolioCat

/*********************************************************** 
* Class name:
*    CPMetaPageBlogCat
* Descripton:
*    Implementation of CPMetaPageBlogCat
***********************************************************/
class CPMetaPageBlogCat extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'blog_categories';              
        $this->_std = '';
        $this->_title = 'Type here ID numbers for categories which should be displayed in blog page e.g. "1,23,4" or leave blank to display all blog categories:<br /><span class="cms-span-10-normal">(works only with blog page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageBlogCat

/*********************************************************** 
* Class name:
*    CPMetaPageBlogExCat
* Descripton:
*    Implementation of CPMetaPageBlogExCat
***********************************************************/
class CPMetaPageBlogExCat extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'blog_ex_categories';              
        $this->_std = '';
        $this->_title = 'Type here ID numbers for categories which should be excluded from blog page e.g. "1,23,4", if set CMS General settings will be not used:<br /><span class="cms-span-10-normal">(works only with blog page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageBlogExCat

/*********************************************************** 
* Class name:
*    CPMetaPageNewsCat
* Descripton:
*    Implementation of CPMetaPageNewsCat
***********************************************************/
class CPMetaPageNewsCat extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_categories';              
        $this->_std = '';
        $this->_title = 'Type here ID numbers for categories which should be displayed in news page e.g. "1,23,4" or leave blank to display all news categories:<br /><span class="cms-span-10-normal">(works only with news page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageNewsCat

/*********************************************************** 
* Class name:
*    CPMetaPageNewsPostsCount
* Descripton:
*    Implementation of CPMetaPageNewsPostsCount
***********************************************************/
class CPMetaPageNewsPostsCount extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_count';              
        $this->_std = '';
        $this->_title = 'Number of posts displayed per one news page (can be set to 10 for example):<br /><span class="cms-span-10-normal">(works only with news page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageNewsPostsCount

/*********************************************************** 
* Class name:
*    CPMetaPageNewsFeatured
* Descripton:
*    Implementation of CPMetaPageNewsFeatured
***********************************************************/
class CPMetaPageNewsFeatured extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'news_featured';              
        $this->_std = '';
        $this->_title = 'Type here featured news ID, you can write more than one ID e.g. "2,45,65,34,7":<br /><span class="cms-span-10-normal">(works only with news page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageNewsFeatured

/*********************************************************** 
* Class name:
*    CPMetaPageTitleDesc
* Descripton:
*    Implementation of CPMetaPageTitleDesc
***********************************************************/
class CPMetaPageTitleDesc extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_title_desc';              
        $this->_std = '';
        $this->_title = 'Type here a few words of description for page title (2,3 words):<br /><span class="cms-span-10-normal">(will be used for widget displaying on sidebar selected pages)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
} // class CPMetaPageTitleDesc


/*********************************************************** 
* Class name:
*    CPMetaPageSidebar
* Descripton:
*    Implementation of page siedabar selecting meta box
***********************************************************/
class CPMetaPageSidebar extends DCC_Meta 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_sidebar';              
        $this->_std = CMS_NOT_SELECTED;
        $this->_title = 'Page sidebar:<br /><span class="cms-span-10-normal">(if not set default sidebar will be used)</span>';
        $this->_type = 'page';
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
} // class CPMetaPageSidebar

/*********************************************************** 
* Class name:
*    CPMetaPageNextGenGallery
* Descripton:
*    Implementation of page siedabar selecting meta box
***********************************************************/
class CPMetaPageNextGenGallery extends DCC_Meta 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_gallery';              
        $this->_std = CMS_NOT_SELECTED;
        $this->_title = 'Choose gallery for page:<br /><span class="cms-span-10-normal">(use only with gallery page template, selected gallery should have 150x150 thumbnails)</span>';
        $this->_type = 'page';
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
        
        global $nggdb; global $ngg;
        if(isset($nggdb))
        {
            $gallerylist = $nggdb->find_all_galleries('gid', 'DESC');
            
            $out = '';
            $out .= '<select style="width:300px;" id="'.$this->_name.'" name="'.$this->_name.'">';
            $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($value == CMS_NOT_SELECTED ? ' selected="selected" ' : '').' >Not selected</option>';
            foreach($gallerylist as $gal)
            {
                $out .= '<option ';
                $out .= ' value="'.$gal->gid.'" ';
                $out .= $value == $gal->gid ? ' selected="selected" ' : '';
                $out .= '>'.$gal->title;
                $out .= '</option>';
            }
            $out .= '</select>';
            echo $out;  
              
        } else
        {
            echo '<span style="color:#880000;font-size:10px;">Can\'t find NextGen Gallery Plugin</span>'; 
        }
    } // display    
} // class CPMetaPageNextGenGallery


/*********************************************************** 
* Class name:
*    CPMetaPageGalleryItemsNumber
* Descripton:
*    Implementation of page siedabar selecting meta box
***********************************************************/
class CPMetaPageGalleryItemsNumber extends DCC_Meta 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_gallery_items';              
        $this->_std = 15;
        $this->_title = 'Choose number of items displayed on one gallery page:<br /><span class="cms-span-10-normal">(use only with gallery page template)</span>';
        $this->_type = 'page';
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
        
        $data = Array();
        for($i = 1; $i <= 40; $i++)
        {
            array_push($data, ($i*5));
        }
        
        $out = '';
        $out .= '<select style="width:300px;" id="'.$this->_name.'" name="'.$this->_name.'">';
        foreach($data as $dat)
        {
            $out .= '<option ';
            $out .= ' value="'.$dat.'" ';
            $out .= $value == $dat ? ' selected="selected" ' : '';
            $out .= '>'.$dat;
            $out .= '</option>';
        }
        $out .= '</select>';
        echo $out;  

    } // display    
} // class CPMetaPageGalleryItemsNumber


/*********************************************************** 
* Class name:
*    CPMetaPageProjectsTypes
* Descripton:
*    Implementation of CPMetaPageProjectsTypes
***********************************************************/
class CPMetaPageProjectsTypes extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'portfolio_project_cat';              
        $this->_std = '';
        $this->_title = 'Select category or categories displayed in portfolio: <br/><span class="cms-span-10-normal">(works only with portfolio-project page template)</span>';
        $this->_type = 'page';
        $this->_desc = '';
    } // constructor 

    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();
        if(!is_array($value))
        {
           $value = Array(); 
        } 
        
        // other method to get single user data is get_userdata(userid)
        $data = get_terms('project_cat', 'orderby=name&hide_empty=0'); 
                  
        // title        
        $out = '';
        $out .= '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                       
        // box value
        $count = count($data);        
        $out .= '<select id="'.$this->_name.'" name="'.$this->_name.'[]" multiple="multiple" style="height:120px;min-width:300px;">';
            for($i = 0; $i < $count; $i++)
            {
                $out .= '<option value="'.$data[$i]->term_id.'" ';
                $out .= (in_array($data[$i]->term_id, $value)) ? ' selected="selected" ' : ''; 
                $out .= ' >'.$data[$i]->name.'</option>';    
            }            
        
        $out .= '</select><br />';
        $out .= '<span style="font-size:10px;line-height:16px;color:#AAAAAA;">Ctrl+Mouse</span><br />';
        
        echo $out;                          
    } 
} // class CPMetaPageProjectsTypes


/*********************************************************** 
* Class name:
*    CPMetaPageProjectsRowsCount
* Descripton:
*    Implementation of CPMetaPageProjectsRowsCount
***********************************************************/
class CPMetaPageProjectsRowsCount extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_projects_rows';              
        $this->_std = '3';
        $this->_title = 'Number of items rows displayed in portfolio:<br /><span class="cms-span-10-normal">(can be set to 1 or higher value, works only for portfolio-project page template)</span>';
        $this->_type = 'page';
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
        echo '<input style="width:300px;" type="text" id="'.$this->_name.'" name="'.$this->_name.'" value="'.$value.'" />';                          
    } 
    
    public function save($postID)
    {
        parent::save($postID);        
    }
} // class CPMetaPageProjectsRowsCount


/*********************************************************** 
* Class name:
*    CPMetaPageProjectsDisplayMode
* Descripton:
*    Implementation of class CPMetaPageProjectsDisplayMode
***********************************************************/
class CPMetaPageProjectsDisplayMode extends DCC_Meta 
{
    const MODE_COLUMN_ONE = 1;
    const MODE_COLUMN_TWO = 2;
    const MODE_COLUMN_THREE = 3;
    const MODE_COLUMN_FOUR = 4;
    const MODE_SLIDER = 5;
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_projects_mode';              
        $this->_std = '';
        $this->_title = 'Choose projects portfolio display mode:<br /><span class="cms-span-10-normal">(use only with portfolio-project page template)</span>';
        $this->_type = 'page';
        $this->_desc = '';
    } // constructor 

    public $_modes = Array(
        CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE => 'One Column',
        CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO => 'Two Columns',
        CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE => 'Three Columns',
        CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR => 'Four Columns',
        CPMetaPageProjectsDisplayMode::MODE_SLIDER => 'Slider'        
    );
    
    
    /*********************************************************** 
    * Public functions
    ************************************************************/    
    public function display()
    {       
        $value = $this->initDisplay();            
        // title
        echo '<div style="font-size:10px;line-height:10px;font-weight:bold;margin-top:10px;margin-bottom:4px;">'.$this->_title.'</div>';                                
        // box value
        
        $out = '';
        $out .= '<select style="width:300px;" id="'.$this->_name.'" name="'.$this->_name.'">';
        foreach($this->_modes as $key => $name)
        {
            $out .= '<option ';
            $out .= ' value="'.$key.'" ';
            $out .= $value == $key ? ' selected="selected" ' : '';
            $out .= '>'.$name;
            $out .= '</option>';
        }
        $out .= '</select>';
        echo $out;  

    } // display    
} // class CPMetaPageProjectsDisplayMode
           
/*********************************************************** 
* Class name:
*    CPMetaPageShowNewsSlider
* Descripton:
*    Implementation of CPMetaPageShowNewsSlider
***********************************************************/
class CPMetaPageShowNewsSlider extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_show_news_slider';              
        $this->_std = '';
        $this->_title = 'Check this filed if you want to show featured news slider.<br /><span class="cms-span-10-normal">(works only with news page template)</span>';
        $this->_type = 'page';
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
} // class CPMetaPageShowNewsSlider 

/*********************************************************** 
* Class name:
*    CPMetaPageExcludeNews
* Descripton:
*    Implementation of CPMetaPageExcludeNews
***********************************************************/
class CPMetaPageExcludeNews extends DCC_Meta 
{        
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = 'page_exclude_news';              
        $this->_std = '';
        $this->_title = 'Check this filed if you want to exclude featured news from news list.<br /><span class="cms-span-10-normal">(works only with news page template)</span>';
        $this->_type = 'page';
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
} // class CPMetaPageExcludeNews      