<?php  
/*
 * Plugin Name: Selected Pages (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Selected Pages (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_selectedpages extends WP_Widget {
    
        function dcwp_selectedpages() {
            $widget_ops = array('classname' => 'dcwp_selectedpages', 'description' => 'Your site WordPress Selected Pages (Prestige)');
            $this->WP_Widget('dcwp_selectedpages', 'dcwp_SelectedPages', $widget_ops);
        }
    
        function widget( $args, $instance ) {
            extract( $args );
    
            $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base);
            $sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
            $selectedpages = empty( $instance['selectedpages'] ) ? '' : $instance['selectedpages'];             
    
            if ( $sortby == 'menu_order' )
                $sortby = 'menu_order, post_title';
    
            $selpages = get_pages(array('sort_column' => $sortby, 'include' => $selectedpages));
    
            $count = count($selpages);
            if($count > 0) 
            {
                $out = '';
                $out .= $before_widget;
                if($title)
                {
                    $out .= $before_title . $title . $after_title;
                }
           
                $out .= '<ul class="widget-selected-pages">';
                     for($i = 0; $i < $count; $i++)
                     {
                         $pagetitledesc = get_post_meta($selpages[$i]->ID, 'page_title_desc', true);
                         $out .= '<li><a href="'.get_permalink($selpages[$i]->ID).'">'.$selpages[$i]->post_title.'</a>';
                         if($pagetitledesc != '')
                         {
                            $out .= ' <span class="dark">'.$pagetitledesc.'</span>';
                         }
                         $out .= '</li>';    
                     }                     
                $out .= '</ul>';                        
                $out .= $after_widget;
                echo $out;
            }
        }
   
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID' ) ) ) {
                $instance['sortby'] = $new_instance['sortby'];
            } else {
                $instance['sortby'] = 'menu_order';
            }
    
            $instance['selectedpages'] = $new_instance['selectedpages'];
 
            return $instance;
        }
    
        function form( $instance ) {
            //Defaults
            $instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '', 'exclude' => '') );
            $title = esc_attr( $instance['title'] );
            $selectedpages = $instance['selectedpages'];

        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
            <p>
             <label for="<?php echo $this->get_field_id('sortby'); ?>"><?php echo 'Sort by:'; ?></label>
             <select name="<?php echo $this->get_field_name('sortby'); ?>" id="<?php echo $this->get_field_id('sortby'); ?>" class="widefat">
                 <option value="post_title"<?php selected( $instance['sortby'], 'post_title' ); ?>><?php echo 'Page title'; ?></option>
                   <option value="menu_order"<?php selected( $instance['sortby'], 'menu_order' ); ?>><?php echo 'Page order'; ?></option>
                <option value="ID"<?php selected( $instance['sortby'], 'ID' ); ?>><?php echo 'Page ID'; ?></option>
             </select>
           </p>
           <p><label for="<?php echo $this->get_field_id('selectedpages'); ?>"><?php echo 'Selecte pages (1,7,5):'; ?></label> <input class="widefat" id="<?php echo $this->get_field_id('selectedpages'); ?>" name="<?php echo $this->get_field_name('selectedpages'); ?>" type="text" value="<?php echo $selectedpages; ?>" /></p>

             <label>Pages list with title &amp; ID:</label> 
             <?php
             global $wpdb;
             $pageslist = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'page' ORDER BY post_title ");
             $count = count($pageslist);
             
             echo '<select size="5" style="width:100%;height:200px;font-size:10px;" >';

                for($i = 0; $i < $count; $i++)
                {
                    $out = '';
                    $out .= '<option value="'.$pageslist[$i]->ID.'"';
                    $out .= '>('.$pageslist[$i]->ID.') '.$pageslist[$i]->post_title;
                    $out .= '</option>';
                    echo $out;
                }
                
                echo '</select>';
             ?>

<?php
     }
  
}

  // Register widget
  function andro_dcwp_selectedpagesInit() { register_widget('dcwp_selectedpages'); }
  add_action('widgets_init', 'andro_dcwp_selectedpagesInit');

?>