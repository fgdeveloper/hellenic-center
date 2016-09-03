<?php
   /**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      cp_general.php
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
*    CPSidebar
* Descripton:
*    Implementation of single sidebar object    
***********************************************************/
class CPSidebar
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_name = '';
        $this->_id = time();        
    } // constructor
    
    /*********************************************************** 
    * Public memebers
    ************************************************************/    
    public $_name;
    public $_id;    
} // CPSidebar


/*********************************************************** 
* Class name:
*    CPHeaderIcon
* Descripton:
*    Implementation of single CPHeaderIcon object    
***********************************************************/
class CPHeaderIcon
{
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {
        $this->_filename = '';
        $this->_hide = false;
        $this->_url = '';
        $this->_desc = '';        
    } // constructor
    
    /*********************************************************** 
    * Public memebers
    ************************************************************/    
    public $_filename;
    public $_hide;
    public $_url;  
    public $_desc;  
} // CPHeaderIcon

/*********************************************************** 
* Class name:
*    CPGeneral
* Descripton:
*    Implementation of CPTemp 
***********************************************************/
class CPGeneral 
{
    const DBIDOPT_GENERAL = 'PRESTIGE_GENERAL_OPT';  // data base id options      
    const DBIDOPT_SIDEBARS = 'PRESTIGE_GENERAL_SIDEBARS_OPT';  // data base id options 
    const DBIDOPT_HEADER_ICONS = 'PRESTIGE_HEADER_ICONS_OPT';
      
    /*********************************************************** 
    * Constructor
    ************************************************************/
    public function __construct() 
    {              
        // header icons
        $this->_icons = get_option(CPGeneral::DBIDOPT_HEADER_ICONS);
        if (!is_array($this->_icons))
        {
            $this->createDefaultHeaderIcons();
            add_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
            $this->_icons = get_option(CPGeneral::DBIDOPT_HEADER_ICONS);
        }
        
        // general options
        $this->_general = get_option(CPGeneral::DBIDOPT_GENERAL);
        if (!is_array($this->_general))
        {
            $this->setDefaults(); 
            add_option(CPGeneral::DBIDOPT_GENERAL, $this->_generalDef);
            $this->_general = get_option(CPGeneral::DBIDOPT_GENERAL);
        }
    
        // sidebar options
        $this->_sidebars = get_option(CPGeneral::DBIDOPT_SIDEBARS);
        if (!is_array($this->_sidebars))
        {
            add_option(CPGeneral::DBIDOPT_SIDEBARS, Array());
            $this->_sidebars = get_option(CPGeneral::DBIDOPT_SIDEBARS);
        }               
    } // constructor 

    /*********************************************************** 
    * Public members
    ************************************************************/      
    
    /*********************************************************** 
    * Private members
    ************************************************************/           
     private $_general = Array();
     private $_sidebars = Array();
     private $_icons = Array();
     private $_saved = false;
     
     const PRESTIGE_SLIDER = 1;
     const ACCORDION_SLIDER = 2;
     const PROGRESS_SLIDER = 3;
     const CHAIN_SLIDER = 4;
     const VIDEO_SLIDER = 5; 
     private $_sliders = Array(
        1 => 'Prestige Slider', 
        2 => 'Accordion Slider',
        3 => 'Progress Slider',
        4 => 'Chain Slider',
        5 => 'Video Slider');
     
     private $_generalDef = Array(
        'theme_skin' => 'Dv1 Classic Vintage Blue (wide)',
        'theme_slider' => 'Prestige Slider',
        'theme_main_color' => 'FFA319',
        'theme_main_hovercolor' => 'FFC602',
        'theme_skin_same_bg' => false,
        'theme_force_bg_then_sliders' => true,
        'theme_use_second_home' => true,
        'theme_show_log_panel' => true,
        'theme_lightbox_mode' => 'dark_square',
        'theme_hide_slider' => false,
        'theme_hide_wp_version' => false, 
        'client_panel' => false,
        'client_panel_opt_show' => true,
        'show_post_author' => true,
        'show_news_author' => true,
        'show_project_author' => true,
        'default_sidebar' => CMS_NOT_SELECTED,
        'sidebar_float_right' => false,
        'sidebar_show_spliter' => true, 
        'blog_sidebar' => CMS_NOT_SELECTED,
        'news_sidebar' => CMS_NOT_SELECTED,
        'news_archive_moths_count' => 6,
        'project_sidebar' => CMS_NOT_SELECTED,
        'blog_no_comments' => 'No comments',
        'blog_one_comment' => 'One comment',
        'blog_more_comments' => '% comments',
        'blog_submit_button_name' => 'Submit comment',
        'blog_leave_comment_text' => 'Leave your comment',
        'blog_comment_time_format' => 'F j, Y g:i a',
        'blog_excluded_categories' => array(),
        'blog_exclude_from_recent_posts_widget' => false,
        'blog_show_all_pages_navigation' => false,
        'show_no_tags' => true,
        'portfolio_page_size' => 9,
        'portfolio_video_icon' => true,
         // portfolio projects
        'port_proj_mode' => CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE,
        'port_proj_rows_count' => 3,
        // tracking code         
        'tracking_code' => 'Put here your trakcing code, e.g. from Google Analytics.',
        'tracking_code_disable' => true,
        'header_tracking_code' => 'Put here your trakcing code, e.g. from Google Analytics which will be printend at the end of header.',
        'header_tracking_code_disable' => true,
        // footer
        'footer_logo_path' => '',
        'footer_show_links' => true,
        'footer_show_widgetized' => false,
        'footer_show_logo' => true,
        'footer_show_copy' => true,
        'footer_show_line' => true,
        'footer_copy' => 'Prestige Elegant Site Template by Digital Cavalry (Copyright your company)',  
        'footer_sidebar_a' => CMS_NOT_SELECTED,
        'footer_sidebar_b' => CMS_NOT_SELECTED,
        'footer_sidebar_c' => CMS_NOT_SELECTED,
        'contact_email' => 'digitalcavalry@gmail.com',
        'contact_send_okay' => 'The message has been sent. Thank you.',
        'contact_send_error' => 'The message wasn\'t sent, please try again later.',
        'contact_sid_send_okay' => 'Message sent. Thank you.',
        'contact_sid_send_error' => 'Error, please try again later.',        
        'contact_send_button_name' => 'Send',
        '404_title' => 'Page not found - 404 Error',
        '404_text' => 'The page you are looking for doesn\'t exist.',
        'search_no_results' => 'Sorry, no posts matched your criteria.',
        'search_before_fragment' => 'Search results for:',
        'search_page_size' => 15,
        'search_sidebar' => CMS_NOT_SELECTED,
        'search_in_posts' => true,
        'search_in_pages' => true,
        'search_in_news' => true,
        'search_in_projects' => true,
        'search_show_search_ctrl' => true,
        'search_show_images' => false, 
        'logo_width' => 200,
        'logo_height' => 100,
        'logo_path' => '',
        'logo_x' => 50,
        'logo_y' => 0,
        'voting_post_enable' => true, 
        'voting_news_enable' => true,
        'voting_project_enable' => true,
        'voting_comment_enable' => true,
        'voting_blog_pages_enable' => true, 
        'voting_stars_num' => 6,
        'voting_show_top_comment' => true,
        'cufonfont' => 'Engebrechtre_400.font.js',
        // announcement-bar 
        'annbar_show' => true,
        'annbar_transparent' => true,
        'annbar_height' => 32,
        'annbar_content' => '',
        // post community icons
        'post_ci_show_for_posts' => true,
        'post_ci_show_for_news' => true,
        'post_ci_show_for_projects' => true,
        'post_ci_twitter_show' => true,
        'post_ci_twitter_url' => '',        
        'post_ci_facebook_show' => true,
        'post_ci_facebook_url' => '',
        'post_ci_linkedin_show' => true,
        'post_ci_linkedin_url' => '',        
        'post_ci_digg_show' => true,
        'post_ci_digg_url' => '',
        'post_ci_dellicious_show' => true,
        'post_ci_dellicious_url' => '',
        'post_ci_myspace_show' => true,
        'post_ci_myspace_url' => '',
        'post_ci_reddit_show' => true,
        'post_ci_reddit_url' => '',
        'post_ci_stumbleupon_show' => true,
        'post_ci_stumbleupon_url' => '',
        // header icon
        'header_icon_set' => 'Flat Big Dark',
        'header_icon_set_show' => true               
     );
   
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
 
    public function renderAnnouncementBar()
    {
        if($this->_general['annbar_show'])
        {                       
            $style = ' style="';
            $style .= 'height:'.$this->_general['annbar_height'].'px;';
            if($this->_general['annbar_transparent'])
            {
                $style .= 'background-color:transparent;';      
            }
            $style .= '" ';            
                                
            $out = '';
            $out .= '<div id="announcement-bar" '.$style.'>';
            $out .= do_shortcode(stripcslashes($this->_general['annbar_content']));
            $out .= '</div>';
            echo $out;
        }
    }
 
    public function renderSlider()          
    {     
        if($this->getSliderType() == $this->_sliders[CPGeneral::ACCORDION_SLIDER])
        {
            GetDCCPInterface()->getIAccordionSlider()->renderSlider();     
        } else
        if($this->getSliderType() == $this->_sliders[CPGeneral::PRESTIGE_SLIDER])
        {   
            GetDCCPInterface()->getIPrestigeSlider()->renderSlider();
        } else
        if($this->getSliderType() == $this->_sliders[CPGeneral::PROGRESS_SLIDER])
        {   
            GetDCCPInterface()->getIProgressSlider()->renderSlider();
        } else
        if($this->getSliderType() == $this->_sliders[CPGeneral::CHAIN_SLIDER])
        {   
            GetDCCPInterface()->getIChainSlider()->renderSlider();
        } else
        if($this->getSliderType() == $this->_sliders[CPGeneral::VIDEO_SLIDER])
        {   
            GetDCCPInterface()->getIVideoSlider()->renderSlider();
        }                  

    }
    
    public function getSliderType()
    {
        $slider = $this->_general['theme_slider']; 
        
        if($this->showClientPanel()) 
        {
            if(GetDCCPInterface()->getIClientPanel()->getSliderType() != null)
            {
                $slider = GetDCCPInterface()->getIClientPanel()->getSliderType();    
            }    
        }  
        return $slider;  
    }
    
    public function getSlidersArray()
    {
        return $this->_sliders;
    }
    
    public function renderHeaderIcons()
    {
        if($this->_general['header_icon_set_show'])
        {            
            $out = '';
            $count = 0;
            foreach($this->_icons as $icon)
            {
                if(!$icon->_hide)
                {
                    $count++;
                }
            }
            
            if($count > 0)
            {   
                $set_folder = $this->_general['header_icon_set'];
                     
                if($this->showClientPanel())
                {
                    if(GetDCCPInterface()->getIClientPanel()->getHeaderIconsSet() !== null)
                    {
                        $set_folder = GetDCCPInterface()->getIClientPanel()->getHeaderIconsSet();
                    }
                }
                     
                $out .= '<div id="icons">';
                
                foreach($this->_icons as $icon)
                {
                    if(!$icon->_hide)
                    {
                        $out .= '<a class="icon" href="'.$icon->_url.'" rel="'.$icon->_desc.'">';
                        $out .= '<img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/header/'.$set_folder.'/'.$icon->_filename.'" /></a>';
                    }
                }
                                
                  //  <a class="icon" href="#" rel="Facebook"><img class="unitPng" src="/img/icons/header/glass/facebook.png" /></a>                          
                $out .= '<span class="desc"></span></div>';
            }
            echo $out;                          
        }
    }
    
    public function renderSitePagination($paged, $max_page, $echo=true)
    {
        $out = '';
        if($max_page > 1) 
        { 
            $out .= '<div class="blog-pagination">';
            $out .= '<span class="pages">Pages:</span>';
                        
            if(!$this->showAllPagesNavigation() and $max_page > 15)
            {
                 $start = $paged - 4;
                 if($start < 1) { $start = 1; }
                 $last_end = 0;
                 if($start > 5)
                 {
                  
                    $last_end = 2;
                    for($i = 1; $i <= $last_end; $i++)
                    {
                        if($i == $paged)
                        {
                            $out .= '<a class="current" >'.$i.'</a>';    
                        } else
                        {
                            $out .= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                        }
                    }                    
                    $out .= '<span class="separator">...</span>';    
                 }
                                 

                $start = $paged - 4;
                if($start < 6) { $start = 1; }
                $last_end = $paged+4;
                if($last_end > $max_page)
                {
                    $last_end = $max_page;
                }
                for($i = $start; $i <= $last_end; $i++)
                {
                    if($i == $paged)
                    {
                        $out .= '<a class="current" >'.$i.'</a>';    
                    } else
                    {
                        $out .= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                    }
                }  
                
                if($last_end != $max_page)
                {
                    if($max_page - 4 > $last_end)
                    {
                        $out .= '<span class="separator">...</span>';
                        
                        for($i = $max_page-1; $i <= $max_page; $i++)
                        {
                            if($i == $paged)
                            {
                                $out .= '<a class="current" >'.$i.'</a>';    
                            } else
                            {
                                $out .= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                            }
                        }                         
                            
                    } else
                    {
                        for($i = $last_end+1; $i <= $max_page; $i++)
                        {
                            if($i == $paged)
                            {
                                $out .= '<a class="current" >'.$i.'</a>';    
                            } else
                            {
                                $out .= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                            }
                        }                          
                    }
                }
   
            } else
            {
                $out .= $this->renderSiteAllPages($paged, $max_page, false); 
            }
                        
            $out .= '<div class="clear-both"></div></div>';
        }  
        
        if($echo) { echo $out; } else { return $out; }              
    }
    

    
    public function renderSiteAllPages($paged, $max_page, $echo=true)
    {
        $out = '';
        for($i = 1; $i <= $max_page; $i++)
        {
            if($i == $paged)
            {
                $out .= '<a class="current" >'.$i.'</a>';    
            } else
            {
                $out .=  '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
            }
        } 
        
        if($echo) { echo $out; } else { return $out; }       
    } 
 
   /**
    * Constructor that sets the time to a given value.
    * 
    * @param timemillis Number of milliseconds 
    *        passed since Jan 1, 1970.
    * 
    * @return wp_link_pages return value
    */ 
    public function renderWordPressPagination($echo=1)
    {
        $args = array(
            'before'           => '<div class="page-links"><span class="before">Pages: </span>',
            'after'            => '<div class="clear-both"></div></div>',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'next_or_number'   => 'number',
            'nextpagelink'     => 'Next page',
            'previouspagelink' => 'Previous page',
            'pagelink'         => '%',
            'more_file'        => '',
            'echo'             => $echo ); 
        
        $result = '';    
        $result = wp_link_pages($args); 
        return $result;                       
    }
 
    public function registerSidebars()
    {        
        $count = count($this->_sidebars);
        for($i = 0; $i < $count; $i++)
        {        
            if(function_exists('register_sidebars') )
            {
                $id = 'sidebar-'.$this->_sidebars[$i]->_id;
                $args = array(
                'name'=>$this->_sidebars[$i]->_name,
                'id'=>$id,
                'before_widget' => $this->getBeforeWidget(),
                'after_widget' => $this->getAfterWidget(true),
                'before_title' => '<h4 class="white">',
                'after_title' => '</h4>',
                );                
                                
                register_sidebar($args);  
            }                        
        } // for
    }

    public function getCufonFontFile()
    {
        $fontfile = $this->_general['cufonfont'];
        
        if($this->showClientPanel())
        {
            if(GetDCCPInterface()->getIClientPanel()->getCufonFont() !== null)
            {
                $fontfile = GetDCCPInterface()->getIClientPanel()->getCufonFont();
            }
        }
        return $fontfile;
    }
    
    public function renderNextPrevPostPanel($post_type, $taxonomy='', $comma_separated_terms='')
    {
        $out = '';
        
        $next_post = dcf_next_post($post_type, $taxonomy, $comma_separated_terms);
        $prev_post = dcf_prev_post($post_type, $taxonomy, $comma_separated_terms); 
        $out .= '<div class="npp-panel">';
            if($next_post !== false)
            {
                $out .= '<a href="'.get_permalink($next_post->ID).'" class="next-btn link-tip-top" title="Newer"><span class="data">'.$next_post->post_title.'</span></a>';
            } else
            {
                $out .= '<a class="next-btn-disabled"></a>';    
            }

            if($prev_post !== false)
            {
                $out .= '<a href="'.get_permalink($prev_post->ID).'" class="prev-btn link-tip-top" title="Older"><span class="data">'.$prev_post->post_title.'</span></a>';
            } else
            {
                $out .= '<a class="prev-btn-disabled"></a>';    
            }  
            $out .= '<span class="title"></span>';                                                                       
        $out .= '</div>'; 
        return $out;
    }    
    
    public function getThemeMainColor()
    {
        return $this->_general['theme_main_color'];
    }

    public function getThemeMainHoverColor()
    {
        return $this->_general['theme_main_hovercolor'];
    }
    
    public function getNewsArchiveMonthsCount()
    {
        return $this->_general['news_archive_moths_count'];
    }    
    
    public function getLightBoxMode()
    {
        return $this->_general['theme_lightbox_mode'];
    }
    
    public function getBeforeWidget()
    {
        $out = '';
        $out .= '<div class="dc-widget-wrapper">';
        return $out;
    }
    
    public function getHeaderIconsSet()
    {
        return $this->_general['header_icon_set'];    
    }
    
    public function getAfterWidget($border=true, $twohalfs=true)
    {
        $out = '';
        if($border)
        {
           $out .= '<div class="widget-divider-top-half" ></div>';
           if($twohalfs)
           {
                $out .= '<div class="widget-divider-bottom-half"></div>';
           }
           $out .= '</div>'; 
        } else
        {
           $out .= '<div class="widget-divider-top-half" ></div>';
           if($twohalfs)
           {           
                $out .= '<div style="background:none;" class="widget-divider-bottom-half"></div>';
           } 
           $out .= '</div>';
        }
        return $out;
    }  

    public function hideWordPressVer()
    {
        return $this->_general['theme_hide_wp_version'];
    }
    
    public function showHeaderLogPanel()
    {
        return $this->_general['theme_show_log_panel'];
    }
    
    public function showPostVoting()
    {
        return $this->_general['voting_post_enable'];
    }

    public function showNewsVoting()
    {
        return $this->_general['voting_news_enable'];
    }    
    
    public function showProjectVoting()
    {
        return $this->_general['voting_project_enable'];
    }
    
    public function showBlogPagesVoting()
    {
        return $this->_general['voting_blog_pages_enable'];
    }    
    

    public function showCommentVoting()
    {
        return $this->_general['voting_comment_enable'];
    }    
    
    public function showVotingGlypsNum()
    {
        return $this->_general['voting_stars_num'];
    }
    
    public function showVotingTopComment()
    {
        return $this->_general['voting_show_top_comment'];
    }

    public function searchInPages()
    {
        return $this->_general['search_in_pages']; 
    }
    
    public function searchInPosts()
    {
        return $this->_general['search_in_posts']; 
    }  

    public function searchInNews()
    {
        return $this->_general['search_in_news']; 
    }
    
    public function searchInProjects()
    {
        return $this->_general['search_in_projects']; 
    }      
    
    public function showCtrlOnSearchPage()
    {
        return $this->_general['search_show_search_ctrl']; 
    }    
    
    public function showImagesOnSearchPage()
    {
        return $this->_general['search_show_images']; 
    }  
    
    public function hideHomeSlider()
    {
        return $this->_general['theme_hide_slider'];
    }
    
    public function getSearchSidebarID()
    {
        return $this->_general['search_sidebar'];
    }
    
    public function printSidebarsList($width, $name, $sidebar)
    {
        $count = count($this->_sidebars);
        
        $out = '';
        $out .= '<select style="width:'.$width.'px;" name="'.$name.'">';                                   
        $out .= '<option value="'.CMS_NOT_SELECTED.'" '.($value == CMS_NOT_SELECTED ? ' selected="selected" ' : '').'>Not selected</option>';
        for($i = 0; $i < $count; $i++)
        {
            $out .= '<option value="';
            $out .= $this->_sidebars[$i]->_id;
            $out .= '" ';
            $out .= ($sidebar == $this->_sidebars[$i]->_id ? ' selected="selected" ' : '');
            $out .= '>';
            $out .= $this->_sidebars[$i]->_name;
            $out .= '</option>';
        }
        $out .= '</select>';
        return $out;        
    }                                       
 
  

    public function getSidebarOnRight()
    {
        return $this->_general['sidebar_float_right']; 
    }  
 
    public function getPostCommunityIcons()
    {
        global $post;
        $out = '';
        $out .= '<div id="post-community-icons">'; 
            
            
            
            $show = false;
            if($this->_general['post_ci_linkedin_show'])
            { 
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_linkedin_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);
                
                $out .= '<a class="icon" href="'.$surl.'" rel="LinkedIn"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_LinkedIn.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_facebook_show'])
            {             
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_facebook_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);                
                
                $out .= '<a class="icon" href="'.$surl.'" rel="Facebook"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_Facebook.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_digg_show'])
            {                
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_digg_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);                  
                
                $out .= '<a class="icon" href="'.$surl.'" rel="Digg"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_Digg.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_dellicious_show'])
            {         
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_dellicious_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);              
                  
                $out .= '<a class="icon" href="'.$surl.'" rel="Delicious"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_Delicious.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_myspace_show'])
            {         
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_myspace_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);               
                  
                $out .= '<a class="icon" href="'.$surl.'" rel="MySpace"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_MySpace.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_reddit_show'])
            {       
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_reddit_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);             
                    
                $out .= '<a class="icon" href="'.$surl.'" rel="Reddit"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_Reddit.png" /></a>'; 
                $show = true;
            }
            
            if($this->_general['post_ci_stumbleupon_show'])
            {               
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_stumbleupon_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);                
                $surl = str_replace('[%source]', $source, $surl);                 
                
                $out .= '<a class="icon" href="'.$surl.'" rel="StumbleUpon"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_StumbleUpon.png" /></a>';
                $show = true;
            }
            
            if($this->_general['post_ci_twitter_show'])
            {                               
                $url = urlencode(get_permalink($post->ID));
                $title = urlencode($post->post_title);
                $source = urlencode(get_bloginfo('url'));
                
                $surl = $this->_general['post_ci_twitter_url'];
                $surl = str_replace('[%url]', $url, $surl);
                $surl = str_replace('[%title]', $title, $surl);
                $surl = str_replace('[%source]', $source, $surl);
                
                $out .= '<a class="icon" href="'.$surl.'" rel="Twitter"><img class="unitPng" src="'.get_bloginfo('template_url').'/img/icons/community/comm_Twitter.png" /></a>';                       
                $show = true;
            }
            
            if($show)
            {
                $out .= '<span class="description">Click to share this</span>';
                $out .= '<span class="default">Click to share this</span>';
            }
        $out .= '</div>';
        return $out;                         
    }
    
    public function getFooterLogoPath()
    {
        return $this->_general['footer_logo_path']; 
    }
  
    public function showFooterLinks()
    {
        return $this->_general['footer_show_links'];     
    }   
    
    public function showFooterWidgetized()
    {
        return $this->_general['footer_show_widgetized']; 
    }       
   
    public function showPostAuthor()
    {
        return $this->_general['show_post_author'];
    }

    public function showNewsAuthor()
    {
        return $this->_general['show_news_author'];
    }    
    
    public function showProjectAuthor()
    {
        return $this->_general['show_project_author'];
    }    
    
    public function showClientPanel()
    {
        return $this->_general['client_panel']; 
    }
    

    
    public function showNoTags()
    {
        return $this->_general['show_no_tags'];
    }    

    public function showAllPagesNavigation()
    {
        return $this->_general['blog_show_all_pages_navigation'];
    }
    
    public function showCIForPosts()
    {
        return $this->_general['post_ci_show_for_posts'];
    } 

    public function showCIForNews()
    {
        return $this->_general['post_ci_show_for_news'];
    }     

    public function showCIForProjects()
    {
        return $this->_general['post_ci_show_for_projects'];
    }  
    
    public function showFooterLogo()
    {
        return $this->_general['footer_show_logo'];
    }

    public function showFooterLine()
    {
        return $this->_general['footer_show_line'];
    }    
    
    
    
    public function showFooterCopy()
    {
        return $this->_general['footer_show_copy'];
    }

    public function getFooterCopy()
    {
        return stripcslashes($this->_general['footer_copy']);
    }
    
    public function portfolioPageSize()
    {
        return $this->_general['portfolio_page_size'];
    }  
    
    public function projectCatMode()
    {
        return $this->_general['port_proj_mode'];
    }  

    public function projectCatRows()
    {
        return $this->_general['port_proj_rows_count'];
    }        
    
    public function printFooterTrackingCode()
    {
        if(!$this->_general['tracking_code_disable'])
        {
            echo stripcslashes($this->_general['tracking_code']);
        }
    }

    public function printHeaderTrackingCode()
    {
        if(!$this->_general['header_tracking_code_disable'])
        {
            echo stripcslashes($this->_general['header_tracking_code']);
        }
    }
    
    public function getNoCommentsText()
    {
        return $this->_general['blog_no_comments'];    
    }

    public function getOneCommentText()
    {
        return $this->_general['blog_one_comment'];    
    }
    
    public function getMoreCommentsText()
    {
        return $this->_general['blog_more_comments'];    
    }    

    public function getContactMail()
    {
        return $this->_general['contact_email'];    
    }   
    
    public function getContactSendOkay() 
    {
        return stripcslashes($this->_general['contact_send_okay']);   
    }   

    public function getContactSendError()
    {
        return stripcslashes($this->_general['contact_send_error']);   
    } 
    
    
    public function getSidebarContactSendOkay() 
    {
        return stripcslashes($this->_general['contact_sid_send_okay']);   
    }   

    public function getSidebarContactSendError()
    {
        return stripcslashes($this->_general['contact_sid_send_error']);   
    } 
             

    public function getContactSendButtonName()
    {
        return $this->_general['contact_send_button_name'];        
    }
    
    public function getSubmitCommentBtnName()
    {
        return $this->_general['blog_submit_button_name'];   
    }  

    public function getLeaveCommentText()
    {
        return $this->_general['blog_leave_comment_text'];   
    } 
        
    public function getCommentTimeFormat()
    {
        return $this->_general['blog_comment_time_format'];   
    } 
    
    public function showPortfolioVideoIcon()
    {
        return $this->_general['portfolio_video_icon'];
    }    

    public function getThemeSkin()
    {
        return $this->_general['theme_skin'];
    } 
    
    public function get404Title()
    {
        return stripcslashes($this->_general['404_title']); 
    }
      
    public function get404Text()
    {
        return stripcslashes($this->_general['404_text']); 
    }        
        
    public function getExcludedCategories()
    {
        return $this->_general['blog_excluded_categories'];
    }
    
    public function excludeFromRecentPostsWidget()
    {
        return $this->_general['blog_exclude_from_recent_posts_widget'];
    }
    
    public function includeSidebar($postid, $sidebar=null, $pos=null)
    {
        $sidid = '';
        if($sidebar != null)
        {
            if($sidebar != CMS_NOT_SELECTED)
            {
                $sidid = $sidebar;    
            }   
        } else
        {
            $sidid = get_post_meta($postid, 'page_sidebar', true);
        } 
        
        if($sidid == CMS_NOT_SELECTED or $sidid == '')
        {
            // if is single assing blog sidebar else assing defeault sidebar
            if(is_single())
            {
               global $post;
               if($post->post_type == 'post')
               {
                    $sidid = $this->_general['blog_sidebar'];
               } else
               if($post->post_type == 'news')
               {
                    $sidid = $this->_general['news_sidebar'];    
               } else
               if($post->post_type == 'project')  
               {
                    $sidid = $this->_general['project_sidebar'];
               } 
               
               if($sidid == CMS_NOT_SELECTED)
               {
                    $sidid = $this->_general['default_sidebar'];     
               }
            } else
            {
               $sidid = $this->_general['default_sidebar']; 
            }                 
        }
        
        if($sidid != CMS_NOT_SELECTED)
        {
            if($pos !== null)
            {
                if($pos == 'right') { echo '<div class="sidebar-container-right">'; } else
                { echo '<div class="sidebar-container">'; }                       
            } else
            {
                if($this->getSidebarOnRight()) { echo '<div class="sidebar-container-right">'; } else
                { echo '<div class="sidebar-container">'; }   
             
            }
                  
            if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('sidebar-'.$sidid)) {}                
            echo '</div>';
        } else
        {
            if($pos !== null)
            {
                if($pos == 'right') { echo '<div class="sidebar-container-right">'; } else
                { echo '<div class="sidebar-container">'; }                       
            } else
            {
                if($this->getSidebarOnRight()) { echo '<div class="sidebar-container-right">'; } else
                { echo '<div class="sidebar-container">'; }   
             
            }
                    
            echo '<span style="color:#888888;font-size:11px;">No sidebar defined.</span>';
            echo '</div>';          
        }           
    }
    
    public function searchNoResultsText()
    {
        return stripcslashes($this->_general['search_no_results']);
    }

    public function searchTitleText()
    {
        return stripcslashes($this->_general['search_before_fragment']);
    }    
    
    public function searchPageSize()
    {
        return $this->_general['search_page_size'];
    }
   
    public function sliderJavaScript()
    {
        if(is_page_template('homepage.php')) 
        {
            if($this->getSliderType() == $this->_sliders[CPGeneral::ACCORDION_SLIDER])
            {
                GetDCCPInterface()->getIAccordionSlider()->javaScript();       
            } else
            if($this->getSliderType() == $this->_sliders[CPGeneral::PRESTIGE_SLIDER])
            {                
                GetDCCPInterface()->getIPrestigeSlider()->javaScript();     
            } else
            if($this->getSliderType() == $this->_sliders[CPGeneral::PROGRESS_SLIDER])
            {
                GetDCCPInterface()->getIProgressSlider()->javaScript();     
            } else
            if($this->getSliderType() == $this->_sliders[CPGeneral::VIDEO_SLIDER])
            {
                GetDCCPInterface()->getIVideoSlider()->javaScript();     
            }                       
        }          
    }
   
    public function customCSS()
    {
        echo '<style type="text/css">';
        
            // logo
            echo '#header-container  .logo { 
                left:'.$this->_general['logo_x'].'px;
                top:'.$this->_general['logo_y'].'px; 
                width:'.$this->_general['logo_width'].'px;
                height:'.$this->_general['logo_height'].'px; 
                background-image:url(\''.$this->_general['logo_path'].'\');                            
            }'; 
                   
            
            $is_home = false;
            if(is_page_template('homepage.php'))
            {
                $is_home = true;    
            }
            
            $skin = $this->_general['theme_skin'];
            if($this->showClientPanel())
            {
                if(GetDCCPInterface()->getIClientPanel()->getThemeSkin() !== null)
                {
                    $skin = GetDCCPInterface()->getIClientPanel()->getThemeSkin();
                }
            }
            // theme mode body background
            echo 'body {';
              
                    $force_bg = false;
                    $not_prestige_slider = false;
                    if($this->getSliderType() ==  $this->_sliders[CPGeneral::ACCORDION_SLIDER] or
                       $this->getSliderType() ==  $this->_sliders[CPGeneral::PROGRESS_SLIDER] or
                       $this->getSliderType() ==  $this->_sliders[CPGeneral::CHAIN_SLIDER])
                    {
                        $not_prestige_slider = true;       
                    }                      
                    
                    if($this->_general['theme_force_bg_then_sliders'] and $not_prestige_slider)
                    {
                        $force_bg = true;
                    }
                    
                    $is_home2 = false;
                    if($this->_general['theme_use_second_home'])
                    {
                        $path = TEMPLATEPATH.'/skins/'.$skin.'/home2.jpg';
                        $is_home2 = is_file($path);    
                    }
                    
                    if($is_home and !$this->_general['theme_skin_same_bg'] and !$force_bg)
                    {  
                        echo 'background-image:url(\''.get_bloginfo('template_url').'/skins/'.$skin.'/home.jpg'.'\');';
                    } else
                    {
                        if($is_home and $is_home2 and $not_prestige_slider)
                        {
                            echo 'background-image:url(\''.get_bloginfo('template_url').'/skins/'.$skin.'/home2.jpg'.'\');';     
                        } else
                        {
                            echo 'background-image:url(\''.get_bloginfo('template_url').'/skins/'.$skin.'/page.jpg'.'\');';
                        }
                    }              

                                
            echo '}';
            
            // theme mode footer background
            echo '#footer {';

                    echo 'background-image:url(\''.get_bloginfo('template_url').'/skins/'.$skin.'/footer.jpg'.'\');';
                         
            echo '}';  
            
            // theme color
            $color = $this->_general['theme_main_color'];
            if($this->showClientPanel())
            {
                if(GetDCCPInterface()->getIClientPanel()->getMainColor() !== null)
                {
                    $color = GetDCCPInterface()->getIClientPanel()->getMainColor();
                }
            }            
            
            $out = ' ';
            $out .= 'h1, h2, h3, h4, h5, h6, a, .dc-widget-wrapper #searchform #searchsubmit, .common-form .send-email-btn, .common-form .send-comment-btn, 
                    .navigation-tree-container .selected, .dc-widget-wrapper .widget-contact .send-email-btn, .common-form .send-btn, .common-form .search-btn, 
                    .news-slider ul li.selected, .blog-post-author p.author, #comments-section .comment .content span.marked, .dc-widget-wrapper .widget-projectslider .btn-active:hover,
                    .dc-widget-wrapper .widget-postslider .btn-active:hover, .dc-silver-table thead th, .page-links span, .blog-pagination a.current, 
                    #login-popup .send-btn, #login-popup p.label ';
            $out .= ' { color:#'.$color.'; }';
            echo $out;         
                                               
            $hovercolor = $this->_general['theme_main_hovercolor'];
            if($this->showClientPanel())
            {
                if(GetDCCPInterface()->getIClientPanel()->getMainHoverColor() !== null)
                {
                    $hovercolor = GetDCCPInterface()->getIClientPanel()->getMainHoverColor();
                }
            }             
            
            $out = ' ';
            $out .= 'a:hover, .navigation-tree-container .link:hover, .dc-widget-wrapper .widget-contact .send-email-btn:hover, .common-form .send-email-btn:hover,
                    .common-form .send-comment-btn:hover, .common-form .send-btn:hover, .common-form .search-btn:hover,
                    .dc-widget-wrapper #searchform #searchsubmit:hover, .page-links a span:hover, #login-popup .send-btn:hover';
            $out .= ' { color:#'.$hovercolor.'; }';
            echo $out;   

            $out = ' ';
            $out .= '#slider-a-container .desc .btn-left:hover, #slider-a-container .desc .btn-right:hover';
            $out .= ' { background-color:#'.$hovercolor.'; }';
            echo $out;  
                       
        echo '</style>';
    }     
    
    public function renderFooterSidebarA()
    {
        if($this->_general['footer_sidebar_a'] != CMS_NOT_SELECTED)
        {
            if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('sidebar-'.$this->_general['footer_sidebar_a'])) {}     
        }
    }
    
    public function renderFooterSidebarB()
    {
        if($this->_general['footer_sidebar_b'] != CMS_NOT_SELECTED)
        {
            if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('sidebar-'.$this->_general['footer_sidebar_b'])) {}     
        }
    }
    
    public function renderFooterSidebarC()
    {
        if($this->_general['footer_sidebar_c'] != CMS_NOT_SELECTED)
        {
            if(!function_exists('dynamic_sidebar') or !dynamic_sidebar('sidebar-'.$this->_general['footer_sidebar_c'])) {}     
        }
    }      
    
    /*********************************************************** 
    * Private functions
    ************************************************************/      
   
    private function getDefaultCommunityIconURL($name)
    {
        $value = '';
        switch($name)
        {
            case 'twitter':
                $value = 'http://twitter.com/home?status=[%url]+[%title]';
            break;
            case 'facebook':
                $value = 'http://www.facebook.com/share.php?u=[%url]&title=[%title]';
            break;
            case 'linkedin':
                $value = 'http://www.linkedin.com/shareArticle?mini=true&url=[%url]&title=[%title]&source=[%source]';
            break;  
            case 'digg':
                $value = 'http://www.digg.com/submit?phase=2&url=[%url]&title=[%title]';
            break;            
            case 'dellicious':
                $value = 'http://delicious.com/post?url=[%url]&title=[%title]&notes=[%source]';
            break;              
            case 'myspace':
                $value = 'http://www.myspace.com/index.cfm?fuseaction=postto&t=[%title]&c=[%url]&u=[%source]&l';
            break;            
            case 'reddit':
                $value = 'http://www.reddit.com/submit?url=[%url]&title=[%title]';
            break;              
            case 'stumbleupon':
                $value = 'http://www.stumbleupon.com/submit?url=[%url]&title=[%title]';
            break;             
            
        }
        return $value;
    }
   
    private function setDefaults()
    {
        $this->_generalDef['logo_path'] = get_bloginfo('template_url') . '/img/common_files/prestige_logo_header.png';
        $this->_generalDef['footer_logo_path'] = get_bloginfo('template_url') . '/img/common_files/prestige_logo_footer.png';
        
        // cummunity icons urls
        $this->_generalDef['post_ci_twitter_url'] = $this->getDefaultCommunityIconURL('twitter');
        $this->_generalDef['post_ci_facebook_url'] = $this->getDefaultCommunityIconURL('facebook');
        $this->_generalDef['post_ci_linkedin_url'] = $this->getDefaultCommunityIconURL('linkedin');
        $this->_generalDef['post_ci_digg_url'] = $this->getDefaultCommunityIconURL('digg'); 
        
        $this->_generalDef['post_ci_dellicious_url'] = $this->getDefaultCommunityIconURL('dellicious');
        $this->_generalDef['post_ci_myspace_url'] = $this->getDefaultCommunityIconURL('myspace');
        $this->_generalDef['post_ci_reddit_url'] = $this->getDefaultCommunityIconURL('reddit');
        $this->_generalDef['post_ci_stumbleupon_url'] = $this->getDefaultCommunityIconURL('stumbleupon');                   
    }
   
    private function process()
    {
        if(isset($_POST['general_save_theme']))
        {
            $this->_general['theme_skin'] = $_POST['theme_skin'];
            $this->_general['theme_skin_same_bg'] = isset($_POST['theme_skin_same_bg']) ? true : false; 
            $this->_general['theme_force_bg_then_sliders'] = isset($_POST['theme_force_bg_then_sliders']) ? true : false; 
            $this->_general['theme_use_second_home'] = isset($_POST['theme_use_second_home']) ? true : false; 
            $this->_general['theme_hide_slider'] = isset($_POST['theme_hide_slider']) ? true : false;           
                       
                       
            $this->_general['theme_slider'] = $_POST['theme_slider'];                                 
            $this->_general['client_panel'] = isset($_POST['client_panel']) ? true : false;
            $this->_general['theme_main_color'] = $_POST['theme_main_color']; 
            $this->_general['theme_main_hovercolor'] = $_POST['theme_main_hovercolor']; 
            $this->_general['theme_show_log_panel'] = isset($_POST['theme_show_log_panel']) ? true : false;
            $this->_general['theme_hide_wp_version'] = isset($_POST['theme_hide_wp_version']) ? true : false; 
            
            $this->_general['theme_lightbox_mode'] = $_POST['theme_lightbox_mode']; 
                        
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }   

        if(isset($_POST['general_save_annbar']))
        {
            $this->_general['annbar_show'] = isset($_POST['annbar_show']) ? true : false; 
            $this->_general['annbar_height'] = $_POST['annbar_height'];
            $this->_general['annbar_content'] = $_POST['annbar_content'];
            $this->_general['annbar_transparent'] = $_POST['annbar_transparent'];
                        
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }  
                   
        if(isset($_POST['general_add_sidebar']))
        {
            $temp = new CPSidebar();
            $temp->_name = $_POST['name'];
            array_push($this->_sidebars, $temp);
            update_option(CPGeneral::DBIDOPT_SIDEBARS, $this->_sidebars);
            $this->_saved = true;               
        }

        if(isset($_POST['general_save_sidebar']))
        {
            $index = $_POST['index'];
            $this->_sidebars[$index]->_name = $_POST['name'];
            update_option(CPGeneral::DBIDOPT_SIDEBARS, $this->_sidebars);
            $this->_saved = true;               
        }        

        if(isset($_POST['general_delete_sidebar']))
        {
            $index = $_POST['index'];
            unset($this->_sidebars[$index]);
            $this->_sidebars = array_values($this->_sidebars);
            update_option(CPGeneral::DBIDOPT_SIDEBARS, $this->_sidebars);
            $this->_saved = true;               
        }
        
        if(isset($_POST['general_save_sidebar_opt']))
        {
            $this->_general['sidebar_flat'] = isset($_POST['sidebar_flat']) ? true : false;
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }   

        if(isset($_POST['general_save_logo']))
        {
            $this->_general['logo_width'] = $_POST['logo_width'];
            $this->_general['logo_height'] = $_POST['logo_height'];
            $this->_general['logo_path'] = $_POST['logo_path'];
            $this->_general['logo_x'] = $_POST['logo_x'];
            $this->_general['logo_y'] = $_POST['logo_y'];
            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }  
     
        if(isset($_POST['general_save_menu_color']))
        {
            $this->_general['menu_color'] = $_POST['menu_color'];
            $this->_general['menu_hover_color'] = $_POST['menu_hover_color'];
            $this->_general['menu_use_color'] = isset($_POST['menu_use_color']) ? true : false;            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }                   
        
        if(isset($_POST['general_save_blog']))
        {
            $this->_general['show_post_author'] = isset($_POST['show_post_author']) ? true : false;
            $this->_general['show_news_author'] = isset($_POST['show_news_author']) ? true : false;
            $this->_general['show_project_author'] = isset($_POST['show_project_author']) ? true : false; 
            $this->_general['blog_sidebar'] = $_POST['blog_sidebar']; 
            $this->_general['news_sidebar'] = $_POST['news_sidebar'];
            $this->_general['news_archive_moths_count'] = (int)$_POST['news_archive_moths_count'];
            if($this->_general['news_archive_moths_count'] < 1 or $this->_general['news_archive_moths_count'] > 24)
            {
                $this->_general['news_archive_moths_count'] = 6;        
            }
            
            
            $this->_general['project_sidebar'] = $_POST['project_sidebar'];
            $this->_general['show_no_tags'] = isset($_POST['show_no_tags']) ? true : false;           
            $this->_general['blog_no_comments'] = $_POST['blog_no_comments'];
            $this->_general['blog_one_comment'] = $_POST['blog_one_comment'];
            $this->_general['blog_more_comments'] = $_POST['blog_more_comments']; 
            $this->_general['blog_submit_button_name'] = $_POST['blog_submit_button_name'];
            $this->_general['blog_leave_comment_text'] = $_POST['blog_leave_comment_text']; 
            $this->_general['blog_comment_time_format'] = $_POST['blog_comment_time_format'];
            $this->_general['blog_exclude_from_recent_posts_widget'] = isset($_POST['blog_exclude_from_recent_posts_widget']) ? true : false;
            $this->_general['blog_show_all_pages_navigation'] = isset($_POST['blog_show_all_pages_navigation']) ? true : false;              
            
            if(isset($_POST['blog_excluded_categories']))
            {
                $this->_general['blog_excluded_categories'] = $_POST['blog_excluded_categories'];
            } else
            {
                $this->_general['blog_excluded_categories'] = array();
            }          
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }

        if(isset($_POST['general_default_sidebar']))
        {
            $this->_general['default_sidebar'] = $_POST['default_sidebar'];
            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }  
   
        if(isset($_POST['general_sidebar_settings']))
        {
            $this->_general['sidebar_float_right'] = isset($_POST['sidebar_float_right']) ? true : false;
            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }       
        
        if(isset($_POST['general_save_portfolio']))
        {        
            $this->_general['portfolio_page_size'] = $_POST['portfolio_page_size'];
            $this->_general['portfolio_video_icon'] = isset($_POST['portfolio_video_icon']) ? true : false;                           
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }  

        if(isset($_POST['general_save_portfolio_project']))
        {        
            $this->_general['port_proj_mode'] = $_POST['port_proj_mode'];
            $this->_general['port_proj_rows_count'] = (int)$_POST['port_proj_rows_count']; 
            if($this->_general['port_proj_rows_count'] < 1)
            {
                $this->_general['port_proj_rows_count'] = 1;
            }      
                                      
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }       
        
        if(isset($_POST['general_save_voting']))
        {                    
            $this->_general['voting_stars_num'] = (int)$_POST['voting_stars_num'];
            if($this->_general['voting_stars_num'] < 2) { $this->_general['voting_stars_num'] = 2; }
            if($this->_general['voting_stars_num'] > 10) { $this->_general['voting_stars_num'] = 10; }
            
            $this->_general['voting_post_enable'] = isset($_POST['voting_post_enable']) ? true : false;
            $this->_general['voting_news_enable'] = isset($_POST['voting_news_enable']) ? true : false; 
            $this->_general['voting_comment_enable'] = isset($_POST['voting_comment_enable']) ? true : false;                            
            $this->_general['voting_project_enable'] = isset($_POST['voting_project_enable']) ? true : false; 
            $this->_general['voting_blog_pages_enable'] = isset($_POST['voting_blog_pages_enable']) ? true : false;
            
            $this->_general['voting_show_top_comment'] = isset($_POST['voting_show_top_comment']) ? true : false;
            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }         
        
        
        
        if(isset($_POST['general_save_footer_tracking']))
        {        
            $this->_general['tracking_code'] = $_POST['tracking_code'];  
            $this->_general['tracking_code_disable'] = isset($_POST['tracking_code_disable']) ? true : false;
                        
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        } 
        
        if(isset($_POST['general_save_header_tracking']))
        {        
            $this->_general['header_tracking_code'] = $_POST['header_tracking_code'];  
            $this->_general['header_tracking_code_disable'] = isset($_POST['header_tracking_code_disable']) ? true : false;
                        
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }                     

        if(isset($_POST['general_save_404']))
        {        
            $this->_general['404_title'] = $_POST['404_title'];
            $this->_general['404_text'] = $_POST['404_text'];                          
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }         
        
        if(isset($_POST['general_save_footer']))
        {        
            $this->_general['footer_logo_path'] = $_POST['footer_logo_path']; 
            $this->_general['footer_show_links'] = isset($_POST['footer_show_links']) ? true : false; 
            $this->_general['footer_show_widgetized'] = isset($_POST['footer_show_widgetized']) ? true : false;
            $this->_general['footer_show_logo'] = isset($_POST['footer_show_logo']) ? true : false;                       
            $this->_general['footer_show_copy'] = isset($_POST['footer_show_copy']) ? true : false; 
            $this->_general['footer_show_line'] = isset($_POST['footer_show_line']) ? true : false; 
            $this->_general['footer_copy'] = $_POST['footer_copy'];                        
                                   
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        } 

        if(isset($_POST['general_save_cufonfont']))
        {        
            $this->_general['cufonfont'] = $_POST['cufonfont'];                        
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }   
        
        if(isset($_POST['general_save_search']))
        {        
            $this->_general['search_no_results'] = $_POST['search_no_results'];        
            $this->_general['search_before_fragment'] = $_POST['search_before_fragment'];
            $this->_general['search_page_size'] = $_POST['search_page_size'];
            $this->_general['search_sidebar'] = $_POST['search_sidebar']; 
            $this->_general['search_in_posts'] = isset($_POST['search_in_posts']) ? true : false;
            $this->_general['search_in_pages'] = isset($_POST['search_in_pages']) ? true : false;
            $this->_general['search_in_news'] = isset($_POST['search_in_news']) ? true : false;
            $this->_general['search_in_projects'] = isset($_POST['search_in_projects']) ? true : false;
            $this->_general['search_show_search_ctrl'] = isset($_POST['search_show_search_ctrl']) ? true : false;
            $this->_general['search_show_images'] = isset($_POST['search_show_images']) ? true : false;
            
                                                                     
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }          

        if(isset($_POST['general_save_contact']))
        {        
            $this->_general['contact_email'] = $_POST['contact_email'];
            $this->_general['contact_send_okay'] = $_POST['contact_send_okay'];
            $this->_general['contact_send_error'] = $_POST['contact_send_error'];
            $this->_general['contact_sid_send_okay'] = $_POST['contact_sid_send_okay'];
            $this->_general['contact_sid_send_error'] = $_POST['contact_sid_send_error'];

            $this->_general['contact_send_button_name'] = $_POST['contact_send_button_name'];             
                                      
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;
        }         
       
        if(isset($_POST['general_save_footer_sidebar_a']))
        {
            $this->_general['footer_sidebar_a'] = $_POST['footer_sidebar_a'];            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }
                  
        if(isset($_POST['general_save_footer_sidebar_b']))
        {
            $this->_general['footer_sidebar_b'] = $_POST['footer_sidebar_b'];            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }
                 
        if(isset($_POST['general_save_footer_sidebar_c']))
        {
            $this->_general['footer_sidebar_c'] = $_POST['footer_sidebar_c'];            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }    
        
        if(isset($_POST['general_save_header_icon_set']))
        {
            $this->_general['header_icon_set'] = $_POST['header_icon_set'];
            $this->_general['header_icon_set_show'] = isset($_POST['header_icon_set_show']) ? true : false;
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);              
            $this->_saved = true;  
        }          

        if(isset($_POST['header_icon_add']))
        {
            $icon = new CPHeaderIcon();
            $icon->_filename = $_POST['filename'];
            array_push($this->_icons, $icon);
            
            update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
            $this->_saved = true;  
        } 
        
        if(isset($_POST['header_icon_delete']))
        {
            $index = $_POST['index'];
            unset($this->_icons[$index]);
            $this->_icons = array_values($this->_icons);
            update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
            $this->_saved = true;                      
        }        
        
        if(isset($_POST['header_icon_moveup']))
        {
            $index = $_POST['index'];
            if($index > 0)
            {         
                $temp = $this->_icons[$index - 1];
                $this->_icons[$index - 1] = $this->_icons[$index];
                $this->_icons[$index] = $temp;
                
                update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
                $this->_saved = true;
            }                      
        } 
        
        if(isset($_POST['header_icon_movedown']))
        {
            $index = $_POST['index'];
            $count = count($this->_icons); 
            $last = $count - 1;
            if($index < $last)
            {         
                $temp = $this->_icons[$index + 1];
                $this->_icons[$index + 1] = $this->_icons[$index];
                $this->_icons[$index] = $temp;
                
                update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
                $this->_saved = true;
            }                      
        }         
        
        if(isset($_POST['header_icon_addbelow']))
        {
            $index = $_POST['index'];
            $count = count($this->_icons);
            $item = new CPHeaderIcon();                              
            
            if($count == 0 or $index == $count-1)
            {
                array_push($this->_icons, $item); 
            } else
            {
                // get the start of the array  
                $start = array_slice($this->_icons, 0, $index+1); 
                // get the end of the array
                $end = array_slice($this->_icons, $index+1);
                // add the new element to the array
                $start[] = $item;
                // glue them back together and return
                $this->_icons = array_merge($start, $end);   
            } 
            update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons);
            $this->_saved = true;                      
        }          
        
        if(isset($_POST['header_icon_save']))
        {            
            $index = $_POST['index'];
    
            $this->_icons[$index]->_hide = isset($_POST['hide']) ? true : false;
            $this->_icons[$index]->_filename = $_POST['filename'];
            $this->_icons[$index]->_url = $_POST['url'];
            $this->_icons[$index]->_desc = $_POST['desc'];
            
            update_option(CPGeneral::DBIDOPT_HEADER_ICONS, $this->_icons); 
            $this->_saved = true;                   
        }           
        
        if(isset($_POST['general_save_post_community_icons']))
        {         
            $this->_general['post_ci_twitter_show'] = isset($_POST['post_ci_twitter_show']) ? true : false;
            $this->_general['post_ci_twitter_url'] = stripcslashes($_POST['post_ci_twitter_url']); 
            $this->_general['post_ci_facebook_show'] = isset($_POST['post_ci_facebook_show']) ? true : false;
            $this->_general['post_ci_facebook_url'] = stripcslashes($_POST['post_ci_facebook_url']);            

            $this->_general['post_ci_linkedin_show'] = isset($_POST['post_ci_linkedin_show']) ? true : false;
            $this->_general['post_ci_linkedin_url'] = stripcslashes($_POST['post_ci_linkedin_url']); 
            $this->_general['post_ci_digg_show'] = isset($_POST['post_ci_digg_show']) ? true : false;
            $this->_general['post_ci_digg_url'] = stripcslashes($_POST['post_ci_digg_url']); 

            $this->_general['post_ci_dellicious_show'] = isset($_POST['post_ci_dellicious_show']) ? true : false;
            $this->_general['post_ci_dellicious_url'] = stripcslashes($_POST['post_ci_dellicious_url']); 
            $this->_general['post_ci_myspace_show'] = isset($_POST['post_ci_myspace_show']) ? true : false;
            $this->_general['post_ci_myspace_url'] = stripcslashes($_POST['post_ci_myspace_url']);             
            
            $this->_general['post_ci_reddit_show'] = isset($_POST['post_ci_reddit_show']) ? true : false;
            $this->_general['post_ci_reddit_url'] = stripcslashes($_POST['post_ci_reddit_url']); 
            $this->_general['post_ci_stumbleupon_show'] = isset($_POST['post_ci_stumbleupon_show']) ? true : false;
            $this->_general['post_ci_stumbleupon_url'] = stripcslashes($_POST['post_ci_stumbleupon_url']); 
            
            $this->_general['post_ci_show_for_posts'] = isset($_POST['post_ci_show_for_posts']) ? true : false;
            $this->_general['post_ci_show_for_news'] = isset($_POST['post_ci_show_for_news']) ? true : false;             
            $this->_general['post_ci_show_for_projects'] = isset($_POST['post_ci_show_for_projects']) ? true : false; 
            
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;  
        }  
        
        if(isset($_POST['general_restore_ci_url_twitter']))
        {            
            $this->_general['post_ci_twitter_url'] = $this->getDefaultCommunityIconURL('twitter');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }        
               
        if(isset($_POST['general_restore_ci_url_facebook']))
        {            
            $this->_general['post_ci_facebook_url'] = $this->getDefaultCommunityIconURL('facebook');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }  
         
        if(isset($_POST['general_restore_ci_url_linkedin']))
        {            
            $this->_general['post_ci_linkedin_url'] = $this->getDefaultCommunityIconURL('linkedin');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }           
                            
        if(isset($_POST['general_restore_ci_url_digg']))
        {            
            $this->_general['post_ci_digg_url'] = $this->getDefaultCommunityIconURL('digg');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }  
       
        if(isset($_POST['general_restore_ci_url_dellicious']))
        {            
            $this->_general['post_ci_dellicious_url'] = $this->getDefaultCommunityIconURL('dellicious');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }         

        if(isset($_POST['general_restore_ci_url_myspace']))
        {            
            $this->_general['post_ci_myspace_url'] = $this->getDefaultCommunityIconURL('myspace');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }  
        
        if(isset($_POST['general_restore_ci_url_reddit']))
        {            
            $this->_general['post_ci_reddit_url'] = $this->getDefaultCommunityIconURL('reddit');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }          
     
        if(isset($_POST['general_restore_ci_url_stumbleupon']))
        {            
            $this->_general['post_ci_stumbleupon_url'] = $this->getDefaultCommunityIconURL('stumbleupon');
            update_option(CPGeneral::DBIDOPT_GENERAL, $this->_general);
            $this->_saved = true;             
        }        
        
    }

    private function createDefaultHeaderIcons()
    {
        $this->_icons = Array();
        
        // facebook
        $icon = new CPHeaderIcon();
        $icon->_filename = 'facebook.png';
        $icon->_desc = 'Facebook';
        array_push($this->_icons, $icon);              

        // twitter
        $icon = new CPHeaderIcon();
        $icon->_filename = 'twitter.png';
        $icon->_desc = 'Twitter';
        array_push($this->_icons, $icon);
        
        // flickr
        $icon = new CPHeaderIcon();
        $icon->_filename = 'flickr.png';
        $icon->_desc = 'Flickr';
        array_push($this->_icons, $icon);                    

        // rss
        $icon = new CPHeaderIcon();
        $icon->_filename = 'rss.png';
        $icon->_desc = 'RSS';
        array_push($this->_icons, $icon); 

        // linkedin
        $icon = new CPHeaderIcon();
        $icon->_filename = 'linkedin.png';
        $icon->_desc = 'LinkedIn';
        array_push($this->_icons, $icon); 
        
        // wiki
        $icon = new CPHeaderIcon();
        $icon->_filename = 'wiki.png';
        $icon->_desc = 'Wikipedia';
        array_push($this->_icons, $icon);         

        // email
        $icon = new CPHeaderIcon();
        $icon->_filename = 'email.png';
        $icon->_desc = 'Email';
        array_push($this->_icons, $icon);   
    
        // google
        $icon = new CPHeaderIcon();
        $icon->_filename = 'google.png';
        $icon->_desc = 'Google';
        array_push($this->_icons, $icon);      

        // home
        $icon = new CPHeaderIcon();
        $icon->_filename = 'home.png';
        $icon->_desc = 'Home';
        array_push($this->_icons, $icon);
        
        // video
        $icon = new CPHeaderIcon();
        $icon->_filename = 'video.png';
        $icon->_desc = 'Video';
        array_push($this->_icons, $icon); 
        
        // youtube
        $icon = new CPHeaderIcon();
        $icon->_filename = 'youtube.png';
        $icon->_desc = 'YouTube';
        array_push($this->_icons, $icon); 
        
        // myspace
        $icon = new CPHeaderIcon();
        $icon->_filename = 'myspace.png';
        $icon->_desc = 'MySpace';
        array_push($this->_icons, $icon); 
        
        // myspace
        $icon = new CPHeaderIcon();
        $icon->_filename = 'vimeo.png';
        $icon->_desc = 'Vimeo';
        array_push($this->_icons, $icon);                                          
    }
    
    private function renderCMS()
    {
        if($this->_saved)
        {                    
            echo '<span class="cms-saved-bar">Settings saved</span><br /><br />';            
        }           
        
         // theme settings
         $out = '';
         $out .= '<div style="margin-top:0px;">';
         $out .= '<h6 class="cms-h6">Theme global settings</h6><hr class="cms-hr"/>'; 
         $out .= '<form action="#" method="post">';
         
         $skinsspath = TEMPLATEPATH.'/skins';
         $dirhandle = null;
         $skindir = null;                                 
         
         $out .= '<span class="cms-span-10">Choose theme skin:</span><br /><select style="width:300px;" name="theme_skin">';         
         if(is_dir($skinsspath)) 
         {      
            $dirs_list = scandir($skinsspath);
            
            //if($dirhandle = opendir($skinsspath)) 
            {                    
                //while(($skindir = readdir($dirhandle)) !== false)
                foreach($dirs_list as $skindir) 
                {                       
                    if($skindir != '.' and $skindir != '..' and is_dir($skinsspath.'/'.$skindir)) 
                    {
                        $out .= '<option value="'.$skindir.'" ';
                        $out .= $this->_general['theme_skin'] == $skindir ? ' selected="selected" ' : '';
                        $out .= '>';
                        $out .= $skindir.'</option>';
                    }    
                }
                //closedir($dirhandle);      
            }     
         }
         $out .= '</select><br /><br />';
         

         $out .= '<span class="cms-span-10">Choose theme slider:</span><br /><select style="width:300px;" name="theme_slider">';         
         foreach($this->_sliders as $key => $slider)
         {
            $out .= '<option value="'.$slider.'" ';
            $out .= $this->_general['theme_slider'] == $slider ? ' selected="selected" ' : '';
            $out .= '>';
            $out .= $slider.'</option>';
         }        
         $out .= '</select><br /><br />';            
                           
         $out .= '<span class="cms-span-10">Choose lightbox mode:</span><br /><select style="width:300px;" name="theme_lightbox_mode">';         
         $lbmodes = Array('facebook', 'dark_rounded', 'dark_square', 'light_rounded', 'light_square');

         foreach($lbmodes as $lbmode)
         {
            $out .= '<option value="'.$lbmode.'" ';
            $out .= $this->_general['theme_lightbox_mode'] == $lbmode ? ' selected="selected" ' : '';
            $out .= '>';
            $out .= $lbmode.'</option>';
         }        
         $out .= '</select><br />';         
        
         
         
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_general['theme_main_color'].'" name="theme_main_color" /> Theme main text color (for headings, links etc, deafult: FFA319) <br />';          
         $out .= '<input style="width:70px;text-align:center;" type="text" class="colorpicker {hash:true}" value="'.$this->_general['theme_main_hovercolor'].'" name="theme_main_hovercolor" /> Theme main text hover color (default: FFC602)<br /><br />';          
         
         $out .= '<input type="checkbox" name="theme_skin_same_bg" '.($this->_general['theme_skin_same_bg'] ? ' checked="checked" ' : '').' /> Use the same background for homepage as for normal page<br />';
         $out .= '<input type="checkbox" name="theme_force_bg_then_sliders" '.($this->_general['theme_force_bg_then_sliders'] ? ' checked="checked" ' : '').' /> Force the same background for homepage as for normal page when Accordion, Progress or Chain slider is selected<br />';  
         $out .= '<input type="checkbox" name="theme_use_second_home" '.($this->_general['theme_use_second_home'] ? ' checked="checked" ' : '').' /> Use second special homepage background when Accordion, Progress, or Chain slider is selected (works only for some skins, like for example: Leather and Brown Wood)<br /><br />'; 
         
         if($this->_general['client_panel_opt_show'])
         {
            $out .= '<input type="checkbox" name="client_panel" '.($this->_general['client_panel'] ? ' checked="checked" ' : '').' /> Show client panel<br />';
         }
         $out .= '<input type="checkbox" name="theme_show_log_panel" '.($this->_general['theme_show_log_panel'] ? ' checked="checked" ' : '').' /> Show header user login panel<br />';                       
         $out .= '<input type="checkbox" name="theme_hide_wp_version" '.($this->_general['theme_hide_wp_version'] ? ' checked="checked" ' : '').' /> Hide information about WordPress version in site header<br />';
         $out .= '<input type="checkbox" name="theme_hide_slider" '.($this->_general['theme_hide_slider'] ? ' checked="checked" ' : '').' /> Hide homepage slider<br />'; 
          
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input type="submit" class="cms-submit" name="general_save_theme" value="Save" /> ';         
         
         $out .= '</form>'; 
         $out .= '</div>'; 
         echo $out;

         // cufon font
         $out = '';
         $out .= '<a name="cufon"></a>'; 
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Cufon font</h6><hr class="cms-hr"/>';
         $out .= '<form action="#cufon" method="post" >';                                                                                                                                        

         $fontspath = TEMPLATEPATH.'/fonts';
         $dirhandle = null;
         $fontfile = null;
         
         $out .= '<select style="width:300px;" name="cufonfont">';         
         if(is_dir($fontspath)) 
         {
            if($dirhandle = opendir($fontspath)) 
            {
                while(($fontfile = readdir($dirhandle)) !== false) 
                {
                    if($fontfile != '.' and $fontfile != '..' and is_file($fontspath.'/'.$fontfile)) 
                    {
                        $out .= '<option value="'.$fontfile.'" ';
                        $out .= $this->_general['cufonfont'] == $fontfile ? ' selected="selected" ' : '';
                        $out .= '>';
                        $out .= $fontfile.'</option>';
                    }    
                }
                closedir($dirhandle);      
            }     
         }
         $out .= '</select>';
         
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_cufonfont" /><br />';         
         $out .= '</div>';                           
         $out .= '</form></div>';  
         echo $out;
        
         // Header icons set
         $out = '';
         $out .= '<a name="header_icons_set"></a>';                  
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Header icons set</h6><hr class="cms-hr"/>';
         $out .= '<form action="#header_icons_set" method="post" >';                                                                                                                                        

         $iconsspath = TEMPLATEPATH.'/img/icons/header';
         $dirhandle = null;
         $icondir = null;
         
         $out .= '<span class="cms-span-10">Choose icons set:</span><br /><select style="width:300px;" name="header_icon_set">';         
         if(is_dir($iconsspath)) 
         {      
            if($dirhandle = opendir($iconsspath)) 
            {   
                while(($icondir = readdir($dirhandle)) !== false) 
                {   
                    if($icondir != '.' and $icondir != '..' and is_dir($iconsspath.'/'.$icondir)) 
                    {
                        $out .= '<option value="'.$icondir.'" ';
                        $out .= $this->_general['header_icon_set'] == $icondir ? ' selected="selected" ' : '';
                        $out .= '>';
                        $out .= $icondir.'</option>';
                    }    
                }
                closedir($dirhandle);      
            }     
         }
         $out .= '</select><br /><br />';
                           
         $out .= '<input type="checkbox" name="header_icon_set_show" '.($this->_general['header_icon_set_show'] ? ' checked="checked" ' : '').' /> Show header icons <br />';
         
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_header_icon_set" /><br />';         
         $out .= '</div>';                           
         $out .= '</form></div>';
         echo $out;  
         
         // Header icons
         $out = '';
         $out .= '<a name="header_icons"></a>';                  
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Header icons</h6><hr class="cms-hr"/>';
                                                                                                                                                                          
         $out .= '<table>';        
         $out .= '<thead>
                <tr>
                    <th style="padding:0px 3px 0px 3px;">Hide</th>
                    <th style="padding:0px 3px 0px 3px;">Filename</th>
                    <th style="padding:0px 3px 0px 3px;">Description</th>
                    <th style="padding:0px 3px 0px 3px;">URL</th>
                    <th style="padding:0px 3px 0px 3px;">Save</th>
                    <th style="padding:0px 3px 0px 3px;">Delete</th>
                    <th style="padding:0px 3px 0px 3px;">Add</th>
                    <th style="padding:0px 3px 0px 3px;">Up</th>
                    <th style="padding:0px 3px 0px 3px;">Down</th>                        
                </tr>
              </thead>';
                  
            $num = count($this->_icons);
            for($i = 0; $i < $num; $i++)
            {            
                $out .= '<tr>';
                // hide icon
                $out .= '              
                    <td style="text-align:center;"><form action="#header_icons" method="POST">
                    <input type="checkbox" '.($this->_icons[$i]->_hide ? ' checked="checked" ' : '').' name="hide" title="Select to hide icon" /></td>'; 
                // filename    
                $out .= '<td><input type="hidden" name="index" value="'.$i.'" />
                    <input style="width:120px;" type="text" name="filename" value="'.$this->_icons[$i]->_filename.'" title="Icon file name" /></td>';
                // description                   
                $out .= '<td><input type="hidden" name="index" value="'.$i.'" />
                    <input style="width:120px;" type="text" name="desc" value="'.$this->_icons[$i]->_desc.'" title="Icon description" /></td>';               
                // url   
                $out .= '<td><input style="width:300px;" type="text" name="url" value="'.$this->_icons[$i]->_url.'" /></td>';
               
                // save / delete / add / up / down
                $out .= '<td><input  class="cms-submit" type="submit" value="Save" name="header_icon_save" /></td> 
                    <td><input  onclick="return confirm('."'Delete item?'".')" class="cms-submit-delete" type="submit" value="Delete" name="header_icon_delete" /></td>
                <td><input  class="cms-submit" type="submit" value="Add" name="header_icon_addbelow" /></td>
                <td><input  class="cms-submit" type="submit" value="Up" name="header_icon_moveup" /></td>
                <td><input  class="cms-submit" type="submit" value="Down" name="header_icon_movedown" /></form></td>';                                
                $out .= '</tr>';
            }                   
                  
         $out .= '<table>';         
         $out .= '</div>';         
         echo $out;                 
               
        // add new header icon
        $out = '';
        $out .= '<div style="margin-bottom:15px;margin-top:15px;">';
        $out .= '<form action="#header_icons" method="POST">';
        $out .= '
            <input style="width:180px;" type="text" name="filename" value="Icon file name" />
            <input class="cms-submit" type="submit" value="Add new header icon" name="header_icon_add" />';
        $out .= '</form>';
        $out .= '<br /><span class="cms-span-10">These icons are mapped to files in folder that is chosen in <em>Header Icons Set</em> section. You will find these folders under path [theme path]/img/icons/header</span>';
        echo $out;               
                                                                        
         // logo
         echo '<a name="logo"></a>';                  
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Logo settings</h6><hr class="cms-hr"/>';
         echo '<form action="#logo" method="post" >';                                                                                                                                        
         echo '<input type="text" style="width:60px;" name="logo_width" value="'.$this->_general['logo_width'].'" /> Logo width in pixels <br />';
         echo '<input type="text" style="width:60px;" name="logo_height" value="'.$this->_general['logo_height'].'" /> Logo height in pixels <br />';
         echo '<input type="text" style="width:60px;" name="logo_x" value="'.$this->_general['logo_x'].'" /> Logo X position in pixels from left<br />';
         echo '<input type="text" style="width:60px;" name="logo_y" value="'.$this->_general['logo_y'].'" /> Logo Y postion in pixels from top<br /><br />'; 

         echo '<input type="text" style="width:600px;" id="logo_path" name="logo_path" value="'.$this->_general['logo_path'].'" /> ';
         echo '<input class="cms-upload upload_image_button" type="button" value="Upload Image" name="logo_path" /> <br />';
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_logo" /><br />';         
         echo '</div>';                           
         echo '</form></div>'; 
                            
         // sidebars settings
         echo '<a name="sidebars"></a>';
         echo '<div style="margin-top:50px;">'; 
         echo '<h6 class="cms-h6">Sidebars</h6><hr class="cms-hr" />';
         echo '<form action="#sidebars" method="post" >
         <input type="text" style="width:240px;" name="name" value="Custom sidebar name" />
         <input class="cms-submit" type="submit" style="width:200px;" value="Add new sidebar" name="general_add_sidebar" /></form>';
         
         echo '<form action="#sidebars" method="post">';
         echo $this->printSidebarsList(240, 'default_sidebar', $this->_general['default_sidebar']);
         echo ' <input class="cms-submit" type="submit" style="width:200px;" value="Set as default sidebar" name="general_default_sidebar" />';
         echo '</form>';
         
         $count = count($this->_sidebars);
         if($count > 0)
         {         
            echo '<div style="margin-top:20px;">';
            echo '<h6 class="cms-h6s">Sidebars list:</h6>';  
            
            for($i = 0; $i < $count; $i++)
            {
                echo '<form action="#sidebars" method="post">';
                echo '<input type="hidden" value="'.$i.'" name="index" />';
                echo '<input type="text" style="width:300px;" name="name" value="'.$this->_sidebars[$i]->_name.'" /> ';
                echo '<input type="submit" class="cms-submit" name="general_save_sidebar" value="Save" /> ';
                echo '<input type="submit" onclick="return confirm('."'Delete this sidebar?'".')" class="cms-submit-delete" value="Delete" name="general_delete_sidebar" />';
                echo '</form>';
            } // for       
            
            echo '</div>';
         }  
         
         $out = '<div style="height:20px;"></div>';
         $out .= '<form action="#sidebars" method="post">';
         $out .= '<input type="checkbox" name="sidebar_float_right" '.($this->_general['sidebar_float_right'] ? 'checked="checked"' : '').' /> Place sidebar on right side';
         $out .= '<div style="height:20px;"></div>';
         $out .= '<input type="submit" class="cms-submit" value="Save" name="general_sidebar_settings" />';
         $out .= '</form></div>';
         echo $out;               
         
         // blog settings
         echo '<a name="blog"></a>';
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Blog/News/Projects settings</h6><hr class="cms-hr"/>';
         echo '<form action="#blog" method="post" >';                                                                                                                                        
         echo '<input type="checkbox" '.($this->_general['show_post_author'] ? ' checked="checked" ' : '').' name="show_post_author" /> Show information about post author <br />';
         echo '<input type="checkbox" '.($this->_general['show_news_author'] ? ' checked="checked" ' : '').' name="show_news_author" /> Show information about news author <br />';
         echo '<input type="checkbox" '.($this->_general['show_project_author'] ? ' checked="checked" ' : '').' name="show_project_author" /> Show information about project author <br />'; 
         echo '<input type="checkbox" '.($this->_general['show_no_tags'] ? ' checked="checked" ' : '').' name="show_no_tags" /> Show information about no tags defined for post <br />'; 
         echo '<input type="checkbox" '.($this->_general['blog_show_all_pages_navigation'] ? ' checked="checked" ' : '').' name="blog_show_all_pages_navigation" /> Show all pages on pages navigation bar (all page numbers are always displayed for pagination) <br /><br />'; 
         
         
         
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_no_comments'].'" name="blog_no_comments" /> \'No comments\' text <br />';
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_one_comment'].'" name="blog_one_comment" /> \'One comment\' text<br />';
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_more_comments'].'" name="blog_more_comments" /> \'% comments\' text<br /> ';
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_submit_button_name'].'" name="blog_submit_button_name" /> Submit comment button name<br />';
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_leave_comment_text'].'" name="blog_leave_comment_text" /> Leave comment text <br /> ';
         echo '<input type="text" style="width:240px;" value="'.$this->_general['blog_comment_time_format'].'" name="blog_comment_time_format" /> Comment time format e.g. \'F j, Y g:i a\'<br /><br /> ';         
         
         
         echo '<span class="cms-span-10">Choose sidebar for blog posts:</span><br />';                                                                              
         echo $this->printSidebarsList(240, 'blog_sidebar', $this->_general['blog_sidebar']);          
         echo '<br />';
         echo '<span class="cms-span-10">Choose sidebar for news posts:</span><br />';                                                                              
         echo $this->printSidebarsList(240, 'news_sidebar', $this->_general['news_sidebar']); 
         echo '<br />';
         echo '<span class="cms-span-10">Choose sidebar for project posts:</span><br />';                                                                              
         echo $this->printSidebarsList(240, 'project_sidebar', $this->_general['project_sidebar']);          
         echo '<br /><br />';
         
         echo '<input type="text" style="width:60px;text-align:center;" value="'.$this->_general['news_archive_moths_count'].'" name="news_archive_moths_count" /> Number of months displayed in news archive (from 1 to 24)<br /><br /> ';
         
         
         $count = count($this->_general['blog_excluded_categories']);
         echo 'Excluded categories (count: '.$count.'):<br />';
         $categories = get_categories();
         echo '<select name="blog_excluded_categories[]" multiple="multiple" style="height:180px;min-width:240px;">';

         foreach($categories as $cat)
         {                        
             $out  = '<option ';
             $out .= ' value="'.$cat->cat_ID.'" ';
             $out .= (in_array($cat->cat_ID, $this->_general['blog_excluded_categories'])) ? ' selected="selected" ' : '';
             $out .= '>';
             $out .= $cat->name.' (ID:'.$cat->cat_ID.')';
             $out .= '</option>';
             echo $out;
         } 
         
        echo '</select><br /><span style="font-size:10px;color:#AAAAAA;">Ctrl+Mouse</span><br />';
        //echo '<input type="checkbox" '.($this->_general['blog_exclude_from_recent_posts_widget'] ? ' checked="checked" ' : '').' name="blog_exclude_from_recent_posts_widget" /> Exclude posts in excluded categories from recent posts widget<br />';
                 

         
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_blog" /><br />';         
         echo '</div>';
         
         echo '</form></div>';


         // post community icons
         $out = '';
         $out .= '<a name="post-community-icons"></a>';   
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Post community icons</h6><hr class="cms-hr"/>';
         $out .= '<form action="#post-community-icons" method="post" >';                                                                                                                                                                         
         
            $out .= '<table>';        
            $out .= '<thead>
                    <tr>
                        <th style="padding:0px 3px 0px 3px;text-align:left;">Icon</th>
                        <th style="padding:0px 3px 0px 3px;">Show</th>
                        <th style="padding:0px 3px 0px 3px;">URL</th>                    
                    </tr>
                  </thead>';
                  
                  // twitter
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">Twitter</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_twitter_show" '.($this->_general['post_ci_twitter_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_twitter_url" value="'.$this->_general['post_ci_twitter_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_twitter" /></td>';
                  $out .= '</tr>';

                  // facebook
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">Facebook</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_facebook_show" '.($this->_general['post_ci_facebook_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_facebook_url" value="'.$this->_general['post_ci_facebook_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_facebook" /></td>';
                  $out .= '</tr>';

                  // linkedin
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">LinkedIn</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_linkedin_show" '.($this->_general['post_ci_linkedin_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_linkedin_url" value="'.$this->_general['post_ci_linkedin_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_linkedin" /></td>'; 
                  $out .= '</tr>';
                  
                  // digg
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">Digg</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_digg_show" '.($this->_general['post_ci_digg_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_digg_url" value="'.$this->_general['post_ci_digg_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_digg" /></td>'; 
                  $out .= '</tr>';                  

                  // dellicious
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">Dellicious</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_dellicious_show" '.($this->_general['post_ci_dellicious_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_dellicious_url" value="'.$this->_general['post_ci_dellicious_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_dellicious" /></td>'; 
                  $out .= '</tr>'; 

                  // myspace
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">MySpace</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_myspace_show" '.($this->_general['post_ci_myspace_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_myspace_url" value="'.$this->_general['post_ci_myspace_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_myspace" /></td>'; 
                  $out .= '</tr>'; 

                  // reddit
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">Reddit</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_reddit_show" '.($this->_general['post_ci_reddit_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_reddit_url" value="'.$this->_general['post_ci_reddit_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_reddit" /></td>'; 
                  $out .= '</tr>'; 

                  // stumbleupon
                  $out .= '<tr>';
                    $out .= '<td style="text-align:left;font-size:11px;">StumbleUpon</td>';
                    $out .= '<td style="text-align:center;"><input type="checkbox" name="post_ci_stumbleupon_show" '.($this->_general['post_ci_stumbleupon_show'] ? ' checked="checked" ' : '').' /></td>';
                    $out .= '<td style="text-align:center;"><input style="width:600px;" type="text" name="post_ci_stumbleupon_url" value="'.$this->_general['post_ci_stumbleupon_url'].'" /></td>';
                    $out .= '<td style="text-align:center;"><input class="cms-submit" type="submit" value="Restore" name="general_restore_ci_url_stumbleupon" /></td>'; 
                  $out .= '</tr>';
                  
           $out .= '</table><br />';         
         
           $out .= '<input type="checkbox" name="post_ci_show_for_posts" '.($this->_general['post_ci_show_for_posts'] ? ' checked="checked" ' : '').' /> Show community icons for posts<br />';
           $out .= '<input type="checkbox" name="post_ci_show_for_news" '.($this->_general['post_ci_show_for_news'] ? ' checked="checked" ' : '').' /> Show community icons for news<br />';
           $out .= '<input type="checkbox" name="post_ci_show_for_projects" '.($this->_general['post_ci_show_for_projects'] ? ' checked="checked" ' : '').' /> Show community icons for projects<br />';
         
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_post_community_icons" /><br />';                  
         $out .= '</div>';         
         $out .= '</form></div>';         
         echo $out;
           
         // portfolio settings
         echo '<a name="portfolio"></a>';   
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Portfolio settings (post based)</h6><hr class="cms-hr"/>';
         echo '<form action="#portfolio" method="post" >';                                                                                                                                        
         echo '<input type="checkbox" '.($this->_general['portfolio_video_icon'] ? ' checked="checked" ' : '').' name="portfolio_video_icon" /> Show video icon on item when video is embeded <br /><br />';         
         
         echo '<input type="text" style="width:40px;text-align:center;" value="'.$this->_general['portfolio_page_size'].'" name="portfolio_page_size" /> Number of items displayed on one portfolio page';         
         
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_portfolio" /><br />';         
         echo '</div>';
         
         echo '</form></div>';
         

         // portfolio project settings
         $out = '';
         $out .= '<a name="portfolio_project"></a>';   
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Portfolio category page settings (project based)</h6><hr class="cms-hr"/>';
         $out .= '<form action="#portfolio_project" method="post" >';                                                                                                                                        
            
        $port_modes = Array(
                CPMetaPageProjectsDisplayMode::MODE_COLUMN_ONE => 'One Column',
                CPMetaPageProjectsDisplayMode::MODE_COLUMN_TWO => 'Two Columns',
                CPMetaPageProjectsDisplayMode::MODE_COLUMN_THREE => 'Three Column',
                CPMetaPageProjectsDisplayMode::MODE_COLUMN_FOUR => 'Four Column', 
                CPMetaPageProjectsDisplayMode::MODE_SLIDER => 'Slider'        
            );            
                
        $out .= '<select style="width:300px;" name="port_proj_mode">';
        foreach($port_modes as $key => $name)
        {
            $out .= '<option ';
            $out .= ' value="'.$key.'" ';
            $out .= $this->_general['port_proj_mode'] == $key ? ' selected="selected" ' : '';
            $out .= '>'.$name;
            $out .= '</option>';
        }
        $out .= '</select><br /><br />';                
        
        $out .= '<span class="cms-span-10">Number of items rows to display on one page (minimum value: 1) - this works only for projects category display:</span><br />';                 
        $out .= '<input type="text" style="width:40px;text-align:center;" value="'.$this->_general['port_proj_rows_count'].'" name="port_proj_rows_count" />';                   
                                             
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_portfolio_project" /><br />';         
         $out .= '</div>';
         
         $out .= '</form></div>';          
         echo $out; 
                             
         // voting system 
         echo '<a name="voting-system"></a>'; 
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">DC Voting System</h6><hr class="cms-hr"/>';
         echo '<form action="#voting-system" method="post" >';                                                                                                                                        
         echo '<input type="checkbox" '.($this->_general['voting_post_enable'] ? ' checked="checked" ' : '').' name="voting_post_enable" /> Enable voting for posts <br />'; 
         echo '<input type="checkbox" '.($this->_general['voting_news_enable'] ? ' checked="checked" ' : '').' name="voting_news_enable" /> Enable voting for news <br />';
         echo '<input type="checkbox" '.($this->_general['voting_project_enable'] ? ' checked="checked" ' : '').' name="voting_project_enable" /> Enable voting for projects <br />';         
         echo '<input type="checkbox" '.($this->_general['voting_blog_pages_enable'] ? ' checked="checked" ' : '').' name="voting_blog_pages_enable" /> Show voting on blog pages (including: data, category, author, tag pages) <br />';
         
         echo '<input type="checkbox" '.($this->_general['voting_comment_enable'] ? ' checked="checked" ' : '').' name="voting_comment_enable" /> Enable voting for comments <br />';
         echo '<input type="checkbox" '.($this->_general['voting_show_top_comment'] ? ' checked="checked" ' : '').' name="voting_show_top_comment" /> Show top voted comment as featured comment <br /><br />';
         
         echo '<input type="text" style="width:40px;text-align:center;" value="'.$this->_general['voting_stars_num'].'" name="voting_stars_num" /> Number of start displayed for voting (min. 2, max. 10) <span class="cms-span-10">changes will delete all votes</span>';          
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_voting" /><br />';         
         echo '</div>';                           
         echo '</form></div>';  
         
         // announcement bar
         $out = '';
         $out .= '<a name="annbar"></a>';
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Announcement bar</h6><hr class="cms-hr"/>';
         $out .= '<form action="#annbar" method="post" >';
         $out .= '<span class="cms-span-10">Content:</span><br />';                                                                                                                                        
         $out .= '<textarea style="font-size:11px;padding:8px;width:600px;max-width:600px;height:220px;color:#444444;" name="annbar_content" >'.stripcslashes($this->_general['annbar_content']).'</textarea><br />';         
         $out .= '<input type="text" style="width:40px;text-align:center;" value="'.$this->_general['annbar_height'].'" name="annbar_height" /> Bar height in pixels<br />'; 
         $out .= '<input type="checkbox" '.($this->_general['annbar_show'] ? ' checked="checked" ' : '').' name="annbar_show" /> Display announcement bar <br />';
         $out .= '<input type="checkbox" '.($this->_general['annbar_transparent'] ? ' checked="checked" ' : '').' name="annbar_transparent" /> Transparent color '; 
         $out .= '<div style="margin-top:20px;"></div>';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_annbar" /><br />';                                   
         $out .= '</form></div>';            
         echo $out;

         
         // header tracking code
         echo '<a name="header-track"></a>';  
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Header tracking code</h6><hr class="cms-hr"/>';
         echo '<form action="#header-track" method="post" >';                                                                                                                                        
         echo '<textarea style="font-size:11px;padding:8px;width:600px;max-width:600px;height:120px;color:#444444;" name="header_tracking_code" >'.stripcslashes($this->_general['header_tracking_code']).'</textarea><br />';         
         echo '<input type="checkbox" '.($this->_general['header_tracking_code_disable'] ? ' checked="checked" ' : '').' name="header_tracking_code_disable" /> Disable tracking code '; 
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_header_tracking" /><br />';         
         echo '</div></form></div>';                                   
         
         
         // footer tracking code 
         echo '<a name="footer-track"></a>'; 
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Footer tracking code</h6><hr class="cms-hr"/>';
         echo '<form action="#footer-track" method="post" >';                                                                                                                                        
         echo '<textarea style="font-size:11px;padding:8px;width:600px;max-width:600px;height:120px;color:#444444;" name="tracking_code" >'.stripcslashes($this->_general['tracking_code']).'</textarea><br />';         
         echo '<input type="checkbox" '.($this->_general['tracking_code_disable'] ? ' checked="checked" ' : '').' name="tracking_code_disable" /> Disable tracking code '; 
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_footer_tracking" /><br />';         
         echo '</div>';                           
         echo '</form></div>'; 

         // contact
         echo '<a name="contact"></a>';
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Contact page</h6><hr class="cms-hr"/>';
         echo '<form action="#contact" method="post" >';                                                                                                                                        
         echo '<input type="text" style="width:400px;" name="contact_email" value="'.$this->_general['contact_email'].'" /> Contact email <br />';
         echo '<input type="text" style="width:400px;" name="contact_send_okay" value="'.stripcslashes($this->_general['contact_send_okay']).'" /> Text if the message has been succesful send <br />';
         echo '<input type="text" style="width:400px;" name="contact_send_error" value="'.stripcslashes($this->_general['contact_send_error']).'" /> Text if the message wasn\'t sent <br />';
         echo '<input type="text" style="width:400px;" name="contact_sid_send_okay" value="'.stripcslashes($this->_general['contact_sid_send_okay']).'" /> Text if the message has been succesful sent <span class="cms-span-10">(sidebar)</span><br />';
         echo '<input type="text" style="width:400px;" name="contact_sid_send_error" value="'.stripcslashes($this->_general['contact_sid_send_error']).'" /> Text if the message wasn\'t sent <span class="cms-span-10">(sidebar)</span><br />';
         echo '<input type="text" style="width:400px;" name="contact_send_button_name" value="'.$this->_general['contact_send_button_name'].'" /> Send message button name <br />';         
         
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_contact" /><br />';         
         echo '</div>';                           
         echo '</form></div>';    
         
         
         // search page
         echo '<a name="search"></a>';
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Search page</h6><hr class="cms-hr"/>';                 
         
         echo '<form action="#search" method="post" >';                                                                                                                                        
         echo '<input type="text" style="width:400px;" name="search_no_results" value="'.stripcslashes($this->_general['search_no_results']).'" /> Text displayed when there are no search results <br />';
         echo '<input type="text" style="width:400px;" name="search_before_fragment" value="'.stripcslashes($this->_general['search_before_fragment']).'" /> Text displayed on page title before searched fragment <br />';
         echo $this->printSidebarsList(400, 'search_sidebar', $this->_general['search_sidebar']);
         echo ' Select search page sidebar <br />';
         echo '<div style="height:10px;"></div>';
         echo '<input type="checkbox" '.($this->_general['search_in_posts'] ? ' checked="checked" ' : '').' name="search_in_posts" /> Search in posts<br />'; 
         echo '<input type="checkbox" '.($this->_general['search_in_pages'] ? ' checked="checked" ' : '').' name="search_in_pages" /> Search in pages<br />';
         echo '<input type="checkbox" '.($this->_general['search_in_news'] ? ' checked="checked" ' : '').' name="search_in_news" /> Search in news<br />'; 
         echo '<input type="checkbox" '.($this->_general['search_in_projects'] ? ' checked="checked" ' : '').' name="search_in_projects" /> Search in projects<br />';
         echo '<input type="checkbox" '.($this->_general['search_show_search_ctrl'] ? ' checked="checked" ' : '').' name="search_show_search_ctrl" /> Show search control on search page<br />';                           
         echo '<input type="checkbox" '.($this->_general['search_show_images'] ? ' checked="checked" ' : '').' name="search_show_images" /> Show images for posts and projects<br />';
           
         echo '<div style="height:10px;"></div>'; 
         echo '<input type="text" style="width:40px;text-align:center;" value="'.$this->_general['search_page_size'].'" name="search_page_size" /> Number of search results displayed on one page';         
          
         
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_search" /><br />';         
         echo '</div>';                           
         echo '</form></div>';            
         
         // page 404
         echo '<a name="page404"></a>';
         echo '<div style="margin-top:50px;">';         
         echo '<h6 class="cms-h6">Page 404</h6><hr class="cms-hr"/>';
         echo '<form action="#page404" method="post" >';                                                                                                                                        
         echo '<input type="text" style="width:400px;" name="404_title" value="'.stripcslashes($this->_general['404_title']).'" /> 404 page title <br /><br />';
         echo '404 page text:<br /> <textarea style="font-size:11px;padding:8px;color:#444444;width:400px;max-width:400px;height:80px;" name="404_text" >'.stripcslashes($this->_general['404_text']).'</textarea> ';
         echo '<div style="margin-top:20px;">';
         echo '<input class="cms-submit" type="submit" value="Save" name="general_save_404" /><br />';         
         echo '</div>';                           
         echo '</form></div>';
    
         
         // footer
         $out = '';
         $out .= '<a name="footer"></a>';
         $out .= '<div style="margin-top:50px;">';         
         $out .= '<h6 class="cms-h6">Footer</h6><hr class="cms-hr"/>';
         
         $out .= '<form action="#footer" method="post">';
         $out .= $this->printSidebarsList(240, 'footer_sidebar_a', $this->_general['footer_sidebar_a']);
         $out .= ' <input class="cms-submit" type="submit" style="width:200px;" value="Set footer first sidebar" name="general_save_footer_sidebar_a" />';
         $out .= '</form>';         
        
         $out .= '<form action="#footer" method="post">';
         $out .= $this->printSidebarsList(240, 'footer_sidebar_b', $this->_general['footer_sidebar_b']);
         $out .= ' <input class="cms-submit" type="submit" style="width:200px;" value="Set footer second sidebar" name="general_save_footer_sidebar_b" />';
         $out .= '</form>';  
         
         $out .= '<form action="#footer" method="post">';
         $out .= $this->printSidebarsList(240, 'footer_sidebar_c', $this->_general['footer_sidebar_c']);
         $out .= ' <input class="cms-submit" type="submit" style="width:200px;" value="Set footer third sidebar" name="general_save_footer_sidebar_c" />';
         $out .= '</form><br />';          
         
         $out .= '<form action="#footer" method="post" >';
         $out .= '<span class="cms-span-10">Footer logo image path:</span><br />';                                                                                                                                         
         $out .= '<input type="text" style="width:600px;" id="footer_logo_path" name="footer_logo_path" value="'.$this->_general['footer_logo_path'].'" /> ';
         $out .= '<input class="cms-upload upload_image_button" type="button" value="Upload Image" name="footer_logo_path" /> <br />';
         $out .= '<input type="checkbox" name="footer_show_logo" '.($this->_general['footer_show_logo'] ? ' checked="checked" ' : '').' /> Show footer logo<br /><br />';
         
         $out .= '<span class="cms-span-10">Copyright text:</span><br />'; 
         $out .= '<input type="text" style="width:600px;" name="footer_copy" value="'.stripcslashes($this->_general['footer_copy']).'" /><br />';
         $out .= '<input type="checkbox" name="footer_show_copy" '.($this->_general['footer_show_copy'] ? ' checked="checked" ' : '').' /> Show footer copyright text<br />';
         $out .= '<input type="checkbox" name="footer_show_line" '.($this->_general['footer_show_line'] ? ' checked="checked" ' : '').' /> Show graphic line<br /><br />';  
                                             
         $out .= '<input type="checkbox" name="footer_show_links" '.($this->_general['footer_show_links'] ? ' checked="checked" ' : '').' /> Show footer links<br />';
         $out .= '<input type="checkbox" name="footer_show_widgetized" '.($this->_general['footer_show_widgetized'] ? ' checked="checked" ' : '').' /> Show widgetized footer<br />'; 
         
         $out .= '<div style="margin-top:20px;">';
         $out .= '<input class="cms-submit" type="submit" value="Save" name="general_save_footer" /><br />';         
         $out .= '</div>';                           
         $out .= '</form></div>';       
         echo $out;
                                   
    }        
} // class CPGeneral
        
        
?>
