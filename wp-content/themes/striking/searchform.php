<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
	<input type="text" class="text_input" value="<?php _e('Search..', 'striking_front');?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search..', 'striking_front');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search..', 'striking_front');?>';}" />
	<button type="submit" class="<?php echo apply_filters( 'theme_css_class', 'button' );?> gray"><span><?php _e('Search', 'striking_front');?></span></button>
</form>