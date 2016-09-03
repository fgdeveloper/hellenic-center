/**********************************************************************
* DIGITAL CAVALRY WP VOTING SYSTEM PLUGIN 
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

function dcp_createVotingCookie(name,value,seconds) {
    if (seconds) {
        var date = new Date();  
        date.setTime(date.getTime()+(seconds*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function dcp_readVotingCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function dcp_eraseVotingCookie(name) {
    createCookie(name,"",-1);
}


function dcp_voteCommentUpDown(obj, cookiename, commentid, value, expire, postid)  
{
    var q = jQuery.noConflict();
    
    function voteCommentSuccess(data)
    {
        var q = jQuery.noConflict(); 
        var parent = q(obj).parent(); 
        data.up = parseInt(data.up);
        data.down = parseInt(data.down);        
        
        q(parent).find('.up').text('+'+data.up);
        q(parent).find('.down').text('-'+data.down);
        q(parent).find('.sum').text('('+data.sum+')');       
        q(parent).find('.procentage').text('+'+data.proc_up+'%/-'+data.proc_down+'%'); 
        q(parent).find('.img-up').css('display', 'none');
        q(parent).find('.img-down').css('display', 'none');
        q(parent).find('.img-locked').css('display', 'inline');
       
        dcp_createVotingCookie(cookiename, 1, expire); 
        q(parent).animate({opacity:1.0}, 300);            
    }  
    
     var parent = q(obj).parent();
     q(parent).animate({opacity:0.0}, 300);    
    
     q.post(
        dcp_voting_plugin_path+'lib/actions.php', 
        { 'action': 'votecomment', 'commentid':commentid, 'value':value, 'postid':postid},
        voteCommentSuccess, 'json');      
}

function dcp_votePostStars(obj, cookiename, postid, value, expire)
{

     var q = jQuery.noConflict(); 
     
     if(q('#dcp-vote-stat-frame').length)  
     {
         var pos = q(obj).parent().position();
         var frame_pos = q('#dcp-vote-stat-frame').position();

         if(pos.top+25 != frame_pos.top)
         {
            q('#dcp-vote-stat-frame').stop().css('opacity', 0.0).css('left', pos.left).css('top', pos.top+25).animate({opacity:1.0}, 200); 
         }
     }
     
     function votePostSuccess(data)
     {
        q = jQuery.noConflict();

        if(data.votes == 1)
        {
            q(parent).find('.votes-text').text('vote');    
        } else
        {
            q(parent).find('.votes-text').text('votes');
        }
        
        // console.log(data);        
        var rate = data.sum / data.votes;
        rate = rate.toFixed(1); 
        q(parent).find('.star')
            .animate({opacity:1.0}, 200)
            .removeAttr('onmouseout')
            .removeAttr('onclick')
            .removeAttr('onmouseover')
            .attr('title', data.votes+' votes, average '+rate+' out of '+data.max_stars);
                    
        q(parent).find('.rating').text(rate);
        q(parent).find('.votes-num').text(data.votes);
        dcp_starMouseOut(obj, rate, data.max_stars);
        dcp_createVotingCookie(cookiename, 1, expire);
        
        dcp_votePostStarsUpdateStats(obj, data);
     }     
     
     var parent = q(obj).parent();
     q(parent).find('.star').animate({opacity:0.0}, 200);
     
     q.post(
        dcp_voting_plugin_path+'lib/actions.php', 
        { 'action': 'votepost', 'postid':postid, 'value':value},
        votePostSuccess, 'json');
   
         
}

function dcp_votePostStarsUpdateStats(obj, data)
{
    q = jQuery.noConflict(); 
    var parent = q(obj).parent();
    
    var out = '<span class="head">Voting statistics:</span><img class="close" src="'+dcp_voting_plugin_path+'img/close.png'+'"/>';       
    out += '<table>';
    out += '<thead><tr><th>Rate</th><th>Percentage</th><th>Votes</th></tr></thead>';
    
    var stats = new Array();
    stats[0] = data.votes1;
    stats[1] = data.votes2;
    stats[2] = data.votes3;
    stats[3] = data.votes4;
    stats[4] = data.votes5;
    stats[5] = data.votes6;
    stats[6] = data.votes7;
    stats[7] = data.votes8;
    stats[8] = data.votes9;
    stats[9] = data.votes10;                                                  
    
   
    
    var proc = new Array();
    var maxproc = stats[0]/data.votes;
    maxproc = maxproc.toFixed(2);
    maxproc = maxproc * 100;
   
    for(var i = 0; i < 10; i++)
    {
       proc[i] = (stats[i]/data.votes).toFixed(2)*100;
       if(proc[i] > maxproc)
       {
          maxproc = proc[i]; 
       }
    }    
    
    
    out += '<tbody>'; 
    for(var i = (data.max_stars-1); i >= 0; i--)
    {        
        out += '<tr><td>'+(i+1)+'</td>';
        out += '<td class="proc"><img src="'+dcp_voting_plugin_path+'img/bar.jpg'+'" style="width:'+(Math.round(100*proc[i]/maxproc))+'px;" alt="" />'+Math.round(proc[i])+'%</td>';        
        out += '<td>'+stats[i]+'</td></tr>';  
    }    
    out += '</tbody>';

    out += '</table>';      
    
    // output data
    q(parent).find('.dcp-vote-stat').html(out);    
    if(q('#dcp-vote-stat-frame').length)
    {
        q('#dcp-vote-stat-frame').html(out);
        q('#dcp-vote-stat-frame').find('.close').click(
            function()
            {
                q('#dcp-vote-stat-frame').stop().animate({opacity:0.0}, 200, function(){q(this).remove();}); 
            }
        );             
    }
}


function dcp_starMouseOver(obj)
{
     var q = jQuery.noConflict();
     
     var parent = q(obj).parent();
     var index = q(parent).find('.star').index(obj);
     q(parent).find('.star').slice(0, index+1).attr('src', dcp_voting_stars_array[0]);
}

function dcp_starMouseOut(obj, rate, stars_num)
{
     var q = jQuery.noConflict();     
     var parent = q(obj).parent();
     

    for(var i = 0; i < stars_num; i++)
    {
        var rating = rate;
        if(rating >= (i+1))
        {
           q(parent).find('.star:eq('+i+')').attr('src', dcp_voting_stars_array[1]);  
        } else
        if(rating >= (i+0.75))
        {
           q(parent).find('.star:eq('+i+')').attr('src', dcp_voting_stars_array[4]);  
        } else             
        if(rating >= (i+0.5))
        {
           q(parent).find('.star:eq('+i+')').attr('src', dcp_voting_stars_array[3]);  
        } else          
        if(rating >= (i+0.25))
        {
           q(parent).find('.star:eq('+i+')').attr('src', dcp_voting_stars_array[2]);  
        } else               
        {
           q(parent).find('.star:eq('+i+')').attr('src', dcp_voting_stars_array[5]);
        }
    } // for         
       
}


 jQuery(document).ready(function($)
    {   
        var q = jQuery.noConflict(); 
        var dc_theme_name = jQuery('meta[name=cms_theme_name]').attr('content');
        if(dc_theme_name != 'Prestige') { return; } 
        
        // comments voting  
        q('.dcp-vote-comment .img-up, .dcp-vote-comment .img-down').hover(
            function(e)        
            {
                q(this).stop().animate({opacity:1.0}, 200);    
            },
            function(e)
            {
                q(this).stop().animate({opacity:0.7}, 200);
            }
        );
        
        // posts voting
        q('.dcp-vote-stars a.votes-text').click(
            function(e)
            {

                
                var parent = q(this).parent();
                var pos = q(parent).position();
                var align = q(parent).css('text-align');
                var frame = q('#dcp-vote-stat-frame');
                
                if(q('#dcp-vote-stat-frame').length)
                {                    
                   q('#dcp-vote-stat-frame').stop().animate({opacity:0.0}, 200, function(){q(this).remove();});
                   var dc_this = q('#dcp-vote-stat-frame').data('dc_this');
                   if(dc_this == this)
                   {
                        return;
                   }     
                }
                q('body').append('<div id="dcp-vote-stat-frame"></div>');
                q('#dcp-vote-stat-frame').css('opacity', 0.0);
                q('#dcp-vote-stat-frame').data('dc_this', this);
                
                if(align == 'right')
                {
                    pos.left = pos.left + q(parent).width() - 260;
                }
                
                var code = q(parent).find('.dcp-vote-stat').html();
                
                q('#dcp-vote-stat-frame').css('left', pos.left).css('top', pos.top+25);
                
                q('#dcp-vote-stat-frame').html(code).stop().animate({opacity:1.0}, 200);
                q('#dcp-vote-stat-frame').find('.close').click(
                    function()
                    {
                        q('#dcp-vote-stat-frame').stop().animate({opacity:0.0}, 200, function(){q(this).remove();}); 
                    }
                );
                                
            }
        );
         
       
            
    }); 
