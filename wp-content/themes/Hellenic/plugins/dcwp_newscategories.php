<?php  
/*
 * Plugin Name: News Categories (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: News Categories (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

 class dcwp_newscategories extends WP_Widget {
   
       function dcwp_newscategories() {
           $widget_ops = array( 'classname' => 'dcwp_newscategories', 'description' => "A list of news categories (Prestige)");
           $this->WP_Widget('dcwp_newscategories', 'dcwp_NewsCategories', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract( $args );
   
           $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base);
           $c = $instance['count'] ? '1' : '0';
   
           echo $before_widget;
           if ( $title )
               echo $before_title . $title . $after_title;
   
           $cat_args = array('orderby' => 'name'); 
           $news_terms = get_terms('news_cat', $cat_args); 
    
           echo '<ul class="widget-categories">';  
           foreach($news_terms as $pt)
           {
                $out = '';
                $out .= '<li>';
                $out .= '<a href="'.get_term_link($pt->slug, 'news_cat').'" target="_self" title="View all news filed under '.$pt->name.'">'.$pt->name.'</a>';
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
           <label for="<?php echo $this->get_field_id('count'); ?>">Show news counts</label><br />
   <?php
       }
   
   }

  // Register widget
  function dcwp_newscategoriesInit() { register_widget('dcwp_newscategories'); }
  add_action('widgets_init', 'dcwp_newscategoriesInit');

?>
