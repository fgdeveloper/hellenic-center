 <?php
/*
Template Name: Project Map
*/
 
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      projectmap.php
* Brief:       
*      Theme project map page template code
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
                         
            $code = '[dcs_project_map columns="3" title="true" ptop="15" pbottom="10"]';
            $out .= do_shortcode($code);
            echo $out;                   
        ?> 
              
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>