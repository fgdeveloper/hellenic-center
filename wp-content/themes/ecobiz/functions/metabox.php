<?php  

/* Add Meta Box for Portfolio */
function imediapixel_portfolio_meta_boxes() {
  $meta_boxes = array(
    "portfolio_link" => array(
      "name" => "_portfolio_link",
      "title" => __("Preview link",'ecobiz'),
      "description" => "please enter image or video url if you want to create video post.<br/>Images : <br />http://localhost/ecobiz/wp-content/uploads/2010/07/image.jpg<br/> Video : <br />
      http://www.youtube.com/watch?v=tESK9RcyexU<br />
      http://vimeo.com/12816548<br />
      http://localhost/ecobiz/wp-content/uploads/2010/07/sample.3gp<br />
      http://localhost/ecobiz/wp-content/uploads/2010/07/sample.mp4<br />
      http://localhost/ecobiz/wp-content/uploads/2010/07/sample.mov<br />
      http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf?width=680&height=405<br />
      Note : for swf movie, you need to specify the width and height for movie, as above example",
      "type" => "text"
    ),
    "portfolio_url" => array(
      "name" => "_portfolio_url",
      "title" => __("Custom URL",'ecobiz'),
      "description" => "Add link / custom URL for your portfolio items, eg. link to external url.",
      "type" => "text"
    ),
    "portfolio_type" => array(
      "name" => "_portfolio_type",
      "title" => __("Portfolio Type",'ecobiz'),
      "description" => "please select your portfolio type (image or video).",
      "type" => "select",
      "options" => array("image","video")
    ),
    "portfolio_images" => array(
      "name" => "_portfolio_images",
      "title" => __("Portfolio Images ",'ecobiz'),
      "description" => "please enter your images url in comma-separated, this will be used portfolio single page showcase.",
      "type" => "textarea"
    ),
  );
  
  return apply_filters( 'imediapixel_portfolio_meta_boxes', $meta_boxes );
}

function imediapixel_slideshow_meta_boxes() {

  $meta_boxes = array(
    "slideshow_url" => array(
      "name" => "_slideshow_url",
      "title" => __("Custom Slideshow URL",'ecobiz'),
      "description" => __("Custom URL for slideshow items.",'ecobiz'),
      "type" => "text"
    )
  );

	return apply_filters( 'imediapixel_slideshow_meta_boxes', $meta_boxes );
}


function imediapixel_product_meta_boxes() {

  $meta_boxes = array(
    "product_price" => array(
      "name" => "_product_price",
      "title" => __("Product Price",'ecobiz'),
      "description" => __("Add price for your product",'ecobiz'),
      "type" => "text"
    ),
    "product_feature" => array(
      "name" => "_product_feature",
      "title" => __("Product Features",'ecobiz'),
      "description" => __("Please enter your product features in comma-separated, eg. feature 1, feature 2",'ecobiz'),
      "type" => "textarea"
    ),
    "product_url" => array(
      "name" => "_product_url",
      "title" => __("Custom Product Url",'ecobiz'),
      "description" => __("Please enter your custom url for your product,if not setted then will be linked to actual product page",'ecobiz'),
      "type" => "text"
    )         
  );

	return apply_filters( 'imediapixel_product_meta_boxes', $meta_boxes );
}

function imediapixel_page_meta_boxes() {

  $meta_boxes = array(
    "heading_image" => array(
      "name" => "_heading_image",
      "title" => __("Page Heading Image",'ecobiz'),
      "description" => __("Add your image URL that will be used as page heading image.",'ecobiz'),
      "type" => "text"
    ),
    "bgtext_heading_position" => array(
      "name" => "_bgtext_heading_position",
      "title" => __("Heading Text Position",'ecobiz'),
      "description" => __("Select heading text position",'ecobiz'),
      "type" => "select",
      "options" => array("left","right")
    ),
    "page_short_desc" => array(
      "name" => "_page_short_desc",
      "title" => __("Short Description",'ecobiz'),
      "description" => __("Add short description for your page.",'ecobiz'),
      "type" => "text"
    ),
    "page_slideshow_type" => array(
      "name" => "_page_slideshow_type",
      "title" => __("Page slideshow type",'ecobiz'),
      "description" => __("Select default slideshow for page",'ecobiz'),
      "std" => "None",
      "type" => "select",
      "options" => array("None","Nivo slider","Kwicks slider")
    ),
    "page_slideshow_category" => array(
      "name" => "_page_slideshow_category",
      "title" => __("Page slideshow category",'ecobiz'),
      "description" => __("Select default slideshow category for page",'ecobiz'),
      "std" => "None",
      "type" => "select_slidehow"
    ),
  );

	return apply_filters( 'imediapixel_slideshow_meta_boxes', $meta_boxes );
}

function  portfolio_meta_boxes() {
  global $post;
  $meta_boxes = imediapixel_portfolio_meta_boxes();
  ?>

  <table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
  </table>
  <?php
}

function slideshow_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_slideshow_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
	</table>
<?php
}


function product_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_product_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function page_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_page_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
    elseif ( $meta['type'] == 'select_slidehow' )
			get_meta_select_slideshow( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function get_meta_text_input( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;" /><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_select( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_select_slideshow( $args = array(), $value = false ) {

	extract( $args ); 
  
  $slideshow_categories =  get_categories('taxonomy=slideshow_category&orderby=ID&title_li=&hide_empty=0');
  ?>
  
	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $slideshow_categories as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option->cat_name ) echo ' selected="selected"'; ?>>
					<?php echo $option->cat_name; ?>
				</option>
			<?php endforeach; ?>
			</select><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value, 1 ); ?></textarea><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function imediapixel_create_meta_box() {
	global $theme_name;

  add_meta_box( 'page-meta-boxes', __('Page options','ecobiz'), 'page_meta_boxes', 'page', 'normal', 'high' );
	add_meta_box( 'slideshow-meta-boxes', __('Slideshow options','ecobiz'), 'slideshow_meta_boxes', 'slideshow', 'normal', 'high' );
	add_meta_box( 'portfolio-meta-boxes', __('Portfolio options','ecobiz'), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	add_meta_box( 'product-meta-boxes', __('Product options','ecobiz'), 'product_meta_boxes', 'product', 'normal', 'high' );
}

function imediapixel_save_meta_data( $post_id ) {
	global $post;
  
  if ( 'slideshow' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_slideshow_meta_boxes() );
  else if ( 'page' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_page_meta_boxes() );
  else if ( 'product' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_product_meta_boxes() );    
  else
    $meta_boxes = array_merge( imediapixel_portfolio_meta_boxes() );
  
	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;
    
    elseif ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
      
		elseif ( 'slideshow' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		elseif ( 'portfolio' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		elseif ( 'product' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
			
		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
}



/* Add a new meta box to the admin menu. */
	add_action( 'admin_menu', 'imediapixel_create_meta_box' );

/* Saves the meta box data. */
	add_action( 'save_post', 'imediapixel_save_meta_data' );

?>