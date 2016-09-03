<?php
/*
Template Name: Portfolio 3 Columns
*/
?>
<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading3.jpg';?>" alt="" />
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
        <div class="maincontent-full">
          <?php $portfolio_desc = get_option('ecobiz_portfolio_desc');?>
          <?php echo stripslashes($portfolio_desc);?>
          
          <ul class="portfolio-3col">
          <?php 
          $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $portfolio_items_num  = (get_option('ecobiz_portfolio_items_num')) ? get_option('ecobiz_portfolio_items_num') : 6; 
          $portfolio_order = (get_option('ecobiz_portfolio_order')) ? get_option('ecobiz_portfolio_order') : "date";
          
          query_posts(array( 'post_type' => 'portfolio', 'showposts' => $portfolio_items_num,'paged'=>$page,"orderby" => $portfolio_order,'order'=> 'ASC'));
          
          $counter = 0;
          while ( have_posts() ) : the_post();
          $counter++;
            $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
            $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
            $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
            ?>
            <li <?php if ($counter %3 == 0) echo 'class="last"';?>>
              <div class="portfolio-blockimg2">
                <div class="portfolio-imgbox2">
                <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=122&amp;w=270&amp;zc=1" class="boximg-pad2 fade" alt="" /></a>
                  <?php } ?>
                </div>
                </div>
                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                <p><?php echo excerpt(15);?></p>
                <?php $portfolio_readmore = get_option('ecobiz_portfolio_readmore'); ?>
                <a href="<?php the_permalink();?>" class="button"><span><?php echo $portfolio_readmore ? $portfolio_readmore : __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>     
              </div>
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
    
  <?php get_footer();?>