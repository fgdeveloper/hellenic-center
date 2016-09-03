 <?php
/*
Template Name: Page Map
*/
 
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      pagemap.php
* Brief:       
*      Theme page map page template code
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
    
        
        <?php 
            $out = '';
            $out .= '<div class="page-width-920">'; 
            
            $out .= '<h1>'.$post->post_title.$page_subtitle.'</h1>';
            
            $out .= apply_filters('the_content', get_the_content());                                  

            global $wpdb;
            $pageslist = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page' ORDER BY post_title ");
            $count = count($pageslist);
            $oncolumn = ceil($count / 2);
            
            $out .= '<div id="page-map">';
            
            $j = 0;
            $first_char = strtoupper(substr($pageslist[0]->post_title, 0, 1));
            $next_char = $first_char;
            $rendered_this_char = 0;
            $can_switch = false;            
            
            $char_count = 1;
            $char_count_j = 0;
            $char_count_char = $first_char;
            foreach($pageslist as $pa)
            {
                $c = strtoupper(substr($pa->post_title, 0, 1));
                if($c != $char_count_char)
                {
                    $char_count++;
                    $char_count_char = $c;                         
                } 
                       
            }
            $char_count = round($char_count / 2);
            
            $out .= '<div class="left-column">';
            $char_switch_counter = 0;
            while($j < $count)
            {
                if(($j >= $oncolumn or $char_switch_counter > $char_count) and $can_switch == true)
                {
                     break;
                }
                
                if($rendered_this_char == 0)
                {
                    $out .= '<h3>'.$first_char.'</h3><hr />';
                    $can_switch = false; 
                }
                $out .= '<a href="'.get_permalink($pageslist[$j]->ID).'">'.$pageslist[$j]->post_title.'</a><br />';
                
                $rendered_this_char++;
                $j++;
                
                if($j < $count)
                {
                    $next_char = strtoupper(substr($pageslist[$j]->post_title, 0, 1)); 
                }
                
                if($next_char != $first_char)
                {
                   $char_switch_counter++;
                   
                   $rendered_this_char = 0;
                   $first_char = $next_char;
                   $can_switch = true;
                   $out .= '<div style="clear:both;padding-bottom:25px;"></div>';   
                }                  
            }                       
            $out .= '</div>';


            $out .= '<div class="right-column">';
            while($j < $count) 
            {
                if($rendered_this_char == 0)
                {
                    $out .= '<h3>'.$first_char.'</h3><hr />';
                }
                $out .= '<a href="'.get_permalink($pageslist[$j]->ID).'">'.$pageslist[$j]->post_title.'</a><br />';
                
                $rendered_this_char++;
                $j++;
                
                if($j < $count)
                {
                    $next_char = strtoupper(substr($pageslist[$j]->post_title, 0, 1)); 
                }
                
                if($next_char != $first_char)
                {
                   $rendered_this_char = 0;
                   $first_char = $next_char;
                   $can_switch = true;
                   $out .= '<div style="clear:both;padding-bottom:25px;"></div>';
                }   
            }                       
            $out .= '</div>';
            
                         
            $out .= '<div class="clear-both"></div></div>';             
            echo $out;                   
        ?> 
              
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>