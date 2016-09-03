/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      slider_prestige.js
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
  HOMEPAGE FADER/MOVER/STRIP/MIX SLIDER
****************************************************/

// definition, creating and configuration of object that implement homepage image slider
var homeImageSlider = new Object;
// properties
homeImageSlider.TMODE_FADE = 0; // fade mode used to slides transition  
homeImageSlider.TMODE_MOVE = 1; // move mode used to slides transition 
homeImageSlider.TMODE_STRIP = 2; // strip mode used to slides transition
homeImageSlider.TMODE_MIX = 3; // mix mode used to slides transition, only move mode and strip mode
homeImageSlider.width = 460; // slider width in pixels
homeImageSlider.height = 227; // slider height in pixels
homeImageSlider.mode = homeImageSlider.TMODE_STRIP; // slide transition mode
homeImageSlider.maxLeft = 0; // maximum slide left position
homeImageSlider.actualSlide = 0; // index of actually displayed slide, start from zero
homeImageSlider.slidesCount = 0; // number od detected slides
homeImageSlider.thumbsCount = 0; // number of detected thumbs
homeImageSlider.canChange = true; // if true slide can be changed
homeImageSlider.animateTime = 800; // animation time
homeImageSlider.animateTimeStrip = 400; // animation time for strip transition 
homeImageSlider.manageThumbsClick = false; // should manage thumbs

homeImageSlider.init = function()
{
    var q = jQuery.noConflict(); 
    
    // get number of slides 
    homeImageSlider.slidesCount = q('#fader-slider .slides-container .slide').length;
    // hile all slides behind right edge of slides-container
    q('#fader-slider .slides-container .slide').each(
        function () {q(this).css('opacity', 0.0).css('left', homeImageSlider.width); }
    );
    // but first slide make visible
    q('#fader-slider .slides-container .slide:eq(0)').css('opacity', 1.0).css('left', homeImageSlider.maxLeft);   
    // get number of thumbs
    homeImageSlider.thumbsCount = q('#fader-slider .thumbs-container .thumb').length;
    homeImageSlider.showThumb(0);
    // bind function to click event for thumbs
    if(homeImageSlider.manageThumbsClick)
    {
        q('#fader-slider .thumbs-container .thumb').each(
          function() {
             q(this).bind('click', 
                function() {
                    index = q('#fader-slider .thumbs-container .thumb').index(this);
                    homeImageSlider.flipToSelected(index);
                });
          }); 
    }   
} // init

homeImageSlider.getAnimateTime = function()
{
    var value = 0;
    if(homeImageSlider.mode == homeImageSlider.TMODE_STRIP)
    {
        value = homeImageSlider.animateTimeStrip; 
    } else
    {
        value = homeImageSlider.animateTime;
    }
    
    return value;    
} // getAnimateTime

homeImageSlider.flipToNext = function()
{
    // check slideer mode
    switch(homeImageSlider.mode)
    {
        // fade transition
        case homeImageSlider.TMODE_FADE:
            homeImageSlider.nextFade();
        break;
        // move transition
        case homeImageSlider.TMODE_MOVE:
            homeImageSlider.nextMove();
        break;
        // strip transition
        case homeImageSlider.TMODE_STRIP:
            homeImageSlider.nextStrip();
        break;
        // mix transition
        case homeImageSlider.TMODE_MIX:
        {
            var temp = Math.random();
            if(temp < 0.5)
            {
                homeImageSlider.nextFade();
            } else
            {
                homeImageSlider.nextStrip();
            }
        }
        break;
    } // switch
} // flipToNext

homeImageSlider.flipToPrev = function()
{
    // check slideer mode
    switch(homeImageSlider.mode)
    {
        // fade transition
        case homeImageSlider.TMODE_FADE:
            homeImageSlider.prevFade();
        break;
        // move transition
        case homeImageSlider.TMODE_MOVE:
            homeImageSlider.prevMove();
        break;
        // strip transition
        case homeImageSlider.TMODE_STRIP:
            homeImageSlider.prevStrip();
        break;
        // mix transition
        case homeImageSlider.TMODE_MIX:
        {
            var temp = Math.random();
            if(temp < 0.5)
            {
                homeImageSlider.prevFade();
            } else
            {
                homeImageSlider.prevStrip();
            }
        }
        break;
    } // switch
} // flipToPrev

homeImageSlider.flipToSelected = function(index)
{   
    switch(homeImageSlider.mode)
    {
        // fade transition
        case homeImageSlider.TMODE_FADE:
            homeImageSlider.selectedFade(index); 
        break;
        // move transition
        case homeImageSlider.TMODE_MOVE:
            homeImageSlider.selectedMove(index); 
        break;
        // strop stransition
        case homeImageSlider.TMODE_STRIP:
            homeImageSlider.selectedStrip(index);
        break;
        // mix transition
        case homeImageSlider.TMODE_MIX:
        {            
            var temp = Math.random();
            if(temp < 0.5)
            {   
                homeImageSlider.selectedFade(index);
            } else
            {
                homeImageSlider.selectedStrip(index);
            }
        }        
        break;
    } // switch
} // flipToSelected

homeImageSlider.showThumb = function(index)
{
    var q = jQuery.noConflict(); 
    
    // check range, cant switch on not existing thumb
    if(index >= homeImageSlider.slidesCount)
    {
       return;
    }
    // switch off all thumbs
    q('#fader-slider .thumbs-container .thumb').each(
        function()
        {
            q(this).find('.image:eq(0)').css('z-index', 2);
            q(this).find('.image:eq(1)').css('z-index', 3);     
        }
    );
    // switch on given thumb
    var thumb = q('#fader-slider .thumbs-container .thumb:eq('+index+')');
    q(thumb).find('.image:eq(0)').css('z-index', 3);
    q(thumb).find('.image:eq(1)').css('z-index', 2);     
} // showThumb

homeImageSlider.nextSlide = function()
{
    // switch to next slide
    homeImageSlider.actualSlide++;
    // check range
    if(homeImageSlider.actualSlide >= homeImageSlider.slidesCount)
    {
      homeImageSlider.actualSlide = 0;
    }
} // nextSlide

homeImageSlider.prevSlide = function()
{
    // switch to prev slide
    homeImageSlider.actualSlide--;
    // check range
    if(homeImageSlider.actualSlide < 0)
    {
      homeImageSlider.actualSlide = homeImageSlider.slidesCount - 1;
    }
} // prevSlide

homeImageSlider.selectSlide = function(index)
{
    homeImageSlider.actualSlide = index;
    // check range
    if((homeImageSlider.actualSlide < 0) || (homeImageSlider.actualSlide >= homeImageSlider.slidesCount))
    {
      homeImageSlider.actualSlide = 0;
    }
} // selectSlide

homeImageSlider.nextMove = function()
{  
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.nextSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(newHandle).css('left', homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    q(oldHandle).css('z-index', 1);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);
    // animate slide
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTime, 'easeOutCirc',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // nextMove

homeImageSlider.prevMove = function()
{  
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to prev slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.prevSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(newHandle).css('left', homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    q(oldHandle).css('z-index', 1);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slite
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTime, 'easeOutCirc',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // prevMode

homeImageSlider.selectedMove = function(index)
{  
    var q = jQuery.noConflict(); 
    
    // we cant switch on currently visibile slide
    if(homeImageSlider.actualSlide == index)
    {
        return;
    }
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to prev slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.selectSlide(index);
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(newHandle).css('left', homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    q(oldHandle).css('z-index', 1);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slite
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTime, 'easeOutCirc',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // prevMode

homeImageSlider.nextFade = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.nextSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('opacity', 0.0).css('left', homeImageSlider.maxLeft).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(newHandle).animate({opacity: 1.0}, homeImageSlider.animateTime, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );            
} // nextFade

homeImageSlider.prevFade = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.prevSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('opacity', 0.0).css('left', homeImageSlider.maxLeft).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(newHandle).animate({opacity: 1.0}, homeImageSlider.animateTime, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );            
} // prevFade

homeImageSlider.selectedFade = function(index)
{
    var q = jQuery.noConflict(); 
    
    // we cant switch on currently visibile slide
    if(homeImageSlider.actualSlide == index)
    {
        return;
    }
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.selectSlide(index);
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('opacity', 0.0).css('left', homeImageSlider.maxLeft).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(newHandle).animate({opacity: 1.0}, homeImageSlider.animateTime, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );            
} // selectedFade

homeImageSlider.nextStrip = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.nextSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('left', homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(oldHandle).animate({left: -homeImageSlider.width}, homeImageSlider.animateTimeStrip, 'linear');
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTimeStrip, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // nextStrip 

homeImageSlider.prevStrip = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.prevSlide();
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('left', -homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(oldHandle).animate({left: homeImageSlider.width}, homeImageSlider.animateTimeStrip, 'linear');
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTimeStrip, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // prevStrip

homeImageSlider.selectedStrip = function(index)
{
    var q = jQuery.noConflict(); 
    
    // we cant switch on currently visibile slide
    if(homeImageSlider.actualSlide == index)
    {
        return;
    }
    // if animation in proges we leave function
    if(false == homeImageSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeImageSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeImageSlider.actualSlide;
    homeImageSlider.selectSlide(index);
    // get slides handle
    var oldHandle = q("#fader-slider .slides-container .slide:eq("+oldSlide+")");
    var newHandle = q("#fader-slider .slides-container .slide:eq("+homeImageSlider.actualSlide+")");
    // set correct z-index value
    q(oldHandle).css('opacity', 1.0).css('z-index', 1);
    q(newHandle).css('left', homeImageSlider.width).css('opacity', 1.0).css('z-index', 2);
    // switch thumb
    homeImageSlider.showThumb(homeImageSlider.actualSlide);    
    // animate slide
    q(oldHandle).animate({left: -homeImageSlider.width}, homeImageSlider.animateTimeStrip, 'linear');
    q(newHandle).animate({left: homeImageSlider.maxLeft}, homeImageSlider.animateTimeStrip, 'linear',
        function() {
            // hide old slide
            q(oldHandle).css('left', homeImageSlider.width);
            homeImageSlider.canChange = true;
        } 
    );   
} // prevStrip  

/***************************************************
  HOMEPAGE TEXT FEATURE SLIDER
****************************************************/

// definition, creating and configuration of object which manage implement homepage text feature slider
var homeFeatureSlider = new Object;
// properties
homeFeatureSlider.actualSlide = 0; // index of actually displayed slide, start from zero
homeFeatureSlider.slidesCount = 0; // number od detected slides
homeFeatureSlider.canChange = true; // if true slide can be changed
homeFeatureSlider.animateTime = 800; // animation time - transition time
homeFeatureSlider.width = 428; // slider width
homeFeatureSlider.maxLeft = 40; // maximum slide left position  

homeFeatureSlider.init =  function()
{
    var q = jQuery.noConflict(); 
    
    // get number of slides 
    homeFeatureSlider.slidesCount = q('#text-feature-container .text-feature').length;
    // hile all slides
    q('#text-feature-container .text-feature').each(
        function () {
            q(this).css('opacity', 0.0).css('left', homeFeatureSlider.width);
            q(this).find('h1').css('opacity', 0.0); 
        }
    );
    // but first slide make visible
    q('#text-feature-container .text-feature:eq(0)').each(
        function () {
            q(this).css('opacity', 1.0).css('left', homeFeatureSlider.maxLeft);
            q(this).find('h1').css('opacity', 1.0);    
        }
    );
} // init

homeFeatureSlider.nextSlide = function()
{
    // switch to next slide
    homeFeatureSlider.actualSlide++;
    // check range
    if(homeFeatureSlider.actualSlide >= homeFeatureSlider.slidesCount)
    {
      homeFeatureSlider.actualSlide = 0;
    }
} // nextSlide

homeFeatureSlider.prevSlide = function()
{
    // switch to prev slide
    homeFeatureSlider.actualSlide--;
    // check range
    if(homeFeatureSlider.actualSlide < 0)
    {
      homeFeatureSlider.actualSlide = homeFeatureSlider.slidesCount - 1;
    }
} // prevSlide

homeFeatureSlider.selectSlide = function(index)
{
    homeFeatureSlider.actualSlide = index;
    // check range
    if((homeFeatureSlider.actualSlide < 0) || (homeFeatureSlider.actualSlide >= homeFeatureSlider.slidesCount))
    {
      homeFeatureSlider.actualSlide = 0;
    }
} // selectSlide

homeFeatureSlider.nextFade = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeFeatureSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeFeatureSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeFeatureSlider.actualSlide;
    homeFeatureSlider.nextSlide();
    // get slides handle
    var oldHandle = q("#text-feature-container .text-feature:eq("+oldSlide+")");
    var newHandle = q("#text-feature-container .text-feature:eq("+homeFeatureSlider.actualSlide+")");
    // set css styles for correctly looking transition
    q(oldHandle).css('opacity', 1.0);
    q(newHandle).css('opacity', 0.0).css('left', homeFeatureSlider.maxLeft);    
    // animate slide
    q(oldHandle).find('h1').animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear');
    q(oldHandle).stop().animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear',
        function () {
            q(this).css('left', homeFeatureSlider.width);
            homeFeatureSlider.canChange = true;
        }
    );
    q(newHandle).find('h1').animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');
    q(newHandle).stop().animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');            
} // nextFade

homeFeatureSlider.prevFade = function()
{
    var q = jQuery.noConflict(); 
    
    // if animation in proges we leave function
    if(false == homeFeatureSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeFeatureSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeFeatureSlider.actualSlide;
    homeFeatureSlider.prevSlide();
    // get slides handle
    var oldHandle = q("#text-feature-container .text-feature:eq("+oldSlide+")");
    var newHandle = q("#text-feature-container .text-feature:eq("+homeFeatureSlider.actualSlide+")");
    // set css styles for correctly looking transition
    q(oldHandle).css('opacity', 1.0);
    q(newHandle).css('opacity', 0.0).css('left', homeFeatureSlider.maxLeft);    
    // animate slide
    q(oldHandle).find('h1').animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear');
    q(oldHandle).stop().animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear',
        function () {
            q(this).css('left', homeFeatureSlider.width);
            homeFeatureSlider.canChange = true;
        }
    );
    q(newHandle).find('h1').animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');
    q(newHandle).stop().animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');            
} // prevFade

homeFeatureSlider.selectedFade = function(index)
{
    var q = jQuery.noConflict(); 
    
    // we cant switch on currently visibile slide
    if(homeFeatureSlider.actualSlide == index)
    {
        return;
    }
    // if animation in proges we leave function
    if(false == homeFeatureSlider.canChange) 
    {
        return;   
    }
    // block slide change
    homeFeatureSlider.canChange = false;

    // switch to next slide
    var oldSlide = homeFeatureSlider.actualSlide;
    homeFeatureSlider.selectSlide(index);
    // get slides handle
    var oldHandle = q("#text-feature-container .text-feature:eq("+oldSlide+")");
    var newHandle = q("#text-feature-container .text-feature:eq("+homeFeatureSlider.actualSlide+")");
    // set css styles for correctly looking transition
    q(oldHandle).css('opacity', 1.0);
    q(newHandle).css('opacity', 0.0).css('left', homeFeatureSlider.maxLeft);    
    // animate slide
    q(oldHandle).find('h1').animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear');
    q(oldHandle).stop().animate({opacity: 0.0}, homeFeatureSlider.animateTime, 'linear',
        function () {
            q(this).css('left', homeFeatureSlider.width);
            homeFeatureSlider.canChange = true;
        }
    );
    q(newHandle).find('h1').animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');
    q(newHandle).stop().animate({opacity: 1.0}, homeFeatureSlider.animateTime, 'linear');            
} // selectedFade

homeFeatureSlider.flipToNext = function()
{
    homeFeatureSlider.nextFade();
} // flipToNext

homeFeatureSlider.flipToPrev = function()
{
    homeFeatureSlider.prevFade(); 
} // flipToPrev

homeFeatureSlider.flipToSelected = function(index)
{
    homeFeatureSlider.selectedFade(index);
} // flipToSelected

/***************************************************
  HOMEPAGE IMAGE AND FEATURE SLIDER MANAGER
****************************************************/

// definition, creating and configuration of object which manage homepage image slider
// and home page text feature slider
var homeManagerSlider = new Object;
// properties
homeManagerSlider.shouldAutoplay = true; // should slider auto rotate
homeManagerSlider.duration = 5000; // time to switch to next slide
homeManagerSlider.timerHandle = null; // handle to autoplay timer

homeManagerSlider.init = function()
{
    var q = jQuery.noConflict(); 
    
    // bind function to click event for all image slider thumbs
    q('#fader-slider .thumbs-container .thumb').each(
      function() {
         q(this).bind('click', 
            function() {
                index = q('#fader-slider .thumbs-container .thumb').index(this);
                homeManagerSlider.flipToSelected(index);
            });
      });
      
    // fire up autoplay
    if(homeManagerSlider.shouldAutoplay)
    {
        homeManagerSlider.startAutoPlay();          
    }
} // init

homeManagerSlider.autoplay = function()
{  
    // flip to next slide
    homeManagerSlider.flipToNext();  
} // autoplay 

homeManagerSlider.startAutoPlay = function()
{
    homeManagerSlider.shouldAutoplay = true;
    homeManagerSlider.timerHandle = setTimeout(homeManagerSlider.autoplay, homeManagerSlider.duration);
} // startAutoPlay

homeManagerSlider.stopAutoPlay = function()
{
    clearTimeout(homeManagerSlider.timerHandle);
    homeManagerSlider.timerHandle = null;
    homeManagerSlider.shouldAutoplay = false;    
} // stopAutoPlay 

homeManagerSlider.restartAutoPlay = function(time)
{
    clearTimeout(homeManagerSlider.timerHandle);
    homeManagerSlider.timerHandle = null;    
    homeManagerSlider.timerHandle = setTimeout(homeManagerSlider.autoplay, time);       
} // restartAutoPlay

homeManagerSlider.flipToSelected = function(index)
{
    if(homeImageSlider.canChange &&  homeFeatureSlider.canChange)
    {
        homeImageSlider.flipToSelected(index);
        homeFeatureSlider.flipToSelected(index);
        // if slider is in autoplay mode we must restart it
        if(homeManagerSlider.shouldAutoplay)
        {
            homeManagerSlider.restartAutoPlay(homeImageSlider.getAnimateTime() + homeManagerSlider.duration);    
        }     
    }
} // flipToSelected

homeManagerSlider.flipToNext = function()
{
    if(homeImageSlider.canChange &&  homeFeatureSlider.canChange)
    {    
        homeImageSlider.flipToNext();
        homeFeatureSlider.flipToNext();
        // if slider is in autoplay mode we must restart it
        if(homeManagerSlider.shouldAutoplay)
        {
            homeManagerSlider.restartAutoPlay(homeImageSlider.getAnimateTime() + homeManagerSlider.duration);    
        }         
    }     
} // flipToNext

homeManagerSlider.flipToPrev = function()
{
    if(homeImageSlider.canChange &&  homeFeatureSlider.canChange)
    {    
        homeImageSlider.flipToPrev();
        homeFeatureSlider.flipToPrev();
        // if slider is in autoplay mode we must restart it
        if(homeManagerSlider.shouldAutoplay)
        {
            homeManagerSlider.restartAutoPlay(homeImageSlider.getAnimateTime() + homeManagerSlider.duration);    
        }          
    }    
} // flipToPrev

/***************************************************
  HOMEPAGE CONTROL PANEL FOR IMAGE SLIDER
****************************************************/

// definition, creating and configuration of object which implement
// control panel for homepage primay image slider
var homeControlPanel = new Object;
// properties
homeControlPanel.active = true; // on/off panel

homeControlPanel.init = function()
{
    // is panel active?
    if(false == homeControlPanel.active)        
    {
        return;
    }
    homeControlPanel.initButtons();
   
} // init

homeControlPanel.initButtons = function()
{
    var q = jQuery.noConflict(); 
    
    q('#fader-slider .control-panel #next').click(function() { homeManagerSlider.flipToNext(); });
    q('#fader-slider .control-panel #prev').click(function() { homeManagerSlider.flipToPrev(); });

    if(homeManagerSlider.shouldAutoplay)
    {
        q('#fader-slider .control-panel #play').css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_pause_off.png')");    
    } else
    {
        q('#fader-slider .control-panel #play').css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_play_off.png')");
    }
    // play
    q('#fader-slider .control-panel #play').hover(
        function() { 
            if(homeManagerSlider.shouldAutoplay)
            {
                q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_pause_on.png')"); 
            } else
            {
               q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_play_on.png')"); 
            }
        },
        function() { 
            if(homeManagerSlider.shouldAutoplay)
            {
                q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_pause_off.png')"); 
            } else
            {
               q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_play_off.png')"); 
            } 
        }
    ); 
    
    q('#fader-slider .control-panel #play').mousedown(
       function()
       {
            if(homeManagerSlider.shouldAutoplay)
            {
                homeManagerSlider.stopAutoPlay();
                q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_play_on.png')"); 
            } else
            {
               homeManagerSlider.startAutoPlay();
               q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_pause_on.png')");   
            }           
       }
    ); 
    
    // next 
    q('#fader-slider .control-panel #next').hover(
        function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_next_on.png')"); },
        function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_next_off.png')"); }
    );
    // prev  
    q('#fader-slider .control-panel #prev').hover(
        function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_prev_on.png')"); },
        function() { q(this).css('background-image', "url('"+dc_theme_path+"/img/slider_prestige/button_prev_off.png')"); }
    );                         
} // initButtons

