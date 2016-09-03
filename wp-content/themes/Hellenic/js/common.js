/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      common.js
* Brief:       
*      JavaScript code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/

function dcf_merge(obj1, obj2)
{
    var result = {}, name;

    for (name in obj1) 
        result[name] = obj1[name];
       
    for (name in obj2) 
        result[name] = obj2[name];
        
    return result;
}  

/********************************************************************* 
 * FUNCTION: 
 *      dcf_parseParams
 * PARAMETERS:
 *      str - string to parse 
 * NOTES:
 *      Parses kays and valus from string e.g class name
 *      Function can read following formats:
 *      - name: word;
 *      - name: [word, word];
 *      - name: "string";
 *      - name: 'string';
 * 
 *      For example:
 *          name1: value; name2: [value, value]; name3: 'value'
 * RETURN: 
 *      Deserialized object.
 ********************************************************************/  
function dcf_parseParams(str)
{
    var match, 
        result = {},
        arrayRegex = new XRegExp("^\\[(?<values>(.*?))\\]$"),
        regex = new XRegExp(
            "(?<name>[\\w-]+)" +
            "\\s*:\\s*" +
            "(?<value>" +
                "[\\w-%#]+|" +        // word
                "\\[.*?\\]|" +        // [] array
                '".*?"|' +            // "" string
                "'.*?'" +            // '' string
            ")\\s*;?",
            "g"
        )
        ;

    while ((match = regex.exec(str)) != null) 
    {
        if($ieVersion != 7){
        var value = match.value
            .replace(/^['"]|['"]$/g, '') // strip quotes from end of strings
            ;
        
        // try to parse array value
        if (value != null && arrayRegex.test(value))
        {
            var m = arrayRegex.exec(value);
            value = m.values.length > 0 ? m.values.split(/\s*,\s*/) : [];
        }
        
        result[match.name] = value;
    }
}
    
    return result;
}  

/*************************************
* SEARCH FORM CODE
**************************************/
function setupSearchForm()
{
    var q = jQuery.noConflict();  
    q('#s_in_posts, #s_in_pages, #s_in_news, #s_in_projects').click(
      function()
      {
            var selected = q(this).hasClass('cbox-selected');
            if(selected)
            {
                var id = q(this).attr('id');
                q('input[name='+id+']').attr('value', '');
                q(this).removeClass('cbox-selected').addClass('cbox');    
            } else
            {
                var id = q(this).attr('id');
                q('input[name='+id+']').attr('value', 'on');
                q(this).removeClass('cbox').addClass('cbox-selected');     
            }  
      }       
    );
   
   q('#header-search-popup').find('form').submit(
        function()
        {
            if(q(this).find('input[name=s]').val() == '')
            {
                q(this).find('input[name=s]').css('border', '1px solid #880000');
                return false;
            }
        }
   ); 
     
   q('.common-form .search-btn, #searchsubmit').click(
        function()
        {
            var parent = q(this).parent();
            if(q(parent).find('input[name=s]').length)
            {
                if(q(parent).find('input[name=s]').val() == '')
                {
                    q(parent).find('input[name=s]').css('border', '1px solid #880000');
                    return false;
                }
            }
        }
   ); 
    
}

/*************************************
* BANNER SLIDER CODE
**************************************/
function setupBannerSlider()
{
    var q = jQuery.noConflict();
    
    q('.dcs-banner-slider').each(
        function()
        {   
            var $slider = q(this);
            $slider.data('dc_current', 0);
            $slider.find('.slide:first').css('display', 'block');
            var txt = $slider.find('.slide:first .desc').text();
            $slider.find('.description span').text(txt);             
            
            var size = $slider.find('.slide').length;
            var interval = parseInt($slider.find('.inter').text());
            var finterval = parseInt($slider.find('.finter').text()); 
            
            function switchslide()
            {    
                var dc_current = $slider.data('dc_current');
                var next = dc_current + 1;
                if(next >= size)
                {
                    next = 0;
                }            
                $slider.find('.description span').stop().animate({opacity:0.0}, 600);
                $slider.find('.slide:eq('+dc_current+')').animate({opacity:0.0}, 1000, function(){
                    q(this).css('display', 'none');
                    var txt = $slider.find('.slide:eq('+next+') .desc').text();
                    $slider.find('.description span').text(txt);  
                    $slider.find('.description span').stop().animate({opacity:1.0}, finterval);    
                });
                    $slider.find('.slide:eq('+next+')').css('opacity', 0.0).css('display', 'block').stop().animate({opacity:1.0}, finterval, function(){ 
                    $slider.data('dc_current', next);   });                  
                
            }            
            
            function autoplay()
            {
                switchslide();
                setTimeout(autoplay, interval); 
            }
            
            if(size > 1)
            {
                setTimeout(autoplay, interval);
            }
        });   
}

/***********************************
*  NEWS SLIDER CODE
************************************/

function setupNewsSlider()
{
    var q = jQuery.noConflict();
    
    q('.news-slider').each(    
        function() {
            
            var interval = 5000;
            var $slider = q(this);
            $slider.data('dc_current', 0);
            $slider.data('dc_block', false);
            $slider.data('dc_timer', null);
            var size = $slider.find('.slide').length;
            
            q(this).find('.slide:first').css('left', 0);
            q(this).find('li:first').addClass('selected'); 
            
            function autoplay()
            {
                dc_current = $slider.data('dc_current');
                dc_current++;
                if(dc_current >= size)
                {
                    dc_current = 0;
                }    
                $slider.find('li:eq('+dc_current+')').trigger('click');
                var handle = setTimeout(autoplay, interval);
                $slider.data('dc_timer', handle);                 
            }
            
            if(size > 1)
            {
                var handle = setTimeout(autoplay, interval);
                $slider.data('dc_timer', handle); 
            }             
            
            $slider.hover(
              function()
              {
                    var dc_timer = $slider.data('dc_timer');
                    clearTimeout(dc_timer);      
              },
              function()
              {
                    if(size > 1)
                    {
                        var handle = setTimeout(autoplay, interval);
                        $slider.data('dc_timer', handle); 
                    }  
              }
            );
            
            q(this).find('li').click(
                function(){
                    var dc_current = $slider.data('dc_current');
                    var dc_block = $slider.data('dc_block');
                    
                    var $parent = q(this).parent();
                    var index = $parent.find('li').index(this);
                    
                    if(index == dc_current || dc_block)
                    {
                        return;
                    }          
                    $slider.data('dc_block', true); 
                    
                    $parent.find('li').removeClass('selected');
                    q(this).addClass('selected');
                    $slider.find('.slide:eq('+dc_current+')').animate({opacity:0.0}, 200,
                      function()
                      {
                          $slider.find('.slide:eq('+dc_current+')').css('left', 600);
                          $slider.find('.slide:eq('+index+')').css('opacity', 0.0).css('left', 0).animate({opacity:1.0}, 300);
                          $slider.data('dc_current', index);
                          $slider.data('dc_block', false);    
                      }
                    );
                    
                    
                              
                });
                    
    });
    
}

/***************************************************
  DCS CHAIN SLIDER
****************************************************/
function setupChainSlider()
{
      var q = jQuery.noConflict();       
       
       q('.chain-slider .thumbs-wrapper').each(function()
       {                      
           var $slider = q(this).parent();
           var $ts = q(this).find('.thumbs-slider');
           
           $slider.data('dc_scroll', true);
           $slider.data('dc_block', false); 
           $slider.data('dc_anim', false);
           $slider.data('dc_current', 0);
           $slider.data('dc_li_index', 0);
           $slider.data('dc_timer', null);
           var size = $slider.find('.slide').length; 

           var userBorderColor = $slider.find('.border-color').text();
           var userAutoplay = $slider.find('.autoplay').text();
           var normalBorderColor = '#ddd';
           var userTransMode = $slider.find('.trans').text();

           var thumb_rmargin = 5;
           var thumb_border = 1;
           
           var width = q(this).width();
           var twidth = q(this).find('li:first').width();                             
           var swidth = q(this).find('span:first').width();
           var sheight = q(this).find('span:first').height();  
           var real_twidth = twidth + (2* thumb_border) + thumb_rmargin;           
           var count = q(this).find('li').length; 
           var all_width = count * real_twidth;           
  
           if(all_width < width)
           {
                var left = Math.round(width / 2)  - Math.round(all_width / 2);
                q(this).find('.thumbs-slider').css('left', left);
                $slider.data('dc_scroll', false);         
           }             
           
            q(this).find('li').mouseenter(function()
            {
                $border = q(this).find('span');
                var parent = q(this).parent();
                $ts.find('li').not(this).stop().animate({opacity:0.6},300); 
                $border.stop().animate({top:-2,left:-2,height:sheight+4,width:swidth+4},100);
            });
            
            q(this).find('li').mouseleave(function()
            {    
                $border = q(this).find('span');
                var parent = q(this).parent();
                $ts.find('li').not(this).stop().animate({opacity:1.0},300);                        
                $border.stop().animate({top:0, left:0,height:sheight,width:swidth},200);
            });           
           
           $slider.find('.slide:first').css('display', 'block');
           q(this).find('li:first').css('border-color', userBorderColor);
                     

  
           if(userAutoplay == 'true' && size > 1)
           {
               var timer = setTimeout(autoplay, 5000);
               $slider.data('dc_timer', timer);
           } 
  
           function autoplay()
           {
                 var dc_scroll = $slider.data('dc_scroll');
                 var dc_li_index = $slider.data('dc_li_index');
                 dc_li_index++;
                 if(dc_li_index >= size)
                 {
                     dc_li_index = 0;
                 }
                 
                 $ts.find('li:eq('+dc_li_index+')').trigger('click');                 
                 
                 var timer = setTimeout(autoplay, 5000);
                 $slider.data('dc_timer', timer);               
           }  
           
           $slider.hover(
                function()
                {
                    var dc_timer = $slider.data('dc_timer');
                    clearTimeout(dc_timer);    
                },
                function()
                {
                    
                    if(userAutoplay == 'true' && size > 1)
                    {
                        var timer = setTimeout(autoplay, 5000);
                        $slider.data('dc_timer', timer);
                    }    
                }
           );

           q(this).find('.thumbs-slider li').click(
            function()
            {   
                var $ts = q(this).parent(); 
                var index = $ts.find('li').index(this);
                var picindex = q(this).find('em').text();
                
                var pos = $ts.position();                
                var dc_current = parseInt($slider.data('dc_current'));
                var dc_block = $slider.data('dc_block');
                var dc_scroll = $slider.data('dc_scroll');
                var dc_anim = $slider.data('dc_anim'); 
                var dc_index = $slider.data('dc_index');
                var dc_li_index = $slider.data('dc_li_index');
                
                if(dc_block || dc_current == picindex || dc_anim)
                {
                    return;
                }                                                                                
                $slider.data('dc_block', true);
                
                if(userTransMode == 'fade')
                {   
                    $slider.data('dc_anim', true);
                    $slider.find('.slide:eq('+dc_current+')').css('z-index', 0);
                    $slider.find('.slide:eq('+picindex+')')
                        .stop().css('opacity', 0.0).css('display', 'block')
                        .css('z-index', 3).css('left', 0).css('top', 0).animate({opacity:1.0}, 500,
                        function()
                        {
                            $slider.find('.slide:eq('+dc_current+')').css('display', 'none');
                            $slider.data('dc_current', picindex);
                            $slider.data('dc_anim', false);                             
                        });

                } else 
                if(userTransMode == 'slide')
                {
                    $slider.data('dc_anim', true);
                    var slide_width = $slider.find('.slide:eq('+picindex+')').width();                   
                    
                       $slider.find('.slide:eq('+dc_current+')').css('z-index', 0); 
                    $slider.find('.slide:eq('+picindex+')')                        
                        .css('left', slide_width).css('top', 0).css('z-index', 3).css('display', 'block');
                        $slider.find('.slide:eq('+picindex+')').animate({left:0}, 500,
                        function()
                        {
                            $slider.find('.slide:eq('+dc_current+')').css('display', 'none');
                            $slider.data('dc_current', picindex);
                            $slider.data('dc_anim', false);                             
                        });                    
                }
                else
                {
                    $slider.data('dc_anim', true);
                    $slider.find('.slide:eq('+picindex+')').css('display', 'block');
                    $slider.find('.slide:eq('+dc_current+')').css('display', 'none');
                    $slider.data('dc_current', picindex);
                    $slider.data('dc_anim', false);                     
                }

    
                if(dc_scroll)
                {   
                    // calculate side
                    var left_side = false;
                    var click_side = index * real_twidth;
                    // if(click_side < (width / 2))
                    if(index <= dc_li_index)
                    {
                        left_side = true; 
                    }
                    
                    if(!left_side)
                    {                   
                    $ts.find('li').css('border-color', normalBorderColor);
                    $ts.find('li span').css('opacity', 1.0); 
                    q(this).css('border-color', userBorderColor);
                    q(this).find('span').css('opacity', 0.0);  
                                         
                    $ts.stop().animate({left:pos.left-real_twidth}, 600,
                    function()
                    {                   
                        var li = q(this).find('li:first').detach();
                        li.appendTo(this);
                        var pos = $ts.position();
                        q(this).css('left', pos.left+real_twidth);
                        $slider.data('dc_block', false); 
                    });
                    
                    index--;
                    } else
                    {
                    $ts.find('li').css('border-color', normalBorderColor);
                    $ts.find('li span').css('opacity', 1.0); 
                    q(this).css('border-color', userBorderColor);
                    q(this).find('span').css('opacity', 0.0);  
                    
                    
                        var li = $ts.find('li:last').detach();
                        li.prependTo($ts);
                        var pos = $ts.position();
                        $ts.css('left', pos.left-real_twidth);
                        
                        pos.left -= real_twidth;                                         
                    $ts.stop().animate({left:pos.left+real_twidth}, 600,
                    function()
                    {                   
                          $slider.data('dc_block', false); 
                    });
                    
                    index++;
                    }
                } else
                {
                    $ts.find('li').css('border-color', normalBorderColor);
                    $ts.find('li span').css('opacity', 1.0); 
                    q(this).css('border-color', userBorderColor);
                    q(this).find('span').css('opacity', 0.0);
                    $slider.data('dc_block', false);                   
                }             

                $slider.data('dc_li_index', index);  
                
            });           
       
       });    
}

/***************************************************
  DCS SIMPLE GALLERY ONE
****************************************************/
function setupDcsSimpleGallery()
{
    var q = jQuery.noConflict();
    
    q('.dcs-simple-gallery').each(
        function()
        {
            q(this).find('.slide:first').css('display', 'block');
            q(this).find('.slider').data('dc_current', 0);
            q(this).find('.slider').data('dc_block', false);
            
            var mode = q(this).find('.trans').html();
            var count = q(this).find('.slide').length;
            var width = q(this).find('.slide').width();
            var twidth = q(this).find('.thumb:first').width() + 5; 
            
            var offset = (width/2) - ((count*twidth)/2);
            for(var i = 0; i < count; i++)
            {
                q(this).find('.thumb:eq('+i+')').css('left', offset+i*twidth);    
            }
            
            q(this).hover(
              function()
              {
                  q(this).find('.thumb').stop().animate({opacity:1.0}, 500);
              },
              function()
              {
                  q(this).find('.thumb').stop().animate({opacity:0.0}, 1000); 
              }
            );
            
            q(this).find('.thumb').click(
              function()
              {
                  var slider = q(this).parent();
                  var index = slider.find('.thumb').index(this);
                  
                  if(slider.data('dc_block') || index == slider.data('dc_current'))
                  {
                      return;
                  }
                  slider.data('dc_block', true);
                  var current = slider.data('dc_current');
                  slider.find('.slide:eq('+current+')').css('z-index', 1);
                    
                  if(mode == 'none')
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 1.0).css('z-index', 2).css('display', 'block');                                     
                      slider.find('.slide:eq('+current+')').css('display', 'none');
                      slider.data('dc_current', index);
                      slider.data('dc_block', false);
                  } else
                  if(mode == 'fade')
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 0.0).css('z-index', 2).css('display', 'block').animate({opacity: 1.0}, 400, 
                        function()
                        {
                            var slider = q(this).parent();
                            slider.find('.slide:eq('+current+')').css('display', 'none');
                            slider.data('dc_current', index);
                            slider.data('dc_block', false);
                        });                      
                  } else
                  if(mode == 'slide')
                  {
                      var src_left = width;
                      if(index < current)
                      {
                        src_left = -width;    
                      }
                      
                      slider.find('.slide:eq('+index+')').css('left', src_left).css('z-index', 2).css('display', 'block').animate({left: 0}, 400, 
                        function()
                        {
                            var slider = q(this).parent();
                            slider.find('.slide:eq('+current+')').css('display', 'none');
                            slider.data('dc_current', index);
                            slider.data('dc_block', false);
                        }); 
                    
                  } else
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 1.0).css('z-index', 2).css('display', 'block');                                     
                      slider.find('.slide:eq('+current+')').css('display', 'none');
                      slider.data('dc_current', index);
                      slider.data('dc_block', false);                      
                  }                    
                  
                  
                  
              }
            );
                
        });         
}

/***************************************************
  DCS IMAGE THUMBS
****************************************************/
function setupDcsImgThumbs()
{
    var q = jQuery.noConflict();
  
    q('.dcs-gallery-thumbs .thumb').hover(
      function()
      {
         q(this).stop().animate({opacity:0.6}, 200);    
      },
      function()
      {
         q(this).stop().animate({opacity:1.0}, 900); 
      }
    );    
}


/***************************************************
  DCS SIMPLE GALLERY TWO
****************************************************/
function setupDcsSimpleGalleryThumbs()
{
    var q = jQuery.noConflict();
    
    q('.dcs-simple-gallery-thumbs .thumb').hover(
      function()
      {
         q(this).stop().animate({opacity:0.6}, 200);    
      },
      function()
      {
         q(this).stop().animate({opacity:1.0}, 900); 
      }
    );
    
    q('.dcs-simple-gallery-thumbs').each(
        function()
        {
            q(this).find('.slide:first').css('display', 'block');
            q(this).find('.slider').data('dc_current', 0);
            q(this).find('.slider').data('dc_block', false);
            
            var mode = q(this).find('.trans').html();            
            var count = q(this).find('.slide').length;
            var width = q(this).find('.slide').width();
     
            q(this).find('.thumb').click(
              function()
              {
                  var wrapper = q(this).parent();
                  var index = wrapper.find('.thumb').index(this);
                  
                  var slider = q(this).parent().parent().find('.slider'); 
                  if(slider.data('dc_block') || index == slider.data('dc_current'))
                  {
                      return;
                  }
                  slider.data('dc_block', true);
                  var current = slider.data('dc_current');
                  slider.find('.slide:eq('+current+')').css('z-index', 1);

                  
                  if(mode == 'none')
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 1.0).css('z-index', 2).css('display', 'block');                                     
                      slider.find('.slide:eq('+current+')').css('display', 'none');
                      slider.data('dc_current', index);
                      slider.data('dc_block', false);
                  } else
                  if(mode == 'fade')
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 0.0).css('z-index', 2).css('display', 'block').animate({opacity: 1.0}, 400, 
                        function()
                        {
                            var slider = q(this).parent();
                            slider.find('.slide:eq('+current+')').css('display', 'none');
                            slider.data('dc_current', index);
                            slider.data('dc_block', false);
                        });                      
                  } else
                  if(mode == 'slide')
                  {
                      var src_left = width;
                      if(index < current)
                      {
                        src_left = -width;    
                      }
                      
                      slider.find('.slide:eq('+index+')').css('left', src_left).css('z-index', 2).css('display', 'block').animate({left: 0}, 400, 
                        function()
                        {
                            var slider = q(this).parent();
                            slider.find('.slide:eq('+current+')').css('display', 'none');
                            slider.data('dc_current', index);
                            slider.data('dc_block', false);
                        }); 
                    
                  } else
                  {
                      slider.find('.slide:eq('+index+')').css('opacity', 1.0).css('z-index', 2).css('display', 'block');                                     
                      slider.find('.slide:eq('+current+')').css('display', 'none');
                      slider.data('dc_current', index);
                      slider.data('dc_block', false);                      
                  }
               
              });
                
        });         
}

/***************************************************
  SIDEBAR POSTS SLIDER WIDGET
****************************************************/
function setupSidebarPostSlider()
{
    var q = jQuery.noConflict();
    
    q('.widget-postslider, .widget-projectslider').each(
        function()
        {
            var size = q(this).find('.slide').length;
            q(this).find('.slide:first').css('display', 'block');                         
            
            var slider = q(this);
            q(this).data('dc_size', size);
            q(this).data('dc_current', 0);
            q(this).data('dc_block', false); 
            
            q(this).find('.btn-bar a').click(
                function()
                {                                        
                    var slider = q(this).parent().parent();
                    var bar = q(this).parent();
                    var index = q(bar).find('a').index(this);
                    var prev = slider.data('dc_current');
                    
                   if(index != prev)
                   { 
                        if(slider.data('dc_block'))
                        {
                            return;
                        }
                        slider.data('dc_block', true);                   
                                                          
                        clearTimeout(slider.data('dc_handle'));                        
                       
                        bar.find('a.btn-active').removeClass('btn-active').addClass('btn');                  
                        bar.find('a:eq('+index+')').removeClass('btn').addClass('btn-active'); 
                                        
                        slider.find('.slide:eq('+prev+')').animate({opacity: 0.0}, 300, 
                            function()
                            {
                                slider.find('.slide').css('z-index', 0);
                                slider.find('.slide:eq('+index+')').css('z-index', 1);
                                slider.find('.slide:eq('+index+')').css('opacity', 0.0).css('display', 'block').animate({opacity: 1.0}, 800);
                                slider.data('dc_current', index);
                                slider.data('dc_block', false); 
                              
                                if(slider.data('dc_size') > 1)
                                {
                                    var handle = setTimeout(function(){widget_minislider_autoplay(slider);}, 8000)
                                    slider.data('dc_handle', handle); 
                                }                              
                            } 
                        ); 
                   }       
                }
            );
            
            function widget_minislider_autoplay(slider)
            {  
                if(slider.data('dc_block'))
                {
                    return;
                }
                slider.data('dc_block', true); 
                
                var prev = slider.data('dc_current');
                var size = slider.data('dc_size'); 
                var next = prev + 1;
                if(next >= size)
                {
                    next = 0;
                }
                
                slider.find('.btn-bar').find('a.btn-active').removeClass('btn-active').addClass('btn');
                slider.find('.btn-bar').find('a:eq('+next+')').removeClass('btn').addClass('btn-active');  
                
                slider.find('.slide:eq('+prev+')').animate({opacity: 0.0}, 300, 
                    function()
                    {
                        slider.find('.slide').css('z-index', 0);
                        slider.find('.slide:eq('+next+')').css('z-index', 1);                        
                        slider.find('.slide:eq('+next+')').css('opacity', 0.0).css('display', 'block').animate({opacity: 1.0}, 600);
                        slider.data('dc_current', next); 
                        slider.data('dc_block', false);                
                      
                        var handle = setTimeout(function(){widget_minislider_autoplay(slider);}, 8000);
                        slider.data('dc_handle', handle);
        
                    } 
                );                
                  
            }
            
             if(size > 1)
             {
                var handle = setTimeout(function(){widget_minislider_autoplay(slider);}, 8000)
                q(this).data('dc_handle', handle);
             }              
        }    
    );
}

/***************************************************
  DCS CIRCLE GALLERY
****************************************************/
function setupDcsCircleGallery()
{
    var q = jQuery.noConflict();
    
    q('.dcs-circle-gallery').each(
        function()
        {
            var dc_cg_center = {left:145, top:20, z:30, w:300, h:200, p:'5px', o:1.0}; 
            var dc_cg_left = {left:60, top:40, z:20, w:210, h:140, p:'5px', o:0.4};
            var dc_cg_right = {left:320, top:40, z:20, w:210, h:140, p:'5px', o:0.4};
            var dc_cg_backLeft = {left:40, top:60, z:10, w:150, h:100, p:'5px', o:0.0};
            var dc_cg_backRight = {left:410, top:60, z:10, w:150, h:100, p:'5px', o:0.0};            
            
            /*
            q(this).find('img').each(
              function()
              {
                  q(this).animate({opacity: 1.0}, 600);
              }
            );
            */            
            
            // save cache data
            var size = q(this).find('.slide').length;
            q(this).data('dc_size', size);
            q(this).data('dc_current', 0);
            q(this).data('dc_block', false);
            
            
              
            q(this).find('.slide').css('display', 'none');

            q(this).find('.counter').text(1+'/'+size);
            q(this).find('.title').text(q(this).find('.slide:eq('+0+')').attr('rel')); 
            if(size > 3)
            {     
                  q(this).find('.slide').click(
                    function()
                    {
                        if(q(this).css('left') == '60px')
                        {
                            cg_moveRight(q(this).parent());
                            return false;
                        } else
                        if(q(this).css('left') == '320px')                         
                        {
                            cg_moveLeft(q(this).parent());
                            return false;                            
                        }
                        
                        if(q(this).parent().data('dc_block'))
                        {
                            return false;
                        }
                        
                    }
                  );
                
                  function setSlide(obj, data)
                    {
                        obj
                            .css('left', data.left)
                            .css('top', data.top)
                            .css('width', data.w)
                            .css('height', data.h)
                            .css('padding', data.p)
                            .css('opacity', data.o)            
                            .css('z-index', data.z).css('display', 'block');            
                    }
                  
                    q(this).find('.slide')
                        .css('left', dc_cg_backRight.left)
                        .css('top', dc_cg_backRight.top)
                        .css('width', dc_cg_backRight.w)
                        .css('height', dc_cg_backRight.h)
                        .css('padding', dc_cg_backRight.p)
                        .css('opacity', dc_cg_backRight.o)            
                        .css('z-index', dc_cg_backRight.z).css('display', 'block');  
               
               
                   setSlide(q(this).find('.slide:eq(0)'), dc_cg_center);
                   setSlide(q(this).find('.slide:last'), dc_cg_left);
                   setSlide(q(this).find('.slide:eq(1)'), dc_cg_right);   
                   
                   q(this).find('.prev').click(
                     function()
                     {
                         var _slider = q(this).parent().parent();
                         
                         cg_moveRight(q(_slider));
                     }
                   );
                   
                   q(this).find('.next').click(
                     function()
                     {
                         var _slider = q(this).parent().parent();
                         
                         cg_moveLeft(q(_slider));
                     }
                   );                   
                  
                  function cg_moveLeft(slider)
                  {
                      var q = jQuery.noConflict();
                        
                      if(slider.data('dc_block'))
                      {
                          return;
                      } 
                      
                      slider.data('dc_block', true);
                      
                      var current = slider.data('dc_current');
                      var size = slider.data('dc_size'); 
                      
                      
                      // computex indexes
                       var _1 = current;
                       var _2 = 0;
                       var _3 = 0;
                       var _4 = 0;
                       

                        _2 = _1 - 1;
                       if(_2 < 0)
                       {
                           _2 = size - 1;
                       }
                       
                        _3 = _1 + 1;
                       if(_3 >= size)
                       {
                           _3 = 0;
                       }     
                       
                        _4 = _3 + 1;
                       if(_4 >= size)
                       {
                           _4 = 0;
                       }

                       // animate            
                        slider.find('.slide:eq('+_2+')').css('z-index', dc_cg_backLeft.z);
                        slider.find('.slide:eq('+_2+')')
                            .animate({
                                left: dc_cg_backLeft.left,
                                top: dc_cg_backLeft.top,
                                width: dc_cg_backLeft.w,
                                height: dc_cg_backLeft.h,
                                opacity: dc_cg_backLeft.o
                            }, {duration: 800, easing: 'easeOutCirc',
                                     complete:function()
                                        {
                                            var q = jQuery.noConflict();
                                            var left = dc_cg_backRight.left;
                                            q(this).css('left', left).css('display', 'none');                            
                                        }
                            });   
            
                     
                           
                         slider.find('.slide:eq('+_1+')').css('z-index', dc_cg_left.z);
                        slider.find('.slide:eq('+_1+')')
                            .animate({
                                left: dc_cg_left.left,
                                top: dc_cg_left.top,
                                width: dc_cg_left.w,
                                height: dc_cg_left.h,
                                opacity: dc_cg_left.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            }); 
            
                         
            
        slider.find('.slide:eq('+_3+')').css('z-index', dc_cg_center.z).css('display', 'block');
        slider.find('.slide:eq('+_3+')')
            .animate({
                left: dc_cg_center.left,
                top: dc_cg_center.top,
                width: dc_cg_center.w,
                height: dc_cg_center.h,
                opacity: dc_cg_center.o
            }, {duration: 800, easing: 'easeOutCirc' 
            });
         
         
         slider.find('.slide:eq('+_4+')').css('z-index', dc_cg_right.z);
        slider.find('.slide:eq('+_4+')')
            .css('left', dc_cg_backRight.left)
            .css('top', dc_cg_backRight.top)
            .css('width', dc_cg_backRight.w)
            .css('height', dc_cg_backRight.h)
            .css('opacity', dc_cg_backRight.o)        
            .animate({
                left: dc_cg_right.left,
                top: dc_cg_right.top,
                width: dc_cg_right.w,
                height: dc_cg_right.h,
                opacity: dc_cg_right.o
            }, {duration: 800, easing: 'easeOutCirc', complete:function()
                        {
                            slider.data('dc_block', false);                          
                        }}); 
                      
                         
                       // switch to next                       
                       current += 1;
                       slider.data('dc_current', current); 
                       if(current >= size)
                       {
                           current = 0;
                           slider.data('dc_current', current); 
                       }
                       slider.find('.counter').text((current+1)+'/'+size);
                       slider.find('.title').text(slider.find('.slide:eq('+current+')').attr('rel'));                                                    
                  } 
                  
                  function cg_moveRight(slider)
                  {
                      var q = jQuery.noConflict();
                      
                      if(slider.data('dc_block'))
                      {
                          return;
                      } 
                      
                      slider.data('dc_block', true);
                      
                      var current = slider.data('dc_current');
                      var size = slider.data('dc_size'); 

                      // computex indexes
                       var _1 = current;
                       var _2 = 0;
                       var _3 = 0;
                       var _4 = 0;
                       

                        _2 = _1 - 1;
                       if(_2 < 0)
                       {
                           _2 = size - 1;
                       }
                       
                        _3 = _1 + 1;
                       if(_3 >= size)
                       {
                           _3 = 0;
                       }     
                       
                        _4 = _2 - 1;
                       if(_4 < 0)
                       {
                           _4 = size - 1;
                       }

                       // animate   
                                  
                        slider.find('.slide:eq('+_3+')').css('z-index', dc_cg_backRight.z);
                        slider.find('.slide:eq('+_3+')')
                            .animate({
                                left: dc_cg_backRight.left,
                                top: dc_cg_backRight.top,
                                width: dc_cg_backRight.w,
                                height: dc_cg_backRight.h,
                                opacity: dc_cg_backRight.o
                            }, {duration: 800, easing: 'easeOutCirc',
                                     complete:function()
                                        {
                                            var q = jQuery.noConflict();
                                            var left = dc_cg_backLeft.left;
                                            q(this).css('left', left).css('display', 'none');                            
                                        }
                            });   
                            
                                     
                         
                         slider.find('.slide:eq('+_4+')').css('z-index', dc_cg_backLeft.z);
                        slider.find('.slide:eq('+_4+')')
                            .css('left', dc_cg_backLeft.left)
                            .css('top', dc_cg_backLeft.top)
                            .css('width', dc_cg_backLeft.w)
                            .css('height', dc_cg_backLeft.h)
                            .css('opacity', dc_cg_backLeft.o)
                            .animate({
                                left: dc_cg_left.left,
                                top: dc_cg_left.top,
                                width: dc_cg_left.w,
                                height: dc_cg_left.h,
                                opacity: dc_cg_left.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            }); 
                            
                           
                           
                        slider.find('.slide:eq('+_2+')').css('z-index', dc_cg_center.z).css('display', 'block');
                        slider.find('.slide:eq('+_2+')')
                            .animate({
                                left: dc_cg_center.left,
                                top: dc_cg_center.top,
                                width: dc_cg_center.w,
                                height: dc_cg_center.h,
                                opacity: dc_cg_center.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            });
                                                                    
                         slider.find('.slide:eq('+_1+')').css('z-index', dc_cg_right.z);
                        slider.find('.slide:eq('+_1+')')
                            .animate({
                                left: dc_cg_right.left,
                                top: dc_cg_right.top,
                                width: dc_cg_right.w,
                                height: dc_cg_right.h,
                                opacity: dc_cg_right.o
                            }, {duration: 800, easing: 'easeOutCirc', complete:function()
                                        {
                                            slider.data('dc_block', false);                          
                                        }});     
                                        
                                                                         
                                
                       // switch to next
                       
                       current -= 1;
                       slider.data('dc_current', current); 
                       if(current < 0)
                       {
                           current = size - 1;
                           slider.data('dc_current', current); 
                       }
                       slider.find('.counter').text((current+1)+'/'+size);
                       slider.find('.title').text(slider.find('.slide:eq('+current+')').attr('rel')); 
                       
                  } // move right                  
                                                     
            } // > 3                
        } // each
    );     
}


function setupDcsCircleGalleryBig()
{
    var q = jQuery.noConflict();
    
    q('.dcs-circle-gallery-big').each(
        function()
        {
            var dc_cg_center = {left:218, top:30, z:30, w:450, h:300, p:'5px', o:1.0}; 
            var dc_cg_left = {left:90, top:60, z:20, w:315, h:210, p:'5px', o:0.4};
            var dc_cg_right = {left:480, top:60, z:20, w:315, h:210, p:'5px', o:0.4};
            var dc_cg_backLeft = {left:60, top:90, z:10, w:225, h:150, p:'5px', o:0.0};
            var dc_cg_backRight = {left:615, top:90, z:10, w:225, h:150, p:'5px', o:0.0};                      

            /*
            q(this).find('img').load(
              function()
              {
                  q(this).animate({opacity: 1.0}, 600);
              }
            );
            */
            
            // save cache data
            var size = q(this).find('.slide').length;
            q(this).data('dc_size', size);
            q(this).data('dc_current', 0);
            q(this).data('dc_block', false);
   
            q(this).find('.slide').css('display', 'none');

            q(this).find('.counter').text(1+'/'+size);
            q(this).find('.title').text(q(this).find('.slide:eq('+0+')').attr('rel')); 
            if(size > 3)
            {     
                  q(this).find('.slide').click(
                    function()
                    {
                        if(q(this).css('left') == '90px')
                        {
                            cg_moveRight(q(this).parent());
                            return false;
                        } else
                        if(q(this).css('left') == '480px')                         
                        {
                            cg_moveLeft(q(this).parent());
                            return false;                            
                        }
                        
                        if(q(this).parent().data('dc_block'))
                        {
                            return false;
                        }
                        
                    }
                  );
                
                  function setSlide(obj, data)
                    {
                        obj
                            .css('left', data.left)
                            .css('top', data.top)
                            .css('width', data.w)
                            .css('height', data.h)
                            .css('padding', data.p)
                            .css('opacity', data.o)            
                            .css('z-index', data.z).css('display', 'block');            
                    }
                  
                    q(this).find('.slide')
                        .css('left', dc_cg_backRight.left)
                        .css('top', dc_cg_backRight.top)
                        .css('width', dc_cg_backRight.w)
                        .css('height', dc_cg_backRight.h)
                        .css('padding', dc_cg_backRight.p)
                        .css('opacity', dc_cg_backRight.o)            
                        .css('z-index', dc_cg_backRight.z).css('display', 'block');  
               
               
                   setSlide(q(this).find('.slide:eq(0)'), dc_cg_center);
                   setSlide(q(this).find('.slide:last'), dc_cg_left);
                   setSlide(q(this).find('.slide:eq(1)'), dc_cg_right);   
                   
                   q(this).find('.prev').click(
                     function()
                     {
                         var _slider = q(this).parent().parent();
                         
                         cg_moveRight(q(_slider));
                     }
                   );
                   
                   q(this).find('.next').click(
                     function()
                     {
                         var _slider = q(this).parent().parent();
                         
                         cg_moveLeft(q(_slider));
                     }
                   );                   
                  
                  function cg_moveLeft(slider)
                  {
                      var q = jQuery.noConflict();
                        
                      if(slider.data('dc_block'))
                      {
                          return;
                      } 
                      
                      slider.data('dc_block', true);
                      
                      var current = slider.data('dc_current');
                      var size = slider.data('dc_size'); 
                      
                      
                      // computex indexes
                       var _1 = current;
                       var _2 = 0;
                       var _3 = 0;
                       var _4 = 0;
                       

                        _2 = _1 - 1;
                       if(_2 < 0)
                       {
                           _2 = size - 1;
                       }
                       
                        _3 = _1 + 1;
                       if(_3 >= size)
                       {
                           _3 = 0;
                       }     
                       
                        _4 = _3 + 1;
                       if(_4 >= size)
                       {
                           _4 = 0;
                       }

                       // animate            
                        slider.find('.slide:eq('+_2+')').css('z-index', dc_cg_backLeft.z);
                        slider.find('.slide:eq('+_2+')')
                            .animate({
                                left: dc_cg_backLeft.left,
                                top: dc_cg_backLeft.top,
                                width: dc_cg_backLeft.w,
                                height: dc_cg_backLeft.h,
                                opacity: dc_cg_backLeft.o
                            }, {duration: 800, easing: 'easeOutCirc',
                                     complete:function()
                                        {
                                            var q = jQuery.noConflict();
                                            var left = dc_cg_backRight.left;
                                            q(this).css('left', left).css('display', 'none');                            
                                        }
                            });   
            
                     
                           
                         slider.find('.slide:eq('+_1+')').css('z-index', dc_cg_left.z);
                        slider.find('.slide:eq('+_1+')')
                            .animate({
                                left: dc_cg_left.left,
                                top: dc_cg_left.top,
                                width: dc_cg_left.w,
                                height: dc_cg_left.h,
                                opacity: dc_cg_left.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            }); 
            
                         
            
        slider.find('.slide:eq('+_3+')').css('z-index', dc_cg_center.z).css('display', 'block');
        slider.find('.slide:eq('+_3+')')
            .animate({
                left: dc_cg_center.left,
                top: dc_cg_center.top,
                width: dc_cg_center.w,
                height: dc_cg_center.h,
                opacity: dc_cg_center.o
            }, {duration: 800, easing: 'easeOutCirc' 
            });
         
         
         slider.find('.slide:eq('+_4+')').css('z-index', dc_cg_right.z);
        slider.find('.slide:eq('+_4+')')
            .css('left', dc_cg_backRight.left)
            .css('top', dc_cg_backRight.top)
            .css('width', dc_cg_backRight.w)
            .css('height', dc_cg_backRight.h)
            .css('opacity', dc_cg_backRight.o)        
            .animate({
                left: dc_cg_right.left,
                top: dc_cg_right.top,
                width: dc_cg_right.w,
                height: dc_cg_right.h,
                opacity: dc_cg_right.o
            }, {duration: 800, easing: 'easeOutCirc', complete:function()
                        {
                            slider.data('dc_block', false);                          
                        }}); 
                      
                         
                       // switch to next                       
                       current += 1;
                       slider.data('dc_current', current); 
                       if(current >= size)
                       {
                           current = 0;
                           slider.data('dc_current', current); 
                       }
                       slider.find('.counter').text((current+1)+'/'+size);
                       slider.find('.title').text(slider.find('.slide:eq('+current+')').attr('rel'));                                                    
                  } 
                  
                  function cg_moveRight(slider)
                  {
                      var q = jQuery.noConflict();
                      
                      if(slider.data('dc_block'))
                      {
                          return;
                      } 
                      
                      slider.data('dc_block', true);
                      
                      var current = slider.data('dc_current');
                      var size = slider.data('dc_size'); 

                      // computex indexes
                       var _1 = current;
                       var _2 = 0;
                       var _3 = 0;
                       var _4 = 0;
                       

                        _2 = _1 - 1;
                       if(_2 < 0)
                       {
                           _2 = size - 1;
                       }
                       
                        _3 = _1 + 1;
                       if(_3 >= size)
                       {
                           _3 = 0;
                       }     
                       
                        _4 = _2 - 1;
                       if(_4 < 0)
                       {
                           _4 = size - 1;
                       }

                       // animate   
                                  
                        slider.find('.slide:eq('+_3+')').css('z-index', dc_cg_backRight.z);
                        slider.find('.slide:eq('+_3+')')
                            .animate({
                                left: dc_cg_backRight.left,
                                top: dc_cg_backRight.top,
                                width: dc_cg_backRight.w,
                                height: dc_cg_backRight.h,
                                opacity: dc_cg_backRight.o
                            }, {duration: 800, easing: 'easeOutCirc',
                                     complete:function()
                                        {
                                            var q = jQuery.noConflict();
                                            var left = dc_cg_backLeft.left;
                                            q(this).css('left', left).css('display', 'none');                            
                                        }
                            });   
                            
                                     
                         
                         slider.find('.slide:eq('+_4+')').css('z-index', dc_cg_backLeft.z);
                        slider.find('.slide:eq('+_4+')')
                            .css('left', dc_cg_backLeft.left)
                            .css('top', dc_cg_backLeft.top)
                            .css('width', dc_cg_backLeft.w)
                            .css('height', dc_cg_backLeft.h)
                            .css('opacity', dc_cg_backLeft.o)
                            .animate({
                                left: dc_cg_left.left,
                                top: dc_cg_left.top,
                                width: dc_cg_left.w,
                                height: dc_cg_left.h,
                                opacity: dc_cg_left.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            }); 
                            
                           
                           
                        slider.find('.slide:eq('+_2+')').css('z-index', dc_cg_center.z).css('display', 'block');
                        slider.find('.slide:eq('+_2+')')
                            .animate({
                                left: dc_cg_center.left,
                                top: dc_cg_center.top,
                                width: dc_cg_center.w,
                                height: dc_cg_center.h,
                                opacity: dc_cg_center.o
                            }, {duration: 800, easing: 'easeOutCirc'
                            });
                                                                    
                         slider.find('.slide:eq('+_1+')').css('z-index', dc_cg_right.z);
                        slider.find('.slide:eq('+_1+')')
                            .animate({
                                left: dc_cg_right.left,
                                top: dc_cg_right.top,
                                width: dc_cg_right.w,
                                height: dc_cg_right.h,
                                opacity: dc_cg_right.o
                            }, {duration: 800, easing: 'easeOutCirc', complete:function()
                                        {
                                            slider.data('dc_block', false);                          
                                        }});     
                                        
                                                                         
                                
                       // switch to next
                       
                       current -= 1;
                       slider.data('dc_current', current); 
                       if(current < 0)
                       {
                           current = size - 1;
                           slider.data('dc_current', current); 
                       }
                       slider.find('.counter').text((current+1)+'/'+size);
                       slider.find('.title').text(slider.find('.slide:eq('+current+')').attr('rel')); 
                       
                  } // move right                  
                                                     
            } // > 3                
        } // each
    );     
}

/***************************************************
  POPUP IMAGES
****************************************************/
var pu_cache = new Object();
pu_cache.name = 0;
 
pu_cache.handle = null; 
pu_cache.width = 0;
pu_cache.height = 0;
pu_cache.text = '';
pu_cache.istext = false;
pu_cache.mousex = 0;
pu_cache.mousey = 0;
pu_cache.browserwidth = 0;
pu_cache.browserheight = 0;
pu_cache.x = 0;
pu_cache.y = 0; 

function setupPopUpImages(_class)
{     
    var q = jQuery.noConflict();   
    
    q(_class).each(
        function()
        {        
            var q = jQuery.noConflict();  
            var obj = q(this);

       obj.hover(
         function(e)
         {          
            var q = jQuery.noConflict(); 
            // save handle in global variable
            pu_cache.handle = this;
            // image preview container x,y offset form the cursor position
            var offsetx = 0;       
            var offsety = -15;
            // keep hovered object handle in local variable
            var hoveredobject = this;        
            // get path to image file
            var imagepath = q(this).attr('rel');
            // text
            pu_cache.text = q(this).attr('title');
            q(this).removeAttr('title'); 
      
            // adding to page image preview container
            var htmlcode = '<div id="dcjp-popupimage"><div id="dcjp-popupimage-image"></div>';
            if(pu_cache.text != '') 
            {
                htmlcode += '<div class="text">'+pu_cache.text+'</div>';
                pu_cache.istext = true;
            } else
            {
                pu_cache.istext = false;
            }
            
            htmlcode += '</div>';
            q('body').append(htmlcode);
                
            var container = q('#dcjp-popupimage');
            var image = q('#dcjp-popupimage-image');
               
            if(!q("#dcjp-popupimage-loader").length)
            {                
                q('body').append("<div id='dcjp-popupimage-loader'></div>");
            }
            q('#dcjp-popupimage-loader')
                        .stop()
                        .css('opacity', 0.0)
                        .css('left', (e.pageX + 8) + 'px')
                        .css('top', (e.pageY - 24) + 'px')
                        .animate({opacity: 1.0}, 400);  
                        
            // hide image preview container, this is necessary to correctly call show function
            container.hide();    
            
            // create new image object
            var img = new Image();
            // bind function to object which gona be called when new image loading is finished
            q(img).load(function() 
            {                 
                var q = jQuery.noConflict(); 
                // check image preview overlap
                if(pu_cache.handle != hoveredobject)
                {
                    // in new image preview is in progress function return control
                    return;
                }            
            
                    
                pu_cache.width = img.width;
                pu_cache.height = img.height;
                
                pu_cache.mousex = e.pageX;
                pu_cache.mousey = e.pageY;
                pu_cache.browserwidth = q(window).width();
                pu_cache.browserheight = q(window).height();                
              
              
              
                pu_cache.x = e.pageX - (pu_cache.width / 2);
                
                if((pu_cache.x + pu_cache.width) > pu_cache.browserwidth) { pu_cache.x = pu_cache.browserwidth - 20 - pu_cache.width; }
                if(pu_cache.x < 0) { pu_cache.x = 20; }
                
                pu_cache.y = e.pageY - 20 - pu_cache.height; 
                var secure_height = pu_cache.height + 20 + 5; // extra 5 px
                if(pu_cache.istext) { pu_cache.y -= 18; secure_height += 18; }
                
                if(pu_cache.y < 5 || e.clientY < secure_height)
                {                                   
                    pu_cache.y = e.pageY + 20;     
                }              
              
                // add image to preview container
                image.html(this);
                image.css('height', pu_cache.height);                  
                
                // we must set also image container position, make it visible and set opacity to max                
                container.css('height', "auto")
                    .css('width', pu_cache.width)
                    .css('left', pu_cache.x)
                    .css('top', pu_cache.y)
                    .css('visibility', 'visible')
                    .css('opacity', '1.0')
                    .show('fast');                
               
               q("#dcjp-popupimage-loader").stop().animate({opacity: 0.0}, 400, function(){q(this).remove()}); 
            // set new value for "src" attribute, this me     
            }).attr('src', imagepath);                                    
             
         },
         
         function()
         {
             var q = jQuery.noConflict(); 
             q("#dcjp-popupimage").stop().remove(); 
             pu_cache.handle = null;
             q('#dcjp-popupimage-loader').stop().animate({opacity: 0.0}, 400, function() { q(this).remove(); } );
             q(this).attr('title', pu_cache.text);
         }              
       ); // hover         
         
    obj.mousemove(
        function(e)
        {           
            var q = jQuery.noConflict(); 
            var relx = e.pageX - pu_cache.mousex;
            var rely = e.pageY - pu_cache.mousey;
            
            var newx = pu_cache.x + relx;
            var newy = pu_cache.y + rely;
            
            q('#dcjp-popupimage').css('left', newx).css('top', newy);     
            q('#dcjp-popupimage-loader')
                .css("left", (e.pageX + 8))
                .css("top", (e.pageY - 24));                    
            
        }
    ); // mousemove         
                    
    });  
    
}


/***************************************************
  LINKS
****************************************************/

// remove frame focus for links 
function setupLinks()
{
    var q = jQuery.noConflict();
	q('a').focus(function(){q(this).blur();});
} // setupLinks


/***************************************************
  CUFON
****************************************************/

// repleace fonts with cufon                      
function setupCufonFont()
{                                   
	var q = jQuery.noConflict(); 
    
    var headings = q('h1, h2, h3, h4, h5, h6').not('h6.dcs-fancy-header');
    
    Cufon.replace(headings, {fontWeight: 400});     
    Cufon.replace('#navigation a.top, #navigation a.top-selected, #custom-menu-navigation a.top', {fontWeight: 400, hover:true});     
        
} // setupCufonFont                                          


function setupWordPressCustomMenu()
{
    // serach submenus in li top elements 
    q('#custom-menu-navigation a.top').each(
      function()
      {                    
          var parent = q(this).parent();
          var uls = q(parent).find('ul');
          var length = uls.length;
          // alert(length);
          if(length)
          {
                q(parent).addClass('arrow-down');
          }
          
          // serach submenus menu in li submenu elements
          for(var i = 0; i < length; i++)
          {
              q(parent).find('ul:eq('+i+')').each(
                function()
                {
                    q(this).find('li').each(
                        function()
                        {                             
                            var have_ul = q(this).find('ul').length;
                            //alert(have_ul);
                            if(have_ul)
                            {   
                                q(this).children('a').addClass('arrow-right');
                            }
                        }
                    );
                }
              );
          }

      }
    );    
}

/***************************************************
  HEADER COMUNNITY ICONS
****************************************************/

function setupHeaderCommunityIcons()
{
   var q = jQuery.noConflict();
    
   var c = q('#header-container')[0];
   
  q('.icon', c).hover(
    function()
    {
        var t = q(this).attr('rel');
        q(this).stop().animate({opacity: 1.0}, 400);
        q(this).parent().find('.desc').text(t).css('display', 'inline');    
    },
    function ()
    {
        var t = q(this).parent().find('.default').text();
        q(this).stop().animate({opacity: 0.8}, 400);
       q(this).parent().find('.desc').css('display', 'none').text('');
    }
  );     
}


/***************************************************
  SETUP PORTFOLIO SLIDER
****************************************************/

function setupPortfolioSlider()
{
   var q = jQuery.noConflict();
   q('.portfolio-project .slider').each(function() 
   {     
        var $slider = q(this);
        var c = $slider[0];
        
        var h = 0;
        h = q('.page:first .item:eq(0)', c).height(); 
        
        // find max item height
        $slider.find('.item').each(
            function()
            {
                var height = q(this).height();
                if(height > h)
                {
                    h = height;
                }        
            }
        );        
        $slider.css('height', h);
        q('.page:eq(0)', c).css('left', 0);
        
       var count = q('.page', c).length;
       $slider.find('.pages').text('1/'+count);
       
       if(count < 2)
       {
           $slider.find('.pages').css('display', 'none');
           $slider.find('.next').css('display', 'none');  
           $slider.find('.prev').css('display', 'none');    
           return;
       }
       
       $slider.data('count', count);
       $slider.data('current', 0);
       $slider.data('block', false);  
       
       $slider.find('.next').click(
         function()
         {
             var block = $slider.data('block');
             if(block) 
             {
                 return;
             }
             $slider.data('block', true);                     
             
             var current = $slider.data('current');
             var count = $slider.data('count');
             var next = current + 1;
             
             if(next >= count)
             {
                 next = 0;
             }
             
             $slider.find('.page:eq('+current+')').stop().animate({opacity: 0.0}, 200, 
                function() 
                { 
                    q(this).css('display', 'none');
                    $slider.find('.page:eq('+next+')', c).css('opacity', 0.0).css('display', 'block').css('left', 0).animate({opacity: 1.0}, 500);
                    $slider.data('current', next);
                    $slider.data('block', false); 
                    $slider.find('.pages').text((next+1)+'/'+count);
                });
         }
       ); 
       
       $slider.find('.prev').click(
         function()
         {
             var block = $slider.data('block');
             if(block) 
             {
                 return;
             }
             $slider.data('block', true);                     
             
             var current = $slider.data('current');
             var count = $slider.data('count');
             var next = current - 1;
             
             if(next < 0)
             {
                 next = count - 1;
             }
             
             $slider.find('.page:eq('+current+')').stop().animate({opacity: 0.0}, 200, 
                function() 
                { 
                    q(this).css('display', 'none');
                    $slider.find('.page:eq('+next+')', c).css('opacity', 0.0).css('display', 'block').css('left', 0).animate({opacity: 1.0}, 500);
                    $slider.data('current', next);
                    $slider.data('block', false); 
                    $slider.find('.pages').text((next+1)+'/'+count);
                });
         }
       );              
             
             
   });
}


/***************************************************
    DCS GALLERY BOX
****************************************************/
function setupGalleryBox()
{
   var q = jQuery.noConflict();
   q('.dcs-gallery-box').each(function() 
   {          
       var $box = q(this);
       var c = $box[0];
   
      q('.triger', c).hover(
        function()
        {
            q(this).stop().animate({opacity: 0.5}, 400);  
        },
        function ()
        {
            q(this).stop().animate({opacity: 0.0}, 800);
        }
      );  
      
   });
}


/***************************************************
  PICTURE GALLERY
****************************************************/
function setupPictureGallery()
{
   var q = jQuery.noConflict();
   q('.gallery-slider').each(function() 
   {       
   
       var $slider = q(this);
       var c = $slider[0];
   
      q('.triger', c).hover(
        function()
        {
            q(this).stop().animate({opacity: 0.5}, 400);  
        },
        function ()
        {
            q(this).stop().animate({opacity: 0.0}, 800);
        }
      );  

       q('.page:first', c).css('display', 'block');
       var count = q('.page', c).length;
       $slider.find('.pages').text('1/'+count);
       
       if(count < 2)
       {
           $slider.find('.pages').css('display', 'none');
           $slider.find('.next').css('display', 'none');  
           $slider.find('.prev').css('display', 'none');
           $slider.css('padding-bottom', '0px');    
           return;
       }
       
       $slider.data('count', count);
       $slider.data('current', 0);
       $slider.data('block', false); 
       
       $slider.find('.next').click(
         function()
         {
             var block = $slider.data('block');
             if(block) 
             {
                 return;
             }
             $slider.data('block', true);                     
             
             var current = $slider.data('current');
             var count = $slider.data('count');
             var next = current + 1;
             
             if(next >= count)
             {
                 next = 0;
             }
             
             $slider.find('.page:eq('+current+')').stop().animate({opacity: 0.0}, 300, 
                function() 
                { 
                    q(this).css('display', 'none');
                    $slider.find('.page:eq('+next+')', c).css('opacity', 0.0).css('display', 'block').css('left', 0).animate({opacity: 1.0}, 500);
                    $slider.data('current', next);
                    $slider.data('block', false); 
                    $slider.find('.pages').text((next+1)+'/'+count);
                });
         }
       );
       
       
       $slider.find('.prev').click(
         function()
         {
             var block = $slider.data('block');
             if(block) 
             {
                 return;
             }
             $slider.data('block', true);                     
             
             var current = $slider.data('current');
             var count = $slider.data('count');
             var next = current - 1;
             
             if(next < 0)
             {
                 next = count - 1;
             }
             
             $slider.find('.page:eq('+current+')').stop().animate({opacity: 0.0}, 300, 
                function() 
                { 
                    q(this).css('display', 'none');
                    $slider.find('.page:eq('+next+')', c).css('opacity', 0.0).css('display', 'block').css('left', 0).animate({opacity: 1.0}, 500);
                    $slider.data('current', next);
                    $slider.data('block', false); 
                    $slider.find('.pages').text((next+1)+'/'+count);
                });
         }
       );   
   
   });
   
   
}


/***************************************************
  POST COMUNNITY ICONS
****************************************************/

function setupPostCommunityIcons()
{
   var q = jQuery.noConflict();

  q('#post-community-icons .icon').hover(
    function()
    {   
        var t = q(this).attr('rel');
        q(this).stop().animate({opacity: 1.0}, 150);
        q(this).parent().find('.description').text(t);    
    },
    function ()
    {        
        q(this).stop().animate({opacity: 0.6}, 1200);        
    }
  );    

  q('#post-community-icons').hover(
    function()
    {    
    },
    function ()
    {        
        var t = q(this).find('.default').text();
        q(this).find('.description').text(t);       
    }
  ); 
  

}

/***************************************************
  IMAGE ASYNC LOADING
****************************************************/

function setupAsyncImages(p)
{
    var q = jQuery.noConflict();
    
    q(p).each(
        function()
        {   
            var loader = q(this);
            var imagePath = loader.attr('rel');

            var img = new Image();
            q(img).css('opacity', '0.0').attr('alt', '')

                .load(
                    function() 
                    {
                        loader.append(this).removeAttr('rel');
                        q(this)
                            .css('margin', '0px')
                            .css('opacity', '0.0')
                            .animate({opacity: 1.0}, 500,
                                function()
                                {
                                    loader.css('background-image', 'none');
                                }
                            );
                    }
                ).attr('src', imagePath);                        
        }
    );
}

                                    
/**********************************************
    CONTACT EMAIL FORM
***********************************************/

function setupContactForm()
{
    var q = jQuery.noConflict(); 
    
    q('.send-email-btn').focus(function(){q(this).blur();})  
    
    q('.send-email-btn').click(
        function() 
        {
            var parent = q(this).parent();
            
            // get all data
            var name = q(parent).find('input[name=name]').val();
            var mail = q(parent).find('input[name=email]').val(); 
            var subject = q(parent).find('input[name=subject]').val();
            var message = q(parent).find('textarea[name=message]').val(); 
            var maildest = q(parent).find('input[name=contact-mail-dest]').val();
            var okay = q(parent).find('input[name=contact-okay]').val();
            var error = q(parent).find('input[name=contact-error]').val();                                                          
            
            // check user name
            var allok = true;
            if(name == '')
            {
                q(parent).find('input[name=name]').css('border', '1px solid #BB0000');
                allok = false;
            } else
            {
                q(parent).find('input[name=name]').css('border', '1px solid #fff');
                q(parent).find('input[name=name]').css('border-top', '1px solid #fff');
                q(parent).find('input[name=name]').css('border-left', '1px solid #fff');             
            }

            // check email
            var regExp = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9]([-a-z0-9_]?[a-z0-9])*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z]{2})|([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})(\.([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})){3})(:[0-9]{1,5})?$/i);
            // check email address, if result is null the email string dont match to pattern
            var resultExp = regExp.exec(mail);            
            if(mail == '' || resultExp == null)
            {
                q(parent).find('input[name=email]').css('border', '1px solid #BB0000');
                allok = false;
            } else
            {
                q(parent).find('input[name=email]').css('border', '1px solid #fff');
                q(parent).find('input[name=email]').css('border-top', '1px solid #fff');
                q(parent).find('input[name=email]').css('border-left', '1px solid #fff');             
            }
            
            // check subject
            if(subject == '')
            {
                q(parent).find('input[name=subject]').css('border', '1px solid #BB0000');
                allok = false;
            } else
            {
                q(parent).find('input[name=subject]').css('border', '1px solid #fff');
                q(parent).find('input[name=subject]').css('border-top', '1px solid #fff');
                q(parent).find('input[name=subject]').css('border-left', '1px solid #fff');             
            } 
            
            // check message
            if(message == '')
            {
                q(parent).find('textarea[name=message]').css('border', '1px solid #BB0000');
                allok = false;
            } else
            {
                q(parent).find('textarea[name=message]').css('border', '1px solid #fff');
                q(parent).find('textarea[name=message]').css('border-top', '1px solid #fff');
                q(parent).find('textarea[name=message]').css('border-left', '1px solid #fff');             
            }                          
            q(parent).find('.result').stop().animate({opacity:0.0}, 300);
            
            
            function callback(data)
            {   
                // if success        
                if(data == "okay")
                {   
                    q(parent).find('.result').css('opacity', '0.0').css('visibility', 'visible');
                    q(parent).find('.result').text(okay);
                    q(parent).find('.result').stop().animate({opacity:1.0}, 500);
                    
                    q(parent).find('input[name=name]').val('');
                    q(parent).find('input[name=email]').val(''); 
                    q(parent).find('input[name=subject]').val('');
                    q(parent).find('textarea[name=message]').val('');                                      
                } else // if error/problem during email sending in php script
                {
                    q(parent).find('.result').css('opacity', '0.0').css('visibility', 'visible');
                    q(parent).find('.result').text(error);
                    q(parent).find('.result').stop().animate({opacity:1.0}, 500);
                }
            }             
            
            if(allok)
            {       
                // build data string for post call
                var data = "name="+name;
                data += "&"+"mail="+mail;
                data += "&"+"subject="+subject;
                data += "&"+"message="+message;
                data += "&"+"maildest="+maildest; 

                // try to send email via php script executed on server
                q.post(dc_theme_path+'/php/sendmessage.php', data, callback, "text");
            } 
        });  
}

/***************************************************
  SETUP TAGS WIDGET
****************************************************/

function setupTagsWidget()
{
    var arr = Array();
    q('.widget-tags a').each(
      function()
      {              
          var str = q(this).attr('title');
          str = str.replace("topics", "");
          str = str.replace("topic", "");
          var number = parseInt(str);
          
          var obj = new Object();
          obj.topics = number;
          obj.ref = this;
          arr.push(obj);
      }
    );
    
    var count = arr.length;
    if(count > 0)
    {
        var min = arr[0].topics;
        var max = arr[0].topics;
        for(var i = 0; i < count; i++)
        {
            if(arr[i].topics > max) { max = arr[i].topics; }
            if(arr[i].topics < min) { min = arr[i].topics; }
        }
        
        var step = (max - min)/5;
        for(var i = 0; i < count; i++)
        {
            if(arr[i].topics <= min+(0*step)) { q(arr[i].ref).css('color', '#999999'); } else
            if(arr[i].topics <= min+(1*step)) { q(arr[i].ref).css('color', '#888888'); } else
            if(arr[i].topics <= min+(2*step)) { q(arr[i].ref).css('color', '#666666'); } else
            if(arr[i].topics <= min+(3*step)) { q(arr[i].ref).css('color', '#555555'); } else
            if(arr[i].topics <= min+(4*step)) { q(arr[i].ref).css('color', '#444444'); } else
            if(arr[i].topics <= min+(5*step)) { q(arr[i].ref).css('color', '#333333'); }                             
        }
    }    
}

/***************************************************
  SETUP CLIENT PANEL
****************************************************/

function setupClientPanel()
{
    var q = jQuery.noConflict();
    
    q('#client-panel .close-btn').click(function()
      {
          var q = jQuery.noConflict();
          
          q('#client-panel').css('display', 'none');
          q('#client-panel-open-btn').css('display', 'block');
      }
    );
    
    q('#client-panel-open-btn').click(function()
      {
          var q = jQuery.noConflict();
          
          q('#client-panel').css('display', 'block');
          q(this).css('display', 'none');
      }
    );
         
}

function setupPPhoto()
{
    var q = jQuery.noConflict(); 
    
    var dc_lightbox_mode = jQuery('meta[name=cms_lightbox_mode]').attr('content');
    q("a[rel^='lightbox']").prettyPhoto({theme:dc_lightbox_mode, showTitle: true});
}

function setupTogglePanels()
{
    var q = jQuery.noConflict(); 
    
    q('.toggle-triger').click(function() {
        
        var state = q(this).parent().find('.toggle-content').css('display');
        var parent = q(this).parent();
        
        if(state == 'none')
        {
            q(parent).find('.toggle-icon-open').removeClass('toggle-icon-open').addClass('toggle-icon-close');
        } else
        {
            q(parent).find('.toggle-icon-close').removeClass('toggle-icon-close').addClass('toggle-icon-open');  
        }        
        
        q(this).parent().find('.toggle-content').slideToggle(200); 
 }); 
    
    q('.toggle-flat-triger').click(function() {
        
        var state = q(this).parent().find('.toggle-flat-content').css('display');
        var parent = q(this).parent();
        if(state == 'none')
        {
            q(parent).find('.toggle-flat-icon-open').removeClass('toggle-flat-icon-open').addClass('toggle-flat-icon-close');
            q(parent).find('.toggle-flat-triger').css('background-color', '#E8E8E8');
        } else
        {
            q(parent).find('.toggle-flat-icon-close').removeClass('toggle-flat-icon-close').addClass('toggle-flat-icon-open');
            q(parent).find('.toggle-flat-triger').css('background-color', '#F5F5F5');  
        }        
         
        q(parent).find('.toggle-flat-content').slideToggle(200); });            


    q('.toggle-btn-triger').click(function() {
        
        var state = q(this).parent().find('.toggle-btn-content').css('display');
        var parent = q(this).parent();
        if(state == 'none')
        {
            q(this).removeClass('toggle-btn-icon-open').addClass('toggle-btn-icon-close');
        } else
        {
            q(this).removeClass('toggle-btn-icon-close').addClass('toggle-btn-icon-open'); 
        }        
         
        q(parent).find('.toggle-btn-content').slideToggle(200); });          

    q('.toggle-frame-triger').click(function() {
        
        var state = q(this).parent().find('.toggle-frame-content').css('display');
        var parent = q(this).parent();
        if(state == 'none')
        {
            q(this).removeClass('toggle-frame-icon-open').addClass('toggle-frame-icon-close');
        } else
        {
            q(this).removeClass('toggle-frame-icon-close').addClass('toggle-frame-icon-open'); 
        }        
         
        q(parent).find('.toggle-frame-content').slideToggle(200); });          
        
}

function setupPoupLogin()
{
    var q = jQuery.noConflict(); 
    
    q('#login-popup').find('.close').click(
        function()
        {
            q('#login-popup').stop().animate({opacity:0.0}, 200, function(){q(this).css('display', 'none');}); 
        }
    ); 
    
    q('#login-popup input[name=log]').focus(
      function()
      {   
          if(q(this).val() == 'Username')
          {             
              q(this).val('');
          } 
      }
    ); 

    q('#login-popup input[name=pwd]').focus(
      function()
      {   
          if(q(this).val() == 'Password')
          {             
              q(this).val('');
          } 
      }
    );     
    
    q('#login-popup input[name=log]').blur(
      function()
      {   
          if(q(this).val() == '')
          {             
              q(this).val('Username');
          } 
      }
    ); 

    q('#login-popup input[name=pwd]').blur(
      function()
      {   
          if(q(this).val() == '')
          {             
              q(this).val('Password');
          } 
      }
    ); 
    
    q('#header-login-panel .sign-in').click(
        function(e)
        {
            var parent = q(this).parent();
            var height = q(parent).height();
            var pos = q(parent).offset();
            
            q('#login-popup').css('left', pos.left-165).css('top', pos.top+20).css('display', 'block').stop().animate({opacity:1.0}, 200); 
            
        });   
}

function setupFadedElements()
{
    var q = jQuery.noConflict();

    q('.faded').hover(
    function()
    {
        q(this).stop().animate({opacity: 0.6}, 320);  
    },
    function ()
    {
        q(this).stop().animate({opacity: 1.0}, 500);
    }
    );
    
    q('.faded-in').hover(
    function()
    {
        q(this).stop().animate({opacity: 1.0}, 320);  
    },
    function ()
    {
        q(this).stop().animate({opacity: 0.5}, 500);
    }
    );           
}

/***************************************************
  TABS CODE
****************************************************/
function setupTabs()
{
    var q = jQuery.noConflict();
    
    q('.dcs-tabs-flat').each(
        function()
        {
            var def = q(this).find('.default').html();
            def = parseInt(def);
            
            q(this).find('ul.panel li:eq('+def+')').addClass('selected');
            q(this).find('.tab-content:eq('+def+')').css('display', 'block');
            
            q(this).find('ul.panel li').click(
                function()
                {
                    var parent = q(this).parent();
                    var index = q(parent).find('li').index(this);
                    q(parent).find('li').removeClass('selected');
                    q(this).addClass('selected');
                    
                    q(parent).parent().find('.tab-content').css('display', 'none');
                    q(parent).parent().find('.tab-content:eq('+index+')').css('display', 'block'); 
                }
            );
        }
    ); 
    
    q('.dcs-tabs-abs-flat').each(
        function()
        {
            var def = q(this).find('.default').html();
            def = parseInt(def);
            
            q(this).find('ul.panel li:eq('+def+')').addClass('selected');
            q(this).find('.tab-content:eq('+def+')').css('display', 'block');
            
            q(this).find('ul.panel li').click(
                function()
                {                                        
                    var parent = q(this).parent();
                    var index = q(parent).find('li').index(this);
                    
                    var display = q(parent).parent().find('.tab-content:eq('+index+')').css('display'); 
                    if(display == 'none')
                    {
                        q(parent).find('li').removeClass('selected');
                        q(this).addClass('selected');
                        
                        q(parent).parent().find('.tab-content').css('display', 'none');
                        q(parent).parent().find('.tab-content:eq('+index+')').css('display', 'block'); 
                    } else
                    {
                        q(parent).parent().find('.tab-content').css('display', 'none');
                        q(this).removeClass('selected');      
                    }
                }
            );
        }
    );     
}

/***************************************************
  NEWS CALENDAR CODE
****************************************************/
function setupNewsCalendar()
{
 
   var q = jQuery.noConflict();
   
   var cal = q('#news-calendar');
   
   cal.find('a').click(
     function()
     {
         q(this).parent().find('.news_archive_form').submit();
     }
   );
   
   q('#news-calendar').each(
        function()
        {
            q(this).find('.page:first').css('display', 'block');             
            q(this).find('.prev').click(
                function()
                {
                    var page = q(this).parent().parent();
                    var count = cal.find('.page').length;
                    var index = cal.find('.page').index(page);
                    if((count - 1) > index)
                    {
                        var move = index + 1;
                        cal.find('.page:eq('+index+')').stop().animate({opacity:0.0}, 200, 
                          function()
                          {
                              q(this).css('display', 'none');
                              cal.find('.page:eq('+move+')').css('opacity', 0.0).css('display', 'block').stop().animate({opacity:1.0}, 200);
                          }
                        );    
                    }                               
                }
            );  
            
            
            q(this).find('.next').click(
                function()
                {
                    var page = q(this).parent().parent();
                    var count = cal.find('.page').length;
                    var index = cal.find('.page').index(page);
                    if((index - 1) >= 0)
                    {
                        var move = index - 1;
                        
                        cal.find('.page:eq('+index+')').stop().animate({opacity:0.0}, 200, 
                          function()
                          {
                              q(this).css('display', 'none');
                              cal.find('.page:eq('+move+')').css('opacity', 0.0).css('display', 'block').stop().animate({opacity:1.0}, 200);
                          }
                        );    
                    }                               
                }
            );             
             
        }
   ); 
}

/***************************************************
  HEADER SEARCH
****************************************************/

function setupHeaderSearch()
{
    var q = jQuery.noConflict();
    q('#header-search-btn').data('dc_block', false);
   
    
    function onBtn()
    {
        var block = q(this).data('dc_block');
        if(block)
        {
            return;
        }        
        q(this).data('dc_block', true);        
        // q(this).stop().animate({opacity: 0.7}, 320);
        
        var pos = q(this).position();        
        q('#header-search-popup').css('opacity', 0.0).css('display', 'block').css('top', pos.top-65).css('left', pos.left-160).stop().animate({opacity:1.0,top:pos.top-55,left:pos.left-160}, 300);  
    }
    
    function offBtn()
    {
        // q(this).stop().animate({opacity: 0.5}, 320);                
    }
    
    var config = {    
         over: onBtn, // function = onMouseOver callback (REQUIRED)    
         timeout: 500, // number = milliseconds delay before onMouseOut    
         out: offBtn // function = onMouseOut callback (REQUIRED)    
    };    
    q('#header-search-btn').hoverIntent(config);         
    
    q('#header-container').hover(
      function()
      {
          
      },
      function()
      {
          var block = q('#header-search-btn').data('dc_block');
          if(block)
          {    q('#header-search-btn').data('dc_block', false);
               var pos = q('#header-search-popup').position();
               
               q('#header-search-popup').stop().animate({opacity:0.0, top:pos.top-10}, 500, function() {  q(this).css('display', 'none'); });   
          }    
      }
    );          
}




function preloadThemeImages()
{
    var dc_theme_url = jQuery('meta[name=cms_theme_url]').attr('content');
    var imgs = new Array(); 
    imgs[0] = '/img/common_files/checkbox_no.png';       
    imgs[1] = '/img/common_files/checkbox_yes.png'; 
    
    for(var i = 0; i < imgs.length; i++)
    {
        var new_img = new Image();
        new_img.src = dc_theme_url+imgs[i];     
    }        
}

function setupRelatedPosts()
{
    var q = jQuery.noConflict();  
    
    q('.dcs-related-posts li').hover(
      function()
      {
            var parent = q(this).parent();
            q(parent).find('li').not(this).stop().animate({opacity:0.5}, 300);    
      },
      function()
      {
            var parent = q(this).parent();
            q(parent).find('li').not(this).stop().animate({opacity:1.0}, 300);            
      }
    ); 
}


function setupAutoNGGGallery()
{
    var q = jQuery.noConflict();  
    
    q('.dcs-ngg-auto-gallery .triger').hover(
      function()
      {   
            var parent = q(this).parent().parent().parent();
            q(parent).find('.triger').not(this).stop().animate({opacity:0.7}, 300);    
      },
      function()
      {
            var parent = q(this).parent().parent().parent(); 
            q(parent).find('.triger').not(this).stop().animate({opacity:0.0}, 500);            
      }
    ); 
}

function setupImageSwitcher()
{
    var q = jQuery.noConflict();  
    
    q('.dcs-image-switcher .slideswrapper').hover(
        function()
        {
            $parent = q(this).parent();
            //q(this).find('.icon').css('display', 'none');
            q(this).find('.slide:eq(1)').css('display', 'none');
            if($parent.find('.deschover').length)
            {
                $parent.find('.desc').css('display', 'none');
                $parent.find('.deschover').css('display', 'block');    
            }    
        },
        function()
        {        
            $parent = q(this).parent(); 
            //q(this).find('.icon').css('display', 'block');
            q(this).find('.slide:eq(1)').css('display', 'block');      
            if($parent.find('.deschover').length)
            {
                $parent.find('.desc').css('display', 'block');
                $parent.find('.deschover').css('display', 'none');    
            }   
        }
    );    
    
}

function setupNextPrevPostPanel()
{
    var q = jQuery.noConflict(); 
    
    q('.npp-panel .next-btn, .npp-panel .prev-btn').hover(
      function()
      {
        var $parent = q(this).parent();
        var title = q(this).find('.data').text();
        $parent.find('.title').text(title);   
      },
      function()
      {
        var $parent = q(this).parent();
        $parent.find('.title').text('');       
      }      
    ); 
    
}


function setupDCSPhotoTriger()
{
    var q = jQuery.noConflict(); 
    q('.dcs-photo a.triger').hover(
     function()
     {         
         q(this).stop().animate({opacity:0.5}, 400);
     },
     function()
     {
         q(this).stop().animate({opacity:0.0}, 300);     
     }
    );    
}


/***************************************************
  PAGE MAIN CODE
****************************************************/
var q = jQuery.noConflict();
var dc_theme_path = jQuery('meta[name=cms_theme_url]').attr('content');
var dc_theme_name = jQuery('meta[name=cms_theme_name]').attr('content');

if(jQuery.browser.msie)
{
    var clear=dc_theme_path+"/img/common_files/clear.gif"; //path to clear.gif
    document.write('<script type="text/javascript" id="ct" defer="defer" src="javascript:void(0)"><\/script>');var ct=document.getElementById("ct");ct.onreadystatechange=function(){pngfix()};pngfix=function(){var els=document.getElementsByTagName('*'),ip=/\.png/i,al="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='",i=els.length,uels=new Array(),c=0;while(i-->0){if(els[i].className.match(/unitPng/)){uels[c]=els[i];c++;}}if(uels.length==0)pfx(els);else pfx(uels);function pfx(els){i=els.length;while(i-->0){var el=els[i],es=el.style,elc=el.currentStyle,elb=elc.backgroundImage;if(el.src&&el.src.match(ip)&&!es.filter){es.height=el.height;es.width=el.width;es.filter=al+el.src+"',sizingMethod='crop')";el.src=clear;}else{if(elb.match(ip)){var path=elb.split('"'),rep=(elc.backgroundRepeat=='no-repeat')?'crop':'scale',elkids=el.getElementsByTagName('*'),j=elkids.length;es.filter=al+path[1]+"',sizingMethod='"+rep+"')";es.height=el.clientHeight+'px';es.backgroundImage='none';if(j!=0){if(elc.position!="absolute")es.position='static';while(j-->0)if(!elkids[j].style.position)elkids[j].style.position="relative";}}}}}}
}  
                        
// main code called when page is loaded 
jQuery(document).ready(function($) 
    { 
        // common
        setupCufonFont();
        preloadThemeImages();
        setupLinks();        
        setupAsyncImages('.async-img, .async-img-s, .async-img-none');
        setupPPhoto();
        setupTogglePanels();
        setupFadedElements();
        setupHeaderSearch();
        setupDCSPhotoTriger();
        setupGalleryBox();
        setupTabs();
        setupNewsCalendar();
        setupChainSlider();
        setupNewsSlider();
        setupBannerSlider();
        setupSearchForm();
        setupRelatedPosts();
        setupImageSwitcher();
        setupNextPrevPostPanel();
        setupAutoNGGGallery();
            
        setupPopUpImages('.pu_img');
        setupDcsSimpleGallery();
        setupDcsSimpleGalleryThumbs();
        setupDcsImgThumbs();
        setupDcsCircleGallery();
        setupDcsCircleGalleryBig();
        
        setupClientPanel();
        
        q('.dcp-vote-stars').find('a.votes-text').addClass('link-tip-right').attr('title', 'Statistics'); 
        q('.link-tip-top').tipsy({gravity: 's', fade:false});                
        q('.link-tip-bottom').tipsy({gravity: 'n',fade:false});
        q('.link-tip-left').tipsy({gravity: 'e', fade:false});                
        q('.link-tip-right').tipsy({gravity: 'w', fade:false});        
        // sidebar
        setupTagsWidget();
        setupSidebarPostSlider();
        // gallery
        setupPictureGallery();
        // portfolio
        setupPortfolioSlider(); 
        // post
        setupPostCommunityIcons();
        // header
        setupHeaderCommunityIcons();
        setupPoupLogin();
        setupWordPressCustomMenu();                
        // homepage slider
        slider_acc.setup('#accordion-container');
        slider_a.setup('#slider-a-container');
        
        if(q('#video-slider-wrapper #video-slider').length)
        {
            homeVideoSlider.init();
        }
        
        homeImageSlider.init();
        homeFeatureSlider.init();
        homeManagerSlider.init();
        homeControlPanel.init();        
        // 
        setupContactForm(); 
    }
); 
