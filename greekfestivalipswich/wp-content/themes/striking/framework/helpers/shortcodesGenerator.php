<?php
include_once (THEME_HELPERS . '/optionGenerator.php');
class shortcodesGenerator extends optionGenerator {
	
	function shortcodesGenerator($shortcodes){
		$this->options = $shortcodes;
		$this->render();
	}
	
	/**
	 * displays a upload field
	 */
	function upload($value) {
		global $post_ID, $temp_ID;
		$postid = (int) (0 == $post_ID ? $temp_ID : $post_ID);
		$size = isset($value['size']) ? $value['size'] : '25';
		$button = isset($value['button']) ? $value['button'] : 'Insert Image';
		if (isset($this->saved_options[$value['id']])) {
			$value['default'] = stripslashes($this->saved_options[$value['id']]);
		}
		echo '<tr><th scope="row"><h4>' . $value['name'] . '</h4></th><td>';
		echo '<div id="' . $value['id'] . '_preview" class="theme-option-image-preview">';
		if (! empty($value['default'])) {
			echo '<a class="thickbox" href="' . $value['default'] . '" target="_blank"><img src="' . $value['default'] . '"/></a>';
		}
		echo '</div>';
		if(isset($value['desc'])){
			echo '<p class="description">' . $value['desc'] . '</p>';
		}
		echo '<input type="text" id="' . $value['id'] . '" name="' . $value['id'] . '" size="' . $size . '"  value="';
		echo $value['default'];
		echo '" /><div class="theme-upload-buttons"><a class="thickbox button theme-upload-button" id="' . $value['id'] . '" href="'.admin_url('media-upload.php?&post_id='.$postid.'&target=' . $value['id'] . '&option_image_upload=1&type=image&TB_iframe=1&width=640&height=644').'">'.$button.'</a></div>';
		echo '</td></tr>';
	}
	
	function render() {
		echo '<div class="shortcode_selector"><table class="theme-options-table" cellspacing="0"><tbody><tr><th scope="row" style="text-align:right"><h4><label for="shortcode_selector">Shortcode</label></h4></th><td><select name="sc_selector">';
		echo '<option value="">Choose one...</option>';
		foreach($this->options as $shortcode) {
			echo '<option value="'.$shortcode['value'].'">'.$shortcode['name'].'</option>';
		}
		echo '</select></td></tr></tbody></table></div>';
		foreach($this->options as $shortcode) {
			echo '<div id="shortcode_'.$shortcode['value'].'" class="shortcode_wrap">';
			if(isset($shortcode['sub'])){
				echo '<div class="shortcode_sub_selector"><table cellspacing="0" class="theme-options-table"><tbody><th scope="row"><h4><label for="shortcode_selector">Type</label></h4></th><td><select name="sc_'.$shortcode['value'].'_selector">';
				echo '<option value="">Choose one...</option>';
				foreach($shortcode['options'] as $sub_shortcode) {
					echo '<option value="'.$sub_shortcode['value'].'">'.$sub_shortcode['name'].'</option>';
				}
				echo '</select></td></tr></tbody></table></div>';
				foreach($shortcode['options'] as $sub_shortcode) {
					echo '<div id="sub_shortcode_'.$sub_shortcode['value'].'" class="sub_shortcode_wrap"><table cellspacing="0" class="theme-options-table"><tbody>';
					foreach($sub_shortcode['options'] as $option){
						if (method_exists($this, $option['type'])) {
							$option['id']='sc_'.$shortcode['value'].'_'.$sub_shortcode['value'].'_'.$option['id'];
							$this->$option['type']($option);
						}
					}
					echo '</tbody></table></div>';
				}
			}else{
				echo '<table cellspacing="0" class="theme-options-table"><tbody>';
				foreach($shortcode['options'] as $option){
					if (method_exists($this, $option['type'])) {
						$option['id']='sc_'.$shortcode['value'].'_'.$option['id'];
						$this->$option['type']($option);
					}
				}
				echo '</tbody></table>';
			}
			
			echo '</div>';
		}
		echo '<p><input type="button" id="shortcode_send" class="button" value="Send Shortcode to Editor »"/></p>';
	}
	
}