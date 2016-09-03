<?php
/**********************************************************************
* ANDROMEDA WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)    
* 
* File name:   
*      cp_meta.php
* Brief:       
*      Part of theme control panel. Keep custom meta box data module.
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
*    CPMetaDataCreator
* Descripton:
*    Implementation of meta boxes data creator  
***********************************************************/
class CPMetaDataCreator 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // post meta boxes       
        $this->_obj = new CPMetaPostDisableSidebar();  
        array_push($this->_post_boxes, $this->_obj);       
        $this->_obj = new CPMetaPostCustomContent();   
        array_push($this->_post_boxes, $this->_obj);
        $this->_obj = new CPMetaPostDisableVoting();   
        array_push($this->_post_boxes, $this->_obj);                
        
        $this->_obj = new CPMetaPostSidebar();   
        array_push($this->_post_boxes, $this->_obj);                 
        
        $this->_obj = new CPMetaPostMainImage();
        array_push($this->_post_boxes, $this->_obj);
        $this->_obj = new CPMetaPostBigImage();
        array_push($this->_post_boxes, $this->_obj);        
        
        
        $this->_obj = new CPMetaPostMainImageDesc();
        array_push($this->_post_boxes, $this->_obj);
        $this->_obj = new CPMetaPostVideo();
        array_push($this->_post_boxes, $this->_obj);
        $this->_obj = new CPMetaPostVideoFull();
        array_push($this->_post_boxes, $this->_obj);        
        
        
        $this->_obj = new CPMetaPostDisableVideo();
        array_push($this->_post_boxes, $this->_obj); 
        $this->_obj = new CPMetaPostDesc();
        array_push($this->_post_boxes, $this->_obj);
        
        // page meta boxes        
        $this->_obj = new CPMetaPageSubtitle();
        array_push($this->_page_boxes, $this->_obj);                 
                       
        $this->_obj = new CPMetaPageSidebar();
        array_push($this->_page_boxes, $this->_obj); 
        $this->_obj = new CPMetaPagePortfolioCat();                                                                 
        array_push($this->_page_boxes, $this->_obj);
        $this->_obj = new CPMetaPageBlogCat();
        array_push($this->_page_boxes, $this->_obj);
        $this->_obj = new CPMetaPageBlogExCat();
        array_push($this->_page_boxes, $this->_obj);        
        
        
        $this->_obj = new CPMetaPageNewsCat();
        array_push($this->_page_boxes, $this->_obj);
        $this->_obj = new CPMetaPageNewsFeatured();
        array_push($this->_page_boxes, $this->_obj);        
        $this->_obj = new CPMetaPageShowNewsSlider();
        array_push($this->_page_boxes, $this->_obj);
        $this->_obj = new CPMetaPageExcludeNews();
        array_push($this->_page_boxes, $this->_obj); 
        
                          
                
        $this->_obj = new CPMetaPageNewsPostsCount();
        array_push($this->_page_boxes, $this->_obj);        
        
        $this->_obj = new CPMetaPageBlogAuthors();
        array_push($this->_page_boxes, $this->_obj);               
        $this->_obj = new CPMetaPageDesc();
        array_push($this->_page_boxes, $this->_obj);
        
        $this->_obj = new CPMetaPageExtraTop();
        array_push($this->_page_boxes, $this->_obj);        
        $this->_obj = new CPMetaPageDisableExtraTop();
        array_push($this->_page_boxes, $this->_obj);         
        
        
        $this->_obj = new CPMetaPageTitleDesc();
        array_push($this->_page_boxes, $this->_obj);                 

        $this->_obj = new CPMetaPageNextGenGallery();
        array_push($this->_page_boxes, $this->_obj);
        $this->_obj = new CPMetaPageGalleryItemsNumber();
        array_push($this->_page_boxes, $this->_obj);
         
        $this->_obj = new CPMetaPageProjectsTypes();
        array_push($this->_page_boxes, $this->_obj);        
        $this->_obj = new CPMetaPageProjectsRowsCount();
        array_push($this->_page_boxes, $this->_obj);        
        $this->_obj = new CPMetaPageProjectsDisplayMode();
        array_push($this->_page_boxes, $this->_obj); 
                
        // project meta boxes       
        $this->_obj = new CPMetaProjectDisableVoting();
        array_push($this->_project_boxes, $this->_obj);                         
        $this->_obj = new CPMetaProjectMainImage();
        array_push($this->_project_boxes, $this->_obj); 
        $this->_obj = new CPMetaProjectMainImageDesc();
        array_push($this->_project_boxes, $this->_obj); 
        
        
        $this->_obj = new CPMetaProjectSidebar();
        array_push($this->_project_boxes, $this->_obj);
        $this->_obj = new CPMetaProjectDisableSidebar();
        array_push($this->_project_boxes, $this->_obj);
        $this->_obj = new CPMetaProjectCustomContent();
        array_push($this->_project_boxes, $this->_obj);        

        $this->_obj = new CPMetaProjectDesc();
        array_push($this->_project_boxes, $this->_obj);
        $this->_obj = new CPMetaProjectInfo();
        array_push($this->_project_boxes, $this->_obj);        
   
        // news meta boxes  
        $this->_obj = new CPMetaNewsCustomContent();
        array_push($this->_news_boxes, $this->_obj);                  
        $this->_obj = new CPMetaNewsDisableVoting();
        array_push($this->_news_boxes, $this->_obj);                        
        
        $this->_obj = new CPMetaNewsMainImage();
        array_push($this->_news_boxes, $this->_obj);                            
        $this->_obj = new CPMetaNewsMainImageDesc();
        array_push($this->_news_boxes, $this->_obj); 
        $this->_obj = new CPMetaNewsDesc();
        array_push($this->_news_boxes, $this->_obj);   
 
        $this->_obj = new CPMetaNewsVideo();
        array_push($this->_news_boxes, $this->_obj); 
        $this->_obj = new CPMetaNewsDisableVideo();
        array_push($this->_news_boxes, $this->_obj);          
        
                                                 
                                                                                   
        add_action('admin_menu', array(&$this, 'adminMenu'));
        add_action('save_post', array(&$this, 'savePostData'));                          
        add_action('save_post', array(&$this, 'savePageData'));
        add_action('save_post', array(&$this, 'saveProjectData'));
        add_action('save_post', array(&$this, 'saveNewsData'));          
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
   
    private $_post_boxes = Array();
    private $_page_boxes = Array();
    private $_project_boxes = Array();
    private $_news_boxes = Array();  
   
    /*********************************************************** 
    * Public functions
    ************************************************************/               
   
    
    public function adminMenu() 
    {
        add_meta_box( 'new-meta-boxes', 'Custom Post Settings', array(&$this, 'drawPostMetaBoxes'), 'post', 'normal', 'high' );    
        add_meta_box( 'new-meta-boxes', 'Custom Page Settings', array(&$this, 'drawPageMetaBoxes'), 'page', 'normal', 'high' );
        add_meta_box( 'new-meta-boxes', 'Custom Projects Settings', array(&$this, 'drawProjectMetaBoxes'), 'project', 'normal', 'high' );
        add_meta_box( 'new-meta-boxes', 'Custom News Settings', array(&$this, 'drawNewsMetaBoxes'), 'news', 'normal', 'high' ); 
    } // adminMenu     

  
    # POSTS
    public function drawPostMetaBoxes()
    {     
        // check number of meta boxes to draw
        $count = count($this->_post_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_post_boxes[$i]->display();                        
        } // for                    
    }     

    public function savePostData($postID)
    {     
        // check number of meta boxes to draw
        $count = count($this->_post_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_post_boxes[$i]->save($postID);                        
        } // for                    
    }
    
    # PAGES
    public function drawPageMetaBoxes()
    {     
        // check number of meta boxes to draw
        $count = count($this->_page_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_page_boxes[$i]->display();                        
        } // for                    
    }   

    public function savePageData($postID)
    {     
        // check number of meta boxes to draw
        $count = count($this->_page_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_page_boxes[$i]->save($postID);                        
        } // for                    
    }  
    
    # PROJECTS
    public function drawProjectMetaBoxes()
    {     
        // check number of meta boxes to draw
        $count = count($this->_project_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_project_boxes[$i]->display();                        
        } // for                    
    }      
    
    public function saveProjectData($postID)
    {     
        // check number of meta boxes to draw
        $count = count($this->_project_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_project_boxes[$i]->save($postID);                        
        } // for                    
    }       
    
    # NEWS
    public function drawNewsMetaBoxes()
    {     
        // check number of meta boxes to draw
        $count = count($this->_news_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_news_boxes[$i]->display();                        
        } // for                    
    }      
    
    public function saveNewsData($postID)
    {     
        // check number of meta boxes to draw
        $count = count($this->_news_boxes);
        // for every meta box
        for($i = 0; $i < $count; $i++)
        {
            $this->_news_boxes[$i]->save($postID);                        
        } // for                    
    }       
        
    /*********************************************************** 
    * Private functions
    ************************************************************/      
            
} // class CPMetaDataCreator
        
        
?>