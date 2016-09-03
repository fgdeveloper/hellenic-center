<?php  
/*
 * Plugin Name: Categories (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Categories (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

 class dcwp_categories extends WP_Widget {
   
       function dcwp_categories() {
           $widget_ops = array( 'classname' => 'dcwp_categories', 'description' => "A list of categories (Prestige)");
           $this->WP_Widget('dcwp_categories', 'dcwp_Categories', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract( $args );
   
           $title = apply_filters('widget_title', empty( $instance['title'] ) ? 'Categories' : $instance['title'], $instance, $this->id_base);
           $c = $instance['count'] ? '1' : '0';
           $h = $instance['hierarchical'] ? '1' : '0';
   
           echo $before_widget;
           if ( $title )
               echo $before_title . $title . $after_title;
   
           $cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h, 'use_desc_for_title' => 0);
    
           echo '<ul class="widget-categories">';  
           $cat_args['title_li'] = '';
           wp_list_categories(apply_filters('widget_categories_args', $cat_args));  
           echo '</ul>';
   
           echo $after_widget;
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
           $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
   
           return $instance;
       }
   
       function form( $instance ) {
           //Defaults
           $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
           $title = esc_attr( $instance['title'] );
           $count = isset($instance['count']) ? (bool) $instance['count'] :false;
           $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p>  
           <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
           <label for="<?php echo $this->get_field_id('count'); ?>"><?php echo 'Show post counts'; ?></label><br />
   
           <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
           <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php echo 'Show hierarchy'; ?></label></p>
   <?php
       }
   
   }

  // Register widget
  function dcwp_categoriesInit() { register_widget('dcwp_categories'); }
  add_action('widgets_init', 'dcwp_categoriesInit');

?>
