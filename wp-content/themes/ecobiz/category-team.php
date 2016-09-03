<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php the_title();?></h3>
          <p><?php echo $page_short_desc;?></p>
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
          <?php if (have_posts()) : ?>
          <?php $counter = 0;?>
          <?php while (have_posts()) : the_post();?>
          <?php $counter++;?>
          <?php if ($counter %2 ==0) { ?>
              <div class="mainbox box-last"> 
            <?php } else { ?>
              <div class="mainbox">
            <?php } ?>
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <div class="boximg">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
            <?php } ?>
            </div>
            <p><?php echo excerpt(25);?></p>
            <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW MORE DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
            </div>         
            <?php if ($counter %2 ==0) { ?>
              <div class="spacer"></div> 
            <?php } ?>      
          <?php endwhile;?>
          <?php endif;?>
          <div class="clear"></div>
          <?php 
          $enable_comment = get_option('ecobiz_enable_comment');
          if ($enable_comment == "false") {
            comments_template('', true);  
          }
          ?>    
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>