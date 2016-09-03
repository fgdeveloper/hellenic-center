<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading4.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php echo __('Search','ecobiz');?> </h3>
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
        <!-- List Latest News Start //-->
        <h3><?php echo __('Search Results for ','ecobiz');?> <?php echo '"'.$s.'"';?></h3><br />
        <ul id="listlatestnews">
        <?php
          $blog_cats_include = get_option('ecobiz_blog_categories');
          if(is_array($blog_cats_include)) {
            $blog_include = implode(",",$blog_cats_include);
          } 
          
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $blog_items_num = (get_option('ecobiz_blog_items_num')) ? get_option('ecobiz_blog_items_num') : 5;
          $blog_order = (get_option('ecobiz_blog_order')) ? get_option('ecobiz_blog_order')  : "date"; 
          $blog_text_num = (get_option('ecobiz_blog_text_num')) ? get_option('ecobiz_blog_text_num') : 75;
          
          while ( have_posts() ) : the_post();
          ?>
          <li>
            <div class="boximg-blog">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <div class="blogimage">
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
              </div>
            <?php } ?>
            </div>
            <div class="postbox">
            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p><?php echo excerpt($blog_text_num);?></p>
           </div>
           <div class="clear"></div>
            <div class="metapost">
              <span class="first"><?php echo __('Posted at ','ecobiz');?><?php the_time( get_option('date_format') ); ?></span> | 
              <span><?php echo __('By ','ecobiz');?>: <?php the_author_posts_link();?></span>  |                         
              <span><?php echo __('Categories ','ecobiz');?>: <?php the_category(',');?></span>  | 
              <span><?php comments_popup_link(__('0 Comment','ecobiz'),__('1 Comment','ecobiz'),__('% Comments','ecobiz'));?></span>
            </div>           
            <div class="clear"></div>
          </li>
          <?php endwhile;?> 
          </ul>
          <div class="clear"></div>
          <?php 
            global $wp_query; 
            $total_pages = $wp_query->max_num_pages; 
            if ( $total_pages > 1 ) {
            if (function_exists("wpapi_pagination")) {
                wpapi_pagination($total_pages); 
              }
            }
          ?>           
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>