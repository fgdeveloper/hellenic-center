<?php
/*
Template Name: Full Width
*/
?>  

<?php get_header();?>
    
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
        <!-- Main Content Wrapper -->
        <div class="maincontent-full">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <?php the_content();?>
          <?php endwhile;?>
          <?php endif;?>
          
          <div class="clear"></div>
          <?php 
          $enable_comment = get_option('ecobiz_enable_comment');
          if ($enable_comment == "true") {
            comments_template('', true);  
          }
          ?> 
          
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>