<?php
/*
Template Name: Contact
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      contact.php
* Brief:       
*      Theme contact page template code
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

                $dccp->getIGeneral()->includeSidebar($pageid);

                if($dccp->getIGeneral()->getSidebarOnRight())
                {
                    echo '<div class="page-width-600-left">';
                } else
                {
                   echo '<div class="page-width-600">'; 
                }

            echo '<h1>'.$post->post_title.$page_subtitle.'</h1>';
            
            the_content();               
           
            $content = '[dcs_contactform title="PLEASE USE THE FORM BELOW TO CONTACT US"]';
            $out = do_shortcode($content);
            echo $out;
           
           ?>
                     
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



