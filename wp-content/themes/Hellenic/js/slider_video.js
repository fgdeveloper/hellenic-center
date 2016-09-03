/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      slider_video.js
* Brief:       
*      JavaScript code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/

/***************************************************
  HOMEPAGE VIDEO SLIDER
****************************************************/

// definition, creating and configuration of object that implement homepage image slider
var homeVideoSlider = new Object;
// properties
homeVideoSlider.TMODE_FADE = 0; // fade mode used to slides transition  
homeVideoSlider.TMODE_MOVE = 1; // move mode used to slides transition 
homeVideoSlider.width = 480; // slider width in pixels
homeVideoSlider.height = 270; // slider height in pixels
homeVideoSlider.mode = homeVideoSlider.TMODE_STRIP; // slide transition mode
homeVideoSlider.maxLeft = 0; // maximum slide left position
homeVideoSlider.actualSlide = 0; // index of actually displayed slide, start from zero
homeVideoSlider.slidesCount = 0; // number od detected slides
homeVideoSlider.canChangeVideo = true; // if true slide can be changed
homeVideoSlider.canChangeText = true;
homeVideoSlider.animateTime = 800; // animation time
homeVideoSlider.timerHandle = null;
homeVideoSlider.autoplayAllow = true;
homeVideoSlider.interval = 5000; 

homeVideoSlider.init = function()
{
    var q = jQuery.noConflict(); 
    
    // get number of slides 
    homeVideoSlider.slidesCount = q('#video-slider .video-slide').length;
    q('#video-slider .video-slide:first').css('display', 'block');
    q('#video-slider .text-slide:first').css('display', 'block');     
            
    
    if(homeVideoSlider.slidesCount > 1)
    {            
        q('#video-slider').hover(
            function()
            {
                clearTimeout(homeVideoSlider.timerHandle);    
            },
            function()
            {
                if(homeVideoSlider.autoplayAllow)  
                {
                    homeVideoSlider.timerHandle = setTimeout(homeVideoSlider.autoplay, homeVideoSlider.interval);    
                }             
            }
        );        
                
        if(homeVideoSlider.autoplayAllow)  
        {
            homeVideoSlider.timerHandle = setTimeout(homeVideoSlider.autoplay, homeVideoSlider.interval);    
        }    
        
        
        q('#video-slider .control-panel #next').click(function() { homeVideoSlider.swap(); });
        q('#video-slider .control-panel #prev').click(function() { homeVideoSlider.swapToPrev(); });

        if(homeVideoSlider.autoplayAllow)
        {
            q('#video-slider .control-panel #play').css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_pause_off.png')");    
        } else
        {
            q('#video-slider .control-panel #play').css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_play_off.png')");
        }
        // play
        q('#video-slider .control-panel #play').hover(
            function() { 
                if(homeVideoSlider.autoplayAllow)
                {
                    q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_pause_on.png')"); 
                } else
                {
                   q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_play_on.png')"); 
                }
            },
            function() { 
                if(homeVideoSlider.autoplayAllow)
                {
                    q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_pause_off.png')"); 
                } else
                {
                   q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_play_off.png')"); 
                } 
            }
        ); 
        
        q('#video-slider .control-panel #play').mousedown(
           function()
           {
                if(homeVideoSlider.autoplayAllow)
                {
                    clearTimeout(homeVideoSlider.timerHandle);
                    homeVideoSlider.autoplayAllow = false; 
                    q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_play_on.png')"); 
                } else
                {
                    homeVideoSlider.autoplayAllow = true;
                    homeVideoSlider.timerHandle = setTimeout(homeVideoSlider.autoplay, homeVideoSlider.interval);    
                   q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_pause_on.png')");   
                }           
           }
        ); 
        
        // next 
        q('#video-slider .control-panel #next').hover(
            function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_next_on.png')"); },
            function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_next_off.png')"); }
        );
        // prev  
        q('#video-slider .control-panel #prev').hover(
            function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_prev_on.png')"); },
            function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_video/button_prev_off.png')"); }
        );  
    
    } else
    {
        q('#video-slider .control-panel').css('display', 'none');
    }   
    
} // init

homeVideoSlider.autoplay = function()
{
    homeVideoSlider.swap();    
}

homeVideoSlider.swap = function()
{
    if(!homeVideoSlider.canChangeVideo || !homeVideoSlider.canChangeText) 
    {
        return;
    } 
    clearTimeout(homeVideoSlider.timerHandle);   
    homeVideoSlider.canChangeVideo = false;
    homeVideoSlider.canChangeText = false;
    
    var q = jQuery.noConflict();
     
    var next_slide = homeVideoSlider.actualSlide;
    var actual_slide = homeVideoSlider.actualSlide; 
    
    
    q('#video-slider .text-slide:eq('+next_slide+')').animate({opacity:0.0}, homeVideoSlider.animateTime,     
        function()
        {       
            q(this).css('display', 'none');                 
        });
        
    next_slide += 1;
    if(next_slide >= homeVideoSlider.slidesCount)
    {
        next_slide = 0;    
    }            
    
    q('#video-slider .text-slide:eq('+next_slide+')').css('opacity', 0.0).css('display', 'block').animate({opacity:1.0}, homeVideoSlider.animateTime,     
        function()
        {
            homeVideoSlider.canChangeText = true; 
            homeVideoSlider.actualSlide = next_slide;   
        });   

        
    q('#video-slider .video-slide:eq('+next_slide+')').css('right', -485).css('display', 'block').css('z-index', 2);
    q('#video-slider .video-slide:eq('+actual_slide+')').css('z-index', 1); 
    q('#video-slider .video-slide:eq('+next_slide+')').animate({right:0}, homeVideoSlider.animateTime,     
        function()
        {
            q('#video-slider .video-slide:eq('+actual_slide+')').css('right', -485);
            homeVideoSlider.canChangeVideo = true; 
            homeVideoSlider.actualSlide = next_slide; 
            
            if(homeVideoSlider.autoplayAllow)  
            {
                homeVideoSlider.timerHandle = setTimeout(homeVideoSlider.autoplay, homeVideoSlider.interval);    
            }                
        }); 
        
}


homeVideoSlider.swapToPrev = function()
{
    if(!homeVideoSlider.canChangeVideo || !homeVideoSlider.canChangeText) 
    {
        return;
    } 
    clearTimeout(homeVideoSlider.timerHandle);   
    homeVideoSlider.canChangeVideo = false;
    homeVideoSlider.canChangeText = false;
    
    var q = jQuery.noConflict();
     
    var next_slide = homeVideoSlider.actualSlide;
    var actual_slide = homeVideoSlider.actualSlide; 
    
    
    q('#video-slider .text-slide:eq('+next_slide+')').animate({opacity:0.0}, homeVideoSlider.animateTime,     
        function()
        {       
            q(this).css('display', 'none');                 
        });
        
    next_slide -= 1;
    if(next_slide < 0)
    {
        next_slide = homeVideoSlider.slidesCount-1;    
    }            
    
    q('#video-slider .text-slide:eq('+next_slide+')').css('opacity', 0.0).css('display', 'block').animate({opacity:1.0}, homeVideoSlider.animateTime,     
        function()
        {
            homeVideoSlider.canChangeText = true; 
            homeVideoSlider.actualSlide = next_slide;   
        });   

        
    q('#video-slider .video-slide:eq('+next_slide+')').css('right', -485).css('display', 'block').css('z-index', 2);
    q('#video-slider .video-slide:eq('+actual_slide+')').css('z-index', 1); 
    q('#video-slider .video-slide:eq('+next_slide+')').animate({right:0}, homeVideoSlider.animateTime,     
        function()
        {
            q('#video-slider .video-slide:eq('+actual_slide+')').css('right', -485); 
            homeVideoSlider.canChangeVideo = true; 
            homeVideoSlider.actualSlide = next_slide; 
            
            if(homeVideoSlider.autoplayAllow)  
            {
                homeVideoSlider.timerHandle = setTimeout(homeVideoSlider.autoplay, homeVideoSlider.interval);    
            }                
        }); 
        
}



















