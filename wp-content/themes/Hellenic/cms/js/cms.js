/*********************************************************** 
* MAIN
************************************************************/  

function setupTogglePanelsCMS()
{
    var q = jQuery.noConflict(); 
    
    q('.cms-toggle-triger').click(function() {q(this).parent().find('.cms-toggle-content').slideToggle(200, 
    function()
    {
        var state = q(this).css('display');
        var parent = q(this).parent();
        
        if(state == 'block')
        {
            q(parent).find('.cms-toggle-icon-open').removeClass('cms-toggle-icon-open').addClass('cms-toggle-icon-close');
        } else
        {
            q(parent).find('.cms-toggle-icon-close').removeClass('cms-toggle-icon-close').addClass('cms-toggle-icon-open');  
        }
    }
    
    ); });        
}


jQuery(document).ready(function($) 
    {   
        var q = jQuery.noConflict(); 
        
        setupTogglePanelsCMS();
          
        // saved bar
        q('.cms-saved-bar').stop().css('opacity', 0.0).animate({opacity:1.0}, 600).animate({opacity:0.0}, 600).animate({opacity:1.0}, 600);        
        
        // image loading
        var formfield = null;
        
        q('.upload_image_button').click(function() {
               
         formfield = q(this).attr('name');  
         tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true'); 
         return false;

        });

        window.original_send_to_editor = window.send_to_editor;
        
        window.send_to_editor = function(html) {

            if(formfield)
            {
                imgurl = q('img',html).attr('src');
                q('#'+formfield).val(imgurl);
                tb_remove();
                formfield = null;
            } else
            {
                window.original_send_to_editor(html);
            }
        }  
        
                     
    }); 
    
    