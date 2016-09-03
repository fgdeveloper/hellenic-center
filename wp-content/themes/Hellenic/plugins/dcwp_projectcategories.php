<?php  
/*
 * Plugin Name: Project Categories (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Project Categories (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

 class dcwp_projectcategories extends WP_Widget {
   
       function dcwp_projectcategories() {
           $widget_ops = array( 'classname' => 'dcwp_projectcategories', 'description' => "A list of project categories (Prestige)");
           $this->WP_Widget('dcwp_projectcategories', 'dcwp_ProjectCategories', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract( $args );
   
           $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base);
           $c = $instance['count'] ? '1' : '0';
   
           echo $before_widget;
           if ( $title )
               echo $before_title . $title . $after_title;
   
           $cat_args = array('orderby' => 'name');
           $proj_terms = get_terms('project_cat', $cat_args); 
    
           echo '<ul class="widget-categories">';  
           foreach($proj_terms as $pt)
           {
                $out = '';
                $out .= '<li>';
                $out .= '<a href="'.get_term_link($pt->slug, 'project_cat').'" target="_self" title="View all projects filed under '.$pt->name.'">'.$pt->name.'</a>';
                if($c) { $out .= ' ('.$pt->count.')'; }
                $out .= '</li>';
                echo $out;    
           }
           echo '</ul>';
   
           echo $after_widget;
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
   
           return $instance;
       }
   
       function form( $instance ) {
           //Defaults
           $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
           $title = esc_attr( $instance['title'] );
           $count = isset($instance['count']) ? (bool) $instance['count'] :false;
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p>  
           <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
           <label for="<?php echo $this->get_field_id('count'); ?>">Show post counts</label><br />
   <?php
       }
   
   }

  // Register widget
  function dcwp_projectcategoriesInit() { register_widget('dcwp_projectcategories'); }
  add_action('widgets_init', 'dcwp_projectcategoriesInit');

?>
