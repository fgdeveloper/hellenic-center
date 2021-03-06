;jQuery(document).ready(function() {
	if(typeof slideShow == 'undefined') return;
	var slider = jQuery('#nivo_slider');
	jQuery('<div id="nivo_slider_loading"></div>').insertBefore('#nivo_slider');
	slider.nivoSlider({
		effect:slideShow['effect'],
		slices:slideShow['slices'],
		boxCols:slideShow['boxCols'],
		boxRows:slideShow['boxRows'],
		animSpeed:slideShow['animSpeed'],
		pauseTime:slideShow['pauseTime'],
		startSlide:0,
		directionNav:slideShow['directionNav'],
		directionNavHide:slideShow['directionNavHide'],
		controlNav:slideShow['controlNav'],
		controlNavThumbs:false, 
		keyboardNav:slideShow['keyboardNav'],
		pauseOnHover:slideShow['pauseOnHover'],
		manualAdvance:slideShow['manualAdvance'],
		captionOpacity:slideShow['captionOpacity'],
		randomStart:slideShow['randomStart'],
		beforeChange: function(){},
		afterChange: function(){
			frame.css('cursor','auto').unbind('click');
			var vars = slider.data('nivo:vars');
			var current = jQuery(slider.children()[vars.currentSlide]);
			if(current.is('a')){
				frame.css('cursor','pointer').click(function(){
					if(current.attr('target')=='_blank'){
						window.open(current.attr('href'));
					}else{
						location.href = current.attr('href');
					}
				});
			}
		},
		lastSlide: function(){
			if(slideShow['stopAtEnd']){
				slider.data('nivoslider').stop();
			}
		}
	});
	
	jQuery('<div id="nivo_slider_frame_top"></div>').appendTo(slider);
	var frame = jQuery('<div id="nivo_slider_frame"></div>').appendTo(slider);
	
	
	if(jQuery(":first",slider).is('a')){
		frame.css('cursor','pointer').click(function(){
			if(jQuery(":first",slider).attr('target')=='_blank'){
				window.open(jQuery(":first",slider).attr('href'));
			}else{
				location.href = jQuery(":first",slider).attr('href');
			}
		});
	}
	if(slideShow['controlNav']){
		slider.append('<div id="slider_control_bg"></div>');
	}

	slider.siblings('#nivo_slider_loading').animate({opacity:0}, 1000,function(){jQuery(this).remove();});

	jQuery('.nivo-controlNav', slider).hide();
	slider.hover(function(){
		jQuery('.nivo-controlNav', slider).show();
		if(!slideShow['captions']){
			jQuery('#slider_control_bg', slider).show();
		}
	}, function(){
		jQuery('.nivo-controlNav', slider).hide();
		if(!slideShow['captions']){
			jQuery('#slider_control_bg', slider).hide();
		}
	});	
});