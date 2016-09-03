<?php
/*
 * Plugin Name: Text (Prestige) 
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Text (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */
 
class dcwp_text extends WP_Widget 
{
   
   function dcwp_text() {
       $widget_ops = array('classname' => 'dcwp_text', 'description' => 'Arbitrary text or HTML (Prestige)');
       $control_ops = array('width' => 400, 'height' => 350);
       $this->WP_Widget('dcwp_text', 'dcwp_Text', $widget_ops, $control_ops);
   }

   function widget( $args, $instance ) {
       extract($args);
       $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
       $text = apply_filters( 'widget_text', $instance['text'], $instance );
       echo $before_widget;
       if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
           <div class="textwidget"><?php echo $instance['filter'] ? wpautop(do_shortcode($text)) : do_shortcode($text); ?></div>
       <?php
       echo $after_widget;
   }

   function update( $new_instance, $old_instance ) {
       $instance = $old_instance;
       $instance['title'] = strip_tags($new_instance['title']);
       if ( current_user_can('unfiltered_html') )
           $instance['text'] =  $new_instance['text'];
       else
           $instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
       $instance['filter'] = isset($new_instance['filter']);
       return $instance;
   }

   function form( $instance ) {
       $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
       $title = strip_tags($instance['title']);
       $text = format_to_edit($instance['text']);
?>
       <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

       <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

       <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php echo 'Automatically add paragraphs'; ?></label></p>
<?php
   }
}

  // Register widget
  function dcwp_textInit() { register_widget('dcwp_text'); }
  add_action('widgets_init', 'dcwp_textInit');
  
?>