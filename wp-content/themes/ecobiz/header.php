<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo esc_html($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php $favico = get_option('ecobiz_custom_favicon');?>
<link rel="shortcut icon" href="<?php echo ($favico) ? $favico : get_template_directory_uri().'/images/favicon.ico';?>"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<!-- Javascript Start //-->
<?php
  $disable_cufon = get_option('ecobiz_disable_cufon');
  if ($disable_cufon != "true") { 
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/cufon.js"></script>
<?php $cufon_font = get_option('ecobiz_cufon_font'); if ($cufon_font == "") $cufon_font = "ColaborateLight.js";?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/fonts/<?php echo $cufon_font;?>"></script>
<script type="text/javascript">
  Cufon.replace('h1,h2,h3,h4,h5',{hover: 'true'})('#myslidemenu a',{hover: 'true'})('#myslidemenu li li a',{textShadow: '1px 1px #ffffff',hover: 'true'})('a.button', {hover: 'true'})('.nivo-caption p')('span.price')('span.month');
</script>
<?php } ?>
<!-- Javascript End //-->
<style type="text/css">
<?php
  $predefined_skins = get_option('ecobiz_predefined_skins');
  $custom_color = get_option('ecobiz_custom_color');  
  $body_text_color = get_option('ecobiz_body_text_color'); 
  $bgpattern = get_option('ecobiz_bg_pattern') ? get_option('ecobiz_bg_pattern') : "grid2.png";
  $custom_css = get_option('ecobiz_custom_css');
  $custom_body_text = get_option('ecobiz_custom_body_text');
  $permalinks_color = get_option('ecobiz_permalinks_color');
  $permalinks_hover_color = get_option('ecobiz_permalinks_hover_color');
  $sidebar_heading_color = get_option('ecobiz_sidebar_heading_color');
  
  if ($predefined_skins !="") {
    if ($predefined_skins == "#4681a2") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/blue.css");';
    } else if ($predefined_skins == "#E82F1E") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/red.css");';
    } else if ($predefined_skins == "#ff6c00") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/orange.css");';
    } else if ($predefined_skins == "#3d3d3d") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/dark.css");';
    } else if ($predefined_skins == "#b65529") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/brown.css");';
    }
  } 
  
  if ($custom_color != "") {
    echo 'body { background-color: '.$custom_color.';}';
  } 
  
  if ($bgpattern != "") {
    echo 'body {background-image: url('.get_template_directory_uri().'/images/pattern/'.$bgpattern.'); } ';
  }  
  
  if ($custom_body_text !== "") {
    echo 'body { font-family: '.$custom_body_text['face'].';}'; 
    echo 'p { color:'.$custom_body_text['color'].';font-size:'.$custom_body_text['size'].'px;font-style:'.$custom_body_text['style'].'}';
    echo 'ol li { color:'.$custom_body_text['color'].'}';
    echo '.arrowlist li { color:'.$custom_body_text['color'].'}';
    echo '.checklist li { color:'.$custom_body_text['color'].'}';
    echo '.bulletlist li { color:'.$custom_body_text['color'].'}';
    echo '.itemlist li { color:'.$custom_body_text['color'].'}';
  }
  
  if ($permalinks_color != "") {
    echo 'a,a:link,a:visited,.mainbox h4 a,.mainbox2 h4 a { color:'.$permalinks_color.';} a.button {color:#666666;}';
  }
  
  if ($permalinks_hover_color != "") {
    echo 'a:hover{ color:'.$permalinks_hover_color.';}, a.button:hover {color:#333333;}';
  }
  
  if ($sidebar_heading_color != "") {
     echo '.sidebarcontent h4 { color: '.$sidebar_heading_color.';}';
  }  
  
  if ($custom_css !="") {
    echo $custom_css;
  }
  
  $enable_bgimage = get_option('ecobiz_enable_bgimage');
  $bgimage = get_option('ecobiz_bgimage');
  $bgimage_position = get_option('ecobiz_bgimage_position');
  
  if ($enable_bgimage == "true") {
    if ($bgimage !="") {
      echo 'body {
        background-image: url('.$bgimage.');
        background-position:  '.$bgimage_position.';
        background-repeat: no-repeat;
        background-attachment: fixed;
      }';  
    }
  }
?>
</style>
</head>
<body <?php body_class(''); ?>>
  <div id="wrapper">
    <div id="topwrapper"></div>
    <div id="mainwrapper">
      <!-- Header Start -->
      <div id="header">
        <div class="center">
          <!-- Logo Start -->
          <div id="logo">
          <?php $logo = get_option('ecobiz_logo'); ?>
          <a href="<?php echo home_url();?>"><img src="<?php echo ($logo) ? $logo : get_template_directory_uri().'/images/logo.png';?>" alt="Logo"/></a>
          </div>
          <!-- Logo End -->
          
          <div id="headerright">
            <!-- Menu Navigation Start --> 
            <div id="mainmenu">
              <div id="myslidemenu" class="jqueryslidemenu">
                <?php 
                if (function_exists('wp_nav_menu')) { 
                  wp_nav_menu( array( 'menu_class' => '', 'theme_location' => 'topnav', 'fallback_cb'=>'imediapixel_topmenu_pages','depth' =>4 ) );
                } 
                ?>
              </div>
            </div>
            <!-- Menu Navigation End -->
          </div>
        </div>
      </div>
      <!-- Header End  -->