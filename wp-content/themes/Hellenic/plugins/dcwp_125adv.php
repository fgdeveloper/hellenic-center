<?php
/*
 * Plugin Name: Advertisement 125 (Prestige) 
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Advertisement 125 (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */
 
class dcwp_advertisement125 extends WP_Widget
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    function dcwp_advertisement125()
    {
        $widget_ops = array('classname' => 'dcwp_advertisement125', 'description' => "Advertisement 125 (Prestige)" );
        $control_ops = array('width' => 240, 'height' => 360);
        $this->WP_Widget('dcwp_advertisement125', 'dcwp_Advertisement125', $widget_ops, $control_ops);
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
        $url_2 = empty($instance['url_2']) ? '' : $instance['url_2'];
        $link_2 = empty($instance['link_2']) ? '' : $instance['link_2'];
        $url_3 = empty($instance['url_3']) ? '' : $instance['url_3'];
        $link_3 = empty($instance['link_3']) ? '' : $instance['link_3'];
        $url_4 = empty($instance['url_4']) ? '' : $instance['url_4'];
        $link_4 = empty($instance['link_4']) ? '' : $instance['link_4'];
       
        $url_5 = empty($instance['url_5']) ? '' : $instance['url_5'];
        $link_5 = empty($instance['link_5']) ? '' : $instance['link_5'];
        $url_6 = empty($instance['url_6']) ? '' : $instance['url_6'];
        $link_6 = empty($instance['link_6']) ? '' : $instance['link_6'];        

        $url_7 = empty($instance['url_7']) ? '' : $instance['url_7'];
        $link_7 = empty($instance['link_7']) ? '' : $instance['link_7'];
        $url_8 = empty($instance['url_8']) ? '' : $instance['url_8'];
        $link_8 = empty($instance['link_8']) ? '' : $instance['link_8'];  
        
        // before the widget
        echo $before_widget;
        // title
        if($title) { echo $before_title . $title . $after_title; }

        $out = '<div class="widget-adv-125">';                
        
        $rendered = 0;
        if($url_1 != '')
        {                       
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_1 != '') { $out .= '<a target="_blank" href="'.$link_1.'" >'; }
            $out .= '<img src="'.$url_1.'" />';
            if($link_1 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }                                         
        if($url_2 != '')
        {
            
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_2 != '') { $out .= '<a target="_blank" href="'.$link_2.'" >'; }
            $out .= '<img src="'.$url_2.'" />';
            if($link_2 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        } 
        if($url_3 != '')
        {
            
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }             
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_3 != '') { $out .= '<a target="_blank" href="'.$link_3.'" >'; }
            $out .= '<img src="'.$url_3.'" />';
            if($link_3 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }         
        if($url_4 != '')
        {
           
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }              
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_4 != '') { $out .= '<a target="_blank" href="'.$link_4.'" >'; }
            $out .= '<img src="'.$url_4.'" />';
            if($link_4 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        } 
        if($url_5 != '')
        {
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }              
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_5 != '') { $out .= '<a target="_blank" href="'.$link_5.'" >'; }
            $out .= '<img src="'.$url_5.'" />';
            if($link_5 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }         
        if($url_6 != '')
        {
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }              
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_6 != '') { $out .= '<a target="_blank" href="'.$link_6.'" >'; }
            $out .= '<img src="'.$url_6.'" />';
            if($link_6 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }       
        if($url_7 != '')
        {
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }              
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_7 != '') { $out .= '<a target="_blank" href="'.$link_7.'" >'; }
            $out .= '<img src="'.$url_7.'" />';
            if($link_7 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }         
        if($url_8 != '')
        {
            if(($rendered % 2) == 0)
            {
                $out .= '<div class="separator"></div>';
            }              
            $out .= '<div class="item" style="'.(($rendered % 2) == 0 ? 'float:left;' : 'float:right;').'">';
            if($link_8 != '') { $out .= '<a target="_blank" href="'.$link_8.'" >'; }
            $out .= '<img src="'.$url_8.'" />';
            if($link_8 != '') { $out .= '</a>'; }
            $out .= '</div>';
            
            $rendered++;
        }  
        
        
        $out .= '<div style="clear:both;"></div></div>';
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
        $instance['url_2'] = strip_tags(stripslashes($new_instance['url_2']));
        $instance['link_2'] = strip_tags(stripslashes($new_instance['link_2'])); 
        $instance['url_3'] = strip_tags(stripslashes($new_instance['url_3']));
        $instance['link_3'] = strip_tags(stripslashes($new_instance['link_3'])); 
        $instance['url_4'] = strip_tags(stripslashes($new_instance['url_4']));
        $instance['link_4'] = strip_tags(stripslashes($new_instance['link_4']));                 

        $instance['url_5'] = strip_tags(stripslashes($new_instance['url_5']));
        $instance['link_5'] = strip_tags(stripslashes($new_instance['link_5'])); 
        $instance['url_6'] = strip_tags(stripslashes($new_instance['url_6']));
        $instance['link_6'] = strip_tags(stripslashes($new_instance['link_6']));  

        $instance['url_7'] = strip_tags(stripslashes($new_instance['url_7']));
        $instance['link_7'] = strip_tags(stripslashes($new_instance['link_7'])); 
        $instance['url_8'] = strip_tags(stripslashes($new_instance['url_8']));
        $instance['link_8'] = strip_tags(stripslashes($new_instance['link_8'])); 
        
        return $instance;
    } // update

    function form($instance)
    {
      //Defaults
      $instance = wp_parse_args( (array) $instance, 
        array('title'=>'', 'big_title'=>false, 'url_1'=>'', 'link_1'=>'', 'url_2'=>'', 'link_2'=>'',
         'url_3'=>'', 'link_3'=>'', 'url_4'=>'', 'link_4'=>'', 'url_5'=>'', 'link_5'=>'', 'url_6'=>'', 'link_6'=>'', 'url_7'=>'', 'link_7'=>'', 'url_8'=>'', 'link_8'=>'') );

      $title = htmlspecialchars($instance['title']);

      
      $url_1 = htmlspecialchars($instance['url_1']);
      $link_1 = htmlspecialchars($instance['link_1']); 

      $url_2 = htmlspecialchars($instance['url_2']);
      $link_2 = htmlspecialchars($instance['link_2']); 
      
      $url_3 = htmlspecialchars($instance['url_3']);
      $link_3 = htmlspecialchars($instance['link_3']); 
      
      $url_4 = htmlspecialchars($instance['url_4']);
      $link_4 = htmlspecialchars($instance['link_4']);             

      $url_5 = htmlspecialchars($instance['url_5']);
      $link_5 = htmlspecialchars($instance['link_5']); 
      
      $url_6 = htmlspecialchars($instance['url_6']);
      $link_6 = htmlspecialchars($instance['link_6']);    

      $url_7 = htmlspecialchars($instance['url_7']);
      $link_7 = htmlspecialchars($instance['link_7']); 
      
      $url_8 = htmlspecialchars($instance['url_8']);
      $link_8 = htmlspecialchars($instance['link_8']);  
      
      # Output the options
      echo '<p style="text-align:left;font-size:10px;"><label for="' . $this->get_field_name('title') . '">' .'Title:'. ' <input style="width: 220px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></label></p>';
      
      # Advert 1 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;">#1 Image URL (125x125px):<br/><input style="width: 220px;" id="' . $this->get_field_id('url_1') . '" name="' . $this->get_field_name('url_1') . '" type="text" value="' . $url_1 . '" /></p>';
      # Advert 1 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_1') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_1') . '" name="' . $this->get_field_name('link_1') . '" type="text" value="' . $link_1 . '" /></label></p>';      

      # Advert 2 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_2') . '">' .'#2 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_2') . '" name="' . $this->get_field_name('url_2') . '" type="text" value="' . $url_2 . '" /></label></p>';
      # Advert 2 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_2') . '">' .'Link 2:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_2') . '" name="' . $this->get_field_name('link_2') . '" type="text" value="' . $link_2 . '" /></label></p>';            
      
      # Advert 3 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_3') . '">' .'#3 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_3') . '" name="' . $this->get_field_name('url_3') . '" type="text" value="' . $url_3 . '" /></label></p>';
      # Advert 3 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_3') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_3') . '" name="' . $this->get_field_name('link_3') . '" type="text" value="' . $link_3 . '" /></label></p>';      

      # Advert 4 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_4') . '">' .'#4 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_4') . '" name="' . $this->get_field_name('url_4') . '" type="text" value="' . $url_4 . '" /></label></p>';
      # Advert 4 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_4') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_4') . '" name="' . $this->get_field_name('link_4') . '" type="text" value="' . $link_4 . '" /></label></p>';        

      # Advert 5 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_5') . '">' .'#5 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_5') . '" name="' . $this->get_field_name('url_5') . '" type="text" value="' . $url_5 . '" /></label></p>';
      # Advert 5 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_5') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_5') . '" name="' . $this->get_field_name('link_5') . '" type="text" value="' . $link_5 . '" /></label></p>';      

      # Advert 6 image url                                                                                                             
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_6') . '">' .'#6 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_6') . '" name="' . $this->get_field_name('url_6') . '" type="text" value="' . $url_6 . '" /></label></p>';
      # Advert 6 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_6') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_6') . '" name="' . $this->get_field_name('link_6') . '" type="text" value="' . $link_6 . '" /></label></p>';            

      # Advert 7 image url
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_7') . '">' .'#7 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_7') . '" name="' . $this->get_field_name('url_7') . '" type="text" value="' . $url_7 . '" /></label></p>';
      # Advert 7 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_7') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_7') . '" name="' . $this->get_field_name('link_7') . '" type="text" value="' . $link_7 . '" /></label></p>';      

      # Advert 8 image url                                                                                                             
      echo '<p style="text-align:left;font-size:10px;margin-bottom:0px;"><label for="' . $this->get_field_name('url_8') . '">' . '#8 Image URL (125x125px):'. ' <input style="width: 220px;" id="' . $this->get_field_id('url_8') . '" name="' . $this->get_field_name('url_8') . '" type="text" value="' . $url_8 . '" /></label></p>';
      # Advert 8 link
      echo '<p style="text-align:left;font-size:10px;margin-bottom:30px;"><label for="' . $this->get_field_name('link_8') . '">' .'Link:'. ' <input style="width: 220px;" id="' . $this->get_field_id('link_8') . '" name="' . $this->get_field_name('link_8') . '" type="text" value="' . $link_8 . '" /></label></p>'; 
    
    } // form
}

  // Register widget
  function dcwp_advertisement125Init() { register_widget('dcwp_advertisement125'); }
  add_action('widgets_init', 'dcwp_advertisement125Init');
  
?>