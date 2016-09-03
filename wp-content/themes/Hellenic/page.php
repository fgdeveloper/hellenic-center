<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      page.php
* Brief:       
*      Theme default page template code
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
?>

    <div id="content">
         
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

