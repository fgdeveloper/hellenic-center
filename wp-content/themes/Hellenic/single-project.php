<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      single-project.php
* Brief:       
*      Theme single project page code
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
    $pt_list = wp_get_object_terms($post->ID, 'project_cat');
    
    $extlink = get_term_link($pt_list[0]->slug, 'project_cat')                                              
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, '', $pt_list[0]->name, $extlink); ?> 
    </div>

    <div id="content">
         
        <?php 
                $imagepath = get_post_meta($post->ID, 'project_image', true);
                $imagedesc = get_post_meta($post->ID, 'project_image_desc', true);                
                $postthumb = get_post_meta($post->ID, 'project_post_thumb', true);
                $customdesc = get_post_meta($post->ID, 'project_custom', true); 
                $projectinfo = get_post_meta($post->ID, 'project_info', true);
                $nosidebar = get_post_meta($post->ID, 'project_nosidebar', true);   
                $novoting = get_post_meta($post->ID, 'project_novoting', true);
        
                

                if($nosidebar != '')
                {
                    echo '<div class="page-width-920">'; 
                } else
                {
                    $dccp->getIGeneral()->includeSidebar($pageid);
                    if($dccp->getIGeneral()->getSidebarOnRight())
                    {
                        echo '<div class="page-width-600-left">';
                    } else
                    {
                       echo '<div class="page-width-600">'; 
                    }
                }
                
                if($customdesc == '')
                {             

                $month = get_the_time('n', $post->ID);
                $year = get_the_time('Y', $post->ID); 

                $out = '';                                                
                $out .= ' 
               
                    <div class="blog-post">';                                   
                                            
                        if($imagepath != '')
                        {
                            if($nosidebar != '')
                            {
                                $out .= '<div class="photo920"><a class="async-img image" rel="'.$imagepath.'" ></a>'.$imagedesc.'</div>'; 
                            } else
                            {
                                $out .= '<div class="photo"><a class="async-img image" rel="'.$postthumb.'" ></a>'.$imagedesc.'</div>'; 
                            }
                        }                      
                             
                        $out .= '<div class="post-content">';                         
                            
                            if(comments_open($post->ID))
                            {
                                $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.get_comments_number($post->ID).'</a>';
                            }
                            $out .= '<div class="info">
                                <span class="date-left"></span><span class="date">'.get_the_time('F j, Y').'</span><span class="date-right"></span> in ';
                                
                                

                                $pt_count = count($pt_list);
                                $cat_comma_separated = '';
                                for($i = 0; $i < $pt_count; $i++)
                                {
                                    if($i > 0)
                                    {
                                       $out .= ', ';
                                       $cat_comma_separated .= ',';
                                    }
                                    $out .= '<a href="'.get_term_link($pt_list[$i]->slug, 'project_cat').'">'.$pt_list[$i]->name.'</a>';
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
                            
                            if(GetDCCPInterface()->getIGeneral()->showProjectVoting() and $novoting == '')
                            {                            
                                global $dcp_votingshortcodes; 
                                if(isset($dcp_votingshortcodes))
                                {
                                    $out .= $dcp_votingshortcodes->votePostStarsCreate($post->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum(), 'left', $post->post_type); 
                                }
                            }                             
                            
                               $out .= '<div class="blog-post-tags-single">';
                               $out .= do_shortcode($projectinfo);                      
                               $out .= '</div>';  
                               
                               if(GetDCCPInterface()->getIGeneral()->showCIForProjects())
                               {                                            
                                    $out .= GetDCCPInterface()->getIGeneral()->getPostCommunityIcons(); 
                               }
                        
                               $out .= '<div class="clear-both"></div>';
                            $out .= '</div>';
                           
                        $out .= '</div> <!-- content -->                 
                    </div> <!-- blog-post -->';                
                       echo $out;
                    
                      
                       
                    if(GetDCCPInterface()->getIGeneral()->showProjectAuthor()) 
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
                                 
                                $out .=  '<div class="clear-both"></div>
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
                                    
                    $content_code = '[dcs_related_projects id="'.$pageid.'" count="'.$related_count.'" limit="'.$related_count.'"]';
                    echo do_shortcode($content_code);   
                       
                } else
                {
                     the_content();   
                }
                
              
                
                if(comments_open($post->ID))
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
