<?php
/*
Template Name: Homepage with Blog
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
      <?php 
        $disable_features_box = get_option('ecobiz_disable_features_box');
        $sitefeatures_cols = get_option('ecobiz_sitefeatures_cols');
        if ($disable_features_box == "false") {  
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Site Features Box')) { 
            get_template_part( 'featureslist','4 columns site features' );
          } 
        } 
      ?>
      <div class="clear"></div>
      <div class="center">
        <!-- Main Content -->
        <div class="maincontent">
        <?php
          $welcome_title = get_option('ecobiz_welcome_title');
          $welcome_message = get_option('ecobiz_welcome_message');
        ?>
          <h3><?php echo ($welcome_title) ? stripslashes($welcome_title) : "Welcome to Our Site!";?></h3>
          <p><?php echo ($welcome_message) ? stripslashes($welcome_message) : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum dui quis sem fermentum a mattis ipsum ultrices. Integer eu lacus sit amet mauris hendrerit egestas et eget neque. Mauris ac justo tempus velit imperdiet placerat. Nullam dolor lectus, sollicitudin sed dictum nec, consequat in erat. Quisque nibh ligula";?></p>
        
        <div class="divider"></div>
          
        <!-- List Latest News Start //-->
        <ul id="listlatestnews">
        <?php
          $blog_cats_include = get_option('ecobiz_blog_categories');
          if(is_array($blog_cats_include)) {
            $blog_include = implode(",",$blog_cats_include);
          } 
          
          $paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
          $blog_items_num = (get_option('ecobiz_blog_items_num')) ? get_option('ecobiz_blog_items_num') : 5;
          $blog_order = (get_option('ecobiz_blog_order')) ? get_option('ecobiz_blog_order')  : "date"; 
          $blog_text_num = (get_option('ecobiz_blog_text_num')) ? get_option('ecobiz_blog_text_num') : 75;
          
          $r = new WP_Query(array('cat'=>$blog_include,'showposts'=>$blog_items_num,'orderby'=>$blog_order,'paged'=>$paged));
          while ( $r->have_posts() ) : $r->the_post();
          ?>
          <li>
            <div class="boximg-blog">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <div class="blogimage">
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
              </div>
            <?php } ?>
            </div>
            <div class="postbox <?php post_class(); ?>">
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
          <div class="pagination">
            <?php theme_blog_pagenavi('', '', $r, $paged);?>
          </div>        
                   
        </div>
        <!-- Main Content End -->
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
        
<?php get_footer();?>