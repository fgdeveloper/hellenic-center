        <?php 
    
          $site_overview_title1 = get_option('ecobiz_site_overview_title1'); 
          $site_overview_url1   = get_option('ecobiz_site_overview_url1');
          $site_overview_icon1  = get_option('ecobiz_site_overview_icon1');
          $site_overview_desc1  = get_option('ecobiz_site_overview_desc1');
          $site_overview_title2 = get_option('ecobiz_site_overview_title2'); 
          $site_overview_url2   = get_option('ecobiz_site_overview_url2');
          $site_overview_icon2  = get_option('ecobiz_site_overview_icon2');
          $site_overview_desc2  = get_option('ecobiz_site_overview_desc2');
          $site_overview_title3 = get_option('ecobiz_site_overview_title3'); 
          $site_overview_url3   = get_option('ecobiz_site_overview_url3');
          $site_overview_icon3  = get_option('ecobiz_site_overview_icon3');
          $site_overview_desc3  = get_option('ecobiz_site_overview_desc3');
          $site_overview_title4 = get_option('ecobiz_site_overview_title4'); 
          $site_overview_url4   = get_option('ecobiz_site_overview_url4');
          $site_overview_icon4  = get_option('ecobiz_site_overview_icon4');
          $site_overview_desc4  = get_option('ecobiz_site_overview_desc4');                  
        ?>          
          
          <!-- Content Box #1 -->
          <div class="mainbox">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 1')) { ?>
              <h4><a href="<?php echo $site_overview_url1 ? $site_overview_url1 :"#";?>"><?php echo ($site_overview_title1) ? stripslashes($site_overview_title1) :  "";?></a></h4>
              <?php if ($site_overview_icon1 !="") { ?>
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $site_overview_icon1;?>&amp;h=64&amp;w=64&amp;zc=1" class="alignleft" alt="" />
              <?php } ?>
              <p><?php echo $site_overview_desc1 ? stripslashes($site_overview_desc1) : "";?></p>
            <?php } ?>
          </div>
          
          <!-- Content Box #2 -->
          <div class="mainbox box-last">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Box 2')) { ?>
              <h4><a href="<?php echo $site_overview_url2 ? $site_overview_url2 :"#";?>"><?php echo $site_overview_title2 ? stripslashes($site_overview_title2) : "";?></a></h4>
              <?php if ($site_overview_icon2 !="") { ?>
              <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $site_overview_icon2;?>&amp;h=64&amp;w=64&amp;zc=1" class="alignleft" alt="" />
              <?php } ?>
              <p><?php echo $site_overview_desc2 ? stripslashes($site_overview_desc2) : "";?></p>
            <?php } ?>
          </div>
          
          <div class="spacer"></div>
          
          <!-- Content Box #3 -->
          <div class="mainbox">
            <h4><a href="<?php echo $site_overview_url3 ? $site_overview_url3 :"#";?>"><?php echo $site_overview_title3 ? stripslashes($site_overview_title3) : "";?></a></h4>
            <?php if ($site_overview_icon3 !="") { ?>
            <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $site_overview_icon3;?>&amp;h=64&amp;w=64&amp;zc=1" class="alignleft" alt="" />
            <?php } ?>
            <p><?php echo $site_overview_desc3 ? stripslashes($site_overview_desc3) : "";?></p>
          </div>
          
          <!-- Content Box #4 -->
          <div class="mainbox box-last">
            <h4><a href="<?php echo $site_overview_url4 ? $site_overview_url4 :"#";?>"><?php echo $site_overview_title4 ? stripslashes($site_overview_title4) : "";?></a></h4>
            <?php if ($site_overview_icon4 !="") { ?>
              <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $site_overview_icon4;?>&amp;h=64&amp;w=64&amp;zc=1" class="alignleft" alt="" />
            <?php } ?>
            <p><?php echo $site_overview_desc4 ? stripslashes($site_overview_desc4) : "";?></p>
          </div>