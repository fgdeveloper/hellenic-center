<?php
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
                                            
    
    $dccp = GetDCCPInterface();     
    $pageid = $dccp->getIHome()->getHomepageID();  
    
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
        ?>

        
        <?php 
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

        $args=array('page_id' => $pageid);
        $new_wp_query = new WP_Query($args);
                                                                     
        if($new_wp_query->have_posts())
        {
            while($new_wp_query->have_posts())
            {                
                $new_wp_query->the_post();
                the_content();
                           
            } // while
        }

        GetDCCPInterface()->getIGeneral()->renderWordPressPagination(); 
        wp_reset_query();                                         
               
        ?>                    
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



