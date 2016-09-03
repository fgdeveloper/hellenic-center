<?php

/* ======================================
   List Styles 
   ======================================*/
function imediapixel_checklist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	return remove_wpautop($content);	
}
add_shortcode('checklist', 'imediapixel_checklist');

function imediapixel_itemlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="itemlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('itemlist', 'imediapixel_itemlist');

function imediapixel_bulletlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="bulletlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('bulletlist', 'imediapixel_bulletlist');

function imediapixel_arrowlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="arrowlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('arrowlist', 'imediapixel_arrowlist');

function imediapixel_starlist( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="starlist">', do_shortcode($content));
	return remove_wpautop($content);
	
}
add_shortcode('starlist', 'imediapixel_starlist');

/* ======================================
   Messages Box
   ======================================*/
function imediapixel_warningbox( $atts, $content = null ) {
   return '<div class="warning">' . do_shortcode($content) . '</div>';
}
add_shortcode('warning', 'imediapixel_warningbox');


function imediapixel_infobox( $atts, $content = null ) {
   return '<div class="info">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'imediapixel_infobox');

function imediapixel_successbox( $atts, $content = null ) {
   return '<div class="success">' . do_shortcode($content) . '</div>';
}
add_shortcode('success', 'imediapixel_successbox');

function imediapixel_errorbox( $atts, $content = null ) {
   return '<div class="error">' . do_shortcode($content) . '</div>';
}
add_shortcode('error', 'imediapixel_errorbox');

/* ======================================
   Pullquote
   ======================================*/

function imediapixel_pullquote_right( $atts, $content = null ) {
   return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_right', 'imediapixel_pullquote_right');


function imediapixel_pullquote_left( $atts, $content = null ) {
   return '<span class="pullquote_left">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_left', 'imediapixel_pullquote_left');

function imediapixel_quotebox( $atts, $content = null ) {
  return '<div class="content_quotebox"><h3>'.do_shortcode($content).'</h3></div>';
}
add_shortcode('quotebox', 'imediapixel_quotebox');


/* ======================================
   Dropcap
   ======================================*/
function imediapixel_drop_cap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'imediapixel_drop_cap');

/* ======================================
   Spacer
   ======================================*/
function imediapixel_spacer( $atts, $content = null ) {
   return '<div class="spacer"></div>';
}
add_shortcode('spacer', 'imediapixel_spacer');


/* ======================================
   Highlight
   ======================================*/
function imediapixel_highlight_yellow( $atts, $content = null ) {
   return '<span class="highlight-yellow">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_yellow', 'imediapixel_highlight_yellow');

function imediapixel_highlight_dark( $atts, $content = null ) {
   return '<span class="highlight-dark">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_dark', 'imediapixel_highlight_dark');

function imediapixel_highlight_green( $atts, $content = null ) {
   return '<span class="highlight-green">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_green', 'imediapixel_highlight_green');

function imediapixel_highlight_red( $atts, $content = null ) {
   return '<span class="highlight-red">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight_red', 'imediapixel_highlight_red');

/* ======================================
   Columns
   ======================================*/
function imediapixel_col_12( $atts, $content = null ) {
   return '<div class="col_12">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_12', 'imediapixel_col_12');

function imediapixel_col_12_last( $atts, $content = null ) {
   return '<div class="col_12_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_12_last', 'imediapixel_col_12_last');

function imediapixel_col_13( $atts, $content = null ) {
   return '<div class="col_13">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_13', 'imediapixel_col_13');

function imediapixel_col_13_last( $atts, $content = null ) {
   return '<div class="col_13_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_13_last', 'imediapixel_col_13_last');

function imediapixel_col_14( $atts, $content = null ) {
   return '<div class="col_14">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14', 'imediapixel_col_14');

function imediapixel_col_14_last( $atts, $content = null ) {
   return '<div class="col_14_last">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14_last', 'imediapixel_col_14_last');

function imediapixel_col_23( $atts, $content = null ) {
   return '<div class="col_23">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_23', 'imediapixel_col_23');

function imediapixel_col_34($atts, $content = null ) {
   return '<div class="col_34">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_34', 'imediapixel_col_34');

/* ======================================
   Inner Columns
   ======================================*/
function imediapixel_col_12_inner( $atts, $content = null ) {
   return '<div class="col_12_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_12_inner', 'imediapixel_col_12_inner');

function imediapixel_col_12_inner_last( $atts, $content = null ) {
   return '<div class="col_12_inner_last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_12_inner_last', 'imediapixel_col_12_inner_last');

function imediapixel_col_13_inner( $atts, $content = null ) {
   return '<div class="col_13_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_13_inner', 'imediapixel_col_13_inner');

function imediapixel_col_13_inner_last( $atts, $content = null ) {
   return '<div class="col_13_inner_last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_13_inner_last', 'imediapixel_col_13_inner_last');

function imediapixel_col_14_inner( $atts, $content = null ) {
   return '<div class="col_14_inner">' . do_shortcode($content) . '</div>';
}
add_shortcode('col_14_inner', 'imediapixel_col_14_inner');

function imediapixel_col_24_inner( $atts, $content = null ) {
   return '<div class="col_24_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_24_inner', 'imediapixel_col_24_inner');

function imediapixel_col_14_inner_last( $atts, $content = null ) {
   return '<div class="col_14_inner_last">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_14_inner_last', 'imediapixel_col_14_inner_last');

function imediapixel_col_23_inner( $atts, $content = null ) {
   return '<div class="col_23_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_23_inner', 'imediapixel_col_23_inner');

function imediapixel_col_34_inner($atts, $content = null ) {
   return '<div class="col_34_inner">' . remove_wpautop($content) . '</div>';
}
add_shortcode('col_34_inner', 'imediapixel_col_34_inner');

/* ======================================
   Buttons 
   ======================================*/
function imediapixel_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
    ), $atts));

	$out = "<a class=\"button\" href=\"" .$link. "\"><span>" .do_shortcode($content). "</span></a>";
    
    return $out;
}
add_shortcode('button', 'imediapixel_button');

/* ======================================
   Video
   ======================================*/
#### Vimeo eg http://vimeo.com/5363880 id="5363880"
function vimeo_code($atts,$content = null){

	extract(shortcode_atts(array(  
		"id" 		=> '',
		"width"		=> '', 
		"height" 	=> ''
	), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com&amp;autoplay=0&amps;loop=0' type='application/x-shockwave-flash'>
			<param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://vimeo.com/moogaloop.swf?clip_id=$id&amp;server=vimeo.com' />
		</object>";
	return $data;
} 
add_shortcode("vimeo_video", "vimeo_code"); 

#### YouTube eg http://www.youtube.com/v/MWYi4_COZMU&hl=en&fs=1& id="MWYi4_COZMU&hl=en&fs=1&"
function youTube_code($atts,$content = null){

	extract(shortcode_atts(array(  
      "id" 		=> '',
  		"width"		=> '', 
  		"height" 	=> ''
		 ), $atts)); 
	 
	$data = "<object width='$width' height='$height' data='http://www.youtube.com/v/$id' type='application/x-shockwave-flash'>			
      <param name='allowfullscreen' value='true' />
			<param name='allowscriptaccess' value='always' />
			<param name='FlashVars' value='playerMode=embedded' />
			<param name='wmode' value='opaque'>
			<param name='movie' value='http://www.youtube.com/v/$id' />
		</object>";
	return $data;
} 
add_shortcode("youtube_video", "youTube_code");

/* ======================================
   Custom Slideshow
   ======================================*/
function imediapixel_custom_slideshow($atts,$content = null) {
  global $post;
  
	extract(shortcode_atts(array(
      "type" => '',
      "category" 	=> '',  
  		"num" 	=> '',
  		"width" 	=> '',
  		"height" 	=> '',
  		"transition" => '',
  		"speed" => ''
		 ), $atts)); 
  
  $id = rand(100,1000);
  $img_width = ($width) ? $width : 620;
  $img_height = ($height) ? $height : 313;
  $effect_transition = ($transition) ? $transition : "random";
  $speed_transition = ($speed) ? $speed : 4000;
  $category_id = get_cat_ID($category);
  
  $out = '<div id="custom_nivoslider" class="nivo_custom_'.$id.'" style="width:'.$img_width.'px;height:'.$img_height.'px;">';
    query_posts(array( 'post_type' => $type,'cat' =>$category_id,'showposts' => $num,'orderby'=>'date'));
    if (have_posts()) :
      while (have_posts() ) : the_post();
        $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
        $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
        $pf_preview = ($pf_link) ? $pf_link : thumb_url();
        $slide_permalink = htmlspecialchars("<a href=".get_permalink().'>'.get_the_title()."</a>");
            
        $out .= '<img src="'.get_bloginfo('template_directory').'/timthumb.php?src='.thumb_url().'&amp;h='.$img_height.'&amp;w='.$img_width.'&amp;zc=1" title="'.$slide_permalink.'" />';
        
      endwhile;endif;
      wp_reset_query();
  $out .= '</div><style type="text/css">.nivo-caption {width:'.$img_width.'px};</style>';
  $out .= '<script type="text/javascript">';
  $out .= "  jQuery(document).ready(function($) {	 
    $('.nivo_custom_".$id."').nivoSlider({
      directionNavHide:true,
      controlNav:false,
      effect: '".$effect_transition."',
      animSpeed:500, 
      pauseTime:".$speed_transition."
    }); 
    });";
  $out .= '</script>';
  
  return  $out;  
}
add_shortcode("slideshow", "imediapixel_custom_slideshow");


/* ======================================
   Child pages list base on parent page
   ======================================*/
function imediapixel_pagelist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "parent_page" => '',
    "num" => '',
    "orderby" => '',
    "style" => '',
    "readmore_text"
  ),$atts));
  
  if ($style == "") $style = "3col";
  if ($orderby == "") $orderby = "date";
  if ($readmore_text == "") $readmore_text = "VIEW DETAIL";
   
  return imediapixel_pagelist($parent_page,$num,$orderby,$style,$readmore_text);
}

add_shortcode('pagelist','imediapixel_pagelist_shortcode');

/* ======================================
   Post list base on category
   ======================================*/
function imediapixel_postlist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "category" => '',
    "num" => '',
    "orderby" => '',
    "style" => '',
    "readmore_text"
  ),$atts));
  
  if ($style == "") $style = "2col";
  if ($orderby == "") $orderby = "date";
  if ($readmore_text == "") $readmore_text = "VIEW DETAIL";
  
  return imediapixel_postslist($category, $num, $orderby,$style,$readmore_text);
}

add_shortcode('postlist','imediapixel_postlist_shortcode');

/* ======================================
   Blog list base on category
   ======================================*/
function imediapixel_bloglist_shortcode($atts,$content=null) {
  global $post;
  
  extract(shortcode_atts(array(
    "cat" => '',
    "num" => '' 
  ),$atts));
  
  return imediapixel_bloglist($cat, $num);
}

add_shortcode('bloglist','imediapixel_bloglist_shortcode');



/* ======================================
   Google Map
   ======================================*/
function theme_shortcode_googlemap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		"width" => false,
		"height" => '400',
		"address" => '',
		"latitude" => 0,
		"longitude" => 0,
		"zoom" => 14,
		"html" => '',
		"popup" => 'false',
		"controls" => 'false',
		'pancontrol' => 'true',
		'zoomcontrol' => 'true',
		'maptypecontrol' => 'true',
		'scalecontrol' => 'true',
		'streetviewcontrol' => 'true',
		'overviewmapcontrol' => 'true',
		"scrollwheel" => 'true',
		'doubleclickzoom' =>'true',
		"maptype" => 'ROADMAP',
		"marker" => 'true',
		'align' => false,
	), $atts));
	
	if($width){
		if(is_numeric($width)){
			$width = $width.'px';
		}
		$width = 'width:'.$width.';';
	}else{
		$width = '';
		$align = false;
	}
	if($height){
		if(is_numeric($height)){
			$height = $height.'px';
		}
		$height = 'height:'.$height.';';
	}else{
		$height = '';
	}
	
	wp_print_scripts( 'jquery-gmap');
	
	/* fix */
	$search  = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
	$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'HYBRID', 'TERRAIN');
	$maptype = str_replace($search, $replace, $maptype);
	/* end fix */
	
	if($controls == 'true'){
		$controls = <<<HTML
{
	panControl: {$pancontrol},
	zoomControl: {$zoomcontrol},
	mapTypeControl: {$maptypecontrol},
	scaleControl: {$scalecontrol},
	streetViewControl: {$streetviewcontrol},
	overviewMapControl: {$overviewmapcontrol}
}
HTML;
	}
	
	$align = $align?' align'.$align:'';
	$id = rand(100,1000);
	if($marker != 'false'){
		return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery(this).gMap({
			zoom: {$zoom},
			markers:[{
				address: "{$address}",
				latitude: {$latitude},
				longitude: {$longitude},
				html: "{$html}",
				popup: {$popup}
			}],
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}else{
return <<<HTML
<div id="google_map_{$id}" class="google_map{$align}" style="{$width}{$height}"></div>
[raw]
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	var tabs = jQuery("#google_map_{$id}").parents('.tabs_container,.mini_tabs_container,.accordion');
	jQuery("#google_map_{$id}").bind('initGmap',function(){
		jQuery("#google_map_{$id}").gMap({
			zoom: {$zoom},
			latitude: {$latitude},
			longitude: {$longitude},
			address: "{$address}",
			controls: {$controls},
			maptype: '{$maptype}',
			doubleclickzoom:{$doubleclickzoom},
			scrollwheel:{$scrollwheel}
		});
		jQuery(this).data("gMapInited",true);
	}).data("gMapInited",false);
	if(tabs.size()!=0){
		tabs.find('ul.tabs,ul.mini_tabs,.accordion').data("tabs").onClick(function(index) {
			this.getCurrentPane().find('.google_map').each(function(){
				if(jQuery(this).data("gMapInited")==false){
					jQuery(this).trigger('initGmap');
				}
			});
		});
	}else{
		jQuery("#google_map_{$id}").trigger('initGmap');
	}
});
</script>
[/raw]
HTML;
	}
}

add_shortcode('gmap','theme_shortcode_googlemap');

function theme_shortcode_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false
	), $atts));
	return '<div class="toggle"><h5 class="toggle_title">' . $title . '</h5><div class="toggle_content"><p>' . do_shortcode(trim($content)) . '</p></div></div>';
}
add_shortcode('toggle', 'theme_shortcode_toggle');

/* Images */
function imediapixel_imagealignment( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'source'      => '#',
        'align' => '',
        'style' =>''
    ), $atts));
  
  switch ($align) {
    case "left" :
      $class="alignleft";
    break;
    case "right" :
      $class="alignright";
    break;
    case "center" :
      $class="aligncenter";
    break;
  }
  
  if ($style == "frame1") {
    $out .= '<div class="boximg box-left">';
    $out .= '<img class="boximg-pad" src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=84&amp;w=84&amp;zc=1" alt="">';
    $out .= '</div>';
  } else if ($style == "frame2") {    
    $out .= '<div class="portfolio-blockimg3"><div class="portfolio-imgbox3">';
    $out .= '<img class="boximg-pad" src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=86&amp;w=196&amp;zc=1" alt="">';
    $out .= '</div></div>';
  } else if ($style == "frame3") {
    $out .= '<div class="portfolio-blockimg2"><div class="portfolio-imgbox2">';
    $out .= '<img class="boximg-pad2" src="'.get_template_directory_uri().'/timthumb.php?src='.$source.'&amp;h=122&amp;w=270&amp;zc=1" alt="">';
    $out .= '</div></div>';
  } else {
    $out = "<img class=\"".$class." imgbox2\" src=\"" .$source. "\" alt=\"\">"; 
  }
    
  return remove_wpautop($out);
}
add_shortcode('image', 'imediapixel_imagealignment');

/* Tabs and Accordiaon */
function theme_shortcode_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<div class="tabs-wrapper"><ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div></div>';
		
		return '<div class="'.$code.'_container">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'theme_shortcode_tabs');
add_shortcode('mini_tabs', 'theme_shortcode_tabs');
?>