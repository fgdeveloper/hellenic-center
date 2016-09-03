<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php echo __('404 Page','ecobiz');?></h3>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <?php $enable_breadcrumbs = get_option('ecobiz_enable_breadcrumb');?>
        <?php if ($enable_breadcrumbs =="true") { ?>
          <div class="breadcrumb">
            <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
          </div>
        <?php } ?>
        
        <!-- Main Content Wrapper -->
        <div class="maincontent">
        <?php
          $_404_text = (get_option('ecobiz_404_text')) ? get_option('ecobiz_404_text') : __("Apologies, but the page you requested could not be found",'ecobiz_');
        ?>
        <h1><?php echo stripslashes($_404_text);?></h1>
        <h4><?php echo __('Try different search?','ecobiz');?></h4>
        <div style="float: left;">
        <?php get_template_part('searchbox','Custom ECOBIZ search box');?>
        </div>      
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>