<?php  
/*
 * Plugin Name: Pages (Prestige)
 * Version: 1.0
 * Plugin URI: http://themeforest.net/user/DigitalCavalry
 * Description: Pages (Prestige)
 * Author: Digital Cavalry
 * Author URI: http://themeforest.net/user/DigitalCavalry
 */

    class dcwp_pages extends WP_Widget {
    
        function dcwp_pages() {
            $widget_ops = array('classname' => 'dcwp_pages', 'description' => 'Your site WordPress Pages (Prestige)' );
            $this->WP_Widget('dcwp_pages', 'dcwp_Pages', $widget_ops);
        }
    
        function widget( $args, $instance ) {
            extract( $args );
    
            $title = apply_filters('widget_title', empty( $instance['title'] ) ? 'Pages' : $instance['title'], $instance, $this->id_base);
            $sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
            $exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
    
            if ( $sortby == 'menu_order' )
                $sortby = 'menu_order, post_title';
    
            $out = wp_list_pages( apply_filters('widget_pages_args', array('title_li' => '', 'echo' => 0, 'sort_column' => $sortby, 'exclude' => $exclude) ) );
    
            if ( !empty( $out ) ) {
                echo $before_widget;
                if ( $title)
                    echo $before_title . $title . $after_title;
            ?>
            <ul class="widget-pages">
                <?php echo $out; ?>
            </ul>
            <?php
                echo $after_widget;
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
    
            $instance['exclude'] = strip_tags( $new_instance['exclude'] );
 
            return $instance;
        }
    
        function form( $instance ) {
            //Defaults
            $instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '', 'exclude' => '') );
            $title = esc_attr( $instance['title'] );
            $exclude = esc_attr( $instance['exclude'] );
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
         <p>
             <label for="<?php echo $this->get_field_id('exclude'); ?>"><?php echo 'Exclude:'; ?></label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
             <br />
             <small><?php echo 'Page IDs, separated by commas.'; ?></small>
          </p>
<?php
     }
  
}

  // Register widget
  function dcwp_pagesInit() { register_widget('dcwp_pages'); }
  add_action('widgets_init', 'dcwp_pagesInit');

?>