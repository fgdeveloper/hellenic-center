<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_temp.php
* Brief:       
*      Part of theme control panel.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/

/*********************************************************** 
* Definitions
************************************************************/

/*********************************************************** 
* Class name:
*    CPTemp
* Descripton:
*    Implementation of CPTemp 
***********************************************************/
class CPTemp extends DCC_CPBaseClass 
{
    const DBIDOPT_TEMP = 'PRESTIGE_TEMP_OPT';  // data base id options      
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // temp
        $this->_temp = get_option(CPTemp::DBIDOPT_TEMP);
        if (!is_array($this->_temp))
        {
            add_option(CPTemp::DBIDOPT_TEMP, Array());
            $this->_temp = get_option(CPTemp::DBIDOPT_TEMP);
        }           
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_temp;
     private $_saved = false;
   
    /*********************************************************** 
    * Public functions
    ************************************************************/               
 
     public function renderTab()
     {
        echo '<div class="cms-content-wrapper">';
        $this->process();
        $this->renderCMS();
        echo '</div>';
     }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['home_save_extra_content']))
        {       
            //$this->_home['home_extra_content'] = $_POST['home_extra_content'];
            //$this->_home['home_show_extra_content'] = isset($_POST['home_show_extra_content']) ? true : false;
              
            //update_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT, $this->_options);
            //$this->_saved = true;   
        }              
    }

    private function renderCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        } 
        
         // Homepage extra content
         $out = '';
         $out .= '<a name="homepage_extra_content"></a>';         
         $out .= '<h6 class="cms-h6">Homepage extra content</h6><hr class="cms-hr"/>';
         $out .= '<form action="#homepage_extra_content" method="post" >';
               
         $out .= '<span class="cms-span-10">Homepage extra full width content:</span><br /><textarea style="font-size:11px;padding:8px;color:#444444;width:800px;max-width:800px;height:650px;" name="home_extra_content">'.stripcslashes($this->_home['home_extra_content']).'</textarea><br />';          
         $out .= '<input type="checkbox" '.$this->attrChecked($this->_home['home_show_extra_content']).' name="home_show_extra_content" /> Show homepage extra content';
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="home_save_extra_content" />';         
         $out .= '</form></div>';
         
         echo $out;           
    }
         
} // class CPTemp
        
        
?>