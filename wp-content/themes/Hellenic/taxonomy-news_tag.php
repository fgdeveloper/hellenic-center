<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      taxonomy-news_tag.php
* Brief:       
*      Theme single news tag page code
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
    global $more;    // Declare global $more (before the loop).
    global $wp_query;
                                                      
    $pageid = $post->ID;
            
    $news_tag_slug = (get_query_var('news_tag')) ? get_query_var('news_tag') : '';
    $news_tag_info = get_term_by('slug', $news_tag_slug, 'news_tag', OBJECT); 
    
    $dccp = GetDCCPInterface();                                     
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0, 'Archive for news '.$news_tag_info->name); ?> 
    </div>

    <div id="content">
        <?php
                $dccp->getIGeneral()->includeSidebar($pageid);
                if($dccp->getIGeneral()->getSidebarOnRight())
                {                                                         
                    echo '<div class="page-width-600-left">';
                } else
                {
                   echo '<div class="page-width-600">'; 
                }
                      
                echo '<h1>'.$news_tag_info->name.'</h1>';
                if($news_tag_info->description != '')
                {                        
                    echo '<div sytle="margin-bottom:20px;">'.do_shortcode($news_tag_info->description).'</div>';
                }
       
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
                $args = Array('paged'=>$paged, 'post_type' => 'news', 'taxonomy' => 'news_tag', 'term' => $news_tag_info->slug);
                $qr = new WP_Query($args);
                $max_page = $qr->max_num_pages;
                      
                if($qr->have_posts())
                {
                    echo '<div class="news-page">';
                    
                    while($qr->have_posts())
                    {
                        $qr->the_post(); 
                        
                        $permalink = get_permalink($post->ID);
                        $imagepath = get_post_meta($post->ID, 'news_image', true); 
                        $thumbpath = get_post_meta($post->ID, 'news_thumb_image', true);
                        $minithumbpath = get_post_meta($post->ID, 'news_mini_thumb_image', true); 
                        $imagedesc = get_post_meta($post->ID, 'news_image_desc', true);
                        $postdesc = get_post_meta($post->ID, 'news_desc', true);
                        $novoting = get_post_meta($post->ID, 'news_novoting', true);                        
                        
                        $month = get_the_time('n', $post->ID);
                        $year = get_the_time('Y', $post->ID);                        
                        
                        
                        
                        $out = '';
                        $out .= '<div class="dcs-thin-spliter"></div>';
                        $out .= '<div class="item">';
                        
                            $out .= '<div class="leftcontent">';
                                $out .= '<div class="image framed">';
                                    $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$imagepath.'&w=180&h=100&zc=1'.'" '; 
                                    $out .= '<a href="'.$permalink.'" '.$rel.' class="image-loader async-img-s"></a>';
                                    $out .= '<a href="'.$imagepath.'" rel="lightbox[news_image]" class="zoom" title="'.$imagedesc.'"></a>';
                                $out .= '</div>';
                                
                                $pt_list = get_the_terms($post->ID, 'news_cat');
                                //var_dump($pt_list);
                                if($pt_list !== false)
                                {                                
                                    $pt_counter = 0;
                                    $out .= 'Posted in: ';
                                    foreach($pt_list as $pt)
                                    {
                                        if($pt_counter > 0)
                                        {
                                            $out .= ', ';
                                        }
                                       $out .= '<a href="'.get_term_link($pt->slug, 'news_cat').'" class="category">'.$pt->name.'</a>';
                                       $pt_counter++;
                                    }
                                    $out .= '<div class="clear-both"></div>';
                                }
                                
                                if($post->comment_status == 'open')
                                {
                                    $temp = '';
                                    if($post->comment_count == 0) { $temp = 'No comments'; }
                                    if($post->comment_count == 1) { $temp = 'One comment'; }
                                    if($post->comment_count > 1) { $temp = $post->comment_count.' comments'; }
                                    
                                    $out .= 'Comments: '.'<a href="'.get_comments_link($post->ID).'">'.$temp.'</a>';
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                $newstags = wp_get_object_terms($post->ID, 'news_tag');
                                if(0 < count($newstags))
                                {
                                    $out .= 'Tags: ';
                                    $pt_counter = 0; 
                                    foreach($newstags as $tag)
                                    {
                                        if($pt_counter > 0)
                                        {
                                            $out .= ', ';
                                        }             
                                       $title = '';
                                       if($tag->count == 1) { $title = 'One post'; } else { $title = $tag->count.' posts'; }                                         
                                        
                                        $out .= '<a href="'.get_term_link($tag->slug, 'news_tag').'" class="tag link-tip-bottom" title="'.$title.'">'.$tag->name.'</a>';                          
                                        $pt_counter++;
                                    }
                                } 
                                $out .= '<div class="clear-both"></div>'; 
                                
                                if(GetDCCPInterface()->getIGeneral()->showNewsVoting() and $novoting == '')
                                {
                                    global $dcp_votingshortcodes; 
                                    if(isset($dcp_votingshortcodes))
                                    {
                                        $data = $dcp_votingshortcodes->getVotePostStars($news->ID, GetDCCPInterface()->getIGeneral()->showVotingGlypsNum());
                                        $rate = 0;
                                        if($data->votes != 0)
                                        {
                                            $rate = round($data->sum/$data->votes, 1);
                                        }
                                        $votes_word = 'votes'; 
                                        if($data->votes == 1) { $votes_word = 'vote'; }                                         
                                        $out .= 'Rating: '.'<span class="rate">'.$rate.'</span><span class="ratesep">/</span><span class="maxrate">'.$data->max_stars.'</span> <span class="votes">('.$data->votes.' '.$votes_word.')</span>';
                                    }
                                }                                                                   
                                
                            $out .= '</div>';
                            

                            
                            $out .= '<div class="content">';
                                $out .= '<div class="infobar">';
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';
                                    
                        $out .= '<span class="when">'.dcf_calculatePastTime('', get_the_time('H', $post->ID), get_the_time('i', $post->ID), 
                            get_the_time('s', $post->ID), get_the_time('n', $post->ID), get_the_time('j', $post->ID), get_the_time('Y', $post->ID)).'</span>';                                     
                                    
                                $out .= '</div>';
                                $out .= '<h3><a target="_self" href="'.$permalink.'">'.$post->post_title.'</a></h3>';
                                // content start
                                global $page;
                                $old_page = $page;
                                $page = 1;    
                                if($postdesc != '')
                                {
                                    $out .= apply_filters('the_content', $postdesc);
                                    $out .= ' <a href="'.$permalink.'">Read&nbsp;more</a>';                                    
                                } else
                                {
                                    global $more;
                                    $more = 0;
                                    $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                }
                                $page = $old_page;
                                // content end          
                            $out .= '</div>';                            
                            $out .= '<div class="clear-both"></div>';
                        $out .= '</div>'; 
                        echo $out;
                              
                    } // while
                    
                    echo '</div>'; // news-page 
                } 
                                                  
                GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);          
                                       
            ?>
                                   
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



