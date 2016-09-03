<?php get_header();?>
    
      <?php
        global $post;
        
        $blog_page = get_option('ecobiz_blog_page');
        $blog_page_id = get_page_by_title($blog_page);
        $heading_image = get_post_meta($blog_page_id->ID,"_heading_image",true); 
        $bgtext_heading_position = get_post_meta($blog_page_id->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($blog_page_id->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3>
          <?php
          $post_categories = wp_get_post_categories( $post->ID);
          $cats = array();
          	
          foreach($post_categories as $c){
          	$cat = get_category( $c );            
            echo $cat->name;            
          }
          ?>          
          </h3>
          <p><?php if ($page_short_desc !="")  echo $page_short_desc; else echo category_description($category[0]->cat_ID);?></p>
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
          <?php while (have_posts()) : the_post();?>
          <h3><?php the_title();?></h3>
          <div class="metapost">
            <span class="first"><?php echo __('Posted at ','ecobiz');?><?php the_time( get_option('date_format') ); ?></span> | 
            <span><?php echo __('By ','ecobiz');?>: <?php the_author_posts_link();?></span>  |                         
            <span><?php echo __('Categories ','ecobiz');?>: <?php the_category(',');?></span>  | 
            <span><?php comments_popup_link(__('0 Comment','ecobiz'),__('1 Comment','ecobiz'),__('% Comments','ecobiz'));?></span>
          </div>           
          <div class="clear"></div>
          <?php the_content();?>
          
          <div class="navigation">
    				<div class="alignleft"><?php previous_post_link( '%link', '' . __( '&larr;', 'Previous post link', 'ecoboz' ) . ' %title' ); ?></div>
    				<div class="alignright"><?php next_post_link( '%link', '%title ' . __( '&rarr;', 'Next post link', 'ecobiz' ) ); ?></div>
				  </div><!-- #nav-below -->
          <?php endwhile;?>
          <?php endif;?>
          
          <div class="clear"></div>

          <!-- Author Box Start //-->
          <?php $author_box = get_option('ecobiz_author_box');?>
          <?php if ($author_box != "true") { ?>
          <div id="authorbox">
            <div class="blockavatar">
              <?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('user_email'), '48'); }?>
            </div>
             <div class="detail">
                <h4><?php echo __('About ','ebiz');?><a href="<?php the_author_meta('url') ?>"><?php the_author_meta('display_name'); ?></a></h4>
                <p><?php the_author_meta('description'); ?></p>
             </div>
             <div class="clear"></div>
          </div> 
          <?php } ?>
          <!-- Author Box End //-->
          
          <div class="clear"></div>
          <?php $disable_comment = get_option('ecobiz_disable_comment'); ?>
          <?php 
          if ($disable_comment !="true") {
            comments_template('', true);  
          }
          ?>
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>