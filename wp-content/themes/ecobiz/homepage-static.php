<?php
/*
Template Name: Homepage Static
*/
?>  
<?php get_header();?>
    
    <?php include (TEMPLATEPATH.'/slideshow/slideshow-static.php');?>
    
    <div class="clear"></div>
    
    <?php $disable_features_box = get_option('ecobiz_disable_features_box'); ?>
      <?php if ($disable_features_box == "false") { ?>
      <?php get_template_part( 'featureslist','4 cols site features' );?>
      <?php } ?>
      
      <div class="clear"></div>
      <div class="center">
        <!-- Main Content -->
        <div class="maincontent">
        <?php
          $welcome_title = get_option('ecobiz_welcome_title');
          $welcome_message = get_option('ecobiz_welcome_message');
        ?>
          <h3><?php echo ($welcome_title) ? $welcome_title : "Welcome to Our Site!";?></h3>
          <p><?php echo ($welcome_message) ? $welcome_message : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum dui quis sem fermentum a mattis ipsum ultrices. Integer eu lacus sit amet mauris hendrerit egestas et eget neque. Mauris ac justo tempus velit imperdiet placerat. Nullam dolor lectus, sollicitudin sed dictum nec, consequat in erat. Quisque nibh ligula";?></p>
          
          <?php get_template_part( 'site-overview','4 cols site overview' );?>
        </div>
        <!-- Main Content End -->
        
        <?php get_sidebar();?>
        
<?php get_footer();?>