<?php
/*
 * Plugin Name: Contact Form (Prestige) 
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Contact Form (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */
 
class dcwp_contactform extends WP_Widget 
{
   
   function dcwp_contactform() {
       $widget_ops = array('classname' => 'dcwp_contactform', 'description' => 'Small contact form (Prestige)');
      // $control_ops = array('width' => 400, 'height' => 350);
       $this->WP_Widget('dcwp_contactform', 'dcwp_ContactForm', $widget_ops);
   }

   function widget( $args, $instance ) {
       extract($args);
       $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
       $email = empty($instance['email']) ? '' : $instance['email']; 
       $text = empty($instance['text']) ? '' : $instance['text'];
       
       if($email == '')
       {
           $email = GetDCCPInterface()->getIGeneral()->getContactMail();
       }
       
       echo $before_widget;
       if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } 
       
            $out = '<div class="widget-contact">';
            $out .= $text;
            $out .= '<form>'; 
                $out .= '<p>Your Name: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="name" class="text-ctrl-short" />';
                
                $out .= '<p>Your Email: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="email" class="text-ctrl-short" />'; 
                 
                $out .= '<p>Subject: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="subject" class="text-ctrl-short" />';  
                
                    $out .= '<p>Your Message: <span class="required">(required)</span></p>'; 
                    $out .= '<textarea cols="70" rows="8" name="message" class="textarea-ctrl"></textarea>';                   
                    $out .= '<input type="hidden" value="'.$email.'" name="contact-mail-dest" />';
                    $out .= '<input type="hidden" value="'.GetDCCPInterface()->getIGeneral()->getSidebarContactSendOkay().'" name="contact-okay" />';
                    $out .= '<input type="hidden" value="'.GetDCCPInterface()->getIGeneral()->getSidebarContactSendError().'" name="contact-error" /><div style="height:5px;"></div>';                     
                    $out .= '<a class="send-email-btn">'.GetDCCPInterface()->getIGeneral()->getContactSendButtonName().'</a>';
                    $out .= '<span class="result">Information about email sending process</span>';                 
                               
            $out .= '</form></div>';     
        echo $out;
       echo $after_widget;
   }

   function update( $new_instance, $old_instance ) {
       $instance = $old_instance;
       $instance['title'] = strip_tags($new_instance['title']);
       $instance['email'] = $new_instance['email'];
       $instance['text'] = $new_instance['text']; 
       return $instance;
   }

   function form( $instance ) {
       $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
       $title = strip_tags($instance['title']);
       $email = $instance['email'];
       $text = $instance['text']; 
?>
       <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

       <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php echo 'Your email address:'; ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>       

       <p><label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Optional description:'; ?></label>
       <textarea style="height:100px;font-size:11px;color:#444444;" class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" ><?php echo $text; ?></textarea></p>  
       
<?php
   }
}

  // Register widget
  function dcwp_contactformInit() { register_widget('dcwp_contactform'); }
  add_action('widgets_init', 'dcwp_contactformInit');
  
?>