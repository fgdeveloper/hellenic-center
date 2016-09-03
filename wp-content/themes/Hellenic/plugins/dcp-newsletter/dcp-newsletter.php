<?php
/*
Plugin Name: Digital Cavalry Newsletter System
Plugin URI: http://themeforest.net/user/DigitalCavalry
Description: Plugin for collecting users emails
Author: Digital Cavalry
Version: 1.0
Author URI: http://themeforest.net/user/DigitalCavalry
*/
    
/**********************************************************************
* DIGITAL CAVALRY WP NEWSLETTER SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      dcp-newsletter.php
* Brief:       
*      Plugin core file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    
    
 
if (!class_exists('dcpNewsletterLoader')) {
class dcpNewsletterLoader {
    
    /*********************************************************** 
    * Constructor
    ************************************************************/      
    
    public function __construct()
    {
        // setup plugin
        $this->defineConstant();
        $this->defineDataBaseTables();
        $this->loadDependencies();
        
        // get plugin base name
        $this->_pluginBaseName = plugin_basename(__FILE__);
        
        // activation and deactivation functions
        register_activation_hook($this->_pluginBaseName, array(&$this, 'activate'));
        register_deactivation_hook($this->_pluginBaseName, array(&$this, 'deactivate'));
        
        // start this plugin once all other plugins are fully loaded
        add_action('plugins_loaded', array(&$this, 'startPlugin'));        
    }
    
    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    public $_version = '1.0.0';
    public $_pluginName = 'dcpNewsletter';
    public $_adminPanel = null;
    public $_pluginBaseName = '';
    public $_options = null;

    /*********************************************************** 
    * Public functions
    ************************************************************/ 
   
    public function startPlugin() 
    {
        // check if we are in the admin area
        if(is_admin()) 
        {             
                
        } else 
        {                       
            // add the script and style files
            add_action('wp_head', array(&$this, 'loadHead')); 
            add_action('wp_print_scripts', array(&$this, 'loadScripts') );
            add_action('wp_print_styles', array(&$this, 'loadStyles') );
        }
        
    }   
            
    public function activate()
    {
        global $wpdb;  
        // add table name to wpdb object      
        $wpdb->dcp_newsletter = $wpdb->prefix . 'dcp_newsletter';

        // if table dont exist create it now
        if($wpdb->get_var("SHOW TABLES LIKE '$wpdb->dcp_newsletter'") != $wpdb->dcp_newsletter) 
        {            
            // add charset & collate like wp core
            $charset_collate = '';

            if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
                if ( ! empty($wpdb->charset) )
                    $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
                if ( ! empty($wpdb->collate) )
                    $charset_collate .= " COLLATE $wpdb->collate";
            }         
             
             $sql = "CREATE TABLE " . $wpdb->dcp_newsletter . " (
            id BIGINT(20) NOT NULL AUTO_INCREMENT ,
            email VARCHAR(255) NOT NULL DEFAULT '',
            meta VARCHAR(255) NOT NULL DEFAULT '',
            PRIMARY KEY id (id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);                                                         
        }          
                                                                
        // create actions db config file
        $path = DCP_NEWSLETTER_DIR.'lib/dbconfig.php';
        $string = "<?php \n\t".
            "define('DCP_NEWSLETTER_DB_NAME', '".DB_NAME."');\n\t".
            "define('DCP_NEWSLETTER_DB_HOST', '".DB_HOST."');\n\t".
            "define('DCP_NEWSLETTER_DB_USER', '".DB_USER."');\n\t".
            "define('DCP_NEWSLETTER_DB_PASSWORD', '".DB_PASSWORD."');\n\t".
            "define('DCP_NEWSLETTER_DB_TABLE', '".$wpdb->dcp_newsletter."');".
            "\n ?>";
            
        $handle = fopen($path, 'w');
        fwrite($handle, $string);
        fclose($handle); 
                  
    }
    
    public function deactivate()
    {
        
    }  
    
    public function loadScripts() 
    {
         
        wp_register_script($this->_pluginName.'_common_js', DCP_NEWSLETTER_URL.'js/common.js', array('jquery'), ''); 
        
        wp_enqueue_script('jquery');
        wp_enqueue_script($this->_pluginName.'_common_js');                              
    }
         
    public function loadStyles() 
    {
        wp_enqueue_style($this->_pluginName.'_common_css', DCP_NEWSLETTER_URL.'css/common.css', false);
    }  
    
    public function loadHead()
    {   
        $this->_options = get_option(DC_NEWSLETTER_SYSTEM_OPT);      
        if(!is_array($this->_options))
        {
            require_once(dirname(__FILE__).'/admin/admin.php');
            $this->_adminPanel = new dcpNewsletterAdmin();
            $this->_options = $this->_adminPanel->getOptions(); 
        }         
           
        echo '<script type="text/javascript">
            var dcp_newsletter_plugin_path = \''.DCP_NEWSLETTER_URL.'\';
            var dcp_newsletter_labels = new Object();
            dcp_newsletter_labels.msg_registered = \''.$this->_options['msg_registered'].'\';
            dcp_newsletter_labels.msg_unregistered = \''.$this->_options['msg_unregistered'].'\';
            dcp_newsletter_labels.msg_error = \''.$this->_options['msg_error'].'\';
            dcp_newsletter_labels.msg_cant_find = \''.$this->_options['msg_cant_find'].'\'; 
            dcp_newsletter_labels.msg_already = \''.$this->_options['msg_already'].'\';                                                          
            </script>';         
    }   
    
    /*********************************************************** 
    * Private functions
    ************************************************************/   
    
    private function loadDependencies() 
    {
        require_once(dirname(__FILE__).'/widgets/widgets.php');
        
        if(is_admin()) 
        {    
            require_once(dirname(__FILE__).'/admin/admin.php');
            $this->_adminPanel = new dcpNewsletterAdmin();
            $this->_options = $this->_adminPanel->getOptions();                           
        } else
        {
            require_once(dirname(__FILE__).'/lib/shortcodes.php'); 
        }       
    }
    
    private function defineConstant() 
    {
        define('DCP_NEWSLETTER_URL', trailingslashit( WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__))));
        define('DCP_NEWSLETTER_DIR', trailingslashit( WP_PLUGIN_DIR . '/' . plugin_basename( dirname(__FILE__))));
       
        define(DC_NEWSLETTER_SYSTEM_OPT, 'DC_NEWSLETTER_SYSTEM_OPT');  // data base options id          
    }
    
    private function defineDataBaseTables()
    {
        global $wpdb;
        $wpdb->dcp_newsletter = $wpdb->prefix . 'dcp_newsletter'; 
    } 
 
    
} // class dcpNewsletterLoader

    // Let's start the holy plugin
    global $dcp_newsletter;
    $dcp_newsletter = new dcpNewsletterLoader();

} // if   
    
    
?>