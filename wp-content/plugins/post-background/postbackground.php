<?php
/*
  Plugin Name: Post background
  Description: This plugin allows you to add and image as background of posts, pages or custom post type in general (in the same way as a thumbnail).
  Author: Fractalia - Applications lab
  Author URI: http://fractalia.pe
  Version: 0.1.10
  Tags: fractalia, wordpress, post, background, thumbnail, attachment, plugin

 * License: GNU General Public License, v2 (or newer)
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

class post_background {

    protected $_pluginURI;

    public function __construct() {
        $this->_pluginURI = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__));
        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_print_scripts', array($this, 'admin_print_scripts'));
        add_filter('attachment_fields_to_edit', array(&$this, 'attachment_fields_to_edit'), 20, 2);
        load_plugin_textdomain('postbackground', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function admin_init() {        
        foreach (get_post_types(array('public' => true), 'names') as $post_type) {
            if($post_type != 'attachment'){
                add_meta_box('post_background', __('Background Image', 'postbackground'), array($this, 'add_meta_box'), $post_type, 'side', 'low');
            }
        }
    }

    public function add_meta_box() {
        global $post;
        $attachment_id = get_post_meta($post->ID, '_background_id', true);
        $ajax_nonce = wp_create_nonce("post_background-" . $_GET['post']);
        ?>
        <?php if ($attachment_id): ?>
            <p class="hide-if-no-js"><a class="thickbox" href="media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=image&amp;tab=type&amp;TB_iframe=1&amp;width=640&amp;height=310" id="set-post-background"><?php echo wp_get_attachment_image($attachment_id); ?></a></p>
            <p class="hide-if-no-js"><a onclick="WPRemoveBackground(<?php echo $post->ID; ?>,'<?php echo $ajax_nonce; ?>');return false;" id="remove-post-background" href="#"><?php _e('Remove the background', 'postbackground'); ?></a></p>
        <?php else: ?>
            <p class="hide-if-no-js"><a class="thickbox" href="media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=image&amp;tab=type&amp;TB_iframe=1&amp;width=640&amp;height=310" id="set-post-background"><?php _e('Set background image', 'postbackground'); ?></a></p>
        <?php endif; ?>
        <?php
    }

    function admin_print_scripts() {
        wp_register_script('post-background', $this->_pluginURI . '/postbackground.js', array('jquery', 'media-upload', 'thickbox'));
        wp_enqueue_script('post-background');
        echo '<script type="text/javascript">var postbackgroundURI = "' . $this->_pluginURI . '";</script>';
    }

    function attachment_fields_to_edit($fields, $post) {
        if (isset($fields['image-size']) && isset($post->ID)) {
            $ajax_nonce = wp_create_nonce("post_background-" . $_GET['post']);
            $image_id = (int) $post->ID;
            $output = '<a onclick="WPSetAsBackground(' . $image_id . ',\'' . $ajax_nonce . '\');return false;" href="#" id="wp-post-background-' . $image_id . '" class="wp-post-background">' . __('Use as post background', 'postbackground') . '</a>';
            $fields['image-size']['extra_rows']['postbackground']['html'] = $output;
        }
        return $fields;
    }

}

$postbackground = new post_background();

function get_post_background_id($post_id = null) {
    if (!isset($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    return get_post_meta($post_id, '_background_id', true);
}

function has_post_background($post_id = null) {
    $post_id = ( null === $post_id ) ? get_the_ID() : $post_id;
    return (bool) get_post_background_id($post_id);
}

function the_post_background($size = 'fullsize', $attr = '') {
    echo get_the_post_background(null, $size = 'fullsize', $attr = '');
}

function get_the_post_background($post_id = null, $size = 'fullsize', $attr = '') {
    $attr = is_array($attr) ? array_merge(array('class' => 'wp-post-background'), $attr) : $attr . '&class=wp-post-background';
    return wp_get_attachment_image(get_post_background_id($post_id), $size, false, $attr);
}

function get_the_post_background_src($post_id = null, $size = 'fullsize', $inherit = false) {
    if (!isset($post_id)) {
        global $post;
        $post_id = $post->ID;
    }

    $attachment_id = get_post_background_id($post_id);
    if (($attachment_id == '') && $inherit) {
        $ancestors = get_post_ancestors($post_id);
        foreach ($ancestors as $ancestor) {
            $attachment_id = get_post_background_id($ancestor);
            if ($attachment_id) {
                break;
            }
        }
    }

    list($src, $width, $height) = wp_get_attachment_image_src($attachment_id, $size);
    
    return $src;
}
?>