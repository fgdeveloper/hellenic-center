<?php
/*
Template Name: Contact Form
*/
?>  
<?php get_header();?>

    <?php
      $info_address = get_option('ecobiz_info_address');
      $info_phone = get_option('ecobiz_info_phone');
      $info_fax = get_option('ecobiz_info_fax');
      $info_email= get_option('ecobiz_info_email');
      $info_website = get_option('ecobiz_info_website');
      $info_latitude = get_option('ecobiz_info_latitude') ? get_option('ecobiz_info_latitude') : "-6.229555086277892";
      $info_longitude = get_option('ecobiz_info_longitude') ? get_option('ecobiz_info_longitude') : "106.82551860809326";
    ?>
                
      <?php
        global $post;
        $page_slideshow_type = get_post_meta($post->ID,"_page_slideshow_type",true);
        $slideshow_cat = get_post_meta($post->ID,"_page_slideshow_category",true);
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
        $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date";
      ?>      
      <?php if ($page_slideshow_type =="" || !isset($page_slideshow_type) || $page_slideshow_type == "None" ) { ?>
        <!-- Page Heading --> 
        <div id="page-heading">
          <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
          <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
            <h3><?php the_title();?></h3>
            <p><?php echo $page_short_desc;?></p>
          </div>
        </div>
        <!-- Page Heading End -->
      <?php } else { ?>
        <?php
        if ($page_slideshow_type !="None"  || $page_slideshow_type == "Nivo slider" || $page_slideshow_type == "Kwicks slider") {
          if ($page_slideshow_type == "Nivo slider") {
            get_nivoslider($slideshow_cat,$slideshow_order);
          } else if ($page_slideshow_type == "Kwicks slider") {
            get_kwicksslider($slideshow_cat,$slideshow_order);
          }
        }
        ?>
      <?php } ?>
      <div class="clear"></div>
      
      <div class="center">
        <?php $enable_breadcrumbs = get_option('ecobiz_enable_breadcrumb');?>
        <?php if ($enable_breadcrumbs =="true") { ?>
          <div class="breadcrumb">
            <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
          </div>
        <?php } ?>
        <!-- Full Width Wrapper -->
        <div class="maincontent-full">
          <!-- Contact Form -->
          <div id="conctactleft">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();?>
            <?php the_content();?>
            <?php endwhile;?>
            <?php endif;?>
            
            <?php $success_msg  = get_option('ecobiz_success_msg');?>
            <div class="success-message"><?php echo ($success_msg) ? stripslashes($success_msg) : __("Your message has been sent successfully. Thank you!",'ecobiz');?></div>
            
            <div id="maincontactform">
              <form action="#" id="contactform"> 
              <div>
                <label for="contactname"><?php echo __('Name ','ecobiz');?></label>
                <input type="text" name="contactname" class="textfield" id="contactname" value=""  /><span class="require"> *</span>
                <label for="contactsubject"><?php echo __('Subject ','ecobiz');?></label>
                <input type="text" name="contactsubject" class="textfield" id="contactsubject" value=""/><span class="require"> *</span>
                <label for="contactemail"><?php echo __('E-mail ','ecobiz');?></label> 
                <input type="text" name="contactemail" class="textfield" id="contactemail" value="" /><span class="require"> *</span>
                <label for="contactmessage"><?php echo __('Message ','ecobiz');?></label> 
                <textarea name="contactmessage" id="contactmessage" class="textarea" cols="8" rows="12"></textarea><span class="require"> *</span>
                <div class="clear"></div>
                <input type="hidden" name="siteurl" id="siteurl" value="<?php echo get_template_directory_uri();?>" />   
                <input type="hidden" name="sendto" id="sendto" value="<?php echo (get_option('ecobiz_info_email')) ? get_option('ecobiz_info_email') : get_option('admin_email');?>" />           
                <a href="#" class="button" id="buttonsend"><span><?php echo __('SEND','ecobiz');?></span></a>
                <span class="loading" style="display: none;"><?php echo __('Please wait..','ecobiz');?></span>
              </div>
              </form>
            </div>
          </div>
          <!-- Contact Form End -->
          
          <!-- Contact Address -->
          <div id="contactright">
            
            <div id="map" class="imgbox">
              <?php echo theme_widget_text_shortcode(do_shortcode('[gmap width="424" height="246" latitude="'.$info_latitude.'" longitude="'.$info_longitude.'" zoom="15" html="'.$info_address.'" popup="true"]'));?>
            </div>
                
            <ul class="contactinfo">
              <li>
              <?php echo $info_address ? stripslashes($info_address) : "
              Jln. Damai menuju Syurga No. 14,<br />
            Jakarta 20035,<br />
            Indonesia";?></li>
              <li><strong><?php echo __('Phone','ecobiz');?></strong> : <?php echo $info_phone;?></li>
              <?php if ($info_fax !="") { ?>
                <li><strong><?php echo __('Fax','ecobiz');?></strong> : <?php echo $info_fax;?></li>
              <?php } ?>
              <li><strong><?php echo __('Email','ecobiz');?></strong> : <a href="mailto:<?php echo $info_email ? $info_email : "#";?>"><?php echo $info_email;?></a><br />
              <strong><?php echo __('Website','ecobiz');?></strong> : <a href="http://<?php echo $info_website ? $info_website : "#";?>"><?php echo $info_website;?></a></li>
            </ul>      
            <div class="clear"></div>
          </div>
          <!-- Contact Address End -->          
        </div>
        <!-- Full Width Wrapper End -->
    
<?php get_footer();?>