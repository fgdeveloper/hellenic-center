<?php 
/**
 * JavaScripts In Header
 */
function theme_enqueue_scripts() {
	if((is_admin() && !is_shortcode_preview()) ||'wp-login.php' == basename($_SERVER['PHP_SELF'])){
		return;
	}
	
	$move_bottom = theme_get_option('advance','move_bottom');
	
	//wp_deregister_script('jquery');
	//wp_register_script( 'jquery', THEME_JS .'/jquery-1.7.min.js',false, '1.7');
	wp_enqueue_script( 'jqueryslidemenu', THEME_JS .'/jqueryslidemenu.js', array('jquery'),false,$move_bottom);
	wp_enqueue_script( 'jquery-tools-tabs', THEME_JS .'/jquery.tools.tabs.min.js', array('jquery'),'1.2.6',$move_bottom);
	if( !theme_get_option('advance','no_colorbox') ){
		wp_enqueue_script( 'jquery-colorbox', THEME_JS .'/jquery.colorbox-min.js', array('jquery'),'1.3.19',$move_bottom);
	}
	wp_enqueue_script( 'swfobject', THEME_JS .'/swfobject.js', false,'2.2',$move_bottom);
	//wp_enqueue_script( 'videojs', THEME_JS .'/video.js', array('jquery'),'2.0.2',$move_bottom);
	if(theme_get_option('footer','stricky_footer')){
		wp_enqueue_script( 'jquery-stickyfooter', THEME_JS .'/jquery.stickyfooter.js', array('jquery'),'1.0',$move_bottom);
	}
	wp_enqueue_script( 'custom-js', THEME_JS .'/custom.js', array('jquery','jquery-tools-tabs','swfobject'),false,$move_bottom);
	
	wp_register_script( 'mediaelementjs-scripts', THEME_URI .'/mediaelement/mediaelement-and-player.min.js', array('jquery'),'2.9.1',$move_bottom);
	wp_register_script('jquery-nivo', THEME_JS . '/jquery.nivo.slider.pack.js', array('jquery'),'2.7.1',$move_bottom);
	wp_register_script('jquery-easing', THEME_JS . '/jquery.easing.1.3.js', array('jquery'),'1.3',$move_bottom);
	wp_register_script('jquery-kwicks', THEME_JS . '/jquery.kwicks-1.5.1.pack.js', array('jquery'),'1.5.1',$move_bottom);
	wp_register_script('jquery-anything', THEME_JS . '/jquery.anythingslider.min.js', array('jquery','jquery-easing'),'v1.8.5',$move_bottom);
	wp_register_script('jquery-anything-video', THEME_JS . '/jquery.anythingslider.video.min.js', array('jquery','swfobject'),'1.3.beta',$move_bottom);
	
	wp_register_script( 'cufon-yui', THEME_JS .'/cufon-yui.js', array('jquery'),'1.09i');
	wp_register_script( 'jquery-quicksand', THEME_JS .'/jquery.quicksand.js', array('jquery'),'1.2.2');
	wp_register_script( 'jquery-easing', THEME_JS . '/jquery.easing.1.3.js', array('jquery'),'1.3');
	wp_register_script( 'jquery-gmap', THEME_JS .'/jquery.gmap.min.js', array('jquery','google-map-api'),'2.1');
	wp_register_script( 'google-map-api', 'http://maps.google.com/maps/api/js?sensor=false');
	wp_register_script( 'jquery-tweet', THEME_JS .'/jquery.tweet.js', array('jquery'));
	wp_register_script( 'jquery-tools-validator', THEME_JS .'/jquery.tools.validator.min.js', array('jquery'),'1.2.5');
	if( is_front_page() || is_home() || is_single() || is_page() ){
		theme_generator('slideShowHeader');
	}
	
	if ( is_singular() ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_print_scripts', 'theme_enqueue_scripts');

function theme_enqueue_styles(){
	if((is_admin() && !is_shortcode_preview()) || 'wp-login.php' == basename($_SERVER['PHP_SELF'])){
		return;
	}
	//wp_enqueue_style('theme-style', THEME_URI.'/styles/styles.php', false, false, 'all');
	wp_register_style('mediaelementjs-styles', THEME_URI.'/mediaelement/mediaelementplayer.css', false, false, 'all');
	if(theme_get_option('advance','complex_class')){
		wp_enqueue_style('theme-style', THEME_CSS.'/screen_complex.css', false, false, 'all');
	}else{
		wp_enqueue_style('theme-style', THEME_CSS.'/screen.css', false, false, 'all');
	}
	
	if(is_multisite()){
		global $blog_id;
		wp_enqueue_style('theme-skin', THEME_CACHE_URI.'/skin_'.$blog_id.'.css', array('theme-style'), mktime(), 'all');
	}else{
		wp_enqueue_style('theme-skin', THEME_CACHE_URI.'/skin.css', array('theme-style'), mktime(), 'all');
	}
}
add_action('wp_print_styles', 'theme_enqueue_styles');

if(theme_get_option('cufon','enable_cufon')){
	function theme_add_cufon_script(){
		$fonts = theme_get_option('cufon','fonts');
		if(is_array($fonts)){
			foreach ($fonts as $font){
				if(is_array($font)){
					wp_register_script($font['file_name'], $font['url'], array('cufon-yui'));
					wp_print_scripts($font['file_name']);
				}else{
					wp_register_script($font, THEME_FONT_URI .'/'.$font, array('cufon-yui'));
					wp_print_scripts($font);
				}
			}
		}
		wp_print_scripts('cufon-yui');
	}
	add_filter('wp_head','theme_add_cufon_script');	
}
if(theme_get_option('gfont','used_gfont')){
	function theme_add_gfont_lib(){
		$http = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
		$fonts = theme_get_option('gfont','used_gfont');
		if(is_array($fonts)){
			foreach ($fonts as $font){
				wp_enqueue_style('font|'.$font,$http.'://fonts.googleapis.com/css?family='.$font);
			}
		}
	}
	add_action("wp_print_styles", 'theme_add_gfont_lib');
}
if(theme_get_option('advance','combine_js')){
	global $theme_combine_js_enqueued; 
	$theme_combine_js_enqueued = false;
	function theme_combine_js($handles){
		if(is_admin()){
			return;
		}
		global $wp_scripts, $theme_combine_js_enqueued;
		if($theme_combine_js_enqueued) return;
		if (! is_a($wp_scripts, 'WP_Scripts')) return;
		
		$move_bottom = theme_get_option('advance','move_bottom');
		$combine_scripts = array();
		$queue_unset = array();
		$wp_scripts->all_deps($wp_scripts->queue); 
		foreach ($wp_scripts->to_do as $key => $handle) {
			$src = $wp_scripts->registered[$handle]->src;
			if (substr($src, 0, 4) != 'http') {
				$src = site_url($src);
				$external = false;
			} else {
				$home = get_option('home');
				if (substr($src, 0, strlen($home)) == $home) {
					$external = false;
				} else	{
					$external = true;
				}
			}
			if(!$external && $handle!='jquery'){
				$combine_scripts[$handle] = $src;
				unset($wp_scripts->to_do[$key]);
				$queue_unset[$handle] = true;
			}
		}
		foreach ($wp_scripts->queue as $key => $handle) {
			if (isset($queue_unset[$handle])){
				if(!in_array($handle, $wp_scripts->done, true)){
					$wp_scripts->done[] = $handle;
				}
				unset($wp_scripts->queue[$key]);
			}
		}
		
		$fileId = 0;
		foreach($combine_scripts as $handle => $src){
			$path = ABSPATH . str_replace(get_option('siteurl').'/', '', $src);
			$fileId += @filemtime($path);
		}
			
		$cache_name = md5(serialize($combine_scripts).$fileId);
		$cache_file_path = THEME_CACHE_DIR . '/' .$cache_name .'.js';
		$cache_file_url = THEME_CACHE_URI . '/' .$cache_name .'.js';
		
		if(!is_readable($cache_file_path)){
			$content = '';
			foreach($combine_scripts as $handle => $src){
				$content .= "/* $handle: ($src) */\n";
				$content .= @file_get_contents($src). "\n\n\n\n";;
			}
			if (is_writable(THEME_CACHE_DIR)) {
				$fhandle = @fopen($cache_file_path, 'w+');
				if ($fhandle) fwrite($fhandle, $content, strlen($content));
			}
		}
		wp_enqueue_script($cache_name, $cache_file_url,array(),false,$move_bottom);
		$theme_combine_js_enqueued = true;
	}
	add_action('wp_print_scripts', 'theme_combine_js',100);
}
	
if(theme_get_option('advance','combine_css')){
	function theme_combine_css($handles){
		if(is_admin()){
			return;
		}
		global $wp_styles;
		if (! is_object($wp_styles)) return;
		$combine_styles = array();
		$queue_unset = array();
		$wp_styles->all_deps($wp_styles->queue); 
		foreach ($wp_styles->to_do as $key => $handle) {
			$media = ($wp_styles->registered[$handle]->args ? $wp_styles->registered[$handle]->args : 'screen');
			$src = $wp_styles->registered[$handle]->src;
			if (substr($src, 0, 4) != 'http') {
				$src = site_url($src);
				$external = false;
			} else {
				$home = get_option('home');
				if (substr($src, 0, strlen($home)) == $home) {
					$external = false;
				} else	{
					$external = true;
				}
			}
			if(!$external){
				$combine_styles[$media][$handle] = $src;
				unset($wp_styles->to_do[$key]);
				$queue_unset[$handle] = true;
			}
		}
		foreach ($wp_styles->queue as $key => $handle) {
			if (isset($queue_unset[$handle])){
				if(!in_array($handle, $wp_styles->done, true)){
					$wp_styles->done[] = $handle;
				}
				unset($wp_styles->queue[$key]);
			}
		}
		foreach ($combine_styles as $media => $styles) {
			$fileId = 0;
			foreach($styles as $handle => $src){
				$path = ABSPATH . str_replace(get_option('siteurl').'/', '', $src);
				$fileId += @filemtime($path);
			}
				
			$cache_name = md5(serialize($combine_styles).$fileId);
			$cache_file_path = THEME_CACHE_DIR . '/' .$cache_name .'.css';
			$cache_file_url = THEME_CACHE_URI . '/' .$cache_name .'.css';
			
			if(!is_readable($cache_file_path)){
				$content = '';
				foreach($styles as $handle => $src){
					$content .= "/* $handle: ($src) */\n";
					$content .= @file_get_contents($src). "\n\n";;
				}
				if (is_writable(THEME_CACHE_DIR)) {
					$fhandle = @fopen($cache_file_path, 'w+');
					if ($fhandle) fwrite($fhandle, $content, strlen($content));
				}
			}
			wp_enqueue_style(THEME_SLUG.'-styles-'.$media, $cache_file_url, false, false, $media);
		}
	}
	add_action('wp_print_styles', 'theme_combine_css',100);
}

require_once (THEME_PLUGINS . '/Browser.php');
$browser = new Browser();
if($browser->isMobile()){
	add_action('wp_head', 'theme_add_viewport_meta');
	function theme_add_viewport_meta() {
		echo "\n" . '<meta name="viewport" content="width=1100" />' . "\n";
	}
}
