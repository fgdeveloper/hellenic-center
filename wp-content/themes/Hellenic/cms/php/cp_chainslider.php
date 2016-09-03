<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_chainslider.php
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
*    CPChainSlider
* Descripton:
*    Implementation of CPChainSlider 
***********************************************************/
class CPChainSlider extends DCC_CPBaseClass
{
    const TRANS_MODE_FADE = 'fade';
    const TRANS_MODE_SLIDE = 'slide';
    const TRANS_MODE_NONE = 'none';
    const DBIDOPT_CHAIN_SLIDER_OPT = 'PRESTIGE_CHAIN_SLIDER_OPT';  // data base id options      
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        // temp
        $this->_options = get_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT);
        if (!is_array($this->_options))
        {
            add_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT, $this->_optionsDef);
            $this->_options = get_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT);
        }           
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      
     
     private $_options = null;
     private $_optionsDef = Array(
        'width' => 920,
        'height' => 350,
        'twidth' => 77,
        'theight' => 60,
        'bcolor' => 'FFCC00',
        'gid' => CMS_NOT_SELECTED,
        'random' => false,
        'number' => 8,
        'trans' => CPChainSlider::TRANS_MODE_FADE,
        'show_desc' => true,
        'images_set' => '',
        'autoplay' => true,
        'pageid' => CMS_NOT_SELECTED,
        'url' => '',
        'name' => false,
        'size' => 3
     );
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
 
    public function renderSlider()
    {
        $random = $this->_options['random'] ? 'true' : 'false';
        $desc = $this->_options['show_desc'] ? 'true' : 'false';
        $autoplay = $this->_options['autoplay'] ? 'true' : 'false';
        $w = $this->_options['width'];  
        $h = $this->_options['height']; 
        $tw = $this->_options['twidth'];  
        $th = $this->_options['theight']; 
        $bcolor = '#'.$this->_options['bcolor'];
        $set = $this->_options['images_set'];
        $trans = $this->_options['trans'];
        $id = $this->_options['gid'];
        $number = $this->_options['number'];
        $pageid = $this->_options['pageid'];
        $url = $this->_options['url'];
        $name = $this->_options['name'] ? 'true' : 'false'; 
        $size = $this->_options['size'];
                                 
        $slider_content = '<div style="width:920px;margin-top:35px;margin-left:auto;margin-right:auto;margin-bottom:0px;">[dcs_chain_gallery 
            gid="'.$id.'" 
            random="'.$random.'" 
            number="'.$number.'" 
            bcolor="'.$bcolor.'"
            set="'.$set.'" 
            desc="'.$desc.'"
            trans="'.$trans.'"  
            autoplay="'.$autoplay.'"
            tw="'.$tw.'" 
            th="'.$th.'" 
            h="'.$h.'" 
            w="'.$w.'" 
            pageid="'.$pageid.'" 
            shadow="true"
            url="'.$url.'"
            size="'.$size.'"
            name="'.$name.'"
            margin="0px 0px 27px 0px"]</div>';
            
        $slider_code = do_shortcode($slider_content);
        echo $slider_code; 
    }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    
    private function process()
    {
        if(isset($_POST['chain_save_settings']))
        {       
            $this->_options['width'] = $_POST['width'];
            if($this->_options['width'] > 920) { $this->_options['width'] = 920; }
            
            $this->_options['height'] = $_POST['height']; 
            $this->_options['twidth'] = $_POST['twidth'];
            $this->_options['theight'] = $_POST['theight']; 
            $this->_options['gid'] = $_POST['gid'];
            $this->_options['trans'] = $_POST['trans']; 
            $this->_options['bcolor'] = $_POST['bcolor'];
            $this->_options['number'] = $_POST['number']; 
            $this->_options['images_set'] = $_POST['images_set'];
            $this->_options['autoplay'] = isset($_POST['autoplay']) ? true : false; 
            $this->_options['show_desc'] = isset($_POST['show_desc']) ? true : false;
            $this->_options['random'] = isset($_POST['random']) ? true : false;
            $this->_options['pageid'] = $_POST['pageid'];
            $this->_options['url'] = $_POST['url'];             
            $this->_options['name'] = $_POST['name'];
            $this->_options['size'] = $_POST['size'];
            if($this->_options['size'] > 6) { $this->_options['size'] = 6; }
            if($this->_options['size'] < 1) { $this->_options['size'] = 1; }
 
            update_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT, $this->_options);
            $this->_saved = true;   
        } 
        
        if(isset($_POST['chain_restore_settings']))
        {       
            $this->_options['width'] = $this->_optionsDef['width'];
            $this->_options['height'] = $this->_optionsDef['height']; 
            $this->_options['twidth'] = $this->_optionsDef['twidth']; 
            $this->_options['theight'] = $this->_optionsDef['theight']; 
            $this->_options['gid'] = $this->_optionsDef['gid']; 
            $this->_options['trans'] = $this->_optionsDef['trans'];
            $this->_options['bcolor'] = $this->_optionsDef['bcolor']; 
            $this->_options['number'] = $this->_optionsDef['number']; 
            $this->_options['images_set'] = $this->_optionsDef['images_set'];            
            $this->_options['autoplay'] = $this->_optionsDef['autoplay']; 
            $this->_options['show_desc'] = $this->_optionsDef['show_desc'];
            $this->_options['random'] = $this->_optionsDef['random'];
            $this->_options['pageid'] = $this->_optionsDef['pageid'];
            $this->_options['url'] = $this->_optionsDef['url'];
            $this->_options['name'] = $this->_optionsDef['name'];
            $this->_options['size'] = $this->_optionsDef['size'];            
            
            update_option(CPChainSlider::DBIDOPT_CHAIN_SLIDER_OPT, $this->_options);
            $this->_saved = true;   
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
         $out .= '<a name="slider_settings"></a>';         
         $out .= '<h6 class="cms-h6">Chain Slider Settings</h6><hr class="cms-hr"/>';
         $out .= '<form action="#slider_settings" method="post" >';               
         
         $out .= '<input style="width:100px;text-align:center;" type="text" name="width" value="'.$this->_options['width'].'"/> Slider width in pixels (max. 920)<br />';
         $out .= '<input style="width:100px;text-align:center;" type="text" name="height" value="'.$this->_options['height'].'"/> Slider height in pixels<br />';
         $out .= '<input style="width:100px;text-align:center;" type="text" name="twidth" value="'.$this->_options['twidth'].'"/> Thumb width in pixels<br />';
         $out .= '<input style="width:100px;text-align:center;" type="text" name="theight" value="'.$this->_options['theight'].'"/> Thumb height in pixels<br /><br />';
         $out .= '<input style="width:100px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_options['bcolor'].'" name="bcolor" /> Selected thumb border color <br />';   
         $out .= '<input style="width:100px;text-align:center;" type="text" name="number" value="'.$this->_options['number'].'"/> Number of images to display <span class="cms-span-10">(zero display all images; if random is set, put here some number greater then zero)</span><br /><br />';          
         
         $out .= '<span class="cms-span-10">Choose gallery to display:</span><br />';      
         global $nggdb;
         if(isset($nggdb))
         {
            $gallerylist = $nggdb->find_all_galleries('gid', 'DESC');
            
            
            $out .= '<select style="width:220px;" name="gid">';
            $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($value == CMS_NOT_SELECTED ? ' selected="selected" ' : '').' >Not selected</option>';
            foreach($gallerylist as $gal)
            {
                $out .= '<option ';
                $out .= ' value="'.$gal->gid.'" ';
                $out .= $this->_options['gid'] == $gal->gid ? ' selected="selected" ' : '';
                $out .= '>'.$gal->title;
                $out .= '</option>';
            }
            $out .= '</select><br /><br />';  
              
         } else
         {
             $out .= '<span style="color:#880000;font-size:10px;">Can\'t find NextGen Gallery Plugin</span><br /><br />'; 
         }        
         
         $out .= '<span class="cms-span-10">Choose slider transition mode:</span><br />';
         $modes = Array(
                CPChainSlider::TRANS_MODE_NONE => 'Switch images without transition',
                CPChainSlider::TRANS_MODE_FADE => 'Fade images',
                CPChainSlider::TRANS_MODE_SLIDE => 'Slide images'
            ); 
         
         $out .= '<select style="width:220px;" name="trans">';
            foreach($modes as $key => $mode)
            {
                $out .= '<option ';
                $out .= ' value="'.$key.'" ';
                $out .= $this->_options['trans'] == $key ? ' selected="selected" ' : '';
                $out .= '>'.$mode;
                $out .= '</option>';                
            }
         $out .= '</select><br /><br />';   
         
         $out .= '<span class="cms-span-10">Choose page linked with slider:</span><br />';
         $out .= $this->selectCtrlPagesList($this->_options['pageid'], 'pageid', 220); 
         $out .= '<br /><br />';

         $out .= '<span class="cms-span-10">Custom url (overwrites selected page)</span><br />';
         $out .= '<input style="width:620px;text-align:center;" type="text" name="url" value="'.$this->_options['url'].'"/> <br /><br />'; 
         
         $out .= '<span class="cms-span-10">Images ID to display e.g 2,34,5,7,57 (if used this option will overwrite gallery selection)</span><br />';
         $out .= '<input style="width:220px;text-align:center;" type="text" name="images_set" value="'.$this->_options['images_set'].'"/> <br /><br />'; 
         
         $out .= '<input type="checkbox" name="autoplay" '.$this->attrChecked($this->_options['autoplay']).' /> Autoplay <br />';
         $out .= '<input type="checkbox" name="show_desc" '.$this->attrChecked($this->_options['show_desc']).' /> Show description for images <br />';
         $out .= '<input type="checkbox" name="rendom" '.$this->attrChecked($this->_options['rendom']).' /> Display random images <br />';
         $out .= '<input type="checkbox" name="name" '.$this->attrChecked($this->_options['name']).' /> Show slides name <br /><br />';
         
         $out .= '<span class="cms-span-10">Size of displayed title (from 1 to 6)</span><br />'; 
         $out .= '<input style="width:60px;text-align:center;" type="text" name="size" value="'.$this->_options['size'].'"/> <br />'; 
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="chain_save_settings" /> <input class="cms-submit" onclick="return confirm('."'Restore settings?'".')" type="submit" value="Restore settings" name="chain_restore_settings" />';         
         $out .= '</form>';
         
         echo $out;  
                  
    }    
            
} // class CPChainSlider
        
        
?>