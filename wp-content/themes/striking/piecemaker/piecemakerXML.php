<?php require_once( '../../../../wp-load.php' );

$height = theme_get_option('slideshow','3d_height');
$segments = theme_get_option('slideshow','3d_segments');
$tweenTime = theme_get_option('slideshow','3d_tweenTime');
$tweenDelay = theme_get_option('slideshow','3d_tweenDelay');
$tweenType = theme_get_option('slideshow','3d_tweenType');
$zDistance = theme_get_option('slideshow','3d_zDistance');
$expand = theme_get_option('slideshow','3d_expand');
$innerColor = theme_get_option('slideshow','3d_innerColor');
if(strlen($innerColor)==4){
	$innerColor = $innerColor[0].$innerColor[1].$innerColor[1].$innerColor[2].$innerColor[2].$innerColor[3].$innerColor[3];
}
$innerColor = str_replace('#','0x',$innerColor);
$shadowDarkness = theme_get_option('slideshow','3d_shadowDarkness');
$autoplay = theme_get_option('slideshow','3d_autoplay');

$vars = array();
if(preg_match_all ("/\[(.*?)=(.*?)\]/s",$_GET['vars'],$vars_match) > 0){
	for($i = 0; $i < count($vars_match[0]);$i++){
		$vars[$vars_match[1][$i]] = $vars_match[2][$i];
	}
}
extract($vars);

if(isset($lang)){
    if(function_exists('icl_get_languages')){
        global $sitepress;
        $sitepress->switch_lang($lang);
    }
}
$output = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<Piecemaker>
  <Settings>
    <imageWidth>960</imageWidth>
    <imageHeight>$height</imageHeight>
    <segments>$segments</segments>
    <tweenTime>$tweenTime</tweenTime>
    <tweenDelay>$tweenDelay</tweenDelay>
    <tweenType>$tweenType</tweenType>
    <zDistance>$zDistance</zDistance>
    <expand>$expand</expand>
    <innerColor>$innerColor</innerColor>
    <textBackground>0x0064C8</textBackground>
    <shadowDarkness>$shadowDarkness</shadowDarkness>
    <textDistance>25</textDistance>
    <autoplay>$autoplay</autoplay>
  </Settings>
XML;
$number = isset($number)?$number:'-1';
$category = isset($category)?$category:'{s}';
$images = theme_generator('slideShow_getImages',$category,$number,array('960',$height));
$uploads = wp_upload_dir();
foreach ($images as $image){
	$image_src = theme_get_image_src($image['source'], 'full');
	$image_src = str_replace($uploads['baseurl'],'',$image_src);
	$output.='<Image Filename="'.$image_src.'"></Image>';
}
$output.='</Piecemaker>';

header("Content-type: text/xml");
echo $output;