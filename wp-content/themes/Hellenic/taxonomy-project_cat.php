<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      taxonomy-project_cat.php
* Brief:       
*      Theme single project category page code
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
    global $more;    // Declare global $more (before the loop).
    global $wp_query;
                                                      
    $pageid = $post->ID;
            
    $project_cat_slug = (get_query_var('project_cat')) ? get_query_var('project_cat') : '';
    $project_cat_info = get_term_by('slug', $project_cat_slug, 'project_cat', OBJECT); 
    
    $dccp = GetDCCPInterface();     
    // var_dump($project_cat_info);                                   
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, 'Archive for projects '.$project_cat_info->name); ?> 
    </div>

    <div id="content">
        <div class="page-width-920">
            <h1><?php echo $project_cat_info->name; ?></h1>
            
            
            <?php 
                if($project_cat_info->description != '')
                {                        
                    echo '<div sytle="margin-bottom:20px;">'.do_shortcode($project_cat_info->description).'</div>';
                }            
            ?>
            <div class="portfolio-project">
        <?php                             
                                                                      
                    // print_r($wp_query);
                    $mode = $dccp->getIGeneral()->projectCatMode();
                    $rows = $dccp->getIGeneral()->projectCatRows();
                     
                    // if slider mode 
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_SLIDER)
                    {
                            $types = array(0 => $project_cat_info->term_id); 
                            $count_types = count($types);
                            $subquery = '';
                            for($i = 0; $i < $count_types; $i++)
                            {
                                if($i > 0)
                                {
                                    $subquery .= ' OR ';    
                                }
                                $subquery .= "$wpdb->terms.term_id =".$types[$i];
                            }

                            global $wpdb;
                            $querystr = "
                                SELECT DISTINCT *
                                FROM $wpdb->posts
                                LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                                LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                                LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
                                WHERE $wpdb->posts.post_type = 'project' 
                                AND $wpdb->posts.post_status = 'publish'
                                AND $wpdb->term_taxonomy.taxonomy = 'project_cat'
                                AND ($subquery)
                                ORDER BY $wpdb->posts.post_date DESC
                                ";

                            $projects = $wpdb->get_results($querystr, OBJECT);                    
                            $count_projects = count($projects);                          
                        
                          $out = '';                          
                          $out .= '<div class="slider">';
                           
                          for($i = 0; $i < $count_projects; $i++) 
                          {
                             setup_postdata($projects[$i]);  
                              
                             $image = get_post_meta($projects[$i]->ID, 'project_image', true); 
                             $thumb = get_post_meta($projects[$i]->ID, 'project_thumb', true);
                             $desc = get_post_meta($projects[$i]->ID, 'project_desc', true);
                             $project_info = get_post_meta($projects[$i]->ID, 'project_info', true);                               
                              
                             if($rendered_items % 3 == 0) { $out .= '<div class="page">'; }                             
                             if(($rendered_items % 3) != 2)
                             {
                                $out .= '<div class="item">';
                             } else
                             {
                                $out .= '<div class="item-last">';  
                             }
                             $out .= '<div class="image-270-wrapper framed"><a href="'.get_permalink($projects[$i]->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$projects[$i]->post_title.'"></a></div>';
                             
                             
                             $out .= '<div class="infobar">';           
                                $pt_list = get_the_terms($projects[$i]->ID, 'project_cat');                                                                                                
                                $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $projects[$i]->ID).'</span><span class="date-right"></span>';
                                $pt_count = count($pt_list);
                                    $out .= ' in ';
                                    for($j = 0; $j < $pt_count; $j++)
                                    {
                                        if($j > 0)
                                        {
                                            $out .= ', ';
                                        }                                         
                                        $out .= '<a href="'.get_term_link($pt_list[$j]->slug, 'project_cat').'" class="types">';       
                                        $out .= $pt_list[$j]->name;
                                        $out .= '</a>';
                                    }                                                                   
                             $out .= '</div>'; // info-bar                               
                             $out .= '<h3><a href="'.get_permalink($projects[$i]->ID).'">'.$projects[$i]->post_title.'</a></h3>';
                             
                             $out .= '<div class="desc-270-wrapper">';
                             if($desc != '')
                             {
                                 $out .= $desc;
                                 $out .= ' <a href="'.get_permalink($projects[$i]->ID).'">View&nbsp;project</a>'; 
                             } else
                             {
                                 global $more;
                                 $more = 0;
                                 $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                             }
                                                         
                             
                             if($project_info != '')
                             {
                                 $out .= '<div class="infobox">';
                                 $out .= do_shortcode($project_info);
                                 $out .= '</div>';
                             }
                             
                             $out .= '</div>'; // desc-270-wrapper                                 
                             
                             
                             $out .= '</div>'; // item 
                             $rendered_items++;                           
                             if(($rendered_items % 3) == 0 or ($i+1) == $count_projects)
                             {
                                $out .= '<div class="clear-both"></div>';
                                $out .= '</div>'; // page     
                             }                           
                              
                          }
                          
                        $out .= '<div class="control-panel">
                            <a class="prev">prev</a>
                            <span class="pages">1/1</span>
                            <a class="next">next</a>
                        </div>';                           
                          $out .= '</div>'; // slider
                          
                          echo $out;

                    } else
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE)
                    {   
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
                        $args = Array('paged'=>$paged, 'post_type' => 'project', 'taxonomy' => 'project_cat', 'term' => $project_cat_info->slug, 'posts_per_page' => $rows);
                        $qr = new WP_Query($args);
                        $max_page = $qr->max_num_pages;    
                              
                        if($qr->have_posts())
                        {
                            while($qr->have_posts())
                            {
                                $qr->the_post(); 
                                
                                 $image = get_post_meta($post->ID, 'project_image', true); 
                                 $thumb = get_post_meta($post->ID, 'project_thumb', true);
                                 $desc = get_post_meta($post->ID, 'project_desc', true);
                                 $project_info = get_post_meta($post->ID, 'project_info', true); 
                                 

                                     $out = '';
                                     $out .= '<div class="one-colum-item">';
                                     
                                     $out .= '<div class="image-460-wrapper framed"><a href="'.get_permalink($post->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$post->post_title.'"></a></div>';
                                     
                                     $out .= '<div class="desc-460-wrapper">';
                                     
                                     $out .= '<div class="infobar">';
                                        $pt_list = get_the_terms($post->ID, 'project_cat');                                                                                                           
                                        $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                        $out .= ' in ';
                                        
                                        $pt_counter = 0;
                                        foreach($pt_list as $pt_term)
                                        {
                                            if($pt_counter > 0)
                                            {
                                                $out .= ', ';
                                            }                                        
                                            $out .= '<a href="'.get_term_link($pt_term->slug, 'project_cat').'" class="types">';       
                                            $out .= $pt_term->name;
                                            $out .= '</a>';
                                            $pt_counter++;
                                        }                                                                  
                                     $out .= '</div>'; // info-bar                                  
                                     $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                                     
                                     if($desc != '')
                                     {
                                         $out .= $desc;
                                         $out .= ' <a href="'.get_permalink($post->ID).'">View&nbsp;project</a>'; 
                                     } else
                                     {
                                         global $more;
                                         $more = 0;
                                         $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                                     }
                                     

                                      
                                     $out .= '<div class="infobox">';
                                     $out .= do_shortcode($project_info);
                                     $out .= '</div>';
                                     
                                     $out .= '</div>'; // desc-460-wrapper
                                      
                                     $out .= '<div class="clear-both"></div></div>';
                                     echo $out;
                                      
                            } // while
                        } 
                                                          
                        GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                    } else 
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO)
                    {   
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
                        $args = Array('paged'=>$paged, 'post_type' => 'project', 'taxonomy' => 'project_cat', 'term' => $project_cat_info->slug, 'posts_per_page' => ($rows*2));
                        $qr = new WP_Query($args);
                        $max_page = $qr->max_num_pages;
                              
                        if($qr->have_posts())
                        {
                            $rendered_items = 0;
                            while($qr->have_posts())
                            {
                                $qr->the_post(); 
                                
                                 $image = get_post_meta($post->ID, 'project_image', true); 
                                 $thumb = get_post_meta($post->ID, 'project_thumb', true);
                                 $desc = get_post_meta($post->ID, 'project_desc', true);
                                 $project_info = get_post_meta($post->ID, 'project_info', true); 
                                 

                                  $out = '';
                                 if(($rendered_items % 2) == 0)
                                 {
                                    $out .= '<div class="two-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="two-colum-item-last">';  
                                 }
                                 
                                 $out .= '<div class="image-430-wrapper framed"><a href="'.get_permalink($post->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$post->post_title.'"></a></div>';  
                                                                               
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = wp_get_object_terms($post->ID, 'project_cat');                                                                                                
                                   // var_dump($pt_list);
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    $pt_count = count($pt_list);
                                    $out .= 'in ';
                                    for($j = 0; $j < $pt_count; $j++)
                                    {
                                        if($j > 0)
                                        {
                                            $out .= ', ';
                                        }                                         
                                        $out .= '<a href="'.get_term_link($pt_list[$j]->slug, 'project_cat').'" class="types">';       
                                        $out .= $pt_list[$j]->name;
                                        $out .= '</a>';
                                    }                                                                                                      
                                 $out .= '</div>'; // info-bar  
                                 $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                                 
                                 $out .= '<div class="desc-430-wrapper">';
                                  if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($post->ID).'">View&nbsp;project</a>'; 
                                 } else
                                 {
                                     global $more;
                                     $more = 0;
                                     $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                                 }
                                 
                       
                                 
                                 if($project_info != '')
                                 {
                                     $out .= '<div class="infobox">';
                                     $out .= do_shortcode($project_info);
                                     $out .= '</div>';
                                 }
                                 
                                 $out .= '</div>'; // desc-430-wrapper                                 
                                 
                                 
                                 $out .= '</div>';                                                                                                    
                                 $rendered_items++;
                                 
                                 if(($rendered_items % 2) == 0)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;
                                      
                            } // while
                            
                            echo '<div class="clear-both"></div>';                              
                        } 
                                                          
                        GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                    } else 
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE)
                    {   
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
                        $args = Array('paged'=>$paged, 'post_type' => 'project', 'taxonomy' => 'project_cat', 'term' => $project_cat_info->slug, 'posts_per_page' => ($rows*3));
                        $qr = new WP_Query($args);
                        $max_page = $qr->max_num_pages;
                              
                        if($qr->have_posts())
                        {
                            $rendered_items = 0;
                            while($qr->have_posts())
                            {
                                $qr->the_post(); 
                                
                                 $image = get_post_meta($post->ID, 'project_image', true); 
                                 $thumb = get_post_meta($post->ID, 'project_thumb', true);
                                 $desc = get_post_meta($post->ID, 'project_desc', true);
                                 $project_info = get_post_meta($post->ID, 'project_info', true);                                  

                                 $out = '';
                                 if(($rendered_items % 3) != 2)
                                 {
                                    $out .= '<div class="three-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="three-colum-item-last">';  
                                 } 

                                 $out .= '<div class="image-270-wrapper framed"><a href="'.get_permalink($post->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$post->post_title.'"></a></div>'; 
                                 
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = wp_get_object_terms($post->ID, 'project_cat');                                                                                               
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    $pt_count = count($pt_list);
                                    $out .= 'in ';
                                    for($j = 0; $j < $pt_count; $j++)
                                    {
                                        if($j > 0)
                                        {
                                            $out .= ', ';
                                        }                                         
                                        $out .= '<a href="'.get_term_link($pt_list[$j]->slug, 'project_cat').'" class="types">';       
                                        $out .= $pt_list[$j]->name;
                                        $out .= '</a>';
                                    }                                                                  
                                 $out .= '</div>'; // info-bar  
                                 $out .= '<h3><a href="'.get_permalink($post->ID).'">'.$projects[$i]->post_title.'</a></h3>';
                                 
                                 $out .= '<div class="desc-270-wrapper">';
                                 if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($post->ID).'">View&nbsp;project</a>'; 
                                 } else
                                 {
                                     global $more;
                                     $more = 0;
                                    $oldpost = $post;
                                    $post = $projects[$i]; 
                                    $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                                    $post = $oldpost;  
                                 }                                                                                                  
                                 
                                 if($project_info != '')
                                 {
                                     $out .= '<div class="infobox">';
                                     $out .= do_shortcode($project_info);
                                     $out .= '</div>';
                                 }
                                 
                                 $out .= '</div>'; // desc-270-wrapper                                                                    
                                 
                                 $out .= '</div>'; // item
                                 $rendered_items++;
                                 
                                 if(($rendered_items % 3) == 0)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;                                 
                                      
                            } // while
                            
                            echo '<div class="clear-both"></div>';                             
                        } 
                                                          
                        GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                    } else 
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR)
                    {   
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
                        $args = Array('paged'=>$paged, 'post_type' => 'project', 'taxonomy' => 'project_cat', 'term' => $project_cat_info->slug, 'posts_per_page' => ($rows*4));
                        $qr = new WP_Query($args);
                        $max_page = $qr->max_num_pages;
                              
                        if($qr->have_posts())
                        {
                            $rendered_items = 0;
                            while($qr->have_posts())
                            {
                                $qr->the_post(); 
                                
                                 $image = get_post_meta($post->ID, 'project_image', true); 
                                 $thumb = get_post_meta($post->ID, 'project_thumb', true);
                                 $desc = get_post_meta($post->ID, 'project_desc', true);
                                 $project_info = get_post_meta($post->ID, 'project_info', true);                                  

                                 $out = '';
                                 if(($rendered_items % 4) != 3)
                                 {
                                    $out .= '<div class="four-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="four-colum-item-last">';  
                                 } 

                                 $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$thumb.'&w=184&h=142&zc=1'.'" '; 
                                 $out .= '<div class="image-184-wrapper framed"><a href="'.get_permalink($post->ID).'" '.$rel.' class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$post->post_title.'"></a></div>'; 
                                 
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = wp_get_object_terms($post->ID, 'project_cat');                                                                                               
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    $pt_count = count($pt_list);
                                    $out .= 'in ';
                                    for($j = 0; $j < $pt_count; $j++)
                                    {
                                        if($j > 0)
                                        {
                                            $out .= ', ';
                                        }                                         
                                        $out .= '<a href="'.get_term_link($pt_list[$j]->slug, 'project_cat').'" class="types">';       
                                        $out .= $pt_list[$j]->name;
                                        $out .= '</a>';
                                    }                                                                  
                                 $out .= '</div>'; // info-bar  
                                 $out .= '<h3><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h3>';
                                 
                                 $out .= '<div class="desc-184-wrapper">';
                                 if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($post->ID).'">View&nbsp;project</a>'; 
                                 } else
                                 {
                                     global $more;
                                     $more = 0;
                                    $oldpost = $post;
                                    $post = $projects[$i]; 
                                    $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                                    $post = $oldpost;  
                                 }
                                 
                                                                 
                                 
                                 if($project_info != '')
                                 {
                                     $out .= '<div class="infobox">';
                                     $out .= do_shortcode($project_info);
                                     $out .= '</div>';
                                 }
                                 
                                 $out .= '</div>'; // desc-270-wrapper                                                                    
                                 
                                 $out .= '</div>'; // item
                                 $rendered_items++;
                                 
                                 if(($rendered_items % 4) == 0)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;                                  
                                      
                            } // while
                            
                            echo '<div class="clear-both"></div>';                             
                        } 
                                                          
                        GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                    } // else                                        
                                           
                ?>
                
            </div> <!-- portfolio-project -->                    
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



