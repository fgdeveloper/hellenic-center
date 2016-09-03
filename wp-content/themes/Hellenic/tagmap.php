 <?php
/*
Template Name: Tag Map
*/
 
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      tagmap.php
* Brief:       
*      Theme tag map page template code
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
            echo $out;                    
        ?> 
        
       <?php 
        $TAGS_MAP_COLUMNS_COUNT = 4;
        $data = get_tags();
        $count = count($data);
        $on_one = $count / $TAGS_MAP_COLUMNS_COUNT;
        
        echo '<div id="tag-map">';
        $rendered = 0;
        $rendered_this_char = 0;
        $j = 0;
        
        $first_char = strtoupper(substr($data[$j]->name, 0, 1));
        $next_char = $first_char;
        
        for($i = 1; $i <= $TAGS_MAP_COLUMNS_COUNT; $i++)
        {
            if($i > 1)
            {
                echo '<div class="column-separator"></div>';
            }
            echo '<div class="column">';                        
            
            $can_switch = false;
            while($j < $count)
            {
                if($j >= ($i * $on_one) and $can_switch)
                {
                    break;                 
                }                              
                
                if($rendered_this_char == 0)
                {
                    echo '<h3>'.$first_char.'</h3><hr />';
                    echo '<ul>';
                    $can_switch = false; 
                }
           
                $out  = '<li>';                            
                $out .= '<a class="link-tip-top" title="'.$data[$j]->count.' '.($data[$j]->count > 1 ? 'topics' : 'topic').'" href="'.get_tag_link($data[$j]->term_id).'">'.$data[$j]->name.' ('.$data[$j]->count.')</a>';
                $out .= ($j < $count - 1) ? ',' : '';
                $out .= '</li>';
                echo $out;                                                      
                
                $rendered_this_char++;
                $j++;
                
                if($j < $count)
                {
                    $next_char = strtoupper(substr($data[$j]->name, 0, 1));
                }
                
                if($next_char != $first_char or $j >= $count)
                {
                   echo '</ul><div style="clear:both;padding-bottom:25px;"></div>';
                   $rendered_this_char = 0;
                   $first_char = $next_char;
                   $can_switch = true;
                }                            
            }   
            
            echo '<div style="height:20px;clear:both"></div></div>';
        } // for
                            
        echo '</div>';
        
        
        
        ?>        
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>