<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      header.php
* Brief:       
*      Header and navigation code for all theme files
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com  
***********************************************************************/  
?><?php
   ob_start();                          
?>  
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" <?php language_attributes(); ?> >
                        
    <!-- HEAD --> 
    <head>
        <meta name="author" content="DigitalCavalry" />
        <meta name="language" content="english" />                     
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <?php  
            if(!GetDCCPInterface()->getIGeneral()->hideWordPressVer())
            {
                echo '<meta name="generator" content="WordPress '.get_bloginfo('version').'" />'; 
            }
            $dccp = GetDCCPInterface()->printMeta();
        ?>             
        
        <title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
        <!-- ICON -->
        <link rel="icon" href="" type="image/x-icon" />        
        <!-- CSS (Cascading Style Sheets) Files -->
        <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/sh/shCore.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/sh/shThemeRDark.css" />                
        <!--<link type="text/css" rel="stylesheet" href="/css/slimbox/slimbox2.css" />-->
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/pphoto/prettyPhoto.css" />  
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/slider_prestige.css" /> 
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/slider_accordion.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/slider_progress.css" />   
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/slider_video.css" /> 
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/addPages.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/tipsy/tipsy.css" />
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/tipsy/tipsy-docs.css" />          
        <link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/common.css" />
                    
                                                                                                 
        <!-- JavaScript Files -->
        <?php 
            if(is_singular()) 
            {   
                wp_enqueue_script('comment-reply');
            }          
            wp_head();       
            GetDCCPInterface()->getIGeneral()->customCSS();
            GetDCCPInterface()->getIMenu()->customCSS();
            GetDCCPInterface()->getIGeneral()->sliderJavaScript();
                 
        ?>  
     
        <script language='javascript'>
        SyntaxHighlighter.config.stripBrs = true;
        SyntaxHighlighter.all();
        </script>      
        <?php GetDCCPInterface()->getIGeneral()->printHeaderTrackingCode(); ?>     
                                    
    </head>
    

    <body>
    
    <?php GetDCCPInterface()->getIGeneral()->renderAnnouncementBar(); ?>
    
    <!-- HEADER CONTAINER & MENU -->
    <?php 
        if(GetDCCPInterface()->getIGeneral()->showClientPanel())
        {
            GetDCCPInterface()->getIClientPanel()->renderPanel();
        }
    ?> 
    
    <div id="login-popup">
        <form action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
            <div class="close"></div>
            <p class="label">Username:</p>
            <input type="text" value="Username" name="log" />
            <p class="label">Password:</p>
            <input type="password" value="Password" name="pwd" />
            <input type="submit" class="send-btn" value="Login" />
            <div class="clear-both"></div>
            <a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword">Fargot Password?</a> / <a href="#" class="help">Help</a>
        </form>
    </div>    
            
    <div id="header-container">
<br>
<div style="text-indent: 730px;"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FTheHellenicCenter&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=228624557176745" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe></div>

        <div id="header-search-popup">
            <form action="<?php bloginfo('url'); ?>" method="get"> 
                <input type="text" value="<?php $search_query = (get_query_var( 's' )) ? get_query_var( 's' ) : 'Search..'; echo $search_query; ?>" name="s" />
            </form>    
        </div> 
 
        <a id="header-search-btn"><img class="unitPng" src="<?php bloginfo('template_url'); ?>/img/common_files/search.png" /></a>
    
        <a name="top-anchor"></a>
        <a class="logo" href="<?php echo get_bloginfo('url'); ?>"></a>                 
                                          
        <?php 
            GetDCCPInterface()->getIGeneral()->renderHeaderIcons();
            GetDCCPInterface()->getIMenu()->renderMenu();
        ?>    
        
        
            <?php
                if(GetDCCPInterface()->getIGeneral()->showHeaderLogPanel())
                {
                    $out = '';
                    $out .= '<div id="header-login-panel">';
                    global $current_user;
                    get_currentuserinfo();

                    if($current_user->ID)
                    {
                        $out .= '<span>Logged in as</span> <span class="user">'.$current_user->display_name.'</span>';
                        $out .= ' &#47; <a href="'.get_bloginfo('url').'/wp-login.php?action=logout">Log Out</a>';    
                    } else
                    {
                       $out .= '<span class="sign-in" >Log In</span>';  
                    }
                    // $out .= '< / <a href="#" class="help">Register</a>';
                    $out .= '</div>';
                    echo $out;
                }                                               
            ?>            
                         
    </div> <!-- header-container -->
