<?php  
/*
 * Plugin Name: Twitter (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Twitter (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

  class dcwp_twitter extends WP_Widget {
   
       const DBIDOPT_TWITTER_WIDGET = 'PRESTIGE_TWITTER_WIDGET_OPT'; 
      
       function dcwp_twitter() {
           $widget_ops = array('classname' => 'dcwp_twitter', 'description' => "Your recent tweets from twitter (Prestige)" );
           $this->WP_Widget('dcwp_twitter', 'dcwp_Twitter', $widget_ops);
       }
   
       function widget( $args, $instance ) {
           extract($args);
           $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Tweets' : $instance['title'], $instance, $this->id_base);
           $username = empty($instance['username']) ? '' : $instance['username'];
           $password = empty($instance['password']) ? '' : $instance['password'];
           $icon = empty($instance['icon']) ? '' : $instance['icon'];
           $refresh = empty($instance['refresh']) ? 300 : $instance['refresh'];
           
           $tweets_count = (int) (empty($instance['tweets_count']) ? 5 : $instance['tweets_count']); 
           if($tweets_count < 1)
           {
               $tweets_count = 5;
           }
           if($tweets_count > 20)
           {
               $tweets_count = 20;
           }           
           
          $tags_args = array('taxonomy' => 'post_tag', 'format'=>'list', 'smallest'=>9, 'largest'=>9, 'unit'=>'px');
  
          echo $before_widget;
//          if($title)
//          {
//              echo $before_title . $title . $after_title;
//          }                  


            $oldtime = 0;
            $newtime = time();
            $userdata = null;
            $tweets = null;
            $twitter_data = null;
            
            $twitter_data = get_option(dcwp_twitter::DBIDOPT_TWITTER_WIDGET);
            if(!is_array($twitter_data))
            {
                $twitter_data = array();
                $tweets = dcf_getTwitterTweets($username, $password, $tweets_count, $userdata); 
                $twitter_data[0] = $newtime;
                $twitter_data[1] = $userdata;
                $twitter_data[2] = $tweets;
                
                add_option(dcwp_twitter::DBIDOPT_TWITTER_WIDGET, $twitter_data);
            } else
            {                
                $oldtime = $twitter_data[0];
                $userdata = $twitter_data[1];
                $tweets = $twitter_data[2];
                
                if($newtime - $oldtime > $refresh)
                {
                    $tweets = dcf_getTwitterTweets($username, $password, $tweets_count, $userdata);
                    $twitter_data[0] = $newtime;
                    $twitter_data[1] = $userdata;
                    $twitter_data[2] = $tweets;
                    
                    update_option(dcwp_twitter::DBIDOPT_TWITTER_WIDGET, $twitter_data);                         
                }                 
            }  
            
          
          if($tweets !== false)
          {
              $count = count($tweets);
              if($count > $tweets_count)
              {
                  $tweets_count = $count; 
              } else
              {
                 $tweets_count = $count;
              }
              
              $style = '';
              if($icon != '')
              {
                 $style = ' style="background-image:url('.$icon.');" '; 
              }
              
              $out = '';
              $out .= '<div class="widget-twitter">'; 
                  $out .= '<div class="heading" '.$style.'><h3>'.$title.'</h3><span class="followers">Followers: '.$userdata->followers_count.'</span><a target="_blank" href="https://twitter.com/'.$userdata->screen_name.'"><img class="photo" src="'.$userdata->profile_image_url.'" alt="'.$userdata->name.'" /></a></div>';
                  for($i = 0; $i < $tweets_count; $i++)
                  {
                      
                      //if($i > 0)
                     // {
                     //     $out .= '<div class="separator"></div>';
                     // }
                      $out .= '<div class="item">';

                           $text = $this->twitterify($tweets[$i]->_text);

                          $out .= '<p>'.$text.'</p>';
                          $out .= '<span class="time">'.$tweets[$i]->_date.'</span>';
                          // $out .= ' <span class="from">('.$tweets[$i]->_source.')</span>';
                      $out .= '</div>';
                      $out .= '<div class="separator"></div>'; 
                  }             
              $out .= '</div>';           
              
              echo $out;
          } else
          {
              $out = '';
              $out .= '<div class="widget-twitter">'; 
                  $out .= '<div class="heading"><h3>'.$title.'</h3><span class="followers">Service Overloaded</span><a target="_blank" href="https://twitter.com/'.$username.'"><div class="photo"></div></a></div>';              
              $out .= '</div>';
              echo $out;
          }
          // echo $after_widget;
          echo GetDCCPInterface()->getIGeneral()->getAfterWidget(false, false);  
      }
 
        function twitterify($ret) 
        {
            $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)[a-z0-9A-Z]*#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
            $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)[a-z0-9A-Z]*#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
            $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
            $ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
            return $ret;
        }  

 
  
                             
  
      function update( $new_instance, $old_instance ) {
          $instance['title'] = strip_tags(stripslashes($new_instance['title']));
          $instance['username'] = strip_tags(stripslashes($new_instance['username']));
          $instance['tweets_count'] = strip_tags(stripslashes($new_instance['tweets_count']));
          $instance['password'] = strip_tags(stripslashes($new_instance['password'])); 
          $instance['icon'] = $new_instance['icon'];
          $instance['refresh'] = $new_instance['refresh'];
           
          return $instance;
      }
  
      function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Recent Tweets', 'username' => '', 'password' => '', 'tweets_count' => 5, 'refresh' => 300) );
            $title = esc_attr( $instance['title'] );
            $username = $instance['username'];
            $tweets_count = $instance['tweets_count'];
            $icon = $instance['icon'];
            $refresh = $instance['refresh'];             

          
  ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

      <p><label for="<?php echo $this->get_field_id('username'); ?>">Twitter Username:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php if (isset ( $instance['username'])) {echo esc_attr( $instance['username'] );} ?>" /></p>      

      <p><label for="<?php echo $this->get_field_id('password'); ?>">Twitter Password:</label>
      <input type="password" class="widefat" id="<?php echo $this->get_field_id('password'); ?>" name="<?php echo $this->get_field_name('password'); ?>" value="<?php if (isset ( $instance['password'])) {echo esc_attr( $instance['password'] );} ?>" /></p>   
      
      <p><label for="<?php echo $this->get_field_id('tweets_count'); ?>">Tweets Count (max. 20):</label>
      <input type="text" style="width:60px;" id="<?php echo $this->get_field_id('tweets_count'); ?>" name="<?php echo $this->get_field_name('tweets_count'); ?>" value="<?php if (isset ( $instance['tweets_count'])) {echo esc_attr( $instance['tweets_count'] );} ?>" /></p>       
      
      <p><label for="<?php echo $this->get_field_id('icon'); ?>">Icon URL or leave empty for deafult:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" value="<?php echo $icon; ?>" /></p>   

      <p><label for="<?php echo $this->get_field_id('refresh'); ?>">Refresh time in seconds:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('refresh'); ?>" name="<?php echo $this->get_field_name('refresh'); ?>" value="<?php echo $refresh; ?>" /></p>   
      
      <?php
      }
  
  }

  // Register widget
  function dcwp_twitterInit() { register_widget('dcwp_twitter'); }
  add_action('widgets_init', 'dcwp_twitterInit');

?>
