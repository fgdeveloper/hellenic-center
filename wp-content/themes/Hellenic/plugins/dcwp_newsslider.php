<?php  
/*
 * Plugin Name: News Slider (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: News Slider (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

  class dcwp_newsslider extends WP_Widget {
   
       function dcwp_newsslider() {
           $widget_ops = array('classname' => 'dcwp_newsslider', 'description' => "Your news slider (Prestige)" );
           $this->WP_Widget('dcwp_newsslider', 'dcwp_NewsSlider', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract($args);
           $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
           $category = empty($instance['category']) ? CMS_NOT_SELECTED : $instance['category'];  
           $posts_list = empty($instance['posts_list']) ? '' : $instance['posts_list']; 
           $number = empty($instance['number']) ? 5 : $instance['number']; 
           
           $posts_array = explode(',', $posts_list );
           $count = count($posts_array);
           
           global $post;
           $oldpost = $post;                                                                                                       

           $query_args = array('nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'post_type' => 'news');
           
           if($category == CMS_NOT_SELECTED)
           {
               $query_args['post__in'] = $posts_array;
               $query_args['posts_per_page'] = $count;
           } else
           {
               $query_args['taxonomy'] = 'news_cat';
               $query_args['term'] = $category; 
               $query_args['posts_per_page'] = $number;      
           }
           
          echo $before_widget;
          if($title)
          {
              echo $before_title . $title . $after_title;
          }
          $out = '';
          $out .= '<div class="widget-postslider">';           
           
           $r = new WP_Query($query_args);
           if ($r->have_posts()) 
           {
               $counter = 0; 
               while ($r->have_posts())
               { 
                    $r->the_post();
                    $counter++;
                    
                    $thumb = get_post_meta($post->ID, 'news_thumb_image', true);                     
                    $out .= '<div class="slide"><img src="'.$thumb.'" /><a href="'.get_permalink($post->ID).'" class="desc">'.$post->post_title.'</a></div>';
               }
               
               $out .= '<div class="btn-bar">';
               for($i = 0; $i < $counter; $i++)
               {
                   $out .= '<a '.($i == 0 ? ' class="btn-active" ' : ' class="btn" ').' >'.($i+1).'</a>'; 
               }                          
               $out .= '</div>';
           }    
           // Reset the global $the_post as this query will have stomped on it
           $post = $oldpost;                 
           wp_reset_query();
          
          $out .= '</div>';
          echo $out;
          echo $after_widget;
      }
  
      function update( $new_instance, $old_instance ) {
          $instance['title'] = strip_tags(stripslashes($new_instance['title']));
          $instance['posts_list'] = $new_instance['posts_list'];
          $instance['number'] = (int) $new_instance['number']; 
          $instance['category'] = $new_instance['category'];  
          
          return $instance;
      }
  
      function form( $instance ) 
      {
          $posts_list = empty($instance['posts_list']) ? '' : $instance['posts_list'];
          $category = empty($instance['category']) ? CMS_NOT_SELECTED : (int)$instance['category']; 
          
           if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
           {
               $number = 5;
           }
            
  ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
               
       <p><label for="<?php echo $this->get_field_id('posts_list'); ?>"><?php echo 'Posts ID e.g 1,82,6 (max 9):'; ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('posts_list'); ?>" name="<?php echo $this->get_field_name('posts_list'); ?>" type="text" value="<?php echo $posts_list; ?>" /></p>      
     
           <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo 'Number of news when category is selected:'; ?></label>
           <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>        
     
           <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php echo 'Category ID of posts to show:'; ?></label>
           <?php
    
                $cat_args = array('orderby' => 'count'); 
                $news_terms = get_terms('news_cat', $cat_args);

                $count = count($news_terms);
                if($count > 0)
                {
                    $out = '';
                    $out .= '<select style="width:100%;" id="'.$this->get_field_id('category').'" name="'.$this->get_field_name('category').'">';
                    $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($category == CMS_NOT_SELECTED ? ' selected="selected" ' : '').' >Not selected</option>';
                    foreach($news_terms as $term)
                    {
                        $out .= '<option value="'.$term->slug.'" ';
                        $out .= ($category == $term->slug ? ' selected="selected" ' : '');
                        $out .= '>'.$term->name.'</option>';            
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
  function dcwp_newssliderInit() { register_widget('dcwp_newsslider'); }
  add_action('widgets_init', 'dcwp_newssliderInit');

?>
