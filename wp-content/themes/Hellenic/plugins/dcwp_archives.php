<?php  
/*
 * Plugin Name: Archives (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Archives (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

  class dcwp_archives extends WP_Widget {
   
       function dcwp_archives() {
           $widget_ops = array('classname' => 'dcwp_archives', 'description' => 'A monthly archive of your site posts (Prestige)');
           $this->WP_Widget('dcwp_archives', 'dcwp_Archives', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract($args);
           $c = $instance['count'] ? '1' : '0';
           $limit = empty($instance['limit']) ? '' : $instance['limit'];
           $title = apply_filters('widget_title', empty($instance['title']) ? 'Archives' : $instance['title'], $instance, $this->id_base);
   
           echo $before_widget;
           if ( $title )
               echo $before_title . $title . $after_title;
               
               
          $arch_args = array('type' => 'monthly', 'show_post_count' => $c);
          if($limit != '')
          {
             $arch_args['limit'] = $limit;
          }     
   
   ?>

           <ul class="widget-archives">
           <?php wp_get_archives(apply_filters('widget_archives_args', $arch_args)); ?>
           </ul>
   <?php

   
           echo $after_widget;
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'limit' => '') );
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['limit'] = strip_tags($new_instance['limit']); 
           $instance['count'] = $new_instance['count'] ? 1 : 0;
   
           return $instance;
       }
   
       function form( $instance ) {
           $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'limit' => '') );
           $title = strip_tags($instance['title']);
           $limit = strip_tags($instance['limit']);
           $count = $instance['count'] ? 'checked="checked"' : '';
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
           <p>
               <input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php echo 'Show post counts'; ?></label>
           </p>
           <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php echo 'Limit (e.g 12, if empty no limit):'; ?></label> <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo esc_attr($limit); ?>" /></p>
   <?php
       }
   }

  // Register widget
  function dcwp_archivesInit() { register_widget('dcwp_archives'); }
  add_action('widgets_init', 'dcwp_archivesInit');

?>
