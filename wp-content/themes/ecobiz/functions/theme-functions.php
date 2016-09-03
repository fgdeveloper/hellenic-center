<?php


/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function excerpt($excerpt_length) {
  global $post;
	$content = $post->post_content;
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
  $content = strip_tags(strip_shortcodes($content));
  
	return $content;

}

function imediapixel_truncate($string, $limit, $break=".", $pad="...") {
	if(strlen($string) <= $limit) return $string;
	
	 if(false !== ($breakpoint = strpos($string, $break, $limit))) {
		if($breakpoint < strlen($string) - 1) {
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	  }
	return $string; 
}

// Custom Comments Display
function imediapixel_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="titlecomment">
			<?php echo get_avatar($comment,$size='40'); ?>
			<h4><?php echo get_comment_author_link(); ?></h4>
			<span class="datecomment"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)','ecobiz'),'  ','') ?></span>

		</div>
		<div class="clear"></div>
    <div class="clear"></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php echo __('Your comment is awaiting moderation.','ecobiz');?></em>
			<div class="clear"></div>
			<?php endif; ?>
		  <?php comment_text() ?>
	</li>   
  
<?php
}

// Output the styling for the seperated Pings
function imediapixel_list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }

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


/* Add Custom Javascript */
function imediapixel_add_javascripts() {
  
  wp_enqueue_scripts('jquery'); 
  wp_enqueue_script( 'jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.nivo.slider.pack.js', get_template_directory_uri().'/js/jquery.nivo.slider.pack.js', array( 'jquery' ) );
  wp_enqueue_script( 'jqueryslidemenu', get_template_directory_uri().'/js/jqueryslidemenu.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.kwicks.min', get_template_directory_uri().'/js/jquery.kwicks.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.tools.tabs.min', get_template_directory_uri().'/js/jquery.tools.tabs.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'jqueryslidemenu', get_template_directory_uri().'/js/jqueryslidemu.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.gmap.min', get_template_directory_uri().'/js/jquery.gmap.min.js', array('jquery'));
  wp_enqueue_script( 'filterable.pack', get_template_directory_uri().'/js/filterable.pack.js', array( 'jquery' ) );
  wp_enqueue_script( 'functions', get_template_directory_uri().'/js/functions.js', array( 'jquery' ) );
}

if (!is_admin()) {
  add_action( 'wp_print_scripts', 'imediapixel_add_javascripts' ); 
}

/* Add Custom Stylesheet */
function imediapixel_add_stylesheet() { 
  ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/prettyPhoto.css" type="text/css" media="screen" />
	 <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/nivo-slider.css" type="text/css" media="screen" />
   <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/kwicks.css" type="text/css" media="screen" />
<?php 
}

add_action('wp_head', 'imediapixel_add_stylesheet');


/* Register Nav Menu Features For Wordpress 3.0 */
register_nav_menus( array(
	'topnav' => __( 'Main Navigation'),
  'footernav' => __( 'Footer Navigation')
) );

/* Remove Default Container for Nav Menu Features */
function imediapixel_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
} 
add_filter( 'wp_nav_menu_args', 'imediapixel_nav_menu_args' );

/* Native Nagivation Pages List for Main Menu */
function imediapixel_topmenu_pages() {
?>
	<ul class="navigation">
  	<li <?php if (is_home() || is_front_page()) echo 'class="selected"';?>><a href="<?php echo home_url();?>"><?php echo __('Home','ecobiz');?></a></li>
  	<?php wp_list_pages('title_li=&sort_column=menu_order&depth=4');?>
  </ul>

<?php
}

/* Native Nagivation Pages List for Main Menu */
function imediapixel_footermenu_pages() {
?>
	<ul class="navigation">
  	<li><a href="<?php home_url();?>"><?php echo __('Home','ecobiz');?></a></li>
  	<?php wp_list_pages('title_li=&sort_column=menu_order&depth=1');?>
  </ul>

<?php
}

function get_shortcode_name($name) {
  if (strstr(get_shortcode_regex(),$name)) {
    return true;
  }
}

/* Detect Video File Extension */
function detect_ext($file) {
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  return $ext;
}

function is_quicktime($file) {
  $quicktime_file = array("mov","3gp","mp4");
  if (in_array(pathinfo($file, PATHINFO_EXTENSION),$quicktime_file)) {
    return true;
  } else {
    return false;
  }
}

function is_flash($file) {
  if (pathinfo($file, PATHINFO_EXTENSION) == "swf") {
    return true;
  } else {
    return false;
  }
}

function is_youtube($file) {
  if (preg_match('/youtube/i',$file)) {
    return true;
  } else {
    return false;
  }
}

function is_vimeo($file) {
  if (preg_match('/vimeo/i',$file)) {
    return true;
  } else {
    return false;
  }
}

/* Latest News */
function imediapixel_latestnews($blogcat,$num=4,$title="") { 
  global $post;
  
  echo $title;
  
  if(is_array($blogcat)) {
    $blog_includes = implode(",",$blogcat);
  } else {
    $blog_includes = $blogcat;
  }  
  
  query_posts('cat='.$blog_includes.'&showposts='.$num);
  ?>
    <ul class="latestnews">
      <?php
      while ( have_posts() ) : the_post();
      $image_thumbnail = get_post_meta($post->ID, '_image_thumbnail', true );
      ?>
        <li>
          <a href="<?php the_permalink();?>"><?php the_title();?></a>
          <p class="posteddate"><?php echo __('Posted on ','ecobiz');?><?php the_time( get_option('date_format') ); ?></p>
        </li>
      <?php endwhile;?>
      <?php wp_reset_query();?>
 	  </ul>
    <div class="clear"></div>
    <?php 
    $blog_page = get_option('ecobiz_blog_page');
    $blog_pid = get_page_by_title($blog_page);
    ?>
    <a href="<?php echo get_permalink($blog_pid->ID);?>" class="button-more"><?php echo __('View All News','ecobiz');?></a>
  <?php
}

/* Latest Portfolio */
function imediapixel_latestworks($num=1,$title="") { 
  global $post;
  
  echo $title;
  
?>
      <?php
        global $post;
        
        query_posts(array( 'post_type' => 'portfolio', 'showposts' => $num,'orderby'=>'rand'));
        while ( have_posts() ) : the_post();
        $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
        $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
          $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );          
        ?> 
        <div class="boximg2">
          <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=78&amp;w=182&amp;zc=1" class="boximg-pad fade" alt="" /></a>
            <?php } ?>
          </div>
        </div>
        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
        <p><?php echo excerpt(10);?></p>
        <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
        <div class="clear"></div>
      <?php endwhile;wp_reset_query();?>
  <?php     
}

/* Testimonial List */
function imediapixel_testimonial($cat,$num=1,$title="",$place="") {
  global $post;
  
  echo $title;
  ?>
  <?php
    if (!is_numeric($cat))
      $testicatid = get_cat_ID($cat); 
    else 
      $testicatid = $cat;
    
    query_posts('cat='.$testicatid.'&showposts='.$num.'&orderby=rand');
    ?>
    <?php    
    while ( have_posts() ) : the_post();
    ?>
    <blockquote><?php the_content();?></blockquote>
    <p class="testiname"><?php the_title();?></p>
    <div class="sidebarheading"></div>    
  <?php endwhile;wp_reset_query();?>
  <?php
}

/* Get Page by ID */
function imediapixel_get_page($page_id) { 
  global $post;
    
    $page_id = get_page_by_title($page_id);
    query_posts('page_id='.$page_id->ID);
  
    while ( have_posts() ) : the_post();
  ?>
        <h4><?php the_title();?></h4>
        <p><?php echo excerpt(40);?><a href="<?php the_permalink();?>"><?php echo __('Read more ','ecobiz');?>&raquo;</a></p>        
  <?php
  endwhile;
  wp_reset_query();
}

/* Get vimeo Video ID */
function vimeo_videoID($url) {
	if ( 'http://' == substr( $url, 0, 7 ) ) {
		preg_match( '#http://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i', $url, $matches );
		if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');

		$videoid = $matches[3];
		return $videoid;
	}
}

/* Get Youtube Video ID */
function youtube_videoID($url) {
	preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(watch\?v=|w/\?v=|\?v=)([\w-]+)(.*?)#i', $url, $matches );
	if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');
  
  $videoid = $matches[3];
	return $videoid;
}

// Use shortcodes in text widget.
add_filter('widget_text', 'do_shortcode');

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'ecobiz', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/* Enable Post Thumbnail Feature */
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	set_post_thumbnail_size( 200, 200 );
	add_image_size('post_thumb', 800, 800, true);
}

function thumb_url(){
 global $post;
 global $blog_id;

       if(isset($blog_id) && $blog_id > 0) {

       $imgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
       $imageParts = explode('/files/',$imgSrc[0] );

       if(isset($imageParts[1])) {
               $src = '/wp-content/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];

       } else {
               $thumb_src= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
               $src = $thumb_src[0];
       }
       }

       return $src;
}

/* Breadcrumbs Navigation */
function imediapixel_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = __('Home','ecobiz'); //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
    
    echo '<div class="breadcrumbs">';
 
    global $post;
    $home = home_url();
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . single_cat_title() . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single()) {
      $cat = get_the_category(); $cat = $cat[0];
      if ($cat) echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    } else {
      global $query_string;
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $termlink = get_term_link($term->slug,$term->taxonomy);
      echo $currentBefore . ' '.$term->name .'</a>'. $currentAfter;
    }
    
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}


/* Posts List base on category*/
function imediapixel_postslist($category, $num, $orderby="date",$style="2col",$readmore_text="VIEW DETAIL") {  
  global $post;
  
  $category_id = get_cat_ID($category);
  
  $cat_num = ($num) ? $num : 4;
  $counter = 0;
  $out = "";
  query_posts('cat='.$category_id.'&showposts='.$cat_num.'&orderby='.$orderby);
  
  while (have_posts()) : the_post();
    $counter++;
    
    if ($style == "2col") {
      if ($counter %2 ==0) {
        $out .= '<div class="mainbox box-last">'; 
      } else {
        $out .= '<div class="mainbox">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(25).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %2 ==0) {
        $out .= '<div class="spacer"></div>'; 
      }      
    } else if ($style == "3col"){
     if ($counter %3 ==0) {
        $out .= '<div class="mainbox2 box-last">'; 
      } else {
        $out .= '<div class="mainbox2">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg2">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(8).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %3 ==0) {
        $out .= '<div class="spacer"></div>'; 
      } 
    }
    endwhile;
    wp_reset_query();
  return $out;
}

/* Page with child pages List */
function imediapixel_pagelist($page_name, $num, $orderby="menu_order",$style="2col",$readmore_text="VIEW DETAIL") {  
  global $post;
  
  $page_id = get_page_by_title($page_name);
  
  $services_num = ($num) ? $num : 4;
  $counter = 0;
  $out = "";
  
   if ($style == "4col") $out .= '<div class="clear"></div><ul class="portfolio-4col">';
   
  query_posts('post_type=page&post_parent='.$page_id->ID.'&showposts='.$services_num.'&orderby='.$orderby);
    
  while (have_posts()) : the_post();
    $counter++;
    
    if ($style == "2col") {
      if ($counter %2 ==0) {
        $out .= '<div class="mainbox box-last">'; 
      } else {
        $out .= '<div class="mainbox">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(25).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %2 ==0) {
        $out .= '<div class="spacer"></div>'; 
      }      
    } else if ($style == "3col"){
     if ($counter %3 ==0) {
        $out .= '<div class="mainbox2 box-last">'; 
      } else {
        $out .= '<div class="mainbox2">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg2">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(8).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %3 ==0) {
        $out .= '<div class="spacer"></div>'; 
      } 
    } else if ($style == "4col"){
      $out .= '<li'; 
      if ($counter %4 == 0) $out .= ' class="last"';
      $out .= '>';
      $out .= '<div class="portfolio-blockimg3">';
        $out .= '<div class="portfolio-imgbox3">';
        if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
          $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=86&amp;w=196&amp;zc=1" alt="" class="boximg-pad" />'."\n";
        }
        $out .= '</div>';
        $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
        $out .= '<p>'.excerpt(15).'</p>';
        $out .= '<a href="'.get_permalink().'" class="button"><span>'.__($readmore_text,'ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';     
        $out .= '</div>';
        $out .= '</li>';      
    }    
    endwhile;
    if ($style == "4col") $out .= '</ul>';
  wp_reset_query();
  return $out;
}

/* Services with child pages List */
function imediapixel_serviceslist($page_name, $num, $orderby="menu_order", $title="") {  
  global $post;
  
  $page_id = get_page_by_title($page_name);
  
  $services_num = ($num) ? $num : 6;
  $counter = 0;
  
  query_posts('post_type=page&post_parent='.$page_id->ID.'&showposts='.$services_num.'&orderby='.$orderby);
    
  while (have_posts()) : the_post();
    $counter++;
    if ($counter %3 ==0) {
      $out .= '<div class="mainbox2 box-last">'; 
    } else {
      $out .= '<div class="mainbox2">';
    }
    $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
    $out .= '<div class="boximg2">';
    if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
      $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
    }
    $out .= '</div>';
    $out .= '<p>'.excerpt(8).'</p>';
    $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
    $out .= '</div>';         
    if ($counter %3 ==0) {
      $out .= '<div class="spacer"></div>'; 
    }
    endwhile;
  wp_reset_query();
  return $out;
}

/* Posts List base on category*/
function imediapixel_bloglist($cat, $num=4, $orderby="date") {  
  global $id, $post, $authordata;
  
  $blog_cats_include = get_option('ecobiz_blog_categories');
    if(is_array($blog_cats_include)) {
      $blog_include = implode(",",$blog_cats_include);
    }
    
  ?>
  <ul id="listlatestnews">
  <?php
  $query = array(
		'posts_per_page' => (int)$num,
		'post_type'=>'post',
	);
	
  if($cat){
		$query['cat'] = $cat;
	} else {
	  if ($blog_cats_include !="") {
      $query['cat'] = $blog_include;
    } 
	}
  
	$paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
	$query['paged'] = $paged;
	$query['showposts'] = $num;

  $blog_text_num = (get_option('ecobiz_blog_text_num')) ? get_option('ecobiz_blog_text_num') : 75;
  
  $r = new WP_Query($query);
  
  $out = "";
  while ($r->have_posts()) : $r->the_post();
    $out .= '<li>';
      $out .= '<div class="boximg-blog">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<div class="blogimage">';
          $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />';
        $out .= '</div>';
      }
      $out .= '</div>';
      $out .= '<div class="postbox '.get_post_class().'">';
      $out .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
      $out .= '<p>'.excerpt($blog_text_num).'</p>';
     $out .= '</div>';
     $out .= '<div class="clear"></div>';
      $out .= '<div class="metapost">';
        $out .= '<span class="first">'.__('Posted at ','ecobiz') . get_the_time( get_option('date_format') ) . '</span> |';
        $out .= '<span>';
        $out .= __('By ','ecobiz');
        $out .= '<a class="url fn n" href="';
        $out .= get_author_link(false, $authordata->ID, $authordata->user_nicename);
      	$out .= '" title="' . __('View all posts by ', 'ecobiz') . get_the_author() . '">';
        $out .= get_the_author();
        $out .= '</a >';
        $out .='</span> |';
        $out .= '<span>';
        $out .=__('Categories ','ecobiz');
        $out .= get_the_category_list(',');
        $out .='</span>';
      $out .= '</div>';
      $out .= '<div class="clear"></div>';
    $out .= '</li>';
    endwhile;
    wp_reset_query(); 
    $out .= '</ul>';
    $out .= '<div class="clear"></div>';
		$out .= '<div class="pagination">';
		ob_start();
		theme_blog_pagenavi('', '', $r, $paged);
		$out .= ob_get_clean();
    $out .= '</div>';
    
    return $out;
}

/* Thumbnail in Portfolio List */
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
function fb_AddThumbColumn($cols) {
 
$cols['thumbnail'] = __('Thumbnail','ecobiz');
 
return $cols;
}
 
function fb_AddThumbValue($column_name, $post_id) {
 
$width = (int) 100;
$height = (int) 100;
 
if ( 'thumbnail' == $column_name ) {
  // thumbnail of WP 2.9
  $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
  // image from gallery
  $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
  if ($thumbnail_id)
  $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
  elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
      $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
  }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None','ecobiz');
    }
  }
}
 
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );

// for Portfolio
add_filter( 'manage_portfolio_columns', 'fb_AddThumbColumn' );
add_action( 'manage_portfolio_custom_column', 'fb_AddThumbValue', 10, 2 );

// for slideshow
add_filter( 'manage_slideshow_columns', 'fb_AddThumbColumn' );
add_action( 'manage_slideshow_custom_column', 'fb_AddThumbValue', 10, 2 );
}

add_filter('manage_edit-portfolio_columns', 'portfolio_columns');
function portfolio_columns($columns) {
    $columns['category'] = 'Portfolio Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'portfolio_show_columns');
function portfolio_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-product_columns', 'product_columns');
function product_columns($columns) {
    $columns['category'] = 'Product Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'product_show_columns');
function product_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'product_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-slideshow_columns', 'slideshow_columns');
function slideshow_columns($columns) {
    $columns['category'] = 'Slideshow Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'slideshow_show_columns');
function slideshow_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'slideshow_category', '', ', ', '' );
            echo $cats;
    }
}

/* Remove Wordpress automatic formatting */
function remove_wpautop( $content ) { 
    $content = do_shortcode( shortcode_unautop( $content ) ); 
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    return $content;
}


function imediapixel_get_related_portfolio($number=4,$title="Related Portfolio") {
  global $post;
  ?>
  <h3><?php echo $title;?></h3>
  <ul class="portfolio-4col">
    <?php
    $myterms = get_the_terms($post->ID,'portfolio_category');
    foreach ($myterms as $myterm ) {
      $counter = 0;
      query_posts(array( 'post_type' => 'portfolio', 'posts_per_page' => $number,'portfolio_category'=>$myterm->name,'orderby'=>'rand','post__not_in' => array( $post->ID)));
    }
    while ( have_posts() ) : the_post();
      $counter++;
      $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
      $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
    ?>
        <li <?php if ($counter %4 == 0) echo 'class="last"';?>>
          <div class="portfolio-blockimg3">
            <div class="portfolio-imgbox3">
            <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
              <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
              <?php } ?>
            </div>
            </div>
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <p><?php echo excerpt(12);?></p>
            <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>     
          </div>
        </li>  
      <?php endwhile;wp_reset_query();?>
 	  </ul>  
  <?php
}


/* Random Portfolio */
function imediapixel_random_portfolio($num=4,$title="Random Portfolio") { 
  global $post;
  
  $counter = 0;
  query_posts(array( 'post_type' => 'portfolio', 'posts_per_page' => $num, 'orderby'=>'rand'));
  ?>
  <h3 class="divider"><?php echo $title;?></h3>
  <ul class="portfolio-4col">    
  <?php  
  while ( have_posts() ) : the_post();
  $counter++;
  $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
  $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
  
  ?>
  <li <?php if ($counter %4 == 0) echo 'class="last"';?>>
    <div class="portfolio-blockimg3">
      <div class="portfolio-imgbox3">
      <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
        <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
        <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto" title="<?php the_title();?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
        <?php } ?>
      </div>
      </div>
      <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
      <p><?php echo excerpt(12);?></p>
      <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>     
    </div>
  </li>       
  <?php endwhile; wp_reset_query();?>
  </ul>
<?php 
} 


/* Pagination */
function theme_blog_pagenavi($before = '', $after = '', $blog_query, $paged) {
	global $wpdb, $wp_query;
	
	if (is_single())
		return;
	
	$pagenavi_options = array(
		//'pages_text' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','striking_front'),
		'pages_text' => '',
		'current_text' => '%PAGE_NUMBER%',
		'page_text' => '%PAGE_NUMBER%',
		'first_text' => __('&laquo; First','striking_front'),
		'last_text' => __('Last &raquo;','striking_front'),
		'next_text' => __('&raquo;','striking_front'),
		'prev_text' => __('&laquo;','striking_front'),
		'dotright_text' => __('...','striking_front'),
		'dotleft_text' => __('...','striking_front'),
		'style' => 1,
		'num_pages' => 4,
		'always_show' => 0,
		'num_larger_page_numbers' => 3,
		'larger_page_numbers_multiple' => 10,
		'use_pagenavi_css' => 0,
	);
	
	$request = $blog_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	global $wp_version;
	if((is_front_page() || is_home() ) && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query 
		$paged = (get_query_var('paged')) ?intval(get_query_var('paged')) : intval(get_query_var('page'));
	}else{
		$paged = intval(get_query_var('paged'));
	}
	
	$numposts = $blog_query->found_posts;
	$max_page = intval($blog_query->max_num_pages);
	
	if (empty($paged) || $paged == 0)
		$paged = 1;
	$pages_to_show = intval($pagenavi_options['num_pages']);
	$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor($pages_to_show_minus_1 / 2);
	$half_page_end = ceil($pages_to_show_minus_1 / 2);
	$start_page = $paged - $half_page_start;
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$end_page = $paged + $half_page_end;
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$larger_pages_array = array();
	if ($larger_page_multiple)
		for($i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple)
			$larger_pages_array[] = $i;
	
	if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
		$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
		$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
		echo $before . '<div class="wp-pagenavi">' . "\n";
		switch(intval($pagenavi_options['style'])){
			// Normal
			case 1:
				if (! empty($pages_text)) {
					echo '<span class="pages">' . $pages_text . '</span>';
				}
				if ($start_page >= 2 && $pages_to_show < $max_page) {
					$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
					echo '<a href="' . esc_url(get_pagenum_link()) . '" class="first" title="' . $first_page_text . '">' . $first_page_text . '</a>';
					if (! empty($pagenavi_options['dotleft_text'])) {
						echo '<span class="extend">' . $pagenavi_options['dotleft_text'] . '</span>';
					}
				}
				$larger_page_start = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_start++;
					}
				}
				previous_posts_link($pagenavi_options['prev_text']);
				for($i = $start_page; $i <= $end_page; $i++) {
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<span class="current">' . $current_page_text . '</span>';
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
					}
				}
				next_posts_link($pagenavi_options['next_text'], $max_page);
				$larger_page_end = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="page" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_end++;
					}
				}
				if ($end_page < $max_page) {
					if (! empty($pagenavi_options['dotright_text'])) {
						echo '<span class="extend">' . $pagenavi_options['dotright_text'] . '</span>';
					}
					$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
					echo '<a href="' . esc_url(get_pagenum_link($max_page)) . '" class="last" title="' . $last_page_text . '">' . $last_page_text . '</a>';
				}
				break;
			// Dropdown
			case 2:
				echo '<form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="get">' . "\n";
				echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">' . "\n";
				for($i = 1; $i <= $max_page; $i++) {
					$page_num = $i;
					if ($page_num == 1) {
						$page_num = 0;
					}
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '" selected="selected" class="current">' . $current_page_text . "</option>\n";
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '">' . $page_text . "</option>\n";
					}
				}
				echo "</select>\n";
				echo "</form>\n";
				break;
		}
		echo '</div>' . $after . "\n";
	}
}

function wpapi_pagination($pages = '', $range = 4) {
  $showitems = ($range * 2)+1;
  
  global $paged;
  
  if(empty($paged)) $paged = 1;
    if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }
 
 if(1 != $pages) {
  echo '<div class="wpapi_pagination"><span>Page '.$paged.' of '.$pages.'</span>';
  if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
  if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
   for ($i=1; $i <= $pages; $i++) {
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
      echo ($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
    }
  }

   if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'">Next &rsaquo;</a>';
   if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
   echo "</div>";
   
 }
}

function imediapixel_twitter_feed($title="Twitter Update!",$number=5) { ?>
  
  <?php $twitter_id = get_option('ecobiz_twitter_id');?>
  
  <!-- Twitter -->
    <h4 class="sidebarheading"><img src="<?php echo get_template_directory_uri();?>/images/twitter_24.png" alt="" class="twitter_icon" /><?php echo $title;?></h4>
    <div id="twitter"></div>
  <!-- Twitter End -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.twitter.js"></script>
  <script type="text/javascript">
  
  jQuery(document).ready(function($) {
		$("#twitter").getTwitter({
			userName: "<?php echo $twitter_id;?>",
			numTweets: <?php echo $number;?>,
			loaderText: "Loading tweets...",
			slideIn: true,
			showHeading: true,
			headingText: "",
			showProfileLink: true
		});
	});
  </script>     
  <?php
}

function imediapixel_flickr_gallery($title="Flickr Gallery",$flicker_id,$number=4) {
?>	  
      <!-- Flickr Gallery -->
        <?php echo $title;?>
        <div class="flickrgallery">
		      <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number;?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flicker_id;?>"></script>	
        </div>
        <div class="clear"></div>
      <!-- Flickr Gallery End --> 
<?php
}

function google_analytics(){
	$google_analytics =  get_option('ecobiz_google_analytics');
	if ( $google_analytics <> "" ) 
		echo stripslashes($google_analytics) . "\n";
}
add_action('wp_footer','google_analytics');

function switch_slideshow_src($url_source,$img_width="",$img_height="") {
    if(preg_match_all('!.+\.(?:jpe?g|png|gif)!Ui',$url_source,$matches)) { ?> 
      <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $url_source;?>&amp;h=<?php echo $img_height;?>&amp;w=<?php echo $img_width;?>&amp;zc=1" alt="" class="slideimage" />
    <?php
    } else if (preg_match_all('#http://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i',$url_source,$matches)) {
			$vimeo_vid = vimeo_videoID($url_source);
			echo do_shortcode("[vimeo_video id=$vimeo_vid width=$img_width height=$img_height]");      
    } else if  (preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(.*?)#i', $url_source, $matches )) {
			$youtube_vid = youtube_videoID($url_source);
			echo do_shortcode("[youtube_video id=$youtube_vid width=$img_width height=$img_height]");      
    }
}

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter('widget_text', 'do_shortcode');

add_theme_support('automatic-feed-links');

function switch_footer_columns() {
  $footer_columns = get_option('ecobiz_footer_columns');
  
  switch($footer_columns) {
    case "1 column" :
      get_template_part('footer-1col','1 column footer');
      break;
    case "2 columns" :
      get_template_part('footer-2col','2 columns footer');
      break;
    case "3 columns" :
      get_template_part('footer-3col','3 columns footer');
      break;
    case "4 columns" :
      get_template_part('footer-4col','4 columns footer');
      break;  
    default :
      get_template_part('footer-4col','4 columns footer');
  }
}

function theme_widget_text_shortcode($content) {
	$content = do_shortcode($content);
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= do_shortcode($piece);
		}
	}

	return $new_content;
}
// Allow Shortcodes in Sidebar Widgets
add_filter('widget_text', 'theme_widget_text_shortcode');

function get_nivoslider($cat="",$slideshow_order) { 
  global $post;
  ?>
    <?php
    $nivo_transition = get_option('ecobiz_nivo_transition');
    $nivo_slices = get_option('ecobiz_nivo_slices');
    $nivo_animspeed = get_option('ecobiz_nivo_animspeed');
    $nivo_pausespeed = get_option('ecobiz_nivo_pausespeed');
    $nivo_directionNav = get_option('ecobiz_nivo_directionNav');
    $nivo_directionNavHide = get_option('ecobiz_nivo_directionNavHide');
    $nivo_controlNav = get_option('ecobiz_nivo_controlNav');
    $nivo_disable_permalink = get_option('ecobiz_nivo_disable_permalink');
    $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date";
    $enable_caption = get_option('ecobiz_nivo_caption');
    $slideshow_cat = get_option('ecobiz_slideshow_cat');
    ?>
    <script type="text/javascript">
      jQuery(window).load(function($) {
        jQuery('#slider').nivoSlider({
          effect:'<?php echo ($nivo_transition) ? $nivo_transition : "random";?>',
          slices:<?php echo ($nivo_slices) ? $nivo_slices : "15";?>,
          animSpeed:<?php echo ($nivo_animspeed) ? $nivo_animspeed : "500";?>, 
          pauseTime:<?php echo ($nivo_pausespeed) ? $nivo_pausespeed : "3000";?>,
          directionNav:<?php echo ($nivo_directionNav) ? $nivo_directionNav : "true";?>,
          directionNavHide:<?php echo ($nivo_directionNavHide) ? $nivo_directionNavHide : "true";?>,
          controlNav:<?php echo ($nivo_controlNav) ? $nivo_controlNav : "true";?>
        });
      });
      </script> 
      
    <!-- Slideshow Wrapper -->
      <div id="slide-wrapper">
        <!-- Slideshow Start -->
        <div id="slider">
        <?php
          query_posts(array( 'post_type' => 'slideshow', 'posts_per_page' => -1,'slideshow_category'=>$cat,'orderby'=>$slideshow_order,'order'=>'DESC'));
          ?>
          <?php
          $counter = 0;
          while (have_posts() ) : the_post();
            $counter++;
            $slideshow_url = (get_post_meta($post->ID, '_slideshow_url', true )) ? get_post_meta($post->ID, '_slideshow_url', true ) : get_permalink();
            ?>
            <?php if ($enable_caption == "true") { ?>
              <?php if ($nivo_disable_permalink == "false") { ?>
                <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <a href="<?php echo $slideshow_url;?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" title="#htmlcaption<?php echo $counter;?>"/></a>
                  <?php } ?>                
                <?php }  else { ?>
                  <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" title="#htmlcaption<?php echo $counter;?>"/>
                <?php }?>            
              <?php } else { ?>
                <?php if ($nivo_disable_permalink == "false") { ?>
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <a href="<?php echo $slideshow_url;?>">
                    <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" />
                  </a>                
                  <?php } ?>
                <?php } else { ?>
                  <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" />
                <?php } ?>
              <?php } ?>
          <?php endwhile;?>   
          <?php wp_reset_query();?> 
        </div>
        
        <?php
      if ($enable_caption == "true") {
          $counter = 0;
          query_posts(array( 'post_type' => 'slideshow', 'posts_per_page' => -1,'slideshow_category'=>$cat,'orderby'=>$slideshow_order,'order'=>'DESC'));
          while (have_posts() ) : the_post();
          $slideshow_url = (get_post_meta($post->ID, '_slideshow_url', true )) ? get_post_meta($post->ID, '_slideshow_url', true ) : get_permalink();
          $counter++;
          ?>
          <div id="htmlcaption<?php echo $counter;?>" class="nivo-html-caption">
            <a href="<?php echo $slideshow_url;?>"><?php the_title();?>
            <p><?php  if($post->post_excerpt) { echo get_the_excerpt(); } else { echo excerpt(20); } ?></p>
            </a>
          </div>
          <?php endwhile;?>
          <?php wp_reset_query();?>
    <?php } ?>
    
        <!-- Slideshow End  -->
      </div>
      <!-- Slideshow Wrapper End -->
<?php } 

function get_kwicksslider($cat="",$slideshow_order) { 
  global $post;
  ?>
  
      <?php 
        $kwicks_speed = get_option('ecobiz_kwicks_speed');
        $kwicks_caption = get_option('ecobiz_kwicks_caption');
        $enable_caption = get_option('ecobiz_nivo_caption');
      ?>
      <script type="text/javascript">
      jQuery(document).ready(function($) {
      
        $('#kwicks1').kwicks({
      		event : 'mouseenter',
      		max : 800,
          spacing: 0,
          duration : <?php echo $kwicks_speed ? $kwicks_speed : 200;?>
      	});
        
        $(".heading-text").hide();
      
      	$('#kwicks1 li').mouseover(function() {
      	  $("#kwicks1 li.active .caption").stop().fadeTo("fase",0);
          $("#kwicks1 li.active .heading-text").stop().fadeTo("slow", 0.8);	
      		$("#kwicks1 li.active .heading-text p").stop().fadeTo("slow",0.8);
          if ($.browser.msie && $.browser.version.substr(0,1) == 8){
              $("#kwicks1 li.active .caption").hide();  
              $("#kwicks1 li.active .heading-text h3").show();	
            }
      	}).mouseout(function(){
      	   $(".caption").stop().fadeTo("fast",0.8);	 
            $("#kwicks1 li .heading-text").stop().fadeTo("slow", 0);
        		$("#kwicks1 li .heading-text p").stop().fadeTo("slow",0);
            if ($.browser.msie && $.browser.version.substr(0,1) == 8){
              $("#kwicks1 li .heading-text h3").hide();  
            }
      	});    
      });
      </script>  
      
      <!-- Slideshow Wrapper -->
      <div id="slide-wrapper">
        <!-- Slideshow Start -->
        <?php
          $categories = get_terms( 'slideshow_category', 'orderby=count&hide_empty=0' );
          foreach ($categories as $category) {
            if ($category->name == $cat) {
              $slide_num = $category->count;
            }
          }
          $kwicks_width = 960;
          $kwicks_max_width = $kwicks_width / $slide_num;
        ?>
        <ul id="kwicks1">
          <?php        
          query_posts(array( 'post_type' => 'slideshow', 'posts_per_page' => -1,'slideshow_category'=>$cat,'orderby'=>$slideshow_order,'order'=>'DESC'));
          while (have_posts() ) : the_post();
            $slideshow_url = (get_post_meta($post->ID, '_slideshow_url', true )) ? get_post_meta($post->ID, '_slideshow_url', true ) : get_permalink();
            $slide_permalink = "<a href=".get_permalink($post->ID).'>'.get_the_title()."</a>";
          ?>
          
          <li style="width:<?php echo $kwicks_max_width?>px;">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <a href="<?php echo $slideshow_url;?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" /></a>                
            <?php } ?>       
            <?php if ($kwicks_caption != "true") { ?>     
            <div class="caption">
              <h4 style="color: #ffffff;"><?php the_title();?></h4>
            </div>
            <div class="heading-text">
              <h3><a href="<?php echo $slideshow_url;?>" style="color: #ffffff;"><?php the_title();?></a></h3>
              <?php the_content();?>  
            </div>
            <?php } ?>
            <div class="shadow"></div>
          </li>
          <?php endwhile;?>
          <?php wp_reset_query();?>
        </ul>
        <!-- Slideshow End -->
      </div>
      <!-- Slideshow Wrapper End -->
<?php }
?>
