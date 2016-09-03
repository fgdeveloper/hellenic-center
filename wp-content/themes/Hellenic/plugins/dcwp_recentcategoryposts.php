<?php  
/*
 * Plugin Name: Recent Category Posts (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Recent Category Posts (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_recentcategoryposts extends WP_Widget {
   
       function dcwp_recentcategoryposts() {
           $widget_ops = array('classname' => 'dcwp_recentcategoryposts', 'description' => "The most recent posts on your site from given category (Prestige)" );
           $this->WP_Widget('dcwp_recentcategoryposts', 'dcwp_RecentCategoryPosts', $widget_ops);
           $this->alt_option_name = 'widget_recent_entries';
   
           add_action( 'save_post', array(&$this, 'flush_widget_cache') );
           add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
           add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
       }
   
       function widget($args, $instance) {
           $cache = wp_cache_get('widget_recent_category_posts', 'widget');
   
           if ( !is_array($cache) )
               $cache = array();
   
           if ( isset($cache[$args['widget_id']]) ) {
               echo $cache[$args['widget_id']];
               return;
           }
   
           ob_start();
           extract($args);
   
           $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Category Posts' : $instance['title'], $instance, $this->id_base);
           if ( !$number = (int) $instance['number'] )
               $number = 10;
           else if ( $number < 1 )
               $number = 1;
           else if ( $number > 15 )
               $number = 15;
           
           $showthumbs = $instance['showthumbs'] ? true : false;     
           $category = empty($instance['category']) ? CMS_NOT_SELECTED : $instance['category'];
   
           global $post;
           $oldpost = $post;
            
           $query_args = array('posts_per_page' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'cat' => $category);
           
           if($category != CMS_NOT_SELECTED)
           {
               $r = new WP_Query($query_args);
               if($r->have_posts())
               {
       
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
       
               }
           }
           wp_reset_query();
   
           $cache[$args['widget_id']] = ob_get_flush();
           wp_cache_set('widget_recent_category_posts', $cache, 'widget');
       }
   
       function update( $new_instance, $old_instance ) {
           $instance = $old_instance;
           $instance['title'] = strip_tags($new_instance['title']);
           $instance['number'] = (int) $new_instance['number'];
           $instance['category'] = (int) $new_instance['category'];
           $instance['showthumbs'] = isset($new_instance['showthumbs']);
           $this->flush_widget_cache();
   
           $alloptions = wp_cache_get( 'alloptions', 'options' );
           if ( isset($alloptions['widget_recent_entries']) )
               delete_option('widget_recent_entries');
   
           return $instance;
       }
   
       function flush_widget_cache() {
           wp_cache_delete('widget_recent_category_posts', 'widget');
       }
   
       function form( $instance ) {
           $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
           if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
           {
               $number = 5;
           }
           $showthumbs = $instance['showthumbs'] ? true : false;  
           $category = (int) $instance['category'];
   ?>
           <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
           <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
   
           <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo 'Number of posts to show:'; ?></label>
           <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

           <p><label for="<?php echo $this->get_field_id('showthumbs'); ?>"><?php echo 'Show thumbs?'; ?></label>
           <input id="<?php echo $this->get_field_id('showthumbs'); ?>" name="<?php echo $this->get_field_name('showthumbs'); ?>" type="checkbox" <?php echo ($showthumbs ? ' checked="checked" ' : ''); ?> /></p>
           
           <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php echo 'Category ID of posts to show:'; ?></label>
           <?php
    
                $cats = get_categories();
                $count = count($cats);
                if($count > 0)
                {
                    $out = '';
                    $out .= '<select style="width:100%;" id="'.$this->get_field_id('category').'" name="'.$this->get_field_name('category').'">';
                    $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($category == CMS_NOT_SELECTED ? ' selected="selected" ' : '').' >Not selected</option>';
                    for($i = 0; $i < $count; $i++)
                    {
                        $out .= '<option value="'.$cats[$i]->term_id.'" ';
                        $out .= ($category == $cats[$i]->term_id ? ' selected="selected" ' : '');
                        $out .= '>'.$cats[$i]->name.'</option>';            
                    }
                    $out .= '</select>';
                    echo $out;                                        
                }        
                ?>
           </p>           
   <?php
       }
   }

  // Register widget
  function dcwp_recentcategorypostsInit() { register_widget('dcwp_recentcategoryposts'); }
  add_action('widgets_init', 'dcwp_recentcategorypostsInit');

?>
