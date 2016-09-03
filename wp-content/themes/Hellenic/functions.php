<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)      
* 
* File name:   
*      functions.php
* Brief:       
*      Theme functions file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/

define('CMS_TURN_OFF_AUTOSAVE', true);
define('CMS_THEME_NAME', 'Prestige');
define('CMS_TXT_DOMAIN', CMS_THEME_NAME.'_dc_txtd');

define('CMS_NOT_SELECTED', -1);

define('CMS_WP_CONTENT_PATH', WP_CONTENT_DIR.'/' );
define('CMS_WP_CONTENT_URL', WP_CONTENT_URL.'/' );
 
define('CMS_THEME_TEMP_FOLDER_NAME', CMS_THEME_NAME.'_temp');
define('CMS_THEME_TEMP_FOLDER_PATH', CMS_WP_CONTENT_PATH.CMS_THEME_TEMP_FOLDER_NAME);
define('CMS_THEME_TEMP_FOLDER_URL', CMS_WP_CONTENT_URL.CMS_THEME_TEMP_FOLDER_NAME); 

require_once(TEMPLATEPATH . '/cms/php/cp_classes.php'); 
require_once(TEMPLATEPATH . '/cms/php/cp_metapost.php');
require_once(TEMPLATEPATH . '/cms/php/cp_metapage.php');
require_once(TEMPLATEPATH . '/cms/php/cp_metaproject.php');
require_once(TEMPLATEPATH . '/cms/php/cp_metanews.php');
require_once(TEMPLATEPATH . '/cms/php/cp_meta.php');     
require_once(TEMPLATEPATH . '/cms/php/cp_functions.php');
require_once(TEMPLATEPATH . '/cms/php/cp_home.php');
require_once(TEMPLATEPATH . '/cms/php/cp_menu.php');
if(is_admin()) { require_once(TEMPLATEPATH . '/cms/php/cp_help.php'); }
require_once(TEMPLATEPATH . '/cms/php/cp_general.php');
require_once(TEMPLATEPATH . '/cms/php/cp_prestigeslider.php');
require_once(TEMPLATEPATH . '/cms/php/cp_progressslider.php');
require_once(TEMPLATEPATH . '/cms/php/cp_chainslider.php');
require_once(TEMPLATEPATH . '/cms/php/cp_videoslider.php'); 
require_once(TEMPLATEPATH . '/cms/php/cp_accordion.php');  
require_once(TEMPLATEPATH . '/cms/php/cp_clientpanel.php'); 
require_once(TEMPLATEPATH . '/cms/php/cp_shortcodes.php');
require_once(TEMPLATEPATH . '/cms/php/cp_customposts.php'); 
require_once(TEMPLATEPATH . '/cms/php/cp_controlpanel.php');

function & GetDCCPInterface() // Get DC Control Panel Interface 
{
    $p = null;
    if(!isset($GLOBALS['cms_pcp']))
    {
        $GLOBALS['cms_pcp'] = new CPrestigeControlPanel(); // ACP - Andromeda Control Panel 
    }
    $p = $GLOBALS['cms_pcp'];
    return $p;      
}
$pi_acp = GetDCCPInterface();
      


      
   
  
      



  



   
    
?>
