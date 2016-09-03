<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      single.php
* Brief:       
*      Theme single page code
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
    
    $catlist = wp_get_post_categories($post->ID);
    $count_cat = count($catlist);
    
    $extname = '';
    $extlink = '';
    if($count_cat > 0)
    {
        // var_dump($catlist);
       $cat = get_category($catlist[0]);
       $extname = $cat->name;
       $extlink = get_category_link($catlist[0]); 
    }                                                 
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, '', $extname, $extlink); ?> 
    </div>

    <div id="content">
         
        <?php 

                $imagepath = get_post_meta($post->ID, 'post_image', true);
                $bigimagepath = get_post_meta($post->ID, 'post_big_image', true);
                $postcustom = get_post_meta($post->ID, 'post_custom', true);
                $imagedesc = get_post_meta($post->ID, 'post_image_desc', true);
                $videopath = get_post_meta($post->ID, 'post_video', true);
                $videopathfull = get_post_meta($post->ID, 'post_video_full', true); 
                $disablevideo = get_post_meta($post->ID, 'post_disable_video', true);
                $nosidebar = get_post_meta($post->ID, 'post_nosidebar', true);                 
                $novoting = get_post_meta($post->ID, 'post_novoting', true); 
                 
                 
                if($nosidebar != '')
                {
                    echo '<div class="page-width-920">';     
                } else
                {
                    $postsidebar = get_post_meta($post->ID, 'post_sidebar', true);
                    $dccp->getIGeneral()->includeSidebar($pageid, $postsidebar);
                    if($dccp->getIGeneral()->getSidebarOnRight())
                    {
                        echo '<div class="page-width-600-left">';
                    } else
                    {
                       echo '<div class="page-width-600">'; 
                    }
                
                }
                
                              
                if($postcustom == '')
                {
                             
                    $month = get_the_time('n', $post->ID);
                    $year = get_the_time('Y', $post->ID); 

                    $out .= '
                   
                        <div class="blog-post">';   
                                                
                            if($videopath != '' or $videopathfull != '' and $disablevideo == '')
                            {
                                if($nosidebar)
                                {
                                    if($videopathfull != '')
                                    {                         
                                        $out .= '<div class="photo920">'.do_shortcode($videopathfull).' '.$imagedesc.'</div>';
                                    }
                                } else
                                {  
                                    if($videopath != '')
                                    {
                                        $out .= '<div class="photo">'.do_shortcode($videopath).' '.$imagedesc.'</div>';  
                                    }                                 
                                }                             
                            
                            } else
                            if($imagepath != '' or $bigimagepath != '')
                            {
                                if($nosidebar)
                                {
                                    if($bigimagepath != '')
                                    {
                                        $out .= '<div class="photo920"><a class="async-img image" rel="'.$bigimagepath.'" ></a>'.$imagedesc.'</div>'; 
                                    }
                                } else
                                {   
                                    if($imagepath != '')
                                    {                         
                                        $out .= '<div class="photo"><a class="async-img image" rel="'.$imagepath.'" ></a>'.$imagedesc.'</div>';
                                    }
                                } 
                            } else
                            {
                                $out .= '<div class="post-no-photo-spliter"></div>'; 
                            }                     
                                 
                            $out .= '<div class="post-content">';
                            if('open' == $post->comment_status) 
                            {                              
                                $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
                            }
                            $out .= '<div class="info">
                                    <a class="date-left"></a><a href="'.get_month_link($year, $month).'" class="date">'.get_the_time('F j, Y').'</a><a class="date-right"></a>
                                    Posted by&nbsp;<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                                    
                                    $cat_comma_separated = '';
                                    for($i = 0; $i < $count_cat; $i++)
                                    {
                                        if($i > 0)
                                        {
                                           $out .= ', ';
                                           $cat_comma_separated .= ','; 
                                        }
                                        
                                        $cat = get_category($catlist[$i]);
                                        
                                        $out .= '<a href="'.get_category_link($catlist[$i]).'" >'.$cat->name.'</a>';
                                        $cat_comma_separated .= $cat->slug; 
                                    }                                
                                
                                $out .= '</div>';
                                  
                                $out .= '<h2>'.$post->post_title.'</h2>';
                                echo $out; 
                                    
                                the_content();  
                                GetDCCPInterface()->getIGeneral()->renderWordPressPagination(); 
                                                
                                $out = '';
                                $out .= '<div class="blog-post-bottom-wrapper-single">';
                                $out .= GetDCCPInterface()->getIGeneral()->renderNextPrevPostPanel($post->post_type);                                                            
                                
                                if(GetDCCPInterface()->getIGeneral()->showPostVoting() and $novoting == '')
                                {
                                    global $dcp_votingshortcodes; 
                                    if(isset($dcp_votingshortcodes))
                                    {
                                        $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                    }
                                }                                   
                                
                               // post tags list
                               $posttags = get_the_tags();                              
                               $count = 0;
                               if($posttags !== false)
                               {
                                    $count = count($posttags);
                               }
                                
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
                                       
                                       $out .= '<a href="'.get_tag_link($tag->term_id).'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';
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
     
                            if(GetDCCPInterface()->getIGeneral()->showCIForPosts())
                            {
                                $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons(); 
                            }
                            
                            $out .= '<div class="clear-both"></div></div>';
                               
                            $out .= '</div> <!-- content -->                 
                        </div> <!-- blog-post -->';                
                           echo $out;
                               
                    if(GetDCCPInterface()->getIGeneral()->showPostAuthor()) 
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

                    $related_count = 4;
                    if($nosidebar != '')
                    {
                        $related_count = 6;    
                    }
                                    
                    $content_code = '[dcs_related_posts id="'.$pageid.'" count="'.$related_count.'" limit="'.$related_count.'"]';
                    echo do_shortcode($content_code);  
                
                } else
                {                    
                    the_content();
                }
                
                $tr = '[dcs_next_post]';
                do_shortcode($tr);
                
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