/********************************************************************
    File:   
        slider_a.js
    Brief:  
        -
    Author:
        DigitalCavalry
    Author URI:
        http://themeforest.net/user/DigitalCavalry
*********************************************************************/

/**********************************************
    DIGITAL CAVALRY SlIDER A
    Slider object definition.
***********************************************/
var slider_a = new Object();
slider_a.NO_HOVER = -1;
slider_a.TRANS_MODE_STRIP = 1; // not implemented
slider_a.TRANS_MODE_FADE = 2;
slider_a.TRANS_MODE_MOVE = 3; 
slider_a.mode = slider_a.TRANS_MODE_MOVE;
slider_a.MOVE_DESC_MODE = 1;
slider_a.FADE_DESC_MODE = 2;
slider_a.descMode = slider_a.MOVE_DESC_MODE;
slider_a.first_random = false;
slider_a.slides = 0;
slider_a.current = 0;
slider_a.width = 920;
slider_a.height = 420;
slider_a.transTime = 500;
slider_a.descShowTime = 800;
slider_a.thumbWidth = 59;
slider_a.timeSwitch = 4500;
slider_a.timeCounter = 0;
slider_a.timeUpdate = 20;
slider_a.canSwitch = true;
slider_a.thumbHoverIndex = slider_a.NO_HOVER;
slider_a.allowAutoPlay = true;
slider_a.autoPlayTimerHandle = null;
slider_a.autoPlayPause = false;
slider_a.id = null;
slider_a.defHeadBGColor = '#ECECEC';
slider_a.defHeadTextColor = '#000000';  
slider_a.descOffset = 120;
slider_a.thumbBorderColorOn = '#FFFFFF';
slider_a.thumbBorderColorOff = '#000000';

/**********************************************
    SETUP
***********************************************/
slider_a.setup = function (id)
{
    var q = jQuery.noConflict();
    
    slider_a.id = id;
    // if slider not exist return from function
    if(0 == q(slider_a.id).length)
    {        
        return;
    }

    // get slider context
    var c = q(slider_a.id)[0];    
    // get number of slides
    slider_a.slides = q('.slide', c).length;
    if(0 == slider_a.slides)
    {
        return;
    }

    // show first slide
    var random_slide = 0;
    if(slider_a.first_random)
    {
        random_slide = Math.floor(Math.random()*(slider_a.slides));
        slider_a.current = random_slide;
        q('.slide:eq('+random_slide+')', c).css('top', 0);
    } else
    {
        q('.slide:first', c).css('top', 0);    
    }    
       
    // bind action to next and prev button
    q('.next', c).click(slider_a.next); 
    q('.prev', c).click(slider_a.prev);
    q('.play', c).click(slider_a.play); 
    q('.pause', c).click(slider_a.pause);
    
    // show first thumb
    q('.thumb', c).css('border', '1px solid '+slider_a.thumbBorderColorOff);
    if(slider_a.first_random)
    {
        q('.thumb:eq('+random_slide+')', c).css('border', '1px solid '+slider_a.thumbBorderColorOn).find('.color').css('display', 'block'); 
        q('.thumb:eq('+random_slide+')', c).find('.black').css('display', 'none');        
    } else
    {    
        q('.thumb:first', c).css('border', '1px solid '+slider_a.thumbBorderColorOn).find('.color').css('display', 'block'); 
        q('.thumb:first', c).find('.black').css('display', 'none');
    }    
    
    // bind action to hover thumb event
    q('.thumb', c).hover(slider_a.hoverThumbIn, slider_a.hoverThumbOut);
    q('.thumb', c).click(slider_a.thumbClick);              
    
    slider_a.showDesc(slider_a.current);
    
    if(!slider_a.allowAutoPlay)
    {
        q('.play', c).css('display', 'block');
        q('.pause', c).css('display', 'none');
        slider_a.autoPlayPause = true;        
    }
    
    // run autoplay
    if(slider_a.allowAutoPlay)
    {
        slider_a.autoPlayTimerHandle = setTimeout(slider_a.autoplay, slider_a.timeUpdate);
    } 
}

/**********************************************
    PAUSE
***********************************************/
slider_a.pause = function ()
{
    var q = jQuery.noConflict();
    
    q(this).css('display', 'none');
    var c = q(slider_a.id)[0];
    q('.play', c).css('display', 'block');
    
    slider_a.autoPlayPause = true;
    
//    var ni = slider_a.getNextIndex();
//    q('.thumb:eq('+ni+')', c).find('.color').css('display', 'none');
//    slider_a.timeCounter = 0;    
}

/**********************************************
    PLAY
***********************************************/
slider_a.play = function ()
{
    var q = jQuery.noConflict();
    
    q(this).css('display', 'none');
    var c = q(slider_a.id)[0];
    q('.pause', c).css('display', 'block');  
    
    slider_a.autoPlayPause = false;
    slider_a.allowAutoPlay = true;
    if(slider_a.allowAutoPlay)
    {
        clearTimeout(slider_a.autoPlayTimerHandle);
        slider_a.autoPlayTimerHandle = setTimeout(slider_a.autoplay, slider_a.timeUpdate);
    }    
}

/**********************************************
    SHOW DESC
***********************************************/
slider_a.showDesc = function (index)
{   
    var q = jQuery.noConflict();
    
    var c = q(slider_a.id)[0]; 
    var h = q('.desc:eq('+index+')', c);

    if(h.length > 0)
    {
        var x = q(h).find('.x');
        var y = q(h).find('.y');
        var width = q(h).find('.width');
        if(x.length > 0)
        {
           var hbgcolor = q(h).find('.hbgcolor');
           if(hbgcolor.length > 0) { hbgcolor = hbgcolor.text(); } else { hbgcolor = slider_a.defHeadBGColor; }
           
           var hcolor = q(h).find('.hcolor');
           if(hcolor.length > 0) { hcolor = hcolor.text(); } // else { hcolor = slider_a.defHeadTextColor; }           
          
           if(slider_a.descMode == slider_a.MOVE_DESC_MODE)
           {
               q(h).css('opacity', 0.0).css('top', parseInt(y.text())+slider_a.descOffset).css('left', parseInt(x.text())).css('display', 'block');
               q(h).find('.head').css('width', parseInt(width.text())).css('background-color', hbgcolor).css('color', hcolor);
               q(h).find('.foot').css('width', parseInt(width.text()));         
               q(h).animate({top:parseInt(y.text()), opacity:0.95}, slider_a.descShowTime);
           } else
           if(slider_a.descMode == slider_a.FADE_DESC_MODE)
           {
               q(h).css('opacity', 0.0).css('top', parseInt(y.text())).css('left', parseInt(x.text())).css('display', 'block');
               q(h).find('.head').css('width', parseInt(width.text())).css('background-color', hbgcolor).css('color', hcolor);
               q(h).find('.foot').css('width', parseInt(width.text()));         
               q(h).animate({top:parseInt(y.text()), opacity:0.95}, slider_a.descShowTime);           
           }                      
        }
    }
}

/**********************************************
    HIDE DESC
***********************************************/
slider_a.hideDesc = function (index)
{   
    var q = jQuery.noConflict();
    
    var c = q(slider_a.id)[0];
    var h = q('.desc:eq('+index+')', c);
    q(h).css('display', 'none');
}

/**********************************************
    AUTOPLAY
***********************************************/
slider_a.autoplay = function ()
{
    var q = jQuery.noConflict();
    
    if(slider_a.autoPlayPause)
    {
        if(slider_a.allowAutoPlay)
        {
            slider_a.autoPlayTimerHandle = setTimeout(slider_a.autoplay, slider_a.timeUpdate);
        }
        return;
    } 

    var ni = slider_a.getNextIndex();
    slider_a.timeCounter += slider_a.timeUpdate;
    var width = (slider_a.timeCounter / slider_a.timeSwitch) * slider_a.thumbWidth;
    if(width > slider_a.thumbWidth)
    {
        width = slider_a.thumbWidth; 
    }
    
    var c = q(slider_a.id)[0]; 
    q('.thumb:eq('+ni+')', c).find('.color').css('z-index', 17).css('display', 'block').css('width', width);
    q('.thumb:eq('+ni+')', c).find('.black').css('z-index', 16).css('display', 'block');     
    
    if(width == slider_a.thumbWidth)
    {
       slider_a.timeCounter = 0;
       slider_a.next();       
    }
    
    if(slider_a.allowAutoPlay)
    {
       slider_a.autoPlayTimerHandle = setTimeout(slider_a.autoplay, slider_a.timeUpdate);
    }  
}

/**********************************************
    HOVER THUMB IN
***********************************************/
slider_a.hoverThumbIn = function ()
{
    var q = jQuery.noConflict();
    
    var c = q(slider_a.id)[0];
    var index = q('.thumb', c).index(this);
    slider_a.thumbHoverIndex = index;
}

/**********************************************
    HOVER THUMB OUT
***********************************************/
slider_a.hoverThumbOut = function ()
{
    var q = jQuery.noConflict();
    
    var c = q(slider_a.id)[0];
    var index = q('.thumb', c).index(this);
    slider_a.thumbHoverIndex = slider_a.NO_HOVER;
}

/**********************************************
    THUMB CLICK
***********************************************/
slider_a.thumbClick = function ()
{
    var q = jQuery.noConflict();
    
    var c = q(slider_a.id)[0];
    var index = q('.thumb', c).index(this); 
    
    // if cant switch slides return
    if(!slider_a.canSwitch)
    {
        return;
    }
    
   switch(slider_a.mode)
   {
        case slider_a.TRANS_MODE_FADE:
          slider_a.selectedFade(index);
        break; 
        case slider_a.TRANS_MODE_MOVE:
          slider_a.selectedMove(index);
        break;         
   }            
}

/**********************************************
    SELECTED FADE
***********************************************/
slider_a.selectedFade = function(index)
{
    var q = jQuery.noConflict();
    
    // if cliked slide is already displayed return form function
    var ns = index; // next slide
    if(slider_a.current == ns)
    {
        return;
    }
    
    slider_a.canSwitch = false;    
    var cs = slider_a.current; // current slide
    
    slider_a.hideDesc(cs);
    
    // set z index of current slide
    var c = q(slider_a.id)[0];
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 0).css('top', 0).css('opacity', 0.0);
    
    q('.slide:eq('+cs+')', c).animate({opacity:0.0}, slider_a.transTime);
    q('.slide:eq('+ns+')', c).animate({opacity:1.0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;
            q('.slide:eq('+cs+')', c).css('top', slider_a.height); 
            slider_a.showDesc(ns);
            });
    
    slider_a.current = ns;
    slider_a.showThumb(index);
}

/**********************************************
    SELECTED MOVE
***********************************************/
slider_a.selectedMove = function(index)
{
    var q = jQuery.noConflict();
    
    // if cliked slide is already displayed return form function
    var ns = index; // next slide
    if(slider_a.current == ns)
    {
        return;
    }
    
    slider_a.canSwitch = false;    
    var cs = slider_a.current; // current slide
    
    slider_a.hideDesc(cs);
    
    // set z index of current slide
    var c = q(slider_a.id)[0];
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 2).css('left', (ns > cs ? slider_a.width : -slider_a.width)).css('top', 0).css('opacity', 1.0);
    
    q('.slide:eq('+ns+')', c).animate({left:0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;
            q('.slide:eq('+cs+')', c).css('top', slider_a.height);
            slider_a.showDesc(ns); 
            }
            
            );
    
    slider_a.current = ns;
    slider_a.showThumb(index);
}


/**********************************************
    SHOW THUMB
***********************************************/
slider_a.showThumb = function(index)  
{
    var q = jQuery.noConflict();
    
    slider_a.timeCounter = 0;    

    var c = q(slider_a.id)[0]; 
    
    q('.thumb', c).css('border', '1px solid '+slider_a.thumbBorderColorOff).find('.black').css('display', 'block').css('z-index', 17); 
    q('.thumb', c).find('.color').css('display', 'none').css('z-index', 16).css('width', slider_a.thumbWidth); 
    
    q('.thumb:eq('+index+')', c).css('border', '1px solid '+slider_a.thumbBorderColorOn).find('.color').css('display', 'block').css('z-index', 17);
    q('.thumb:eq('+index+')', c).find('.black').css('display', 'none').css('z-index', 16);  
}

/**********************************************
    GET NEXT INDEX
***********************************************/
slider_a.getNextIndex = function()
{
    var q = jQuery.noConflict();
    
    // get index of next slide
    var nextslide = slider_a.current + 1;
    if(nextslide >= slider_a.slides)       
    {
       nextslide = 0;
    }    
    return nextslide;
}

/**********************************************
    NEXT
***********************************************/
slider_a.next = function()
{
    var q = jQuery.noConflict();
    
    // if cant switch slides return
    if(!slider_a.canSwitch)
    {
        return;
    }
    
   switch(slider_a.mode)
   {
        case slider_a.TRANS_MODE_FADE:
          slider_a.nextFade();
        break; 
        case slider_a.TRANS_MODE_MOVE:
          slider_a.nextMove();
        break;         
   }
   
}

/**********************************************
    NEXT FADE
***********************************************/
slider_a.nextFade = function()
{
    var q = jQuery.noConflict();
    
    slider_a.canSwitch = false;
    var ns = slider_a.getNextIndex();
    var cs = slider_a.current;
    
    slider_a.hideDesc(cs); 
    
    // set z index of current slide
    var c = q(slider_a.id)[0]; 
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 0).css('top', 0).css('opacity', 0.0);
    
    q('.slide:eq('+cs+')', c).animate({opacity:0.0}, slider_a.transTime);
    q('.slide:eq('+ns+')', c).animate({opacity:1.0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;
            q('.slide:eq('+cs+')', c).css('top', slider_a.height);
            slider_a.showDesc(ns);
            });
    
    slider_a.current = ns;
    slider_a.showThumb(slider_a.current);
}

/**********************************************
    NEXT MOVE
***********************************************/
slider_a.nextMove = function()
{
    var q = jQuery.noConflict();
    
    slider_a.canSwitch = false;
    var ns = slider_a.getNextIndex(); // next slide
    var cs = slider_a.current; // current slide
    
    slider_a.hideDesc(cs);
    
    // set z index of current slide
    var c = q(slider_a.id)[0];
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 2).css('left', slider_a.width).css('top', 0).css('opacity', 1.0);
    
    q('.slide:eq('+ns+')', c).animate({left:0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;        
            q('.slide:eq('+cs+')', c).css('top', slider_a.height); 
            slider_a.showDesc(ns);
            }
            
            );
    
    slider_a.current = ns;
    slider_a.showThumb(slider_a.current);
}

/**********************************************
    PREV MOVE
***********************************************/
slider_a.prevMove = function()
{
    var q = jQuery.noConflict();
    
    slider_a.canSwitch = false;
    var ns = slider_a.getPrevIndex(); // next slide
    var cs = slider_a.current; // current slide 
    
    slider_a.hideDesc(cs); 
    
    // set z index of current slide
    var c = q(slider_a.id)[0];
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 2).css('left', -slider_a.width).css('top', 0).css('opacity', 1.0);
    
    q('.slide:eq('+ns+')', c).animate({left:0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;
            q('.slide:eq('+cs+')', c).css('top', slider_a.height);
            slider_a.showDesc(ns); 
            }
            
            );
    
    slider_a.current = ns;
    slider_a.showThumb(slider_a.current);
}

/**********************************************
    GET PREV INDEX
***********************************************/
slider_a.getPrevIndex = function()
{
    var q = jQuery.noConflict();
    
    // get index of prev slide
    var prevslide = slider_a.current - 1;
    if(prevslide < 0)       
    {
       prevslide = slider_a.slides - 1;
    }    
    return prevslide;
}

/**********************************************
    PREV
***********************************************/
slider_a.prev = function()
{
    var q = jQuery.noConflict();
    
    // if cant switch slides return
    if(!slider_a.canSwitch)
    {
        return;
    }
    
   switch(slider_a.mode)
   {
        case slider_a.TRANS_MODE_FADE:
          slider_a.prevFade();
        break; 
        case slider_a.TRANS_MODE_MOVE:
          slider_a.prevMove();
        break;         
   }
}

/**********************************************
    PREV FADE
***********************************************/
slider_a.prevFade = function()
{
    var q = jQuery.noConflict();
    
    slider_a.canSwitch = false;
    var ns = slider_a.getPrevIndex();
    var cs = slider_a.current;
    
    slider_a.hideDesc(cs);
    
    // set z index of current slide
    var c = q(slider_a.id)[0];
    q('.slide:eq('+cs+')', c).css('z-index', 1);
    q('.slide:eq('+ns+')', c).css('z-index', 0).css('top', 0).css('opacity', 0.0);
    
    q('.slide:eq('+cs+')', c).animate({opacity:0.0}, slider_a.transTime);
    q('.slide:eq('+ns+')', c).animate({opacity:1.0}, slider_a.transTime, 
        function () {
            slider_a.canSwitch = true;
            slider_a.showDesc(ns);
            });
    
    slider_a.current = ns;
    slider_a.showThumb(slider_a.current);
}
