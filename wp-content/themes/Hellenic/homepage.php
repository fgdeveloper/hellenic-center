<?php
/*
Template Name: Homepage
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      index.php
* Brief:       
*      Theme index page code
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
    if(!$dccp->getIGeneral()->hideHomeSlider())
    {
        $dccp->getIGeneral()->renderSlider();
    }
    $dccp->getIHome()->renderSliderExtraContent();
    $dccp->getIHome()->renderHomepageSlogan();
                                      
?>
       
    <div id="content">     
    
        <?php
            $dccp->getIHome()->renderExtraContent();  
            if($dccp->getIHome()->showHomepageSidebar()) 
            {  
                $dccp->getIGeneral()->includeSidebar($pageid);
            } 
 
            if($dccp->getIHome()->showHomepageSidebar()) 
            {  
                if($dccp->getIGeneral()->getSidebarOnRight())
                {
                    echo '<div class="page-width-600-left">';
                } else
                {
                   echo '<div class="page-width-600">'; 
                }
            } else 
            { 
                echo '<div class="page-width-920">';
            } 
            ?>
            
            <?php  
              the_content();
              GetDCCPInterface()->getIGeneral()->renderWordPressPagination(); 
        ?>                    
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



