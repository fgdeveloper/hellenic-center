<?php
/**********************************************************************
* DIGITAL CAVALRY WP NEWSLETTER SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      shortcodes.php
* Brief:       
*      Plugin wp shortcodes implementation
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    
   
class dcpNewsletterShortCodes 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/       
    public function __construct()
    {                                                              
        // add_shortcode('dcp_votestars', array(&$this, 'dcp_votestars'));
        // $this->_options = get_option(DC_NEWSLETTER_SYSTEM_OPT);
    }
    
    /*********************************************************** 
    * Public memebers
    ************************************************************/   
    
    public $_options = Array();
    
    /*********************************************************** 
    * Public functions
    ************************************************************/           
//    public function dcp_votestars($atts, $content=null, $code="")
//    {
//        
//    }    
} // class   

    global $dcp_newsletterShortCodes;
    $dcp_newsletterShortCodes = new dcpNewsletterShortCodes();    
    
?>
