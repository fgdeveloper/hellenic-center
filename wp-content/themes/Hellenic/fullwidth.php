<?php
/*
Template Name: Full Width Page
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      fullwidth.php
* Brief:       
*      Theme full width page template code
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
    
    $dccp = GetDCCPInterface(); 
    
    $pege_disable_extra_top = get_post_meta($post->ID, 'page_disable_extra_top', true);
    $pege_extra_top = get_post_meta($post->ID, 'page_extra_top', true);
    $navi_tree_style = '';
    if($pege_disable_extra_top == '' and $pege_extra_top != '')
    {
        $navi_tree_style = ' style="margin-bottom:0px;" ';    
    }                                             
?>

    <div class="navigation-tree-container" <?php echo $navi_tree_style; ?>>         
        <?php dcf_naviTree($post->ID, 0); ?> 
    </div>
    
    <div id="content">

    <?php
    if($pege_disable_extra_top == '')
    {
        
        $out = '';
        $out .= '<div class="page-width-920">'; 
        $out .= do_shortcode($pege_extra_top);
        $out .= '</div>';
        echo $out;     
    }                                             
?>       

         
        <?php 
                echo '<div class="page-width-920">';

                the_content();
                GetDCCPInterface()->getIGeneral()->renderWordPressPagination();
                
                if(comments_open($pageid))
                {
                    echo '<a name="comments"></a>';
                    comments_template();
                }                  
           
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



