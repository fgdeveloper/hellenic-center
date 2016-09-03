<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      search.php
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
    
    $search_query = (get_query_var( 's' )) ? get_query_var( 's' ) : '';
    $pre_title = $dccp->getIGeneral()->searchTitleText();
    if($pre_title != '')
    {
        $pre_title .= '&nbsp;';
    }                                                  
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree(null, 0, $pre_title.$search_query); ?> 
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
            echo '<h1>'.$pre_title.$search_query.'</h1>';           
            
			$_GET['s_in_posts'] = 'on';
			$_GET['s_in_pages'] = 'on';
			
            if($dccp->getIGeneral()->showCtrlOnSearchPage())
            {                
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
            } 
            echo '<div style="height:35px;"></div>';
                        
            $page_size = $dccp->getIGeneral()->searchPageSize();           
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('s' => $search_query, 'posts_per_page'=>$page_size, 'paged'=>$paged);
            
            $search_array = Array();
            if($_GET['s_in_posts'] == 'on') { array_push($search_array, 'post'); }
            if($_GET['s_in_pages'] == 'on') { array_push($search_array, 'page'); }
            if($_GET['s_in_news'] == 'on') { array_push($search_array, 'news'); }
            if($_GET['s_in_projects'] == 'on') { array_push($search_array, 'project'); }            
            if(count($search_array) == 0) { array_push($search_array, 'post'); }
            $args['post_type'] = $search_array;     
                                    
            $new_wp_query = new WP_Query($args);
            $max_page = $new_wp_query->max_num_pages;
            
            
            $show_images =  GetDCCPInterface()->getIGeneral()->showImagesOnSearchPage();
            if($show_images) { $show_images = 'true'; } else { $show_images = 'false'; }
            
            if($new_wp_query->have_posts())
            {   
                while($new_wp_query->have_posts())
                {
                    $new_wp_query->the_post(); 
                   
                    if($post->post_type == 'page')
                    {
                        $content = '[dcs_page id="'.$post->ID.'"]';
                        $out = do_shortcode($content);
                        echo $out;
                        continue;
                    } else
                    
                    if($post->post_type == 'post')
                    {                                                            
                        $content = '[dcs_post id="'.$post->ID.'" image="'.$show_images.'"]';
                        $out = do_shortcode($content);
                        echo $out;
                    } else
                    
                    if($post->post_type == 'news')
                    {                                                            
                        $content = '[dcs_news id="'.$post->ID.'"]';
                        $out = do_shortcode($content);
                        echo $out;
                    } else
                    
                    if($post->post_type == 'project')
                    {                                                            
                        $content = '[dcs_project id="'.$post->ID.'" image="'.$show_images.'"]';
                        $out = do_shortcode($content);                        
                        echo $out;
                    }                                        
                }                        
            } else {
              echo '<span style="font-size:11px;color:#888888;">'.GetDCCPInterface()->getIGeneral()->searchNoResultsText().'</span>';  
            }
            wp_reset_query(); 
        
            echo '<div style="height:20px;"></div>';
            GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);         
                                   
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



