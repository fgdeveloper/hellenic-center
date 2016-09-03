<?php get_header();?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/portfolio-video.js"></script>
    <?php
    $nivo_transition = get_option('ecobiz_nivo_transition');
    $nivo_slices = get_option('ecobiz_nivo_slices');
    $nivo_animspeed = get_option('ecobiz_nivo_animspeed');
    $nivo_pausespeed = get_option('ecobiz_nivo_pausespeed');
    $nivo_directionNav = get_option('ecobiz_nivo_directionNav');
    $nivo_directionNavHide = get_option('ecobiz_nivo_directionNavHide');
    $nivo_controlNav = get_option('ecobiz_nivo_controlNav');
    $nivo_disable_permalink = get_option('ecobiz_nivo_disable_permalink');
    $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date";
    $enable_caption = get_option('ecobiz_nivo_caption');
    $slideshow_cat = get_option('ecobiz_slideshow_cat');
    ?>
    <script type="text/javascript">
      jQuery(window).load(function($) {
        jQuery('#portfolio-slider').nivoSlider({
          effect:'<?php echo ($nivo_transition) ? $nivo_transition : "random";?>',
          slices:<?php echo ($nivo_slices) ? $nivo_slices : "15";?>,
          animSpeed:<?php echo ($nivo_animspeed) ? $nivo_animspeed : "500";?>, 
          pauseTime:<?php echo ($nivo_pausespeed) ? $nivo_pausespeed : "3000";?>,
          directionNav:<?php echo ($nivo_directionNav) ? $nivo_directionNav : "true";?>,
          directionNavHide:<?php echo ($nivo_directionNavHide) ? $nivo_directionNavHide : "true";?>,
          controlNav:<?php echo ($nivo_controlNav) ? $nivo_controlNav : "true";?>
        });
      });
      </script> 
      
      <?php
        global $post;
        
        $portfolio_page = get_option('ecobiz_portfolio_page');
			  $portfolio_pid = get_page_by_title($portfolio_page);
        $heading_image = get_post_meta($portfolio_pid->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($portfolio_pid->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($portfolio_pid->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php echo $portfolio_page;?></h3>
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
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>

          <?php
            $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
            $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
            $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
            $more_images = get_post_meta($post->ID,'_portfolio_images',true);
          ?>

          <!-- Portfolio Detail Content -->
          <div class="col_23">
            <div class="portfolio-single-box">
              <?php if ($more_images) { ?> 
                  <div id="portfolio-slider">
                    <?php
                      $pf_images = explode(',',$more_images);         
                      if (is_array($pf_images )) {  
                        foreach ($pf_images as $pf_image) { ?>
                          <a href="<?php echo $pf_image;?>" rel="prettyPhoto[portfolio]" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $pf_image;?>&amp;h=296&amp;w=566&amp;zc=1" class="fade" alt="" /></a>
                        <?php } ?> 
                      <?php }  else { ?>
                        <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                          <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=296&amp;w=566&amp;zc=1" class="fade" alt="" />
                        <?php } ?>
                      <?php } ?>
                    </div>
                  <?php } else if ($pf_link) { ?>
                  <div class="pf-video-wrapper">
                  <?php
                    if (is_youtube($pf_link)) { ?>
                      <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="youtube"></a></div>
                    <?php
                    } else if (is_vimeo($pf_link)) { ?>
                      <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="vimeo"></a></div>    
                    <?php  
                    } else if (is_quicktime($pf_link)) { 
                      ?>
                      <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="quicktime"></a></div>
                      <?php
                    } else if (is_flash($pf_link)) { ?>
                      <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="flash"></a></div>
                      <?php
                    } else { ?>
                        <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                          <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=296&amp;w=566&amp;zc=1" class="fade" alt="" />
                        <?php } ?>
                      <?php } 
                    ?>
                    </div>  
                  <?php } ?>
            </div>
          </div>
          <div class="col_13_last">
            <h3><?php the_title();?></h3>
            <?php the_content();?>
            <?php $portfolio_visitsite = get_option('ecobiz_portfolio_visitsite');?>
            <?php if ($pf_url !="") { ?>
              <a href="<?php echo $pf_url;?>" class="button"><span><?php echo $portfolio_visitsite ? $portfolio_visitsite : __('VISIT SITE ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
            <?php } ?>
          </div>
          <!-- Portfolio Detail Content End -->
          <?php endwhile;?>
          <?php endif;?>
          
          <div class="clear"></div>
          <div class="random-portfolio">
          <?php imediapixel_get_related_portfolio($num=4,$title="Related Portfolio");?>
          </div>
          
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>