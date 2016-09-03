<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_shortcodes.php
* Brief:       
*      Part of theme control panel.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/ 
   
class CPThemeShortCodes 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/       
    public function __construct($theme_main_color, $theme_main_hover_color)
    {                                                              
        $this->_theme_main_color = '#'.$theme_main_color;
        $this->_theme_main_hover_color = '#'.$theme_main_hover_color; 
        
        add_shortcode('dcs_p', array(&$this, 'dcs_p'));
        add_shortcode('dcs_span', array(&$this, 'dcs_span'));
        add_shortcode('dcs_post', array(&$this, 'dcs_post'));
        add_shortcode('dcs_code', array(&$this, 'dcs_code'));
        add_shortcode('dcs_top', array(&$this, 'dcs_top'));
        add_shortcode('dcs_darkspliter', array(&$this, 'dcs_darkspliter'));         
        add_shortcode('dcs_clearboth', array(&$this, 'dcs_clearboth'));
        add_shortcode('dcs_emptyspace', array(&$this, 'dcs_emptyspace'));        
        add_shortcode('dcs_contactform', array(&$this, 'dcs_contactform'));         
        add_shortcode('dcs_searchform', array(&$this, 'dcs_searchform'));

        add_shortcode('dcs_page', array(&$this, 'dcs_page'));
        add_shortcode('dcs_link', array(&$this, 'dcs_link'));
        add_shortcode('dcs_fly_gallery', array(&$this, 'dcs_fly_gallery'));
        add_shortcode('dcs_simple_gallery', array(&$this, 'dcs_simple_gallery'));
        add_shortcode('dcs_simple_gallery_thumbs', array(&$this, 'dcs_simple_gallery_thumbs'));      
        add_shortcode('dcs_simple_gallery_ngg', array(&$this, 'dcs_simple_gallery_ngg'));
        add_shortcode('dcs_simple_gallery_thumbs_ngg', array(&$this, 'dcs_simple_gallery_thumbs_ngg'));  
        add_shortcode('dcs_box', array(&$this, 'dcs_box'));
        add_shortcode('dcs_gallery_box', array(&$this, 'dcs_gallery_box'));
        add_shortcode('dcs_thinspliter', array(&$this, 'dcs_thinspliter'));
        
        add_shortcode('dcs_heading', array(&$this, 'dcs_heading'));        
        add_shortcode('dcs_info', array(&$this, 'dcs_info'));        
        add_shortcode('dcs_project_map', array(&$this, 'dcs_project_map'));         
        add_shortcode('dcs_project_top', array(&$this, 'dcs_project_top'));
        add_shortcode('dcs_project_bottom', array(&$this, 'dcs_project_bottom'));                       
        add_shortcode('dcs_post_top', array(&$this, 'dcs_post_top'));
        add_shortcode('dcs_post_bottom', array(&$this, 'dcs_post_bottom'));
        add_shortcode('dcs_post_author', array(&$this, 'dcs_post_author'));       
        add_shortcode('dcs_ul', array(&$this, 'dcs_ul')); 
        add_shortcode('dcs_ul_check', array(&$this, 'dcs_ul_check'));
                
        add_shortcode('dcs_ul_star', array(&$this, 'dcs_ul_star'));                
        add_shortcode('dcs_ul_arrow', array(&$this, 'dcs_ul_arrow')); 
        add_shortcode('dcs_ul_dot_gold', array(&$this, 'dcs_ul_dot_gold'));        
        add_shortcode('dcs_ul_dot_silver', array(&$this, 'dcs_ul_dot_silver'));
        add_shortcode('dcs_ul_dot_grey', array(&$this, 'dcs_ul_dot_grey'));      
        add_shortcode('dcs_ol', array(&$this, 'dcs_ol'));
        add_shortcode('dcs_ol_gold', array(&$this, 'dcs_ol_gold'));
        add_shortcode('dcs_ol_silver', array(&$this, 'dcs_ol_silver'));
        add_shortcode('dcs_ol_roman_gold', array(&$this, 'dcs_ol_roman_gold'));
        add_shortcode('dcs_ol_roman_silver', array(&$this, 'dcs_ol_roman_silver'));                                         
                 
        add_shortcode('dcs_one_half', array(&$this, 'dcs_one_half'));
        add_shortcode('dcs_one_half_last', array(&$this, 'dcs_one_half_last'));         
        add_shortcode('dcs_one_third', array(&$this, 'dcs_one_third'));
        add_shortcode('dcs_one_third_last', array(&$this, 'dcs_one_third_last')); 
        add_shortcode('dcs_two_third', array(&$this, 'dcs_two_third'));
        add_shortcode('dcs_two_third_last', array(&$this, 'dcs_two_third_last'));         
        add_shortcode('dcs_one_fourth', array(&$this, 'dcs_one_fourth'));
        add_shortcode('dcs_one_fourth_last', array(&$this, 'dcs_one_fourth_last')); 
        add_shortcode('dcs_three_fourth', array(&$this, 'dcs_three_fourth'));
        add_shortcode('dcs_bar_header_small', array(&$this, 'dcs_bar_header_small'));
        
        add_shortcode('dcs_three_fourth_last', array(&$this, 'dcs_three_fourth_last'));             
        add_shortcode('dcs_one_fifth', array(&$this, 'dcs_one_fifth'));
        add_shortcode('dcs_one_fifth_last', array(&$this, 'dcs_one_fifth_last'));         
        add_shortcode('dcs_four_fifth', array(&$this, 'dcs_four_fifth'));
        add_shortcode('dcs_four_fifth_last', array(&$this, 'dcs_four_fifth_last')); 
        add_shortcode('dcs_column', array(&$this, 'dcs_column'));           
        add_shortcode('dcs_blockquote', array(&$this, 'dcs_blockquote'));                 
        add_shortcode('dcs_img', array(&$this, 'dcs_img')); 
        add_shortcode('dcs_img_center', array(&$this, 'dcs_img_center'));
        add_shortcode('dcs_img_left', array(&$this, 'dcs_img_left')); 
        
        add_shortcode('dcs_img_right', array(&$this, 'dcs_img_right'));            
        add_shortcode('dcs_toggle', array(&$this, 'dcs_toggle'));
        add_shortcode('dcs_toggle_flat', array(&$this, 'dcs_toggle_flat'));        
        add_shortcode('dcs_absimg', array(&$this, 'dcs_absimg')); 
        add_shortcode('dcs_popimg', array(&$this, 'dcs_popimg'));
        add_shortcode('dcs_rounded_box', array(&$this, 'dcs_rounded_box'));
        add_shortcode('dcs_sicon', array(&$this, 'dcs_sicon'));
        add_shortcode('dcs_wp_pagination', array(&$this, 'dcs_wp_pagination'));          
        add_shortcode('dcs_project_author', array(&$this, 'dcs_project_author'));
        add_shortcode('dcs_ul_exception', array(&$this, 'dcs_ul_exception'));
        
        add_shortcode('dcs_ngg', array(&$this, 'dcs_ngg'));
        add_shortcode('dcs_ngg_single', array(&$this, 'dcs_ngg_single')); 
        add_shortcode('dcs_ngg_last', array(&$this, 'dcs_ngg_last'));    
        add_shortcode('dcs_ngg_random', array(&$this, 'dcs_ngg_random'));                                        
        add_shortcode('dcs_ol_greek_gold', array(&$this, 'dcs_ol_greek_gold'));
        add_shortcode('dcs_ol_greek_silver', array(&$this, 'dcs_ol_greek_silver'));                  
        add_shortcode('dcs_three_fifth', array(&$this, 'dcs_three_fifth'));
        add_shortcode('dcs_three_fifth_last', array(&$this, 'dcs_three_fifth_last'));                 
        add_shortcode('dcs_img_ngg', array(&$this, 'dcs_img_ngg'));         
        add_shortcode('dcs_img_center_ngg', array(&$this, 'dcs_img_center_ngg'));
        
        add_shortcode('dcs_img_left_ngg', array(&$this, 'dcs_img_left_ngg'));
        add_shortcode('dcs_img_right_ngg', array(&$this, 'dcs_img_right_ngg'));      
        add_shortcode('dcs_toggle_btn', array(&$this, 'dcs_toggle_btn'));
        add_shortcode('dcs_toggle_frame', array(&$this, 'dcs_toggle_frame'));        
        add_shortcode('dcs_lb_link', array(&$this, 'dcs_lb_link'));
        add_shortcode('dcs_lb_link_ngg', array(&$this, 'dcs_lb_link_ngg'));             
        add_shortcode('dcs_flat_tabs', array(&$this, 'dcs_flat_tabs')); 
        add_shortcode('dcs_flat_tab', array(&$this, 'dcs_flat_tab'));                 
        add_shortcode('dcs_abs_flat_tabs', array(&$this, 'dcs_abs_flat_tabs')); 
        add_shortcode('dcs_abs_flat_tab', array(&$this, 'dcs_abs_flat_tab'));         
                        
        add_shortcode('dcs_dropcap1', array(&$this, 'dcs_dropcap1'));
        add_shortcode('dcs_dropcap2', array(&$this, 'dcs_dropcap2'));
        add_shortcode('dcs_dropcap3', array(&$this, 'dcs_dropcap3'));
        add_shortcode('dcs_dropcap4', array(&$this, 'dcs_dropcap4'));        
        add_shortcode('dcs_dropcap5', array(&$this, 'dcs_dropcap5'));
        add_shortcode('dcs_dropcap6', array(&$this, 'dcs_dropcap6'));                                  
        add_shortcode('dcs_dropcap7', array(&$this, 'dcs_dropcap7'));
        add_shortcode('dcs_dropcap8', array(&$this, 'dcs_dropcap8'));        
        add_shortcode('dcs_dropcap9', array(&$this, 'dcs_dropcap9'));
        add_shortcode('dcs_dropcap10', array(&$this, 'dcs_dropcap10'));
        
        add_shortcode('dcs_chain_gallery', array(&$this, 'dcs_chain_gallery'));
        add_shortcode('dcs_ul_menu', array(&$this, 'dcs_ul_menu'));
        add_shortcode('dcs_banner', array(&$this, 'dcs_banner'));
        add_shortcode('dcs_banner_slide', array(&$this, 'dcs_banner_slide'));
        add_shortcode('dcs_news_top', array(&$this, 'dcs_news_top'));
        add_shortcode('dcs_news_bottom', array(&$this, 'dcs_news_bottom'));
        add_shortcode('dcs_news_author', array(&$this, 'dcs_news_author')); 
        add_shortcode('dcs_related_news', array(&$this, 'dcs_related_news')); 
        add_shortcode('dcs_related_posts', array(&$this, 'dcs_related_posts'));
        add_shortcode('dcs_player', array(&$this, 'dcs_player'));             
                            
        add_shortcode('dcs_player_audio', array(&$this, 'dcs_player_audio'));
        add_shortcode('dcs_lb_player', array(&$this, 'dcs_lb_player'));
        add_shortcode('dcs_fancy_header', array(&$this, 'dcs_fancy_header')); 
        add_shortcode('dcs_related_projects', array(&$this, 'dcs_related_projects'));
        add_shortcode('dcs_ul_clean', array(&$this, 'dcs_ul_clean'));
        add_shortcode('dcs_ul_ring', array(&$this, 'dcs_ul_ring')); 
        add_shortcode('dcs_small', array(&$this, 'dcs_small')); 
        add_shortcode('dcs_news', array(&$this, 'dcs_news'));
        add_shortcode('dcs_project', array(&$this, 'dcs_project'));
        add_shortcode('dcs_src', array(&$this, 'dcs_src'));
        
        add_shortcode('dcs_posts_list', array(&$this, 'dcs_posts_list'));
        add_shortcode('dcs_signature', array(&$this, 'dcs_signature')); 
        add_shortcode('dcs_img_switcher', array(&$this, 'dcs_img_switcher')); 
        add_shortcode('dcs_img_switcher_ngg', array(&$this, 'dcs_img_switcher_ngg')); 
        add_shortcode('dcs_hightlight', array(&$this, 'dcs_hightlight'));        
        add_shortcode('dcs_btn', array(&$this, 'dcs_btn'));  
        add_shortcode('dcs_bigbtn', array(&$this, 'dcs_bigbtn'));                                                        
        add_shortcode('dcs_btn_color', array(&$this, 'dcs_btn_color'));  
        add_shortcode('dcs_bigbtn_color', array(&$this, 'dcs_bigbtn_color'));          
        add_shortcode('dcs_bar_header', array(&$this, 'dcs_bar_header'));      
        
        add_shortcode('dcs_scode', array(&$this, 'dcs_scode'));
        add_shortcode('dcs_recent_news', array(&$this, 'dcs_recent_news'));
        add_shortcode('dcs_recent_posts', array(&$this, 'dcs_recent_posts'));
        add_shortcode('dcs_voting', array(&$this, 'dcs_voting')); 
        add_shortcode('dcs_ngg_auto_gallery', array(&$this, 'dcs_ngg_auto_gallery'));       
                                      
                                                                                 
        remove_filter('the_content', 'wpautop');
        remove_filter('the_content', 'wptexturize');
    }

    /*********************************************************** 
    * Provate memebers
    ************************************************************/
    private $_theme_main_color;
    private $_theme_main_hover_color;
    
    /*********************************************************** 
    * Public functions
    ************************************************************/
    
    # SHORTCODE: 
    #   dcs_p (add <p> tag before and </p> after content) 
    # PAREMAETERS:
    # NOTES:     
    public function dcs_p($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'align' => 'left',
          'padding' => '0px 0px 0px 0px',
          'color' => '',
          'size' => '',
          'fheight' => '',
          'bg' => '',
          'bgcolor' => '',
          'usersrc' => '',
          'bgrepeat' => 'no-repeat',
          'bgpos' => 'left top',
          'rounded' => 0,
          'margin' => '0px 0px 15px 0px',
          'border' => 'false',
          'bcolor' => '#202020',
          'bstyle' => 'solid',
          'bwidth' => 1,
          'font' => '',
          'fstyle' => '',
          'fweight' => ''
        );                
         
        $atts = shortcode_atts($defatts, $atts);        
        $att_align = $atts['align'];         
        $att_padding = $atts['padding'];
        $att_color = $atts['color'];
        $att_size = $atts['size'];
        $att_bgcolor = $atts['bgcolor'];
        $att_usersrc = $atts['usersrc'];
        $att_bgrepeat = $atts['bgrepeat']; 
        $att_bgpos = $atts['bgpos'];                      
        $att_rounded = (int)$atts['rounded'];
        $att_fheight = (int)$atts['fheight']; 
        $att_margin = $atts['margin'];
        $att_bg = $atts['bg']; 
        $att_border = $atts['border']; 
        $att_bcolor = $atts['bcolor'];
        $att_bstyle = $atts['bstyle'];
        $att_bwidth = (int)$atts['bwidth'];
        $att_font = $atts['font'];
        $att_fstyle = $atts['fstyle']; 
        $att_fweight = $atts['fweight']; 
        
                      
        if($att_usersrc != '')
        {
            $att_bg = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;
        }                       
                             
        if($content !== '')
        {
            $style = ' style="';
            if($att_font != '') { $style .= 'font-family:'.$att_font.';'; }
            if($att_fstyle != '') { $style .= 'font-style:'.$att_fstyle.';'; }
            if($att_fweight != '') { $style .= 'font-wight:'.$att_fweight.';'; } 
            $style .= 'margin:'.$att_margin.';';
            $style .= 'position:relative;';
            $style .= 'text-align:'.$att_align.';';
            $style .= 'padding:'.$att_padding.';';
            if($att_border == 'true')
            {
                $style .= 'border:'.$att_bwidth.'px '.$att_bstyle.' '.$att_bcolor.';';
            }
            if($att_color != '')
            {
                $style .= 'color:'.$att_color.';';
            }
            if($att_size != '')
            {
                $style .= 'font-size:'.$att_size.'px;';
            }
            if($att_fheight != '')
            {
                $style .= 'line-height:'.$att_fheight.'px;';
            }            
            if($att_bg != '')
            {
                $style .= 'background-image:url('.$att_bg.');';
                $style .= 'background-position:'.$att_bgpos.';'; 
                $style .= 'background-repeat:'.$att_bgrepeat.';';  
            }              
            if($att_bgcolor != '')
            {
                $style .= 'background-color:'.$att_bgcolor.';';    
            }
            $style .= '" '; 
            
            $out .= '<p '.($att_rounded > 0 ? ' class="rounded-borders-'.$att_rounded.'" ' : '').' '.$style.'>'.do_shortcode($content).'</p>';
        }
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_absimg - display image obsolute positioned image, must be used with container positioned ralative (shortcoeds which genarete 
    #       relative positioned containers are: dcs_p, dcs_box) 
    # PAREMAETERS:
    #   left - position in regard to left container border (use only left or right)
    #   right - position in regard to right container border (use only left or right) 
    #   top - position in regard to top container border (use only top or bottom)
    #   bottom - position in regard to right container border (use only top or bottom)
    #   w - image width
    #   h - image height
    #   src - image path
    #   usersrc - filename width extension from shortcodes folder [template path]/img/shortcodes, default empty string, will be not used, if you set this, this image path will overwrite src parameter 
    #   url - some link for element     
    # NOTES:     
    public function dcs_absimg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => '',
          'right' => '',
          'top' => '',
          'bottom' => '',
          'w' => 0,
          'h' => 0,
          'src' => '',
          'usersrc' => '',
          'url' => ''
        );                
         
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];         
        $att_right = $atts['right'];
        $att_top = $atts['top'];
        $att_bottom = $atts['bottom'];
        $att_width = $atts['w'];
        $att_height = $atts['h'];
        $att_src = $atts['src'];
        $att_url = $atts['url'];
        $att_usersrc = $atts['usersrc'];
                    
        $style = ' style="';
        $style .= 'position:absolute;display:block;';
        $style .= 'width:'.$att_width.';';
        $style .= 'height:'.$att_height.';';                          
        if($att_left != '') { $style .= 'left:'.$att_left.'px;'; }
        if($att_top != '') { $style .= 'top:'.$att_top.'px;'; }
        if($att_bottom != '') { $style .= 'bottom:'.$att_bottom.'px;'; } 
        if($att_right != '') { $style .= 'right:'.$att_right.'px;'; } 
        $style .= '" ';
        
        if($att_usersrc != '')
        {
            $att_src = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;
        }
         
        if($att_url != '') { $out .= '<a '.$style.' href="'.$att_url.'" >'; }
        $out .= '<img src="'.$att_src.'" '.($att_url == '' ? $style : '').' />';
        if($att_url != '') { $out .= '</a>'; }
        
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_span 
    # PAREMAETERS:
    #   color - text color, any css value, can be e.g 'black', 'red', 'yellow' or hex with hash e.g #33FF22, #888, default #FFFFFF
    #   bg - background color, default transparent, you can set value foro this parameter in the same way like for color
    #   padding - left and right padding, used only then bg color is set, default 4px padding
    # NOTES: 
    public function dcs_span($atts, $content=null, $code="")
    {
        $out = '';          
        $defatts = Array(
          'color' => '',
          'bg' => 'transparent',
          'padding' => 4,
          'tip' => '',
          'pos' => '',
          'code' => 'false',
          'em' => 'false',
          'bold' => 'false'   
        );
        
        // if bg is not set we dont need left and right padding, so we set default padding value to zero
        if(!isset($atts['bg']))
        {
            $defatts['padding'] = 0;
        }
        
        if($atts['tip'] != '' and !isset($atts['pos']))
        {
            $defatts['pos'] = 'top';
        }        
       
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_bg = $atts['bg'];
        $att_padding = $atts['padding'];
        $att_tip = $atts['tip'];
        $att_pos = $atts['pos'];        
        $att_code = $atts['code'];
        $att_bold = $atts['bold'];        
        $att_em = $atts['em'];
         
        $span_class = 'class="';
        switch($att_pos)
        {
            case 'left': $span_class .= 'link-tip-left '; break;
            case 'right': $span_class .= 'link-tip-right '; break;
            case 'top': $span_class .= 'link-tip-top '; break;
            case 'bottom': $span_class .= 'link-tip-bottom '; break;                                    
        }
        if(isset($atts['bg']))
        {
            $span_class .= 'rounded-borders-2 ';
        }
        $span_class .= '" ';                  
                     
        $tip = '';
        if($att_tip != '') { $tip = ' title="'.$att_tip.'" '; }               
                   
        $style = ' style="';
        if($att_color != '')
        {
            $style .= 'color:'.$att_color.';';
        }
        $style .= 'background-color:'.$att_bg.';';
        if($att_code == 'true')
        {
            $style .= 'font-family:monospace;';
        } 
        if($att_bold == 'true')
        {
            $style .= 'font-weight:bold;';
        }
        if($att_em == 'true')
        {
            $style .= 'font-style:italic;';
        }                        
        $style .= 'padding-left:'.$att_padding.'px;';
        $style .= 'padding-right:'.$att_padding.'px;';
        $style .= 'padding-bottom:2px;';
        $style .= '" ';           
                           
        if($content !== '')
        {
            $out .= '<span '.$span_class.' '.$tip.' '.$style.'>'.$content.'</span>';
        }
        return $out;
    } 

    # SHORTCODE: 
    #   dcs_popimg (generate simple popup image link)
    # PAREMAETERS:
    #   url - url address to link
    #   src - url to displayed image
    #   title - image short description
    #   target - can be set to _self or blank, if you set _blank url will be opened in new browser tab/window (default _self)
    #   icon - if true, image icon will be displayed begore link
    # NOTES: 
    public function dcs_popimg($atts, $content=null, $code="")
    {
        $out = '';          
        $defatts = Array(
          'color' => '',
          'url' => '',
          'icon' => 'false',
          'target' => '_self',
          'src' => '',
          'title' => '',
          'usersrc' => '',
          'w' => '240',
          'h' => '180',
          'thumb' => 'false'
        );                
              
        $atts = shortcode_atts($defatts, $atts);              
        $att_url = $atts['url'];
        $att_target = $atts['target'];             
        $att_icon = $atts['icon'];
        $att_src = $atts['src'];
        $att_title = $atts['title']; 
        $att_color = $atts['color']; 
        $att_usersrc = $atts['usersrc'];
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_thumb = $atts['thumb'];
                     
        if($att_target != '_self' and $att_target != '_blank')        
        {                                    
            $att_target = '_self';    
        }
                                     
        $link_class = ' class="pu_img ';
        if($att_icon == 'true' and $att_usersrc == '') { $link_class .= 'img-ballon '; }
        $link_class .= '" '; 
        
        if($att_url != '')
        {
            $att_url = ' href="'.$att_url.'" ';
        }
        if($att_title != '')
        {
            $att_title = ' title="'.$att_title.'" ';
        }
        
        $style = ' style="';
        if($att_color != '')
        {
            $style .= 'color:'.$att_color.';';
        }
        if($att_icon == 'true' and $att_usersrc != '') 
        { 
            $style .= 'background-image:url('.get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc.');';
            $style .= 'padding:1px 0px 1px 18px;';  
        }          
        $style .= '" ';
        
        if($att_thumb == 'true')
        {
            $att_src = get_bloginfo('template_url').'/thumb.php?src='.$att_src.'&w='.$att_w.'&h='.$att_h.'&zc=1'; 
        }    
                        
        if($content !== '')
        {
            $out .= '<a '.$link_class.' '.$style.' '.$att_url.' target="'.$att_target.'" '.$att_title.' rel="'.$att_src.'" >'.$content.'</a>';
        }
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_link (generate simple link code)
    # PAREMAETERS:
    #   tip - tip to display
    #   url - url address
    #   target - can be set to _blank or _self
    #   pos - tip pos, can be set to left, top, bottom and right, default set to top
    #   icon - icon to display before link, default no icon is set
    # NOTES: 
    public function dcs_link($atts, $content=null, $code="")
    {
        $out = '';          
        $defatts = Array(
          'color' => '',
          'tip' => '',
          'url' => '',
          'target' => '_self',
          'pos' => '',
          'icon' => '',
          'usersrc' => ''
        );                
       
        if($atts['tip'] != '' and !isset($atts['pos']))
        {
            $defatts['pos'] = 'top';
        } 
       
        $atts = shortcode_atts($defatts, $atts);        
        $att_tip = $atts['tip'];        
        $att_url = $atts['url'];
        $att_target = $atts['target'];             
        $att_pos = $atts['pos'];
        $att_icon = $atts['icon']; 
        $att_color = $atts['color']; 
        $att_usersrc = $atts['usersrc'];
                     
        if($att_target != '_self' and $att_target != '_blank')        
        {                                    
            $att_target = '_self';    
        }
        
        $style = ' style="';
        if($att_color != '')
        {
            $style .= 'color:'.$att_color.';';
        }
        if($att_usersrc != '')
        {
            $style .= 'background-image:url('.get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc.');';
            $style .= 'padding:1px 0px 1px 19px;';
        }
        $style .= '" ';        
        
        
        $tip = '';
        $link_class = 'class="';
        switch($att_pos)
        {
            case 'left': $link_class .= 'link-tip-left '; break;
            case 'right': $link_class .= 'link-tip-right '; break;
            case 'top': $link_class .= 'link-tip-top '; break;
            case 'bottom': $link_class .= 'link-tip-bottom '; break;                                    
        }
        if($att_usersrc == '')
        {
            switch($att_icon)
            {
                case 'email': $link_class .= 'email '; break;            
                case 'download': $link_class .= 'download '; break;            
                case 'pdf': $link_class .= 'pdf '; break;
                case 'word': $link_class .= 'word '; break;
                case 'zip': $link_class .= 'zip '; break; 
                case 'file': $link_class .= 'file '; break;
                case 'files': $link_class .= 'files '; break;
                case 'music': $link_class .= 'music '; break;
                case 'rar': $link_class .= 'rar '; break;                                            
            }
        }
                
        $link_class .= '" ';
        
        if($att_tip != '') { $tip = ' title="'.$att_tip.'" '; }
                           
        if($content !== '')
        {
            $out .= '<a '.$style.' '.$link_class.' href="'.$att_url.'" target="'.$att_target.'" '.$tip.'>'.$content.'</a>';
        }
        return $out;
    }     
 
    # SHORTCODE: 
    #   dcs_code 
    # PAREMAETERS:
    #   lang - programming language used for syling text in box, defalut is set to plain, but you can use sql, csharp, css, cpp, php, delphi or jscript
    # NOTES:  
    public function dcs_code($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'lang' => 'plain'
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_lang = $atts['lang'];           
                                     
        if($content !== '')
        {
            // pad-line-numbers:3
            $out .= '<pre class="brush:'.$att_lang.' wrap-lines:false">'.$content.'</pre>';
        }
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap1 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    # NOTES:  
    public function dcs_dropcap1($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                             
        $out .= '<h3 class="dcs-dropcap1" '.$style.'>'.$content.'</h3>';

        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap2 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    # NOTES:  
    public function dcs_dropcap2($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                             
        $out .= '<h2 class="dcs-dropcap2" '.$style.'>'.$content.'</h2>';

        return $out;
    }      
  
    # SHORTCODE: 
    #   dcs_dropcap3 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   bgcolor - background color, can be set to any CSS valid value for color (default empty string, color will be not set)  
    # NOTES:  
    public function dcs_dropcap3($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        $att_bgcolor = $atts['bgcolor'];
        
        $style = ' style="';
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; }
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                         
        $out .= '<span class="dcs-dropcap3" '.$style.'>'.$content.'</span>';

        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap4 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   bgcolor - background color, can be set to any CSS valid value for color (default empty string, color will be not set) 
    # NOTES:  
    public function dcs_dropcap4($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_bgcolor = $atts['bgcolor'];           
        
        $style = ' style="';
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; } 
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                             
        $out .= '<span class="dcs-dropcap4" '.$style.'>'.$content.'</span>';

        return $out;
    }          
   
    # SHORTCODE: 
    #   dcs_dropcap5 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   bgcolor - background color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   rounded - corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set)      
    # NOTES:  
    public function dcs_dropcap5($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => '',
          'rounded' => 0             
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        $att_bgcolor = $atts['bgcolor'];
        $att_rounded = $atts['rounded'];        
        
        $style = ' style="';
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; }
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                   
        if($att_rounded > 0)
        {
            $att_rounded = ' rounded-borders-'.$att_rounded;   
        }                                   
                                                             
        $out .= '<span class="dcs-dropcap5 '.$att_rounded.'" '.$style.'>'.$content.'</span>';

        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap6 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   bgcolor - background color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   rounded - corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set) 
    # NOTES:  
    public function dcs_dropcap6($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => '',
          'rounded' => 0 
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_bgcolor = $atts['bgcolor'];
        $att_rounded = $atts['rounded'];             
        
        $style = ' style="';
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; } 
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
            
        if($att_rounded > 0)
        {
            $att_rounded = ' rounded-borders-'.$att_rounded;   
        }               
                                                             
        $out .= '<span class="dcs-dropcap6 '.$att_rounded.'" '.$style.'>'.$content.'</span>';

        return $out;
    }    
    
    # SHORTCODE: 
    #   dcs_dropcap7 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    # NOTES:  
    public function dcs_dropcap7($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                             
        $out .= '<span class="dcs-dropcap7" '.$style.'>'.$content.'</span>';

        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap8 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    # NOTES:  
    public function dcs_dropcap8($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
                                                             
        $out .= '<span class="dcs-dropcap8" '.$style.'>'.$content.'</span>';

        return $out;
    }      
  
    # SHORTCODE: 
    #   dcs_dropcap9 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   rounded - corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set)
    # NOTES:  
    public function dcs_dropcap9($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'rounded' => 0 
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_rounded = $atts['rounded'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';                

        if($att_rounded > 0)
        {
            $att_rounded = ' rounded-borders-'.$att_rounded;   
        }                 
                                                             
        $out .= '<span class="dcs-dropcap9 '.$att_rounded.'" '.$style.'>'.$content.'</span>';

        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_dropcap10 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color (default empty string, color will be not set)
    #   rounded - corners radius, you can use value from 1 to 12 (default zero, rounded corrners will be not set)
    # NOTES:  
    public function dcs_dropcap10($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',
          'rounded' => 0
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_rounded = $atts['rounded'];           
        
        $style = ' style="';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';  
         
        if($att_rounded > 0)
        {
            $att_rounded = ' rounded-borders-'.$att_rounded;   
        }            
                                                             
        $out .= '<span class="dcs-dropcap10 '.$att_rounded.'" '.$style.'>'.$content.'</span>';

        return $out;
    }    
    
    # SHORTCODE: 
    #   dcs_top
    # PAREMAETERS:
    #   empty - if true inner line and top link is not displayed, default false
    #   top - if false inner top link is not displayed, default true
    #   style - line style, can be set to solid, dotted or dashed, default solid
    # NOTES:     
    public function dcs_top($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'empty' => 'false',
          'top' => 'true',
          'bstyle' => 'solid',
          'bwidth' => 1,
          'bcolor' => '',
          'color' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_empty = $atts['empty'];
        $att_top = $atts['top'];               
        $att_bstyle = $atts['bstyle']; 
        $att_bwidth = $atts['bwidth'];
        $att_bcolor = $atts['bcolor']; 
        $att_color = $atts['color'];
        
        $style = ' style="';
        $style .= 'border-bottom-width:'.$att_bwidth.'px;';
        $style .= 'border-bottom-style:'.$att_bstyle.';';
        if($att_bcolor != '')
        {
            $style .= 'border-bottom-color:'.$att_bcolor.';';    
        } 
        $style .= '" ';
        
        $tstyle = '';
        if($att_color != '')
        {
            $tstyle = ' style="'; 
            $tstyle .= 'color:'.$att_color.';';
            $tstyle .= '" ';    
        } 
                
        
        if($att_empty == 'false')
        {
            $out .= '<div class="dcs-divider-top" '.$style.'>'.($att_top == 'true' ? '<a href="#top-anchor" '.$tstyle.'>Top</a>' : '').'</div>';
        } else
        {
            $out .= '<div style="border-bottom:none;" class="dcs-divider-top"></div>'; 
        }
        return $out;
    }    


    # SHORTCODE: 
    #   dcs_darkspliter
    # PAREMAETERS:
    #   size - size of spliter, can be set to small, medium or large, default value is medium
    #   extra - extra height, default set to zero
    #   top - margin top, default zero
    #   bottom - margin bottom, default zero
    # NOTES:     
    public function dcs_darkspliter($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'size' => 'medium',
          'extra' => 0,
          'top' => 0,
          'bottom' => 0
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_size = $atts['size'];
        $att_extra = $atts['extra'];
        if($att_extra < 0)
        {
            $att_extra = 0;
        }
        $att_top = $atts['top'];
        if($att_top < 0)
        {
            $att_top = 0;
        }  
        $att_bottom = $atts['bottom'];      
        
        if($att_size != 'small' and $att_size != 'medium' and $att_size != 'large')
        {
            $att_size = 'medium'; 
        }             

        switch($att_size)
        {
            case 'small':
                $out .= '<div class="dcs-page-spliter-dark-small" style="padding-top:'.$att_extra.'px;margin-top:'.$att_top.'px;margin-bottom:'.$att_bottom.'px;"></div>';
            break;
            
            case 'medium':
                $out .= '<div class="dcs-page-spliter-dark-medium" style="padding-top:'.$att_extra.'px;margin-top:'.$att_top.'px;margin-bottom:'.$att_bottom.'px;"></div>';
            break;
            
            case 'large':
                $out .= '<div class="dcs-page-spliter-dark-large" style="padding-top:'.$att_extra.'px;margin-top:'.$att_top.'px;margin-bottom:'.$att_bottom.'px;"></div>';
            break;                        
        }         

        return $out;
    }  
   
    # SHORTCODE: 
    #   dcs_thin_spliter
    # PAREMAETERS:
    #   size - can be set to small or large (default set to small)
    #   extra - additinal height in pixels (defailt set to zero)
    # NOTES:     
    public function dcs_thinspliter($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'size' => 'small',
          'extra' => 0
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_size = $atts['size'];
        $att_extra = $atts['extra']; 
        
        if($att_size != 'small' and $att_size != 'large')
        {
            $att_size = 'small';
        }        
        
        if($att_size == 'small')
        {
            $out .= '<div class="dcs-thin-spliter" style="padding-top:'.$att_extra.'px;"></div>';
        } else
        {
            $out .= '<div class="dcs-thin-spliter-big" style="padding-top:'.$att_extra.'px;"></div>';
        }
        return $out;          
    }     
     
     
    # SHORTCODE: 
    #   dcs_clearboth 
    # PAREMAETERS:
    #   h - divider height in pixels, default set to 1 px
    # NOTES:
    #   This short code generate simple empty div with clear both style, can be uses for cuting off floating elements            
    public function dcs_clearboth($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'h' => 1
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_height = (int)$atts['h'];
        if($att_height < 1)
        {
           $att_height = 1; 
        }        
        
        $out .= '<div style="clear:both;height:'.$att_height.'px;"></div>';
        return $out;  
    }       
     
    # SHORTCODE: 
    #   dcs_emptyspace 
    # PAREMAETERS:
    #   h - in this paremeter put height of empty space in pixels, this should be value grater then zero
    # NOTES:
    #   This short code generate simple empty div with clear both style and given height, default 1px           
    public function dcs_emptyspace($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'h' => 1
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_h = (int)$atts['h'];
        if($att_h < 1)
        {
            $att_h = 1;    
        }             
        
        $out .= '<div style="clear:both;height:'.$att_h.'px;"></div>';
        return $out;
    }       
      
    # SHORTCODE: 
    #   dcs_post (display single post in shorter version)
    # PAREMAETERS:
    #   id - displayed post id, required valid value
    #   image - if true image, or video is displayed, default true
    #   desc - if true image description or video desciritpion is displayed, default true
    #   voting - if set to true voting will be displayed, if false voting will be omited (default set to true)
    # NOTES:                
    public function dcs_post($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        

        global $post, $page, $numpages, $multipage, $more, $pagenow, $pages;        
        
        $out = '';                 
        $defatts = Array(
          'id' => -1,
          'image' => 'true',
          'desc' => 'true',
          'voting' => 'false'           
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_postid = $atts['id'];
        $att_image = $atts['image'];
        $att_desc = $atts['desc']; 
        $att_voting = $atts['voting'];
        
        
        $args=array('p' => $att_postid);
        
        $new_query = new WP_Query($args);                            
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                
                
                $imagepath = get_post_meta($post->ID, 'post_image', true);
                $imagedesc = get_post_meta($post->ID, 'post_image_desc', true);
                $videopath = get_post_meta($post->ID, 'post_video', true);
                $disablevideo = get_post_meta($post->ID, 'post_disable_video', true);                
                $postdesc = get_post_meta($post->ID, 'post_desc', true); 
                $novoting = get_post_meta($post->ID, 'post_novoting', true);
                $more = 0;

                $month = get_the_time('n', $post->ID);
                $year = get_the_time('Y', $post->ID); 

                $out .= '
               
                    <div class="blog-post">';   
                                            
                        if($videopath != '' and $att_image == 'true' and $disablevideo == '')
                        {
                            $out .= '<div class="photo">'.do_shortcode($videopath).' '.($att_desc == 'true' ? $imagedesc : '').'</div>';     
                        } else
                        if($imagepath != '' and $att_image == 'true')
                        {
                            $out .= '<div class="photo"><a class="async-img image" href="'.get_permalink($post->ID).'" rel="'.$imagepath.'" ></a>'.($att_desc == 'true' ? $imagedesc : '').'</div>'; 
                        } else
                        {
                            $out .= '<div class="post-no-photo-spliter"></div>'; 
                        }                   
                             
                        $out .= '<div class="post-content">                         
                            <a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>
                            <div class="info">
                                <a class="date-left"></a><a href="'.get_month_link($year, $month).'" class="date">'.get_the_time('F j, Y').'</a><a class="date-right"></a>
                                Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                                
                                $catlist = wp_get_post_categories($post->ID);
                                $count = count($catlist);
                                for($i = 0; $i < $count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', '; 
                                    }
                                    $cat = get_category($catlist[$i]);
                                    $out .= '<a href="'.get_category_link($catlist[$i]).'" >'.$cat->name.'</a>';
                                     
                                }                                
                            
                            $out .= '</div>';
                              
                            $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                            
                            $old_page = $page;
                            $page = 1;    
                            if($postdesc != '')
                            {
                                $out .= apply_filters('the_content', $postdesc);
                                $out .= ' <a href="'.get_permalink($post->ID).'">Read&nbsp;more</a>';                                    
                            } else
                            {
                                $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                            }
                            $page = $old_page;

                            
                           // post tags list
                           $out .= '<div class="blog-post-bottom-wrapper">';
                           
                            if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $novoting == '' and $att_voting == 'true')
                            {
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                }
                            }                                
                           
                           $posttags = get_the_tags();                              
                           $count = 0;
                           if($posttags !== false)
                           {
                                $count = count($posttags);
                           }
                            
                           if($count > 0)
                           {   
                               $out .= '<div class="blog-post-tags">
                                        <span class="name">Tags:</span> ';
                               
                               $i = 0;            
                               foreach($posttags as $tag)
                               {   
                                   if($i > 0)
                                   {
                                       $out .= ',&nbsp;';
                                   }
                                   $title = '';
                                   if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; } 
                                   
                                   $out .= '<a href="'.get_tag_link($tag->term_id).'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
                                   $i++;
                               }                       
                               $out .= '</div>';                                            
                                
                           } else
                           { 
                                if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
                                {                                
                                   $out .= '<div class="blog-post-tags">
                                            There are no tags associated with this post.                           
                                        </div>';   
                                }                                                                                 
                           }                            
                        $out .= '<div class="clear-both"></div></div>';     
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';
                
            } // while
        }
        wp_reset_query();        
        return $out;    
    } 
    
    # SHORTCODE: 
    #   dcs_contactform (display full email contact form)
    # PAREMAETERS:
    #   title - title displayed for contact form, default empty string
    #   email - email address attached to contact form, if empty string, email from CMS will be used (default empty string)
    # NOTES:       
    public function dcs_contactform($atts, $content=null, $code="")
    {
        $out = '';                 
        $defatts = Array(
          'title' => '',
          'email' => ''          
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_title = $atts['title'];
        $att_email = $atts['email'];
        
        if($att_email == '')
        {
            $att_email = GetDCCPInterface()->getIGeneral()->getContactMail();
        } 
        
        $out .= '<div class="common-form"  '.($att_title == '' ? 'style="background-image:none;"' : '').' >'; 
        
            if($att_title != '')
            {
                $out .= '<h4>'.$att_title.'</h4>'; 
            }
            $out .= '<form>'; 
                $out .= '<p>Your Name: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="name" class="text-ctrl-small" />';
                
                $out .= '<p>Your Email: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="email" class="text-ctrl-small" />'; 
                 
                $out .= '<p>Subject: <span class="required">(required)</span></p>'; 
                $out .= '<input type="text" name="subject" class="text-ctrl-small" />';  
                
                    $out .= '<p>Your Message: <span class="required">(required)</span></p>'; 
                    $out .= '<textarea cols="70" rows="8" name="message" class="textarea-ctrl"></textarea>';                   
                    $out .= '<input type="hidden" value="'.$att_email.'" name="contact-mail-dest" />';
                    $out .= '<input type="hidden" value="'.GetDCCPInterface()->getIGeneral()->getContactSendOkay().'" name="contact-okay" />';
                    $out .= '<input type="hidden" value="'.GetDCCPInterface()->getIGeneral()->getContactSendError().'" name="contact-error" /><div style="height:5px;"></div>';                     
                    $out .= '<a class="send-email-btn">'.GetDCCPInterface()->getIGeneral()->getContactSendButtonName().'</a>';
                    $out .= '<span class="result">Information about email sending process</span>';                 
                               
            $out .= '</form>'; 

        $out .= '</div> <!-- common-form -->';           
        
        return $out;        
    }


    # SHORTCODE: 
    #   dcs_searchform (display search on page form)
    # PAREMAETERS:
    #   title - title displayed for search form, default empty string
    #   query - displayed query on start, default 'Search..' string
    #   size - input box width, can be set to 'small', 'long' or 'full', default 'long'
    #   btn - search button name, default 'Search'
    #   top - margin top in pixels (default 15 px)
    #   bottom - margin bottom in pixels (default 15 px)
    #   posts - if set to true, search in posts checkbox will be displayed (default false)
    #   news - if set to true, search in news checkbox will be displayed   
    #   pages - if set to true, search in pages checkbox will be displayed
    #   projects - if set to true, search in projects checkbox will be displayed
    #   sposts - if set to true, posts checkbox will be selected
    #   snews - if set to true, news checkbox will be selected   
    #   spages - if set to true, pages checkbox will be selected 
    #   sprojects - if set to true, projects checkbox will be selected 
    # NOTES:       
    public function dcs_searchform($atts, $content=null, $code="")
    {
        $out = '';                 
        $defatts = Array(
          'title' => '',
          'query' => 'Search..',
          'size' => 'long',
          'btn' => 'Search',
          'top' => 15,
          'bottom' => 15,
          'posts' => 'false',
          'news' => 'false',
          'projects' => 'false',
          'pages' => 'false',
          'sposts' => 'false',
          'snews' => 'false',
          'sprojects' => 'false',
          'spages' => 'false'                      
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_title = $atts['title'];
        $att_query = $atts['query'];
        $att_size = $atts['size'];
        $att_top = $atts['top'];
        $att_bottom = $atts['bottom'];        

        $att_posts = $atts['posts'];
        $att_news = $atts['news'];
        $att_projects = $atts['projects'];
        $att_pages = $atts['pages'];

        $att_sposts = $atts['sposts'];
        $att_snews = $atts['snews'];
        $att_sprojects = $atts['sprojects'];
        $att_spages = $atts['spages'];
        
        if($att_size != 'long' and $att_size != 'small' and $att_size != 'full')
        {
            $att_size = 'long';
        } 
        $att_btn = $atts['btn'];
        
 
        $style = ' style="';
        $style .= $att_title == '' ? 'background-image:none;' : '';
        $style .= 'margin-top:'.$att_top.'px;';
        $style .= 'margin-bottom:'.$att_bottom.'px;';
        $style .= '" ';
 
        $out .= '<div class="common-form" '.$style.' >';
                
                if($att_title != '')
                {
                    $out .= '<h4>'.$att_title.'</h4>';
                }
                
                $out .= '<form action="'.get_bloginfo('url').'" method="get">
                    <input class="text-ctrl-'.$att_size.'" type="text" value="'.$att_query.'" name="s" />
                    &nbsp;<input class="search-btn" style="margin-top:0px;" type="submit" value="'.$att_btn.'" />';
                    if($att_posts == 'true' or $att_pages == 'true' or $att_news == 'true' or $att_projects == 'true')
                    {
                        $out .= '<div style="height:10px;"></div>';                    
                        if($att_posts == 'true')
                        {
                            $out .= '<input name="s_in_posts" type="hidden" value="'.($att_sposts == 'true' ? 'on' : '').'" /><span id="s_in_posts" class="search-type '.($att_sposts == 'true' ? 'cbox-selected' : 'cbox').'"></span><span class="search-type-label">Posts</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  
                        }
                        if($att_pages == 'true')
                        {                        
                            $out .= '<input name="s_in_pages" type="hidden" value="'.($att_spages == 'true' ? 'on' : '').'" /><span id="s_in_pages" class="search-type '.($att_spages == 'true' ? 'cbox-selected' : 'cbox').'"></span><span class="search-type-label">Pages</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        if($att_news == 'true')
                        {                        
                            $out .= '<input name="s_in_news" type="hidden" value="'.($att_snews == 'true' ? 'on' : '').'" /><span id="s_in_news" class="search-type '.($att_snews == 'true' ? 'cbox-selected' : 'cbox').'"></span><span class="search-type-label">News</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        if($att_projects == 'true')
                        {                        
                            $out .= '<input name="s_in_projects" type="hidden" value="'.($att_sprojects == 'true' ? 'on' : '').'" /><span id="s_in_projects" class="search-type '.($att_sprojects == 'true' ? 'cbox-selected' : 'cbox').'"></span><span class="search-type-label">Projects</span>';
                        }
                    }
                $out .= '</form> 
            </div>';    
 
        return $out;        
    } 
    
    # SHORTCODE: 
    #   dcs_page (display single page in shorter version)
    # PAREMAETERS:
    #   id - displayed page id, required valid value
    #   desc - if true page description will be displayed, default true
    #   voting - if set to 'true' voting interface is displayed, default set to false
    # NOTES:                
    public function dcs_page($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        
        
        $out = '';                 
        $defatts = Array(
          'id' => -1,
          'desc' => 'true',
          'voting' => 'false'         
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_postid = $atts['id'];
        $att_desc = $atts['desc'];
        $att_voting = $atts['voting'];  
        
        $args=array('page_id' => $att_postid);
        
        $new_query = new WP_Query($args);                            
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                              
                
                
                $pagedesc = get_post_meta($post->ID, 'page_desc', true); 
                
                $month = get_the_time('n', $post->ID);
                $year = get_the_time('Y', $post->ID); 

                $out .= '
               
                    <div class="blog-post">';                                                            
                             
                        $out .= '<div class="post-no-photo-spliter"></div>'; 
                        $out .= '<div class="post-content">                         
                            
                            <div class="info">
                                <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span>
                                Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('nickname', $post->post_author).'</a>';
                                                                                         
                            $out .= '</div>';
                              
                            $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                                
                            if($att_desc == 'true')
                            {   
                                $content = trim($content);           
                                if($content !== '')
                                {  
                                   $out .= do_shortcode($content);
                                   $out .= ' <a href="'.get_permalink($post->ID).'" class="more-link">Read&nbsp;more</a>';  
                                } else
                                if($pagedesc != '')
                                {                                   
                                    $out .= do_shortcode($pagedesc);
                                    $out .= ' <a href="'.get_permalink($post->ID).'" class="more-link">Read&nbsp;more</a>'; 
                                }
                                
                            }
                                                                                                                  
                           $out .= '<div class="blog-post-bottom-wrapper">';
                           
                            if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $att_voting == 'true')
                            {
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                }
                            } 
                            $out .= '</div>';                            
                            
                            
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';
                
            } // while
        }
        wp_reset_query();        
        return $out;    
    }     
    
    # SHORTCODE: 
    #   dcs_fly_gallery (display circle gallery)
    # PAREMAETERS:
    #   size - can be set to small, or big, default set on small (use big size only on full width page without sidebar)
    # NOTES:                
    public function dcs_fly_gallery($atts, $content=null, $code="")
    {      
        $out = '';                 
        $defatts = Array(
          'size' => 'small',
          'resize' => 'true'          
        );
        
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_size = $atts['size'];
        $att_resize = $atts['resize']; 
        
        if($att_size != 'small' and $att_size != 'big')
        {
            $att_size = 'small';
        }
       
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        
        $slide_width = 300;
        $slide_height = 200;
        $class = 'dcs-circle-gallery';
        if($att_size == 'big')
        {
            $slide_width = 450;
            $slide_height = 300;
            $class = 'dcs-circle-gallery-big';            
        }  
  
       
        $out .= '<div class="'.$class.'">';                

        // src="http://localhost/work/Prestige/wp-content/themes/Prestige/thumb.php?src=http://localhost/work/Prestige/wp-content/uploads/2010/08/1.jpg&w=80&h=80&zc=1"
        foreach($paths as $image)
        {
            $data = explode('+', $image);
            $count = count($data);
            $path = $data[0];
            
            if($att_resize == 'true')
            {
                $path = get_bloginfo('template_url').'/thumb.php?src='.$path.'&w='.$slide_width.'&h='.$slide_height.'&zc=1';
            }
            
            $title = '';
            $link = '';
            
            if($count > 1)
            {
                for($i = 1; $i < $count; $i++)
                {                
                    if(strpos($data[$i], '{title}') !== false)
                    {
                        $title = str_replace('{title}', '', $data[$i]);
                    } else
                    if(strpos($data[$i], '{link}') !== false)
                    {
                        $link = str_replace('{link}', '', $data[$i]);
                    }                  
                }                
            }
            
            $out .= '<a class="slide" '.
                    ($title != '' ? ' rel="'.$title.'" ' : '').($link != '' ? ' href="'.$link.'" ' : '').'  ><img src="'.$path.'" /></a>';
        }
                
        $out .=        
                '<div class="panel">
                    <div class="prev">Prev</div>
                    <span class="counter"></span>
                    <span class="title"></span> 
                    <div class="next">Next</div>
                </div> 
             </div>';       
       
        return $out;    
    }      
    
    # SHORTCODE: 
    #   dcs_chain_gallery
    # PAREMAETERS:
    #   id - next gen gallery id, must be set to valid value
    #   random - display random images, can be set to true or false (default true)
    #   number - number of images to display, if zero all images are displayed (default zero)
    #   set - pictures ids to show e.g '34,2,54,8' (default not set)
    #   h - slide height in pixels (default 600 px)
    #   w - slide width in pixels (default 270 px)
    #   th - thumb height in pixels (default 50 px)
    #   tw - thumb width in pixels (default 50 px)
    #   bcolor - frame color, can be set to any CSS valid valu for color property (default #FFCC00)
    #   trans - can be set to none, slide or fade (default fade) 
    #   autoplay - can best seto to true or false (default true)
    #   desc - if true images description will be displayed (default true)
    #   pageid - page id for slider (default not set)
    #   url - manullay link fo slider, if set pageid parameter will be overwrited (default not set)
    #   shadow - if set to true, slider will have small shadow (default false)
    # NOTES:     
    public function dcs_chain_gallery($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'gid' => CMS_NOT_SELECTED,
          'random' => 'false',
          'number' => 0,
          'set' => '',
          'w' => 600,
          'h' => 270,
          'tw' => 50,
          'th' => 50,
          'bcolor' => '#FFCC00',
          'trans' => 'fade',
          'autoplay' => 'true',
          'desc' => 'true',
          'pageid' => CMS_NOT_SELECTED,
          'url' => '',
          'shadow' => 'false',
          'name' => 'false',
          'size' => 3,
          'float' => 'none',
          'margin' => '0px 0px 15px 0px'
        );         
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_id = $atts['gid'];
        $att_random = $atts['random']; 
        $att_set = $atts['set'];         
        $att_number = (int)$atts['number']; 
        $att_w = (int)$atts['w'];         
        $att_h = (int)$atts['h']; 
        $att_tw = (int)$atts['tw'];         
        $att_th = (int)$atts['th']; 
        $att_bcolor = $atts['bcolor'];
        $att_trans = $atts['trans']; 
        $att_autoplay = $atts['autoplay'];
        $att_desc = $atts['desc'];
        $att_pageid = $atts['pageid'];
        $att_url = $atts['url'];
        $att_shadow = $atts['shadow']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin']; 
        
        $att_name = $atts['name'];
        $att_size = $atts['size'];         
        
        if($att_pageid != CMS_NOT_SELECTED)
        {
            $att_pageid = get_permalink($att_pageid);
            if($att_url == '')
            {
                $att_url = $att_pageid;    
            }    
        } 
        
        if($att_url != '')
        {
            $att_url = ' href="'.$att_url.'" ';
        }
               
       
        $pics_id_list = explode(',', $att_set);
       
        if($att_id != CMS_NOT_SELECTED or ($att_random == 'true'))
        {
            global $nggdb;
            if(isset($nggdb))
            {              
                $pics = null;
                if($att_random == 'true')
                {
                    if($att_id == CMS_NOT_SELECTED) { $att_id = 0; }
                    $pics = $nggdb->get_random_images($att_number, $att_id); 
                } else
                {
                    if($att_set == '')
                    {
                        $pics = $nggdb->get_gallery($att_id, 'sortorder', 'ASC', true, $att_number, $start = 0);
                    } else
                    {
                        $pics = $nggdb->find_images_in_list($pics_id_list, false);     
                    }
                }               
                
                if($pics !== null)
                {
                    $slider_style = ' style="';
                    $slider_style .= 'margin:'.$att_margin.';float:'.$att_float.';';
                    $slider_style .= '" ';
                    
                    $out .= '<div class="chain-slider" '.$slider_style.'>';
                    
                    $class = '';
                    if($att_shadow == 'true')
                    {
                        $class = ' slides-wrapper-shadow'; 
                    }
                    
                    $slide_style = ' style="width:'.$att_w.'px;height:'.$att_h.'px;" ';
                    $out .= '<div class="slides-wrapper'.$class.'" '.$slide_style.'>'; 
                    foreach($pics as $pic)
                    {   // alttext                    
                        $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1'.'" ';
                        $out .= '<div class="slide" '.$slide_style.'><a '.$att_url.' class="loader async-img" '.$slide_style.' '.$rel.'></a>';
                        if(($att_desc == 'true' and $pic->description != '') or ($att_name == 'true' and $pic->alttext != ''))
                        {
                            $show_title = false;
                            if($att_name == 'true' and $pic->alttext != '')
                            {
                               $show_title = true; 
                            }
                            
                            $out .= '<div class="desc-wrapper" '.(!$show_title ? ' style="padding-top:10px;" ' : '').'>';
                            if($show_title) 
                            {
                                $out .= '<h'.$att_size.' class="title">'.$pic->alttext.'</h'.$att_size.'>';
                            }                            
                            
                            $out .= '<div class="desc" style="width:'.($att_w-40).'px;">'.stripcslashes($pic->description).'</div>';
                            $out .= '</div>';
                        }

                        $out .= '</div>';
                    }
                    $out .= '</div>';
                    
                    $out .= '<div class="thumbs-wrapper" style="height:'.($att_th+2).'px;">';
                        $out .= '<ul class="thumbs-slider">';
                            $counter = 0;
                            foreach($pics as $pic)
                            {
                                $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_tw.'&h='.$att_th.'&zc=1'.'" ';
                                $out .= '<li style="width:'.$att_tw.'px;height:'.$att_th.'px;"><a class="loader async-img-s" '.$rel.' style="width:'.$att_tw.'px;height:'.$att_th.'px;"></a><em class="data">'.$counter.'</em><span style="width:'.($att_tw-4).'px;height:'.($att_th-4).'px;"></span></li>';       
                                $counter++;
                            }
                        $out .= '</ul>';                    
                    $out .= '</div>';
                    
                    $out .= '<span class="border-color data">'.$att_bcolor.'</span>'; 
                    $out .= '<span class="trans data">'.$att_trans.'</span>';
                    $out .= '<span class="autoplay data">'.$att_autoplay.'</span>';                      
                    $out .= '</div>';
                }
            }
        }        
 
        return $out;
    }   
    

  
    
    # SHORTCODE: 
    #   dcs_box
    # PAREMAETERS:
    #   margin - margin, you can use format 0px 0px 0px 0px, default no margin
    #   padding - padding, you can use format 0xpx 0px 0px 0px, default no padding,
    #   bg - can be set to true or false, if false background is removed, default true
    # NOTES:     
    public function dcs_box($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'margin' => '0px 0px 15px 0px',
          'padding' => '10px 0px 0px 0px',
          'bg' => 'true',
          'path' => '',
          'repeat' => 'no-repeat',
          'pos' => 'center top',
          'usersrc' => '',
          'bgcolor' => '',
          'rounded' => 0,
          'border' => 'false',
          'bcolor' => '#202020',
          'bstyle' => 'solid',
          'bwidth' => 1
        );         
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_margin = $atts['margin'];
        $att_padding = $atts['padding'];               
        $att_bg = $atts['bg'];
        $att_repeat = $atts['repeat']; 
        $att_pos = $atts['pos'];
        $att_path = $atts['path'];
        $att_usersrc = $atts['usersrc'];
        $att_bgcolor = $atts['bgcolor'];
        $att_rounded = (int)$atts['rounded'];
        
        $att_border = $atts['border']; 
        $att_bcolor = $atts['bcolor'];
        $att_bstyle = $atts['bstyle'];
        $att_bwidth = (int)$atts['bwidth'];
        
        $content = do_shortcode($content);

        if($att_usersrc != '')
        {
            $att_path = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;
        }        
        
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        $style .= 'padding:'.$att_padding.';';
        $style .= $att_bg == 'false' ? 'background:none;' : '';
        if($att_path != '')
        {
            $style .= 'background-image:url('.$att_path.');';
            $style .= 'background-position:'.$att_pos.';';
            $style .= 'background-repeat:'.$att_repeat.';';
        }
        if($att_bgcolor != '')
        {
            $style .= 'background-color:'.$att_bgcolor.';';    
        }
        if($att_border == 'true')
        {
            $style .= 'border:'.$att_bwidth.'px '.$att_bstyle.' '.$att_bcolor.';';    
        }        
        $style .= '" ';
        
        $class = '';
        if($att_rounded > 0)
        {
            $class = 'rounded-borders-'.$att_rounded;    
        }
        
        $out .= '<div class="dcs-box '.$class.'" '.$style.'>'.$content.'</div>'; 
        return $out;
    }     
    
    
    # SHORTCODE: 
    #   dcs_rounded_box
    # PAREMAETERS:
    #   margin - margin, you can use format 0px 0px 0px 0px, default no margin
    #   padding - padding, you can use format 0xpx 0px 0px 0px, default no padding,
    # NOTES:     
    public function dcs_rounded_box($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'margin' => '0px 0px 15px 0px',
          'padding' => '10px 10px 10px 10px',
          'bg' => 'false',
          'path' => '',
          'repeat' => 'no-repeat',
          'pos' => 'center top',
          'usersrc' => '',
          'bgcolor' => '#F9F9F9',
          'rounded' => 3,
          'border' => 'true',
          'bcolor' => '#D0D0D0',
          'bstyle' => 'solid',
          'bwidth' => 1                     
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_margin = $atts['margin'];
        $att_padding = $atts['padding'];               
        $att_repeat = $atts['repeat']; 
        $att_pos = $atts['pos'];
        $att_path = $atts['path'];        
        $att_usersrc = $atts['usersrc'];
        $att_bgcolor = $atts['bgcolor']; 
        $att_rounded = (int)$atts['rounded'];
        
        $att_border = $atts['border']; 
        $att_bcolor = $atts['bcolor'];
        $att_bstyle = $atts['bstyle'];
        $att_bwidth = (int)$atts['bwidth'];        
        
        $content = do_shortcode($content);

        if($att_usersrc != '')
        {
            $att_path = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;
        }         
        
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        $style .= 'padding:'.$att_padding.';';
        $style .= $att_bg == 'false' ? 'background:none;' : '';
        if($att_path != '')
        {
            $style .= 'background-image:url('.$att_path.');';
            $style .= 'background-position:'.$att_pos.';';
            $style .= 'background-repeat:'.$att_repeat.';';
        }
        if($att_bgcolor != '')
        {
            $style .= 'background-color:'.$att_bgcolor.';';    
        }
        if($att_border == 'true')
        {
            $style .= 'border:'.$att_bwidth.'px '.$att_bstyle.' '.$att_bcolor.';';    
        }         
        $style .= '" ';        
        
        $class = '';
        if($att_rounded > 0)
        {
            $class = 'rounded-borders-'.$att_rounded;    
        }        
        
        $out .= '<div class="dcs-rounded-box '.$class.'" '.$style.'>'.$content.'</div>'; 
        return $out;
    }      
    
    
    # SHORTCODE: 
    #   dcs_gallery_box
    # PAREMAETERS:
    #   id - gallery page id, must be set to valid value
    #   size - can be set to small or big, small display only two images, big display four images, use small in pages with sidebar, default set to big
    #   random - if set to true, random thumbs will be displayed, if set to false first 2/4 thumbs will be displayed, default set to true
    #   group - can be set to true or false, if true images a grouped, in default is set to true
    # NOTES:     
    public function dcs_gallery_box($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'id' => CMS_NOT_SELECTED,
          'size' => 'big',
          'random' => 'true',
          'group' => 'true',
          'bottom' => 0,
          'top' => 0
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_id = $atts['id'];
        $att_size = $atts['size'];
        $att_random = $atts['random'];  
        $att_group = $atts['group']; 
        $att_bottom = (int)$atts['bottom'];  
        $att_top = (int)$atts['top'];
        
        // check size
        if($att_size != 'small' and $att_size != 'big')
        {
            $att_size = 'big';
        }
        $number = 4;
        if($att_size == 'small')
        {
            $number = 2;
        } 
        
        // check random
        if($att_random != 'true' and $att_random != 'false')
        {
            $att_random = 'true';
        }
        
        $box_style = ' style="';
        $box_style .= 'margin-bottom:'.$att_bottom.'px;';            
        $box_style .= 'margin-top:'.$att_top.'px;';
        $box_style .= '" ';
        
        if($att_id != CMS_NOT_SELECTED)
        {
            $gid = get_post_meta($att_id, 'page_gallery', true);
            
            global $nggdb;
            if(isset($nggdb))
            {
                $gallery = $nggdb->find_gallery($gid);
                
                if($gallery != null)
                {    
                    $pics = null;
                    if($att_random == 'true')
                    {
                        $pics = $nggdb->get_random_images($number, $gid); 
                    } else
                    {
                        $pics = $nggdb->get_gallery($gid, 'sortorder', 'ASC', true, $number, $start = 0);    
                    }
                    
                    $out .= '<div class="dcs-gallery-box" '.$box_style.'>';
                    $out .= '<div class="description"><h3><a href="'.get_permalink($att_id).'">'.$gallery->title.'</a></h3>'.$gallery->galdesc.' <a href="'.get_permalink($att_id).'">Open&nbsp;gallery</a></div>'; 
                    
                    foreach($pics as $thumb)
                    {
                       // $out .= '<a href="'.$thumb->imageURL.'" rel="lightbox'.($att_group == 'true' ? '['.$gallery->name.']' : '').'" title="'.$thumb->description.'">';
                       // $out .= '<img class="thumb framed" src="'.$thumb->thumbURL.'" /></a>';
                       
                        $out .= '<div class="thumb-wrapper">
                            <div class="img-wrapper framed"><a class="loader async-img" rel="'.$thumb->thumbURL.'"></a></div>
                            <a href="'.$thumb->imageURL.'" class="triger" rel="lightbox'.($att_group == 'true' ? '['.$gallery->name.']' : '').'" title="'.$thumb->description.'"></a>
                        </div>';                       
                    }
                    
                    $out .= '<div class="clear-both"></div></div>';
                    
                }                 
            }
        }
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_heading
    # PAREMAETERS:
    #   align - left, right, center, default set to center
    #   size - 1, 2, 3, 4 5, or 6, in default seto to 4
    #   line - small or big, if set thin underline will be displayed
    #   color - color given in hex, this parametr is optional, if not set default theme CSS settings will be used
    #   bottom - margin bottom in pixels, default not set
    #   sub - subtitle, default empty string
    # NOTES:     
    public function dcs_heading($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'align' => 'center',
          'size' => '4',
          'line' => '',
          'color' => '',
          'bottom' => '',
          'sub' => '',
          'fsize' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_align = $atts['align'];
        $att_size = $atts['size'];
        $att_line = $atts['line'];
        $att_color = $atts['color']; 
        $att_bottom = $atts['bottom'];
        $att_sub = $atts['sub'];
        $att_fsize = $atts['fsize'];
        
        if($att_align != 'left' and $att_align != 'right' and $att_align != 'center')
        {
            $att_align = 'center';
        }
        
        if($att_size < 1 or $att_size > 6)
        {
            $att_size = 4;
        }            
        
        $style = ' style="';
        $style .= $att_color != '' ? 'color:'.$att_color.';' : '';
        $style .= 'text-align:'.$att_align.';';
        $style .= $att_bottom != '' ? 'margin-bottom:'.$att_bottom.'px;' : '';
        $style .= $att_fsize != '' ? 'font-size:'.$att_fsize.'px;line-height:'.$att_fsize.'px;' : '';
        $style .= '" ';
        
        
        
        
        $class = '';
        if($att_line == 'small')  
        {
            $class = ' class="dcs-heading" ';
        }
        if($att_line == 'big')  
        {
            $class = ' class="dcs-heading920" ';
        }        
        
        $out .= '<h'.$att_size.' '.$class.$style.' >'.$content.($att_sub != '' ? '<span>'.$att_sub.'</span>' : '').'</h'.$att_size.'>';
        
        return $out;   
    }    
    
    # SHORTCODE: 
    #   dcs_info 
    # PAREMAETERS:
    #   name - info name string, default 'Name'
    #   value - value info assinged to name, defualt  'Value'
    #   link - url, default empty string
    #   type - can be set to small or big, default small
    # NOTES:           
    public function dcs_info($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'name' => 'Name',
          'value' => 'Value',
          'link' => '',
          'type' => 'small',
          'postfix' => '&nbsp;'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_name = $atts['name'];        
        $att_value = $atts['value'];
        $att_link = $atts['link'];
        $att_type = $atts['type']; 
        $att_postfix = $atts['postfix']; 
        
        $postfix = '';
        if($att_type == 'big')
        {
            $postfix = '-movie';    
        }
        
        $out .= '<span class="dcs-info-name'.$postfix.'">'.$att_name.':</span>&nbsp;';
        
        if($att_link == '')
        {
            $out .= '<span class="dcs-info-value'.$postfix.'">'.$att_value.'</span><span class="dcs-info-postfix">'.$att_postfix.'</span>';
        } else
        {
            $out .= '<a class="dcs-info-link'.$postfix.'" target="_blank" href="'.$att_link.'">'.$att_value.'</a><span class="dcs-info-postfix">'.$att_postfix.'</span>';  
        }
        
        return $out;  
    }         
    
    # SHORTCODE: 
    #   dcs_project_map 
    # PAREMAETERS:
    #   columns - can be set to 2, or 3, use 2 columns for pages with sidebar and 3 columns for full width pages, default set to 3
    #   cat - slug list of project types to display, default empty string, so all types will be displayed, string e.g 'type1,type2'
    #   title - if 'true' title will be displayed under popup image, default set to false
    # NOTES:           
    public function dcs_project_map($atts, $content=null, $code="")
    {
        global $post;
        
        $out = '';
        $defatts = Array(
          'columns' => 3,
          'cat' => '',
          'title' => 'false',
          'hsize' => 4,
          'color' => $this->_theme_main_color,
          'ptop' => 0,
          'pbottom' => 0,
          'count' => -1
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_columns = (int)$atts['columns'];
        $att_cat = $atts['cat'];        
        $att_title = $atts['title'];
        $att_size = (int)$atts['hsize'];
        $att_color = $atts['color']; 
        $att_ptop = (int)$atts['ptop'];
        $att_pbottom = $atts['pbottom']; 
        $att_count = (int)$atts['count'];
        
        if($att_count == 0) { $att_count = -1; }
        
        if($att_title != 'false' and $att_title != 'true')
        {
            $att_title = 'false';
        } 
        
        if($att_size != 3 and $att_size != 4)
        {
            $att_size = 4;
        }
        
        if($att_columns != 2 and $att_columns != 3)
        {
            $att_columns = 3;
        }
        
        $data = null;
        if($att_cat != '')
        {
            $types = explode(',', $att_cat);
            $data = Array();
            foreach($types as $ty)
            {
                $obj = get_term_by('slug', $ty, 'project_cat', OBJECT);
                array_push($data, $obj);    
            }            
        } else
        {
           $data = get_terms('project_cat', array('orderby'=>'name', 'hide_empty'=>true));  
        }
        $count = count($data);                         
        
        $style = ' style="padding-top:'.$att_ptop.'px;padding-bottom:'.$att_pbottom.'px;" ';
        
        $out .= '<div class="project-map" '.$style.'>';
        $rendered = 0;
        $PROJECTS_MAP_COLUMNS_COUNT = $att_columns;  
        foreach($data as $pt)
        {
            if($rendered > 0)
            {
                $out .= '<div class="column-separator"></div>';
            }
            $out .= '<div class="column">';
            $out .= '<h'.$att_size.'><a href="'.get_term_link($pt->slug, 'project_cat').'">'.$pt->name.'</a></h'.$att_size.'><hr />';
            
            $args = Array('post_type' => 'project', 'taxonomy' => 'project_cat', 'term' => $pt->slug, 'posts_per_page' => $att_count);
            $qr = new WP_Query($args);
            if($qr->have_posts())
            {   
                $out .= '<ul>';
                while($qr->have_posts())
                {
                    $qr->the_post();
                    $thumb = get_post_meta($post->ID, 'project_thumb', true);
                    
                    $title = $att_title == 'true' ? ' title="'.$post->post_title.'" ' : '';
                    $out .= '<li style="color:'.$att_color.';"><a class="pu_img" href="'.get_permalink($post->ID).'" rel="'.$thumb.'" '.$title.'>'.$post->post_title.'</a></li>';
                }
                $out .= '</ul>';
            }
            wp_reset_query();          
            
            $out .= '</div>'; // column
            $rendered++;
            if($rendered % $PROJECTS_MAP_COLUMNS_COUNT == 0 and $rendered != $count)
            {
                $rendered = 0;
                $out .= '<div class="h-separator"></div>';
            }  
        }
        $out .= '<div class="clear-both"></div></div>'; // project-map        
        
        return $out;  
    }  
    
    # SHORTCODE: 
    #   dcs_project_top 
    # PAREMAETERS:
    # NOTES:           
    public function dcs_project_top($atts, $content=null, $code="")
    {
        global $post;
        global $pt_list;

        $out .= '<div class="dcs-project-top">';       
                $out .= '<div class="post-content">';                         
                    
                    if(comments_open($post->ID))
                    {
                        $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
                    }
                    $out .= '<div class="info">
                        <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span> in ';
                        
                        $pt_count = count($pt_list);
                        for($i = 0; $i < $pt_count; $i++)
                        {
                            if($i > 0)
                            {
                               $out .= ', '; 
                            }
                            $out .= '<a href="'.get_term_link($pt_list[$i]->slug, 'project_cat').'">'.$pt_list[$i]->name.'</a>';
                             
                        }                                
                    
                    $out .= '</div>';
                      
                    $out .= '<h2>'.$post->post_title.'</h2>';
                    
                $out .= '</div> <!-- content -->                 
            </div> <!-- dcs-project-top -->';          
        
        return $out;  
    } 
    
    # SHORTCODE: 
    #   dcs_project_author 
    # PAREMAETERS:
    # NOTES:           
    public function dcs_project_author($atts, $content=null, $code="")
    {
        global $post;
        
        if(GetDCCPInterface()->getIGeneral()->showProjectAuthor()) 
        {                           
            $nosidebar = get_post_meta($post->ID, 'project_nosidebar', true);
            
            $default_avatar = get_bloginfo('template_url').'/img/common_files/avatar2.jpg';
            $authoremail = get_the_author_meta('user_email', $post->post_author);
            $avatar = get_avatar($authoremail, '60', $default_avatar);
   
            $author_posts_count = get_the_author_posts();
            $author_tip = $author_posts_count . ($author_posts_count > 1 ? ' posts' : ' post');   
           $out = '';
           $out = '
                 <div class="blog-post-author"> 
            
                <h4>ABOUT THE AUTHOR</h4> 
            
                <div class="avatar"> 
                    '.$avatar.' 
                </div> <!--avatar-->                       
                                        
                <div class="desc-wrapper" '.($nosidebar != '' ? ' style="width:800px;" ' : ' style="width:480px;" ').'>                     
                    <div class="float-left"> 
                        <p class="author">'.get_the_author_meta('display_name', $post->post_author).'</p> 
                        <p class="authorTitle">'.get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author).'</p> 
                    </div>'; 
                    
                    $author_url = get_the_author_meta('user_url', $post->post_author);
                    if($author_url != '')
                    {
                        $out .= '<div class="float-right"> 
                            <a href="'.$author_url.'" class="authorLink" target="_blank">Visit Authors Site</a> 
                        </div>';
                    }
                     
                    $out .= '<div class="clear-both"></div>
                    <div style="float: left;"> 
                        <p class="desc">'.get_the_author_meta('description', $post->post_author).' '.
                        '<a title="'.$author_tip.'" class="link-tip-right" href="'.get_author_posts_url($post->post_author).'">View&nbsp;all&nbsp;posts&nbsp;by&nbsp;'.get_the_author_meta('display_name', $post->post_author).'</a></p> 
                    </div> 
                </div>
               
                <div class="clear-both"></div> 
            
            </div> <!--blog-post-author-->               
           ';
        }
 
        return $out;  
    }     
    
    # SHORTCODE: 
    #   dcs_project_bottom 
    # PAREMAETERS:
    # NOTES:           
    public function dcs_project_bottom($atts, $content=null, $code="")
    {
        global $post;
        $defatts = Array(
          'voting' => 'true'
        ); 
        $atts = shortcode_atts($defatts, $atts);        
        $att_voting = $atts['voting'];                
        
        $projectinfo = get_post_meta($post->ID, 'project_info', true);  
        
        $out .= '<div class="dcs-project-bottom">';       
        $out .= GetDCCPInterface()->getIGeneral()->renderNextPrevPostPanel($post->post_type);
        
                            if(GetDCCPInterface()->getIGeneral()->showProjectVoting() and $att_voting == 'true')
                            {                            
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                }
                            }        
        
                            $out .= '<div>';

                               $out .= '<div class="blog-post-tags-single">';
                               $out .= do_shortcode($projectinfo);                      
                               $out .= '</div>';                                            
                    
                    if(GetDCCPInterface()->getIGeneral()->showCIForProjects())                                      
                    {
                        $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons();
                    }
                    
                        $out .= '<div class="clear-both"></div></div>';                                
                $out .= '</div> <!-- dcs-project-bottom -->';          
        
        return $out;  
    }            
    
    # SHORTCODE: 
    #   dcs_sicon 
    # PAREMAETERS:
    #   icon - 16x16 px icon name located in [theme path]/img/shortcodes folder
    # NOTES:           
    public function dcs_sicon($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'icon' => '',
          'url' => '',
          'tip' => '',
          'target' => '_self',
          'pos' => ''
        ); 
        
        if($atts['tip'] != '' and !isset($atts['pos']))
        {
            $defatts['pos'] = 'top';
        }         
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_icon = $atts['icon'];
        $att_url = $atts['url']; 
        $att_tip = $atts['tip'];
        $att_pos = $atts['pos'];
        $att_target = $atts['target'];
        
        $out .= '<a ';
        if($att_url != '')
        { 
            $out .= 'href="'.$att_url.'" ';
            $out .= 'target="'.$att_target.'" ';
        }
        $out .= ' class="dcs-sicon';
        if($att_tip != '')
        {
            switch($att_pos)
            {
                case 'left': $out .= ' link-tip-left'; break;
                case 'right': $out .= ' link-tip-right'; break;
                case 'top': $out .= ' link-tip-top'; break;
                case 'bottom': $out .= ' link-tip-bottom'; break;                                    
            }            
        }
        $out .= '" ';
        
        if($att_tip != '') 
        {
            $out .= ' title="'.$att_tip.'" ';  
        }
        
        $out .= 'style="background-image:url('.get_bloginfo('template_url').'/img/shortcodes/'.$att_icon.');"></a>';
        
        return $out;        
    }       
    
    # SHORTCODE: 
    #   dcs_simple_gallery 
    # PAREMAETERS:
    #   width - slider width in pixels, default set to 600 px
    #   height - slider height in pixels, default set to 300 px
    #   desc - slider description
    #   align - slider description text align
    #   ts - thumb size in pixels, default set to 50
    #   trans - can be set to fade, none or slide, default fade 
    # NOTES:           
    public function dcs_simple_gallery($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'width' => 600,
          'height' => 300,
          'desc' => '',
          'align' => 'left',
          'ts' => 50,
          'trans' => 'fade',
          'bcolor' => '#FFFFFF',
          'tb' => 15,
          'tt' => 15,
          'float' => 'none',
          'margin' => '0px auto 15px auto' 
        ); 
        
        $isset_tt = isset($atts['tt']);
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_ts = (int)$atts['ts'];
        $att_trans = $atts['trans']; 
        $att_bcolor = $atts['bcolor'];  
        $att_tb = $atts['tb'];          
        $att_tt = $atts['tt']; 
        
        $att_float = $atts['float'];          
        $att_margin = $atts['margin']; 
        
        
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        $count = count($paths);
        //var_dump($paths);        
                
        $con_style = ' style="';
        $con_style .= 'float:'.$att_float.';';
        $con_style .= 'margin:'.$att_margin.';';
        if($con_style != 'none')
        {
            $con_style .= 'width:'.$att_width.';';    
        }
        $con_style .= '" ';        
                
        $out .= '<div class="dcs-simple-gallery" '.$con_style.'>';
            $out .= '<span class="trans" style="display:none;">'.$att_trans.'</span>';
            $out .= '<div class="slider" style="width:'.$att_width.'px;height:'.$att_height.'px;">';
                for($i = 0; $i < $count; $i++)
                {
                    $rel = get_bloginfo('template_url').'/thumb.php?src='.$paths[$i].'&w='.$att_width.'&h='.$att_height.'&zc=1';
                    $out .= '<a class="slide async-img" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                    
                    $thumb_style = ' style="width:'.$att_ts.'px;height:'.$att_ts.'px;border-color:'.$att_bcolor.';';
                    if($isset_tt)
                    {
                        $thumb_style .= 'top:'.$att_tt.'px;';
                        $thumb_style .= 'bottom:auto;';
                    } else
                    {
                        $thumb_style .= 'bottom:'.$att_tb.'px;';
                    }
                    $thumb_style .= '" ';
                    
                    $src = get_bloginfo('template_url').'/thumb.php?src='.$paths[$i].'&w='.$att_ts.'&h='.$att_ts.'&zc=1'; 
                    $out .= '<a class="thumb async-img-s" '.$thumb_style.' rel="'.$src.'" /></a>';
                }
            $out .= '</div>';
            if($att_desc != '')
            {
                $out .= '<p class="desc" style="text-align:'.$att_align.';width:'.$att_width.'px;" >'.$att_desc.'</p>';
            }
        $out .= '</div>';
        
        return $out;  
    }       
               
    # SHORTCODE: 
    #   dcs_simple_gallery_thumbs 
    # PAREMAETERS:
    #   width - slider width in pixels, default set to 600 px
    #   height - slider height in pixels, default set to 300 px
    #   desc - slider description
    #   align - slider description text align 
    #   ts - thumb size in pixels, default set to 50
    #   trans - can be set to fade, none or slide, default fade       
    # NOTES:           
    public function dcs_simple_gallery_thumbs($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'width' => 600,
          'height' => 300,
          'desc' => '',
          'align' => 'left',
          'ts' => 40,
          'trans' => 'fade',
          'bcolor' => '#FFFFFF',
          'float' => 'none',
          'margin' => '0px auto 15px auto'                              
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_ts = (int)$atts['ts'];                
        $att_trans = $atts['trans']; 
        $att_bcolor = $atts['bcolor']; 
        
        $att_float = $atts['float'];          
        $att_margin = $atts['margin'];               
        
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        $count = count($paths);
        //var_dump($paths);  
        
        $con_style = ' style="';
        $con_style .= 'float:'.$att_float.';';
        $con_style .= 'margin:'.$att_margin.';';
        if($con_style != 'none')
        {
            $con_style .= 'width:'.$att_width.';';    
        }
        $con_style .= '" ';                 
                
        $out .= '<div class="dcs-simple-gallery-thumbs" '.$con_style.'>';
            $out .= '<span class="trans" style="display:none;">'.$att_trans.'</span>';
            $out .= '<div class="slider" style="width:'.$att_width.'px;height:'.$att_height.'px;">';
                for($i = 0; $i < $count; $i++)
                {
                    $rel = get_bloginfo('template_url').'/thumb.php?src='.$paths[$i].'&w='.$att_width.'&h='.$att_height.'&zc=1';
                    $out .= '<a class="slide async-img" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                    
                }                
            $out .= '</div>';
            if($att_desc != '')
            {
                $out .= '<p class="desc" style="text-align:'.$att_align.';width:'.$att_width.'px;" >'.$att_desc.'</p>';
            }            
            $out .= '<div class="thumbs-wrapper" style="width:'.$att_width.'px;">';
            for($i = 0; $i < $count; $i++)
            {            
                $src = get_bloginfo('template_url').'/thumb.php?src='.$paths[$i].'&w='.$att_ts.'&h='.$att_ts.'&zc=1'; 
                $out .= '<a class="thumb async-img-s" style="width:'.$att_ts.'px;height:'.$att_ts.'px;border-color:'.$att_bcolor.';" rel="'.$src.'" /></a>';
            }
            $out .= '<div class="clear-both"></div></div>';
        $out .= '</div>';
        
        return $out;  
    }      

    # SHORTCODE: 
    #   dcs_simple_gallery_ngg 
    # PAREMAETERS:
    #   gid - next gen gallery id, must be set to valid value 
    #   width - slider width in pixels, default set to 600 px
    #   height - slider height in pixels, default set to 300 px
    #   desc - slider description
    #   align - slider description text align
    #   random - true to display random images from gallery, false to display ordered list, default set to false
    #   count - number of thumbs to display, should be grater then zero
    #   trans - can be set to fade, none or slide, default fade        
    # NOTES:           
    public function dcs_simple_gallery_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'gid' => CMS_NOT_SELECTED,
          'width' => 600,
          'height' => 300,
          'desc' => '',
          'align' => 'left',
          'ts' => 50,
          'random' => 'true',
          'count' => 6,
          'trans' => 'fade',
          'bcolor' => '#FFFFFF',
          'tb' => 15,
          'tt' => 15,
          'float' => 'none',
          'margin' => '0px auto 15px auto'           
        ); 
        
        $isset_tt = isset($atts['tt']); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_gid = $atts['gid'];
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_ts = (int)$atts['ts'];
        $att_random = $atts['random'];
        $att_count = (int)$atts['count'];
        $att_trans = $atts['trans']; 
        
        $att_bcolor = $atts['bcolor'];  
        $att_tb = $atts['tb'];          
        $att_tt = $atts['tt']; 
        
        $att_float = $atts['float'];          
        $att_margin = $atts['margin'];          
    
        global $nggdb;
        if(isset($nggdb))
        {            
            $gallery = $nggdb->find_gallery($att_gid);

            if($gallery != null)
            {    
                $pics = null;
                if($att_random == 'true')
                {
                    $pics = $nggdb->get_random_images($att_count, $att_gid); 
                } else
                {
                    $pics = $nggdb->get_gallery($att_gid, 'sortorder', 'ASC', true, $att_count, 0);    
                } 
                
             
                $con_style = ' style="';
                $con_style .= 'float:'.$att_float.';';
                $con_style .= 'margin:'.$att_margin.';';
                if($con_style != 'none')
                {
                    $con_style .= 'width:'.$att_width.';';    
                }
                $con_style .= '" ';                    
                
                $out .= '<div class="dcs-simple-gallery" '.$con_style.'>';
                    $out .= '<span class="trans" style="display:none;">'.$att_trans.'</span>';
                    $out .= '<div class="slider" style="width:'.$att_width.'px;height:'.$att_height.'px;">';
                        foreach($pics as $pic)
                        {
                            $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_width.'&h='.$att_height.'&zc=1';
                            $out .= '<a class="slide async-img" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                            
                            $thumb_style = ' style="width:'.$att_ts.'px;height:'.$att_ts.'px;border-color:'.$att_bcolor.';';
                            if($isset_tt)
                            {
                                $thumb_style .= 'top:'.$att_tt.'px;';
                                $thumb_style .= 'bottom:auto;';
                            } else
                            {
                                $thumb_style .= 'bottom:'.$att_tb.'px;';
                            }
                            $thumb_style .= '" ';                            
                            
                            $src = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_ts.'&h='.$att_ts.'&zc=1'; 
                            $out .= '<a class="thumb async-img-s" '.$thumb_style.' rel="'.$src.'" /></a>';
                        }
                    $out .= '</div>';
                    if($att_desc != '')
                    {
                        $out .= '<p class="desc" style="text-align:'.$att_align.';width:'.$att_width.'px;" >'.$att_desc.'</p>';
                    }
                $out .= '</div>';                
                
            }
        }    
        return $out;         
    }    

    # SHORTCODE: 
    #   dcs_simple_gallery_thumbs_ngg 
    # PAREMAETERS:
    #   gid - next gen gallery id, must be set to valid value       
    #   width - slider width in pixels, default set to 600 px
    #   height - slider height in pixels, default set to 300 px
    #   desc - slider description
    #   align - slider description text align
    #   random - true to display random images from gallery, false to display ordered list, default set to false
    #   count - number of thumbs to display, should be grater then zero  
    #   trans - can be set to fade, none or slide, default fade         
    # NOTES:           
    public function dcs_simple_gallery_thumbs_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'gid' => CMS_NOT_SELECTED,          
          'width' => 600,
          'height' => 300,
          'desc' => '',
          'align' => 'left',
          'ts' => 40,
          'random' => 'true',
          'count' => 6,
          'trans' => 'fade',
          'bcolor' => '#FFFFFF',
          'float' => 'none',
          'margin' => '0px auto 15px auto'                                         
        ); 
        
        $atts = shortcode_atts($defatts, $atts);
        $att_gid = $atts['gid'];                 
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_ts = (int)$atts['ts'];
        $att_random = $atts['random'];
        $att_count = (int)$atts['count'];                         
        $att_trans = $atts['trans'];         
        $att_bcolor = $atts['bcolor']; 
        
        $att_float = $atts['float'];          
        $att_margin = $atts['margin'];          
        
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        $count = count($paths);
        
        $con_style = ' style="';
        $con_style .= 'float:'.$att_float.';';
        $con_style .= 'margin:'.$att_margin.';';
        if($con_style != 'none')
        {
            $con_style .= 'width:'.$att_width.';';    
        }
        $con_style .= '" ';          
        
        global $nggdb;
        if(isset($nggdb))
        {            
            $gallery = $nggdb->find_gallery($att_gid);
            
            
            if($gallery != null)
            {    
                $pics = null;
                if($att_random == 'true')
                {
                    $pics = $nggdb->get_random_images($att_count, $att_gid); 
                } else
                {   
                    $pics = $nggdb->get_gallery($att_gid, 'sortorder', 'ASC', true, $att_count, 0);
                        
                } 
                
                $out .= '<div class="dcs-simple-gallery-thumbs" '.$con_style.'>';
                    $out .= '<span class="trans" style="display:none;">'.$att_trans.'</span>';
                    $out .= '<div class="slider" style="width:'.$att_width.'px;height:'.$att_height.'px;">';
                        foreach($pics as $pic)
                        {
                            $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_width.'&h='.$att_height.'&zc=1';
                            $out .= '<a class="slide async-img" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                            
                        }                
                    $out .= '</div>';
                    if($att_desc != '')
                    {
                        $out .= '<p class="desc" style="text-align:'.$att_align.';width:'.$att_width.'px;" >'.$att_desc.'</p>';
                    }            
                    $out .= '<div class="thumbs-wrapper" style="width:'.$att_width.'px;">';
                    foreach($pics as $pic)
                    {            
                        $src = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_ts.'&h='.$att_ts.'&zc=1'; 
                        $out .= '<a class="thumb async-img-s" style="width:'.$att_ts.'px;height:'.$att_ts.'px;border-color:'.$att_bcolor.';" rel="'.$src.'" /></a>';
                    }
                    $out .= '<div class="clear-both"></div></div>';
                $out .= '</div>';               
                
            }
        }              
        return $out;          
    }     
    
    
    # SHORTCODE: 
    #   dcs_wp_pagination 
    # PAREMAETERS:
    # NOTES:           
    public function dcs_wp_pagination($atts, $content=null, $code="")
    {
        $out = '';
        $out = GetDCCPInterface()->getIGeneral()->renderWordPressPagination(0);         
        return $out;        
    }       

    # SHORTCODE: 
    #   dcs_post_top
    # PAREMAETERS:
    # NOTES:     
    public function dcs_post_top($atts, $content=null, $code="")
    {
        global $post;
        $out = '';
        
        $out .= '<div class="dcs-post-top">';
            if(comments_open($post->ID)) 
            {                              
                $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
            }         
            
            $out .= '<div class="info">
                    <a class="date-left"></a><a href="'.get_month_link($year, $month).'" class="date">'.get_the_time('F j, Y').'</a><a class="date-right"></a>
                    Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                    
                    $catlist = wp_get_post_categories($post->ID);
                    $count_cat = count($catlist);
                    for($i = 0; $i < $count_cat; $i++)
                    {
                        if($i > 0)
                        {
                           $out .= ', '; 
                        }
                        $cat = get_category($catlist[$i]);
                        $out .= '<a href="'.get_category_link($catlist[$i]).'" >'.$cat->name.'</a>';
                         
                    }                                
                
                $out .= '</div>';           
               
        $out .= '<h2>'.$post->post_title.'</h2>';
        $out .= '</div>';
        
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_post_author
    # PAREMAETERS:
    # NOTES:     
    public function dcs_post_author($atts, $content=null, $code="")
    {
        global $post;
        $nosidebar = get_post_meta($post->ID, 'post_nosidebar', true); 
        
        $out = '';
        
        if(GetDCCPInterface()->getIGeneral()->showPostAuthor()) 
        {                           
            $default_avatar = get_bloginfo('template_url').'/img/common_files/avatar2.jpg';
            $authoremail = get_the_author_meta('user_email', $post->post_author);
            $avatar = get_avatar($authoremail, '60', $default_avatar);
   
            $author_posts_count = get_the_author_posts();
            $author_tip = $author_posts_count . ($author_posts_count > 1 ? ' posts' : ' post');   
           $out = '';
           $out = '
                 <div class="blog-post-author"> 
            
                <h4>ABOUT THE AUTHOR</h4> 
            
                <div class="avatar"> 
                    '.$avatar.' 
                </div> <!--avatar-->                       
                                        
                <div class="desc-wrapper" '.($nosidebar != '' ? ' style="width:800px;" ' : ' style="width:480px;" ').'>                     
                    <div class="float-left"> 
                        <p class="author">'.get_the_author_meta('display_name', $post->post_author).'</p> 
                        <p class="authorTitle">'.get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author).'</p> 
                    </div>'; 
                    
                    $author_url = get_the_author_meta('user_url', $post->post_author);                     
                    if($author_url != '')
                    {                    
                        $out .= '<div class="float-right"> 
                            <a href="'.$author_url.'" class="authorLink" target="_blank">Visit Authors Site</a> 
                        </div>';
                    } 
                     
                    $out .= '<div class="clear-both"></div>
                    <div style="float: left;"> 
                        <p class="desc">'.get_the_author_meta('description', $post->post_author).' '.
                        '<a title="'.$author_tip.'" class="link-tip-right" href="'.get_author_posts_url($post->post_author).'">View&nbsp;all&nbsp;posts&nbsp;by&nbsp;'.get_the_author_meta('display_name', $post->post_author).'</a></p> 
                    </div> 
                </div>
 
                <div class="clear-both"></div> 
            
            </div> <!--blog-post-author-->               
           ';        
        }        
        
        return $out;          
    }   
    
    # SHORTCODE: 
    #   dcs_post_bottom
    # PAREMAETERS:
    #   voting - if set to true voting panel will be displayed, default set to true
    # NOTES:     
    public function dcs_post_bottom($atts, $content=null, $code="")
    {
        global $post;
        $novoting = get_post_meta($post->ID, 'post_novoting', true);          
        
            $out = '';
            $out .= '<div class="blog-post-bottom-wrapper-single">';
            $out .= GetDCCPInterface()->getIGeneral()->renderNextPrevPostPanel($post->post_type);
            if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $novoting == '')
            {
                global $dcp_votingshortcodes; 
                if(isset($dcp_votingshortcodes))
                {
                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                }
            }               
            
           // post tags list
           $posttags = get_the_tags();                              
           $count = 0;
           if($posttags !== false)
           {
                $count = count($posttags);
           }
            
           if($count > 0)
           {   
               $out .= '<div class="blog-post-tags-single">
                        <span class="name">Tags:</span> ';
               
               $i = 0;            
               foreach($posttags as $tag)
               {   
                   if($i > 0)
                   {
                       $out .= ', ';
                   }
                   $title = '';
                   if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; } 
                   
                   $out .= '<a href="'.get_tag_link($tag->term_id).'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
                   $i++;
               }                       
               $out .= '</div>';                                            
                
           } else
           { 
                if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
                {                                
                   $out .= '<div class="blog-post-tags-single">
                            There are no tags associated with this post.                           
                        </div>';   
                }                                                                                 
           }                            

        if(GetDCCPInterface()->getIGeneral()->showCIForPosts())
        {  
            $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons(); 
        }
        
        $out .= '<div class="clear-both"></div></div>';        
        
        return $out;          
    }   

    # SHORTCODE: 
    #   dcs_ul
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels
    #   pos - can be set to inside or outside, default is inside
    #   type - list type e.g dot, circle, disc, square 
    # NOTES:     
    public function dcs_ul($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'pos' => 'inside',
          'type' => 'dot'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];               
        $att_pos = $atts['pos'];
        $att_type = $atts['type']; 
       
        $style = ' style="margin-top:0px;margin-bottom:15px;';
        $style .= 'padding-left:'.$att_left.'px;'; 
        $style .= 'list-style-position:'.$att_pos.';'; 
        $style .= 'list-style-type:'.$att_type.';';        
        $style .= '" ';
       
        $out .= '<ul '.$style.'>'.do_shortcode($content).'</ul>';        
        return $out;
    }   
    
    # SHORTCODE: 
    #   dcs_ul_clean
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels
    #   pos - can be set to inside or outside, default is inside
    #   type - list type e.g circle, disc, square 
    # NOTES:     
    public function dcs_ul_clean($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'pos' => 'inside',
          'type' => 'disc',
          'color' => $this->_theme_main_color,
          'tcolor' => '#000000',
          'margin' => '0px 0px 15px 0px'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];               
        $att_pos = $atts['pos'];
        $att_type = $atts['type']; 
        $att_color = $atts['color'];
        $att_tcolor = $atts['tcolor'];
        $att_margin = $atts['margin'];  
       
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        $count = count($paths);       
       
        $style = ' style="';
        $style .= 'padding-left:'.$att_left.'px;'; 
        $style .= 'list-style-position:'.$att_pos.';'; 
        $style .= 'list-style-type:'.$att_type.';';        
        $style .= 'margin:'.$att_margin.';'; 
        $style .= '" ';
       
        $out .= '<ul '.$style.'>';
        foreach($paths as $path)
        {
            $out .= '<li style="color:'.$att_color.';"><span style="color:'.$att_tcolor.';">'.$path.'</span></li>';    
        }        
        $out .= '</ul>';        
        return $out;
    }      
                
    # SHORTCODE: 
    #   dcs_ul_menu
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels
    # NOTES:     
    public function dcs_ul_menu($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];               
       
        $w_style = ' style="margin-top:0px;margin-bottom:15px;';    
        $w_style .= '" ';
        
        $style = ' style="';
        $style .= 'padding-left:'.$att_left.'px;';       
        $style .= '" ';
       
        $out .= '<div class="dc-widget-wrapper" '.$w_style.'><ul class="menu" '.$style.'>'.$content.'</ul></div>';        
        return $out;
    }        
     
    # SHORTCODE: 
    #   dcs_ul_ring
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels
    #   var - variatin, value from 2-9
    # NOTES:     
    public function dcs_ul_ring($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'color' => 'orange'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];         
        $att_color = $atts['color']; 
          
                
        $out .= '<div class="dcs-list-ring-'.$att_color.'" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }        
        
    # SHORTCODE: 
    #   dcs_ul_check
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels
    #   var - variation, value from 2-9
    # NOTES:     
    public function dcs_ul_check($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'var' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];         
        $att_var = (int)$atts['var']; 
        
        if($att_var < 2 or $att_var > 9)
        {
            $att_var = '';
        }        
                
                
        $out .= '<div class="dcs-list-check'.$att_var.'" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }    

    # SHORTCODE: 
    #   dcs_ul_star
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels       
    #   var - variatin, value from 2-3       
    # NOTES:     
    public function dcs_ul_star($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'var' => '' 
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];
        $att_var = (int)$atts['var'];  
            
        if($att_var < 2 or $att_var > 3)
        {
            $att_var = '';
        }                 
                        
        $out .= '<div class="dcs-list-star'.$att_var.'" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_ul_arrow
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels       
    #   var - variatin, value from 2-4      
    # NOTES:     
    public function dcs_ul_arrow($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'var' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];
        $att_var = (int)$atts['var'];          
          
        if($att_var < 2 or $att_var > 4)
        {
            $att_var = '';
        }               
                
        $out .= '<div class="dcs-list-arrow'.$att_var.'" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }

    # SHORTCODE: 
    #   dcs_ul_exception
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels       
    #   var - variatin, value from 2-4      
    # NOTES:     
    public function dcs_ul_exception($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'var' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];
        $att_var = (int)$atts['var'];          
          
        if($att_var < 2 or $att_var > 4)
        {
            $att_var = '';
        }               
                
        $out .= '<div class="dcs-list-exception'.$att_var.'" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }
    
    # SHORTCODE: 
    #   dcs_ul_dot_gold
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ul_dot_gold($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-dot-gold" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_ul_dot_silver
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels  
    # NOTES:     
    public function dcs_ul_dot_silver($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-dot-silver" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }                     

    # SHORTCODE: 
    #   dcs_ul_dot_grey
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ul_dot_grey($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-dot-grey" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_ol
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15,
          'type' => 'disc',
          'color' => $this->_theme_main_color,
          'tcolor' => '#000000',
          'bg' => 'true',
          'align' => 'left',
          'size' => '',
          'fheight' => '',
          'margin' => '0px 0px 15px 0px',
          'mtop' => 0,
          'inner' => 0,
          'pos' => 'inside'
        ); 
                        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];
        $att_type = $atts['type'];           
        $att_color = $atts['color'];
        $att_tcolor = $atts['tcolor']; 
        $att_bg = $atts['bg'];
        $att_align = $atts['align'];
        $att_size = $atts['size']; 
        $att_fheight = $atts['fheight'];
        $att_margin = $atts['margin']; 
        $att_mtop = $atts['mtop'];
        $att_inner = $atts['inner']; 
        $att_pos = $atts['pos'];
        
        $content = str_replace(chr(10), '', $content);
        $content = str_replace(chr(13), '', $content);  
        $paths = explode(';', $content);
        $count = count($paths);
        $new_paths = Array();
        for($i = 0; $i < $count; $i++)
        {
            if($paths[$i] != '')
            {
                array_push($new_paths, $paths[$i]);
            }
        }
        $paths = $new_paths;
        $count = count($paths);
                
                
        $out .= '<div class="dcs-list-ordered" style="padding-left:'.$att_left.'px;margin:'.$att_margin.';">';
        $out .= '<ol style="list-style-type:'.$att_type.';list-style-position:'.$att_pos.';">';        
        $class = $att_bg == 'true' ? ' class="background" ' : '';
        
        
        $p_style = ' style="';
        $p_style .= 'color:'.$att_tcolor.';';
        if($att_size != '')
        {
            $p_style .= 'font-size:'.$att_size.'px;';
        }
        if($att_fheight != '') {  $p_style .= 'line-height:'.$att_fheight.'px;'; }
        $p_style .= '" ';
        
        foreach($paths as $path)
        {
            $out .= '<li '.$class.' style="padding-left:'.$att_inner.'px;padding-right:'.$att_inner.'px;margin-top:'.$att_mtop.'px;color:'.$att_color.';text-align:'.$att_align.';"><p '.$p_style.'>'.$path.'</p></li>';    
        }
        
        $out .= '</ol>';
        $out .= '</div>';        
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_ol_gold
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_gold($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-gold" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }              

    # SHORTCODE: 
    #   dcs_ol_silver
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_silver($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-silver" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }   
    
    # SHORTCODE: 
    #   dcs_ol_roman_gold
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_roman_gold($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-roman-gold" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }              

    # SHORTCODE: 
    #   dcs_ol_roman_silver
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_roman_silver($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-roman-silver" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_ol_greek_gold
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_greek_gold($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-greek-gold" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }              

    # SHORTCODE: 
    #   dcs_ol_greek_silver
    # PAREMAETERS:
    #   left - left padding, in default set to 15 pixels      
    # NOTES:     
    public function dcs_ol_greek_silver($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'left' => 15
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_left = $atts['left'];          
                
        $out .= '<div class="dcs-list-ordered-greek-silver" style="padding-left:'.$att_left.'px;">'.$content.'</div>';        
        return $out;
    }               
    
    
    # SHORTCODE: 
    #   dcs_ngg_auto_gallery
    # PAREMAETERS:
    # NOTES:     
    public function dcs_ngg_auto_gallery($atts, $content=null, $code="")
    {
        $out = '';        
        $defatts = Array(
          'gid' => CMS_NOT_SELECTED,
          'count' => 10,
          'width' => 150,
          'height' => 150,
          'random' => 'false',
          'framed' => 'false',
          'margin' => '0px 15px 25px 0px',
          'bcolor' => '#EEEEEE',
          'bwidth' => '1',
          'bshow' => 'true',
          'group' => '',
          'rounded' => '',
          'page' => 0,
          'columns' => 3
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_gid = $atts['gid'];                
        $att_count = $atts['count']; 
        $att_random = $atts['random']; 
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_framed = $atts['framed']; 
        $att_margin = $atts['margin'];
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth']; 
        $att_bshow = $atts['bshow'];        
        $att_group = $atts['group'];
        $att_rounded = $atts['rounded']; 
        $att_page = (int)$atts['page']; 
        $att_columns = (int)$atts['columns']; 
        
        if($att_columns < 1) { $att_columns = 1; }
        
        if($att_rounded != '')
        {
            $att_rounded = ' rounded-borders-'.$att_rounded; 
        }        
        
        $out .= '<div class="dcs-ngg-auto-gallery">';
        
        global $nggdb;
        if(isset($nggdb))
        {            
            $gallery = $nggdb->find_gallery($att_gid);

            if($gallery != null)
            {    
                $pics = null;
                if($att_random == 'true')
                {
                    $pics = $nggdb->get_random_images($att_count, $att_gid); 
                } else
                {
                    $pics = $nggdb->get_gallery($att_gid, 'sortorder', 'ASC', true, $att_count, $att_page*$att_count);    
                }
                
                if($pics !== null)
                {   
                    $counter = 0;
                    foreach($pics as $pic)
                    {
                        
                        
                        $style_wrapper = ' style="';
                        $style_wrapper .= 'margin:'.$att_margin.';';
                        
                        if((($counter+1)  % $att_columns) == 0) { $style_wrapper .= 'margin-right:0px;';  }
                         
                        $wrapper_w = $att_width;
                        if($att_framed == 'true') { $wrapper_w += 8; }
                        if($att_bshow == 'true') { $wrapper_w += ($att_bwidth*2); }                         
                        $style_wrapper .= 'width:'.$wrapper_w.'px;';
                        $style_wrapper .= '" ';
                        
                        $style = ' style="';                        
                        $style .= 'width:'.$att_width.'px;';
                        $style .= 'height:'.$att_height.'px;';
                        if($att_bshow == 'true')
                        {
                            $style .= 'border: '.$att_bwidth.'px solid '.$att_bcolor.';';    
                        } 
                        $style .= '" ';
                        
                        if($att_group != '')
                        {
                            $pic->thumbcode = ' rel="lightbox['.$att_group.']" ';
                        }
                        
                        $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_width.'&h='.$att_height.'&zc=1&q=100'; 
                        
                        $out .= '<div class="thumb-wrapper" '.$style_wrapper.'>';
                        $out .= '<div class="thumb'.($att_framed == 'true' ? ' framed' : '').$att_rounded.'" '.$style.'>';
                        $out .= '<a class="loader async-img-s" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                        $out .= '<a href="'.$pic->imageURL.'" class="triger" style="width:'.$att_width.'px;height:'.$att_height.'px;'.($att_framed == 'false' ? 'top:0px;left:0px;' : '').'" '.$pic->thumbcode.' title="'.stripcslashes($pic->description).'"></a>';
                        $out .= '</div>';
                        $out .= '<h4>'.$pic->alttext.'</h4>';
                        if($pic->description != '') { $out .= '<p>'.$pic->description.'</p>'; } 
                        $out .= '</div>';
                        
                        $counter++;
                        if($counter  % $att_columns == 0)
                        {
                            $out .= '<div class="clear-both"></div>';
                        }
                        
                        
                    }
                    $out .= '<div class="clear-both"></div>';    
                }
            }
        }        
        
        $out .= '<div class="clear-both"></div></div>';        
        return $out;
    }      
    
    
    # SHORTCODE: 
    #   dcs_ngg
    # PAREMAETERS:
    #   gid - next gen gallery id, must set to valid value
    #   count - number of thumbs to display, should be grater then zero
    #   width - thumb width
    #   height - thumb height
    #   margin - margin for thumb
    #   framed - if true small frame is displayed around image
    #   random - true to display random images from gallery, false to display ordered list, default set to false
    #   bshow - show border, true or false, default true
    #   bwidth - border width in pixels, default one pixel width
    #   bcolor - border color, default set to white, #FFFFFF
    #   group - group name, default not set, original gruop name will be used    
    # NOTES:     
    public function dcs_ngg($atts, $content=null, $code="")
    {
        $out = '';        
        $defatts = Array(
          'gid' => CMS_NOT_SELECTED,
          'count' => 10,
          'width' => 80,
          'height' => 80,
          'random' => 'false',
          'framed' => 'false',
          'margin' => '0px 15px 15px 0px',
          'bcolor' => '#EEEEEE',
          'bwidth' => '1',
          'bshow' => 'true',
          'group' => '',
          'rounded' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_gid = $atts['gid'];                
        $att_count = $atts['count']; 
        $att_random = $atts['random']; 
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_framed = $atts['framed']; 
        $att_margin = $atts['margin'];
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth']; 
        $att_bshow = $atts['bshow'];        
        $att_group = $atts['group'];
        $att_rounded = $atts['rounded']; 
        
        if($att_rounded != '')
        {
            $att_rounded = ' rounded-borders-'.$att_rounded; 
        }        
        
        $out .= '<div class="dcs-gallery-thumbs">';
        
        global $nggdb;
        if(isset($nggdb))
        {            
            $gallery = $nggdb->find_gallery($att_gid);

            if($gallery != null)
            {    
                $pics = null;
                if($att_random == 'true')
                {
                    $pics = $nggdb->get_random_images($att_count, $att_gid); 
                } else
                {
                    $pics = $nggdb->get_gallery($att_gid, 'sortorder', 'ASC', true, $att_count, $start = 0);    
                }
                
                if($pics !== null)
                {
                    foreach($pics as $pic)
                    {
                        $style = ' style="';
                        $style .= 'margin:'.$att_margin.';';
                        $style .= 'width:'.$att_width.'px;';
                        $style .= 'height:'.$att_height.'px;';
                        if($att_bshow == 'true')
                        {
                            $style .= 'border: '.$att_bwidth.'px solid '.$att_bcolor.';';    
                        } 
                        $style .= '" ';
                        
                        if($att_group != '')
                        {
                            $pic->thumbcode = ' rel="lightbox['.$att_group.']" ';
                        }
                        
                        $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_width.'&h='.$att_height.'&zc=1&q=100'; 
                        $out .= '<div class="thumb'.($att_framed == 'true' ? ' framed' : '').$att_rounded.'" '.$style.'>';
                        $out .= '<a class="loader async-img-s" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                        $out .= '<a href="'.$pic->imageURL.'" class="triger" style="width:'.$att_width.'px;height:'.$att_height.'px;'.($att_framed == 'false' ? 'top:0px;left:0px;' : '').'" '.$pic->thumbcode.' title="'.stripcslashes($pic->description).'"></a>';
                        $out .= '</div>';
                    }    
                }
            }
        }        
        
        $out .= '<div class="clear-both"></div></div>';        
        return $out;
    }  
   
    # SHORTCODE: 
    #   dcs_ngg_single
    # PAREMAETERS:
    #   list - list of pictures ID's e.g "13,1,24,53,93,234,3,54"
    #   width - thumb width, default 80
    #   height - thumb height, default 80
    #   margin - margin for thumb
    #   framed - if true small frame is displayed around image 
    #   bshow - show border, true or false, default true
    #   exclude - exclude excluded images, true or false, default false
    #   bwidth - border width in pixels, default one pixel width
    #   bcolor - border color, default set to white, #EEEEEE
    #   group - name of group or empty string, default empty string
    # NOTES:     
    public function dcs_ngg_single($atts, $content=null, $code="")
    {
        $out = '';        
        $defatts = Array(
          'list' => '',
          'width' => 80,
          'height' => 80,
          'framed' => 'false',
          'margin' => '0px 15px 15px 0px',
          'bcolor' => '#EEEEEE',
          'bwidth' => '1',
          'bshow' => 'true',
          'exclude' => 'false',
          'group' => '',
          'rounded' => ''
          
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_list = $atts['list'];  
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_framed = $atts['framed']; 
        $att_margin = $atts['margin'];
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth']; 
        $att_bshow = $atts['bshow'];        
        $att_exclude = $atts['exclude'];
        $att_group = $atts['group'];
        $att_rounded = $atts['rounded']; 
        
        if($att_rounded != '')
        {
            $att_rounded = ' rounded-borders-'.$att_rounded; 
        }
        
        if($att_exclude == 'true')
        {
            $att_exclude = true;
        } else
        {
            $att_exclude = false;
        }
                                
        $pics_id_list = explode(',', $att_list);
        
        $out .= '<div class="dcs-gallery-thumbs">';
        
        global $nggdb;
        if(isset($nggdb))
        {            
 
            $pics = null;
            $pics = $nggdb->find_images_in_list($pics_id_list, $att_exclude); 
              
            if($pics !== null)
            {
                foreach($pics as $pic)
                {   
                    $style = ' style="';
                    $style .= 'margin:'.$att_margin.';';
                    $style .= 'width:'.$att_width.'px;';
                    $style .= 'height:'.$att_height.'px;';
                    if($att_bshow == 'true')
                    {
                        $style .= 'border: '.$att_bwidth.'px solid '.$att_bcolor.';';    
                    } 
                    $style .= '" ';
                    
                    $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_width.'&h='.$att_height.'&zc=1&q=100'; 
                    $thumbcode = $att_group != '' ? ' rel="lightbox['.$att_group.']" ' : ' rel="lightbox" ';
                    $out .= '<div class="thumb'.($att_framed == 'true' ? ' framed' : '').$att_rounded.'" '.$style.'>';
                    $out .= '<a class="loader async-img-s" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                    $out .= '<a href="'.$pic->imageURL.'" class="triger" style="width:'.$att_width.'px;height:'.$att_height.'px;'.($att_framed == 'false' ? 'top:0px;left:0px;' : '').'" '.$thumbcode.' title="'.$pic->description.'"></a>';
                    $out .= '</div>';
                }    
            }
            
        }        
        
        $out .= '<div class="clear-both"></div></div>';        
        return $out;
    }     

   
    # SHORTCODE: 
    #   dcs_ngg_last
    # PAREMAETERS:
    #   gid - next gen gallery id or avoid this parameter, if avoid last images from all galleries will be taken
    #   count - number of images to display, default 10
    #   page - thumbs page, default set to zero with means first page
    #   width - thumb width, default 80
    #   height - thumb height, default 80
    #   framed - if true small frame is displayed around image 
    #   margin - margin for thumb
    #   bshow - show border, true or false, default true
    #   exclude - exclude excluded images, true or false, default false
    #   bwidth - border width in pixels, default one pixel width
    #   bcolor - border color, default set to white, #FFFFFF
    #   group - name of group or empty string, default empty string 
    # NOTES:     
    public function dcs_ngg_last($atts, $content=null, $code="")
    {
        $out = '';        
        $defatts = Array(
          'gid' => 0,
          'count' => 10,
          'page' => 0,
          'width' => 80,
          'height' => 80,
          'framed' => 'false',
          'margin' => '0px 15px 15px 0px',
          'bcolor' => '#EEEEEE',
          'bwidth' => '1',
          'bshow' => 'true',
          'exclude' => 'false',
          'group' => '',
          'rounded' => ''
        ); 
                       
        $atts = shortcode_atts($defatts, $atts);                      
        $att_gid = $atts['gid'];  
        $att_count = $atts['count'];
        $att_page = $atts['page'];
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_framed = $atts['framed']; 
        $att_margin = $atts['margin'];
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth']; 
        $att_bshow = $atts['bshow'];        
        $att_exclude = $atts['exclude'];
        $att_group = $atts['group'];
        $att_rounded = $atts['rounded']; 
        
        if($att_rounded != '')
        {
            $att_rounded = ' rounded-borders-'.$att_rounded; 
        }        
        
        if($att_exclude == 'true')
        {
            $att_exclude = true;
        } else
        {
            $att_exclude = false;
        }
                                
        
        
        $out .= '<div class="dcs-gallery-thumbs">';
        
        global $nggdb;
        if(isset($nggdb))
        {            
 
            $pics = null;
            $pics = $nggdb->find_last_images($att_page, $att_count, $att_exclude, $att_gid); 
              
            if($pics !== null)
            {
                foreach($pics as $pic)
                {   
                    $style = ' style="';
                    $style .= 'margin:'.$att_margin.';';
                    $style .= 'width:'.$att_width.'px;';
                    $style .= 'height:'.$att_height.'px;';
                    if($att_bshow == 'true')
                    {
                        $style .= 'border: '.$att_bwidth.'px solid '.$att_bcolor.';';    
                    } 
                    $style .= '" ';
                    
                    $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_width.'&h='.$att_height.'&zc=1&q=100'; 
                    $thumbcode = $att_group != '' ? ' rel="lightbox['.$att_group.']" ' : ' rel="lightbox" ';
                    $out .= '<div class="thumb'.($att_framed == 'true' ? ' framed' : '').$att_rounded.'" '.$style.'>';
                    $out .= '<a class="loader async-img-s" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                    $out .= '<a href="'.$pic->imageURL.'" class="triger" style="width:'.$att_width.'px;height:'.$att_height.'px;'.($att_framed == 'false' ? 'top:0px;left:0px;' : '').'" '.$thumbcode.' title="'.$pic->description.'"></a>';
                    $out .= '</div>';
                }    
            }
            
        }        
        
        $out .= '<div class="clear-both"></div></div>';        
        return $out;
    }     
   
    # SHORTCODE: 
    #   dcs_ngg_random
    # PAREMAETERS:
    #   gid - next gen gallery id or avoid this parameter, if avoid last images from all galleries will be taken
    #   count - number of images to display, default 10
    #   width - thumb width, default 80
    #   height - thumb height, default 80
    #   framed - if true small frame is displayed around image 
    #   margin - margin for thumb
    #   bshow - show border, true or false, default true
    #   bwidth - border width in pixels, default one pixel width
    #   bcolor - border color, default set to white, #FFFFFF
    #   group - name of group or empty string, default empty string 
    # NOTES:     
    public function dcs_ngg_random($atts, $content=null, $code="")
    {
        $out = '';        
        $defatts = Array(
          'gid' => 0,
          'count' => 10,
          'width' => 80,
          'height' => 80,
          'framed' => 'false',
          'margin' => '0px 15px 15px 0px',
          'bcolor' => '#EEEEEE',
          'bwidth' => '1',
          'bshow' => 'true',
          'group' => '',
          'rounded' => ''
        ); 
                       
        $atts = shortcode_atts($defatts, $atts);                      
        $att_gid = $atts['gid'];  
        $att_count = $atts['count'];
        $att_width = $atts['width'];
        $att_height = $atts['height'];
        $att_framed = $atts['framed']; 
        $att_margin = $atts['margin'];
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth']; 
        $att_bshow = $atts['bshow'];        
        $att_group = $atts['group'];
        $att_rounded = $atts['rounded']; 
        
        if($att_rounded != '')
        {
            $att_rounded = ' rounded-borders-'.$att_rounded; 
        }          

        $out .= '<div class="dcs-gallery-thumbs">';
        
        global $nggdb;
        if(isset($nggdb))
        {            
 
            $pics = null;
            $pics = $nggdb->get_random_images($att_count, $att_gid); 
              
            if($pics !== null)
            {
                foreach($pics as $pic)
                {   
                    $style = ' style="';
                    $style .= 'margin:'.$att_margin.';';
                    $style .= 'width:'.$att_width.'px;';
                    $style .= 'height:'.$att_height.'px;';
                    if($att_bshow == 'true')
                    {
                        $style .= 'border: '.$att_bwidth.'px solid '.$att_bcolor.';';    
                    } 
                    $style .= '" ';
                    
                    $rel = get_bloginfo('template_url').'/thumb.php?src='.$pic->thumbURL.'&w='.$att_width.'&h='.$att_height.'&zc=1&q=100'; 
                    $thumbcode = $att_group != '' ? ' rel="lightbox['.$att_group.']" ' : ' rel="lightbox" ';
                    $out .= '<div class="thumb'.($att_framed == 'true' ? ' framed' : '').$att_rounded.'" '.$style.'>';
                    $out .= '<a class="loader async-img-s" rel="'.$rel.'" style="width:'.$att_width.'px;height:'.$att_height.'px;"></a>';
                    $out .= '<a href="'.$pic->imageURL.'" class="triger" style="width:'.$att_width.'px;height:'.$att_height.'px;'.($att_framed == 'false' ? 'top:0px;left:0px;' : '').'" '.$thumbcode.' title="'.$pic->description.'"></a>';
                    $out .= '</div>';
                }    
            }
            
        }        
        
        $out .= '<div class="clear-both"></div></div>';        
        return $out;
    }  
   
    # SHORTCODE: 
    #   dcs_one_half
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_half($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-half">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_one_half_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_half_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-half-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }       
   
    # SHORTCODE: 
    #   dcs_one_third
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_third($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-third">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_one_third_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_third_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-third-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }   
    
    # SHORTCODE: 
    #   dcs_two_third
    # PAREMAETERS:
    # NOTES:     
    public function dcs_two_third($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-two-third">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_two_third_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_two_third_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-two-third-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }       
    
    
    # SHORTCODE: 
    #   dcs_one_fourth
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_fourth($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-fourth">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_one_fourth_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_fourth_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-fourth-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }   
    
    # SHORTCODE: 
    #   dcs_three_fourth
    # PAREMAETERS:
    # NOTES:     
    public function dcs_three_fourth($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-three-fourth">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_three_fourth_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_three_fourth_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-three-fourth-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     
    
    # SHORTCODE: 
    #   dcs_one_fifth
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_fifth($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-fifth">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }     

    # SHORTCODE: 
    #   dcs_one_fifth_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_one_fifth_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-one-fifth-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    } 

    # SHORTCODE: 
    #   dcs_three_fifth
    # PAREMAETERS:
    # NOTES:     
    public function dcs_three_fifth($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-three-fifth">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_three_fifth_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_three_fifth_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-three-fifth-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }      
    
    # SHORTCODE: 
    #   dcs_four_fifth
    # PAREMAETERS:
    # NOTES:     
    public function dcs_four_fifth($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-four-fifth">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_four_fifth_last
    # PAREMAETERS:
    # NOTES:     
    public function dcs_four_fifth_last($atts, $content=null, $code="")
    {
        $out = '';        
        $out .= '<div class="dcs-four-fifth-last">';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }    

    # SHORTCODE: 
    #   dcs_column
    # PAREMAETERS:
    #   width - column width
    #   mright - right margin
    #   mleft - left margin
    #   float - can be set to left or right, default left
    # NOTES:     
    public function dcs_column($atts, $content=null, $code="")
    {
        $out = ''; 
        $defatts = Array(
          'width' => 200,
          'mright' => 40,
          'mleft' => 0,
          'float' => 'left',
          'bg' => '',
          'usersrc' => '',
          'bgrepeat' => 'no-repeat',
          'bgpos' => 'left top',          
          'bgcolor' => '',
          'rounded' => 0,
          'border' => 'false',
          'bcolor' => '#222222',
          'bwidth' => 1,
          'bstyle' => 'solid',
          'padding' => '0px 0px 0px 0px',
          'margin' => '',
          'color' => '',
          'align' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_width = $atts['width'];
        $att_mright = (int)$atts['mright'];
        $att_mleft = (int)$atts['mleft'];
        $att_float = $atts['float'];        

        $att_bgcolor = $atts['bgcolor'];
        $att_rounded = (int)$atts['rounded'];          
        
        $att_border = $atts['border']; 
        $att_bcolor = $atts['bcolor'];
        $att_bwidth = $atts['bwidth'];
        $att_bstyle = $atts['bstyle'];
        $att_padding = $atts['padding']; 
        $att_margin = $atts['margin']; 
         
        $att_color = $atts['color']; 
        $att_align = $atts['align']; 

        $att_bg = $atts['bg']; 
        $att_usersrc = $atts['usersrc']; 
        $att_bgrepeat = $atts['bgrepeat']; 
        $att_bgpos = $atts['bgpos'];
        
        if($att_usersrc != '') { $att_bg = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc; }         
        
        $style = ' style="';
        $style .= 'padding:'.$att_padding.';';
        $style .= 'float:'.$att_float.';';
        $style .= 'width:'.$att_width.'px;';
        $style .= 'margin-right:'.$att_mright.'px;';
        $style .= 'margin-left:'.$att_mleft.'px;';
        if($att_bg != '')
        {
            $style .= 'background-image:url('.$att_bg.');';
            $style .= 'background-repeat:'.$att_bgrepeat.';';
            $style .= 'background-position:'.$att_bgpos.';';      
        }
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        if($att_align != '') { $style .= 'text-align:'.$att_align.';'; }
        if($att_margin != '') { $style .= 'margin:'.$att_margin.';'; }
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; }
        if($att_border == 'true')
        {
            $style .= 'border:'.$att_bwidth.'px '.$att_bstyle.' '.$att_bcolor.';';    
        }
        $style .= '"';
               
        $class = '';
        if($att_rounded > 0)
        {
            $class = ' class="rounded-borders-'.$att_rounded.'" ';   
        }       
               
        $out .= '<div '.$class.' '.$style.'>';
        $out .= do_shortcode($content);       
        $out .= '</div>';
        return $out;
    }  

    
    # SHORTCODE: 
    #   dcs_blockquote
    # PAREMAETERS:
    #   author - quote author, string, default empty string
    #   title - author title, default empty string
    #   pos - can be set to 'left', 'right' or center, in mode 'left' and 'right' blockquote is an floating object, so you in this modes you must use width and margin parameters
    #   width - quote width in pixels, in default set to zero
    #   mleft - left margin, default set to zero
    #   mright - right margin, default set to zero
    #   framed - use frame for quote, can bet set to true od false, default set to false
    #   size - font size, default not set, default blockqoute settings will be used
    #   style - font style, can be set to italic, oblique or normal, default set to normal
    #   color - quote color, can be set to any CSS valid value for color property, default not set  
    #   font - font used for quote, default not set
    #   bold - if true quote will be displayed with bold text, default false
    #   fheight - font height in pixels, default not set
    #   padding - inner quote padding
    #   bg - quote background, url to image
    #   bgpos - use format like for CSS background-position property, default set to to 'left top'
    #   usersrc - filename width extension from shortcodes folder [template path]/img/shortcodes, default empty string, will be not used, if you set this, this image path will overwrite bg parameter   
    # NOTES:     
    public function dcs_blockquote($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'author' => '',
          'acolor' => $this->_theme_main_color,
          'title' => '',
          'pos' => 'center',
          'width' => 0,
          'mleft' => 0,
          'mright' => 0,
          'framed' => 'false',
          'size' => '',
          'style' => 'italic',
          'color' => '',
          'font' => '',
          'bold' => 'false',
          'fheight' => '',
          'padding' => '0px 0px 0px 0px',
          'bg' => '',
          'bgpos' => 'left top',
          'usersrc' => '',
          'marker' => 0,
          'margin' => '',
          'bgcolor' => '',
          'boxpadding' => '',          
          'p' => '',
          'pmargin' => '0px 15px 10px 0px',
          'pw' => '',
          'ph' => '',
          'pframe' => 'true',
          'offset' => 1
        ); 
        
        $use_tim = false;
        if(isset($atts['pw']) and isset($atts['ph']))
        {
            $use_tim = true;    
        }        
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_position = $atts['pos'];          
        $att_author = $atts['author'];
        $att_acolor = $atts['acolor'];
        $att_title = $atts['title'];
        $att_width = (int)$atts['width'];  
        $att_mleft = (int)$atts['mleft']; 
        $att_mright = (int)$atts['mright'];
        $att_framed = $atts['framed']; 
        $att_size = $atts['size'];
        $att_style = $atts['style'];
        $att_color = $atts['color']; 
        $att_font = $atts['font'];
        $att_bold = $atts['bold'];
        $att_fheight = $atts['fheight'];
        $att_margin = $atts['margin'];
        $att_bgcolor = $atts['bgcolor'];
        $att_boxpadding = $atts['boxpadding'];
        $att_p = $atts['p'];  
        $att_pmargin = $atts['pmargin'];
        $att_pw = $atts['pw']; 
        $att_ph = $atts['ph'];
        
        $att_pframe = $atts['pframe']; 
        $att_offset = $atts['offset'];  
        
        $att_padding = $atts['padding']; 
        $att_bg = $atts['bg'];
        $att_bgpos = $atts['bgpos'];
        $att_usersrc = $atts['usersrc'];
        $att_marker = (int)$atts['marker'];
                
        $style = ' style="';
        if($att_width != 0) { $style .= 'width:'.$att_width.'px;'; }
        if($att_position == 'left') { $style .= 'float:left;'; }
        if($att_position == 'right') { $style .= 'float:right;'; }
        if($att_bgcolor != '') { $style .= 'background-color:'.$att_bgcolor.';'; } 
        if($att_boxpadding != '') { $style .= 'padding:'.$att_boxpadding.';'; }
        if($att_margin == '')
        {
            if($att_mleft != 0) { $style .= 'margin-left:'.$att_mleft.'px;'; }
            if($att_mright != 0) { $style .= 'margin-right:'.$att_mright.'px;'; }  
        } else
        {
            $style .= 'margin:'.$att_margin.';';    
        }
        $style .= '" ';
        
        if($att_usersrc != '')
        {
            $att_bg = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc; 
        }
        
        $p_style = ' style="';
        $p_style .= 'padding:'.$att_padding.';';        
        $p_style .= 'background-position:'.$att_bgpos.';'; 
        
        
        if($att_bg == '' and $att_marker > 0)
        {
            $att_bg = get_bloginfo('template_url').'/img/common_files/blockquote/q'.$att_marker.'.png';    
        }
        
        if($att_bg != '')  
        {
            $p_style .= 'background-image:url('.$att_bg.');';     
        }
        
        
        
        if($att_size != '')
        {
            $p_style .= 'font-size:'.$att_size.'px;';
            $p_style .= 'line-height:'.($att_size+4).'px;';
        }
        if($att_bold == 'true')
        {
            $p_style .= 'font-weight:bold;';
        } 
        if($att_fheight != '')
        {
            $p_style .= 'line-height:'.$att_fheight.'px;';
        }                 
        if($att_color != '')
        {
            $p_style .= 'color:'.$att_color.';';
        }
        if($att_font != '')
        {
            $p_style .= 'font-family:'.$att_font.';';     
        }
        $p_style .= 'font-style:'.$att_style.';';  
        $p_style .= '" ';
        
        $class = '';
        if($att_framed == 'true')
        {
            $class = ' class="framed" ';
        }
        
        $out .= '<blockquote '.$class.' '.$style.'>';
        if($att_p != '')
        {            
            $img_style = ' style="';
            $img_style .= 'margin:'.$att_pmargin.';';
            if($att_pframe != 'true')
            {
                $img_style .= 'border:none;';
                $img_style .= 'padding:0px;';                    
            }            
            $img_style .= '" ';
            
            if($use_tim)
            {
                $att_p = get_bloginfo('template_url').'/thumb.php?src='.$att_p.'&w='.$att_pw.'&h='.$att_ph.'&zc=1';

                $div_style = ' style="';
                $div_style .= 'margin:'.$att_pmargin.';';
                $div_style .= 'width:'.$att_pw.'px;';
                $div_style .= 'height:'.$att_ph.'px;';
                if($att_pframe != 'true')
                {
                    $div_style .= 'border:none;';
                    $div_style .= 'padding:0px;';                    
                }
                $div_style .= '" ';
                $out .= '<div class="bcimg async-img-s" rel="'.$att_p.'" '.$div_style.'></div>';
            } else
            {
                $out .= '<img class="bcimg" src="'.$att_p.'" '.$img_style.' alt="" />';
            }
        }
        $out .= '<p '.$p_style.'>'.$content.'</p>';
        $out .= '<div style="height:'.$att_offset.'px;"></div>';
        if($att_author != '')
        {
            $out .= '<span class="author" style="color:'.$att_acolor.';">'.$att_author.'</span>';
        }
        
        if($att_title != '')
        {
            $out .= '<span class="authortitle">'.$att_title.'</span>';
        }        
        
        $out .= '</blockquote>';        
        return $out;
    }     
    
    # SHORTCODE: 
    #   dcs_img
    # PAREMAETERS:
    #   pos - control image position, can be set to 'left' for float to left, to 'right' for float to right or can be set to center, default this parameter is set to 'center'
    #   mleft - left margin in pixels, defult is set to zero
    #   mright - right margin in pixels, default is set to zero
    #   lightbox - can be set to true or false, if true given url is used as big image for ligthbox, default set to false
    #   url - this can be simple link to other page or link to image displayed by ligthbox then lightbox paramter is set to true, if lightbox parameter is true and this 
    #           parameters is not set, shortcode will use url from shortcode content, default empty string (no url)
    #   async - if true, image is loaded ansynchroneus, in this mode you must set width and height parameter, default set to true
    #   width - width of image in pixels
    #   height - height of image in pixels
    #   thumb - if set to true image is resacaled by timthumb to given width and height, default set to false
    #   desc - image description, default empty string
    #   title - image title displayed with light box
    #   author - image author, default empty string
    #   framed - can be set to none, black or white, default none
    #   framedall - can be set to none, white or dark, default none
    #   group - name for lightbox group
    #   line - if true, line under description will be disabled  
    # NOTES:
    #   content should contain url to displayed image     
    public function dcs_img($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pos' => 'center',
          'mleft' => 'auto',
          'mright' => 'auto',
          'mtop' => 0,
          'mbottom' => 15,
          'lightbox' => 'false',
          'url' => '',
          'width' => 0,
          'height' => 0,                                    
          'async' => 'true',
          'thumb' => 'false',
          'title' => '',                     
          'desc' => '',
          'author' => '',
          'framed' => 'none',
          'framedall' => 'none',
          'group' => '',
          'line' => 'true',
          'margin' => '',
          'icon' => '',
          'iconurl' => '',
          'usersrc' => '',
          'bgcolor' => ''
        ); 
        
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_position = $atts['pos'];
        $att_mleft = $atts['mleft'];
        $att_mright = $atts['mright'];          
        $att_mtop = $atts['mtop'];
        $att_mbottom = $atts['mbottom'];
        $att_lightbox = $atts['lightbox'];
        $att_url = $atts['url'];  
        $att_width = (int)$atts['width'];          
        $att_height = $atts['height'];
        $att_async = $atts['async'];  
        $att_thumb = $atts['thumb'];
        $att_title = $atts['title'];  
        $att_desc = $atts['desc'];
        $att_author = $atts['author']; 
        $att_framed = $atts['framed'];
        $att_framedall = $atts['framedall']; 
        $att_group = $atts['group'];         
        $att_line = $atts['line'];
        $att_margin = $atts['margin'];
        $att_icon = $atts['icon']; 
        $att_iconurl = $atts['iconurl']; 
        $att_usersrc = $atts['usersrc']; 
        $att_bgcolor = $atts['bgcolor'];
        
        if($att_usersrc != '')
        {
            $att_iconurl = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;            
        }
        if($att_iconurl != '') { $att_icon = ''; }
        if($att_icon != '')
        {
            if($att_icon == 'play') { $att_icon = ' iplay'; }
            if($att_icon == 'zoom') { $att_icon = ' izoom'; }        
        }
        
        if($att_framed != 'none' and $att_framedall != 'none')
        {
            $att_framed = 'none';
        }
           
        $imgpath = $content;
        if($att_thumb == 'true')
        {
            $imgpath = get_bloginfo('template_url').'/thumb.php?src='.$content.'&w='.$att_width.'&h='.$att_height.'&zc=1';
        }
        
        if($att_url == '' and $att_lightbox == 'true')
        {
           $att_url = $content; 
        }
        
        $style = ' style="';
        if($att_width != 0) 
        { 
            $extra = 0;
            if($att_framed == 'true')
            {
                $extra = 8;
            }
            $style .= 'width:'.($att_width+$extra).'px;'; 
        }
        if($att_position == 'left') { $style .= 'float:left;'; }
        if($att_position == 'right') { $style .= 'float:right;'; } 
        if($att_margin != '') 
        { 
            $style .= 'margin:'.$att_margin.';'; 
        } else
        {
            if($att_mleft != 'auto') { $style .= 'margin-left:'.$att_mleft.'px;'; }
            if($att_mright != 'auto') { $style .= 'margin-right:'.$att_mright.'px;'; } 
            if($att_mtop != 0) { $style .= 'margin-top:'.$att_mtop.'px;'; }
            if($att_mbottom != 15) { $style .= 'margin-bottom:'.$att_mbottom.'px;'; } 
        }
        
        if($att_width != 0 and $att_framed != 'none') 
        { 
            $style .= 'width:'.($att_width+8).'px;'; 
        }      
        $style .= '" ';
        
     
        $trigerstyle = ' style="';
        if($att_width != 0) { $trigerstyle .= 'width:'.$att_width.'px;'; }
        if($att_height != 0) { $trigerstyle .= 'height:'.$att_height.'px;'; }
        if($att_framed != 'none' or $att_framedall != 'none') { $trigerstyle .= 'left:4px;top:4px;'; } 
        if($att_iconurl != '') { $trigerstyle .= 'background-image:url('.$att_iconurl.');'; }      
        $trigerstyle .= '" ';     
        
        $loaderstyle = ' style="';
        if($att_width != 0) { $loaderstyle .= 'width:'.$att_width.'px;'; }
        if($att_height != 0) { $loaderstyle .= 'height:'.$att_height.'px;'; }      
        if($att_bgcolor != '') { $loaderstyle .= 'background-color:'.$att_bgcolor.';'; }
        $loaderstyle .= '" ';         
        
        $temp_class = ($att_framedall == 'black' ? ' framed' : '' ).($att_framedall == 'dark' ? ' framed-dark' : '' ); 
        $out .= '<div class="dcs-photo '.$temp_class.'" '.$style.'>';
        
        if($att_lightbox == 'true' or $att_url != '')
        {
            $rel = '';
            if($att_lightbox == 'true')
            {
                $rel = ' rel="lightbox'.($att_group != '' ? '['.$att_group.']' : '').'" ';
            }            
            $out .= '<a href="'.$att_url.'" class="triger'.$att_icon.'" '.$trigerstyle.' '.$rel.' title="'.$att_title.'" ></a>';
        }
        
        $temp_class = ($att_framed == 'black' ? ' framed' : '' ).($att_framed == 'dark' ? ' framed-dark' : '' );
        $out .= '<div class="loader-wrapper '.$temp_class.'" '.$loaderstyle.'>';
        $out .= '<a class="loader '.($att_async == 'true' ? 'async-img' : '').'" '.$loaderstyle.' ';
        if($att_async == 'true') { $out .= ' rel="'.$imgpath.'" '; }
        $out .= '>';
        if($att_async == 'false') { $out .= '<img src="'.$imgpath.'" />'; }
        $out .= '</a>';
        $out .= '</div>';

        if($att_author != '')
        {
            $out .= $att_author;     
        }
        
        if($att_desc != '')
        {
            $desc_style = ' style="';            
            if($att_line == 'false')
            {
                $desc_style .= 'background:none;';    
            }
            $desc_style .= '" ';
            
            $out .= '<p '.$desc_style.'>'.$att_desc.'</p>';
        }
        
        $out .= '</div>';             
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_img_ngg
    # PAREMAETERS:
    #   pid - image id from next gen gallery
    #   pos - control image position, can be set to 'left' for float to left, to 'right' for float to right or can be set to center, default this parameter is set to 'center'
    #   mleft - left margin, defult is set to zero
    #   mright - right margin, default is set to zero
    #   lightbox - can be set to true or false, if true given link is used as big image for ligthbox, default set to false
    #   url - this can be simple link to other page (no url)
    #   async - if true, image is loaded ansynchroneus, in this mode you must set width and height parameter, default set to true
    #   width - width of image in pixels
    #   height - height of image in pixels
    #   thumb - if set to true image is resacaled by timthumb to given width and height, default set to false
    #   desc - image description, default empty string
    #   author - image author, default empty string
    # NOTES:
    #   content should contain url to displayed image     
    public function dcs_img_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pid' => 0,
          'pos' => 'center',
          'mleft' => 'auto',
          'mright' => 'auto',
          'mtop' => 0,
          'mbottom' => 15,
          'lightbox' => 'false',
          'url' => '',
          'width' => 0,
          'height' => 0,
          'async' => 'true',
          'thumb' => 'false',
          'title' => '',
          'desc' => '',
          'author' => '',
          'framed' => 'none',
          'framedall' => 'none',
          'group' => '',
          'line' => 'true',
          'margin' => '',
          'icon' => '',
          'iconurl' => '',
          'usersrc' => '',
          'bgcolor' => ''           
        ); 
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_pid = $atts['pid'];
        $att_position = $atts['pos'];
        $att_mleft = $atts['mleft'];
        $att_mright = $atts['mright'];          
        $att_mtop = $atts['mtop'];
        $att_mbottom = $atts['mbottom'];        
        $att_lightbox = $atts['lightbox'];
        $att_url = $atts['url'];  
        $att_width = (int)$atts['width'];          
        $att_height = $atts['height'];
        $att_async = $atts['async'];  
        $att_thumb = $atts['thumb'];
        $att_title = $atts['title'];  
        $att_desc = $atts['desc'];
        $att_author = $atts['author']; 
        $att_framed = $atts['framed'];
        $att_framedall = $atts['framedall']; 
        $att_group = $atts['group'];         
        $att_line = $atts['line'];
        $att_margin = $atts['margin'];
        $att_icon = $atts['icon']; 
        $att_iconurl = $atts['iconurl']; 
        $att_usersrc = $atts['usersrc']; 
        $att_bgcolor = $atts['bgcolor'];
        
        if($att_usersrc != '')
        {
            $att_iconurl = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;            
        }
        if($att_iconurl != '') { $att_icon = ''; }
        if($att_icon != '')
        {
            if($att_icon == 'play') { $att_icon = ' iplay'; }
            if($att_icon == 'zoom') { $att_icon = ' izoom'; }        
        }        
        
        
        global $nggdb;
        $pic = false;
        if(isset($nggdb))
        {             
            $pic = $nggdb->find_image($att_pid); 
        }        
        
        if($pic !== false)
        {
            if($att_framed != 'none' and $att_framedall != 'none')
            {
                $att_framed = 'none';
            }
            
            $imgpath = $pic->imageURL;
            if($att_thumb == 'true')
            {
                $imgpath = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_width.'&h='.$att_height.'&zc=1';
            }
            
            $style = ' style="';
            if($att_width != 0) 
            { 
                $extra = 0;
                if($att_framed == 'true')
                {
                    $extra = 8;
                }
                $style .= 'width:'.($att_width+$extra).'px;'; 
            }
            if($att_position == 'left') { $style .= 'float:left;'; }
            if($att_position == 'right') { $style .= 'float:right;'; } 
            if($att_margin != '') 
            { 
                $style .= 'margin:'.$att_margin.';'; 
            } else
            {
                if($att_mleft != 'auto') { $style .= 'margin-left:'.$att_mleft.'px;'; }
                if($att_mright != 'auto') { $style .= 'margin-right:'.$att_mright.'px;'; } 
                if($att_mtop != 0) { $style .= 'margin-top:'.$att_mtop.'px;'; }
                if($att_mbottom != 15) { $style .= 'margin-bottom:'.$att_mbottom.'px;'; } 
            }
            
            if($att_width != 0 and $att_framed != 'none') 
            { 
                $style .= 'width:'.($att_width+8).'px;'; 
            }  
            $style .= '" ';
            
         
            $trigerstyle = ' style="';
            if($att_width != 0) { $trigerstyle .= 'width:'.$att_width.'px;'; }
            if($att_height != 0) { $trigerstyle .= 'height:'.$att_height.'px;'; }
            if($att_framed != 'none' or $att_framedall != 'none') { $trigerstyle .= 'left:4px;top:4px;'; }
            if($att_iconurl != '') { $trigerstyle .= 'background-image:url('.$att_iconurl.');'; }       
            $trigerstyle .= '" ';     
            
            $loaderstyle = ' style="';
            if($att_width != 0) { $loaderstyle .= 'width:'.$att_width.'px;'; }
            if($att_height != 0) { $loaderstyle .= 'height:'.$att_height.'px;'; }
            if($att_bgcolor != '') { $loaderstyle .= 'background-color:'.$att_bgcolor.';'; }       
            $loaderstyle .= '" ';         
            
            $temp_class = ($att_framedall == 'white' ? ' framed' : '' ).($att_framedall == 'dark' ? ' framed-dark' : '' );
            $out .= '<div class="dcs-photo '.$temp_class.'" '.$style.'>';
            
            if($att_lightbox == 'true' or $att_url != '')
            {   
                $rel = '';
                 
                if($att_lightbox == 'true')
                {
                    $rel = ' rel="lightbox'.($att_group != '' ? '['.$att_group.']' : '').'" ';
                }
                $href = ' href="'.$pic->imageURL.'" ';
                
                if($att_url != '')
                {   
                    $href = ' href="'.$att_url.'" ';    
                }
                
                $out .= '<a '.$href.' class="triger'.$att_icon.'" '.$trigerstyle.' '.$rel.' title="'.$att_title.'" ></a>';
            }
            
            $temp_class = ($att_framed == 'black' ? ' framed' : '' ).($att_framed == 'dark' ? ' framed-dark' : '' ); 
            $out .= '<div class="loader-wrapper '.$temp_class.'" '.$loaderstyle.'>';
            $out .= '<a class="loader '.($att_async == 'true' ? 'async-img' : '').'" '.$loaderstyle.' ';
            if($att_async == 'true') { $out .= ' rel="'.$imgpath.'" '; }
            $out .= '>';
            if($att_async == 'false') { $out .= '<img src="'.$imgpath.'" />'; }
            $out .= '</a>';
            $out .= '</div>';

            if($att_author != '')
            {
                $out .= $att_author;     
            }
            
            if($att_desc != '')
            {
                $desc_style = ' style="';            
                if($att_line == 'false')
                {
                    $desc_style .= 'background:none;';    
                }
                $desc_style .= '" ';                
                $out .= '<p '.$desc_style.'>'.$att_desc.'</p>';
            }
            
            $out .= '</div>';    
        
        }         
        return $out;
    }      
    
    # SHORTCODE: 
    #   dcs_img_center
    # PAREMAETERS:
    #   framed - can be set to none, black or white
    #   desc - image description
    # NOTES:     
    public function dcs_img_center($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px auto 15px auto',
          'url' => '',
          'target' => '_self'
        ); 
        
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_framed = $atts['framed']; 
        $att_desc = $atts['desc']; 
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target']; 
  
        $class = '';
        if($att_framed == 'black')
        {
            $class .= 'class="framed"';
        }
        if($att_framed == 'white')
        {
            $class .= 'class="framed-white"';
        }
        
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        $style .= '" ';
       
        $out .= '<p class="dcs-image-center" '.$style.'>';
        if($use_tim)
        {
            $content = get_bloginfo('template_url').'/thumb.php?src='.$content.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
        }
        if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }
        $out .= '<img '.$class.' src="'.$content.'" alt="" />';
        if($att_url != '') { $out .= '</a>'; } 
        if($att_desc != '')
        {
            $out .= '<span class="desc">'.$att_desc.'</span>';
        }
        $out .= '</p>';
                
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_img_left
    # PAREMAETERS:
    #   framed - can be set to none, black or white 
    #   desc - image description    
    # NOTES:     
    public function dcs_img_left($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px 20px 15px 0px',
          'url' => '',
          'target' => '_self'          
        ); 
        
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }        
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_framed = $atts['framed'];
        $att_desc = $atts['desc'];
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];                 
        
        $class = '';
        if($att_framed == 'black')
        {
            $class .= 'class="framed"';
        }
        if($att_framed == 'white')
        {
            $class .= 'class="framed-white"';
        }
    
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        $style .= '" ';    
    
        $out .= '<p class="dcs-image-left" '.$style.'>';
        if($use_tim)
        {
            $content = get_bloginfo('template_url').'/thumb.php?src='.$content.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
        }   
        if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }         
        $out .= '<img '.$class.'  src="'.$content.'" />';
        if($att_url != '') { $out .= '</a>'; } 
    
        if($att_desc != '')
        {
            $out .= '<span class="desc">'.$att_desc.'</span>'; 
        }          
        $out .= '</p>';        
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_img_right
    # PAREMAETERS:
    #   framed - can be set to none, black or white 
    #   desc - image description    
    # NOTES:     
    public function dcs_img_right($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px 0px 15px 20px',
          'url' => '',
          'target' => '_self'            
        ); 
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }           
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_framed = $atts['framed'];
        $att_desc = $atts['desc'];
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];          
        
        $class = '';
        if($att_framed == 'black')
        {
            $class .= 'class="framed"';
        }
        if($att_framed == 'white')
        {
            $class .= 'class="framed-white"';
        }
              
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        $style .= '" ';                
              
              
        $out .= '<p class="dcs-image-right">';
        if($use_tim)
        {
            $content = get_bloginfo('template_url').'/thumb.php?src='.$content.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
        }          
        if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }
        $out .= '<img '.$class.'  src="'.$content.'" />';
        if($att_url != '') { $out .= '</a>'; }
        if($att_desc != '')
        {
            $out .= '<span class="desc">'.$att_desc.'</span>'; 
        }     
        $out .= '</p>';            
        return $out;
    }                
    
    # SHORTCODE: 
    #   dcs_img_center_ngg
    # PAREMAETERS:
    #   pid - image id from next gen gallery plugin
    #   framed - can be set to none, black or white 
    #   desc - image description
    # NOTES:     
    public function dcs_img_center_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pid' => 0,
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px auto 15px auto',
          'url' => '',
          'target' => '_self'          
        ); 
                 
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }                 
                        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_framed = $atts['framed']; 
        $att_desc = $atts['desc'];
        $att_pid = $atts['pid']; 
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];         
  
        global $nggdb;
        $pic = false;
        if(isset($nggdb))
        {             
            $pic = $nggdb->find_image($att_pid); 
        }    
  
        if($pic != false)
        {
            $class = '';
            if($att_framed == 'black')
            {
                $class .= 'class="framed"';
            }
            if($att_framed == 'white')
            {
                $class .= 'class="framed-white"';
            }
           
            $style = ' style="';
            $style .= 'margin:'.$att_margin.';';
            $style .= '" ';                            
                      
            $out .= '<p class="dcs-image-center" '.$style.'>';
            if($use_tim)
            {
                $pic->imageURL = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
            }           
            if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }
            $out .= '<img '.$class.' src="'.$pic->imageURL.'" />';
            if($att_url != '') { $out .= '</a>'; } 
            if($att_desc != '')
            {
                $out .= '<span class="desc">'.$att_desc.'</span>';
            }
            $out .= '</p>';
        }        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_img_left_ngg
    # PAREMAETERS:
    #   pid - image id from next gen gallery plugin     
    #   framed - can be set to none, black or white 
    #   desc - image description    
    # NOTES:     
    public function dcs_img_left_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pid' => 0,
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px 20px 15px 0px',
          'url' => '',
          'target' => '_self'            
        ); 
        
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }              
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_framed = $atts['framed'];
        $att_desc = $atts['desc'];
        $att_pid = $atts['pid'];  
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];                 
        
        global $nggdb;
        $pic = false;
        if(isset($nggdb))
        {             
            $pic = $nggdb->find_image($att_pid); 
        }
                   
        if($pic != false)
        {        
            $class = '';
            if($att_framed == 'black')
            {
                $class .= 'class="framed"';
            }
            if($att_framed == 'white')
            {
                $class .= 'class="framed-white"';
            }
               
            $style = ' style="';
            $style .= 'margin:'.$att_margin.';';
            $style .= '" ';                  
                 
            $out .= '<p class="dcs-image-left" '.$style.'>';
            if($use_tim)
            {
                $pic->imageURL = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
            }   
            if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }            
            $out .= '<img '.$class.'  src="'.$pic->imageURL.'" />';
            if($att_url != '') { $out .= '</a>'; } 
            if($att_desc != '')
            {
                $out .= '<span class="desc">'.$att_desc.'</span>'; 
            }          
            $out .= '</p>';        
        }
        return $out;
    }  
    
    # SHORTCODE: 
    #   dcs_img_right_ngg
    # PAREMAETERS:
    #   pid - image id from next gen gallery plugin     
    #   framed - can be set to none, black or white 
    #   desc - image description    
    # NOTES:     
    public function dcs_img_right_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pid' => 0,
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '2px 0px 15px 20px',
          'url' => '',
          'target' => '_self'           
        ); 
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }           
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_framed = $atts['framed'];
        $att_desc = $atts['desc'];
        $att_pid = $atts['pid']; 
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];         
        
        global $nggdb;
        $pic = false;
        if(isset($nggdb))
        {             
            $pic = $nggdb->find_image($att_pid); 
        }           
        
        if($pic != false)
        {        
            $class = '';
            if($att_framed == 'black')
            {
                $class .= 'class="framed"';
            }
            if($att_framed == 'white')
            {
                $class .= 'class="framed-white"';
            }
                  
            $style = ' style="';
            $style .= 'margin:'.$att_margin.';';
            $style .= '" ';                    
                  
            $out .= '<p class="dcs-image-right">';
            if($use_tim)
            {
                $pic->imageURL = get_bloginfo('template_url').'/thumb.php?src='.$pic->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1';    
            }  
            if($att_url != '') { $out .= '<a target="'.$att_target.'" href="'.$att_url.'">'; }
            $out .= '<img '.$class.'  src="'.$pic->imageURL.'" />';
            if($att_url != '') { $out .= '</a>'; }
            if($att_desc != '')
            {
                $out .= '<span class="desc">'.$att_desc.'</span>'; 
            }     
            $out .= '</p>';            
        }
        return $out;
    }     
    
    # SHORTCODE: 
    #   dcs_img_switcher
    # PAREMAETERS:
    #   framed - can be set to none, black or white
    #   desc - image description
    # NOTES:     
    public function dcs_img_switcher($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pos' => 'center',
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '',
          'url' => '',
          'target' => '_self',
          'src' => '',
          'hover' => '',
          'icon' => 'true',
          'deschover' => '',
          'align' => ''
        ); 
        
        $def_margin_center = '2px auto 15px auto';
        $def_margin_left = '2px 20px 15px 0px'; 
        $def_margin_right = '2px 0px 15px 20px'; 
        
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }
        
        $atts = shortcode_atts($defatts, $atts);
        $att_pos = $atts['pos'];                  
        $att_framed = $atts['framed']; 
        $att_desc = $atts['desc']; 
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];
        $att_src = $atts['src']; 
        $att_hover = $atts['hover'];
        $att_icon = $atts['icon'];
        $att_deschover = $atts['deschover'];
        $att_align = $atts['align'];
        
        $align = 'center';
        if($att_margin == '')
        {
            if($att_pos == 'center') { $att_margin = $def_margin_center; $align = 'center'; }
            if($att_pos == 'left') { $att_margin = $def_margin_left; $align = 'left'; }
            if($att_pos == 'right') { $att_margin = $def_margin_right; $align = 'right';}                        
        } 
        
        if($att_align != '') { $align = $att_align; }
  
        $class = '';
        if($att_framed == 'black')
        {
            $class .= 'framed';
        }
        if($att_framed == 'white')
        {
            $class .= 'framed-white';
        }
        
        $style = ' style="';
        $style .= 'margin:'.$att_margin.';';
        if($att_pos == 'left') { $style .= 'float:left;'; }
        if($att_pos == 'right') { $style .= 'float:right;'; } 
        $style .= '" ';
 
        if($use_tim)
        {
            $att_src = get_bloginfo('template_url').'/thumb.php?src='.$att_src.'&w='.$att_w.'&h='.$att_h.'&zc=1';
            $att_hover = get_bloginfo('template_url').'/thumb.php?src='.$att_hover.'&w='.$att_w.'&h='.$att_h.'&zc=1';     
        } 
 
        $link = '';
        if($att_url != '') { $link = ' target="'.$att_target.'" href="'.$att_url.'" '; }
       
        $out .= '<div class="dcs-image-switcher" '.$style.'>';

            $sh_width = $att_w;
            $pos = 0;
            $icon_pos = 5;
            if($att_framed != 'none') { $sh_width += 8; $pos = 3; $icon_pos += 3;}
                        
                $out .= '<div class="sholder" style="width:'.$sh_width.'px;" >';
            
                $out .= '<div class="slideswrapper '.$class.'" style="width:'.$att_w.'px;height:'.$att_h.'px;">';
                    $out .= '<a '.$link.' class="slide async-img" style="width:'.$att_w.'px;height:'.$att_h.'px;left:'.$pos.'px;top:'.$pos.'px;" rel="'.$att_hover.'"></a>';
                    $out .= '<a '.$link.' class="slide async-img" style="width:'.$att_w.'px;height:'.$att_h.'px;left:'.$pos.'px;top:'.$pos.'px;" rel="'.$att_src.'"></a>';
                    
                    if($att_icon == 'true')
                    {
                        $out .= '<div class="icon" style="right:'.$icon_pos.'px;bottom:'.$icon_pos.'px;"></div>';
                    }  
                $out .= '</div>';
                                    
                if($att_desc != '')
                {
                    $style = ' style="text-align:'.$align.';" ';
                    $out .= '<span class="desc" '.$style.'>'.$att_desc.'</span>';
                }
                
                if($att_deschover != '')
                {
                    $style = ' style="text-align:'.$align.';" ';
                    $out .= '<span class="deschover" '.$style.'>'.$att_deschover.'</span>';
                }                
            $out .= '</div>';
        $out .= '</div>';
                
        return $out;
    }     
    
    # SHORTCODE: 
    #   dcs_img_switcher_ngg
    # PAREMAETERS:
    #   framed - can be set to none, black or white
    #   desc - image description
    # NOTES:     
    public function dcs_img_switcher_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pos' => 'center',
          'framed' => 'none',
          'desc' => '',
          'w' => '',
          'h' => '',
          'margin' => '',
          'url' => '',
          'target' => '_self',
          'src' => '',
          'hover' => '',
          'icon' => 'true',
          'deschover' => '',
          'align' => ''
        ); 
        
        $def_margin_center = '2px auto 15px auto';
        $def_margin_left = '2px 20px 15px 0px'; 
        $def_margin_right = '2px 0px 15px 20px'; 
        
        $use_tim = false;
        if(isset($atts['w']) and isset($atts['h']))
        {
            $use_tim = true;    
        }
        
        $atts = shortcode_atts($defatts, $atts);
        $att_pos = $atts['pos'];                  
        $att_framed = $atts['framed']; 
        $att_desc = $atts['desc']; 
        $att_w = $atts['w'];
        $att_h = $atts['h'];
        $att_margin = $atts['margin']; 
        $att_url = $atts['url']; 
        $att_target = $atts['target'];
        $att_src = (int)$atts['src']; 
        $att_hover = (int)$atts['hover'];
        $att_icon = $atts['icon'];
        $att_deschover = $atts['deschover'];
        $att_align = $atts['align'];
        
        global $nggdb;
        $pic_src = false;
        $pic_hover = false;
        if(isset($nggdb))
        {             
            $pic_src = $nggdb->find_image($att_src);
            $pic_hover = $nggdb->find_image($att_hover);  
        }
                   
        if($pic_src != false and $pic_hover != false)
        {         
        
            $align = 'center';
            if($att_margin == '')
            {
                if($att_pos == 'center') { $att_margin = $def_margin_center; $align = 'center'; }
                if($att_pos == 'left') { $att_margin = $def_margin_left; $align = 'left'; }
                if($att_pos == 'right') { $att_margin = $def_margin_right; $align = 'right';}                        
            } 
            
            if($att_align != '') { $align = $att_align; } 
      
            $class = '';
            if($att_framed == 'black')
            {
                $class .= 'framed';
            }
            if($att_framed == 'white')
            {
                $class .= 'framed-white';
            }
            
            $style = ' style="';
            $style .= 'margin:'.$att_margin.';';
            if($att_pos == 'left') { $style .= 'float:left;'; }
            if($att_pos == 'right') { $style .= 'float:right;'; } 
            $style .= '" ';
     
            if($use_tim)
            {
                $pic_src->imageURL = get_bloginfo('template_url').'/thumb.php?src='.$pic_src->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1';
                $pic_hover->imageURL = get_bloginfo('template_url').'/thumb.php?src='.$pic_hover->imageURL.'&w='.$att_w.'&h='.$att_h.'&zc=1';     
            } 
     
            $link = '';
            if($att_url != '') { $link = ' target="'.$att_target.'" href="'.$att_url.'" '; }
           
            $out .= '<div class="dcs-image-switcher" '.$style.'>';

                $sh_width = $att_w;
                $pos = 0;
                $icon_pos = 5;
                if($att_framed != 'none') { $sh_width += 8; $pos = 3; $icon_pos += 3;}
                            
                    $out .= '<div class="sholder" style="width:'.$sh_width.'px;" >';
                
                    $out .= '<div class="slideswrapper '.$class.'" style="width:'.$att_w.'px;height:'.$att_h.'px;">';
                        $out .= '<a '.$link.' class="slide async-img" style="width:'.$att_w.'px;height:'.$att_h.'px;left:'.$pos.'px;top:'.$pos.'px;" rel="'.$pic_hover->imageURL.'"></a>';
                        $out .= '<a '.$link.' class="slide async-img" style="width:'.$att_w.'px;height:'.$att_h.'px;left:'.$pos.'px;top:'.$pos.'px;" rel="'.$pic_src->imageURL.'"></a>';
                        
                        if($att_icon == 'true')
                        {
                            $out .= '<div class="icon" style="right:'.$icon_pos.'px;bottom:'.$icon_pos.'px;"></div>';
                        }  
                    $out .= '</div>';
                                        
                    if($att_desc != '')
                    {
                        $style = ' style="text-align:'.$align.';" ';
                        $out .= '<span class="desc" '.$style.'>'.$att_desc.'</span>';
                    }
                    
                    if($att_deschover != '')
                    {
                        $style = ' style="text-align:'.$align.';" ';
                        $out .= '<span class="deschover" '.$style.'>'.$att_deschover.'</span>';
                    }                
                $out .= '</div>';
            $out .= '</div>';
                
        }        
                
        return $out;    
    }    
    
    # SHORTCODE: 
    #   dcs_hightlight
    # PAREMAETERS:
    #   bg - background color, any CSS color valid value (default #772200)
    #   color - text color, any CSS color valid value (default #FFFFFF)
    # NOTES:     
    public function dcs_hightlight($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'bg' => '#772200',
          'color' => '#FFFFFF',
          'p' => 3,
          'rounded' => 2
        ); 

        $atts = shortcode_atts($defatts, $atts);
        $att_bg = $atts['bg'];                  
        $att_color = $atts['color'];         
        $att_p = $atts['p'];
        $att_rounded = $atts['rounded'];
        
        $class = '';
        if($att_rounded > 0)
        {
            $class = ' class="rounded-borders-'.$att_rounded.'" ';
        }         
        
        $style = ' style="padding:1px '.$att_p.'px 1px '.$att_p.'px;';
        $style .= 'background-color:'.$att_bg.';';
        if($att_color != '') { $style .= 'color:'.$att_color.';'; }
        $style .= '" ';        
           
        $out .= '<span '.$class.' '.$style.'>'.$content.'</span>';    
                 
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_toggle
    # PAREMAETERS:
    #   title - tab title (default empty string)
    #   mleft - left margin in pixels (default zero)
    #   color - title color, you can use any CSS valid value for color property (default not set)
    #   open - if true tab will be opened on start (default not false)
    #   icon - icon 24x24px for tab (default not set)
    #   usersrc - file name with extenstion, with this parameter you can set icon from [theme path]/img/shortcodes folder
    #   state - if set to false plus/minus icon will be hidden (default set to true)
    # NOTES:     
    public function dcs_toggle($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'title' => 'Toggle panel',
          'mleft' => 0,
          'color' => '',
          'open' => 'false',
          'icon' => '',
          'usersrc' => '',
          'state' => 'true',
          'mbottom' => '',
          'padding' => '15px 10px 15px 10px'          
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_title = $atts['title'];
        $att_mleft = $atts['mleft'];  
        $att_color = $atts['color'];
        $att_open = $atts['open'];
        $att_icon = $atts['icon'];
        $att_state = $atts['state'];  
        $att_usersrc = $atts['usersrc'];
        $att_mbottom = $atts['mbottom'];
        $att_padding = $atts['padding'];         
       
        $out .= '<div class="dcs-toggle" style="margin-left:'.$att_mleft.'px;'.($att_mbottom != '' ? 'margin-bottom:'.$att_mbottom.'px;' : '').'">';
        
        if($att_usersrc != '')
        {
           $att_icon = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc; 
        }
        
        if($att_icon != '')
        {
            $out .= '<img class="toggle-icon-img" src="'.$att_icon.'" />';
        }
                
        if($att_state == 'true')
        {
            if($att_open == 'true')
            {
                $out .= '<div class="toggle-icon-close"></div>';    
            } else
            {
                $out .= '<div class="toggle-icon-open"></div>';
            }
        }
        
        $content_style = ' style="';
        if($att_open == 'true') { $content_style .= 'display:block;'; }
        $content_style .= 'padding:'.$att_padding.';';
        $content_style .= '" ';        
        
        $out .= '<h4 class="toggle-triger" style="'.($att_color != '' ? 'color:'.$att_color.';' : '').($att_icon != '' ? 'padding-left:38px;' : '').'">'.$att_title.'</h4>';
        $out .= '<div class="toggle-content" '.$content_style.'>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        $out .= '</div>';        
        return $out;
    }     
     
    # SHORTCODE: 
    #   dcs_toggle_flat
    # PAREMAETERS:
    # NOTES:     
    public function dcs_toggle_flat($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'title' => 'Toggle flat panel',
          'mleft' => 0,
          'color' => $this->_theme_main_color,
          'open' => 'false',
          'state' => 'true',
          'icons' => '',
          'weight' => 'bold',
          'mbottom' => '',
          'padding' => '15px 10px 15px 10px'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_title = $atts['title'];
        $att_mleft = $atts['mleft'];  
        $att_color = $atts['color'];
        $att_open = $atts['open'];
        $att_state = $atts['state'];  
        $att_icons = $atts['icons'];
        $att_weight = $atts['weight'];
        $att_mbottom = $atts['mbottom'];
        $att_padding = $atts['padding']; 
        
        $inner_icons = '';
        if($att_icons != '')
        {
            $arr = explode(',', $att_icons);
            foreach($arr as $ico)
            {
                $inner_icons .= ' <a class="dcs-sicon" style="background-image:url('.get_bloginfo('template_url').'/img/shortcodes/'.$ico.');"></a>';    
            }
        } 
       
        $out .= '<div class="dcs-toggle-flat" style="margin-left:'.$att_mleft.'px;'.($att_mbottom != '' ? 'margin-bottom:'.$att_mbottom.'px;' : '').'">';
    
        if($att_state == 'true')
        {
            if($att_open == 'true')
            {
                $out .= '<div class="toggle-flat-icon-close"></div>';    
            } else
            {
                $out .= '<div class="toggle-flat-icon-open"></div>';
            }
        }
        
        $content_style = ' style="';
        if($att_open == 'true') { $content_style .= 'display:block;'; }
        $content_style .= 'padding:'.$att_padding.';';
        $content_style .= '" ';
        
        $out .= '<span class="toggle-flat-triger" style="font-weight:'.$att_weight.';'.($att_color != '' ? 'color:'.$att_color.';' : '').'">'.$att_title.$inner_icons.'</span>';
        $out .= '<div class="toggle-flat-content" '.$content_style.'>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        $out .= '</div>';        
        return $out;
    }    

    # SHORTCODE: 
    #   dcs_toggle_btn
    # PAREMAETERS:
    # NOTES:     
    public function dcs_toggle_btn($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'title' => 'Toggle button',
          'mleft' => 0,
          'mbottom' => '',
          'color' => '',
          'open' => 'false'
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_title = $atts['title'];
        $att_mleft = $atts['mleft'];  
        $att_color = $atts['color'];
        $att_open = $atts['open'];
        $att_mbottom = $atts['mbottom']; 

        $style = ' style="';
        $style .= 'margin-left:'.$att_mleft.'px;';
        if($att_mbottom != '')
        {
            $style .= 'margin-bottom:'.$att_mbottom.'px;';    
        }
        $style .= '" ';
        
        $out .= '<div class="dcs-toggle-btn" '.$style.'>';
    
        $add_class = '';
        if($att_open == 'true')
        {
            $add_class .= 'toggle-btn-icon-close';    
        } else
        {
            $add_class .= 'toggle-btn-icon-open';
        }
        
        $out .= '<h4 class="toggle-btn-triger '.$add_class.'" style="'.($att_color != '' ? 'color:'.$att_color.';' : '').'">'.$att_title.'</h4>';
        $out .= '<div class="toggle-btn-content" '.($att_open == 'true' ? ' style="display:block;" ' : '').'>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        $out .= '</div>';        
        return $out;
    }    
    
    # SHORTCODE: 
    #   dcs_toggle_frame
    # PAREMAETERS:
    # NOTES:     
    public function dcs_toggle_frame($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'title' => 'Toggle frame',
          'mleft' => 0,
          'color' => '',
          'open' => 'false',
          'mbottom' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_title = $atts['title'];
        $att_mleft = $atts['mleft'];  
        $att_color = $atts['color'];
        $att_open = $atts['open'];
        $att_state = $atts['state'];  
        $att_mbottom = $atts['mbottom']; 
        
        $style = ' style="';
        $style .= 'margin-left:'.$att_mleft.'px;';
        if($att_mbottom != '')
        {
            $style .= 'margin-bottom:'.$att_mbottom.'px;';    
        }
        $style .= '" ';        
        
        $out .= '<div class="dcs-toggle-frame" '.$style.'>';
    
        $add_class = '';
        if($att_open == 'true')
        {
            $add_class .= 'toggle-frame-icon-close';    
        } else
        {
            $add_class .= 'toggle-frame-icon-open';
        }
        
        $out .= '<h4 class="toggle-frame-triger '.$add_class.'" style="'.($att_color != '' ? 'color:'.$att_color.';' : '').'">'.$att_title.'</h4>';
        $out .= '<div class="toggle-frame-content" '.($att_open == 'true' ? ' style="display:block;" ' : '').'>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        $out .= '</div>';        
        return $out;
    }    

    # SHORTCODE: 
    #   dcs_lb_link
    # PAREMAETERS:
    #   url - url to image or video displayed via lightbox, must have valid value
    #   group - group name for lightbox (default no set)
    #   title - image title for light box (defalt not set)
    # NOTES:     
    public function dcs_lb_link($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'color' => '',  
          'url' => '',
          'group' => '',
          'title' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_url = $atts['url'];      
        $att_group = $atts['group']; 
        $att_title = $atts['title'];
        $att_color = $atts['color'];
        
        $style = '';
        if($att_color != '')
        {
            $style = ' style="color:'.$att_color.';" ';    
        }
        
        $out .= '<a '.$style.' href="'.$att_url.'" rel="lightbox'.($att_group != '' ? '['.$att_group.']' : '' ).'" title="'.$att_title.'" >'.$content.'</a>';
        return $out;
    }
    
    # SHORTCODE: 
    #   dcs_lb_link_ngg
    # PAREMAETERS:
    #   pid - image id from next gen gallery
    #   group - group name for lightbox (default no set)
    # NOTES:     
    public function dcs_lb_link_ngg($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'pid' => '',
          'group' => '',
          'color' => '',
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                 
        $att_pid = $atts['pid'];      
        $att_group = $atts['group'];
        $att_color = $atts['color'];  
        
        $style = '';
        if($att_color != '')
        {
            $style = ' style="color:'.$att_color.';" ';    
        }        
        
        global $nggdb;
        $pic = false;
        if(isset($nggdb))
        {             
            $pic = $nggdb->find_image($att_pid); 
        }    
        
        $out .= '<a '.$style.' href="'.$pic->imageURL.'" rel="lightbox'.($att_group != '' ? '['.$att_group.']' : '' ).'" title="'.$pic->description.'">'.$content.'</a>';
        return $out;
    }        

    # SHORTCODE: 
    #   dcs_flat_tabs
    # PAREMAETERS:
    #   def - index of default selected tab (deafult set to one, first tab will be selected)
    #   align - can best set to left or right (default left)
    #   tab1,tab2,tab3,tab4 etc - tabs names 
    # NOTES:     
    public function dcs_flat_tabs($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'def' => 1,
          'border' => 'false',
          'bcolor' => '#DDDDDD',
          'scolor' => '#CCCCCC',
          'bgcolor' => '', 
          'align' => 'left',
          'bgcolor' => '',
          'padding' => '10px 0px 0px 0px',
          'h' => 0
        );         
        
        $att = shortcode_atts($defatts, $atts);                 
        $att_def = (int)$att['def'];      
        $att_align = $att['align']; 
        $att_padding = $att['padding']; 
        $att_border = $att['border']; 
        $att_bcolor = $att['bcolor']; 
        $att_bgcolor = $att['bgcolor'];
        $att_scolor = $att['scolor']; 
        $att_h = $att['h']; 
        
        if($att_align != 'left' and $att_align != 'right')
        {
            $att_align = 'left';
        }
        
        $out .= '<div class="dcs-tabs-flat"><span class="default">'.($att_def-1).'</span>'; 
        $out .= '<ul class="panel">';
        $counter = 1;
        $name = 'tab'.$counter;
        while(isset($atts[$name]))
        {    
            $out .= '<li style="float:'.$att_align.';">'.$atts[$name].'</li>';
            $counter++;
            $name = 'tab'.$counter;
        }
        
        $wrap_style = ' style="';
        if($att_border == 'true')
        {
            $wrap_style .= 'border:1px solid '.$att_bcolor.';';    
        }
        $wrap_style .= 'padding:'.$att_padding.';';
        if($att_bgcolor != '')
        {
            $wrap_style .= 'background-color:'.$att_bgcolor.';';     
        }      
        if($att_h > 0)
        {
            $wrap_style .= 'height:'.$att_h.'px;overflow:hidden;';     
        }  
        $wrap_style .= '" ';
        
        $out .= '</ul><div class="clear-both" style="background-color:'.$att_scolor.';"></div><div '.$wrap_style.'>';
        $out .= do_shortcode($content);
        $out .= '</div></div>';
        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_flat_tab
    # PAREMAETERS:
    #   h - if set to other value then zero tab will have fixed height (default zero)
    # NOTES:     
    public function dcs_flat_tab($atts, $content=null, $code="")
    {
        $out = '';
        $out .= '<div class="tab-content">';
        $out .= do_shortcode($content);
        $out .= '</div>';
        return $out;
    }        
    
    # SHORTCODE: 
    #   dcs_abs_flat_tabs
    # PAREMAETERS:
    #   def - index of default selected tab (deafult set to one, first tab will be selected)
    #   align - can best set to left or right (default left)
    #   tab1,tab2,tab3,tab4 etc - tabs names 
    # NOTES:     
    public function dcs_abs_flat_tabs($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'def' => 1,
          'align' => 'left',
          'float' => '',
          'width' => ''
        );         
        
        $att = shortcode_atts($defatts, $atts);                 
        $att_def = (int)$att['def'];      
        $att_align = $att['align']; 
        $att_float = $att['float'];
        $att_width = (int)$att['width'];
        
        if($att_align != 'left' and $att_align != 'right')
        {
            $att_align = 'left';
        }
        
        $style = ' style="';
        if($att_width != '')
        {
            $style .= 'width:'.$att_width.'px;';
        }
        if($att_float != '')
        {
            $style .= 'float:'.$att_float.';';
        }        
        $style .= '" ';
        
        $out .= '<div class="dcs-tabs-abs-flat" '.$style.'><span class="default">'.($att_def-1).'</span>'; 
        $out .= '<ul class="panel">';
        $counter = 1;
        $name = 'tab'.$counter;
        while(isset($atts[$name]))
        {    
            $out .= '<li style="float:'.$att_align.';">'.$atts[$name].'</li>';
            $counter++;
            $name = 'tab'.$counter;
        }
        $out .= '</ul><div class="clear-both"></div>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_abs_flat_tab
    # PAREMAETERS:
    #   height - if set to other valie then zero tab will have fixed height (default zero)
    # NOTES:     
    public function dcs_abs_flat_tab($atts, $content=null, $code="")
    {
        $out = '';
        
        $defatts = Array(
          'height' => 0,
          'border' => 'false',
          'bg' => '',
          'padding' => '0px',
          'width' => 0,
          'opacity' => '',
          'bottom' => '',
          'align' => 'right',
          'z' => 10,
          'framed' => 'false'
        );         
        
        $att = shortcode_atts($defatts, $atts);                 
        $att_height = (int)$att['height'];             
        $att_border = $att['border'];
        $att_bg = $att['bg'];
        $att_padding = $att['padding']; 
        $att_width = $att['width']; 
        $att_opacity = $att['opacity'];
        $att_bottom = $att['bottom'];
        $att_align = $att['align'];
        $att_z = $att['z'];
        $att_framed = $att['framed'];
                
        $style =  ' style="';
        $style .= 'padding:'.$att_padding.';';
        $style .= 'z-index:'.$att_z.';';
        if($att_height != 0)
        {
            $style .= 'height:'.$att_height.'px;';
        }
        if($att_bottom != '') { $style .= 'bottom:'.$att_bottom.'px;'; }
        if($att_align == 'right') { $style .= 'right:0px;'; } else { $style .= 'left:0px;'; }
        if($att_width != 0)
        {
            $style .= 'width:'.$att_width.'px;';
        }        
        if($att_bg != '')
        {
            $style .= 'background-color:'.$att_bg.';';     
        }
        $style .= '" ';
        
        $out .= '<div class="'.($att_framed == 'true' ? ' framed-black' : '').' tab-content'.($att_border == 'true' ? ' border' : '').($att_opacity != '' ? ' dc-opacity-'.$att_opacity : '').'" '.$style.'>';
        $out .= do_shortcode($content);
        $out .= '</div>';
        return $out;
    }       
    
    # SHORTCODE: 
    #   dcs_banner
    # PAREMAETERS:
    #   h - banner height in pixels (default 50 px)
    #   inter - time in miliseconds betwean slides (default 3000 ms, 3 seconds)  
    # NOTES:     
    public function dcs_banner($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'h' => 50,
          'w' => 600,
          'inter' => 6000,
          'finter' => 1500,
          'mbottom' => 15,
          'float' => '',
          'margin' => '',
          'desc' => 'false',
          'border' => 'true',           
          'bcolor' => '' 
        ); 
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_height = $atts['h'];
        $att_inter = $atts['inter'];
        $att_finter = $atts['finter'];
        $att_width = $atts['w'];
        $att_mbottom = $atts['mbottom']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin'];
        $att_desc = $atts['desc'];
        $att_bcolor = $atts['bcolor'];
        $att_border = $atts['border'];          
        
        $style = ' style="';
        $style .= 'height:'.($att_height+2).'px;';
        $style .= 'width:'.($att_width+2).'px;';
         
        if($att_margin != '')
        {
            $style .= 'margin:'.$att_margin.';';
        } else
        {
            $style .= 'margin-bottom:'.$att_mbottom.'px;';     
        }
        
        if($att_float != '')
        {
            $style .= 'float:'.$att_float.';';
        }
        if($att_desc == 'false')
        {
            $style .= 'padding-bottom:0px;';
        }        
        $style .= '" ';      
        
        $out .= '<div class="dcs-banner-slider" '.$style.'>';
        
        $style = ' style="';
        $style .= 'height:'.$att_height.'px;';
        if($att_bcolor != '')
        {
            $style .= 'border-color:'.$att_bcolor.';';
        }          
        $style .= 'width:'.$att_width.'px;';
        if($att_border != 'true')
        {
            $style .= 'border:0px solid red;';               
        }            
        $style .= '" ';          
        
        $out .= '<div class="slides-wrapper" '.$style.'>'.do_shortcode($content).'</div>';
        $out .= '<span class="inter data">'.$att_inter.'</span>';
        $out .= '<span class="finter data">'.$att_finter.'</span>';             
        
        if($att_desc == 'true')
        { 
            $style = ' style="';
            $style .= 'width:'.($att_width-3).'px;';      
            $style .= '" ';             
            
            $out .= '<div class="description" '.$style.'><span></span></div>';        
        }
        
        $out .= '</div>';       
        return $out;
    }     
    
    # SHORTCODE: 
    #   dcs_banner_slide
    # PAREMAETERS:
    #   h - slide height (default 50 px)
    #   w - slide width, must be set
    #   img - path to image, must be set
    #   url - URL for slide (default not set)
    #   desc - slide description (default empty string)  
    # NOTES:     
    public function dcs_banner_slide($atts, $content=null, $code="")
    {
        $out = '';
        $defatts = Array(
          'h' => 50,             
          'w' => '',
          'img' => '',
          'url' => '',
          'desc' => '',
          'target' => '_blank'  
        ); 
        
        $atts = shortcode_atts($defatts, $atts);               
        $att_height = $atts['h'];
        $att_width = $atts['w']; 
        $att_image = $atts['img']; 
        $att_url = $atts['url']; 
        $att_desc = $atts['desc'];                                                                                                  
        $att_target = $atts['target'];
        
        $style = ' style="';
        $style .= 'height:'.$att_height.'px;';
        $style .= 'width:'.$att_width.'px;';
        $style .= '" ';      

        if($att_url != '')
        {
            $att_url = ' href="'.$att_url.'" ';
        }
        
        $out .= '<div class="slide" '.$style.'><a '.$style.' '.$att_url.' target="'.$att_target.'" class="loader async-img-s" rel="'.$att_image.'"></a>';
        
        if($att_desc != '')
        {                      
            $out .= '<span class="desc data">'.$att_desc.'</span>';
        }
        $out .= '</div>';       
        return $out;
    }        
    
    # SHORTCODE: 
    #   dcs_news_top
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_news_top($atts, $content=null, $code="")
    {
        global $post;
        global $pt_list;
        $out = '';
        
        $out .= '<div class="dcs-news-top"><div class="content">';
        if('open' == $post->comment_status) 
        {                              
            $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
        }
        $out .= '<div class="info">
                <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span>
                Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                
            $pt_count = count($pt_list);
            for($i = 0; $i < $pt_count; $i++)
            {
                if($i > 0)
                {
                   $out .= ', '; 
                }
                $out .= '<a href="'.get_term_link($pt_list[$i]->slug, 'news_cat').'">'.$pt_list[$i]->name.'</a>';
                 
            }                               
            
            $out .= '</div>';
              
            $out .= '<h2>'.$post->post_title.'</h2>';
                                                
           
        $out .= '</div></div> <!-- content -->';         
        
        
        return $out;
    } 
    
    # SHORTCODE: 
    #   dcs_news_bottom 
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_news_bottom($atts, $content=null, $code="")
    {
        global $post;
        $out = '';
        
        $out = '';
        $out .= '<div class="blog-post-bottom-wrapper-single">';
        $out .= GetDCCPInterface()->getIGeneral()->renderNextPrevPostPanel($post->post_type);
        
        $novoting = get_post_meta($post->ID, 'news_novoting', true); 
        
        if(GetDCCPInterface()->getIGeneral()->showNewsVoting() and $novoting == '')
        {
            global $dcp_votingshortcodes; 
            if(isset($dcp_votingshortcodes))
            {
                $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left'); 
            }
        }                                   
        
       // post tags list
       $posttags = wp_get_object_terms($post->ID, 'news_tag');                              
       $count = 0;
       if($posttags !== false)
       {
            $count = count($posttags);
       }
        
       if($count > 0)
       {   
           $out .= '<div class="blog-post-tags-single">
                    <span class="name">Tags:</span> ';
           
           $i = 0;            
           foreach($posttags as $tag)
           {   
               if($i > 0)
               {
                   $out .= ', ';
               }
               $title = '';
               if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                         
                
                $out .= '<a href="'.get_term_link($tag->slug, 'news_tag').'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
               $i++;
           }                       
           $out .= '</div>';                                            
            
       } else
       { 
            if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
            {                                
               $out .= '<div class="blog-post-tags-single">
                        There are no tags associated with this post.                           
                    </div>';   
            }                                                                                 
       }                            

        $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons();     
        $out .= '<div class="clear-both"></div></div>';        
        
        return $out;
    }          
    
    # SHORTCODE: 
    #   dcs_news_author 
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_news_author($atts, $content=null, $code="")
    {
        global $post;
        $out = '';
    
        if(GetDCCPInterface()->getIGeneral()->showNewsAuthor()) 
        {                           
            $default_avatar = get_bloginfo('template_url').'/img/temp_files/avatar2.jpg';
            $authoremail = get_the_author_meta('user_email', $post->post_author);
            $avatar = get_avatar($authoremail, '60', $default_avatar);
   
            $author_posts_count = get_the_author_posts();
            $author_tip = $author_posts_count . ($author_posts_count > 1 ? ' posts' : ' post');
           $out = '';
           $out = '
                 <div class="blog-post-author"> 
            
                <h4>ABOUT THE AUTHOR</h4> 
            
                <div class="avatar"> 
                    '.$avatar.' 
                </div> <!--avatar-->                       
                                        
                <div class="desc-wrapper" '.($nosidebar != '' ? ' style="width:800px;" ' : ' style="width:480px;" ').'>                     
                    <div class="float-left"> 
                        <p class="author">'.get_the_author_meta('display_name', $post->post_author).'</p> 
                        <p class="authorTitle">'.get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author).'</p> 
                    </div>'; 
                    
                    $author_url = get_the_author_meta('user_url', $post->post_author);                    
                    if($author_url != '')
                    {
                        $out .= '<div class="float-right"> 
                            <a href="'.$author_url.'" class="authorLink" target="_blank">Visit Authors Site</a> 
                        </div>';
                    } 
                     
                    $out .= '<div class="clear-both"></div>
                    <div style="float: left;"> 
                        <p class="desc">'.get_the_author_meta('description', $post->post_author).' '.
                        '<a title="'.$author_tip.'" class="link-tip-right" href="'.get_author_posts_url($post->post_author).'">View&nbsp;all&nbsp;posts&nbsp;by&nbsp;'.get_the_author_meta('display_name', $post->post_author).'</a></p> 
                    </div> 
                </div>
                     
              
                
                <div class="clear-both"></div> 
            
            </div> <!--blog-post-author-->               
           ';                    
        }        
        
        return $out;
    }    
    
    
    # SHORTCODE: 
    #   dcs_related_news 
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_related_news($atts, $content=null, $code="")
    {
        global $post;
        global $wpdb; 
        
        $out = '';
        $defatts = Array(
          'id' => '',
          'exclude' => 'true',
          'limit' => 4,
          'title' => 'Related news',
          'count' => 4
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_id = $atts['id'];
        $att_exclude = $atts['exclude'];
        $att_limit = (int)$atts['limit'];
        $att_title = $atts['title'];
        $att_count = $atts['count'];
        
        if($att_id == '')
        {
            $att_id = $post->ID;    
        }        
        
        $newstags = wp_get_object_terms($att_id, 'news_tag');                              
        $count = 0;
        $count = count($newstags);
               
        $subquery = '';
        for($i = 0; $i < $count; $i++)
        {
            if($i > 0)
            {
                $subquery .= ' OR ';    
            }
            $subquery .= "$wpdb->terms.term_id =".$newstags[$i]->term_id;
        }
        
        $querystr = "
            SELECT DISTINCT ID, post_title
            FROM $wpdb->posts
            LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
            LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
            LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
            WHERE $wpdb->posts.post_type = 'news' 
            AND $wpdb->posts.post_status = 'publish' ".
            ($att_exclude == 'true'  ? " AND $wpdb->posts.ID <> $att_id " : "").
            " AND $wpdb->term_taxonomy.taxonomy = 'news_tag'
            AND ($subquery)
            GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC LIMIT $att_limit 
            ";

        $news = $wpdb->get_results($querystr, OBJECT);                    
        $count_news = count($news);
        
        if($count_news > 0)
        {
            $out .= '<div class="dcs-related-posts">';
            $out .= '<h6>'.$att_title.'</h6>';
            
            $out .= '<ul>';                
            
            for($i = 0; $i < $count_news; $i++)
            {                          
                $thumbpath = get_post_meta($news[$i]->ID, 'news_thumb_image', true); 
                $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$thumbpath.'&w=130&h=100&zc=1'.'" ';  
                $out .= '<li class="'.((($i+1) % $att_count) == 0 ? 'last' : '').'" >';
                    if($thumbpath != '')
                    {
                        $out .= '<div class="image framed">';
                            $out .= '<a href="'.get_permalink($news[$i]->ID).'" class="async-img-s loader" '.$rel.'>';
                                $imagepath = get_post_meta($news[$i]->ID, 'news_image', true);
                                $out .= '<a href="'.$imagepath.'" rel="lightbox[related_news_image_'.$att_id.']" class="zoom" title="'.$news[$i]->post_title.'"></a>';
                            $out .= '</a>';
                        $out .= '</div>';
                    }
                $out .= '<p><a href="'.get_permalink($news[$i]->ID).'">'.$news[$i]->post_title.'</a></p>';
                $out .= '</li>';    
                
                if((($i+1) % $att_count) == 0)
                {
                    $out .= '<div class="clear-both"></div>';
                }
            }
            $out .= '</ul>';
            
            $out .= '<div class="clear-both"></div>';
            $out .= '</div>';  
        
        }
        return $out;
    }    

    
    # SHORTCODE: 
    #   dcs_related_posts 
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_related_posts($atts, $content=null, $code="")
    {
        global $wpdb; 
        global $post;
        
        $out = '';
        $defatts = Array(
          'id' => '',
          'exclude' => 'true',
          'limit' => 4,
          'title' => 'Related posts',
          'count' => 4
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_id = $atts['id'];
        $att_exclude = $atts['exclude'];
        $att_limit = (int)$atts['limit'];
        $att_title = $atts['title'];
        $att_count =  $atts['count'];
        
        if($att_id == '')
        {
            $att_id = $post->ID;    
        }
        
        $newstags = wp_get_object_terms($att_id, 'post_tag');                              
        $count = 0;
        $count = count($newstags);
               
        $subquery = '';
        for($i = 0; $i < $count; $i++)
        {
            if($i > 0)
            {
                $subquery .= ' OR ';    
            }
            $subquery .= "$wpdb->terms.term_id =".$newstags[$i]->term_id;
        }
        
        $querystr = "
            SELECT DISTINCT ID, post_title
            FROM $wpdb->posts
            LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
            LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
            LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
            WHERE $wpdb->posts.post_type = 'post' 
            AND $wpdb->posts.post_status = 'publish' ".
            ($att_exclude == 'true'  ? " AND $wpdb->posts.ID <> $att_id " : "").
            " AND $wpdb->term_taxonomy.taxonomy = 'post_tag'
            AND ($subquery)
            GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC LIMIT $att_limit 
            ";

        $news = $wpdb->get_results($querystr, OBJECT);                    
        $count_news = count($news);
        
        if($count_news > 0)
        {
            $out .= '<div class="dcs-related-posts">';
            $out .= '<h6>'.$att_title.'</h6>';
            
            $out .= '<ul>';                
            
            for($i = 0; $i < $count_news; $i++)
            {                          
                $thumbpath = get_post_meta($news[$i]->ID, 'post_thumb_image', true); 
                $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$thumbpath.'&w=130&h=100&zc=1'.'" ';  
                $out .= '<li class="'.((($i+1) % $att_count) == 0 ? 'last' : '').'" >';
                    if($thumbpath != '')
                    {
                        $out .= '<div class="image framed">';
                            $out .= '<a href="'.get_permalink($news[$i]->ID).'" class="async-img-s loader" '.$rel.'>';
                                $imagepath = get_post_meta($news[$i]->ID, 'post_image', true);
                                $out .= '<a href="'.$imagepath.'" rel="lightbox[related_posts_image_'.$att_id.']" class="zoom" title="'.$news[$i]->post_title.'"></a>';
                            $out .= '</a>';
                        $out .= '</div>';
                    }
                $out .= '<p><a href="'.get_permalink($news[$i]->ID).'">'.$news[$i]->post_title.'</a></p>';
                $out .= '</li>';    
                
                if((($i+1) % $att_count) == 0)
                {
                    $out .= '<div class="clear-both"></div>';
                }                
            }

            $out .= '</ul>';
            
            $out .= '<div class="clear-both"></div>';
            $out .= '</div>';  
        
        }
        return $out;
    }       

    # SHORTCODE: 
    #   dcs_related_projects 
    # PAREMAETERS: 
    # NOTES:     
    public function dcs_related_projects($atts, $content=null, $code="")
    {
        global $wpdb; 
        global $post;
        
        $out = '';
        $defatts = Array(
          'id' => '',
          'exclude' => 'true',
          'limit' => 4,
          'title' => 'Related projects',
          'count' => 4
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_id = $atts['id'];
        $att_exclude = $atts['exclude'];
        $att_limit = (int)$atts['limit'];
        $att_title = $atts['title'];
        $att_count =  $atts['count'];
        
        if($att_id == '')
        {
            $att_id = $post->ID;    
        }
        
        $newstags = wp_get_object_terms($att_id, 'project_cat');                              
        $count = 0;
        $count = count($newstags);
               
        $subquery = '';
        for($i = 0; $i < $count; $i++)
        {
            if($i > 0)
            {
                $subquery .= ' OR ';    
            }
            $subquery .= "$wpdb->terms.term_id =".$newstags[$i]->term_id;
        }
        
        $querystr = "
            SELECT DISTINCT ID, post_title
            FROM $wpdb->posts
            LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
            LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
            LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
            WHERE $wpdb->posts.post_type = 'project' 
            AND $wpdb->posts.post_status = 'publish' ".
            ($att_exclude == 'true'  ? " AND $wpdb->posts.ID <> $att_id " : "").
            " AND $wpdb->term_taxonomy.taxonomy = 'project_cat'
            AND ($subquery)
            GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC LIMIT $att_limit 
            ";

        $news = $wpdb->get_results($querystr, OBJECT);                    
        $count_news = count($news);
        
        if($count_news > 0)
        {
            $out .= '<div class="dcs-related-posts">';
            $out .= '<h6>'.$att_title.'</h6>';
            
            $out .= '<ul>';                
            
            for($i = 0; $i < $count_news; $i++)
            {                          
                $thumbpath = get_post_meta($news[$i]->ID, 'project_post_thumb', true); 
                $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$thumbpath.'&w=130&h=100&zc=1'.'" ';  
                $out .= '<li class="'.((($i+1) % $att_count) == 0 ? 'last' : '').'" >';
                    if($thumbpath != '')
                    {
                        $out .= '<div class="image framed">';
                            $out .= '<a href="'.get_permalink($news[$i]->ID).'" class="async-img-s loader" '.$rel.'>';
                                $imagepath = get_post_meta($news[$i]->ID, 'project_image', true);
                                $out .= '<a href="'.$imagepath.'" rel="lightbox[related_posts_image_'.$att_id.']" class="zoom" title="'.$news[$i]->post_title.'"></a>';
                            $out .= '</a>';
                        $out .= '</div>';
                    }
                $out .= '<p><a href="'.get_permalink($news[$i]->ID).'">'.$news[$i]->post_title.'</a></p>';
                $out .= '</li>';    
                
                if((($i+1) % $att_count) == 0)
                {
                    $out .= '<div class="clear-both"></div>';
                }                
            }

            $out .= '</ul>';
            
            $out .= '<div class="clear-both"></div>';
            $out .= '</div>';  
        
        }
        return $out;
    }    
    
    # SHORTCODE: 
    #   dcs_player 
    # PAREMAETERS:
    #   name - page unique video name, must be set to valid value (default empty string)
    #   url - url to video file, must be set to valid url (default empty string)
    #   w - video width in pixels (default 520 px)
    #   h - video height in pixels (default 330 px)
    #   float - can be set to left or right (default floating is disabled)
    #   margin - viedo top, right, bottom and left margin in pixels, you can use any CSS valid value for margin property (default set to 'auto auto 15px auto' ) 
    # NOTES:     
    public function dcs_player($atts, $content=null, $code="")
    {
        global $wpdb; 
        global $post;
        
        $out = '';
        $defatts = Array(
          'name' => '',
          'url' => '',
          'w' => 520,
          'h' => 330,
          'margin' => 'auto auto 15px auto',
          'float' => 'none',
          'border' => 'true',
          'desc' => '',
          'align' => 'left',
          'usersrc' => '',
          'themesrc' => '',
          'play' => 'false',
          'buffering' => 'false',
          'full' => 'false',
          'time' => 'false',
          'line' => 'true',
          'splash' => ''
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_name = $atts['name'];
        $att_url = $atts['url'];
        $att_width = (int)$atts['w'];
        $att_height = (int)$atts['h'];
        $att_float = $atts['float'];
        $att_margin = $atts['margin'];
        $att_themesrc = $atts['themesrc'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_border = $atts['border'];
        $att_usersrc = $atts['usersrc']; 
        $att_line = $atts['line']; 
        $att_splash = $atts['splash']; 
        
        
        $att_play = $atts['play'];
        $att_buffering = $atts['buffering']; 
        $att_full = $atts['full'];
        $att_time = $atts['time']; 
        
        if($att_play != 'false' and $att_play != 'true') { $att_play = 'false'; }
        if($att_buffering != 'false' and $att_buffering != 'true') { $att_buffering = 'false'; }
        if($att_full != 'false' and $att_full != 'true') { $att_full = 'false'; }
        if($att_time != 'false' and $att_time != 'true') { $att_time = 'false'; }
        
        if($att_usersrc != '' or $att_themesrc != '')
        {
            if($att_usersrc != '')
            {
                $att_url = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc; 
            } else
            if($att_themesrc != '')
            {
                $att_url = get_bloginfo('template_url').'/'.$att_themesrc; 
            }               
        }
        
        $style = ' style="';
        $style .= 'display:block;';
        $style .= 'width:'.$att_width.'px;';
        $style .= 'height:'.$att_height.'px;';
        if($att_border == 'true')
        {
            $style .= 'border:1px solid #111111;';     
        }
        $style .= '" ';
        
        $style_w = ' style="';
        $style_w .= 'display:block;';
        $style_w .= 'float:'.$att_float.';';
        $style_w .= 'margin:'.$att_margin.';';    
        $style_w .= 'width:'.$att_width.'px;';
        $style_w .= '" ';        
        
        $description = '';
        if($att_desc != '')
        {
            $desc_style = ' style="';
            $desc_style .= 'text-align:'.$att_align.';';
            if($att_align == 'center') { $desc_style .= 'background-position:center bottom;'; } 
            if($att_align == 'right') { $desc_style .= 'background-position:'.(240+($att_width-574)).'px bottom;'; } 
            if($att_line == 'false') { $desc_style .= 'background:none;'; }
            $desc_style .= '" ';
            
            $description .= '<p '.$desc_style.'>'.$att_desc.'</p>';    
        }
                
                    
        $out .= '<div class="dcs-player" '.$style_w.'><div href="'.$att_url.'" '.$style.' id="'.$att_name.'"></div>'.$description.'</div>';
        $out .= '<script>flowplayer("'.$att_name.'", {src: "'.get_bloginfo('template_url').'/swf/flowplayer-3.2.4.swf", wmode: \'opaque\'}, 
                       { '; 
                       
                       if($att_splash != '')
                       {
                       $out .= ' playlist: [ 
                      
        {
            url: \''.$att_splash.'\', 
            scaling: \'scale\'
        },                       
                       
                       {
                        autoPlay: '.$att_play.',
                        autoBuffering: '.$att_buffering.'
                        } ], ';
                        
                       } else
                       {
                           $out .= '
                       clip: {
                        autoPlay: '.$att_play.',
                        autoBuffering: '.$att_buffering.'
                        }, ';                           
                       }
                       
                       $out .= '
                        
plugins: {
    controls: {
        fullscreen:'.$att_full.',
        time:'.$att_time.',
        height: 25
    }
}                        
                        
                        }                                                 
                
                );</script>';           
        

         
         
        return $out;   
    }    
    
    # SHORTCODE: 
    #   dcs_player_audio 
    # PAREMAETERS:
    #   name - page unique audio name, must be set to valid value (default empty string)
    #   url - url to audio file, must be set to valid url (default empty string)
    #   w - video width in pixels (default 520 px)
    #   h - video height in pixels (default 330 px)
    #   float - can be set to left or right (default floating is disabled)
    #   margin - viedo top, right, bottom and left margin in pixels, you can use any CSS valid value for margin property (default set to 'auto auto auto auto' ) 
    # NOTES:     
    public function dcs_player_audio($atts, $content=null, $code="")
    {
        global $wpdb; 
        global $post;
        
        $out = '';
        $defatts = Array(
          'name' => '',
          'url' => '',
          'w' => 'auto',
          'margin' => 'auto auto 15px auto',
          'float' => 'none',
          'desc' => '',
          'align' => 'left',
          'usersrc' => '',
          'themesrc' => '',
          'play' => 'false',
          'buffering' => 'false',
          'time' => 'false',
          'volume' => 'true',
          'mute' => 'true',
          'img' => '',
          'h' => 100,
          'line' => 'true',
          'framed' => 'true',
          'imglink' => ''           
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_name = $atts['name'];
        $att_url = $atts['url'];
        $att_width = $atts['w'];
        $att_float = $atts['float'];
        $att_margin = $atts['margin'];
        $att_desc = $atts['desc'];
        $att_align = $atts['align'];
        $att_usersrc = $atts['usersrc']; 
        $att_img = $atts['img']; 
        $att_img_h = $atts['h'];
        $att_line = $atts['line'];
        $att_framed = $atts['framed'];
        
        $att_play = $atts['play'];
        $att_buffering = $atts['buffering']; 
        $att_time = $atts['time']; 
        $att_volume = $atts['volume']; 
        $att_mute = $atts['mute']; 
        $att_audio_link = $atts['imglink']; 
        
        if($att_play != 'false' and $att_play != 'true') { $att_play = 'false'; }
        if($att_buffering != 'false' and $att_buffering != 'true') { $att_buffering = 'false'; }
        if($att_time != 'false' and $att_time != 'true') { $att_time = 'false'; }
        if($att_volume != 'false' and $att_volume != 'true') { $att_volume = 'false'; }
        if($att_mute != 'false' and $att_mute != 'true') { $att_mute = 'false'; }        
        
        
        $dec_width = 0;
        if($att_framed == 'true') { $dec_width += 8; }        
        
        if($att_img != '')
        {
            $img_path = $att_img;
            $att_img = '';
            if($att_framed == 'true')
            {
                $att_img .= '<div style="margin-bottom:3px;width:'.($att_width-$dec_width).'px;height:'.($att_img_h-$dec_width).'px;" class="framed">';    
            }
            $href_ = '';
            if($att_audio_link != '') { $href_ = ' href="'.$att_audio_link.'" '; }
            $att_img .= '<a '.$href_.' style="width:'.($att_width-$dec_width).'px;height:'.($att_img_h-$dec_width).'px;" class="loader async-img-s" rel="'.get_bloginfo('template_url').'/thumb.php?src='.$img_path.'&w='.($att_width-$dec_width).'&h='.($att_img_h-$dec_width).'&zc=1'.'" ></a>'; 
            if($att_framed == 'true')
            {
                $att_img .= '</div>';    
            }        
        
        }
        
        if($att_usersrc != '' or $att_themesrc != '')
        {
            if($att_usersrc != '')
            {
                $att_url = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc; 
            } else
            if($att_themesrc != '')
            {
                $att_url = get_bloginfo('template_url').'/'.$att_themesrc; 
            }               
        }
        
        $style = ' style="';
        $style .= 'display:block;';
        $style .= 'width:'.$att_width.'px;';
        $style .= 'height:20px;';
        $style .= '" ';
        
        $style_w = ' style="';
        $style_w .= 'display:block;';
        $style_w .= 'float:'.$att_float.';';
        $style_w .= 'margin:'.$att_margin.';';    
        if($att_width == 'auto')
        {
            $style_w .= 'width:auto;';    
        } else
        {
            $style_w .= 'width:'.$att_width.'px;';
        }
        $style_w .= '" ';        
        
        $description = '';
        if($att_desc != '')
        {
            $desc_style = ' style="';
            $desc_style .= 'text-align:'.$att_align.';';
            if($att_align == 'center') { $desc_style .= 'background-position:center bottom;'; } 
            if($att_align == 'right') { $desc_style .= 'background-position:'.(240+($att_width-574)).'px bottom;'; } 
            if($att_line == 'false') { $desc_style .= 'background:none;'; }
            $desc_style .= '" ';            
            
            $description .= '<p '.$desc_style.'>'.$att_desc.'</p>';    
        }
                    
        $out .= '<div class="dcs-player" '.$style_w.'>'.$att_img.'<div href="'.$att_url.'" '.$style.' id="'.$att_name.'"></div>'.$description.'</div>';
        $out .= '<script>flowplayer("'.$att_name.'", {src: "'.get_bloginfo('template_url').'/swf/flowplayer-3.2.4.swf", wmode: \'opaque\'}, 
                       {clip:  {
                        autoPlay: '.$att_play.',
                        autoBuffering: '.$att_buffering.' 
                        },
                        
plugins: {
    controls: {
        backgroundColor: \'#000000\',
        fullscreen:false,
        time:'.$att_time.',
        height: 20,
        autoHide: false,
        scrubber: true,
        volume: '.$att_volume.',
        mute: '.$att_mute.'         
    }  
}                        
                        
                        }                                                 
                
                );</script>';           
        

         
         
        return $out;   
    }     
    

    # SHORTCODE: 
    #   dcs_lb_player 
    # PAREMAETERS:
    #   name - page unique video name, must be set to valid value (default empty string)
    #   url - url to video file, must be set to valid url (default empty string)
    # NOTES:     
    public function dcs_lb_player($atts, $content=null, $code="")
    {

        $out = '';
        $defatts = Array(
          'name' => '',
          'url' => '',
          'h' => 420,
          'desc' => '',
          'usersrc' => '',
          'play' => 'true' 
        ); 
        
        $atts = shortcode_atts($defatts, $atts);                      
        $att_name = $atts['name'];
        $att_url = $atts['url'];
        $att_height = (int)$atts['h'];
        $att_desc = $atts['desc'];
        $att_usersrc = $atts['usersrc'];   
        $att_play = $atts['play']; 
        
        if($att_play != 'false' and $att_play != 'true') { $att_play = 'true'; }
           
        if($att_usersrc != '')
        {
            $att_url = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;    
        }
        
        $style = ' style="';
        $style .= 'display:block;';
        $style .= 'height:'.$att_height.'px;';
        $style .= '" ';
        
        $style_w = ' style="';
        $style_w .= 'display:block;';  
        $style_w .= '" ';               
            
        $code ='<div class="dcs-lb-player" id="'.$att_name.'_lb" style="display:none;">
        <div style="height:'.$att_height.'px;margin:0px;padding:0px;">
        <object width="100%" height="100%" id="'.$att_name.'_api" name="'.$att_name.'_api" data="'.(get_bloginfo('template_url').'/swf/flowplayer-3.2.4.swf').'" type="application/x-shockwave-flash"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="quality" value="high"><param name="cachebusting" value="true"><param name="bgcolor" value="#000000">
        <param name="wmode" value="opaque" />
        <param name="flashvars" value="config={&quot;clip&quot;:{&quot;autoPlay&quot;:'.$att_play.',&quot;autoBuffering&quot;:false,&quot;url&quot;:&quot;'.$att_url.'&quot;},&quot;playerId&quot;:&quot;'.$att_name.'&quot;,&quot;playlist&quot;:[{&quot;autoPlay&quot;:'.$att_play.',&quot;autoBuffering&quot;:false,&quot;url&quot;:&quot;'.$att_url.'&quot;}]}">
        </div></div>
        ';            
           
        $out .= '<a href="#'.$att_name.'_lb" rel="lightbox" title="'.$att_desc.'">'.$content.'</a> '.$code;         
        return $out;   
    }      
    
    # SHORTCODE: 
    #   dcs_fancy_header 
    # PAREMAETERS:
    #   bgcolor - background color, can be set to any CSS valid value for background-color property (default #EEEEEE)
    #   color - text color, can be set to any CSS valid value for color property
    # NOTES:  
    public function dcs_fancy_header($atts, $content=null, $code="")
    {           
        $out = '';
        $defatts = Array(
          'bgcolor' => '#EEEEEE',
          'color' => $this->_theme_main_color,
          'rounded' => 2,
          'size' => 11,
          'margin' => '0px 0px 10px 0px',
          'smargin' => '0px auto 0px auto', 
          'align' => 'left',
          'salign' => 'left',
          'fweight' => 'normal',
          'width' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];           
        $att_bgcolor = $atts['bgcolor'];
        $att_rounded = $atts['rounded']; 
        $att_margin = $atts['margin']; 
        $att_size = $atts['size'];
        $att_align = $atts['align']; 
        $att_width = $atts['width']; 
        $att_fweight = $atts['fweight']; 
        $att_salign = $atts['salign'];          
        $att_smargin = $atts['smargin'];
        
        $style = ' style="';
        $style .= 'color:'.$att_color.';';
        $style .= 'background-color:'.$att_bgcolor.';'; 
        $style .= 'font:'.$att_size.'px/'.($att_size+3).'px Helvetica;'; 
        $style .= 'font-weight:'.$att_fweight.';';
        $style .= 'text-align:'.$att_salign.';';
        $style .= 'margin:'.$att_smargin.';'; 
        if($att_width != '')
        {
            $style .= 'width:'.$att_width.'px;display:block;';      
        }      
        $style .= '" ';  

        $style_h = ' style="';
        $style_h .= 'margin:'.$att_margin.';';
        $style_h .= 'text-align:'.$att_align.';'; 
        $style_h .= '" '; 
                
        $rounded = '';
        if($att_rounded > 0 and $att_rounded < 13)
        {                                       
            $rounded = ' class="rounded-borders-'.$att_rounded.'" ';
        }    
                                                             
        $out .= '<h6 '.$style_h.' class="dcs-fancy-header"><span '.$rounded.' '.$style.'>'.$content.'</span></h6>';

        return $out;
    }          
    
    # SHORTCODE: 
    #   dcs_bar_header 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_bar_header($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => '#FFFFFF',
          'over' => 'true',
          'margin' => '0px 0px 15px 0px',
          'url' => '',
          'target' => '_self',
          'pt' => 10,
          'pl' => 0,
          'pr' => 0,  
          'size' => 1,
          'uppercase' => 'false',
          'align' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_bgcolor = $atts['bgcolor'];
        $att_over = $atts['over'];
        $att_margin = $atts['margin'];
        $att_url = $atts['url']; 
        $att_target = $atts['target'];
        $att_pt = $atts['pt'];
        $att_pl = $atts['pl']; 
        $att_pr = $atts['pr']; 
        $att_size = $atts['size'];
        $att_uppercase = $atts['uppercase']; 
        $att_align = $atts['align'];
        
        $h_style = ' style="';
        if($att_color != '') { $h_style .= 'color:'.$att_color.';'; }
        if($att_uppercase == 'true') { $h_style .= 'text-transform:uppercase;'; }
        if($att_align != '') { $h_style .= 'text-align:'.$att_align.';'; }
        if($att_pl != '') { $h_style .= 'padding-left:'.$att_pl.'px;'; } 
        if($att_pr != '') { $h_style .= 'padding-right:'.$att_pr.'px;'; }
        $h_style .= '" ';

        $height = 50 - $att_pt;
        if($height < 0) { $height = 0; $att_pt = 50; }
        
        $b_style = ' style="';
        $b_style .= 'background-color:'.$att_bgcolor.';';
        $b_style .= 'padding-top:'.$att_pt.'px;';
        $b_style .= 'margin:'.$att_margin.';';
        $b_style .= 'height:'.$height.'px;';
        $b_style .= '" ';
        
        $out .= '<div class="dcs-bar-header" '.$b_style.'>';
            $out .= '<h'.$att_size.' '.$h_style.'>';
                if($att_url != '') { $out .= '<a href="'.$att_url.'" target="'.$att_target.'">'; }
                    $out .= $content;
                if($att_url != '') { $out .= '</a>'; }   
            $out .= '</h'.$att_size.'>';
            if($att_over == 'true')
            {
                $out .= '<a ';
                if($att_url != '') { $out .= ' href="'.$att_url.'" target="'.$att_target.'" '; }
                $out .= ' class="over"></a>';
            }
        $out .= '</div>';
        return $out;    
    }    
    
    # SHORTCODE: 
    #   dcs_bar_header_small 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_bar_header_small($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => '',
          'bgcolor' => '#FFFFFF',
          'over' => 'true',
          'margin' => '0px 0px 15px 0px',
          'url' => '',
          'target' => '_self',
          'pt' => 8,
          'pl' => 0,
          'pr' => 0,  
          'size' => 3,
          'uppercase' => 'false',
          'align' => ''
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_bgcolor = $atts['bgcolor'];
        $att_over = $atts['over'];
        $att_margin = $atts['margin'];
        $att_url = $atts['url']; 
        $att_target = $atts['target'];
        $att_pt = $atts['pt'];
        $att_pl = $atts['pl']; 
        $att_pr = $atts['pr']; 
        $att_size = $atts['size'];
        $att_uppercase = $atts['uppercase']; 
        $att_align = $atts['align'];
        
        $h_style = ' style="';
        if($att_color != '') { $h_style .= 'color:'.$att_color.';'; }
        if($att_uppercase == 'true') { $h_style .= 'text-transform:uppercase;'; }
        if($att_align != '') { $h_style .= 'text-align:'.$att_align.';'; }
        if($att_pl != '') { $h_style .= 'padding-left:'.$att_pl.'px;'; } 
        if($att_pr != '') { $h_style .= 'padding-right:'.$att_pr.'px;'; }
        $h_style .= '" ';

        $height = 35 - $att_pt;
        if($height < 0) { $height = 0; $att_pt = 35; }
        
        $b_style = ' style="';
        $b_style .= 'background-color:'.$att_bgcolor.';';
        $b_style .= 'padding-top:'.$att_pt.'px;';
        $b_style .= 'margin:'.$att_margin.';';
        $b_style .= 'height:'.$height.'px;';
        $b_style .= '" ';
        
        $out .= '<div class="dcs-bar-header-small" '.$b_style.'>';
            $out .= '<h'.$att_size.' '.$h_style.'>';
                if($att_url != '') { $out .= '<a href="'.$att_url.'" target="'.$att_target.'">'; }
                    $out .= $content;
                if($att_url != '') { $out .= '</a>'; }   
            $out .= '</h'.$att_size.'>';
            if($att_over == 'true')
            {
                $out .= '<a ';
                if($att_url != '') { $out .= ' href="'.$att_url.'" target="'.$att_target.'" '; }
                $out .= ' class="over"></a>';
            }
        $out .= '</div>';
        return $out;    
    }        
    
    # SHORTCODE: 
    #   dcs_small 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color property (default #555555)
    # NOTES:  
    public function dcs_small($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => '#555555',
          'padding' => '0px 0px 0px 0px',
          'margin' => '0px 0px 0px 0px',
          'block' => 'false',
          'spacing' => 'normal',
          'size' => 10,
          'align' => 'left',
          'fheight' => 10,
          'border' => 'false',
          'bwidth' => 1,
          'bcolor' => '#D0D0D0',
          'bstyle' => 'solid',
          'rounded' => 0
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_padding = $atts['padding'];
        $att_margin = $atts['margin'];
        $att_block = $atts['block'];
        $att_size = $atts['size'];
        $att_spacing = $atts['spacing'];
        $att_align = $atts['align'];        
        $att_fheight = $atts['fheight'];
        
        $att_border = $atts['border']; 
        $att_bwidth = $atts['bwidth']; 
        $att_bcolor = $atts['bcolor'];
        $att_bstyle = $atts['bstyle'];
        $att_rounded = $atts['rounded'];
        
        $style = ' style="';
        $style .= 'color:'.$att_color.';';
        $style .= 'text-align:'.$att_align.';'; 
        $style .= 'line-height:'.$att_fheight.'px;';         
        $style .= 'margin:'.$att_margin.';'; 
        $style .= 'padding:'.$att_padding.';';
        
        if($att_border == 'true')
        {
            $style .= 'border:'.$att_bwidth.'px '.$att_bstyle.' '.$att_bcolor.';';     
        }
         
        if($att_block == 'true') { $style .= 'display:block;'; }
        if($att_size != '') { $style .= 'font-size:'.$att_size.'px;'; }        
        if($att_spacing != 'normal') { $style .= 'letter-spacing:'.$att_spacing.'px;'; }
        $style .= '" ';  
        
        $class = '';
        if($att_rounded > 0)
        {
            $class = ' rounded-borders-'.$att_rounded;
        }                                               
        
        $out .= '<span class="dcs-small'.$class.'" '.$style.'>'.$content.'</span>';
        return $out;    
    }    

    # SHORTCODE: 
    #   dcs_signature 
    # PAREMAETERS:
    #   color - text color, can be set to any CSS valid value for color property (default #EEEEEE)
    # NOTES:  
    public function dcs_signature($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => $this->_theme_main_color,
          'align' => 'right',
          'img' => '',
          'url' => '',
          'target' => '_self',
          'usersrc' => '',                                           
          'name' => 'Johnatan Doe',
          'title' => 'Chairman of Precious International',
          'margin' => '0px 0px 0px 0px',
          'padding' => '0px 0px 0px 0px'
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];
        $att_align = $atts['align']; 
        $att_img = $atts['img'];
        $att_url = $atts['url'];
        $att_target = $atts['target'];
        $att_usersrc = $atts['usersrc'];        
        $att_name = $atts['name'];
        $att_title = $atts['title']; 
        $att_margin = $atts['margin'];
        $att_padding = $atts['padding'];
           
        if($att_usersrc != '')
        {
            $att_img = get_bloginfo('template_url').'/img/shortcodes/'.$att_usersrc;    
        }
        
        $n_style = ' style="';
        $n_style .= 'color:'.$att_color.';';
        $n_style .= 'text-align:'.$att_align.';'; 
        $n_style .= '" ';   

        $t_style = ' style="';
        $t_style .= 'text-align:'.$att_align.';'; 
        $t_style .= '" ';  

        $d_style = ' style="';
        $d_style .= 'text-align:'.$att_align.';'; 
        $d_style .= 'margin:'.$att_margin.';'; 
        $d_style .= 'padding:'.$att_padding.';'; 
        $d_style .= '" ';  
        
        $out .= '<div class="dcs-signature" '.$d_style.'>';
        if($att_img != '')
        {
            $out .= '<img src="'.$att_img.'" />';
        }
        $out .= '<div class="desc">';
        if($att_name != '')
        {
            if($att_url != '')
            {
                $out .= '<a onMouseOver="this.style.color=\''.$this->_theme_main_hover_color.'\';" 
                onMouseOut="this.style.color=\''.$att_color.'\';"
                href="'.$att_url.'" target="'.$att_target.'" class="name" '.$n_style.'>'.$att_name.'</a>';    
            } else
            {
                $out .= '<span class="name" '.$n_style.'>'.$att_name.'</span>';
            }
        }
        if($att_title != '')
        {
            $out .= '<span class="title" '.$t_style.'>'.$att_title.'</span>';
        }
        $out .= '</div>';
        $out .= '</div>';
        return $out;    
    }  
    
    # SHORTCODE: 
    #   dcs_news (display single news in shorter version)
    # PAREMAETERS:
    #   id - displayed post id, required valid value
    #   voting - if set to true voting will be displayed, if false voting will be omited (default set to true)
    # NOTES:                
    public function dcs_news($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        

        global $post, $page, $numpages, $multipage, $more, $pagenow, $pages;        
        
        $out = '';                 
        $defatts = Array(
          'id' => -1,
          'voting' => 'true'           
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_postid = $atts['id'];
        $att_voting = $atts['voting'];
        
        
        $args=array('p' => $att_postid, 'post_type' => 'news');
        
        $new_query = new WP_Query($args);                            
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                
                
                $out .= '<div class="news-page">';
                     
                        $permalink = get_permalink($post->ID);
                        $imagepath = get_post_meta($post->ID, 'news_image', true); 
                        $thumbpath = get_post_meta($post->ID, 'news_thumb_image', true);
                        $minithumbpath = get_post_meta($post->ID, 'news_mini_thumb_image', true); 
                        $imagedesc = get_post_meta($post->ID, 'news_image_desc', true);
                        $postdesc = get_post_meta($post->ID, 'news_desc', true);
                        $novoting = get_post_meta($post->ID, 'news_novoting', true);                        
                        
                        $month = get_the_time('n', $post->ID);
                        $year = get_the_time('Y', $post->ID);                        
                                                                    
                        $out .= '<div class="dcs-thin-spliter"></div>';
                        $out .= '<div class="item">';
                        
                            $out .= '<div class="leftcontent">';
                                $out .= '<div class="image framed">';
                                    $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$imagepath.'&w=180&h=100&zc=1'.'" '; 
                                    $out .= '<a href="'.$permalink.'" '.$rel.' class="image-loader async-img-s"></a>';
                                    $out .= '<a href="'.$imagepath.'" rel="lightbox[news_image]" class="zoom" title="'.$imagedesc.'"></a>';
                                $out .= '</div>';
                                
                                $pt_list = get_the_terms($post->ID, 'news_cat');
                                //var_dump($pt_list);
                                $pt_counter = 0;
                                $out .= 'Posted in: ';
                                foreach($pt_list as $pt)
                                {
                                    if($pt_counter > 0)
                                    {
                                        $out .= ', ';
                                    }
                                   $out .= '<a href="'.get_term_link($pt->slug, 'news_cat').'" class="category">'.$pt->name.'</a>';
                                   $pt_counter++;
                                }
                                $out .= '<div class="clear-both"></div>';
                                
                                if($news->comment_status == 'open')
                                {
                                    $temp = '';
                                    if($post->comment_count == 0) { $temp = 'No comments'; }
                                    if($post->comment_count == 1) { $temp = 'One comment'; }
                                    if($post->comment_count > 1) { $temp = $post->comment_count.' comments'; }
                                    
                                    $out .= 'Comments: '.'<a href="'.get_comments_link($post->ID).'">'.$temp.'</a>';
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                $newstags = wp_get_object_terms($post->ID, 'news_tag');
                                if(0 < count($newstags))
                                {
                                    $out .= 'Tags: ';
                                    $pt_counter = 0; 
                                    foreach($newstags as $tag)
                                    {
                                        if($pt_counter > 0)
                                        {
                                            $out .= ', ';
                                        }             
                                       $title = '';
                                       if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                         
                                        
                                        $out .= '<a href="'.get_term_link($tag->slug, 'news_tag').'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';                           
                                        $pt_counter++;
                                    }
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                
                                if(GetDCCPInterface()->getIGeneral()->showNewsVoting() and $novoting == '' and $att_voting == 'true')
                                {
                                    global $dcp_votingshortcodes; 
                                    if(isset($dcp_votingshortcodes))
                                    {
                                        $data = $dcp_votingshortcodes->getVotePostStars($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum());
                                        $rate = 0;
                                        if($data->votes != 0)
                                        {
                                            $rate = round($data->sum/$data->votes, 1);
                                        }
                                        $votes_word = 'votes'; 
                                        if($data->votes == 1) { $votes_word = 'vote'; }                                        
                                        $out .= 'Rating: '.'<span class="rate">'.$rate.'</span><span class="ratesep">/</span><span class="maxrate">'.$data->max_stars.'</span> <span class="votes">('.$data->votes.' '.$votes_word.')</span>';                                        
                                    }
                                }                                   
                                
                            $out .= '</div>';
                            

                            
                            $out .= '<div class="content">';
                                $out .= '<div class="infobar">';
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    
                        $out .= '<span class="when">'.dcf_calculatePastTime('', get_the_time('H', $post->ID), get_the_time('i', $post->ID), 
                            get_the_time('s', $post->ID), get_the_time('n', $post->ID), get_the_time('j', $post->ID), get_the_time('Y', $post->ID)).'</span>';                                     
                                    
                                $out .= '</div>';
                                $out .= '<h3><a target="_self" href="'.$permalink.'">'.$post->post_title.'</a></h3>';
                                // content start
                                global $page;
                                $old_page = $page;
                                $page = 1;    
                                if($postdesc != '')
                                {
                                    $out .= apply_filters('the_content', $postdesc);
                                    $out .= ' <a href="'.$permalink.'">Read&nbsp;more</a>';                                    
                                } else
                                {
                                    global $more;
                                    $more = 0;
                                    $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                }
                                $page = $old_page;
                                // content end          
                            $out .= '</div>';                            
                            $out .= '<div class="clear-both"></div>';
                        $out .= '</div>';
                     $out .= '</div>'; // news-page                  
            } // while
        }
        wp_reset_query();        
        return $out;    
    }     
    

    # SHORTCODE: 
    #   dcs_project (display single projeect in shorter version)
    # PAREMAETERS:
    #   id - displayed project id, required valid value
    #   image - if true image, default true
    #   desc - if true image description is displayed, default true
    #   voting - if set to true voting will be displayed, if false voting will be omited (default set to false)
    # NOTES:                
    public function dcs_project($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        

        global $post, $page, $numpages, $multipage, $more, $pagenow, $pages;        
        
        $out = '';                 
        $defatts = Array(
          'id' => -1,
          'image' => 'false',
          'desc' => 'true',
          'voting' => 'false'           
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_postid = $atts['id'];
        $att_image = $atts['image'];
        $att_desc = $atts['desc']; 
        $att_voting = $atts['voting'];
        
        
        $args=array('p' => $att_postid, 'post_type' => 'project');
        
        $new_query = new WP_Query($args);                            
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                
                
                $imagedesc = get_post_meta($post->ID, 'project_image_desc', true);                
                $postthumb = get_post_meta($post->ID, 'project_post_thumb', true);
                $projectinfo = get_post_meta($post->ID, 'project_info', true);
                $postdesc = get_post_meta($post->ID, 'project_desc', true);   
                $novoting = get_post_meta($post->ID, 'project_novoting', true);
                         

                $month = get_the_time('n', $post->ID);
                $year = get_the_time('Y', $post->ID); 

                $out = '';                                                
                $out .= ' 
               
                    <div class="blog-post">';   
                                            
                        if($postthumb != '' and $att_image == 'true')
                        {
                            $out .= '<div class="photo"><a href="'.get_permalink($post->ID).'" class="async-img image" rel="'.$postthumb.'" ></a>'.$imagedesc.'</div>'; 
                        } else
                        {
                            $out .= '<div class="post-no-photo-spliter"></div>'; 
                        }                     
                             
                        $out .= '<div class="post-content">';                         
                            
                            if(comments_open($post->ID))
                            {
                                $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
                            }
                            $out .= '<div class="info">
                                <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span> in ';
                                
                                
                                $pt_list = wp_get_object_terms($post->ID, 'project_cat');
                                $pt_count = count($pt_list);
                                for($i = 0; $i < $pt_count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', '; 
                                    }
                                    $out .= '<a href="'.get_term_link($pt_list[$i]->slug, 'project_cat').'">'.$pt_list[$i]->name.'</a>';
                                     
                                }                                
                            
                            $out .= '</div>';
                              
                            $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>'; 
                                
                                // content start
                                global $page;
                                $old_page = $page;
                                $page = 1;    
                                if($postdesc != '')
                                {
                                    $out .= apply_filters('the_content', $postdesc);
                                    $out .= ' <a href="'.$permalink.'">Read&nbsp;more</a>';                                    
                                } else
                                {
                                    global $more;
                                    $more = 0;
                                    $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                }
                                $page = $old_page;
                                // content end   

                            $out .= '<div class="blog-post-bottom-wrapper">';

                            if(GetDCCPInterface()->getIGeneral()->showProjectVoting() and $novoting == '' and $att_voting == 'true')
                            {                            
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left'); 
                                }
                            }                             
                            
                               $out .= '<div class="blog-post-tags-single">';
                               $out .= do_shortcode($projectinfo);                      
                               $out .= '</div>';                               
                        
                               $out .= '<div class="clear-both"></div>';
                            $out .= '</div>';
                           
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';                                    
                
            } // while
        }
        wp_reset_query();        
        return $out;    
    }     
    

    # SHORTCODE: 
    #   dcs_src 
    # PAREMAETERS:
    #   s - path to image file with extenstion relative to [template path]/img/shortcodes folder (default not set)
    # NOTES:  
    public function dcs_src($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          's' => '',
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_s = $atts['s'];   
        
        $out .= get_bloginfo('template_url').'/img/shortcodes/'.$att_s;
        return $out;    
    }  
    
    # SHORTCODE: 
    #   dcs_btn 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_btn($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => $this->_theme_main_color,
          'url' => '',
          'target' => '_self',
          'hcolor' => $this->_theme_main_hover_color,
          'float' => '',
          'margin' => '0px 0px 0px 0px',
          'align' => ''
        ); 
               
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_url = $atts['url'];
        $att_target = $atts['target'];
        $att_hcolor = $atts['hcolor']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin']; 
        $att_align = $atts['align'];
        
        $style = ' style="';
        if($att_float == 'left') { $style .= 'float:left;'; }
        if($att_float == 'right') { $style .= 'float:right;'; }
        if($att_align == '') { $style .= 'margin:'.$att_margin.';'; };
        $style .= 'color:'.$att_color.';';
        $style .= '" ';
        
        if($att_align != '') { $out .= '<p style="margin:'.$att_margin.';text-align:'.$att_align.';">'; }
        $out .= '<a onMouseOver="this.style.color=\''.$att_hcolor.'\';" 
        onMouseOut="this.style.color=\''.$att_color.'\';" '.$style.' 
        href="'.$att_url.'" target="'.$att_target.'" class="small-button1-link"><span>'.$content.'</span></a>';
        if($att_align != '') { $out .= '</p>'; }
        return $out;    
    }   
    
    # SHORTCODE: 
    #   dcs_bigbtn 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_bigbtn($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => $this->_theme_main_color,
          'url' => '',
          'target' => '_self',
          'hcolor' => $this->_theme_main_hover_color,
          'float' => '',
          'margin' => '0px 0px 0px 0px',
          'align' => ''
        ); 
               
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_url = $atts['url'];
        $att_target = $atts['target'];
        $att_hcolor = $atts['hcolor']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin']; 
        $att_align = $atts['align'];
        
        $style = ' style="';
        if($att_float == 'left') { $style .= 'float:left;'; }
        if($att_float == 'right') { $style .= 'float:right;'; }
        if($att_align == '') { $style .= 'margin:'.$att_margin.';'; };
        $style .= 'color:'.$att_color.';';
        $style .= '" ';
        
        if($att_align != '') { $out .= '<p style="margin:'.$att_margin.';text-align:'.$att_align.';">'; }
        $out .= '<a onMouseOver="this.style.color=\''.$att_hcolor.'\';" 
        onMouseOut="this.style.color=\''.$att_color.'\';" '.$style.' 
        href="'.$att_url.'" target="'.$att_target.'" class="big-button1-link"><span>'.$content.'</span></a>';
        if($att_align != '') { $out .= '</p>'; }
        return $out;    
    }           
    
    # SHORTCODE: 
    #   dcs_btn_color 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_btn_color($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => '#FFF',
          'url' => '',
          'target' => '_self',
          'hcolor' => '#000',
          'float' => '',
          'margin' => '0px 0px 0px 0px',
          'align' => '',
          'bgcolor' => '#777700',
          'bghcolor' => '#777700'
        ); 
               
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_url = $atts['url'];
        $att_target = $atts['target'];
        $att_hcolor = $atts['hcolor']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin']; 
        $att_align = $atts['align'];
        $att_bgcolor = $atts['bgcolor'];
        $att_bghcolor = $atts['bghcolor'];
        
        $style = ' style="';
        if($att_float == 'left') { $style .= 'float:left;'; }
        if($att_float == 'right') { $style .= 'float:right;'; }
        if($att_align == '') { $style .= 'margin:'.$att_margin.';'; };
        $style .= 'background-color:'.$att_bgcolor.';'; 
        $style .= 'color:'.$att_color.';';
        $style .= '" ';
        
        if($att_align != '') { $out .= '<p style="margin:'.$att_margin.';text-align:'.$att_align.';">'; }
        $out .= '<a onMouseOver="this.style.color=\''.$att_hcolor.'\';this.style.backgroundColor=\''.$att_bghcolor.'\';" 
        onMouseOut="this.style.color=\''.$att_color.'\';this.style.backgroundColor=\''.$att_bgcolor.'\';" '.$style.' 
        href="'.$att_url.'" target="'.$att_target.'" class="small-button2-link"><span>'.$content.'</span></a>';
        if($att_align != '') { $out .= '</p>'; }
        return $out;    
    }   
    
    # SHORTCODE: 
    #   dcs_bigbtn_color 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_bigbtn_color($atts, $content=null, $code="")
    {   
        $out = '';
        $defatts = Array(
          'color' => '#FFF',
          'url' => '',
          'target' => '_self',
          'hcolor' => '#000',
          'float' => '',
          'margin' => '0px 0px 0px 0px',
          'align' => '',
          'bgcolor' => '#777700',
          'bghcolor' => '#777700'  
        ); 
               
        $atts = shortcode_atts($defatts, $atts);        
        $att_color = $atts['color'];   
        $att_url = $atts['url'];
        $att_target = $atts['target'];
        $att_hcolor = $atts['hcolor']; 
        $att_float = $atts['float'];
        $att_margin = $atts['margin']; 
        $att_align = $atts['align'];
        $att_bgcolor = $atts['bgcolor'];
        $att_bghcolor = $atts['bghcolor']; 
        
        $style = ' style="';
        if($att_float == 'left') { $style .= 'float:left;'; }
        if($att_float == 'right') { $style .= 'float:right;'; }
        if($att_align == '') { $style .= 'margin:'.$att_margin.';'; };
        $style .= 'background-color:'.$att_bgcolor.';'; 
        $style .= 'color:'.$att_color.';';
        $style .= '" ';
        
        if($att_align != '') { $out .= '<p style="margin:'.$att_margin.';text-align:'.$att_align.';">'; }
        $out .= '<a onMouseOver="this.style.color=\''.$att_hcolor.'\';this.style.backgroundColor=\''.$att_bghcolor.'\';" 
        onMouseOut="this.style.color=\''.$att_color.'\';this.style.backgroundColor=\''.$att_bgcolor.'\';" '.$style.' 
        href="'.$att_url.'" target="'.$att_target.'" class="big-button2-link"><span>'.$content.'</span></a>';
        if($att_align != '') { $out .= '</p>'; }
        return $out;    
    }     
    
    # SHORTCODE: 
    #   dcs_posts_list 
    # PAREMAETERS:
    #   y - year e.g 2010 (default not set)
    #   m - month from 1 to 12 (default not set)
    #   count - number of posts to display (default 5)
    #   type - post type (default post)
    #   thumb - if true image preview will be added (default true)
    #   ul - if true, list will be displayed as unordered list (default true)
    #   ex - can be se to 'this' to exlude edited post from list, can be set to posts list e.g '3,23,4' to exclude multiple posts (default empty string, no exclusion)
    #   tax - taxonomy slug, can be set to, category, post_tag, news_tag, project_cat, news_cat (default not set)
    #   terms - term slug, can be set to choosen taxonomy slug, for multiple slugs use formula "slug,slug,slug" (default not set)
    #   color - list dot color, can be set to any CSS valud color value (default set to theme main heading color) 
    # NOTES:  
    public function dcs_posts_list($atts, $content=null, $code="")
    {   
        global $wpdb;
        
        $out = '';
        $defatts = Array(
          'y' => '',
          'm' => '',
          'count' => 5,
          'type' => 'post',
          'thumb' => 'true',
          'resize' => 'false',
          'ul' => 'true',
          'ex' => '',
          'tax' => '',
          'terms' => '',
          'color' => $this->_theme_main_hover_color,
          'margin' => '0px 0px 15px 0px',
          'left' => '',
          'ultype' => 'disc',
          'date' => 'false',
          'comments' => 'false' 
        );        
        $atts = shortcode_atts($defatts, $atts);        
        $att_y = $atts['y'];   
        $att_m = $atts['m'];
        $att_number = (int)$atts['count'];
        $att_type = $atts['type'];
        $att_thumb = $atts['thumb'];
        $att_ul = $atts['ul'];
        $att_ex = $atts['ex'];
        $att_tax = $atts['tax'];
        $att_terms = $atts['terms'];        
        $att_color = $atts['color'];
        $att_margin = $atts['margin'];
        $att_left = $atts['left'];
        $att_ultype = $atts['ultype'];
        $att_date = $atts['date'];
        $att_comments = $atts['comments'];
        $att_resize = $atts['resize'];
         
        if($att_ex == 'this')
        {
            global $post;
            $att_ex = $post->ID;   
        }
        
        if($att_number > 0)
        {
            $att_number = ' LIMIT '.$att_number;
        } else
        {
            $att_number = '';
        }
        
        $querydate = '';
        if($att_ex != '')
        {
            $querydate .= " AND $wpdb->posts.ID NOT IN (".$att_ex.') ';    
        }
        $querydate .= $att_m != '' ? " AND MONTH($wpdb->posts.post_date) = ".$att_m.' ' : ''; 
        $querydate .= $att_y != '' ? " AND YEAR($wpdb->posts.post_date) = ".$att_y.' ' : '';         
        
        
        $subquery = '';        
        if($att_terms != '')
        {
            $a_terms = explode(',', $att_terms);
            $count_terms = count($a_terms);                
            if($count_terms > 0)
            {
                for($i = 0; $i < $count_terms; $i++)
                {
                    if($i > 0)
                    {
                        $subquery .= ' OR ';    
                    }
                    $subquery .= "$wpdb->terms.slug = '".$a_terms[$i]."' ";
                }
                $subquery = ' AND ('.$subquery.') ';
            }
        }          
        
        $querytax = '';
        if($att_tax != '')
        {
            $querytax = " AND $wpdb->term_taxonomy.taxonomy = '$att_tax' "; 
        }
        
        $querystr = "
            SELECT ID, post_title, post_date, comment_count
            FROM $wpdb->posts
            LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
            LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
            LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
            WHERE $wpdb->posts.post_type = '$att_type'".
            $querydate.
            "AND $wpdb->posts.post_status = 'publish' ".
            $querytax.
            $subquery.
            "GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC".$att_number;

        $list = $wpdb->get_results($querystr, OBJECT);   
        
        $ulstyle = ' style="';
        if($att_left != '')
        {
            $ulstyle .= 'padding-left:'.$att_left.'px;';
        }
        $ulstyle .= 'list-style-type:'.$att_ultype.';';
        $ulstyle .= '" ';
        
        $count = count($list);
        if($count > 0)
        {
            if($att_ul == 'true')
            {
                $out .= '<div class="dcs-posts-list" style="margin:'.$att_margin.';"><ul '.$ulstyle.'>';
                foreach($list as $pt)
                {
                    $for_thumb = '';
                    if($att_thumb == 'true')
                    {
                        $image = ''; 
                        switch($att_type)
                        {
                            case 'post':
                            $image = get_post_meta($pt->ID, 'post_image', true);
                            if($att_resize == 'true' and $image != '')
                            {
                                $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1'; 
                            }
                            break;
                            
                            case 'news':
                            $image = get_post_meta($pt->ID, 'news_image', true);
                            if($att_resize == 'true' and $image != '')
                            {                            
                                $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1'; 
                            }
                            break;
                                          
                            case 'project':                                      
                            $image = get_post_meta($pt->ID, 'project_post_thumb', true);
                            if($att_resize == 'true' and $image != '')
                            {                            
                                $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1';
                            }
                            break;
                        }
                        
                        if($image != '')
                        {
                            $image = ' rel="'.$image.'" ';
                            $title = ' title="'.dcf_neatTrim($pt->post_title, 50, '..').'" ';
                            $for_thumb = ' class="pu_img" '.$title.$image;
                        }
                    }
                    
                    
                    $out .= '<li style="color:'.$att_color.';"><a '.$for_thumb.' href="'.get_permalink($pt->ID).'" >'.$pt->post_title.'</a>';
                    if($att_date == 'true' or $att_comments == 'true')
                    {
                        $out .= ' <span class="info">(';
                        if($att_date == 'true')
                        {
                            $out .= date('F j, Y', strtotime($pt->post_date));
                            if($att_comments == 'true')
                            {
                                $out .= ', ';    
                            }    
                        }
                        if($att_comments == 'true')
                        {
                            $postfix = ' comments';
                            if($pt->comment_count == 1) { $postfix = ' comment'; }
                            $out .= $pt->comment_count.$postfix;     
                        }
                        $out .= ')</span>';
                    }
                    $out .='</li>';    
                }    
                $out .= '</ul></div>';
            } else
            {
                $out .= '<div class="dcs-posts-list" style="margin:'.$att_margin.';">';
                $counter = 0;
                foreach($list as $pt)
                {
                    if($counter > 0)
                    {
                        $out .= ', ';
                    }
                    
                    $for_thumb = '';
                    if($att_thumb == 'true')
                    {
                        $image = ''; 
                        switch($att_type)
                        {
                            case 'post':
                            $image = get_post_meta($pt->ID, 'post_image', true);
                            $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1'; 
                            break;
                            
                            case 'news':
                            $image = get_post_meta($pt->ID, 'news_image', true);
                            $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1'; 
                            break;
                                          
                            case 'project':                                      
                            $image = get_post_meta($pt->ID, 'project_post_thumb', true);
                            $image = get_bloginfo('template_url').'/thumb.php?src='.$image.'&w=400&h=180&zc=1';
                            break;
                        }
                        
                        $image = ' rel="'.$image.'" ';
                        $title = ' title="'.dcf_neatTrim($pt->post_title, 50, '..').'" ';
                        $for_thumb = ' class="pu_img" '.$title.$image;
                    }
                    
                    
                    $out .= '<a '.$for_thumb.' href="'.get_permalink($pt->ID).'" >'.$pt->post_title.'</a>';
                    $counter++;    
                }              
                $out .= '</div>';
            }
        }    
        return $out;    
    }   
    
    
    # SHORTCODE: 
    #   dcs_scode 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_scode($atts, $content=null, $code="")
    {   
        $out = '';    
        $out .= '<span class="dcs-scode">'.$content.'</span>';
        return $out;    
    }         
    
    # SHORTCODE: 
    #   dcs_voting 
    # PAREMAETERS:
    # NOTES:  
    public function dcs_voting($atts, $content=null, $code="")
    {   
        $out = '';    
        $defatts = Array(
          'id' => CMS_NOT_SELECTED,
          'align' => 'left',
          'margin' => '0px 0px 15px 0px' 
        );         
        
        $atts = shortcode_atts($defatts, $atts);        
        $att_id = $atts['id'];
        $att_align = $atts['align']; 
        $att_margin = $atts['margin'];
        $post_type = 'post';
        
        if($att_align != 'left' and $att_align != 'right')
        {
            $att_align = 'left';   
        }
                
                
        if($att_id == CMS_NOT_SELECTED)
        {
            global $post;
            $att_id = $post->ID;
            $post_type = $post->post_type;
        } else
        {
            global $wpdb;
            $po = $wpdb->get_results("SELECT ID, post_type FROM $wpdb->posts WHERE ID = $att_id");
            $count = count($po);     
            if($count > 0)
            {
                $att_id = $po[0]->ID;
                $post_type = $po[0]->post_type;     
            } else
            {
                $att_id = CMS_NOT_SELECTED;    
            }    
        }                
        
        global $dcp_votingshortcodes; 
        if(isset($dcp_votingshortcodes) and $att_id != CMS_NOT_SELECTED)
        {
            $out .= '<div style="margin:'.$att_margin.';">';
            $out .= $dcp_votingshortcodes->votePostStarsCreate($att_id, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), $att_align, $post_type); 
            $out .= '</div>';
        }
                   
        
        return $out;    
    }       
    
    
    # SHORTCODE: 
    #   dcs_recent_news (display single news in shorter version)
    # PAREMAETERS:
    # NOTES:                
    public function dcs_recent_news($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        
        global $wp_query;
        global $post, $page, $numpages, $multipage, $more, $pagenow, $pages;        
        
        $out = '';                 
        $defatts = Array(
          'count' => 3,
          'voting' => 'true',
          'cat' => '',
          'paged' => 'false'           
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_count = (int)$atts['count'];
        $att_voting = $atts['voting'];
        $att_cat = $atts['cat'];
        $att_paged = $atts['paged']; 
         
        if($att_count < 1) { $att_count = 1; }
     
        $paged = ($wp_query->query_vars['page']) ? $wp_query->query_vars['page'] : 1;                 
        $args = Array('posts_per_page' => $att_count, 'post_type' => 'news');
              
        if($att_paged == 'true')
        {
            $args['paged'] = $paged; 
        }
        
        if($att_cat != '')
        {
            $args['taxonomy'] = 'news_cat';
            $args['term'] = $att_cat; 
        }                   
        
        $new_query = new WP_Query($args);                            
        $max_page = $new_query->max_num_pages;                   
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                
                
                $out .= '<div class="news-page">';
                     
                        $permalink = get_permalink($post->ID);
                        $imagepath = get_post_meta($post->ID, 'news_image', true); 
                        $thumbpath = get_post_meta($post->ID, 'news_thumb_image', true);
                        $minithumbpath = get_post_meta($post->ID, 'news_mini_thumb_image', true); 
                        $imagedesc = get_post_meta($post->ID, 'news_image_desc', true);
                        $postdesc = get_post_meta($post->ID, 'news_desc', true);
                        $novoting = get_post_meta($post->ID, 'news_novoting', true);                        
                        
                        $month = get_the_time('n', $post->ID);
                        $year = get_the_time('Y', $post->ID);                        
                                                                    
                        $out .= '<div class="dcs-thin-spliter"></div>';
                        $out .= '<div class="item">';
                        
                            $out .= '<div class="leftcontent">';
                                $out .= '<div class="image framed">';
                                    $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$imagepath.'&w=180&h=100&zc=1'.'" '; 
                                    $out .= '<a href="'.$permalink.'" '.$rel.' class="image-loader async-img-s"></a>';
                                    $out .= '<a href="'.$imagepath.'" rel="lightbox[news_image]" class="zoom" title="'.$imagedesc.'"></a>';
                                $out .= '</div>';
                                 
                                $pt_list = get_the_terms($post->ID, 'news_cat');
                                // var_dump($pt_list);
                                if($pt_list !== false)
                                {
                                    $pt_counter = 0;
                                    $out .= 'Posted in: ';
                                    foreach($pt_list as $pt)
                                    {
                                        if($pt_counter > 0)
                                        {
                                            $out .= ', ';
                                        }
                                       $out .= '<a href="'.get_term_link($pt->slug, 'news_cat').'" class="category">'.$pt->name.'</a>';
                                       $pt_counter++;
                                    }
                                    $out .= '<div class="clear-both"></div>';
                                }
                                
                                if($news->comment_status == 'open')
                                {
                                    $temp = '';
                                    if($post->comment_count == 0) { $temp = 'No comments'; }
                                    if($post->comment_count == 1) { $temp = 'One comment'; }
                                    if($post->comment_count > 1) { $temp = $post->comment_count.' comments'; }
                                    
                                    $out .= 'Comments: '.'<a href="'.get_comments_link($post->ID).'">'.$temp.'</a>';
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                $newstags = wp_get_object_terms($post->ID, 'news_tag');
                                if(0 < count($newstags))
                                {
                                    $out .= 'Tags: ';
                                    $pt_counter = 0; 
                                    foreach($newstags as $tag)
                                    {
                                        if($pt_counter > 0)
                                        {
                                            $out .= ', ';
                                        }             
                                       $title = '';
                                       if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                         
                                        
                                        $out .= '<a href="'.get_term_link($tag->slug, 'news_tag').'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';                           
                                        $pt_counter++;
                                    }
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                
                                if(GetDCCPInterface()->getIGeneral()->showNewsVoting() and $novoting == '' and $att_voting == 'true')
                                {
                                    global $dcp_votingshortcodes; 
                                    if(isset($dcp_votingshortcodes))
                                    {
                                        $data = $dcp_votingshortcodes->getVotePostStars($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum());
                                        $rate = 0;
                                        if($data->votes != 0)
                                        {
                                            $rate = round($data->sum/$data->votes, 1);
                                        }
                                        $votes_word = 'votes'; 
                                        if($data->votes == 1) { $votes_word = 'vote'; }                                        
                                        $out .= 'Rating: '.'<span class="rate">'.$rate.'</span><span class="ratesep">/</span><span class="maxrate">'.$data->max_stars.'</span> <span class="votes">('.$data->votes.' '.$votes_word.')</span>';                                        
                                    }
                                }                                   
                                
                            $out .= '</div>';
                            

                            
                            $out .= '<div class="content">';
                                $out .= '<div class="infobar">';
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    
                        $out .= '<span class="when">'.dcf_calculatePastTime('', get_the_time('H', $post->ID), get_the_time('i', $post->ID), 
                            get_the_time('s', $post->ID), get_the_time('n', $post->ID), get_the_time('j', $post->ID), get_the_time('Y', $post->ID)).'</span>';                                     
                                    
                                $out .= '</div>';
                                $out .= '<h3><a target="_self" href="'.$permalink.'">'.$post->post_title.'</a></h3>';
                                // content start
                                global $page;
                                $old_page = $page;
                                $page = 1;    
                                if($postdesc != '')
                                {
                                    $out .= apply_filters('the_content', $postdesc);
                                    $out .= ' <a href="'.$permalink.'">Read&nbsp;more</a>';                                    
                                } else
                                {
                                    global $more;
                                    $more = 0;
                                    $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                }
                                $page = $old_page;
                                // content end          
                            $out .= '</div>';                            
                            $out .= '<div class="clear-both"></div>';
                        $out .= '</div>';
                     $out .= '</div>'; // news-page                  
            } // while
        }
        
        if($att_paged == 'true') 
        {
            $out .= GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page, false);
        }
        
        wp_reset_query();        
        return $out;    
    }      


    # SHORTCODE: 
    #   dcs_recent_posts (display single news in shorter version)
    # PAREMAETERS:
    # NOTES:      
    public function dcs_recent_posts($atts, $content=null, $code="")
    {
        global $post;
        global $more;    // Declare global $more (before the loop).        
        global $wp_query;
        global $post, $page, $numpages, $multipage, $more, $pagenow, $pages;        
        
        $out = '';                 
        $defatts = Array(
          'count' => 3,
          'image' => 'true',
          'desc' => 'true',
          'voting' => 'false',
          'cat' => '',
          'catex' => '',
          'paged' => 'false'           
        );

        $atts = shortcode_atts($defatts, $atts);        
        $att_count = $atts['count'];
        $att_image = $atts['image'];
        $att_desc = $atts['desc']; 
        $att_voting = $atts['voting'];
        $att_cat = $atts['cat']; 
        $att_catex = $atts['catex'];
        $att_paged = $atts['paged']; 
        
        $paged = ($wp_query->query_vars['page']) ? $wp_query->query_vars['page'] : 1; 
        $args=array('posts_per_page' => $att_count, 'post_type' => 'post');
        
        if($att_paged == 'true')
        {
            $args['paged'] = $paged; 
        }        
        
        if($att_cat != '')
        {
            $args['category__in'] = explode(',', $att_cat);   
        }       
        if($att_catex != '')
        {
            $args['category__not_in'] = explode(',', $att_catex);   
        } 
        
        $new_query = new WP_Query($args);                            
        $max_page = $new_query->max_num_pages; 
                                    
        if($new_query->have_posts())
        {
            while($new_query->have_posts())
            {
                $new_query->the_post();                
                
                $imagepath = get_post_meta($post->ID, 'post_image', true);
                $imagedesc = get_post_meta($post->ID, 'post_image_desc', true);
                $videopath = get_post_meta($post->ID, 'post_video', true);
                $disablevideo = get_post_meta($post->ID, 'post_disable_video', true);                
                $postdesc = get_post_meta($post->ID, 'post_desc', true); 
                $novoting = get_post_meta($post->ID, 'post_novoting', true);
                $more = 0;

                $month = get_the_time('n', $post->ID);
                $year = get_the_time('Y', $post->ID); 

                $out .= '
               
                    <div class="blog-post">';   
                                            
                        if($videopath != '' and $att_image == 'true' and $disablevideo == '')
                        {
                            $out .= '<div class="photo">'.do_shortcode($videopath).' '.($att_desc == 'true' ? $imagedesc : '').'</div>';     
                        } else
                        if($imagepath != '' and $att_image == 'true')
                        {
                            $out .= '<div class="photo"><a class="async-img image" href="'.get_permalink($post->ID).'" rel="'.$imagepath.'" ></a>'.($att_desc == 'true' ? $imagedesc : '').'</div>'; 
                        } else
                        {
                            $out .= '<div class="post-no-photo-spliter"></div>'; 
                        }                   
                             
                        $out .= '<div class="post-content">                         
                            <a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>
                            <div class="info">
                                <a class="date-left"></a><a href="'.get_month_link($year, $month).'" class="date">'.get_the_time('F j, Y').'</a><a class="date-right"></a>
                                Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                                
                                $catlist = wp_get_post_categories($post->ID);
                                $count = count($catlist);
                                for($i = 0; $i < $count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', '; 
                                    }
                                    $cat = get_category($catlist[$i]);
                                    $out .= '<a href="'.get_category_link($catlist[$i]).'" >'.$cat->name.'</a>';
                                     
                                }                                
                            
                            $out .= '</div>';
                              
                            $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                            
                            $old_page = $page;
                            $page = 1;    
                            if($postdesc != '')
                            {
                                $out .= apply_filters('the_content', $postdesc);
                                $out .= ' <a href="'.get_permalink($post->ID).'">Read&nbsp;more</a>';                                    
                            } else
                            {
                                $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                            }
                            $page = $old_page;

                            
                           // post tags list
                           $out .= '<div class="blog-post-bottom-wrapper">';
                           
                            if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $novoting == '' and $att_voting == 'true')
                            {
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                }
                            }                                
                           
                           $posttags = get_the_tags();                              
                           $count = 0;
                           if($posttags !== false)
                           {
                                $count = count($posttags);
                           }
                            
                           if($count > 0)
                           {   
                               $out .= '<div class="blog-post-tags">
                                        <span class="name">Tags:</span> ';
                               
                               $i = 0;            
                               foreach($posttags as $tag)
                               {   
                                   if($i > 0)
                                   {
                                       $out .= ',&nbsp;';
                                   }
                                   $title = '';
                                   if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; } 
                                   
                                   $out .= '<a href="'.get_tag_link($tag->term_id).'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
                                   $i++;
                               }                       
                               $out .= '</div>';                                            
                                
                           } else
                           { 
                                if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
                                {                                
                                   $out .= '<div class="blog-post-tags">
                                            There are no tags associated with this post.                           
                                        </div>';   
                                }                                                                                 
                           }                            
                        $out .= '<div class="clear-both"></div></div>';     
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';
                
            } // while
        }
        
        if($att_paged == 'true') 
        {
            $out .= GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page, false);
        }        
        
        wp_reset_query();        
        return $out;    
    }    
    
    
    
} // class 
     
?>