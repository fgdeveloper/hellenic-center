<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      single-news.php
* Brief:       
*      Theme single news page code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();     
    the_post();
    
    global $post;                                                 
    $pageid = $post->ID;
    
    $dccp = GetDCCPInterface(); 
    $pt_list = wp_get_object_terms($post->ID, 'news_cat');
    
    $extlink = get_term_link($pt_list[0]->slug, 'news_cat')                                                    
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, '', $pt_list[0]->name, $extlink); ?> 
    </div>

    <div id="content">
         
        <?php 
                $imagepath = get_post_meta($post->ID, 'news_image', true);
                $postcustom = get_post_meta($post->ID, 'news_custom', true);
                $imagedesc = get_post_meta($post->ID, 'news_image_desc', true);
                $videopath = get_post_meta($post->ID, 'news_video', true);
                $disablevideo = get_post_meta($post->ID, 'news_disable_video', true);
                $novoting = get_post_meta($post->ID, 'news_novoting', true);                
                
                $dccp->getIGeneral()->includeSidebar($pageid);
                if($dccp->getIGeneral()->getSidebarOnRight())
                {
                    echo '<div class="page-width-600-left">';
                } else
                {
                   echo '<div class="page-width-600">'; 
                }
                              
                if($postcustom == '')
                {

                    $out .= '
                   
                        <div class="blog-post">';   
                                                
                            if($videopath != '' and $disablevideo == '')
                            {
                                $out .= '<div class="photo">'.do_shortcode($videopath).' '.$imagedesc.'</div>';  
                            } else
                            if($imagepath != '')
                            {                   
                                $out .= '<div class="photo"><a class="async-img image" rel="'.$imagepath.'" ></a>'.$imagedesc.'</div>';
                            }                      
                                 
                            $out .= '<div class="post-content">';
                            if('open' == $post->comment_status) 
                            {                              
                                $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
                            }
                            $out .= '<div class="info">
                                    <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span>
                                    Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                                    
                                $pt_count = count($pt_list);
                                $cat_comma_separated = '';
                                for($i = 0; $i < $pt_count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', ';
                                       $cat_comma_separated .= ','; 
                                    }
                                    $out .= '<a href="'.get_term_link($pt_list[$i]->slug, 'news_cat').'">'.$pt_list[$i]->name.'</a>';
                                    $cat_comma_separated .= $pt_list[$i]->slug; 
                                }                               
                                
                                $out .= '</div>';
                                  
                                $out .= '<h2>'.$post->post_title.'</h2>';
                                echo $out; 
                                    
                                the_content();  
                                GetDCCPInterface()->getIGeneral()->renderWordPressPagination(); 

                                $out = '';
                                $out .= '<div class="blog-post-bottom-wrapper-single">';
                                $out .= GetDCCPInterface()->getIGeneral()->renderNextPrevPostPanel($post->post_type);
                                
                                if(GetDCCPInterface()->getIGeneral()->showNewsVoting() and $novoting == '')
                                {
                                    global $dcp_votingshortcodes; 
                                    if(isset($dcp_votingshortcodes))
                                    {
                                        $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                    }
                                }                                   
                                
                               // post tags list
                               $posttags = wp_get_object_terms($post->ID, 'news_tag');                              
                               $count = 0;
                               $count = count($posttags);
                                
                               if($count > 0)
                               {   
                                   $out .= '<div class="blog-post-tags-single">
                                            <span class="name">Tags:</span> ';
                                   
                                   $i = 0;            
                                   foreach($posttags as $tag)
                                   {   
                                       if($i > 0)
                                       {
                                           $out .= ', ';
                                       }
                                       $title = '';
                                       if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                         
                                        
                                        $out .= '<a href="'.get_term_link($tag->slug, 'news_tag').'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
                                       $i++;
                                   }                       
                                   $out .= '</div>';                                            
                                    
                               } else
                               { 
                                    if(GetDCCPInterface()->getIGeneral()->showNoTags()) 
                                    {                                
                                       $out .= '<div class="blog-post-tags-single">
                                                There are no tags associated with this post.                           
                                            </div>';   
                                    }                                                                                 
                               }                            
     
                            $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons(); 
                            
                            $out .= '<div class="clear-both"></div></div>';
                               
                            $out .= '</div> <!-- content -->                 
                        </div> <!-- blog-post -->';                
                           echo $out;
                               
                    if(GetDCCPInterface()->getIGeneral()->showNewsAuthor()) 
                    {                           
                        $default_avatar = get_bloginfo('template_url').'/img/common_files/avatar2.jpg'; 
                        $authoremail = get_the_author_meta('user_email', $post->post_author);
                        $avatar = get_avatar($authoremail, '60', $default_avatar);
               
                        $author_posts_count = get_the_author_posts();
                        $author_tip = $author_posts_count . ($author_posts_count > 1 ? ' posts' : ' post');
                       $out = '';
                       $out = '
                             <div class="blog-post-author"> 
                        
                            <h4>ABOUT THE AUTHOR</h4> 
                        
                            <div class="avatar"> 
                                '.$avatar.' 
                            </div> <!--avatar-->                       
                                                    
                            <div class="desc-wrapper" '.($nosidebar != '' ? ' style="width:800px;" ' : ' style="width:480px;" ').'>                     
                                <div class="float-left"> 
                                    <p class="author">'.get_the_author_meta('display_name', $post->post_author).'</p> 
                                    <p class="authorTitle">'.get_the_author_meta('first_name', $post->post_author).' '.get_the_author_meta('last_name', $post->post_author).'</p> 
                                </div>'; 
                                
                                $author_url = get_the_author_meta('user_url', $post->post_author); 
                                if($author_url != '')
                                {
                                    $out .= '<div class="float-right"> 
                                        <a href="'.$author_url.'" class="authorLink" target="_blank">Visit Authors Site</a> 
                                    </div>';
                                } 
                                 
                                $out .= '<div class="clear-both"></div>
                                <div style="float: left;"> 
                                    <p class="desc">'.get_the_author_meta('description', $post->post_author).' '.
                                    '<a title="'.$author_tip.'" class="link-tip-right" href="'.get_author_posts_url($post->post_author).'">View&nbsp;all&nbsp;posts&nbsp;by&nbsp;'.get_the_author_meta('display_name', $post->post_author).'</a></p> 
                                </div> 
                            </div>
                                 
                          
                            
                            <div class="clear-both"></div> 
                        
                        </div> <!--blog-post-author-->               
                       ';
                       echo $out; 
                    
                    }
                
                    $content_code = '[dcs_related_news id="'.$pageid.'"]';
                    echo do_shortcode($content_code);                
                
                } else
                {                    
                    the_content();
                }
                
                
                if('open' == $post->comment_status)
                {
                    echo '<a name="comments"></a>';
                    comments_template();
                }
                 
           
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>
