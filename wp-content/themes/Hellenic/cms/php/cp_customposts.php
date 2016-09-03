<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_customposts.php
* Brief:       
*      Part of theme control panel.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/ 
   
class CPThemeCustomPosts 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/       
    public function __construct()
    {                                                              
        add_action('init', array(&$this, 'createProjectPosts')); 
        add_action('init', array(&$this, 'createProjectCategory'));
        
        add_action('init', array(&$this, 'createNewsPosts'));
        add_action('init', array(&$this, 'createNewsCategoryAndTags'));     
    }
    
    /*********************************************************** 
    * Public functions
    ************************************************************/
    
    # PROJECTS
    public function createProjectPosts()
    {
         register_post_type(
            'project',
            Array(
                'labels' => Array(
                    'name' => 'Projects',
                    'singular_name' => 'Project',
                    'add_new' => 'Add New',
                    'edit_item' => 'Edit Project', 
                    'add_new_item' => 'Add New Project'
                ),
            'supports' => Array('title','editor','excerpt','trackbacks','custom-fields','comments','author'),
            'public' => true,
            'exclude_from_search' => false, 
            'rewrite' => Array('slug' => 'project', 'with_front' => false) 
        ) 
         );
    } 
    
    # PROJECTS CATEGORY
    public function createProjectCategory()
    {
         register_taxonomy(
            'project_cat', 'project',
            Array(
                'hierarchical' => true,
                'public' => true,
                'show_ui' => true,
                'query_var' => true,
                'show_tagcloud' => true,
                'rewrite' => Array('slug' => 'project_cat', 'with_front' => false),
                
                'labels' => Array(
                  'name' => 'Project Category',
                  'singular_name' => 'Project Category',
                  'search_items' => 'Search Project Category',
                  'popular_items' => 'Popular Project Categories',
                  'all_items' => 'All Projects',
                  'parent_item' => 'Parent Project Category',
                  'parent_item_colon' => 'Parent Project Category',
                  'edit_item' => 'Edit Project Category',
                  'update_item' => 'Update Project Category',
                  'add_new_item' => 'Add New Project Category',
                  'new_item_name' => 'New Project Category Name' 
                ),
                
                'label' => 'Project Category'
                
        ) 
         );                                              
    }     

    # NEWS
    public function createNewsPosts()
    {
         register_post_type(
            'news',
            Array(
                'labels' => Array(
                    'name' => 'News',
                    'singular_name' => 'News',
                    'add_new' => 'Add New',
                    'edit_item' => 'Edit News', 
                    'add_new_item' => 'Add New News'
                ),
            'supports' => Array('title','editor','excerpt','trackbacks','custom-fields','comments','author'),
            'public' => true,
            'exclude_from_search' => false, 
            'rewrite' => Array('slug' => 'newspost', 'with_front' => false)
        ) 
         );
    } 
    
    
    # NEWS CATEGORY
    public function createNewsCategoryAndTags()
    {
         register_taxonomy(
            'news_cat', 'news',
            Array(
                'hierarchical' => true,
                'public' => true,
                'show_ui' => true,
                'query_var' => true,
                'show_tagcloud' => true,
                'rewrite' => Array('slug' => 'news_cat', 'with_front' => false),
                
                'labels' => Array(
                  'name' => 'News Category',
                  'singular_name' => 'News Category',
                  'search_items' => 'Search News Categories',
                  'popular_items' => 'Popular News Categories',
                  'all_items' => 'All News Categories',
                  'parent_item' => 'Parent News Category',
                  'parent_item_colon' => 'Parent News Category',
                  'edit_item' => 'Edit News Category',
                  'update_item' => 'Update News Category',
                  'add_new_item' => 'Add New News Category',
                  'new_item_name' => 'New News Category Name' 
                ),
                
                'label' => 'News Category'
                
        ) 
         );  
         
         
         register_taxonomy(
            'news_tag', 'news',
            Array(
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'query_var' => true,
                'show_tagcloud' => true,
                'rewrite' => Array('slug' => 'news_tag', 'with_front' => false),
                
                'labels' => Array(
                  'name' => 'News Tag',
                  'singular_name' => 'News Tag',
                  'search_items' => 'Search News Tag',
                  'popular_items' => 'Popular News Tags',
                  'all_items' => 'All News Tags',
                  'parent_item' => 'Parent News Tag',
                  'parent_item_colon' => 'Parent News Tag',
                  'edit_item' => 'Edit News Tag',
                  'update_item' => 'Update News Tag',
                  'add_new_item' => 'Add New News Tag',
                  'new_item_name' => 'New News Tag Name' 
                ),
                
                'label' => 'News Tags'
                
        ) 
         );                                                       
    }     
    
} // class    
    
?>
