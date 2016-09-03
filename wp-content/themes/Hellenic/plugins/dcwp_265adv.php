<?php
/*
 * Plugin Name: Advertisement 265 (Prestige) 
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Advertisement 265 (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */
 
class dcwp_advertisement265 extends WP_Widget
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    function dcwp_advertisement265()
    {
        $widget_ops = array('classname' => 'dcwp_advertisement265', 'description' => "Advertisement 265 (Prestige)");
        $control_ops = array('width' => 240, 'height' => 360);
        $this->WP_Widget('dcwp_advertisement265', 'dcwp_Advertisement265', $widget_ops, $control_ops);
    }

    /*********************************************************** 
    * Public functions
    ************************************************************/
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
        
        $url_1 = empty($instance['url_1']) ? '' : $instance['url_1'];
        $link_1 = empty($instance['link_1']) ? '' : $instance['link_1'];
    
        
        // before the widget
        echo $before_widget;
        // title
        if($title) { echo $before_title . $title . $after_title; }

        $out = '<div class="widget-adv-big">';                
        

        if($url_1 != '')
        {                       
            if($link_1 != '') { $out .= '<a target="_blank" href="'.$link_1.'" >'; }
            $out .= '<img src="'.$url_1.'" />';
            if($link_1 != '') { $out .= '</a>'; }
        }                                         
     
        $out .= '</div>';
        echo $out;

        // after the widget
        // echo $after_widget;
        echo GetDCCPInterface()->getIGeneral()->getAfterWidget(false);
    } // widget

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        
        $instance['url_1'] = strip_tags(stripslashes($new_instance['url_1']));
        $instance['link_1'] = strip_tags(stripslashes($new_instance['link_1']));      
        
        return $instance;
    } // update

    function form($instance)
    {
      //Defaults
      $instance = wp_parse_args( (array) $instance, 
        array('title'=>'', 'big_title'=>false, 'url_1'=>'', 'link_1'=>'') );

      $title = htmlspecialchars($instance['title']);

      
      $url_1 = htmlspecialchars($instance['url_1']);
      $link_1 = htmlspecialchars($instance['link_1']); 
      
      # Output the options
      echo '<p style="text-align:left;font-size:10px;"><label for="' . $this->get_field_name('title') . '">' . 'Title:' . ' <input style="width: 220px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
      
      # Advert 1 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;">#1 Image URL (265x px):<br/><input style="width: 220px;" id="' . $this->get_field_id('url_1') . '" name="' . $this->get_field_name('url_1') . '" type="text" value="' . $url_1 . '" /></p>';
      # Advert 1 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_1') . '">' . 'Link:' . ' <input style="width: 220px;" id="' . $this->get_field_id('link_1') . '" name="' . $this->get_field_name('link_1') . '" type="text" value="' . $link_1 . '" /></label></p>';         
    
    } // form
}

  // Register widget
  function dcwp_advertisement265Init() { register_widget('dcwp_advertisement265'); }
  add_action('widgets_init', 'dcwp_advertisement265Init');
  
?>