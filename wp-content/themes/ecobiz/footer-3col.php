<!-- Footer Box #1 -->
      <div class="footerbox footerbox-3col">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom1')) { ?>
        <h4><?php echo __('Categories','ecobiz');?></h4>
        <ul>
          <?php wp_list_categories('title_li=&hide_empty=0');?> 
        </ul>
        <?php } ?>
      </div>
      
      <!-- Footer Box #2 -->
      <div class="footerbox footerbox-3col">
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom2')) { ?>
        <h4><?php echo __('Our Address','ecobiz');?></h4>
        <ul class="addresslist">
        <?php
          $info_address = get_option('ecobiz_info_address');
          $info_phone = get_option('ecobiz_info_phone');
          $info_fax = get_option('ecobiz_info_fax');
          $info_email= get_option('ecobiz_info_email');
          $info_website = get_option('ecobiz_info_website');
        ?>        
          <li>
            <?php echo $info_address ? stripslashes($info_address) :  
            "Jln. Damai menuju Syurga No. 14,<br />
            Jakarta 20035,<br />
            Indonesia";?>
          </li>
          <li><strong><?php echo __('Phone ','ecobiz');?></strong>: <?php echo $info_phone ? $info_phone : "+62 525625";?></li>
          <?php if ($info_fax !="") { ?>
          <li><strong><?php echo __('FAX ','ecobiz');?></strong>: <?php echo $info_fax ? $info_fax : "+62 525625";?></li>
          <?php } ?>
          <li><strong><?php echo __('Email ','ecobiz');?></strong>: <a href="mailto:<?php echo $info_email;?>"><?php echo $info_email ? $info_email : "info@mydomain.com";?></a></li>
          <li><strong><?php echo __('Website ','ecobiz');?></strong>: <a href="http://<?php echo $info_website;?>"><?php echo $info_website ? $info_website : "www.mydomain.com";?></a></li>
        </ul>
        <?php } ?>
      </div>
      
      <!-- Footer Box #3 -->
      <div class="footerbox  footerbox-3col box-last">
        <?php $footerlogo = get_option('ecobiz_footerlogo'); ?>
        <a href="<?php echo home_url();?>"><img src="<?php echo $footerlogo;?>" alt="Footer Logo" class="alignleft"/></a>
        <div class="clear"></div>      
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom3')) { ?>
        <?php } ?>
        <ul class="social-links">
        <?php
          $twitter_id = get_option('ecobiz_twitter_id');
          $facebook_url = get_option('ecobiz_facebook_url');
          $linkedin_url = get_option('ecobiz_linkedin_url');
          $flickr_id = get_option('ecobiz_flickr_id');
          $youtube_id = get_option('ecobiz_youtube_id');
        ?>
          <li>
          <?php if ($linkedin_url !="") { ?>
            <a href="<?php echo $linkedin_url;?>"><img src="<?php echo get_template_directory_uri();?>/images/linkedin.png" alt="Linkedin" /></a>
          <?php } ?>
          </li>
          <li>
          <?php if ($twitter_id !="") { ?> 
          <a href="http://twitter.com/<?php echo $twitter_id;?>"><img src="<?php echo get_template_directory_uri();?>/images/twitter.png" alt="Twitter" /></a>
          <?php } ?>
          </li>
          <li>
          <?php if ($facebook_url !="") { ?>
            <a href="<?php echo $facebook_url;?>"><img src="<?php echo get_template_directory_uri();?>/images/facebook.png" alt="Facebook" /></a>
          <?php } ?>
          </li>
          <li>
          <?php if ($flickr_id !="") { ?>
            <a href="http://www.flickr.com/photos/<?php echo $flickr_id;?>"><img src="<?php echo get_template_directory_uri();?>/images/flickr.png" alt="Flickr" /></a>
          <?php } ?>
          </li>
          <?php if ($youtube_id !="") { ?>
            <a href="http://www.youtube.com/user/<?php echo $youtube_id;?>"><img src="<?php echo get_template_directory_uri();?>/images/youtube.png" alt="Flickr" /></a>
          <?php } ?>
          </li>
          <li><a href="<?php bloginfo('rss2_url');?>"><img src="<?php echo get_template_directory_uri();?>/images/feed.png" alt="RSS" /></a></li>
        </ul>
      </div>