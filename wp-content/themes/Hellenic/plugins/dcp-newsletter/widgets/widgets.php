<?php
/**********************************************************************
* DIGITAL CAVALRY WP NEWSLETTER SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      widgets.php
* Brief:       
*      Plugin widgets file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    

class dcwp_newsletter extends WP_Widget
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    function dcwp_newsletter()
    {
        $widget_ops = array('classname' => 'dcwp_newsletter', 'description' => "Newsletter (Prestige)");
        $this->WP_Widget('dcwp_newsletter', 'dcwp_Newsletter', $widget_ops);
    }

    /*********************************************************** 
    * Public functions
    ************************************************************/
    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['title']) ? 'Newsletter' : $instance['title']);
        
        $news_letter_meta = empty($instance['news_letter_meta']) ? '' : $instance['news_letter_meta']; 
        $news_letter_desc = empty($instance['news_letter_desc']) ? '' : $instance['news_letter_desc'];
        $news_hide_unreg =  empty($instance['news_hide_unreg']) ? false : true;  
        
        // before the widget
        //echo $before_widget;
        //var_dump($before_widget);
        echo GetDCCPInterface()->getIGeneral()->getBeforeWidget();
        
        // title
        if($title) { echo $before_title . $title . $after_title; }
        
        global $dcp_newsletter;
        $lab = &$dcp_newsletter->_options;
        
        $out = '';
        $out .= '<div class="dcwp-newsletter">';
        
        if($news_letter_desc != '')
        {
            $out .= '<div class="desc">'.$news_letter_desc.'</div>';
        }
        
        $out .= '<p class="label">'.$lab['input_label'].'</p>';
        $out .= '<div class="input-wrapper"><input type="text" name="email" /><input type="hidden" name="meta" value="'.$news_letter_meta.'" /></div>';
        
        $out .= '<div class="btn-bar">';
            if(!$news_hide_unreg)
            {
                $out .= '<div class="wrap-register"><a>'.$lab['btn_register'].'</a></div>';
                $out .= '<div class="wrap-unregister"><a>'.$lab['btn_unregister'].'</a></div>';
            } else
            {
                $out .= '<div class="wrap-register-wide"><a>'.$lab['btn_register'].'</a></div>';
            }
            $out .= '<div style="clear:both;height:1px;"></div>';
        $out .= '</div>';
        
        $out .= '<div class="result"><div class="ajax"></div><span class="info"></span></div>';
        $out .= '<div style="height:10px;"></div>';
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
        
        $instance['news_letter_meta'] = $new_instance['news_letter_meta'];    
        $instance['news_letter_desc'] = $new_instance['news_letter_desc']; 
        $instance['news_hide_unreg'] = empty($new_instance['news_hide_unreg']) ? 0 : 1;
        return $instance;
    } // update

    function form($instance)
    {
      //Defaults
      $instance = wp_parse_args( (array) $instance, 
        array('title'=>'', 'news_letter_meta'=>'', 'news_letter_desc'=>'We will send you information about fresh news, events and other great features. You must only send us your email address. In future at any moment you can unregister from our newsletter program.'));

      $title = htmlspecialchars($instance['title']);
      $news_hide_unreg = isset($instance['news_hide_unreg']) ? (bool) $instance['news_hide_unreg'] :false; 
      
      $news_letter_meta = $instance['news_letter_meta'];
      $news_letter_desc = $instance['news_letter_desc']; 
      
      # Output the options
      echo '<p style="text-align:left;font-size:10px;"><label for="' . $this->get_field_name('title') . '">' . 'Title:' . ' <input style="width: 220px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';     
      # meta
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;">Meta string for newsletter:<br/><input style="width: 220px;" id="' . 
      $this->get_field_id('news_letter_meta') . '" name="' . $this->get_field_name('news_letter_meta') . '" type="text" value="' . $news_letter_meta . '" /></p><br />'; 
      
      # desc
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;">Description:<br/><textarea style="width: 220px;font-size:11px;height:100px;" id="' . 
      $this->get_field_id('news_letter_desc') . '" name="' . $this->get_field_name('news_letter_desc') . '" >'.$news_letter_desc . '</textarea></p>';  
      
      # hide unregister button
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><br /><input type="checkbox" '.($news_hide_unreg ? ' checked="checked" ' : '').' id="' . 
      $this->get_field_id('news_hide_unreg') . '" name="' . $this->get_field_name('news_hide_unreg'). '" /> Hide unregister button</p>';                       
    } // form
}        

function dcwp_newsletterInit() { register_widget('dcwp_newsletter'); }
  add_action('widgets_init', 'dcwp_newsletterInit');

  
//function dcDisplayNewsletterWidget($title = false) {
//   
//     
//    $options = array(   'title'    => false, 
//                        'news_letter_meta'    => 'some meta',
//                        'news_letter_desc'     => 'this is somthing new' ,
//                        'news_hide_unreg'     => false);
//                        
//   $dc_widget = new dcwp_newsletter();
//    $dc_widget->widget($args = array( 'widget_id'=> 'sidebar_1' ), $options);
//}  
  
?>
