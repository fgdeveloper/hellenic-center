<?php
/*
Template Name: Projects Portfolio
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      portfolio-project.php
* Brief:       
*      Theme portfolio project page template code
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
            <?php 
                $pagedesc = get_post_meta($pageid, 'page_desc', true);
                if($pagedesc != '')
                {
                    echo apply_filters('the_content', $pagedesc);
                }  
            ?>
            <div class="portfolio-project">
        
        
                <?php 
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;               
                    $types = get_post_meta($pageid, 'portfolio_project_cat', true);
                    $rows = get_post_meta($pageid, 'page_projects_rows', true);
                    $mode = get_post_meta($pageid, 'page_projects_mode', true);
                    
                    if($types == '')
                    {
                        $types = Array();
                        $types_terms = get_terms('project_cat');
                        foreach($types_terms as $te)
                        {
                            array_push($types, $te->term_id);    
                        }                        
                    }
                    
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
                        GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC 
                        ";

                    $projects = $wpdb->get_results($querystr, OBJECT);                    
                    $count_projects = count($projects);
                           
                    // if slider mode 
                    if($mode == CPMetaPageProjectsDisplayMode::MODE_SLIDER)
                    {
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
                    {
                       
                        $page_size = 1;                        
                        switch($mode)
                        {
                            case CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE: $page_size = $rows * 1; break;
                            case CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO: $page_size = $rows * 2; break;
                            case CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE: $page_size = $rows * 3; break;
                            case CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR: $page_size = $rows * 4; break;                                                                          
                        }
                        
                        
                        $start = ($paged - 1)*$page_size;
                        $end = $start + $page_size;
                        
                       // echo 'start:'.$start.' end:'.$end; 
                        if($end >= $count_projects)
                        {
                            $end = $count_projects;
                        }
                        
                        $rendered_items = 0;
                        for($i = $start; $i < $end; $i++)
                        {
                             setup_postdata($projects[$i]);
                            
                             $image = get_post_meta($projects[$i]->ID, 'project_image', true); 
                             $thumb = get_post_meta($projects[$i]->ID, 'project_thumb', true);
                             $desc = get_post_meta($projects[$i]->ID, 'project_desc', true);
                             $project_info = get_post_meta($projects[$i]->ID, 'project_info', true); 
                             
                             # ONE COLUMN                
                             if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE)
                             {
                                 $out = '';
                                 $out .= '<div class="one-colum-item">';
                                 
                                 $out .= '<div class="image-460-wrapper framed"><a href="'.get_permalink($projects[$i]->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$projects[$i]->post_title.'"></a></div>';
                                 
                                 $out .= '<div class="desc-460-wrapper">';
                                 
                                 $out .= '<div class="infobar">';
                                    $pt_list = get_the_terms($projects[$i]->ID, 'project_cat');                                                                                                           

                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $projects[$i]->ID).'</span><span class="date-right"></span>';
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
                                 $out .= '<h2><a href="'.get_permalink($projects[$i]->ID).'">'.$projects[$i]->post_title.'</a></h2>';
                                 if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($projects[$i]->ID).'">View&nbsp;project</a>'; 
                                 } else
                                 {
                                     global $more;
                                     $more = 0;
                                    $oldpost = $post;
                                    $post = $projects[$i]; 
                                    $out .= apply_filters('the_content', get_the_content('View&nbsp;project'));
                                    $post = $oldpost;  
                                 }
                                 

                                  
                                 $out .= '<div class="infobox">';
                                 $out .= do_shortcode($project_info);
                                 $out .= '</div>';
                                 
                                 $out .= '</div>'; // desc-460-wrapper
                                  
                                 $out .= '<div class="clear-both"></div></div>';
                                 echo $out;
                             } else  # TWO COLUMNS
                             if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO)
                             {                            
                                 $out = '';
                                 if(($rendered_items % 2) == 0)
                                 {
                                    $out .= '<div class="two-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="two-colum-item-last">';  
                                 }
                                 
                                 $out .= '<div class="image-430-wrapper framed"><a href="'.get_permalink($projects[$i]->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$projects[$i]->post_title.'"></a></div>';  
                                                                               
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = get_the_terms($projects[$i]->ID, 'project_cat');                                                                                                
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $projects[$i]->ID).'</span><span class="date-right"></span>';
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
                                 $out .= '<h2><a href="'.get_permalink($projects[$i]->ID).'">'.$projects[$i]->post_title.'</a></h2>';
                                 
                                 $out .= '<div class="desc-430-wrapper">';
                                  if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($projects[$i]->ID).'">View&nbsp;project</a>'; 
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
                                 
                                 $out .= '</div>'; // desc-430-wrapper                                 
                                 
                                 
                                 $out .= '</div>';                                                                                                    
                                 $rendered_items++;
                                 
                                 if(($rendered_items % 2) == 0 or ($i+1) == $end)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;
                             } else # THREE COLUMNS
                             if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE)
                             {                                                                  
                                 $out = '';
                                 if(($rendered_items % 3) != 2)
                                 {
                                    $out .= '<div class="three-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="three-colum-item-last">';  
                                 } 

                                 $out .= '<div class="image-270-wrapper framed"><a href="'.get_permalink($projects[$i]->ID).'" rel="'.$thumb.'" class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$projects[$i]->post_title.'"></a></div>'; 
                                 
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = get_the_terms($projects[$i]->ID, 'project_cat');                                                                                               
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $projects[$i]->ID).'</span><span class="date-right"></span>';
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
                                 
                                 if(($rendered_items % 3) == 0 or ($i+1) == $end)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;                                 
                                                           
                             } else # FOUR COLUMNS
                             if($mode == CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR)
                             {                                                                 
                                 $out = '';
                                 if(($rendered_items % 4) != 3)
                                 {
                                    $out .= '<div class="four-colum-item">';
                                 } else
                                 {
                                    $out .= '<div class="four-colum-item-last">';  
                                 } 

                                 $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$thumb.'&w=184&h=142&zc=1'.'" '; 
                                 $out .= '<div class="image-184-wrapper framed"><a href="'.get_permalink($projects[$i]->ID).'" '.$rel.' class="loader async-img"></a><a href="'.$image.'" rel="lightbox" class="zoom" title="'.$projects[$i]->post_title.'"></a></div>'; 
                                 
                                 
                                 $out .= '<div class="infobar">';           
                                    $pt_list = get_the_terms($projects[$i]->ID, 'project_cat');                                                                                               
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $projects[$i]->ID).'</span><span class="date-right"></span>';
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
                                 $out .= '<h3><a href="'.get_permalink($projects[$i]->ID).'">'.$projects[$i]->post_title.'</a></h3>';
                                 
                                 $out .= '<div class="desc-184-wrapper">';
                                 if($desc != '')
                                 {
                                     $out .= $desc;
                                     $out .= ' <a href="'.get_permalink($projects[$i]->ID).'">View&nbsp;project</a>'; 
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
                                 
                                 if(($rendered_items % 4) == 0 or ($i+1) == $end)
                                 {
                                    $out .= '<div class="clear-both"></div>';     
                                 }
                                 echo $out;                                 
                                                           
                             }
                                  
                        } // for 
                        echo '<div class="clear-both"></div>'; 
                        
                        
                        $max_page = ceil($count_projects / $page_size);                
                        GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                    } // else
                    wp_reset_query();
                                        
                    the_content(); 
                ?>
                       
            </div> <!-- portfolio-project -->               
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>
