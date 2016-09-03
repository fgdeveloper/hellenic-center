<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      footer.php
* Brief:       
*      Footer code for all theme files
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com  
***********************************************************************/
?>

    <!-- FOOTER -->      
    <div id="footer">
    
        <?php if(GetDCCPInterface()->getIGeneral()->showFooterLinks()) { ?>
        <div class="links-info-container">
    
            <div class="links">
                <h6>ABOUT</h6>
                <a class="linkType3" href="#">History</a><br />
                <a class="linkType3" href="#">Jobs Information</a><br />
                <a class="linkType3" href="#">Our Services</a><br />
                <a class="linkType3" href="#">Our Stuff</a>
               </div>
            
            <div class="links">
                <h6>SERVICES</h6>
                <a class="linkType3" href="#">Website Templates</a><br />
                <a class="linkType3" href="#">Logo Design</a><br />
                <a class="linkType3" href="#">Mobile Applications</a><br />
                <a class="linkType3" href="#">Graphic Design</a>
               </div>
            
            <div class="links">
                <h6>TEMPLATES</h6>
                <a class="linkType3" href="#">Image positioning</a><br />
                <a class="linkType3" href="#">List examples</a><br />
                <a class="linkType3" href="#">Text and Table</a><br />
                <a class="linkType3" href="#">Full Page examples</a>
               </div>
            
            <div class="links">
                <h6>CONTACT / HELP</h6>
                <a class="linkType3" href="#">Help/FAQ</a><br />
                <a class="linkType3" href="#">Contact</a><br />
                <a class="linkType3" href="#">Office Locations</a><br />
                <a class="linkType3" href="#">Company Headquarter</a>
               </div>
            
            <div class="info">
                <h6>COMPANY INFO</h6>
                <p>Company street adress 12</p>
                <p>State 1234</p>
                <p>precious@ourdomain.com</p>
                <p>Phone: (550) 2343-1234</p>
                <p>Fax: (550) 2343-123</p>
            </div>
            <div class="clear-both"></div>    
        </div> <!--links-info-container-->
        <?php } ?>
        
        <?php if(GetDCCPInterface()->getIGeneral()->showFooterWidgetized()) { ?>
        <div id="widgetized-footer">
            <div class="sidebar">
                <?php GetDCCPInterface()->getIGeneral()->renderFooterSidebarA(); ?>
            </div>
            <div class="sidebar">
                <?php GetDCCPInterface()->getIGeneral()->renderFooterSidebarB(); ?> 
            </div>
            <div class="sidebar-last">
                <?php GetDCCPInterface()->getIGeneral()->renderFooterSidebarC(); ?> 
            </div>
            <div class="clear-both"></div>                        
        </div> <!--widgetized-footer-->
        <?php } 
        

            $fb_style = ' style="';
            $show_copy = GetDCCPInterface()->getIGeneral()->showFooterCopy();
            $show_line = GetDCCPInterface()->getIGeneral()->showFooterLine();

            if(!$show_line)
            {
                $fb_style .= 'background-image:none;';     
            }
            $fb_style .= '" ';
            
            echo '<div id="footer-bottom" '.$fb_style.'>';
            
                if($show_copy)
                {
                    echo GetDCCPInterface()->getIGeneral()->getFooterCopy().'<br />';
                }
                
                if(GetDCCPInterface()->getIGeneral()->showFooterLogo())
                {              
            ?>
            <a href="<?php  echo get_bloginfo('url'); ?>"><img src="<?php  echo GetDCCPInterface()->getIGeneral()->getFooterLogoPath(); ?>" style="margin-top:8px;" alt="" /></a><br />
            <?php } ?>
        </div> <!--footer-bottom-->  
        
    </div> <!--footer-->
    

  
    <?php wp_footer(); GetDCCPInterface()->getIGeneral()->printFooterTrackingCode(); ?>
</body>
</html>

<?php ob_end_flush(); ?>

