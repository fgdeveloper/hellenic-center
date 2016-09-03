<?php  
/*
 * Plugin Name: Gallery (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Gallery (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

  class dcwp_gallery extends WP_Widget {
   
       function dcwp_gallery() {
           $widget_ops = array('classname' => 'dcwp_gallery', 'description' => "Your images gallery (Prestige)");
           $this->WP_Widget('dcwp_gallery', 'dcwp_Gallery', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract($args);
           $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
           $gallery = isset($instance['gallery']) ? $instance['gallery'] : CMS_NOT_SELECTED;
           $color = !empty($instance['color']) ? $instance['color'] : '#FFCC00';
           $url = !empty($instance['url']) ? $instance['url'] : '';
           $trans = !empty($instance['trans']) ? $instance['trans'] : 'fade';
           $number = !empty($instance['number']) ? $instance['number'] : 1;
           $height = !empty($instance['height']) ? $instance['height'] : 180; 
           $pageid = !empty($instance['pageid']) ? $instance['pageid'] : CMS_NOT_SELECTED; 
           
           $desc = empty($instance['show_desc']) ? false : true;           
           $desc = $desc ? 'true' : 'false';

           $autoplay = empty($instance['autoplay']) ? false : true;           
           $autoplay = $autoplay ? 'true' : 'false';

           $random = empty($instance['random']) ? false : true;           
           $random = $random ? 'true' : 'false';
          
          echo $before_widget;
          if($title != '')
          {
             echo $before_title . $title . $after_title;
          }

          if($gallery != CMS_NOT_SELECTED)
          {                                                                                         
             $gall_content = '[dcs_chain_gallery trans="'.$trans.'" pageid="'.$pageid.'" url="'.$url.'" gid="'.$gallery.'" random="'.$random.'" desc="'.$desc.'" autoplay="'.$autoplay.'" bcolor="'.$color.'" number="'.$number.'" tw="31" th="30" h="'.$height.'" w="260"]';
             $code = do_shortcode($gall_content);
             echo $code;
          }
          
          echo GetDCCPInterface()->getIGeneral()->getAfterWidget(false);
      }
  
      function update( $new_instance, $old_instance ) {
          $instance['title'] = strip_tags(stripslashes($new_instance['title']));
          $instance['gallery'] = $new_instance['gallery'];
          $instance['show_desc'] = empty($new_instance['show_desc']) ? 0 : 1;
          $instance['autoplay'] = empty($new_instance['autoplay']) ? 0 : 1;
          $instance['random'] = empty($new_instance['random']) ? 0 : 1;
          $instance['color'] = $new_instance['color'];
          $instance['trans'] = $new_instance['trans']; 
          $instance['number'] = $new_instance['number'];
          $instance['height'] = $new_instance['height'];
          $instance['url'] = $new_instance['url'];
          $instance['pageid'] = $new_instance['pageid'];              
          return $instance;
      }
  
      function form( $instance ) {
      $instance = wp_parse_args( (array) $instance, 
        array('color'=>'#FFCC00','number'=>10,'height'=>180,'trans'=>'fade' ));
        
          
          $gallery = $instance['gallery'];
          $color = $instance['color'];
          $number = $instance['number'];
          $trans = $instance['trans'];
          $height = $instance['height'];  
          $url = $instance['url'];
          $pageid = $instance['pageid'];
          $show_desc = isset($instance['show_desc']) ? (bool) $instance['show_desc'] :false;
          $autoplay = isset($instance['autoplay']) ? (bool) $instance['autoplay'] :false;
          $random = isset($instance['random']) ? (bool) $instance['random'] :false;  
  ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>
      <?php
      # show image description
      echo '<p style="text-align:left;font-size:10px;"><input type="checkbox" '.($show_desc ? ' checked="checked" ' : '').' id="' . 
      $this->get_field_id('show_desc') . '" name="' . $this->get_field_name('show_desc'). '" /> Show image description</p>';        
      # autoplay
      echo '<p style="text-align:left;font-size:10px;"><input type="checkbox" '.($autoplay ? ' checked="checked" ' : '').' id="' . 
      $this->get_field_id('autoplay') . '" name="' . $this->get_field_name('autoplay'). '" /> Autoplay</p>';  
      # random
      echo '<p style="text-align:left;font-size:10px;"><input type="checkbox" '.($random ? ' checked="checked" ' : '').' id="' . 
      $this->get_field_id('random') . '" name="' . $this->get_field_name('random'). '" /> Random images</p>'; 
      # number
      echo '<p style="text-align:left;font-size:10px;"><input type="text" value="'.$number.'" id="' . 
      $this->get_field_id('number') . '" name="' . $this->get_field_name('number'). '" /> Images number</p>';
      # height
      echo '<p style="text-align:left;font-size:10px;"><input type="text" value="'.$height.'" id="' . 
      $this->get_field_id('height') . '" name="' . $this->get_field_name('height'). '" /> Slider height in pixels</p>';      
      # color
      echo '<p style="text-align:left;font-size:10px;"><input type="text" value="'.$color.'" id="' . 
      $this->get_field_id('color') . '" name="' . $this->get_field_name('color'). '" /> Thumb border color eg. #FFCC00</p>';
      # url
      echo '<p style="text-align:left;font-size:10px;">Link path URL:<br /><input type="text" style="width:220px;" value="'.$url.'" id="' . 
      $this->get_field_id('url') . '" name="' . $this->get_field_name('url'). '" /></p>';                 
      
      $out = '<p style="text-align:left;font-size:10px;">Select page for link:<br />';
      $out .= $this->selectCtrlPagesList($pageid, $this->get_field_name('pageid'), 220);
      $out .= '</p>';
      echo $out;

        $out = '';
        $out .= '<p style="text-align:left;font-size:10px;"><label>Choose transition mode</label>';        

        $modes = Array();
        $modes['none'] = 'Switch without transition'; 
        $modes['fade'] = 'Fade images';    
        $modes['slide'] = 'Slide images';    
            
        $out .= '<select style="width:220px;" id="'.$this->get_field_id('trans').'" name="'.$this->get_field_name('trans').'">';
        foreach($modes as $key => $mode)
        {
            $out .= '<option ';
            $out .= ' value="'.$key.'" ';
            $out .= $trans == $key ? ' selected="selected" ' : '';
            $out .= '>'.$mode;
            $out .= '</option>';
        }
        $out .= '</select>';  
        $out .= '</p>';
        echo $out;
      
            
        $out = '';
        $out .= '<p style="text-align:left;font-size:10px;"><label>Choose gallery</label>';        
        global $nggdb;
        if(isset($nggdb))
        {
            $gallerylist = $nggdb->find_all_galleries('gid', 'DESC');
            
            
            $out .= '<select style="width:220px;" id="'.$this->get_field_id('gallery').'" name="'.$this->get_field_name('gallery').'">';
            $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($value == CMS_NOT_SELECTED ? ' selected="selected" ' : '').' >Not selected</option>';
            foreach($gallerylist as $gal)
            {
                $out .= '<option ';
                $out .= ' value="'.$gal->gid.'" ';
                $out .= $gallery == $gal->gid ? ' selected="selected" ' : '';
                $out .= '>'.$gal->title;
                $out .= '</option>';
            }
            $out .= '</select>';  
              
        } else
        {
            $out .= '<span style="color:#880000;font-size:10px;">Can\'t find NextGen Gallery Plugin</span>'; 
        }
        $out .= '</p>';
        echo $out;
  }  
  
    public function selectCtrlPagesList($itempage, $name, $width)
    {
        $out = '';
        $out .= '<select style="width:'.$width.'px;" name="'.$name.'"><option value="'.CMS_NOT_SELECTED.'">Not selected</option>';
        
        global $wpdb;
        $pages = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page' ORDER BY post_title ");
        
        $count = count($pages);
        for($i = 0; $i < $count; $i++)
        {
   
            $out .= '<option value="'.$pages[$i]->ID.'" ';
            
            if($itempage !== null)
            {
                if($pages[$i]->ID == $itempage) $out .= ' selected="selected" ';
            }
            
            $out .= '>';
            $out .= $pages[$i]->post_title;
            $out .= '</option>';
               
        } // for        
        $out .= '</select>';
        return $out;     
    } 
  
  }

  // Register widget
  function dcwp_galleryInit() { register_widget('dcwp_gallery'); }
  add_action('widgets_init', 'dcwp_galleryInit');

?>
