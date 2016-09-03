function WPSetAsBackground(c,b){
    /*var a=jQuery("a#wp-post-thumbnail-"+c);
    a.text(setPostThumbnailL10n.saving)*/
    jQuery.ajax({
        type:'POST',        
        url: postbackgroundURI + '/ajax.php',
        data:{
            action: 'add_post_background',
            post_id: post_id,
            attachment_id: c
        },
        dataType:'html',
        success:function(data){
            jQuery('#post_background .inside', window.parent.document).html(data);
            window.parent.tb_remove();
        }
    });
}

function WPRemoveBackground(post_id){
    jQuery.ajax({
        type:'POST',
        url: postbackgroundURI + '/ajax.php',        
        data:{
            action: 'remove_post_background',
            post_id: post_id
        },
        dataType:'html',
        success:function(data){
            jQuery('#post_background .inside').html(data);
        }
    });
}