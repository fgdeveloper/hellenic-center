=== Plugin Name ===
Contributors: Fractalia - Applications Lab
Tags: fractalia, plugin, post, background, attachment
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: trunk

== Description ==

This plugin allows you to add and image as background of posts, pages or custom post type in general (in the same way as a thumbnail).

== Installation ==

1. Download the plugin from [here](http://wordpress.org/extend/plugins/post-background/ "Post brackground").
1. Extract all the files. 
1. Upload everything (keeping the directory structure) to the `/wp-content/plugins/` directory.
1. There should be a `/wp-content/plugins/post-brackground` directory now with `post-brackground.php` in it.
1. Activate the plugin through the 'Plugins' menu in WordPress. A box will be added to the page edition.

== Frequently Asked Questions ==

= How it works? =

Exactly in the same way that thumbnails works. It includes the `get_the_post_background_src` function which return the url of the background and the `get_the_post_background_id` function which return the id of the attachment.

= Do I have embed the same background if I a page inherits its parent background? =

No. You can pass true as second parameter on `get_the_post_background_src` function.

== Screenshots ==

1. The background box for a post

== Changelog ==
- 0.1 Initial release
- 0.1.2 Fixed some bugs and added the parent background inheritance
- 0.1.5 Added has_post_background function
- 0.1.7 Fixed some bugs