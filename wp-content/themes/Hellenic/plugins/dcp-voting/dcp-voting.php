<?php
/*
Plugin Name: Digital Cavalry Voting System
Plugin URI: http://themeforest.net/user/DigitalCavalry
Description: Plugin for voting articles and posts
Author: Digital Cavalry
Version: 1.0
Author URI: http://themeforest.net/user/DigitalCavalry
*/
    
/**********************************************************************
* DIGITAL CAVALRY WP VOTING SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      dcp-voting.php
* Brief:       
*      Plugin core file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    
    
 
if (!class_exists('dcpVotingLoader')) {
class dcpVotingLoader {
    
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
    public $_pluginName = 'dcpVoting';
    public $_options = null;
    public $_adminPanel = null;
    public $_pluginBaseName = '';

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
        $wpdb->dcp_voting_post = $wpdb->prefix . 'dcp_voting_post';

        // if table dont exist create it now
        if($wpdb->get_var("SHOW TABLES LIKE '$wpdb->dcp_voting_post'") != $wpdb->dcp_voting_post) 
        {            
            // add charset & collate like wp core
            $charset_collate = '';

            if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
                if ( ! empty($wpdb->charset) )
                    $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
                if ( ! empty($wpdb->collate) )
                    $charset_collate .= " COLLATE $wpdb->collate";
            }         
             
             $sql = "CREATE TABLE " . $wpdb->dcp_voting_post . " (
            pid BIGINT(20) NOT NULL AUTO_INCREMENT ,
            post_id BIGINT(20) DEFAULT '0' NOT NULL ,
            vote_type INT(11) DEFAULT '0' NOT NULL ,
            sum BIGINT(20) DEFAULT '0' NOT NULL ,
            votes INT(11) DEFAULT '0' NOT NULL , 
            votes1 INT(11) DEFAULT '0' NOT NULL ,
            votes2 INT(11) DEFAULT '0' NOT NULL ,
            votes3 INT(11) DEFAULT '0' NOT NULL ,
            votes4 INT(11) DEFAULT '0' NOT NULL ,
            votes5 INT(11) DEFAULT '0' NOT NULL ,
            votes6 INT(11) DEFAULT '0' NOT NULL ,
            votes7 INT(11) DEFAULT '0' NOT NULL ,
            votes8 INT(11) DEFAULT '0' NOT NULL ,
            votes9 INT(11) DEFAULT '0' NOT NULL ,
            votes10 INT(11) DEFAULT '0' NOT NULL ,
            max_stars INT(11) DEFAULT '0' NOT NULL ,
            post_type VARCHAR(30) DEFAULT '' NOT NULL , 
            PRIMARY KEY pid (pid),
            KEY post_id (post_id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);                                                         
        }          
                                                                
        // create actions db config file
        $path = DCP_VOTING_DIR.'lib/dbconfig.php';
        $string = "<?php \n\t".
            "define('DCP_VOTING_DB_NAME', '".DB_NAME."');\n\t".
            "define('DCP_VOTING_DB_HOST', '".DB_HOST."');\n\t".
            "define('DCP_VOTING_DB_USER', '".DB_USER."');\n\t".
            "define('DCP_VOTING_DB_PASSWORD', '".DB_PASSWORD."');\n\t".
            "define('DCP_VOTING_POST_DB_TABLE', '".$wpdb->dcp_voting_post."');".
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
         
        wp_register_script($this->_pluginName.'_common_js', DCP_VOTING_URL.'js/common.js', array('jquery'), ''); 
        
        wp_enqueue_script('jquery');
        wp_enqueue_script($this->_pluginName.'_common_js');                              
    }
         
    public function loadStyles() 
    {
        wp_enqueue_style($this->_pluginName.'_common_css', DCP_VOTING_URL.'css/common.css', false);
    }  
    
    public function loadHead()
    {
        $this->_options = get_option(DC_VOTING_SYSTEM_OPT);
        if(!is_array($this->_options))
        {
            require_once(dirname(__FILE__).'/admin/admin.php');
            $this->_adminPanel = new dcpVotingAdmin();
            $this->_options =  $this->_adminPanel->getOptions();            
        }
        echo '<script type="text/javascript">
            var dcp_voting_plugin_path = \''.DCP_VOTING_URL.'\';
            var dcp_voting_stars_array = new Array();
            dcp_voting_stars_array[0] = \''.$this->_options['starhover'].'\';
            dcp_voting_stars_array[1] = \''.$this->_options['star'].'\'; 
            dcp_voting_stars_array[2] = \''.$this->_options['star1'].'\';
            dcp_voting_stars_array[3] = \''.$this->_options['star2'].'\';
            dcp_voting_stars_array[4] = \''.$this->_options['star3'].'\';
            dcp_voting_stars_array[5] = \''.$this->_options['starb'].'\';                                 
            </script>';         
    }   
    
    /*********************************************************** 
    * Private functions
    ************************************************************/   
    
    private function loadDependencies() 
    {
        if (is_admin()) 
        {    
            require_once(dirname(__FILE__).'/admin/admin.php');
            $this->_adminPanel = new dcpVotingAdmin();
            $this->_options =  $this->_adminPanel->getOptions();                          
        } else
        {
            require_once(dirname(__FILE__).'/lib/shortcodes.php'); 
        }       
    }
    
    private function defineConstant() 
    {
        define('DCP_VOTING_URL', trailingslashit( WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__))));
        define('DCP_VOTING_DIR', trailingslashit( WP_PLUGIN_DIR . '/' . plugin_basename( dirname(__FILE__))));
       
        define(DC_VOTING_SYSTEM_OPT, 'DC_VOTING_SYSTEM_OPT');  // data base options id          
        define('DCP_VOTING_STARS', 1);
    }
    
    private function defineDataBaseTables()
    {
        global $wpdb;
        $wpdb->dcp_voting_post = $wpdb->prefix . 'dcp_voting_post'; 
    } 
 
    
} // class dcpVotingLoader

    // Let's start the holy plugin
    global $dcp_voting;
    $dcp_voting = new dcpVotingLoader();

} // if   
    
    
?>