<?php  
/*
 * Plugin Name: Featured Posts (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Featured Posts (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_featuredposts extends WP_Widget {
   
       function dcwp_featuredposts() {
           $widget_ops = array('classname' => 'dcwp_featuredposts', 'description' => "The featured posts from your site (Prestige)");
           $this->WP_Widget('dcwp_featuredposts', 'dcwp_FeaturedPosts', $widget_ops);
           $this->alt_option_name = 'widget_featured_posts';
   
           add_action( 'save_post', array(&$this, 'flush_widget_cache') );
           add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
           add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
       }
   
       function widget($args, $instance) {
           
           $cache = wp_cache_get('widget_featured_posts', 'widget');
   
           if ( !is_array($cache) )
               $cache = array();
   
           if ( isset($cache[$args['widget_id']]) ) {
               echo $cache[$args['widget_id']];
               return;
           }
           
           ob_start();
           extract($args);
            
           $title = apply_filters('widget_title', empty($instance['title']) ? 'Featured Posts' : $instance['title'], $instance, $this->id_base);
           $posts_list = empty($instance['posts_list']) ? '' : $instance['posts_list']; 
           $posts_array = explode(',', $posts_list );
           $count = count($posts_array);
           
           global $post;
           $oldpost = $post;                                                                                                       

           $query_args = array('post__in' => $posts_array, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'posts_per_page'=> 10);
           
           $r = new WP_Query($query_args);
           if ($r->have_posts()) 
           {
   
               echo $before_widget;
               if ( $title ) echo $before_title . $title . $after_title;                           
               
               $counter = 0;
               if($count > 0)
               {
                   echo '<ul class="widget-featured-posts">';
                   while ($r->have_posts())
                   { 
                        $r->the_post();

                        $thumb = get_post_meta($post->ID, 'post_thumb_image', true);
                        $postdesc = get_post_meta($post->ID, 'post_desc', true); 
                        $thumb_path = $thumb;             

                        $out  = '<li><div class="item">';
                        if($counter > 0)
                        {
                            $out .= '<div style="height:15px;"></div>';    
                        }
                        $counter++;
                        
                        if($thumb != '')
                        {
                            $out .= '<a href="'.get_permalink($post->ID).'" ><img class="image" src="'.$thumb_path.'" /></a>';
                        }
                        
                        $out .= '<h4><a href="'.get_permalink($post->ID).'" >'.get_the_title().'</a></h4>';
                        
                        $desc = '';
                        if($postdesc == '')
                        {
                            $desc = do_shortcode($post->post_content);
                            $desc = dcf_neatTrim($desc, 180, '..');
                        } else
                        {
                           $desc = $postdesc; 
                        }
                        
                        $out .= '<div class="description">'.$desc.'&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">Read more</a></div>';

                        $out .= '</div></li>';
                        echo $out;
                   
                    } // while
                    echo '</ul>'; 
               }
                
                            
                echo $after_widget; 
       
               // Reset the global $the_post as this query will have stomped on it
              $post = $oldpost;
   
           }
           wp_reset_query();
   
           $cache[$args['widget_id']] = ob_get_flush();
           wp_cache_set('widget_featured_posts', $cache, 'widget');
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['posts_list'] = $new_instance['posts_list'];
           $this->flush_widget_cache();
   
           $alloptions = wp_cache_get( 'alloptions', 'options' );
           if ( isset($alloptions['widget_featured_posts']) )
               delete_option('widget_featured_posts');
   
           return $instance;
       }
   
       function flush_widget_cache() {
           wp_cache_delete('widget_featured_posts', 'widget');
       }
   
       function form( $instance ) {
           $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
           $posts_list = empty($instance['posts_list']) ? '' : $instance['posts_list'];
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p><label for="<?php echo $this->get_field_id('posts_list'); ?>"><?php echo 'Posts ID e.g 1,82,6 (max 10):'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('posts_list'); ?>" name="<?php echo $this->get_field_name('posts_list'); ?>" type="text" value="<?php echo $posts_list; ?>" /></p>
   <?php
       }
   }

  // Register widget
  function dcwp_featuredpostsInit() { register_widget('dcwp_featuredposts'); }
  add_action('widgets_init', 'dcwp_featuredpostsInit');

?>
