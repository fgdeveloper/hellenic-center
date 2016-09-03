<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      404.php
* Brief:       
*      Theme 404 page code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();            
    $dccp = GetDCCPInterface();                                              
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree(null, 0, $dccp->getIGeneral()->get404Title()); ?> 
    </div>

    <div id="content">
         
        <?php 

            echo '<div class="page-width-920">';
            echo '<h1>'.$dccp->getIGeneral()->get404Title().'</h1>';
            echo  $dccp->getIGeneral()->get404Text();
            echo '<div style="height:280px;"></div>';                                          
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



