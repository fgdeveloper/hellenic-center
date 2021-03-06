<?php
/**
 * Disable Automatic Formatting on Posts
 * Thanks to TheBinaryPenguin (http://wordpress.org/support/topic/plugin-remove-wpautop-wptexturize-with-a-shortcode)
 */
function theme_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

add_filter('the_content', 'theme_formatter', 99);

function theme_shortcode_dropcaps($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));

	if($color){
		$color = ' '.$color;
	}
	return '<span class="' . $code.$color . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap1', 'theme_shortcode_dropcaps');
add_shortcode('dropcap2', 'theme_shortcode_dropcaps');
add_shortcode('dropcap3', 'theme_shortcode_dropcaps');
add_shortcode('dropcap4', 'theme_shortcode_dropcaps');

function theme_shortcode_dropcap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
		'style' => 'dropcap1',
	), $atts));

	if($color){
		$color = ' '.$color;
	}
	return '<span class="' . $style.$color . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'theme_shortcode_dropcap');

function theme_shortcode_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => false,
		'cite' => false,
	), $atts));
	
	return '<blockquote' . ($align ? ' class="align' . $align . '"' : '') . '>' . do_shortcode($content) . ($cite ? '<p><cite>- ' . $cite . '</cite></p>' : '') . '</blockquote>';
}
add_shortcode('blockquote', 'theme_shortcode_blockquote');

function theme_shortcode_highlight($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => false,
	), $atts));

	return '<span class="highlight'.(($type)?' '.$type:'').'">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'theme_shortcode_highlight');

function theme_shortcode_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'color' => '',
	), $atts));

	if($color){
		$color = ' list_color_'.$color;
	}
	return str_replace('<ul>', '<ul class="'.$style.$color.'">', do_shortcode($content));
}
add_shortcode('list', 'theme_shortcode_list');


function theme_shortcode_icon($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => false,
		'color' => '',
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	return '<span class="icon_text icon_'.$style.$color.'">'.do_shortcode($content).'</span>';
}
add_shortcode('icon', 'theme_shortcode_icon');

function theme_shortcode_icon_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'style' => false,
		'href' => '#',
		'color' => '',
		'target' => false,
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	$target = $target?' target="'.$target.'"':'';
	
	if(preg_match("|^mailto:\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$|i", $href)){
		$href = str_replace('@','*',$href);
		$content = str_replace('@','*',$content);
	}
	
	return '<a class="icon_text icon_'.$style.$color.'" href="'.$href.'"'.$target.'>'.do_shortcode($content).'</a>';
}
add_shortcode('icon_link', 'theme_shortcode_icon_link');

global $theme_code_token;
$theme_code_token = md5(uniqid(rand()));
$theme_code_matches = array();
function theme_code_before_filter($content) {
	return preg_replace_callback("/(.?)\[(pre|code)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\\2\])?(.?)/s", "theme_code_before_filter_callback", $content);
}

function theme_code_before_filter_callback(&$match) {
	global $theme_code_token, $theme_code_matches;
	$i = count($theme_code_matches);
	
	$theme_code_matches[$i] = $match;
	
	return "\n\n<p>" . $theme_code_token . sprintf("%03d", $i) . "</p>\n\n";
}

function theme_code_after_filter($content) {
	global $theme_code_token;
	
	$content = preg_replace_callback("/<p>\s*" . $theme_code_token . "(\d{3})\s*<\/p>/si", "theme_code_after_filter_callback", $content);
	
	return $content;
}
function theme_code_after_filter_callback($match) {
	global $theme_code_matches;
	$i = intval($match[1]);
	$content = $theme_code_matches[$i];
	$content[5]=trim($content[5]);
	
	if (version_compare(PHP_VERSION, '5.2.3') >= 0) {
		$output = htmlspecialchars($content[5], ENT_NOQUOTES, get_bloginfo('charset'), false);
	} else {
		$specialChars = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
		
		$output = strtr(htmlspecialchars_decode($content[5]), $specialChars);
	}
	return '<' . $content[2] . ' class="'. apply_filters( 'theme_css_class', $content[2] ) .'">' . $output . '</' . $content[2] . '>';
}

add_filter('the_content', 'theme_code_before_filter', 0);
add_filter('the_content', 'theme_code_after_filter', 99);