<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_help.php
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
*    CPHelp
* Descripton:
*    Implementation of CPHelp 
***********************************************************/
class CPHelp 
{
    
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
         
        
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/      

   
    /*********************************************************** 
    * Public functions
    ************************************************************/               
 
     public function renderTab()
     {
         echo '<div class="cms-content-wrapper">';
         $this->renderCMS();
         echo '</div>';
     }
 
    /*********************************************************** 
    * Private functions
    ************************************************************/      
    private function renderCMS()
    {  ?> 
        
        <span class="cms-span-10">This is a help section with a description of all Prestige shortcodes. For each shortocode a simple example is attached. 
        You will find more examples with the final effect examples on PrestigeDark Live Preview. <br /><br />[OPT] mark next to paragraph description means that use 
        of this parameter is optional (don't have to be defined - default settings will be used). All parameters for shortcodes must be used in this formula:
        [shortcode_name parameter="value"]. Some shortcodes need to have a closing tag [/shortcode_name], and some are working without it (see examples).</span>
        <div style="height:33px;"></div>
        
        
        
        <h6 class="cms-h6">Basic Shortcodes</h6><hr class="cms-hr"/>
        
        
        <!--dcs_p-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_p <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        
        <p class="cms-help-desc">Creates relative positioned element (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>).</p>
        
        <p class="cms-help-desc">The <code>dcs_p</code> shortcode just wraps text in &lt;p&gt; tag. When creating a content, this shortcode should be used for every standard text paragraph on a page or post, if you want to stylize the text. A huge help for this is a button added to HTML content editor - it allows to select a text and wrap it with dcs_p tag very quickly.<!--more--></p>
        <p class="cms-help-desc">For <code>dcs_p</code> shortcode a complete collection of parameters was created, thanks to this you have full control over text paragraphs and you can very easy stylize text in many ways (see some examples below). You can also don't use any of the parameters for <code>dcs_p</code> - text inserted into "clean" <code>dcs_p</code> shortcode equals text paragraph wrapped with &lt;p&gt; tag - if you don't want to stylize the text paragraphs, you can also just use &lt;p&gt; tags (and &lt;p&gt; button in HTML editor that works the same like dcs_p button) instead <code>dcs_p</code> shortcode.</p>
        
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">align</td> <td class="desc">[OPT] text align, you can use three string values: <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default: aligned to the <strong>left</strong>)</td></tr>
        <tr><td class="param">padding</td> <td class="desc">[OPT] inner padding for paragraph, use formula <strong>0px 0px 0px 0px</strong> where first value is for top padding, second for right, third for bottom and the last value is for left padding, you can use any valid value for CSS padding property (default: <strong>0px 0px 0px 0px</strong>)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] paragraph margins, use formula <strong>0px 0px 0px 0px</strong>, you can use any valid value for CSS margin property (default: <strong>0px 0px 15px 0px</strong>)</td></tr>
        <tr><td class="param">size</td> <td class="desc">[OPT] font size in pixels, can be set to for example size="11" (default: empty string - font size is set to 12px)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] text color in hexadecimal or any CSS accepted format e.g <strong>#99FF33</strong> (default: empty string - text color is set to white - #FFFFFF)</td></tr>
        <tr><td class="param">font</td> <td class="desc">[OPT] font family e.g Arial (default not set)</td></tr> 
        <tr><td class="param">fstyle</td> <td class="desc">[OPT] font style, can be set to <strong>normal</strong> or <strong>italic</strong> (default not set)</td></tr>
        <tr><td class="param">fweight</td> <td class="desc">[OPT] font weight, can be set to <strong>normal</strong> or <strong>bold</strong> (default not set)</td></tr> 
        <tr><td class="param">fheight</td> <td class="desc">[OPT] font line height in pixels (default: empty string - line height is set to 18px)</td></tr> 
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can best set to any valid value for CSS background-color property (default: empty string - background color is not set)</td></tr>
        <tr><td class="param">bgpos</td> <td class="desc">[OPT] background position, can be set to any valid value for CSS background-postion property (default: <strong>left top</strong>)</td></tr>
        <tr><td class="param">bgrepeat</td> <td class="desc">[OPT] background repeat mode, can be set to <strong>no-repeat</strong>, <strong>repeat</strong>, <strong>repeat-x</strong> or <strong>repeat-y</strong> (default: <strong>no-repeat</strong>)</td></tr>
        <tr><td class="param">bg</td> <td class="desc">[OPT] background image full path, can be overwrited by <strong>usersrc</strong> parameter (default: empty string, background is not set)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] relative path to image file name with extenstion from shortcodes image folder ([template path]/img/shortcodes). This image will be set as background for paragraph. If you set it, this value will overwrite <strong>bg</strong> parameter (default: empty string, background is not set)</td></tr> 
        <tr><td class="param">rounded</td> <td class="desc">[OPT] allows to create a rounded corners for paragraph block. This parameter sets corners radius, you can use value from 1 to 12 (default: zero, paragraph don't have rounded corners)</td></tr>
        <tr><td class="param">border</td> <td class="desc">[OPT] if set to <strong>true</strong> border is displayed, if set to <strong>false</strong> border is not displayed (default: false)</td></tr>
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color, can best set to any CSS valid value (default: #202020)</td></tr>
        <tr><td class="param">bstyle</td> <td class="desc">[OPT] border style, can be set to <strong>solid</strong>, <strong>dashed</strong> or <strong>dotted</strong> (default: solid)</td></tr>
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default: 1)</td></tr>
        
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_p</code> <em>parameters</em>] your content here [<code>/dcs_p</code>]</p>        
        <p class="cms-help-desc">[<code>dcs_p</code> color="#3399CC"]Some text which you want display on page.[<code>/dcs_p</code>]</p> 
        <p class="cms-help-desc">[<code>dcs_p</code> color="#3399CC" align="center" padding="0px 50px 0px 50px"]Some text which you want display on page.[<code>/dcs_p</code>]</p>
        </div>
        </div>
       
        <!--dcs_absimg-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_absimg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Shortcode allows you to insert absolute positioned image. Can be inserted into <code>dcs_p</code>, <code>dcs_rounded_box</code> and <code>dcs_box</code> shortcodes.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT use left or right] distance in pixels from parent left border, if you use it don't set right param (default not set)</td></tr>
        <tr><td class="param">right</td> <td class="desc">[OPT use left or right] distance in pixels from parent right border, if you use it don't set left param (default not set)</td></tr>
        <tr><td class="param">top</td> <td class="desc">[OPT use top or bottom] distance in pixels from parent top border, if you use it don't set bottom param (default not set)</td></tr>
        <tr><td class="param">bottom</td> <td class="desc">[OPT use top or bottom] distance in pixels from parent bottom border, if you use it don't set top param (default not set)</td></tr>
        <tr><td class="param">w</td> <td class="desc">image width in pixels, must be set (default zero)</td></tr>
        <tr><td class="param">h</td> <td class="desc">image height in pixels, must be set (default zero)</td></tr>        
        <tr><td class="param">src</td> <td class="desc">path to displayed image, must be set (default empty string)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url path for link used for image (default empty string)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] relative path to image file name with extenstion from shortcodes image folder ([template path]/img/shortcodes). If you set it, this value will overwrite <strong>src</strong> parameter (default empty string, no image path defined)</td></tr>  
         
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_absimg</code> <em>parameters</em>]</p>         
        </div>
        </div>
                                                                
        <!--dcs_span-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_span</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Can be used for example to format a part of text inside some paragraph.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">color</td> <td class="desc">[OPT] text color in hexadecimal or any CSS accepted format e.g <strong><em>#99FF33</em></strong> (default empty string, will be not set)</td></tr> 
        <tr><td class="param">bg</td> <td class="desc">[OPT] background color in hexadecimal or any CSS accepted format e.g <strong><em>#9F3</em></strong> or <strong><em>#9F3</em></strong> or <strong><em>green</em></strong> (default empty string, will be not set)</td></tr>
        <tr><td class="param">padding</td> <td class="desc">[OPT] left and right padding in pixels (just one single integer value), will be used only when background color is set (default 4 pixels)</td></tr>
        <tr><td class="param">code</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> Monospace font will be used (default <em>false</em>)</td></tr>
        <tr><td class="param">tip</td> <td class="desc">[OPT] string displayed as a tip information (default empty string, tip will be not displayed)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] tip possition, can be set to <strong><em>left</em></strong>, <strong><em>right</em></strong>, <strong><em>top</em></strong> or <strong><em>bottom</em></strong> (default <em>top</em>)</td></tr>
        <tr><td class="param">bold</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> bold font is used (default <em>false</em>)</td></tr> 
        <tr><td class="param">em</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> italic font is used (default <em>false</em>)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_span</code> <em>parameters</em>] your content here [<code>/dcs_span</code>]</p>         
        </div>
        </div> 
        
        <!--dcs_scode-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_scode</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Shortcode <code>dcs_scode</code> creates stylized text in the same way as <code>&lt;code&gt;</code> tag, but can be used outside paragraphs.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameter</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_scode</code> <em>parameters</em>] your content here [<code>/dcs_scode</code>]</p>         
        </div>
        </div>                          
          
        <!--dcs_hightlight -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_hightlight</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Simple shortcode to higlight text.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">color</td> <td class="desc">[OPT] text color in hexadecimal or any CSS accepted format (default set to black - <strong>#000000</strong>)</td></tr> 
        <tr><td class="param">bg</td> <td class="desc">[OPT] background color in hexadecimal or any CSS accepted format (default set to <strong>#838264</strong>)</td></tr>
        <tr><td class="param">p</td> <td class="desc">[OPT] left and right padding, single integer value (default set to <strong>3</strong>)</td></tr> 
        <tr><td class="param">rounded</td> <td class="desc">[OPT] radius of rounded corners, can be set to value from 1 to 12 (default set to <strong>2</strong>)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_hightlight</code> <em>parameters</em>] your content here [<code>/dcs_hightlight</code>]</p>         
        </div>
        </div>          
        
         
         
        <!--dcs_popimg-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_popimg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">With this shortcode a popup image linked to some url can be inserted in text. The image shows up when you are hovering the mouse over the text defined with this shortcode.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">color</td> <td class="desc">[OPT] text color in hexadecimal or any CSS accepted format e.g <strong><em>#99FF33</em></strong> (default empty string, will be not set)</td></tr> 
        <tr><td class="param">src</td> <td class="desc">url to displayed image, must be set (default empty string)</td></tr>
        <tr><td class="param">w</td> <td class="desc">[OPT] image thumb width in pixels. This parameter will be taken into account only if <strong>thumb</strong> parameter is set to "true" (default: 240)</td></tr>
        <tr><td class="param">h</td> <td class="desc">[OPT] image thumb height in pixels. This parameter will be taken into account only if <strong>thumb</strong> parameter is set to "true" (default: 180)</td></tr>
        <tr><td class="param">thumb</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong>, image from <strong>src</strong> parameter is displayed as thumb with width and height defined by <strong>w</strong> and <strong>h</strong> parameters (default false)</td></tr>
        <tr><td class="param">title</td> <td class="desc">[OPT] optional short image description (default empty string)</td></tr>
        <tr><td class="param">icon</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> image icon will be displayed next to link (default <em>false</em>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url path for link (default empty string, will be not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] can be set to <strong><em>_self</em></strong> (opens in the same window/tab) or <strong><em>_blank</em></strong> (opens in a new window/tab) (default <em>_self</em>)</td></tr> 
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] this parameter allows to change the icon image displayed when <strong>icon</strong> parameter is set to <strong><em>true</em></strong>. As value
        insert a filename that is placed in shortcodes folder [template path]/img/shortcodes. Icon image should be 16x16 pixels big (default empty string, default icon is used)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_popimg</code> <em>parameters</em>] your content here [<code>/dcs_popimg</code>]</p>                                                                                                       
        </div>
        </div>

        <h6 class="cms-h6" style="margin-top:40px;">Buttons</h6><hr class="cms-hr"/>
         
        <!--dcs_btn-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_btn</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates small button.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table"> 
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS color valid value (default set to theme heading color)</td></tr>                     
        <tr><td class="param">hcolor</td> <td class="desc">[OPT] text hover color, can be set to any CSS color valid value (default set to theme main hover color)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] destination URL (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] URL target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr> 
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] button margins, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set <strong>0px 0px 0px 0px</strong>)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] button align mode, can be set to <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_btn</code> <em>parameters</em>] your content here [<code>/dcs_btn</code>]</p>                                                                                                      
        </div>
        </div>

        <!--dcs_bigbtn-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_bigbtn</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates big button.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table"> 
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS color valid value (default set to theme heading color)</td></tr>                     
        <tr><td class="param">hcolor</td> <td class="desc">[OPT] text hover color, can be set to any CSS color valid value (default set to theme main hover color)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] destination URL (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] URL target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr> 
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] button margins, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set <strong>0px 0px 0px 0px</strong>)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] button align mode, can be set to <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_bigbtn</code> <em>parameters</em>] your content here [<code>/dcs_bigbtn</code>]</p>                                                                                                      
        </div>
        </div>
        
        <!--dcs_btn_color-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_btn_color</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates small colored button.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table"> 
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS color valid value (default set to <strong>#FFFFFF</strong>)</td></tr>                     
        <tr><td class="param">hcolor</td> <td class="desc">[OPT] text hover color, can be set to any CSS color valid value (default set to <strong>#000000</strong>)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS color valid value (default set to <strong>#777700</strong>)</td></tr>
        <tr><td class="param">bghcolor</td> <td class="desc">[OPT] background hover color, can be set to any CSS color valid value (default set to <strong>#777700</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] destination URL (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] URL target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr> 
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] button margins, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set <strong>0px 0px 0px 0px</strong>)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] button align mode, can be set to <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_btn_color</code> <em>parameters</em>] your content here [<code>/dcs_btn_color</code>]</p>                                                                                                      
        </div>
        </div>
    

        <!--dcs_bigbtn_color-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_bigbtn_color</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates big colored button.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table"> 
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS color valid value (default set to <strong>#FFFFFF</strong>)</td></tr>                     
        <tr><td class="param">hcolor</td> <td class="desc">[OPT] text hover color, can be set to any CSS color valid value (default set to <strong>#000000</strong>)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS color valid value (default set to <strong>#777700</strong>)</td></tr>
        <tr><td class="param">bghcolor</td> <td class="desc">[OPT] background hover color, can be set to any CSS color valid value (default set to <strong>#777700</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] destination URL (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] URL target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr> 
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] button margins, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set <strong>0px 0px 0px 0px</strong>)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] button align mode, can be set to <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default not set, button is displayed as inline element)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_bigbtn_color</code> <em>parameters</em>] your content here [<code>/dcs_bigbtn_color</code>]</p>                                                                                                      
        </div>
        </div>    

        
        <h6 class="cms-h6" style="margin-top:40px;">Links</h6><hr class="cms-hr"/>
         
        <!--dcs_link-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_link</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Allows to create a styled link. With this shortcode you can easily use some icon for link and create a tooltip.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">color</td> <td class="desc">[OPT] text color in hexadecimal or any CSS accepted format e.g <strong><em>#99FF33</em></strong> (default empty string, will be not set)</td></tr> 
        <tr><td class="param">tip</td> <td class="desc">[OPT] string displayed as a tip information (default empty string, tip will be not displayed)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] tip possition, can be set to <strong><em>left</em></strong>, <strong><em>right</em></strong>, <strong><em>top</em></strong> or <strong><em>bottom</em></strong> (default <em>top</em>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url path for link (default empty string, will be not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] can be set to <strong><em>_self</em></strong> or <strong><em>_blank</em></strong> (default <em>_self</em>)</td></tr>
        <tr><td class="param">icon</td> <td class="desc">[OPT] you can set it to <strong><em>email</em></strong>, <strong><em>download</em></strong>, 
                    <strong><em>pdf</em></strong>, <strong><em>word</em></strong>, <strong><em>zip</em></strong>, <strong><em>music</em></strong>,
                    <strong><em>file</em></strong>, <strong><em>files</em></strong>, <strong><em>rar</em></strong> (default empty string, icon will be not displayed)</td></tr>                        
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_link</code> <em>parameters</em>] your content here [<code>/dcs_link</code>]</p>                                                                                                      
        </div>
        </div>
  
        <!--dcs_lb_link-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_lb_link</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Lightbox image link.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">url</td> <td class="desc">url to image or video displayed via lightbox, must be set to valid value</td></tr>                      
        <tr><td class="param">group</td> <td class="desc">[OPT] group name for lightbox (default no set)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] image title for lightbox window (default not set)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] text color can be set to any CSS valid color value (default not set)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_lb_link</code> <em>parameters</em>] your content here [<code>/dcs_lb_link</code>]</p>                                                                                                      
        </div>
        </div>
        
        <!--dcs_lb_link_ngg-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_lb_link_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Lightbox NextGEN Gallery image link.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">pid</td> <td class="desc">picture ID from NextGEN Gallery, must be set to valid value</td></tr>                     
        <tr><td class="param">group</td> <td class="desc">[OPT] group name for lightbox (default no set)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] text color can be set to any CSS valid color value (default not set)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_lb_link_ngg</code> <em>parameters</em>] your content here [<code>/dcs_lb_link_ngg</code>]</p>                                                                                                      
        </div>
        </div>        
  
        <h6 class="cms-h6" style="margin-top:40px;">Code</h6><hr class="cms-hr"/>      
      
      
        <!--dcs_code-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_code</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Allows you to insert styled programming code into the site content.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">lang</td> <td class="desc">[OPT] programming language used for styling code in box, defalut is set to <strong><em>plain</em></strong>, 
                    but you can use also <strong><em>sql</em></strong>, <strong><em>csharp</em></strong>, <strong><em>css</em></strong>, 
                    <strong><em>cpp</em></strong>, <strong><em>php</em></strong>, <strong><em>delphi</em></strong> or <strong><em>jscript</em></strong></td></tr>                       
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_code</code> <em>parameters</em>] your content here [<code>/dcs_code</code>]</p>                                                                                                      
        </div>
        </div>
        
        <h6 class="cms-h6" style="margin-top:40px;">Post Queries</h6><hr class="cms-hr"/>      
            
        <!--dcs_related_news-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_related_news</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Shortcode <code>dcs_related_news</code> display related news to given news. News are related via tags.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">[OPT] news ID for which will be displayed related news, if you use this 
        shortcode in news content, there are no need to specify this parameter, news ID will by automatically taken from edited news (default not set)</td></tr> 
        <tr><td class="param">limit</td> <td class="desc">[OPT] number of displayed related news (default set to 4)</td></tr>                                 
        <tr><td class="param">count</td> <td class="desc">[OPT] number of displayed related news on one row (default set to 4)</td></tr>
        <tr><td class="param">exclude</td> <td class="desc">[OPT] if <strong>true</strong> news specified in ID parameter will excluded from list (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] title for related news containar (default set to <strong>Related news</strong>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_related_news</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>        

        <!--dcs_related_posts-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_related_posts</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Shortcode <code>dcs_related_posts</code> display related posts to given posts. Posts are related via tags.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">[OPT] post ID for which will be displayed related posts, if you use this 
        shortcode in post content, there are no need to specify this parameter, post ID will by automatically taken from edited post (default not set)</td></tr> 
        <tr><td class="param">limit</td> <td class="desc">[OPT] number of displayed related posts (default set to 4)</td></tr>                                 
        <tr><td class="param">count</td> <td class="desc">[OPT] number of displayed related posts on one row (default set to 4)</td></tr>
        <tr><td class="param">exclude</td> <td class="desc">[OPT] if <strong>true</strong> post specified in ID parameter will excluded from list (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] title for related posts containar (default set to <strong>Related posts</strong>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_related_posts</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>  
        
        <!--dcs_related_projects-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_related_projects</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Shortcode <code>dcs_related_projects</code> display related projects to given project. Projects are related via categories.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">[OPT] project ID for which will be displayed related projects, if you use this 
        shortcode in project content, there are no need to specify this parameter, project ID will by automatically taken from edited project (default not set)</td></tr> 
        <tr><td class="param">limit</td> <td class="desc">[OPT] number of displayed related project (default set to 4)</td></tr>                                 
        <tr><td class="param">count</td> <td class="desc">[OPT] number of displayed related project on one row (default set to 4)</td></tr>
        <tr><td class="param">exclude</td> <td class="desc">[OPT] if <strong>true</strong> project specified in ID parameter will excluded from list (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] title for related projects containar (default set to <strong>Related projects</strong>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_related_projects</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>    
        
        <!--dcs_recent_news-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_recent_news</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Displays recent news, great tool for fast content creation.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">count</td> <td class="desc">[OPT] number of last news to show (default set to 3)</td></tr>                                 
        <tr><td class="param">voting</td> <td class="desc">[OPT] if set to <strong>true</strong> rating will be displayed for news posts (default set to <strong>true</strong>)</td></tr>        
        <tr><td class="param">cat</td> <td class="desc">[OPT] single news category slug name, with this parameter you can cut down latest news to given category (default not set)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_recent_news</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>   
        
        <!--dcs_recent_posts-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_recent_posts</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Displays recent posts, great tool for fast content creation.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">count</td> <td class="desc">[OPT] number of last posts to show (default set to 3)</td></tr>                                 
        <tr><td class="param">voting</td> <td class="desc">[OPT] if set to <strong>true</strong> rating will be displayed for posts (default set to <strong>false</strong>)</td></tr>        
        <tr><td class="param">image</td> <td class="desc">[OPT] if <strong>true</strong> post image/video/slider will be displayed (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] if <strong>true</strong> post image description will be displayed (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">cat</td> <td class="desc">[OPT] comma seprated categories IDs for display, e.g. <code>'3,34,7,18'</code> (default not set, post from all categories will be displayed)</td></tr> 
        <tr><td class="param">catex</td> <td class="desc">[OPT] comma seprated excluded categories IDs, e.g. <code>'4,13,5,32'</code> (default not set, any category will be excluded)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_recent_posts</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>                                  

        <!--dcs_posts_list-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_posts_list</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Displays list of links to posts of any type, great tool for fast content creation.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">count</td> <td class="desc">[OPT] count of last posts do display, if zero all posts will displayed (default set to 5)</td></tr>                                 
        <tr><td class="param">y</td> <td class="desc">[OPT] year number e.g 2010 for show posts only from 2010 year (default not set)</td></tr> 
        <tr><td class="param">m</td> <td class="desc">[OPT] month number e.g 1 for January or 12 for December (default not set)</td></tr> 
        <tr><td class="param">type</td> <td class="desc">[OPT] post type to display, can be set to <strong>post</strong>, <strong>news</strong> or <strong>project</strong> (default set to <strong>post</strong>)</td></tr> 
        <tr><td class="param">thumb</td> <td class="desc">[OPT] if set to <strong>true</strong> popup image is displayed in full size, only if image is set for given post (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">resize</td> <td class="desc">[OPT] if set to <strong>true</strong> popup image is resized to middle size (default set to <strong>false</strong>)</td></tr>
        <tr><td class="param">ul</td> <td class="desc">[OPT] if set to <strong>true</strong> post list is displayed as unordered list (default set to <strong>true</strong>)</td></tr> 
        <tr><td class="param">ex</td> <td class="desc">[OPT] can be se to <strong><em>this</em></strong> to exclude edited post from list, can be set to comma seprated posts ID list e.g '3,23,4' to exclude multiple posts (default empty string, no exclusion)</td></tr> 
        <tr><td class="param">tax</td> <td class="desc">[OPT] taxonomy slug, can be set to <strong>category</strong>, <strong>post_tag</strong>, <strong>news_tag</strong>, <strong>project_cat</strong>, <strong>news_cat</strong> (default not set) </td></tr>
        <tr><td class="param">terms</td> <td class="desc">[OPT] term slug, can be set to choosed taxonomy slug, for multiple slugs use comma separated names e.g <strong><em>slug,slug,slug</em></strong> (default not set)</td></tr> 
        <tr><td class="param">color</td> <td class="desc">[OPT] unordered list dot color, can be set to any CSS color valid value (default set to theme main hover color)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] list wrapper margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>0px 0px 15px 0px</strong>)</td></tr> 
        <tr><td class="param">left</td> <td class="desc">[OPT] unordered list left padding in pixels (default not set)</td></tr> 
        <tr><td class="param">ultype</td> <td class="desc">[OPT] unordered list marker type, can be set to <strong>none</strong>, <strong>disc</strong>, <strong>circle</strong> or <strong>square</strong> (default set to <strong>disc</strong>)</td></tr>
        <tr><td class="param">date</td> <td class="desc">[OPT] if set to <strong>true</strong> post publication date will be displayed (default set to <strong>false</strong>)</td></tr>
        <tr><td class="param">comments</td> <td class="desc">[OPT] if set to <strong>true</strong> post comments count will be displayed (default set to <strong>false</strong>)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_posts_list</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>   
        
        <h6 class="cms-h6" style="margin-top:40px;">Dividers</h6><hr class="cms-hr"/> 
        
        <!--dcs_top-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_top</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Craetes a horizontal divider with or without link to the top of the page.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">empty</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> inner line and top link is not displayed (default set to <em>false</em>)</td></tr>                       
        <tr><td class="param">top</td> <td class="desc">[OPT] if set to <strong><em>false</em></strong> top link is not displayed (default set to <em>true</em>)</td></tr> 
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] line color, can be set to any CSS valid color (default empty string, will be not set)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid color (default empty string, will be not set)</td></tr>
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] line width in pixels (default set to one pixel)</td></tr>
        <tr><td class="param">bstyle</td> <td class="desc">[OPT] line style, can be set to <strong><em>solid</em></strong>, <strong><em>dotted</em></strong> or 
            <strong><em>dashed</em></strong> (default set to <em>solid</em>)</td></tr>   
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_top</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>
        
        <!--dcs_darkspliter-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_darkspliter</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates a horizontal thick divider.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">size</td> <td class="desc">[OPT] can be set to <strong><em>small</em></strong>, <strong><em>medium</em></strong> or <strong><em>large</em></strong> (default set to <em>medium</em>)</td></tr>                       
        <tr><td class="param">extra</td> <td class="desc">[OPT] additional height in pixels (default set to <em>zero</em>)</td></tr> 
        <tr><td class="param">top</td> <td class="desc">[OPT] margin top in pixels (default set to <em>zero</em>)</td></tr> 
        <tr><td class="param">bottom</td> <td class="desc">[OPT] margin bottom in pixels (default set to <em>zero</em>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_darkspliter</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>        

        <!--dcs_thinspliter-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_thinspliter</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates a horizontal thin divider.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">size</td> <td class="desc">[OPT] can be set to <strong><em>small</em></strong> or <strong><em>large</em></strong> (default set to <em>small</em>)</td></tr>                       
        <tr><td class="param">extra</td> <td class="desc">[OPT] additional height in pixels (default set to <em>zero</em>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_thinspliter</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div> 
        
        <!--dcs_clearboth-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_clearboth</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Clear both spliter, invisible, can be used to clear floating objects structure. Use this below floating objects if you want to "clear" the layout for next object.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">h</td> <td class="desc">[OPT] height in pixels (default: height is set to 1 pixel)</td></tr>                       
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_clearboth</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>       
       
        
        <!--dcs_emptyspace-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_emptyspace</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Creates empty content space with height set by a parameter, works in the same way as <code>dcs_clearboth</code> shortcode.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">h</td> <td class="desc">[OPT] height in pixels (default height is set to 1 pixel)</td></tr>                       
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_emptyspace</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>         
                      
        <h6 class="cms-h6" style="margin-top:40px;">Forms</h6><hr class="cms-hr"/> 
        
        <!--dcs_contactform -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_contactform</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">AJAX/PHP contact form. Using this shortcode you can insert a contact form that looks similar to Contact page template form. Thanks to this it is possible to create multiple contact forms on various pages, also destinated for different email addresses.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">title</td> <td class="desc">[OPT] title for contact form (default empty string, title will be not displayed)</td></tr>                       
        <tr><td class="param">email</td> <td class="desc">[OPT] email address attached to contact form, if empty string, email from CMS (Prestige > General > Contact page) will be used (default empty string)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_contactform</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>          
        
        
        <!--dcs_searchform -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_searchform</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Search form.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">title</td> <td class="desc">[OPT] title displayed for search form (default empty string)</td></tr>                       
        <tr><td class="param">query</td> <td class="desc">[OPT] search query displayed on start (default <em>Search..</em> string)</td></tr>
        <tr><td class="param">size</td> <td class="desc">[OPT] input box width, can be set to <strong><em>small</em></strong>, <strong><em>long</em></strong> or <strong><em>full</em></strong> (default set to <em>long</em>)</td></tr> 
        <tr><td class="param">btn</td> <td class="desc">[OPT] search button name (default <em>Search</em>)</td></tr>                       
        <tr><td class="param">top</td> <td class="desc">[OPT] margin top in pixels (default 15 px)</td></tr>
        <tr><td class="param">bottom</td> <td class="desc">[OPT] margin bottom in pixels (default 15 px) </td></tr>        
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_searchform</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>      
        

        <!--dcs_post-->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_post</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Displays a blog post (or Post Portfolio post) in the same way as posts on blog page. Great for fast creating content e.g on homepage.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">post ID (must be set valid value)</td></tr>                       
        <tr><td class="param">image</td> <td class="desc">[OPT] if <strong><em>true</em></strong> image/video attached to post will be displayed (default set to <em>true</em>)</td></tr>
        <tr><td class="param">desc</td> <td class="desc">[OPT] if <strong><em>true</em></strong> image description will be displayed (default set to <em>true</em>)</td></tr> 
        <tr><td class="param">voting</td> <td class="desc">[OPT] if <strong><em>true</em></strong> post voting will be displayed, if <strong><em>false</em></strong> voting will be hidden (default set to <em>true</em>)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_post</code> <em>parameters</em>]</p>                                                                                                      
        </div>
        </div>          
        

        <!--dcs_page -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_page</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description:</span><br />
        <p class="cms-help-desc">Displays information about page. Works similar to <code>dcs_post</code></p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">page ID (must be set valid value)</td></tr>                       
        <tr><td class="param">desc</td> <td class="desc">[OPT] if <strong><em>true</em></strong> page description will be displayed (default set to <em>true</em>)</td></tr> 
        <tr><td class="param">voting</td> <td class="desc">[OPT] if <strong><em>true</em></strong> post voting will be displayed, if <strong><em>false</em></strong> voting will be hidden (default set to <em>false</em>)</td></tr>     
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_page</code> <em>parameters</em>]</p>
        <p class="cms-help-desc">[<code>dcs_page</code> <em>parameters</em>] your content here (page description if you want overwrite description from page edit panel) [<code>/dcs_page</code>]</p>                                                                                                       
        </div>
        </div>         
        
        
        <!--dcs_fly_gallery -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_fly_gallery</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a fly gallery slider. You must use at least four slides for this feature. Can be placed in columns that have at least 600px width. Every slide can have a title and use a link. The images are automatically rescaled to the slider size - 300x200 pixels for small size slider, 450x300 pixels for big size slider. You can achieve the best effects if the images are in the size that is used on slider.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">size</td> <td class="desc">[OPT] gallery size, use <strong><em>small</em></strong> value for page with sidebar (or in 600px column, or in columns of greater size), value
        <strong><em>big</em></strong> use only for full width page (default set to <em>small</em>)</td></tr>                          
        </table>
        
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Remember to add char <strong><em>;</em></strong> after every image path <span class="cms-help-exclamation-icon"></span> </p>            
        <p class="cms-help-desc">Before title use prefix <strong>+{title}</strong> <span class="cms-help-exclamation-icon"></span> </p>
        <p class="cms-help-desc">Before link use prefix <strong>+{link}</strong> <span class="cms-help-exclamation-icon"></span> </p> 
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_fly_gallery</code> <em>parameters</em>] your content here (at least 4 x image paths) [<code>/dcs_fly_gallery</code>]</p>         
        <p class="cms-help-desc">[<code>dcs_fly_gallery</code> size="small"]<br /> 
            http://www.digitalcavalry.com/2010/04/1.jpg+{title}This is title+{link}http://www.digitalcavalry.com;<br /> 
            http://www.digitalcavalry.com/2010/06/kelly2.jpg;<br /> 
            http://www.digitalcavalry.com/2010/08/3.jpg+{title}Other title+{link}http://www.digitalcavalry.com;
            http://www.digitalcavalry.com/2010/08/fourthslide.jpg+{title}Slide 4 Title;<br />         
        [<code>/dcs_fly_gallery</code>]</p>                                                                                                                
        </div>
        </div>  
        
        <!--dcs_box -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_box <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a content box - a container in which you can place some content and for example position it by changing parameters. You can set margins, padding and own background for this box. (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">padding</td> <td class="desc">[OPT] inner padding for box, use formula <strong><em>0px 0px 0px 0px</em></strong> where first value is for top padding, second for right, third for bottom and the last value is for left padding (default <em>0px 0px 0px 0px</em>)</td></tr>                          
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for box, use formula <strong><em>0px 0px 0px 0px</em></strong> where first value is for top margin, second for right, third for bottom and the last value is for left margin (default <em>0px 0px 0px 0px</em>)</td></tr> 
        <tr><td class="param">bg</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> background will be displayed (default set to <em>true</em>)</td></tr>
        <tr><td class="param">path</td> <td class="desc">[OPT] path to background image (default empty string, default background will be used)</td></tr>
        <tr><td class="param">repeat</td> <td class="desc">[OPT] background repeat mode, can be set to <strong><em>repeat</em></strong>, 
        <strong><em>no-repeat</em></strong>, <strong><em>repeat-x</em></strong> or <strong><em>repeat-y</em></strong> (default <em>no-repeat</em>)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] background position, can be set to any CSS valid value (default <em>center top</em>)</td></tr> 
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] filename with extension from shortcodes folder [template path]/img/shortcodes, if you set this, path to this image file 
         will overwrite <code>path</code> parameter. By using this parameter you can place image directly into shortcodes folder and use only image name without the full path (default empty string, will be not set)</td></tr>             
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_box</code> <em>parameters</em>] your content here [<code>/dcs_box</code>]</p>                                                                                                                      
        </div>
        </div>                
        
        
         <!--dcs_rounded_box -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_rounded_box <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates rounded content box - a container in which you can place some content and for example position it by changing parameters. You can set margins, padding and own background for this box. (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">padding</td> <td class="desc">[OPT] inner padding for box, use formula <strong><em>0px 0px 0px 0px</em></strong> where first value is for top padding, second for right, third for bottom and the last value is for left padding (default <em>0px 0px 0px 0px</em>)</td></tr>                          
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for box, use formula <strong><em>0px 0px 0px 0px</em></strong> where first value is for top margin, second for right, third for bottom and the last value is for left margin (default <em>0px 0px 0px 0px</em>)</td></tr> 
        <tr><td class="param">bg</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> background will be displayed (default set to <em>false</em>)</td></tr>
        <tr><td class="param">path</td> <td class="desc">[OPT] path to alternative background image (default empty string, no background will be used)</td></tr>
        <tr><td class="param">repeat</td> <td class="desc">[OPT] background repeat mode, can be set to <strong><em>repeat</em></strong>, 
        <strong><em>no-repeat</em></strong>, <strong><em>repeat-x</em></strong> or <strong><em>repeat-y</em></strong> (default <em>no-repeat</em>)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] background position, can be set to any CSS valid value (default <em>center top</em>)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] filename with extension from shortcodes folder [template path]/img/shortcodes, if you set this, path to given image file 
         will overwrite <code>path</code> parameter. By using this parameter you can place image directly into shortcodes folder and use only image name without the full path (default empty string, will be not set)</td></tr>              
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_rounded_box</code> <em>parameters</em>] your content here [<code>/dcs_rounded_box</code>]</p>                                                                                                                      
        </div>
        </div>         
        
        
         <!--dcs_gallery_box -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_gallery_box</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">This shortcode allows to display a simple gallery showcase (gallery must be first created with NextGEN Gallery plugin, and a page 
        that uses Gallery page template must be created too). A title of the gallery page is 
        displayed with a description for this gallery and a link to the gallery page. Description text for gallery can be added in NextGEN gallery options (choose your 
        gallery in Gallery > Manage Gallery section). Also, on the right side, preview thumbnail images are displayed from this gallery. Thanks to this shortcode you can 
        build for example a full gallery list. It can be also used as a single link placed in post or on full width page, that goes to one of the gallery pages.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">id</td> <td class="desc">page gallery ID, must be set to valid value - it is the ID number of gallery page (default not set)</td></tr>                             
        <tr><td class="param">size</td> <td class="desc">[OPT] can be set to <strong><em>small</em></strong> or <strong><em>big</em></strong>. Use 
            small size for pages with sidebar (e.g. standard post content) and columns 600px wide, for full width content use big size. In small size mode two image thumbs are displayed,
            in big size mode four image thumbs are displayed (default set to <em>big</em>)</td></tr>
        <tr><td class="param">random</td> <td class="desc">[OPT] if <strong><em>true</em></strong> random images will be displayed from gallery, if <strong><em>false</em></strong> 
            first 2/4 images will be displayed (default set to <em>true</em>)</td></tr>
        <tr><td class="param">group</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> thumbs are grouped for lightbox, if <strong><em>false</em></strong> 
            lightbox will display only single images when you click on thumbs (default set to <em>true</em>)</td></tr>  
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_gallery_box</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>         


         <!--dcs_heading -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_heading</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a custom heading text. Thanks to this shortcode you can set for headings proprties like text align, color and create a thin underline.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">align</td> <td class="desc">[OPT] text align, you can use three string values: <strong><em>left</em></strong>, <strong><em>center</em></strong> or <strong><em>right</em></strong> (default: <em>center</em>)</td></tr>                              
        <tr><td class="param">size</td> <td class="desc">[OPT] size from 1 to 6 (default set to 4)</td></tr>
        <tr><td class="param">line</td> <td class="desc">[OPT] if <strong><em>small</em></strong> thing short line will be displyed under heading, if <strong><em>big</em></strong> wide line will be displayed (default empty string, line will be not displayed)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] heading color, can be set to any CSS valid value for color, for example #FF0000 or red (default empty string, default heading color will be used)</td></tr> 
        <tr><td class="param">bottom</td> <td class="desc">[OPT] margin bottom in pixels (default not set, global CSS settings will be used)</td></tr> 
        <tr><td class="param">sub</td> <td class="desc">[OPT] subtitle (default empty string, will be not displayed)</td></tr>
        <tr><td class="param">fsize</td> <td class="desc">[OPT] font size in pixels (default empty string, size parameter will be used)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_heading</code> <em>parameters</em>] your content here [<code>/dcs_heading</code>]</p>                                                                                                                      
        </div>
        </div> 
        
         <!--dcs_info -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_info</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">This shortcode was designed for projects posts, but you can also use it in other places on your site. It creates text pairs "Name: Value" like 
        for example: Author: John Smith, Location: New York, Theme: Prestige Dark, Release Date: 15 November 2009. The second text in pair can also work as a link.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">name</td> <td class="desc">[OPT] name string (default set to <em>Name</em>)</td></tr>                              
        <tr><td class="param">value</td> <td class="desc">[OPT] value string (default set to <em>Value</em>)</td></tr> 
        <tr><td class="param">link</td> <td class="desc">[OPT] destination url string - if this parameter is used, the second text in pair works as a link (default empty string, will be not used)</td></tr> 
        <tr><td class="param">type</td> <td class="desc">[OPT] can be set to <strong><em>small</em></strong> or <strong><em>big</em></strong> (default set to <em>small</em>)</td></tr>  
        <tr><td class="param">postfix</td> <td class="desc">[OPT] separator after value (default set to single space)</td></tr>  
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_info</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>    
        
               
        <!--dcs_small -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_small</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Small text.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default set to <strong>#888888</strong>)</td></tr>                              
        <tr><td class="param">padding</td> <td class="desc">[OPT] padding, use formula <strong>0px 0px 0px 0px</strong> or any CSS padding valid value (default set to <strong>0px 0px 0px 0px</strong>)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>0px 0px 0px 0px</strong>)</td></tr> 
        <tr><td class="param">block</td> <td class="desc">[OPT] if set to <strong>true</strong> text will be displayed as block element (default set to <strong>false</strong>)</td></tr>
        <tr><td class="param">spacing</td> <td class="desc">[OPT] letters spacing in pixels, can be set to <strong>normal</strong> or integer value (default set to <strong>normal</strong>)</td></tr>
        <tr><td class="param">size</td> <td class="desc">[OPT] font size in pixels (default set to <strong>10</strong>)</td></tr> 
        <tr><td class="param">fheight</td> <td class="desc">[OPT] line height in pixels (default set to <strong>10</strong>)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] text align, can be set to <strong>left</strong>, <strong>center</strong> or <strong>right</strong> (default set to <strong>left</strong>)</td></tr> 
        
        <tr><td class="param">border</td> <td class="desc">[OPT] if <strong>true</strong> border will be displayed (default set to <strong>false</strong>)</td></tr>
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color, can be set to any CSS color valid value (default set to <strong>#202020</strong>)</td></tr>
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default set to <strong>1</strong>)</td></tr>
        <tr><td class="param">bstyle</td> <td class="desc">[OPT] border style, can be set to <strong>solid</strong>, <strong>dotted</strong> or <strong>dashed</strong> (default set to <strong>solid</strong>)</td></tr>
        <tr><td class="param">rounded</td> <td class="desc">[OPT] rounded corners radius in pixels, you can use value from 1 to 12 (default set to <strong>zero</strong>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_small</code> <em>parameters</em>] your content here [<code>/dcs_small</code>]</p>                                                                                                                      
        </div>
        </div>  
        

        <!--dcs_src -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_src</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates URL relative to [theme_path]/img/shortcodes/ folder.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">s</td> <td class="desc">path to file with extenstion relative to [theme_path]/img/shortcodes/ folder, must be set to valid value</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_src</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>                    
       
       
        <!--dcs_project_map -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_project_map</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays portfolio projects map. It is possible to choose displayed project categories, change the heading size, or choose the number of columns.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">columns</td> <td class="desc">[OPT] can be set to <strong><em>2</em></strong> or <strong><em>3</em></strong>, 
            use 2 columns for pages with sidebar and 3 columns for full width pages (default set to <em>3</em>)</td></tr>                              
        <tr><td class="param">cat</td> <td class="desc">[OPT] comma separated slug list of project categories to display, default empty string - projects from all categories will be displayed, 
            string format e.g <em>'category-name1,category-name2'</em></td></tr>
        <tr><td class="param">title</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> title will be displyed under popup image (default set to <em>false</em>)</td></tr>      
        <tr><td class="param">hsize</td> <td class="desc">[OPT] heading size, can be set to <strong><em>3</em></strong> or <strong><em>4</em></strong> 
            (default set to <em>4</em>)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] dot color, can be set to any CSS valid value for color property (default set to theme main text color)</td></tr>                            
        <tr><td class="param">ptop</td> <td class="desc">[OPT] top padding in pixels (default set to zero)</td></tr>
        <tr><td class="param">pbottom</td> <td class="desc">[OPT] bottom padding in pixels (default set to zero)</td></tr>
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_project_map</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>         

        <!--dcs_project_top -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_project_top</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays the top part of the project post page (project post standard information). This shortcode should be used only in project post content. You can use it for example to change the layout of project posts when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_project_top</code>]</p>                                                                                                                      
        </div>
        </div> 
        
        <!--dcs_project_author -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_project_author</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays project author part, should be used only in project post content. You can use it for example to change the layout of project post when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_project_author</code>]</p>                                                                                                                      
        </div>
        </div>          
        
        <!--dcs_project_bottom -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_project_bottom</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays project bottom part, should be used only in project post content. You can use it for example to change the layout of project post when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">voting</td> <td class="desc">[OPT] if <strong><em>true</em></strong> post voting will be displayed, if <strong><em>false</em></strong> voting will be hidden (default set to <em>true</em>)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_project_bottom</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>           
        
        
        <!--dcs_sicon -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_sicon</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to display an inline icon in text. An icon image name with extension is needed only, but icon should be uploaded to [theme path]/img/shortcodes/ folder.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">name</td> <td class="desc">icon name with extension, should be set to valid value</td></tr>
        <tr><td class="param">tip</td> <td class="desc">[OPT] string displayed as a tip information (default empty string, tip will be not displayed)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] tip possition, can be set to <strong><em>left</em></strong>, <strong><em>right</em></strong>, <strong><em>top</em></strong> or <strong><em>bottom</em></strong> (default <em>top</em>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url path for link (default empty string, will be not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] can be set to <strong><em>_self</em></strong> or <strong><em>_blank</em></strong>, if set to blank destinatin URL will open in new browser tab/window (default <em>_self</em>)</td></tr>                    
        </table>
        
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Remember that you should use icons 16x16 pixels <span class="cms-help-exclamation-icon"></span></p>          
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_sicon</code> <em>parameters</em>]</p>
        <p class="cms-help-desc">[<code>dcs_sicon</code> name="icon_name"]</p>                                                                                                                       
        </div>
        </div>          
        
        <!--dcs_simple_gallery -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_simple_gallery</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Simple gallery slider with thumbs located inside gallery box - by default thumbs are located in the bottom part of the slider and are 
        visible when you hover the mouse over the slider. You must manully write all paths for full images, thumbs will be generated automatically. When setting up the width
        for the slider you must remember also - the maximum width for page with sidebar is 600px, and the maximum width for full width page is 920px.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">width</td> <td class="desc">[OPT] simple gallery slider width in pixels (default <em>600</em> pixels)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] simple gallery slider height in pixels (default <em>300</em> pixels)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] short description displayed under gallery - it is one description for all images (default empty string, will be not displayed)</td></tr> 
        <tr><td class="param">align</td> <td class="desc">[OPT] gallery description text align, you can use three string values: <strong><em>left</em></strong>, 
            <strong><em>center</em></strong> or <strong><em>right</em></strong> (default: text is aligned to the <em>left</em>)</td></tr>
        <tr><td class="param">ts</td> <td class="desc">[OPT] thumb size in pixels (default set to 50 pixels)</td></tr>
        <tr><td class="param">trans</td> <td class="desc">[OPT] transition mode, can be set to <strong><em>none</em></strong>, <strong><em>fade</em></strong> or
        <strong><em>slide</em></strong> (default set to <em>fade</em>)</td></tr>          
        </table>
        
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Remember to add char '<strong>;</strong>' after every image path <span class="cms-help-exclamation-icon"></span></p>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_simple_gallery</code> <em>parameters</em>] your content here [<code>/dcs_simple_gallery</code>]</p>
        <p class="cms-help-desc">[<code>dcs_simple_gallery</code> <em>parameters</em>]<br />  
        http://www.digitalcavalry.com/2010/04/image1.jpg;<br />
        http://www.digitalcavalry.com/2010/04/image2.jpg;<br />
        http://www.digitalcavalry.com/2010/04/image3.jpg;<br />        
        [<code>/dcs_simple_gallery</code>]</p>                                                                                                                                 
        </div>
        </div>         

        <!--dcs_simple_gallery_thumbs -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_simple_gallery_thumbs</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Simple gallery slider with thumbs located outside gallery box (below the gallery description text). You must manully write all paths for 
        full images, thumbs will be generated automatically. When setting up the width for the slider you must remember also - the maximum width for page with sidebar is 600px, and the maximum 
        width for full width page is 920px.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">width</td> <td class="desc">[OPT] gallery width in pixels (default <em>600</em> pixels)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] gallery height in pixels (default <em>300</em> pixels)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] short description displayed under gallery - it is one description for all images (default empty string, will be not displayed)</td></tr> 
        <tr><td class="param">align</td> <td class="desc">[OPT] gallery description text align, you can use three string values: <strong><em>left</em></strong>, 
            <strong><em>center</em></strong> or <strong><em>right</em></strong> (default: text is aligned to the <em>left</em>)</td></tr>
        <tr><td class="param">ts</td> <td class="desc">[OPT] thumb size in pixels (default set to 40 pixels)</td></tr>
        <tr><td class="param">trans</td> <td class="desc">[OPT] transition mode, can be set to <strong><em>none</em></strong>, <strong><em>fade</em></strong> or
        <strong><em>slide</em></strong> (default set to <em>fade</em>)</td></tr>         
        </table>
        
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Remember to add char '<strong>;</strong>' after every image path <span class="cms-help-exclamation-icon"></span></p>            
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_simple_gallery_thumbs</code> <em>parameters</em>] your content here [<code>/dcs_simple_gallery_thumbs</code>]</p>                                                                                                                        
        <p class="cms-help-desc">[<code>dcs_simple_gallery_thumbs</code> <em>parameters</em>]<br />  
        http://www.digitalcavalry.com/2010/04/image1.jpg;<br />
        http://www.digitalcavalry.com/2010/04/image2.jpg;<br />
        http://www.digitalcavalry.com/2010/04/image3.jpg;<br />         
        [<code>/dcs_simple_gallery_thumbs</code>]</p> 
        </div>
        </div>         
        
        
        <!--dcs_simple_gallery_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_simple_gallery_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Works almost the same as <code>dcs_simple_gallery</code> shortcode, but the images are not defined one by one, but a NextGEN Gallery plugin is used
        to create the whole gallery. It is a simple gallery slider with thumbs located inside gallery box - by default thumbs are located in the bottom part of the slider and are 
        visible when you hover the mouse over the slider. You must create a gallery in NextGEN Gallery options and then, for this shortcode you must just add a parameter with ID 
        of this gallery. You can also use parameters that will for example define the number of images or choose the transition mode. When setting up the width for the slider 
        you must remember also - the maximum width for page with sidebar is 600px, and the maximum width for full width page is 920px.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">next gen gallery ID, should be set to valid value. You will find the ID number in Gallery > Manage Gallery section (on the left side of gallery titles) </td></tr> 
        <tr><td class="param">count</td> <td class="desc">[OPT] number of images displayed from gallery (default set to <em>6</em>) </td></tr> 
        <tr><td class="param">random</td> <td class="desc">[OPT] if <strong><em>true</em></strong> random images will be displayed, if <strong><em>false</em></strong> 
            first <code>count</code> images will be displayed (default set to <strong><em>true</em></strong>) </td></tr> 
        <tr><td class="param">width</td> <td class="desc">[OPT] gallery width in pixels (default <em>600</em> pixels)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] gallery height in pixels (default <em>300</em> pixels)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] short description displayed under gallery - it is one description for all images (default empty string, will be not displayed)</td></tr> 
        <tr><td class="param">align</td> <td class="desc">[OPT] gallery description text align, you can use three string values: <strong><em>left</em></strong>, 
            <strong><em>center</em></strong> or <strong><em>right</em></strong> (default: text is aligned to the <em>left</em>)</td></tr>
        <tr><td class="param">ts</td> <td class="desc">[OPT] thumb size in pixels (default set to 50 pixels)</td></tr>
        <tr><td class="param">trans</td> <td class="desc">[OPT] transition mode, can be set to <strong><em>none</em></strong>, <strong><em>fade</em></strong> or
        <strong><em>slide</em></strong> (default set to <em>fade</em>)</td></tr>          
        </table>             
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_simple_gallery_ngg</code> <em>parameters</em>]</p>                                                                                                                               
        </div>
        </div>         
        
        
        <!--dcs_simple_gallery_thumbs_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_simple_gallery_thumbs_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Works almost the same as <code>dcs_simple_gallery_thumbs</code> shortcode, but the images are not defined one by one, but a NextGEN Gallery plugin is used
        to create the whole gallery. It is a simple gallery slider with thumbs located outside gallery box (below the gallery description text). To use this shortcode, you must create a gallery in 
        NextGEN Gallery options and then, for this shortcode you must just add a parameter with ID of this gallery. You can also use parameters that will for example define the number of images 
        or choose the transition mode. When setting up the width for the slider you must remember also - the maximum width for page with 
        sidebar is 600px, and the maximum width for full width page is 920px.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">next gen gallery ID, should be set to valid value. You will find the ID number in Gallery > Manage Gallery section (on the left side of gallery titles) </td></tr> 
        <tr><td class="param">count</td> <td class="desc">[OPT] number of images displayed from gallery (default set to <em>6</em>) </td></tr> 
        <tr><td class="param">random</td> <td class="desc">[OPT] if <strong><em>true</em></strong> random images will be displayed, if <strong><em>false</em></strong> 
            first <code>count</code> images will be displayed (default set to <strong><em>true</em></strong>) </td></tr> 
        <tr><td class="param">width</td> <td class="desc">[OPT] gallery width in pixels (default <em>600</em> pixels)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] gallery height in pixels (default <em>300</em> pixels)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] short description displayed under gallery - it is one description for all images (default empty string, will be not displayed)</td></tr> 
        <tr><td class="param">align</td> <td class="desc">[OPT] gallery description text align, you can use three string values: <strong><em>left</em></strong>, 
            <strong><em>center</em></strong> or <strong><em>right</em></strong> (default align to <em>left</em>)</td></tr>
        <tr><td class="param">ts</td> <td class="desc">[OPT] thumb size in pixels (default set to 40 pixels)</td></tr>
        <tr><td class="param">trans</td> <td class="desc">[OPT] transition mode, can be set to <strong><em>none</em></strong>, <strong><em>fade</em></strong> or
        <strong><em>slide</em></strong> (default set to <em>fade</em>)</td></tr>
       
        </table>             
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_simple_gallery_thumbs_ngg</code> <em>parameters</em>]</p>                                                                                                                               
        </div>
        </div>         
        
       
        <!--dcs_post_top -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_post_top</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays post top part, should be used only for (Blog, Post Portfolio) post content. You can use it for example to change the 
        layout of post when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_post_top</code>]</p>                                                                                                                      
        </div>
        </div> 
        
        <!--dcs_post_author -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_post_author</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays post information about author, should be used only for (Blog, Post Portfolio) post content. You can use it for example to change the 
        layout of post when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_post_author</code>]</p>                                                                                                                      
        </div>
        </div>         
        
        <!--dcs_post_bottom -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_post_bottom</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays post bottom part, should be used only for (Blog, Post Portfolio) post content. You can use it for example to change the 
        layout of post when custom content option is enabled for this post.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_post_bottom</code> <em>parameters</em>]</p>                                                                                                                      
        </div>
        </div>         
        
        <!--dcs_news_top -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_news_top</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays news top part, should be used only for news content. You can use it for example to change the 
        layout of news when custom content option is enabled for this news.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_news_top</code>]</p>                                                                                                                      
        </div>
        </div> 
        
        <!--dcs_news_author -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_news_author</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays news information about author, should be used only for news content. You can use it for example to change the 
        layout of news when custom content option is enabled for this news.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_news_author</code>]</p>                                                                                                                      
        </div>
        </div>         
        
        <!--dcs_news_bottom -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_news_bottom</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays news bottom part, should be used only for news content. You can use it for example to change the 
        layout of news when custom content option is enabled for this news.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_news_bottom</code>]</p>                                                                                                                      
        </div>
        </div>          
        
        <!--dcs_wp_pagination -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_wp_pagination</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays wordpress pagination line - works only when you use <code>&lt;!--nextpage--&gt;</code> spliter somewhere inside WP post/page content editor to split content into pages.
        By default, in all Prestige page templates, pagination is displayed when you use page spliter <code>&lt;!--nextpage--&gt;</code>, but you can turn it off.
        Using this shortcode you can place tha pagination on page even if it is turned off in settings, you can use it for example to place pagination at the top of the page, or to place 
        more than one pagination lines on one page (e.g. on top and on the bottom).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">No parameters</td></tr>           
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_wp_pagination</code>]</p>                                                                                                                      
        </div>
        </div>           

        <h6 class="cms-h6" style="margin-top:40px;">Unordered and Ordered Lists</h6><hr class="cms-hr"/> 
        
        <!--dcs_ul -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a normal unordered list (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">type</td> <td class="desc">[OPT] list type (any CSS valid value for property <em>list-style-type</em>), 
        use <strong><em>none</em></strong> to disable list item marker (default set to <em>dot</em>)</td></tr> 
        <tr><td class="param">pos</td> <td class="desc">[OPT] can be set to <strong><em>inside</em></strong> or <strong><em>outside</em></strong> (default set to <em>inside</em>)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul</code> <em>parameters</em>] your content here [<code>/dcs_ul</code>]</p> 
        <p class="cms-help-desc">[<code>dcs_ul</code> type="square"]<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        [<code>/dcs_ul</code>]</p>         
                                                                                                                              
        </div>
        </div> 
        
        <!--dcs_ul_check -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_check</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered check list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">var</td> <td class="desc">[OPT] variation number decides about icon displayed as item marker, you can use value from 2 to 9 (default not set, first variation will be used)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_check</code> <em>parameters</em>] your content here [<code>/dcs_ul_check</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_check</code> left="20" var="2"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                        
        </div>
        </div>         
        
        <!--dcs_ul_star -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_star</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered star list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">var</td> <td class="desc">[OPT] variation number decides about icon displayed as item marker, you can use value from 2 to 3 (default not set, first variation will be used)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_star</code> <em>parameters</em>] your content here [<code>/dcs_ul_star</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_star</code> left="20" var="2"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div>           

        <!--dcs_ul_arrow -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_arrow</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered arrow list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">var</td> <td class="desc">[OPT] variation number decides about icon displayed as item marker, you can use value from 2 to 4 (default not set, first variation will be used)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_arrow</code> <em>parameters</em>] your content here [<code>/dcs_ul_arrow</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_arrow</code> left="20" var="2"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div>  


        <!--dcs_ul_exception -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_exception</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered exception list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">var</td> <td class="desc">[OPT] variation number decides about icon displayed as item marker, you can use value from 2 to 4 (default not set, first variation will be used)</td></tr> 
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_exception</code> <em>parameters</em>] your content here [<code>/dcs_ul_exception</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_exception</code> left="20" var="2"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div> 

        <!--dcs_ul_dot_gold -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_dot_gold</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered gold dot list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_dot_gold</code> <em>parameters</em>] your content here [<code>/dcs_ul_dot_gold</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_dot_gold</code> left="20"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div> 

        <!--dcs_ul_dot_silver -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_dot_silver</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered silver dot list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_dot_silver</code> <em>parameters</em>] your content here [<code>/dcs_ul_dot_silver</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_dot_silver</code> left="20"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div> 

        <!--dcs_ul_dot_grey -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_dot_grey</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered grey dot list.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_dot_grey</code> <em>parameters</em>] your content here [<code>/dcs_ul_dot_grey</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ul_dot_grey</code> left="20"]<br /> 
        &lt;ul&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;First list item&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Second list item&lt;/li&gt;<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Third list item&lt;/li&gt;<br /> 
        &lt;/ul&gt;<br /> 
        [<code>/dcs_ul_check</code>]</p>                                                                                                                      
        </div>
        </div> 
               
        <!--dcs_ul_menu -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ul_menu</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an unordered list in menu style.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ul_menu</code> <em>parameters</em>] your content here [<code>/dcs_ul_menu</code>]</p> 
        
        <p class="cms-help-desc">[<code>dcs_ul_menu</code> <em>parameters</em>]<br /> 
            &lt;li&gt;&lt;a href="#"&gt;link&lt;/a&gt; (some additional text)&lt;/li&gt;<br />
            &lt;li&gt;&lt;a href="#"&gt;link&lt;/a&gt;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;sub link&lt;/a&gt;&lt;/li&gt;<br />
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;&lt;/li&gt;<br />
            &lt;li&gt;&lt;a href="#"&gt;link&lt;/a&gt;&lt;/li&gt;<br />                
            &lt;li&gt;&lt;a href="#"&gt;link&lt;/a&gt;&lt;/li&gt;<br /> 
        [<code>/dcs_ul_menu</code>]</p>                                                                                                                      
        </div>
        </div>                
                                                                     
        <!--dcs_ol -->                                                        
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows you to create an ordered list of any type.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        <tr><td class="param">type</td> <td class="desc">[OPT] CSS list type eg. square, disc (default set <em>disc</em>)</td></tr> 
        <tr><td class="param">color</td> <td class="desc">[OPT] item marker color (default set to <em>#FFE570</em>)</td></tr> 
        <tr><td class="param">textcolor</td> <td class="desc">[OPT] text color (default set to <em>#FFFFFF</em>)</td></tr>
        <tr><td class="param">bg</td> <td class="desc">[OPT] if <strong><em>true</em></strong> grey gradient background will be displayed for each list item (default set to <em>true</em>)</td></tr>
        <tr><td class="param">size</td> <td class="desc">[OPT] font size in pixels (default empty string, will be not set, the default paragraph font size will be used)</td></tr>
        <tr><td class="param">align</td> <td class="desc">[OPT] text align, can be set to <strong><em>left</em></strong>, <strong><em>center</em></strong> or <strong><em>right</em></strong> (default set to <em>true</em>)</td></tr>    
        </table>
       
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Remember to add char <strong><em>;</em></strong> after every text line <span class="cms-help-exclamation-icon"></span> </p>         
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol</code> <em>parameters</em>] your content here [<code>/dcs_ol</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol</code> type="circle" color="#FFE570" textcolor="#00FF00" bg="true"]<br /> 
        &nbsp;&nbsp;&nbsp;&nbsp;First item / square list item example text;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;Second item / square list item example text;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;Third item / square list item example text;<br />        
        [<code>/dcs_ol</code>]</p>                                                                                                                      
        </div>
        </div>                 
               
        <!--dcs_ol_gold -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_gold</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an ordered list with gold numbers.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_gold</code> <em>parameters</em>] your content here [<code>/dcs_ol_gold</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_gold</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_gold</code>]</p>                                                                                                                      
        </div>
        </div>         
     
        <!--dcs_ol_silver -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_silver</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an ordered list with silver numbers.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_silver</code> <em>parameters</em>] your content here [<code>/dcs_ol_silver</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_silver</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_silver</code>]</p>                                                                                                                      
        </div>
        </div>   
        
        
        <!--dcs_ol_roman_gold -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_roman_gold</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an ordered list with roman gold numbers.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_roman_gold</code> <em>parameters</em>] your content here [<code>/dcs_ol_roman_gold</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_roman_gold</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_roman_gold</code>]</p>                                                                                                                      
        </div>
        </div>         
     
        <!--dcs_ol_roman_silver -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_roman_silver</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates an ordered list with roman silver numbers.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_roman_silver</code> <em>parameters</em>] your content here [<code>/dcs_ol_roman_silver</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_roman_silver</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_roman_silver</code>]</p>                                                                                                                      
        </div>
        </div>                 
        

        <!--dcs_ol_greek_gold -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_greek_gold</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a greek alphabet ordered list with gold order letters.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_greek_gold</code> <em>parameters</em>] your content here [<code>/dcs_ol_greek_gold</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_greek_gold</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_greek_gold</code>]</p>                                                                                                                      
        </div>
        </div>         
     
        <!--dcs_ol_greek_silver -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ol_greek_silver</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a greek alphabet ordered list with silver order letters.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">left</td> <td class="desc">[OPT] left margin in pixels (default set to 15px)</td></tr>            
        </table>
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ol_greek_silver</code> <em>parameters</em>] your content here [<code>/dcs_ol_greek_silver</code>]</p>
        <p class="cms-help-desc">[<code>dcs_ol_greek_silver</code> left="20"]<br />
        &lt;ol&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;First item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Second item example text&lt;/p&gt;&lt;/li&gt;<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;p&gt;Third item example text&lt;/p&gt;&lt;/li&gt;<br />
        &lt;/ol&gt;<br />
        [<code>/dcs_ol_greek_silver</code>]</p>                                                                                                                      
        </div>
        </div>         
        
        <h6 class="cms-h6" style="margin-top:40px;">Next Gen Gallery</h6><hr class="cms-hr"/> 
        
        <!--dcs_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to display thumbs from gallery created by NextGEN Gallery plugin. You can set the number of thumbs, the size of thumbs, and a list of other parameters.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">the ID number of a gallery created with NextGEN Gallery plugin, must be set to valid value (you can find galleries ID's in NGG admin panel in <strong>Manage Gallery</strong> tab)</td></tr>            
        <tr><td class="param">count</td> <td class="desc">[OPT] number of displayed thumbs, must be greater than zero (default 10)</td></tr> 
        <tr><td class="param">width</td> <td class="desc">[OPT] thumb width in pixels (default 80)</td></tr> 
        <tr><td class="param">height</td> <td class="desc">[OPT] thumb height in pixels (default 80)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for thumb, use format <strong>0px 15px 15px 0px</strong> what 
            means (margin top, right, bottom, left) or any other valid format for CSS margin property (default <em>0px 15px 15px 0px</em>)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] if <strong>true</strong> a small frame is displayed arround the image (default <em>false</em>)</td></tr>
        <tr><td class="param">random</td> <td class="desc">[OPT] set it to <strong>true</strong> if you want display random images from gallery, or 
            <strong>false</strong> to display images in the same order as in gallery list (default <em>false</em>)</td></tr> 
        <tr><td class="param">bshow</td> <td class="desc">[OPT] option allows to turn off/on thumb border, <strong>true</strong> or <strong>false</strong>, default true (default <em>true</em>)</td></tr> 
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default one pixel width)</td></tr> 
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color (default set to white, #FFFFFF)</td></tr>             
        </table>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ngg</code> <em>parameters</em>] </p>
        <p class="cms-help-desc">[<code>dcs_ngg</code> git="1" width="50" height="50" count="25"] </p>
        </div>
        </div>
        
        <!--dcs_ngg_single -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ngg_single</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a thumb gallery in similar way as the dcs_ngg shortcode, but with this one you can display picture thumbs selected 
        by ID's from all NGG galleries. Image ID numbers you will find on images list - it is available when you enter the gallery in NextGEN Gallery options (Manage Gallery).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">list</td> <td class="desc">list of pictures ID's e.g. "13,1,24,53,93,234,3,54", must be set to a valid value (default empty string)</td></tr>            
        <tr><td class="param">width</td> <td class="desc">[OPT] thumb width in pixels (default 80)</td></tr> 
        <tr><td class="param">height</td> <td class="desc">[OPT] thumb height in pixels (default 80)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for thumb, use format <strong>0px 15px 15px 0px</strong> which 
            means (margin top, right, bottom, left), or you can use any other valid format for CSS margin property (default <em>0px 15px 15px 0px</em>)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] if <strong>true</strong> a small frame is displayed around image (default <em>false</em>)</td></tr>
        <tr><td class="param">exclude</td> <td class="desc">[OPT] exclude images excluded in NGG admin panel, <strong>true</strong> or <strong>false</strong> (default <em>false</em>)</td></tr> 
        <tr><td class="param">bshow</td> <td class="desc">[OPT] show border, <strong>true</strong> or <strong>false</strong>, default true (default <em>true</em>)</td></tr> 
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default one pixel width)</td></tr> 
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color (default set to white, #FFFFFF)</td></tr>             
        <tr><td class="param">group</td> <td class="desc">[OPT] name of lightbox group or empty string (default empty string, not grouped)</td></tr>  
        </table>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ngg_single</code> <em>parameters</em>] </p>                                                                                                                      
        </div>
        </div>                     
              
        <!--dcs_ngg_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ngg_last</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a thumb gallery in similar way as the dcs_ngg shortcode, but with this one you can display the most recent added images to NGG. 
        You can choose to select images from all galleries or choose one gallery by ID parameter.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">[OPT] use this parameter to select a NGG gallery by ID. If parameter is not used - images from all galleries will be taken into account (default set to zero, all galleries will be used)</td></tr>            
        <tr><td class="param">count</td> <td class="desc">[OPT] number of images to display (default is set to 10)</td></tr> 
        <tr><td class="param">page</td> <td class="desc">[OPT] thumbs page (default set to zero with means first page) </td></tr> 
        <tr><td class="param">width</td> <td class="desc">[OPT] thumb width in pixels (default 80)</td></tr> 
        <tr><td class="param">height</td> <td class="desc">[OPT] thumb height in pixels (default 80)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for thumb, use format <strong>0px 15px 15px 0px</strong> which 
            means (margin top, right, bottom, left) or any other valid format for CSS margin property (default <em>0px 15px 15px 0px</em>)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] if <strong>true</strong> small frame is displayed around thumbs (default <em>false</em>)</td></tr>
        <tr><td class="param">exclude</td> <td class="desc">[OPT] exclude images excluded in NGG admin panel, <strong>true</strong> or <strong>false</strong> (default <em>false</em>)</td></tr> 
        <tr><td class="param">bshow</td> <td class="desc">[OPT] show border, <strong>true</strong> or <strong>false</strong>, default true (default <em>true</em>)</td></tr> 
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default one pixel width)</td></tr> 
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color (default set to white, #FFFFFF)</td></tr>             
        <tr><td class="param">group</td> <td class="desc">[OPT] name of lightbox group or empty string (default empty string, not grouped)</td></tr>  
        </table>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ngg_last</code> <em>parameters</em>] </p>                                                                                                                      
        </div>
        </div>           
        
        <!--dcs_ngg_random -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_ngg_random</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a thumb gallery in similar way as the dcs_ngg shortcode, but with this one you can display a random set of images from NGG galleries. 
        You can choose to select images from all galleries or choose one gallery by ID parameter.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">[OPT] use this parameter to select a NGG gallery by ID. If parameter is not used - images from all galleries will be taken into account (default set to zero, all galleries will be used)</td></tr>            
        <tr><td class="param">count</td> <td class="desc">[OPT] number of images to display (default 10)</td></tr> 
        <tr><td class="param">width</td> <td class="desc">[OPT] thumb width in pixels (default 80)</td></tr> 
        <tr><td class="param">height</td> <td class="desc">[OPT] thumb height in pixels (default 80)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] margin for thumb, use format <strong>0px 15px 15px 0px</strong> which 
            means (margin top, right, bottom, left) or any other valid format for CSS margin property (default <em>0px 15px 15px 0px</em>)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] if <strong>true</strong> small frame is displayed around image (default <em>false</em>)</td></tr>
        <tr><td class="param">bshow</td> <td class="desc">[OPT] show border, <strong>true</strong> or <strong>false</strong>, default true (default <em>true</em>)</td></tr> 
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default one pixel width)</td></tr> 
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color (default set to white, #FFFFFF)</td></tr>             
        <tr><td class="param">group</td> <td class="desc">[OPT] name of lightbox group or empty string (default empty string, not grouped)</td></tr>  
        </table>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_ngg_random</code> <em>parameters</em>] </p>                                                                                                                      
        </div>
        </div>         
        

        <!--dcs_chain_gallery -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_chain_gallery</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a special chain gallery that works similar to homepage chain slider, it will display a random set of images from NGG galleries. 
        You can choose to select images from all galleries or choose one gallery by ID parameter. It can be customized by the list of parameters described below.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">gid</td> <td class="desc">this parameter should be set. Use it to select a NGG gallery by ID, for example gid="3". If parameter is not used - images 
        from all galleries will be taken into account, but it will be displayed only if random parameter is set to <strong>true</strong> and number parameter is defined (number 
        parameter value must be bigger than zero). 
        (default not set)</td></tr>            
        <tr><td class="param">random</td> <td class="desc">[OPT] display random images, can be set to <strong>true</strong> or <strong>false</strong>, remember to set number 
        parameter (default <em>true</em>)</td></tr>
        <tr><td class="param">number</td> <td class="desc">[OPT] number of images to display, if zero all images are displayed, this parameter must be set for random images 
        (default zero)</td></tr>
        
        <tr><td class="param">set</td> <td class="desc">[OPT] pictures IDs to show e.g '34,2,54,8' (default not set)</td></tr> 
        <tr><td class="param">w</td> <td class="desc">[OPT] slide width in pixels (default 600 px)</td></tr>  
        <tr><td class="param">h</td> <td class="desc">[OPT] slide height in pixels (default 270 px)</td></tr> 
        <tr><td class="param">tw</td> <td class="desc">[OPT] thumb width in pixels (default 50 px)</td></tr> 
        <tr><td class="param">th</td> <td class="desc">[OPT] thumb height in pixels (default 50 px)</td></tr>                 
         
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] thumb border color, can be set to any CSS valid value for color property (default #FFCC00)</td></tr>  
        <tr><td class="param">trans</td> <td class="desc">[OPT] can be set to <strong>none</strong>, <strong>slide</strong> or <strong>fade</strong> (default <em>fade</em>)</td></tr> 
        <tr><td class="param">autoplay</td> <td class="desc">[OPT] slider auto play, can be set to <strong>true</strong> or <strong>false</strong> (default <em>true</em>)</td></tr>
        <tr><td class="param">desc</td> <td class="desc">[OPT] show slides description, can be set to <strong>true</strong> or <strong>false</strong> (default <em>true</em>)</td></tr>  
        <tr><td class="param">name</td> <td class="desc">[OPT] show slides name, can be set to <strong>true</strong> or <strong>false</strong> (default <em>false</em>)</td></tr>
        <tr><td class="param">size</td> <td class="desc">[OPT] slide name size, can be set to value from 1 to 6 (default <em>3</em>)</td></tr>  
        
        <tr><td class="param">pageid</td> <td class="desc">[OPT] page ID for link, if defined this link works for all slides in chain gallery (default not set)</td></tr>  
        <tr><td class="param">url</td> <td class="desc">[OPT] custom manual URL address for link, if defined this link works for all slides in chain gallery (default not set)</td></tr> 
        <tr><td class="param">shadow</td> <td class="desc">[OPT] displays a small shadow for chain gallery slider, can be set to <strong>true</strong> or <strong>false</strong> (default <em>false</em>)</td></tr>
           
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong>, <strong>right</strong> or <strong>none</strong> (default set to <strong>none</strong>)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] slider margins, use formula <strong>0px 0px 0px 0px</strong> or any valid CSS value for margin property (default <strong>0px 0px 15px 0px</strong>)</td></tr>            
           
        </table>        
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_chain_gallery</code> <em>parameters</em>] </p>                                                                                                                      
        </div>
        </div>         
        
        
        
        
        <h6 class="cms-h6" style="margin-top:40px;">Columns</h6><hr class="cms-hr"/>
        <span class="cms-span-10">Column shortcodes give you full control over page content construction. These shortcodes don't have any parameters and for every column you must 
        create an openning tag and closing tag. You can use them for example to divide the page into two columns, or three columns etc. A full list of examples for how to use these
        shortcodes you will find also in Prestige Dark theme Live Preview, on <strong>Column Shortcodes</strong> page. Also, if you want to insert content after column contruction, you should first use 
        one of the dividers shortcode or dcs_clearboth shortcode.</span><br /><br />
        
        <span class="cms-span-10">Content area on full width page is 920px wide, content area on page with sidebar is 600px wide. Every column shortcode was named in relation to a 
        full width page, for example: <code>dcs_one_half</code> shortcode means a half size of full width content, and <code>dcs_one_fourth</code> means a 1/4 size of full width content (in fact
        the width of each column is a bit smaller because a little space must exist between columns).</span>
        <div style="height:33px;"></div> 
        
        <!--dcs_one_half -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_half <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates one-half column. Column width: 440px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_half</code> <em>parameters</em>] your content here [<code>/dcs_one_half</code>]</p>                                                                                                                      
        </div>
        </div>           

        <!--dcs_one_half_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_half_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last one-half column. Column width: 440px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_half_last</code> <em>parameters</em>] your content here [<code>/dcs_one_half_last</code>]</p>                                                                                                                      
        </div>
        </div>    
         
        
        
        <!--dcs_one_third -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_third <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates one-third column. Column width: 280px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_third</code> <em>parameters</em>] your content here [<code>/dcs_one_third</code>]</p>                                                                                                                      
        </div>
        </div>         
    
        <!--dcs_one_third_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_third_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last one-third column. Column width: 280px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_third_last</code> <em>parameters</em>] your content here [<code>/dcs_one_third_last</code>]</p>                                                                                                                      
        </div>
        </div>      
        
        
        <!--dcs_two_third -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_two_third <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates two-third column. Columns width: 600px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_two_third</code> <em>parameters</em>] your content here [<code>/dcs_two_third</code>]</p>                                                                                                                      
        </div>
        </div>        
        
        
        <!--dcs_two_third_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_two_third_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last two-third column. Column width: 600px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_two_third_last</code> <em>parameters</em>] your content here [<code>/dcs_two_third_last</code>]</p>                                                                                                                      
        </div>
        </div>          

        <!--dcs_one_fourth -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_fourth <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates one-fourth column. Column width: 200px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_fourth</code> <em>parameters</em>] your content here [<code>/dcs_one_fourth</code>]</p>                                                                                                                      
        </div>
        </div>  
        
        <!--dcs_one_fourth_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_fourth_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last one-fourth column. Column width: 200px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_fourth_last</code> <em>parameters</em>] your content here [<code>/dcs_one_fourth_last</code>]</p>                                                                                                                      
        </div>
        </div>          
        

        <!--dcs_three_fourth -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_three_fourth <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates three-fourth column. Column width: 680px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_three_fourth</code> <em>parameters</em>] your content here [<code>/dcs_three_fourth</code>]</p>                                                                                                                      
        </div>
        </div>          
                
        <!--dcs_three_fourth_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_three_fourth_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last three-fourth column. Column width: 680px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_three_fourth_last</code> <em>parameters</em>] your content here [<code>/dcs_three_fourth_last</code>]</p>                                                                                                                      
        </div>
        </div>          
        
        
        <!--dcs_one_fifth -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_fifth <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates one-fifth column. Column width: 152px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_fifth</code> <em>parameters</em>] your content here [<code>/dcs_one_fifth</code>]</p>                                                                                                                      
        </div>
        </div>  
        
        <!--dcs_one_fifth_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_one_fifth_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last one-fifth column. Column width: 152px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_one_fifth_last</code> <em>parameters</em>] your content here [<code>/dcs_one_fifth_last</code>]</p>                                                                                                                      
        </div>
        </div>           
        
        <!--dcs_three_fifth -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_three_fifth <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates three-fifth column. Column width: 536px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_three_fifth</code> <em>parameters</em>] your content here [<code>/dcs_three_fifth</code>]</p>                                                                                                                      
        </div>
        </div>  
        
        <!--dcs_three_fifth_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_three_fifth_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last three-fifth column. Column width: 536px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_three_fifth_last</code> <em>parameters</em>] your content here [<code>/dcs_three_fifth_last</code>]</p>                                                                                                                      
        </div>
        </div>         
        
        
        <!--dcs_four_fifth -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_four_fifth <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates four-fifth column. Column width: 728px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
        
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_four_fifth</code> <em>parameters</em>] your content here [<code>/dcs_four_fifth</code>]</p>                                                                                                                      
        </div>
        </div>  
        
        <!--dcs_four_fifth_last -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_four_fifth_last <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates last four-fifth column. Column width: 728px (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">-</td> <td class="desc">no parameters</td></tr>            
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_four_fifth_last</code> <em>parameters</em>] your content here [<code>/dcs_four_fifth_last</code>]</p>                                                                                                                      
        </div>
        </div>         
        
         <!--dcs_column -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_column <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Creates a column of any width and any margin-right size. (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">width</td> <td class="desc">[OPT] column width in pixels (default set to 200)</td></tr>            
        <tr><td class="param">mright</td> <td class="desc">[OPT] right margin in pixels (default set to 40)</td></tr>
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels (default set to zero)</td></tr>            
        <tr><td class="param">margin</td> <td class="desc">[OPT] column margins, use formula <strong>0px 0px 0px 0px</strong> (top, right, bottom, left) or any CSS valid value for margin property, if set will overwrite <code>mleft</code> and <code>mright</code> parameters (default not set)</td></tr> 
        <tr><td class="param">float</td> <td class="desc">[OPT] can be set to <strong>left</strong> or <strong>right</strong> (default set to <strong>left</strong>)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS valid value for color property (default no set)</td></tr> 
        <tr><td class="param">rounded</td> <td class="desc">[OPT] radius of rounded corners, you can use value from 1 to 12 (default not set)</td></tr> 
        <tr><td class="param">align</td> <td class="desc">[OPT] text align, can be set to <strong>left</strong>, <strong>right</strong> or <strong>center</strong> (default not set)</td></tr> 
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS color valid value (default not set)</td></tr>
        <tr><td class="param">bg</td> <td class="desc">[OPT] full backgroud image url (default not set)</td></tr>  
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] parameter allows you to set a background using filename with extension from shortcodes folder 
        [template path]/img/shortcodes. If you will set this parameter, this image path will overwrite <strong>bg</strong> parameter (default empty string, will be not used)</td></tr> 
        <tr><td class="param">bgrepeat</td> <td class="desc">[OPT] background repeat mode, can be set to <strong>repeat</strong>, <strong>no-repeat</strong>, <strong>repeat-x</strong> or <strong>repeat-y</strong> (default set to <strong>no-repeat</strong>)</td></tr>
        <tr><td class="param">bgpos</td> <td class="desc">[OPT] background position (default <strong>left top</strong>)</td></tr> 
        
        <tr><td class="param">border</td> <td class="desc">[OPT] if <strong>true</strong> border will be displayed (default set to <strong>false</strong>)</td></tr>
        <tr><td class="param">bcolor</td> <td class="desc">[OPT] border color, can be set to any CSS valid value for color property (default set to <strong>#202020</strong>)</td></tr>
        <tr><td class="param">bwidth</td> <td class="desc">[OPT] border width in pixels (default set to 1)</td></tr>
        <tr><td class="param">bstyle</td> <td class="desc">[OPT] can be set to <strong>solid</strong>, <strong>dashed</strong> or <strong>dotted</strong> (default set to <strong>solid</strong>)</td></tr>
        <tr><td class="param">padding</td> <td class="desc">[OPT] column padding, use formmula <strong>0px 0px 0px 0px</strong> (top, right, bottom, left) or any valid CSS value for padding property (default set to <strong>0px 0px 0px 0px</strong>)</td></tr> 
        </table>  
         
        <span class="cms-help-title">Notes:</span><br /> 
        <p class="cms-help-desc">Padding will increase column width and height. For example if you set width to 300 pixels and you will set left and right padding to 20 pixel, column will have 340 pixels width <span class="cms-help-exclamation-icon"></span> </p>         
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_column</code> <em>parameters</em>] your content here [<code>/dcs_column</code>]</p>                                                                                                                      
        </div>
        </div>          
        
        <h6 class="cms-h6" style="margin-top:40px;">Quotes</h6><hr class="cms-hr"/> 
                       
         <!--dcs_blockquote -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_blockquote</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to create a blockquote which you can fully customize using a big list of parameters. The use of parameters is not necessary, so you can use
        only these parameters that will be needed by your quotes.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">author</td> <td class="desc">[OPT] quote author string. Author text is positioned to the right side, under the quote content text (default empty string)</td></tr>            
        <tr><td class="param">acolor</td> <td class="desc">[OPT] author name color, you can use any CSS color valid value (default set to main heading color)</td></tr>
        <tr><td class="param">title</td> <td class="desc">[OPT] author title string. An additional description for author of the quote, use this parameter in connection with 
        <strong>author</strong> parameter (default empty string)</td></tr>
        <tr><td class="param">pos</td> <td class="desc">[OPT] can be set to <strong><em>left</em></strong>, <strong><em>right</em></strong> or 
            <strong><em>center</em></strong>, in mode <em>left</em> and <em>right</em> blockquote is an floating object, so in this modes you must use also
            <code>width</code> and/or <code>mleft</code> and/or <code>mright</code> parameters (default set to <em>center</em>)</td></tr>
        <tr><td class="param">width</td> <td class="desc">[OPT] quote width in pixels (default set to zero, will be not used)</td></tr> 
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels (default set to zero, will be not used)</td></tr> 
        <tr><td class="param">mright</td> <td class="desc">[OPT] right margin in pixels (default set to zero, will be not used)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] if <strong><em>true<em></strong> quote will be displayed in frame (default set to <em>false</em>)</td></tr>  
        <tr><td class="param">size</td> <td class="desc">[OPT] font size in pixels (default not set, default CSS settings for blockquote will be used)</td></tr> 
        <tr><td class="param">style</td> <td class="desc">[OPT] font style, can be set to <strong><em>normal<em></strong> or <strong><em>italic<em></strong> (default <em>italic</em>)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] quote text color, can be set to any CSS valid value for color property like for example #FF0000 or just red (default not set, a grey color is used)</td></tr> 
        <tr><td class="param">font</td> <td class="desc">[OPT] font used for quote (default not set, Georgia font is used)</td></tr> 
        <tr><td class="param">fheight</td> <td class="desc">[OPT] font line height in pixels (default not set)</td></tr>
        <tr><td class="param">bold</td> <td class="desc">[OPT] if <strong><em>true<em></strong> quote will be displayed with bold text (default <em>false</em>)</td></tr> 
        <tr><td class="param">padding</td> <td class="desc">[OPT] inner quote padding, use format <strong><em>0px 0px 0px 0px<em></strong> or any other format 
            accepted for CSS padding property (default <em>0px 0px 0px 0px</em>)</td></tr> 
        <tr><td class="param">margin</td> <td class="desc">[OPT] quote margins, use format <strong><em>0px 0px 0px 0px</em></strong> or any other format 
            accepted for CSS margin property, if set will overwrite <code>mleft</code> and <code>mright</code> paramter (default not set)</td></tr>
        <tr><td class="param">marker</td> <td class="desc">[OPT] default quote backgrounds, you can select it by values from 1 to number of quote images located in [template path]/img/common_files/blockquote folder (default not set)</td></tr>     
        <tr><td class="param">bg</td> <td class="desc">[OPT] quote background image, full url path (default not set)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, you can use any CSS color valid value (default not set)</td></tr> 
        <tr><td class="param">boxpadding</td> <td class="desc">[OPT] quote box padding, use formula <strong>0px 0px 0px 0px</strong> or any CSS padding valid value (default not set)</td></tr> 
        <tr><td class="param">bgpos</td> <td class="desc">[OPT] background position, use format like for CSS background-position property, for example bgpos="left top" (default set to <em>left top</em>)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] parameter allows you to set a background using filename with extension from shortcodes folder 
        [template path]/img/shortcodes. If you will set this parameter, this image path will overwrite <strong>bg</strong> parameter (default empty string, will be not used) (default not set)</td></tr> 
        <tr><td class="param">p</td> <td class="desc">[OPT] image path, can be used to show quote author photo (default not set)</td></tr>
        <tr><td class="param">pw</td> <td class="desc">[OPT] image width, parameter <code>ph</code> must be set to (default not set)</td></tr> 
        <tr><td class="param">ph</td> <td class="desc">[OPT] image height, parameter <code>pw</code> must be set to (default not set)</td></tr>
        <tr><td class="param">pframe</td> <td class="desc">[OPT] is set to <strong>true</strong> image will have small frame (default set to <strong>true</strong>)</td></tr>
        <tr><td class="param">pmargin</td> <td class="desc">[OPT] image margins (default set to <strong>0px 15px 10px 0px</strong>)</td></tr>
        <tr><td class="param">offset</td> <td class="desc">[OPT] space betwean quote and author/title text in pixels (default set to <strong>1</strong>)</td></tr> 
        </table>  
              
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_blockquote</code> <em>parameters</em>] your content here [<code>/dcs_blockquote</code>]</p>                                                                                                                       
        </div>
        </div>           
        
        <h6 class="cms-h6" style="margin-top:40px;">Images and Photos</h6><hr class="cms-hr"/> 
               
         <!--dcs_img -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to insert a formatted image into content. A big list of parameters can be used for this shortcode. 
        You can set for example a bigger image that will show up using lightbox after you click on the image, this image can be be loaded asynchronous or you can turn off this feature.
        Width and height parameters should be defined, especially if you want to use asynchronous loading. With this shortcode you have almost full control over the images.</p> 
        <p class="cms-help-desc">If you want to insert an image that is wrapped with text, you must first place <code>dcs_img</code> shortcode and than insert a text paragraph. 
        Text from this paragraph will wrap the image in the way you set the <strong>pos</strong> parameter for <code>dcs_img</code> (you must choose <strong><em>left</em></strong>
         or <strong><em>right</em></strong> value for <strong>pos</strong> parameter to create a text wrap effect).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">pos</td> <td class="desc">[OPT] image position, can be set to <strong><em>left</em></strong> for float to left, 
            to <strong><em>right</em></strong> for float to right or can be set to <strong><em>center</em></strong>. If you want to use <strong><em>center</em></strong> option, 
            the image will be centered only if margins are not set, or if left and right margin will be set to <strong><em>auto</em></strong> value (default <em>center</em>)</td></tr>
        <tr><td class="param">mleft</td> <td class="desc">[OPT] margin left in pixels (default <strong>auto</strong>)</td></tr>            
        <tr><td class="param">mright</td> <td class="desc">[OPT] margin right in pixels (default <strong>auto</strong>)</td></tr>
        <tr><td class="param">mtop</td> <td class="desc">[OPT] margin top in pixels (default zero)</td></tr>            
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] margin bottom in pixels (default 15)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margins, use formula <strong>0px 0px 0px 0px</strong>, you can use any valid value for CSS margin property, this paramter will overwrite <code>mleft</code>, <code>mright</code>, <code>mtop</code> and <code>mbottom</code> parameters (default not set)</td></tr>
        <tr><td class="param">lightbox</td> <td class="desc">[OPT] can be set to <strong><em>true</em></strong> or <strong><em>false</em></strong>, 
            if <strong><em>true</em></strong> the value from <strong>url</strong> parameter is used as big image for ligthbox (default set to <em>false</em>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] this can be simple url to other page or url to image displayed by 
            ligthbox (when lightbox paramter is set to <strong><em>true</em></strong>). If lightbox parameter is <strong><em>true</em></strong> and this 
               parameters is not set, shortcode will use url from content (default empty string)</td></tr> 
        <tr><td class="param">async</td> <td class="desc">[OPT] if <strong><em>true</em></strong>, image is loaded asynchronous, 
            in this mode you must set width and height parameter if you want to see the preloading effect (default set to <em>true</em>)</td></tr>
        <tr><td class="param">width</td> <td class="desc">[OPT] image width in pixels (default zero)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] image height in pixels (default zero)</td></tr>            
        <tr><td class="param">thumb</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> image is resacaled by timthumb to given width and height (default <em>false</em>)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] title displayed with lightbox (default empty string)</td></tr>            
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">author</td> <td class="desc">[OPT] image author description (default empty string)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <em>none</em> value is used, thin frame is displayed around inner image (default set to none)</td></tr> 
        <tr><td class="param">framedall</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> value is used, thin frame is displayed around whole inner image and description (default set to none)</td></tr> 
        <tr><td class="param">group</td> <td class="desc">[OPT] name for lightbox image group (default empty string)</td></tr>
        <tr><td class="param">line</td> <td class="desc">[OPT] if set to <strong><em>false</em></strong> image description bottom line will be not displayed (default <em>true</em>)</td></tr>
        
        <tr><td class="param">icon</td> <td class="desc">[OPT] auto icon displayed when mouse hover image, can be set to play or zoom (default not set)</td></tr> 
        <tr><td class="param">iconurl</td> <td class="desc">[OPT] in this parameter you can set url to your own icon displayed when mouse hover image, if set overwrite <code>icon</code> parameter (default not set)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] here you can insert relative path to PNG file with extension from [theme path]/img/shortcodes/ folder, 
        this parameter will overwrite <code>icon</code> and <code>iconurl</code> parameters (default not set)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] loader background color, can be set to any CSS color valid value, including <strong>transparent</strong> mode (default not set)</td></tr> 
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_photo</code> <em>parameters</em>] your content here [<code>/dcs_photo</code>]</p>                                                                                                                       
        <p class="cms-help-desc">[<code>dcs_photo</code> <em>parameters</em>] http://www.digitalcavalry.com/image_name.jpg [<code>/dcs_photo</code>]</p>
        </div>
        </div>   

         <!--dcs_img_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Works very similar to <code>dcs_img</code> shortcode, but insted of inserting the image path, allows you to display an image from NextGEN Gallery 
        selected by image ID number. Thank to a big list of parameters you have full control over the image.</p> 
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">
        <tr><td class="param">pid</td> <td class="desc">image ID from NextGEN Gallery, must be set to valid value (default zero, not set)</td></tr> 
        <tr><td class="param">pos</td> <td class="desc">[OPT] image position, can be set to <strong><em>left</em></strong> for float to left, 
            to <strong><em>right</em></strong> for float to right or can be set to <strong><em>center</em></strong>. If you want to use <strong><em>center</em></strong> option, 
            the image will be centered only if margins are not set, or if left and right margin will be set to <strong><em>auto</em></strong> value (default <em>center</em>)</td></tr>
        <tr><td class="param">mleft</td> <td class="desc">[OPT] margin left in pixels (default <strong>auto</strong>)</td></tr>            
        <tr><td class="param">mright</td> <td class="desc">[OPT] margin right in pixels (default <strong>auto</strong>)</td></tr>
        <tr><td class="param">mtop</td> <td class="desc">[OPT] margin top in pixels (default zero)</td></tr>            
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] margin bottom in pixels (default 15)</td></tr>
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margins, use formula <strong>0px 0px 0px 0px</strong>, you can use any valid value for CSS margin property, this paramter will overwrite <code>mleft</code>, <code>mright</code>, <code>mtop</code> and <code>mbottom</code> parameters (default not set)</td></tr>
        <tr><td class="param">lightbox</td> <td class="desc">[OPT] can be set to <strong><em>true</em></strong> or <strong><em>false</em></strong>, 
            if <strong><em>true</em></strong> the value from <strong>url</strong> parameter is used as big image for ligthbox (default set to <em>false</em>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] this can be simple url to other page or url to image displayed by 
            ligthbox (when lightbox paramter is set to <strong><em>true</em></strong>). If lightbox parameter is <strong><em>true</em></strong> and this 
               parameters is not set, shortcode will use url from content (default empty string)</td></tr> 
        <tr><td class="param">async</td> <td class="desc">[OPT] if <strong><em>true</em></strong>, image is loaded asynchronous, 
            in this mode you must set width and height parameter if you want to see the preloading effect (default set to <em>true</em>)</td></tr>
        <tr><td class="param">width</td> <td class="desc">[OPT] image width in pixels (default zero)</td></tr>            
        <tr><td class="param">height</td> <td class="desc">[OPT] image height in pixels (default zero)</td></tr>            
        <tr><td class="param">thumb</td> <td class="desc">[OPT] if set to <strong><em>true</em></strong> image is resacaled by timthumb to given width and height (default <em>false</em>)</td></tr> 
        <tr><td class="param">title</td> <td class="desc">[OPT] title displayed with lightbox (default empty string)</td></tr>            
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">author</td> <td class="desc">[OPT] image author description (default empty string)</td></tr>
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <em>none</em> value is used, thin frame is displayed around inner image (default set to none)</td></tr> 
        <tr><td class="param">framedall</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> value is used, thin frame is displayed around whole inner image and description (default set to none)</td></tr> 
        <tr><td class="param">group</td> <td class="desc">[OPT] name for lightbox image group (default empty string)</td></tr>
        <tr><td class="param">line</td> <td class="desc">[OPT] if set to <strong><em>false</em></strong> image description bottom line will be not displayed (default <em>true</em>)</td></tr>
        
        <tr><td class="param">icon</td> <td class="desc">[OPT] auto icon displayed when mouse hover image, can be set to play or zoom (default not set)</td></tr> 
        <tr><td class="param">iconurl</td> <td class="desc">[OPT] in this parameter you can set url to your own icon displayed when mouse hover image, if set overwrite <code>icon</code> parameter (default not set)</td></tr>
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] here you can insert relative path to PNG file with extension from [theme path]/img/shortcodes/ folder, 
        this parameter will overwrite <code>icon</code> and <code>iconurl</code> parameters (default not set)</td></tr>        
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] loader background color, can be set to any CSS color valid value, including <strong>transparent</strong> mode (default not set)</td></tr>
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_photo_ngg</code> <em>parameters</em>] </p>                                                                                                                       
        </div>
        </div>  
                        
        <!--dcs_img_center -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_center</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays centered image in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr> 
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px auto 15px auto</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr> 
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_center</code> <em>parameters</em>] your content here [<code>/dcs_img_center</code>]</p>                                                                                                                       
        <p class="cms-help-desc">[<code>dcs_img_center</code> <em>parameters</em>] http://www.digitalcavalry.com/image_name.jpg [<code>/dcs_img_center</code>]</p>
        </div>
        </div>         
        
        <!--dcs_img_left -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_left</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays floated left image in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr>
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px 20px 15px 0px</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr>           
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_left</code> <em>parameters</em>] your content here [<code>/dcs_img_left</code>]</p>                                                                                                                       
        <p class="cms-help-desc">[<code>dcs_img_left</code> <em>parameters</em>] http://www.digitalcavalry.com/image_name.jpg [<code>/dcs_img_left</code>]</p>
        </div>
        </div>        

        <!--dcs_img_right -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_right</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays floated right image in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr> 
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px 0px 15px 20px</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr>          
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_right</code> <em>parameters</em>] your content here [<code>/dcs_img_right</code>]</p>                                                                                                                       
        <p class="cms-help-desc">[<code>dcs_img_right</code> <em>parameters</em>] http://www.digitalcavalry.com/image_name.jpg [<code>/dcs_img_right</code>]</p>
        </div>
        </div>  
        
        <!--dcs_img_center_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_center_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays centerd image from NextGEN Gallery in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">pid</td> <td class="desc">image ID from NextGEN gallery, must be set to valid value (default zero, invalid)</td></tr> 
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr>
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px auto 15px auto</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr>           
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_center_ngg</code> <em>parameters</em>] </p>
        <p class="cms-help-desc">[<code>dcs_img_center_ngg</code> pid="86"] </p>
        </div>
        </div>         
        
        <!--dcs_img_left_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_left_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays floated left image from next gen gallery in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">pid</td> <td class="desc">image ID from NextGEN Gallery, must be set to valid value (default zero, invalid)</td></tr>
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr> 
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px 20px 15px 0px</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr>          
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_left_ngg</code> <em>parameters</em>] </p>
        <p class="cms-help-desc">[<code>dcs_img_left_ngg</code> pid="86"] </p>
        </div>
        </div>        

        <!--dcs_img_right_ngg -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_img_right_ngg</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Displays floated right image from NextGEN Gallery in its original size without any transformation, and without asynchronous loading.</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">           
        <tr><td class="param">pid</td> <td class="desc">image ID from next gen gallery, must be set to valid value (default zero, invalid)</td></tr>
        <tr><td class="param">desc</td> <td class="desc">[OPT] image description (default empty string)</td></tr> 
        <tr><td class="param">framed</td> <td class="desc">[OPT] can be set to <strong><em>none</em></strong>, <strong><em>black</em></strong>,
         or <strong><em>white</em></strong>, if other than <strong><em>none</em></strong> thin frame is displayed around image (default set to none)</td></tr> 
        <tr><td class="param">w</td> <td class="desc">[OPT] image width in pixels, works only with parameter <strong>h</strong> (default not set)</td></tr>    
        <tr><td class="param">h</td> <td class="desc">[OPT] image height in pixels, works only with parameter <strong>w</strong> (default not set)</td></tr>  
        <tr><td class="param">margin</td> <td class="desc">[OPT] image margin, use formula <strong>0px 0px 0px 0px</strong> or any CSS margin valid value (default set to <strong>2px 0px 15px 20px</strong>)</td></tr>
        <tr><td class="param">url</td> <td class="desc">[OPT] url for image link (default not set)</td></tr>
        <tr><td class="param">target</td> <td class="desc">[OPT] link target, can be set to <strong>_self</strong> or <strong>_blank</strong> (default set to <strong>_self</strong>)</td></tr>          
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_img_right_ngg</code> <em>parameters</em>] </p>
        <p class="cms-help-desc">[<code>dcs_img_right_ngg</code> pid="86"] </p>
        </div>
        </div>                  
        
        <h6 class="cms-h6" style="margin-top:40px;">Toggle Blocks</h6><hr class="cms-hr"/> 
        
        <!--dcs_toggle -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_toggle <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to insert content into toggled tabs - standard type (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">title</td> <td class="desc">tab title, this text must be added for proper tab display (default empty string)</td></tr> 
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels. This paramter can be used for example to build a nested structure of toggled tabs (default zero)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] title color, you can use any CSS valid value for color property (default not set)</td></tr> 
        <tr><td class="param">open</td> <td class="desc">[OPT] if <strong><em>true</em></strong> tab will appear as open on start (default <em>false</em>)</td></tr> 
        <tr><td class="param">icon</td> <td class="desc">[OPT] icon path - with this parameter you can place an 24x24px icon for tab, it will be positioned to the left side (default not set)</td></tr> 
        <tr><td class="param">usersrc</td> <td class="desc">[OPT] file name with extenstion, with this parameter you can set icon image that is placed in [theme path]/img/shortcodes folder. This 
        parameter overwrites <strong>icon</strong> parameter (default not set) </td></tr>
        <tr><td class="param">state</td> <td class="desc">[OPT] if <strong><em>false</em></strong> plus/minus icon (displayed on the right side) will be hidden (default <em>true</em>)</td></tr>
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] bottom margin in pixels (default no set)</td></tr>
        <tr><td class="param">padding</td> <td class="desc">[OPT] content padding (default set to <strong>15px 10px 15px 10px</strong>)</td></tr>
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_toggle</code> <em>parameters</em>] your content here [<code>/dcs_toggle</code>]</p>                                                                                                                       
        </div>
        </div>        

        <!--dcs_toggle_flat -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_toggle_flat <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to insert content into toggled tabs - flat type (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">title</td> <td class="desc">tab title, this text must be added for proper tab display (default empty string)</td></tr> 
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels. This paramter can be used for example to build a nested structure of toggled tabs (default zero)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] title color, you can use any CSS valid value for color property (default not set)</td></tr> 
        <tr><td class="param">open</td> <td class="desc">[OPT] if <strong><em>true</em></strong> tab will appear as open on start (default <em>false</em>)</td></tr> 
        <tr><td class="param">icons</td> <td class="desc">[OPT] list of icons 16x16 to display from [theme path]/img/shortcodes folder, if you want display more then one icon 
            write names in this way 'filename1.png,filename2.png,filename3.png' (default not set)</td></tr> 
        <tr><td class="param">state</td> <td class="desc">[OPT] if <strong><em>false</em></strong> plus/minus icon (displayed on the right side) will be hidden (default <em>true</em>)</td></tr>
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] bottom margin in pixels (default no set)</td></tr>
        <tr><td class="param">padding</td> <td class="desc">[OPT] content padding (default set to <strong>15px 10px 15px 10px</strong>)</td></tr>        
        <tr><td class="param">weight</td> <td class="desc">[OPT] title weight, can be set to bold or normal (default set to <strong>bold</strong>)</td></tr> 
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_toggle_flat</code> <em>parameters</em>] your content here [<code>/dcs_toggle_flat</code>]</p>                                                                                                                       
        </div>
        </div>  

        <!--dcs_toggle_btn -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_toggle_btn <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to insert content into toggled tabs - button type (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">title</td> <td class="desc">[OPT] tab title (default empty string)</td></tr> 
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels. This paramter can be used for example to build a nested structure of toggled tabs (default zero)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] title color, you can use any CSS valid value for color property (default not set)</td></tr> 
        <tr><td class="param">open</td> <td class="desc">[OPT] if <strong><em>true</em></strong> tab will appear as open on start (default <em>false</em>)</td></tr> 
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] bottom margin in pixels (default not set)</td></tr>
        </table>  
         
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_toggle_btn</code> <em>parameters</em>] your content here [<code>/dcs_toggle_btn</code>]</p>                                                                                                                       
        </div>
        </div> 

        <!--dcs_toggle_frame -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_toggle_frame <span class="cms-help-child-icon"></span></h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Allows to insert content into toggled tabs - frame type (<span style="color:blue;">can have shortcodes inside</span> <span class="cms-help-child-icon"></span>)</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">title</td> <td class="desc">[OPT] tab title (default empty string)</td></tr> 
        <tr><td class="param">mleft</td> <td class="desc">[OPT] left margin in pixels. This paramter can be used for example to build a nested structure of toggled tabs (default zero)</td></tr>
        <tr><td class="param">color</td> <td class="desc">[OPT] title color, you can use any CSS valid value for color property (default not set)</td></tr> 
        <tr><td class="param">open</td> <td class="desc">[OPT] if <strong><em>true</em></strong> tab will appear as open on start (default <em>false</em>)</td></tr> 
        <tr><td class="param">mbottom</td> <td class="desc">[OPT] bottom margin in pixels (default not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_toggle_frame</code> <em>parameters</em>] your content here [<code>/dcs_toggle_frame</code>]</p>                                                                                                                       
        </div>
        </div> 
        
        <h6 class="cms-h6" style="margin-top:40px;">Dropcaps</h6><hr class="cms-hr"/> 
        
        <!--dcs_dropcap1 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap1</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text dropcap (height: two text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap1</code> <em>parameters</em>] your content here [<code>/dcs_dropcap1</code>]</p>
        <p class="cms-help-desc">[<code>dcs_dropcap1</code> color="red"]A[<code>/dcs_dropcap1</code>]</p>
        <p class="cms-help-desc">[<code>dcs_dropcap1</code> color="#880000"]A[<code>/dcs_dropcap1</code>]</p>                                                                                                                        
        </div>
        </div>         
        
        <!--dcs_dropcap2 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap2</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text dropcap (height: three text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap2</code> <em>parameters</em>] your content here [<code>/dcs_dropcap2</code>]</p>                                                                                                                       
        </div>
        </div>          
        
        <!--dcs_dropcap3 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap3</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text disc dropcap (height: two text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS valid value for background-color property (default empty string, color will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap3</code> <em>parameters</em>] your content here [<code>/dcs_dropcap3</code>]</p>                                                                                                                       
        </div>
        </div>         
        
        <!--dcs_dropcap4 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap4</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text disc dropcap (height: three text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS valid value for background-color property (default empty string, color will be not set)</td></tr>
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap4</code> <em>parameters</em>] your content here [<code>/dcs_dropcap4</code>]</p>                                                                                                                       
        </div>
        </div>          
        
        <!--dcs_dropcap5 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap5</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text rectangle dropcap (height: two text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr>
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS valid value for background-color property (default empty string, color will be not set)</td></tr> 
        <tr><td class="param">rounded</td> <td class="desc">[OPT] corners radius, you can use value from 1 to 12 (default zero, rounded corners will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap5</code> <em>parameters</em>] your content here [<code>/dcs_dropcap5</code>]</p>                                                                                                                       
        </div>
        </div>         
        
        <!--dcs_dropcap6 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap6</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text rectangle dropcap (height: three text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        <tr><td class="param">bgcolor</td> <td class="desc">[OPT] background color, can be set to any CSS valid value for background-color property (default empty string, color will be not set)</td></tr>
        <tr><td class="param">rounded</td> <td class="desc">[OPT] corners radius, you can use value from 1 to 12 (default zero, rounded corners will be not set)</td></tr>
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap6</code> <em>parameters</em>] your content here [<code>/dcs_dropcap6</code>]</p>                                                                                                                       
        </div>
        </div>          
        
        <!--dcs_dropcap7 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap7</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text gradient disc dropcap (height: two text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr>
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap7</code> <em>parameters</em>] your content here [<code>/dcs_dropcap7</code>]</p>                                                                                                                       
        </div>
        </div>         
        
        <!--dcs_dropcap8 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap8</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text gradient disc dropcap (height: three text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap8</code> <em>parameters</em>] your content here [<code>/dcs_dropcap8</code>]</p>                                                                                                                       
        </div>
        </div>         
        
        <!--dcs_dropcap9 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap9</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text gradient rectangle dropcap (height: two text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr>
        <tr><td class="param">rounded</td> <td class="desc">[OPT] corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set)</td></tr> 
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap9</code> <em>parameters</em>] your content here [<code>/dcs_dropcap9</code>]</p>                                                                                                                       
        </div>
        </div>         
        
        <!--dcs_dropcap10 -->
        <div class="cms-toggle"><div class="cms-toggle-icon-open"></div>       
        <h5 class="cms-toggle-triger">dcs_dropcap10</h5>
        <div class="cms-toggle-content">
        <span class="cms-help-title">Description</span><br />
        <p class="cms-help-desc">Text gradient rectangle dropcap (eight: three text lines).</p>
        <span class="cms-help-title">Parameters:</span><br />
        
        <table class="cms-help-param-table">                   
        <tr><td class="param">color</td> <td class="desc">[OPT] text color, can be set to any CSS valid value for color property (default empty string, color will be not set)</td></tr> 
        <tr><td class="param">rounded</td> <td class="desc">[OPT] corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set)</td></tr>
        </table>  
                                 
        <span class="cms-help-title">Example:</span><br />
        <p class="cms-help-desc">[<code>dcs_dropcap10</code> <em>parameters</em>] your content here [<code>/dcs_dropcap10</code>]</p>                                                                                                                       
        </div>
        </div>          
        
        <?php                 
    }
            
} // class CPHelp
        
        
?>
