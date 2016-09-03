<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      comments.php
* Brief:       
*      Theme comments page code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 
?>
 
<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>      
    <?php die('You can not access this page directly!'); ?>  
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
      <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
        <p>This post is password protected. Enter the password to view comments.</p>
      <?php endif; ?>
<?php endif; ?> 
 
 <?php

$featured_comment_id = null;  
function mytheme_comment($comment, $args, $depth) 
{      
   global $post;
   global $featured_comment_id;   
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">     
         <div id="comment-<?php comment_ID(); ?>">
         
     <div class="comment">
         
            <?php 
                $out = '';
                $out .= '<div class="gravatar">'; 
                
                $default_avatar = get_bloginfo('template_url').'/img/common_files/avatar1.jpg';
                $website = get_comment_author_url($comment->comment_ID);
                
                $out .= get_avatar($comment, '60', $default_avatar);
                if($website != '')
                {
                    $out .= '<a class="author-url" target="_blank" href="'.$website.'">Visit site</a>';
                } else
                {
                    $out .= '<span class="author-url">Visit site</span>';
                }
                $out .= '</div>';
                echo $out;
            
                echo '<div class="content">';
             
                $format = GetDCCPInterface()->getIGeneral()->getCommentTimeFormat();
                $out = '';
                $out .= '<div class="date"><span>';
                $out .= get_comment_time($format);             
                $out .= '</span><span class="when">'.dcf_calculatePastTime('Posted ', get_comment_time('H'), get_comment_time('i'), 
                    get_comment_time('s'), get_comment_date('n'), get_comment_date('j'), get_comment_date('Y')).'</span></div>';
                echo $out;
            

                $out = ''; 
                $out .= '<div class="author">'.get_comment_author($comment->comment_ID);
                
                if($post->post_author == $comment->user_id or $featured_comment_id == $comment->comment_ID)
                {   
                    $out .= ' <span style="font-size:10px;">(</span>';
                    $post_author_is_comment_author = false;
                    if($post->post_author == $comment->user_id)
                    {
                        $post_author_is_comment_author = true;    
                        $out .= '<span class="marked">Author</span>';   
                    }
                    if($featured_comment_id == $comment->comment_ID)
                    {
                        if($post_author_is_comment_author)
                        {
                            $out .= '<span style="font-size:10px;">, </span>';    
                        }    
                        $out .= '<span class="marked">Top Comment</span>';
                        $featured_comment_id = null;   
                    }
                    
                    $out .= '<span style="font-size:10px;">)</span>'; 
                }
                $out .= '</div>';
                echo $out; 

            ?> 
                       
            <div class="text"> 
                 <?php comment_text() ?> 
            </div>
            <div class="clear-both"></div>
          <?php if ($comment->comment_approved == '0') 
          { 
             echo '<div class="to-approve" ><em>Your comment is awaiting moderation</em></div>';
          } ?>
            <div class="clear-both"></div>               
            <span class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>                                   
          
          <?php
            if(GetDCCPInterface()->getIGeneral()->showCommentVoting())
            {
                global $dcp_votingshortcodes; 
                if(isset($dcp_votingshortcodes))
                {
                    echo $dcp_votingshortcodes->voteCommentCreate($comment->comment_ID, 'left'); 
                }
            }    
          ?>  
 
            </div> <!-- content -->
            <div class="clear-both"></div>
     </div> <!-- comment -->           
          
         </div> <!-- comment-ID -->
<?php
}
?>

<div id="comments-section">

    <?php if($post->comment_count > 0) { ?>
    <h2><?php 
        $pi_general = GetDCCPInterface()->getIGeneral();
        comments_number($pi_general->getNoCommentsText(), $pi_general->getOneCommentText(), $pi_general->getMoreCommentsText()); 
        
        ?></h2><?php } 
        
        
        if(GetDCCPInterface()->getIGeneral()->showVotingTopComment() and $post->comment_count > 1)
        {
            global $dcp_votingshortcodes; 
            if(isset($dcp_votingshortcodes))
            {
                global $post;
                $data = $dcp_votingshortcodes->getPostTopVotedComment($post->ID);
                
                if($data !== null)
                {
                    global $featured_comment_id; 
                    $featured_comment_id = $data->cid;
                    $out = '';
                    $out .= '<div class="comment-featured-wrapper"><div class="comment-featured">';
                        $out .= '<div class="icon"></div>';
                        $out .= '<span class="title">TOP comment</span>';
                        $fcomment = get_comment($data->cid);
                        $comment_time = strtotime($fcomment->comment_date);
                        
                        $out .= '<span class="when">'.dcf_calculatePastTime('Posted ', date('H', $comment_time), date('i', $comment_time), 
                            date('s', $comment_time), date('n', $comment_time), date('j', $comment_time), date('Y', $comment_time)).'</span>';                                               
                        
                        $out .= '<div class="clear-both"></div><p>'.convert_smilies($fcomment->comment_content).'</p>';
                        $out .= '<span class="author">'.$fcomment->comment_author.'</span>'; 
                        $out .= $data->text;                        
                    
                    $out .= '<div class="clear-both"></div></div></div>'; 
                    echo $out; 
                }
            }            
            
        }        
        
        ?>         
<ul class="comment-list">
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
</ul>
   </div> <!-- comments-section --> 
    <div class="clear-both"></div>
   <?php 

      if(is_singular() and get_option('page_comments'))
      {

          global $wp_rewrite; 
          $comment_page = get_query_var('cpage');
          if(!$comment_page)
          {
              $comment_page = 1;
          }
          
          $comment_max_page = get_comment_pages_count();
          
          if($comment_max_page > 1)
          {
              $comment_defaults = array(
                  'base' => add_query_arg('cpage', '%#%'),
                  'format' => '',
                  'total' => $comment_max_page,
                  'current' => $comment_page,
                  'echo' => true,
                  'prev_next' => false,
                  'add_fragment' => '#comments'
              );
              if ( $wp_rewrite->using_permalinks() )
                  $comment_defaults['base'] = user_trailingslashit(trailingslashit(get_permalink()) . 'comment-page-%#%', 'commentpaged');
          
              $comment_args = wp_parse_args( $comment_args, $comment_defaults );
              $comment_page_links = paginate_links( $comment_args );   
           
              $out = '';
              $out .= '<div class="comments-page-links"><span class="before">Pages: </span>';
              $out .= $comment_page_links;
              $out .= '</div>';
              echo $out;
          }
      }
   ?>

   
<?php
    global $post;
    $pi_general = GetDCCPInterface()->getIGeneral(); 
    
    if(comments_open())
    {                        
        if(get_option('comment_registration') && !$user_ID)
        {
            $out = '';
            $out .= '<span style="font-size:11px;color:#888888;">You must be<span> ';
            $out .= '<a style="font-size:11px;" href="'.get_bloginfo('url').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">logged in</a> '; 
            $out .= '<span style="font-size:11px;color:#888888;">to post comment.</span>';
            echo $out;             
        } else
        {
            $out  = '<div id="respond">';
            $out .= '<div class="common-form">';
            $out .= '<h3>'.$pi_general->getLeaveCommentText().'</h3>';
            $out .= '<form action="'.get_option('siteurl').'/wp-comments-post.php" method="post" id="commentform">';
            
            if(!$user_ID)
            {
                $rne = (bool)get_option('require_name_email'); 
                
                $out .= '<p>Your Name: <span class="required">('.($rne ? 'required' : 'not required').')</span></p>';
                $out .= '<input class="text-ctrl-tiny" type="text" value="'.$comment_author.'" name="author" id="author" />';
                
                $out .= '<p>E-Mail: <span class="required">('.($rne ? 'required' : 'not required').')</span></p>';
                $out .= '<input class="text-ctrl-tiny" type="text" value="'.$comment_author_email.'" name="email" id="email" />';
                
                $out .= '<p>Website: <span class="required">(not required)</span></p>';
                $out .= '<input class="text-ctrl-tiny" type="text" value="'.$comment_author_url.'" name="url" id="url" />';
            } else
            {
                $out .= '<span style="font-size:11px;color:#888888;">Loged in as</span> ';
                $out .= '<a style="font-size:11px;" href="'.get_bloginfo('url').'/wp-admin/profile.php">'.$user_identity.'</a><span style="font-size:11px;color:#888888;">.</span> ';
                $out .= '<span style="font-size:11px;color:#888888;">Here you can</span> ';
                $out .= '<a style="font-size:11px;" href="'.get_bloginfo('url').'/wp-login.php?action=logout">log out</a> ';
                $out .= '<span style="font-size:11px;color:#888888;">of this account.</span>';
            }
            
            $out .= '<p>Message: <span class="required">(required)</span></p>';
            $out .= '<textarea class="textarea-ctrl" rows="5" cols="10" name="comment" id="comment" ></textarea>';
            $out .= '<div style="height:5px;"></div>';         
            $out .= '<input class="send-comment-btn" value="'.$pi_general->getSubmitCommentBtnName().'" name="submit" type="submit" id="respond-send" />';
            echo $out;
            
            comment_id_fields();
            do_action('comment_form', $post->ID); 
                    
            $out = '</form>'; 
            $out .= '<div class="cancel-respond" id="cancel-comment-reply">';
            echo $out;
            
            cancel_comment_reply_link('Cancel reply');
            
            $out  = '</div>';               
            $out .= '</div>'; // common-form          
            $out .= '</div> <!-- respond -->';        
            echo $out;
        }
        
    } else
    {
       echo 'The comments are closed.';
    }
    
?>
