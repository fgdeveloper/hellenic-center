 <?php
/*
Template Name: Posts Portfolio
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      portfolio-post.php
* Brief:       
*      Theme portfolio post page template code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();     
    the_post();
    
    global $post;                                                 
    $pageid = $post->ID;
    $page_subtitle = get_post_meta($post->ID, 'page_subtitle', true); 
    if($page_subtitle != '')
    {
        $page_subtitle = '<span>'.$page_subtitle.'</span>';
    }      
    
    $dccp = GetDCCPInterface();                                              
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0); ?> 
    </div>

    <div id="content">
            <div class="page-width-920">
            <h1><?php echo $post->post_title.$page_subtitle; ?></h1>
            
            <?php the_content(); ?>
                   
            <div class="portfolio-post">
            <?php
                global $post; 
                global $more;    // Declare global $more (before the loop).                     
            
                $pi_general = $pi_acp->getIGeneral();
                $portfolio_page_size = $pi_general->portfolioPageSize();
            
                $categories = get_post_meta($pageid, 'portfolio_categories', true);

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args=array('paged'=>$paged,'posts_per_page'=>$portfolio_page_size,'cat'=>$categories);
                $r = new WP_Query($args);
                                         
                $max_page = $r->max_num_pages;
                  
                if($r->have_posts())
                {
                    $rendered = 0;
                    while($r->have_posts())
                    {
                        if($rendered > 0)
                        {
                            echo '<div class="v-separator"></div>';    
                        }
                        
                        
                        $r->the_post();
                        $more = 0;
                        
                        $image = get_post_meta($post->ID, 'post_image', true);
                        $thumb = get_post_meta($post->ID, 'post_thumb_image', true);
                        $video = get_post_meta($post->ID, 'post_video', true);
                        $postdesc = get_post_meta($post->ID, 'post_desc', true); 
                        $thumb_path = $thumb;
                        
                        $out = '<div class="item">';
                        $out .= '<div class="image-wrapper">';
                        
                        $out .= '
                                <a href="'.$image.'" rel="lightbox"><img src="'.$thumb_path.'" alt="" /></a>
                                <div class="title"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></div>';
                        if($video != '' and $pi_general->showPortfolioVideoIcon())
                        {
                            $out .= '<div class="camera"></div>';
                        }
                        $out .= '</div>';
                            
                        echo $out;
                        if($postdesc != '')
                        {
                            echo $postdesc.' <a href="'.get_permalink($post->ID).'">See&nbsp;more</a>';    
                        } else
                        {
                            the_content('See&nbsp;more');
                        }                                 
                        echo '</div>';                                
                        
                        $rendered++;
                        if($rendered % 3 == 0)
                        {
                            echo '<div class="h-separator"></div>';
                            $rendered = 0;    
                        }
                    }
                    if($rendered != 0)
                    {
                        echo '<div class="h-separator"></div>';
                    }
                }
           ?>                                      
                           

           
           <?php GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);  ?> 
           
           </div> <!-- portfolio -->                 
                   
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>