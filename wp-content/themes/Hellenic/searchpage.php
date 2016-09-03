<?php
/*
Template Name: Search Page
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      searchpage.php
* Brief:       
*      Theme search page code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();            
    $dccp = GetDCCPInterface();
    the_post();
    
    global $post;                                                 
    $pageid = $post->ID;    
    
    $search_query = (get_query_var( 's' )) ? get_query_var( 's' ) : '';                                                
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0); ?> 
    </div>

    <div id="content">      
        <?php 
            $dccp->getIGeneral()->includeSidebar(null, $dccp->getIGeneral()->getSearchSidebarID());     
            if($dccp->getIGeneral()->getSidebarOnRight())
            {
                echo '<div class="page-width-600-left">';
            } else
            {
               echo '<div class="page-width-600">'; 
            }               
            echo '<h1>'.$post->post_title.'</h1>';           
            
           
            $search_in_posts = $dccp->getIGeneral()->searchInPosts(); 
            $sposts = $_GET['s_in_posts'] == 'on' ? 'true' : 'false';
            $search_in_posts = $search_in_posts ? 'true' : 'false';

            $search_in_pages = $dccp->getIGeneral()->searchInPages();
            $spages = $_GET['s_in_pages'] == 'on' ? 'true' : 'false';
            $search_in_pages = $search_in_pages ? 'true' : 'false';  
            
            $search_in_news = $dccp->getIGeneral()->searchInNews();
            $snews = $_GET['s_in_news'] == 'on' ? 'true' : 'false'; 
            $search_in_news = $search_in_news ? 'true' : 'false';
            
            $search_in_projects = $dccp->getIGeneral()->searchInProjects();
            $sprojects = $_GET['s_in_projects'] == 'on' ? 'true' : 'false'; 
            $search_in_projects = $search_in_projects ? 'true' : 'false';                  
            
            if($sposts == 'false' and $spages == 'false' and $snews == 'false' and $sprojects == 'false')
            {
                $sposts = 'true';
            }
            
            $content = '[dcs_searchform query="'.$search_query.'" size="long" 
                posts="'.$search_in_posts.'" pages="'.$search_in_pages.'" news="'.$search_in_news.'" projects="'.$search_in_projects.'" 
                sposts="'.$sposts.'" spages="'.$spages.'" snews="'.$snews.'" sprojects="'.$sprojects.'"]';
            $out = do_shortcode($content);
            echo $out;
                        
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



