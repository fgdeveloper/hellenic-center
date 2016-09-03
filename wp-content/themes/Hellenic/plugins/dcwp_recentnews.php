<?php  
/*
 * Plugin Name: Recent News (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Recent News (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_recentnews extends WP_Widget {
   
       function dcwp_recentnews() {
           $widget_ops = array('classname' => 'dcwp_recentnews', 'description' => "The most recent news on your site (Prestige)" );
           $this->WP_Widget('dcwp_recentnews', 'dcwp_RecentNews', $widget_ops);
       }
   
       function widget($args, $instance) {
           ob_start();
           extract($args);
   
           $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent News' : $instance['title'], $instance, $this->id_base);
           if ( !$number = (int) $instance['number'] )
               $number = 10;
           else if ( $number < 1 )
               $number = 1;
           else if ( $number > 15 )
               $number = 15;
   
           $showthumbs = $instance['showthumbs'] ? true : false;  
   
           global $post;
           $oldpost = $post;
            
           $query_args = array('posts_per_page' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'post_type' => 'news');
           
           $r = new WP_Query($query_args);
           if($r->have_posts())
           {
   
               echo $before_widget;
               if ( $title ) echo $before_title . $title . $after_title; 
               
               $post_counter = 0;
               echo '<ul class="widget-recent-posts">';                       
               
               while($r->have_posts())
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
                        $thumb_path = get_post_meta($post->ID, 'news_mini_thumb_image', true);
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
               
              }
                 
              echo '</ul>';
              echo $after_widget; 
              $post = $oldpost;
   
            }
           wp_reset_query();
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['number'] = (int) $new_instance['number'];
           $instance['showthumbs'] = isset($new_instance['showthumbs']);

           return $instance;
       }
   
       function flush_widget_cache() {
           wp_cache_delete('widget_recent_posts', 'widget');
       }
   
       function form( $instance ) {
           $title = isset($instance['title']) ? $instance['title'] : 'Recent News';
           $number = isset($instance['number']) ? $instance['number'] : 5;
           if($number < 1)
           {
               $number = 5;
           }
 
           $showthumbs = $instance['showthumbs'] ? true : false;    
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo 'Number of posts to show:'; ?></label>
           <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
  
          <p><label for="<?php echo $this->get_field_id('showthumbs'); ?>"><?php echo 'Show thumbs?'; ?></label>
           <input id="<?php echo $this->get_field_id('showthumbs'); ?>" name="<?php echo $this->get_field_name('showthumbs'); ?>" type="checkbox" <?php echo ($showthumbs ? ' checked="checked" ' : ''); ?> /></p>
              
   
   <?php
       }
   }

  // Register widget
  function dcwp_recentnewsInit() { register_widget('dcwp_recentnews'); }
  add_action('widgets_init', 'dcwp_recentnewsInit');

?>
