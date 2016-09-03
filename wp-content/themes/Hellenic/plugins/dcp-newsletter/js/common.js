/**********************************************************************
* DIGITAL CAVALRY WP NEWSLETTER SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      common.js
* Brief:       
*      Plugin JavaScript file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/  

/*********************************************************** 
* MAIN
************************************************************/  

jQuery(document).ready(function($)
{   
    var q = jQuery.noConflict(); 
    var dc_theme_name = jQuery('meta[name=cms_theme_name]').attr('content');
    if(dc_theme_name != 'Prestige') { return; } 
    
    q('.dcwp-newsletter .wrap-register, .dcwp-newsletter .wrap-register-wide').click(function() { 
        
        var widget = q(this).parent().parent();
        
        var email = q(widget).find('input[name=email]').val();
        var meta = q(widget).find('input[name=meta]').val(); 
        
        allok = true;
        // check email
        var regExp = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9]([-a-z0-9_]?[a-z0-9])*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z]{2})|([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})(\.([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})){3})(:[0-9]{1,5})?$/i);
        // check email address, if result is null the email string dont match to pattern
        var resultExp = regExp.exec(email);            
        if(email == '' || resultExp == null)
        {
            q(widget).find('input[name=email]').css('border', '1px solid #BB0000');
            allok = false;
        } else
        {
            q(widget).find('input[name=email]').css('border-top', '1px solid #222').css('border-left', '1px solid #222');
            q(widget).find('input[name=email]').css('border-right', '1px solid #333').css('border-bottom', '1px solid #333');         
        } 
        
        if(!allok)
        {
            return;
        }      
        
         function registerNewsletterSuccess(data)
         {
            q = jQuery.noConflict();

            q(widget).find('.ajax').animate({opacity:0.0}, 400, function()
            {
               q(this).css('display', 'none'); 
            });
                        
            if(data.exist)
            {
                q(widget).find('.info').css('opacity', 0.0).html('You are already registered.').css('display', 'inline').stop().animate({opacity:1.0}, 200);     
            } else
            {
                if(data.registered)
                {
                    q(widget).find('.info').css('opacity', 0.0).html('You have beean registered. Thank you.').css('display', 'inline').stop().animate({opacity:1.0}, 200);
                } else
                {
                    q(widget).find('.info').css('opacity', 0.0).html('There was an error, please try later.').css('display', 'inline').stop().animate({opacity:1.0}, 200);     
                }
            }
         }     

         var ajax_result = true;
        q(widget).ajaxError(function() {
            q(widget).find('.ajax').stop().animate({opacity:0.0}, 200, function()
            {
               q(this).css('display', 'none'); 
            });
            q(widget).find('.info').css('opacity', 0.0).html('There was an error, please try later.').css('display', 'inline').stop().animate({opacity:1.0}, 200);      
        });         
         
         q(widget).find('.info').stop().animate({opacity:0.0}, 100); 
         q(widget).find('.ajax').css('opacity', 0.0).css('display', 'block').stop().animate({opacity:1.0}, 200);

         q.post(
            dcp_newsletter_plugin_path+'lib/actions.php', 
            { 'action': 'register', 'email':email, 'meta':meta},
            registerNewsletterSuccess, 'json');        
        
        
    });
    
    
    q('.dcwp-newsletter .wrap-unregister').click(function() { 
        
        var widget = q(this).parent().parent();
        
        var email = q(widget).find('input[name=email]').val();
        var meta = q(widget).find('input[name=meta]').val(); 
        
        allok = true;
        // check email
        var regExp = new RegExp(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9]([-a-z0-9_]?[a-z0-9])*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z]{2})|([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})(\.([1]?\d{1,2}|2[0-4]{1}\d{1}|25[0-5]{1})){3})(:[0-9]{1,5})?$/i);
        // check email address, if result is null the email string dont match to pattern
        var resultExp = regExp.exec(email);            
        if(email == '' || resultExp == null)
        {
            q(widget).find('input[name=email]').css('border', '1px solid #BB0000');
            allok = false;
        } else
        {
            q(widget).find('input[name=email]').css('border-top', '1px solid #222').css('border-left', '1px solid #222');
            q(widget).find('input[name=email]').css('border-right', '1px solid #333').css('border-bottom', '1px solid #333');         
        } 
        
        if(!allok)
        {
            return;
        }      
        
         function unregisterNewsletterSuccess(data)
         {
            q = jQuery.noConflict();

            q(widget).find('.ajax').animate({opacity:0.0}, 400, function()
            {
               q(this).css('display', 'none'); 
            });
                        
            if(data.exist)
            {
                if(data.unregistered)
                {
                    q(widget).find('.info').css('opacity', 0.0).html('You have bean unregisterd. Thank you.').css('display', 'inline').stop().animate({opacity:1.0}, 200);
                } else
                {
                    q(widget).find('.info').css('opacity', 0.0).html('There was an error, please try later.').css('display', 'inline').stop().animate({opacity:1.0}, 200);     
                }                    
            } else
            {
                q(widget).find('.info').css('opacity', 0.0).html('You are not registered.').css('display', 'inline').stop().animate({opacity:1.0}, 200); 

            }
         }     

         var ajax_result = true;
        q(widget).ajaxError(function() {
            q(widget).find('.ajax').stop().animate({opacity:0.0}, 200, function()
            {
               q(this).css('display', 'none'); 
            });
            q(widget).find('.info').css('opacity', 0.0).html('There was an error, please try later.').css('display', 'inline').stop().animate({opacity:1.0}, 200);      
        });         
         
         q(widget).find('.info').stop().animate({opacity:0.0}, 100); 
         q(widget).find('.ajax').css('opacity', 0.0).css('display', 'block').stop().animate({opacity:1.0}, 200);

         q.post(
            dcp_newsletter_plugin_path+'lib/actions.php', 
            { 'action': 'unregister', 'email':email, 'meta':meta},
            unregisterNewsletterSuccess, 'json');        
        
        
    });    
           
}); 
