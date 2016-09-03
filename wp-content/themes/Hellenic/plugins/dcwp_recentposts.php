<?php  
/*
 * Plugin Name: Recent Posts (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Recent Posts (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_recentposts extends WP_Widget {
   
       function dcwp_recentposts() {
           $widget_ops = array('classname' => 'dcwp_recentposts', 'description' => "The most recent posts on your site (Prestige)" );
           $this->WP_Widget('dcwp_recentposts', 'dcwp_RecentPosts', $widget_ops);
           $this->alt_option_name = 'widget_recent_entries';
   
           add_action( 'save_post', array(&$this, 'flush_widget_cache') );
           add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
           add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
       }
   
       function widget($args, $instance) {
           $cache = wp_cache_get('widget_recent_posts', 'widget');
   
           if ( !is_array($cache) )
               $cache = array();
   
           if ( isset($cache[$args['widget_id']]) ) {
               echo $cache[$args['widget_id']];
               return;
           }
   
           ob_start();
           extract($args);
   
           $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
           if ( !$number = (int) $instance['number'] )
               $number = 10;
           else if ( $number < 1 )
               $number = 1;
           else if ( $number > 15 )
               $number = 15;
   
           $showthumbs = $instance['showthumbs'] ? true : false;  
           $excluded = explode(',', $instance['excluded']);
   
           global $post;
           $oldpost = $post;
            
           $query_args = array('posts_per_page' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1);
           $query_args['category__not_in'] = $excluded;
           
           $r = new WP_Query($query_args);
           if ($r->have_posts()) :
   
           echo $before_widget;
           if ( $title ) echo $before_title . $title . $after_title; 
           
           $post_counter = 0;                      
           ?>
                      
           <ul class="widget-recent-posts">
           <?php  while ($r->have_posts())
           { 
                $r->the_post();           

                $out  = '<li>';
                if($post_counter > 0)
                {
                    $out .= '<div class="separator"></div>';
                }
                $out .= '<div class="item">';
                if($showthumbs)
                {
                    $thumb_path = get_post_meta($post->ID, 'post_mini_thumb_image', true);
                    if($thumb_path != '')
                    { 
                        $out .= '<a href="'.get_permalink($post->ID).'" ><img class="image" src="'.$thumb_path.'" /></a>';
                    }
                }
                
                $out .= '<div class="description"><span class="date">'.get_the_time('F j, Y').'</span><br /><a href="'.get_permalink($post->ID).'" >'.get_the_title().'</a></div>';

                $out .= '<div style="clear:left;height:1px;"></div></div>';                
                $out .= '</li>';
                echo $out;
                
                $post_counter++;
           
            } ?>
           </ul>
           <?php echo $after_widget; ?>
   <?php
           // Reset the global $the_post as this query will have stomped on it
          // wp_reset_postdata();
          $post = $oldpost;
   
           endif;
           wp_reset_query();
   
           $cache[$args['widget_id']] = ob_get_flush();
           wp_cache_set('widget_recent_posts', $cache, 'widget');
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['number'] = (int) $new_instance['number'];
           $instance['showthumbs'] = isset($new_instance['showthumbs']);
           $instance['excluded'] = $new_instance['excluded']; 
           $this->flush_widget_cache();
   
           $alloptions = wp_cache_get( 'alloptions', 'options' );
           if ( isset($alloptions['widget_recent_entries']) )
               delete_option('widget_recent_entries');
   
           return $instance;
       }
   
       function flush_widget_cache() {
           wp_cache_delete('widget_recent_posts', 'widget');
       }
   
       function form( $instance ) {
           $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
           if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
           {
               $number = 5;
           }    
           $showthumbs = $instance['showthumbs'] ? true : false;
           $excluded = $instance['excluded'];    
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo 'Number of posts to show:'; ?></label>
           <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
  
          <p><label for="<?php echo $this->get_field_id('showthumbs'); ?>"><?php echo 'Show thumbs?'; ?></label>
           <input id="<?php echo $this->get_field_id('showthumbs'); ?>" name="<?php echo $this->get_field_name('showthumbs'); ?>" type="checkbox" <?php echo ($showthumbs ? ' checked="checked" ' : ''); ?> /></p>
      
           <p><label for="<?php echo $this->get_field_id('excluded'); ?>"><?php echo 'Excluded categories:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('excluded'); ?>" name="<?php echo $this->get_field_name('excluded'); ?>" type="text" value="<?php echo $excluded; ?>" /></p>              
   
   <?php
       }
   }

  // Register widget
  function dcwp_recentpostsInit() { register_widget('dcwp_recentposts'); }
  add_action('widgets_init', 'dcwp_recentpostsInit');

?>
