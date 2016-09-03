<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_classes.php
* Brief:       
*      Part of theme control panel. Definition of global utility classes
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/

/*********************************************************** 
* Class name:
*    DCC_Meta
* Descripton:
*    Implementation of abstract class DCC_Meta 
***********************************************************/
abstract class DCC_Meta 
{
    /*********************************************************** 
    * Public members
    ************************************************************/    
    public $_name; // meta box name
    public $_std; // standard meta value
    public $_title; // title for meta box
    public $_type; // for page or post
    public $_desc; // meta box description
    
    /*********************************************************** 
    * Public functions
    ************************************************************/    
    abstract public function display();
    
    public function save($postID)
    {
        global $post;
        // verify unique random, one time use token  
        if(!wp_verify_nonce($_POST[$this->_name.'_noncename'], plugin_basename(__FILE__) )) 
        {  
            return $postID;  
        }  
          
        if('page' == $_POST['post_type']) 
        {  
            if(!current_user_can( 'edit_page', $postID ))  
            return $postID;  
        } else 
        {  
            if ( !current_user_can( 'edit_post', $postID ))  
            return $postID;  
        }  
        
        // OK, we are authenticated, now we need to find and save the data
        $data = $_POST[$this->_name];        

        // if meta data dont exist create it in database
        if(get_post_meta($postID, $this->_name) == "")  
        {
            add_post_meta($postID, $this->_name, $data, true); 
        } else
        // if meta data exist but ist different from new update it       
        if($data != get_post_meta($postID, $this->_name, true))
        {  
            update_post_meta($postID, $this->_name, $data);          
        } else
        // if no data to save, delete meta data
        if($data == "")  
        {
            delete_post_meta($postID, $this->_name);        
        }        
    } // save
    
    public function initDisplay()
    {
        // decalre global variable which contain post data
        global $post; 
        
        // get meta box value
        $value = get_post_meta($post->ID, $this->_name, true);        
        // if meta box dont have value set it to standard
        if('' == $value) { $value = $this->_std; }

        //  hidden field used to verify the data, width unique random, one time use token
        echo '<input type="hidden" name="'.$this->_name.'_noncename" id="'
            .$this->_name.'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
        
        return $value;        
    } // initDisplay
}

/*********************************************************** 
* Class name:
*    DCC_TwitterTweet
* Descripton:
*    Implementation of class DCC_TwitterTweet 
***********************************************************/
class DCC_TwitterTweet
{
    
    /*********************************************************** 
    * Constructor
    ************************************************************/     
    public function __construct()
    {
        $this->_date = '';
        $this->_source = '';
        $this->_text = '';
    }
   
    /*********************************************************** 
    * Public members
    ************************************************************/     
    public $_text;
    public $_date;
    public $_source;
}

/*********************************************************** 
* Class name:
*    DCC_CPBaseClass
* Descripton:
*    Implementation of abstract class DCC_CPBaseClass 
***********************************************************/
class DCC_CPBaseClass 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/   
    
    public function __construct()
    {
    }    
    
    /*********************************************************** 
    * Public members
    ************************************************************/    
    
    /*********************************************************** 
    * Public functions
    ************************************************************/    
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
            $out .= $pages[$i]->post_title.' (ID:'.$pages[$i]->ID.')';
            $out .= '</option>';
               
        } // for        
        $out .= '</select>';
        return $out;     
    } 
    
    public function attrSelected($value)
    {
        $out = '';
        $out .= $value ? ' selected="selected" ' : ''; 
        return $out;
    }

    public function attrChecked($value)
    {
        $out = '';
        $out .= $value ? ' checked="checked" ' : ''; 
        return $out;
    }    
    
}


/*********************************************************** 
* Class name:
*    DCC_WPMenuCustomWalker
* Descripton:
*    Implementation of abstract class DCC_WPMenuCustomWalker 
***********************************************************/
class DCC_WPMenuCustomWalker extends Walker_Nav_Menu
{
    function start_el($output, $item, $depth, $args) 
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        // $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = '';        
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        
        $a_classes = '';
        if($depth == 0) { $a_classes = ' class="top" '; }
        $item_output .= '<a target="_top"'. $attributes .' '.$a_classes.'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}   
        
?>
