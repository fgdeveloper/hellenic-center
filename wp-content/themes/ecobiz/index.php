<?php get_header();?>

    <?php if (is_home()) { ?>
      <?php
      $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date"; 
      $slideshow_category = get_option('ecobiz_slideshow_cat');
      
      get_nivoslider($slideshow_category,$slideshow_order);
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
          
          <?php get_template_part( 'site-overview','4 cols site overview' );?>         
        </div>
        <!-- Main Content End -->
        
        <?php get_sidebar();?>
        
<?php get_footer();?>