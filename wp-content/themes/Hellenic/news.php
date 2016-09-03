<?php
/*
Template Name: News
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      news.php
* Brief:       
*      Theme news page template code
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
    global $wp_query;                                          
    $pageid = $post->ID;
    $page_subtitle = get_post_meta($post->ID, 'page_subtitle', true); 
    if($page_subtitle != '')
    {
        $page_subtitle = '<span>'.$page_subtitle.'</span>';
    }      
    
    $dccp = GetDCCPInterface();                                              
?>

    <div class="navigation-tree-container">        
        <?php dcf_naviTree($post->ID, 0); ?> 
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
                echo '<h1>'.$post->post_title.$page_subtitle.'</h1>';
                the_content();

                $MONTH_TO_DISPLAY = GetDCCPInterface()->getIGeneral()->getNewsArchiveMonthsCount();
                $get_news_day = isset($_GET['news_day']) ? $_GET['news_day'] : '';
                $get_news_month = isset($_GET['news_month']) ? $_GET['news_month'] : '';
                $get_news_year = isset($_GET['news_year']) ? $_GET['news_year'] : '';
                
                // prepeare posts query 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // $wp_query->query_vars['page'];                
                $news_categories = get_post_meta($post->ID, 'news_categories', true);
                $news_per_page = get_post_meta($post->ID, 'news_count', true);
                $news_featured = get_post_meta($post->ID, 'news_featured', true);
                $exclude_news = get_post_meta($post->ID, 'page_exclude_news', true);
                $show_news_slider = get_post_meta($post->ID, 'page_show_news_slider', true);
                
                $limit = '';
                if($news_per_page != '')
                {
                    $limit = ' LIMIT '.(($paged-1)*$news_per_page).', '.$news_per_page;                     
                }                
                
                global $wpdb;
                if($news_categories != '')
                {    
                    $news_categories = explode(',', $news_categories);
                } else
                {
                    $news_categories = Array();
                    $news_cat_terms = get_terms('news_cat');
                    foreach($news_cat_terms as $te)
                    {
                        array_push($news_categories, $te->term_id);    
                    }
                }
                $count_categories = count($news_categories);
                $subquery = '';
                for($i = 0; $i < $count_categories; $i++)
                {
                    if($i > 0)
                    {
                        $subquery .= ' OR ';    
                    }
                    $subquery .= "$wpdb->terms.term_id =".$news_categories[$i];
                }                
               
               $querystr = "
                    SELECT MONTH(post_date) AS 'month', YEAR(post_date) AS 'year', ID, COUNT(DISTINCT ID) as 'count' 
                    FROM $wpdb->posts
                    LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                    LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                    LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)                     
                    WHERE post_status = 'publish' 
                    AND post_type = 'news'
                    AND $wpdb->term_taxonomy.taxonomy = 'news_cat' 
                    AND ($subquery)                     
                    GROUP BY MONTH(post_date) DESC LIMIT $MONTH_TO_DISPLAY";
                    
               $news_posts_months = $wpdb->get_results($querystr); 
               // var_dump($news_posts_months);
                      
                $time_now = time();
                $today_day = $month_day_now = date('j', $time_now);
                $today_month = $month_now = date('n', $time_now);  
                $today_year = $year_now = date('Y', $time_now);
                
                
                $nc = '<div id="news-calendar">'; // news calendar code
                for($i = 0; $i < $MONTH_TO_DISPLAY; $i++)
                {
                    $month_index = -1;
                    $news_posts_days = Array();
                    foreach($news_posts_months as $key => $news_month)
                    {
                        if($news_month->month == $month_now and $news_month->year == $year_now)
                        {
                            $month_index = $key;
                           $querystr = "
                                SELECT DAY(post_date) AS 'day', ID, COUNT(DISTINCT ID) as 'count' 
                                FROM $wpdb->posts
                                LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                                LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                                LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)                           
                                WHERE post_status = 'publish' 
                                AND post_type = 'news' 
                                AND MONTH(post_date) = '$news_month->month'
                                AND $wpdb->term_taxonomy.taxonomy = 'news_cat' 
                                AND ($subquery)                          
                                GROUP BY DAY(post_date) ASC"; 
                           $news_posts_days = $wpdb->get_results($querystr);                         
                            break;
                        }
                    }                    
                    
                    //echo $year_now.':'.$month_now.'<br />';
                    $time_now = mktime(0, 0, 0, $month_now, 1, $year_now);
                    $nc .= '<div class="page">';
                        $nc .= '<div class="info">';
                        
                            $inner_form = '';
                            $inner_form .= '<form class="news_archive_form" action="'.get_permalink($pageid).'" method="get">';                                            
                            $inner_form .= '<input name="news_month" type="hidden" value="'.$month_now.'"/>';
                            $inner_form .= '<input name="news_year" type="hidden" value="'.$year_now.'"/>'; 
                            $inner_form .= '</form>';                        
                        
                            $inner_title = ' title="No news" ';
                            if($month_index >= 0)
                            {
                                if($news_posts_months[$month_index]->count > 0)
                                {
                                    $inner_title = ' title="'.$news_posts_months[$month_index]->count.' news" '; 
                                }
                            }
                            
                            $nc .= '<h6 class="month">'.$inner_form.'<a class="link-tip-top" '.$inner_title.'>'.date('F', $time_now).' '.$year_now.'</a></h6>';
                            if($i == ($MONTH_TO_DISPLAY - 1)) { $nc .= '<span class="prevoff">prev</span>'; } else { $nc .= '<span class="prev">prev</span>'; }
                            if($i == 0) { $nc .= '<span class="nextoff">next</span>'; } else { $nc .= '<span class="next">next</span>'; }
                            
                            $nc .= '<table class="days">';
                                $nc .= '<thead><tr>';
                                $nc .= '<td class="name">Mon</td>';
                                $nc .= '<td class="name">Tue</td>';
                                $nc .= '<td class="name">Wed</td>'; 
                                $nc .= '<td class="name">Thu</td>';
                                $nc .= '<td class="name">Fri</td>';
                                $nc .= '<td class="name">Sat</td>';
                                $nc .= '<td class="name">Sun</td>'; 
                                $nc .= '</tr></thead>';                             
                            
                            $days_in_month = date('t', $time_now);
                            $week_day_now = date('w', $time_now);                            
                            if($week_day_now == 0) // zero if sunday
                            {
                                $week_day_now = 6;
                            } else
                            {
                                $week_day_now--;
                            }                            
                            
                            $nc .= '<tbody>';
                            $cell_counter = 1 - $week_day_now; 
                            for($j = 0; $j < 6; $j++)
                            {
                                $nc .= '<tr>'; 
                                for($k = 0; $k < 7; $k++)
                                {
                                    if($cell_counter >= 1 and $cell_counter <= $days_in_month)
                                    {
                                        $inner_td = '';
                                        if($month_index >= 0)
                                        {
                                            // find day
                                            $day_index = -1;
                                            foreach($news_posts_days as $key => $news_day)
                                            {
                                                if($news_day->day == $cell_counter)
                                                {
                                                   $day_index = $key;
                                                   break; 
                                                }
                                            }
                                            if($day_index >= 0)
                                            {
                                                $inner_td = '';
                                                $inner_td .= '<form class="news_archive_form" action="'.get_permalink($pageid).'" method="get">';
                                                $inner_td .= '<input name="news_day" type="hidden" value="'.$news_posts_days[$day_index]->day.'"/>';                                                
                                                $inner_td .= '<input name="news_month" type="hidden" value="'.$month_now.'"/>';
                                                $inner_td .= '<input name="news_year" type="hidden" value="'.$year_now.'"/>'; 
                                                $inner_td .= '</form>';
                                                $inner_td .= '<a class="link-tip-top" title="'.$news_posts_days[$day_index]->count.' news">'.$cell_counter.'</a>';
                                            } else
                                            {
                                                $inner_td = $cell_counter;
                                            }
                                        } else
                                        {
                                            $inner_td = $cell_counter;
                                        }
                                        if($cell_counter == $today_day and $month_now == $today_month and $year_now == $today_year)
                                        {
                                            $nc .= '<td class="today">'.$inner_td.'</td>';
                                        } else
                                        {
                                            $nc .= '<td class="day">'.$inner_td.'</td>';
                                        }
                                    } else
                                    {
                                        $nc .= '<td class="dayoff">-</td>';
                                    }
                                    $cell_counter++;    
                                }
                                $nc .= '</tr>'; 
                            }
                            $nc .= '</tbody>'; 
                            
                            $nc .= '</table>'; 
                        $nc .= '</div>';                    
                    $nc .= '</div>';
                    
                    $month_now--;
                    if($month_now == 0)
                    {
                        $month_now = 12;
                        $year_now--;
                    }           
                }
                $nc .= '</div>';                 
              
                if($news_featured != '')
                {
                    $fet_news = explode(',', $news_featured);
                    
                    if($show_news_slider == '')
                    {
                        $out = '';
                        $out .= '<div class="featured-news">';
                            $out .= '<h5 class="head">Featured News</h5>';

                            $fet_id = (int)$fet_news[0];
                            $args = Array('p' => $fet_id, 'post_type' => 'news'); 
                            $qr = new WP_Query($args);
                            if($qr->have_posts())
                            {
                                while($qr->have_posts())
                                {
                                    $qr->the_post();
                                    $imagepath = get_post_meta($post->ID, 'news_image', true);
                                    $imagedesc = get_post_meta($post->ID, 'news_image_desc', true);
                                    $postdesc = get_post_meta($post->ID, 'news_desc', true);                                 
                                    $videopath = get_post_meta($post->ID, 'news_video', true);
                                    $disablevideo = get_post_meta($post->ID, 'news_disable_video', true);                                 
                                    
                                    if($videopath != '' and $disablevideo == '')
                                    {
                                        $out .= '<div class="photo">'.$videopath.'</div>';
                                    } else
                                    if($imagepath != '')
                                    {
                                        $out .= '<div class="photo"><a class="async-img image" href="'.get_permalink($post->ID).'" rel="'.$imagepath.'" ></a>'.$imagedesc.'</div>'; 
                                    }    
                                        
                                        $out .= '<div class="content">';
                                        
                                        if($post->comment_status == 'open') 
                                        {                                       
                                            $out .= '<a href="'.get_comments_link($post->ID).'" class="comments">'.$post->comment_count.'</a>'; 
                                        }
                                                                   
                                        $out .= '<div class="infobar">';
                                        $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $post->ID).'</span><span class="date-right"></span>';                                                                       
                                      
                                        $pt_list = get_the_terms($post->ID, 'news_cat');
                                        $pt_counter = 0;
                                        $out .= 'Posted by '.'<a href="'.get_author_posts_url($post->post_author).'" class="author">'.get_the_author_meta('display_name', $post->post_author).'</a> in ';
                                        foreach($pt_list as $pt)
                                        {
                                            if($pt_counter > 0)
                                            {
                                                $out .= ', ';
                                            }
                                           $out .= '<a href="'.get_term_link($pt->slug, 'news_cat').'" class="category">'.$pt->name.'</a>';
                                           $pt_counter++;
                                        }                                    
                                        
                                        $out .= '</div>'; // info bar
                                                                       
                                    
                                    $out .= '<h2><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h2>';
                                    
                                    global $page;
                                    global $more;
                                    $more = 0;
                                    $old_page = $page;
                                    $page = 1;    
                                    if($postdesc != '')
                                    {
                                        $out .= apply_filters('the_content', $postdesc);
                                        $out .= ' <a href="'.get_permalink($post->ID).'">Read&nbsp;more</a>';                                    
                                    } else
                                    {   
                                        $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                    }
                                    $page = $old_page;                              
                                    
                                    $out .= '</div>'; // content
                                }                         
                            }
                            wp_reset_query();
                            
                        $out .= '</div>';
                        echo $out; 
                    } else  // new slider
                    {
                        $out = '';
                        $out .= '<h5 class="news-slider-head">Featured News</h5>';
                        $out .= '<div class="news-slider">';                            
                            $out .= '<div class="slides-wrapper">';
                                $args = Array('post__in' => $fet_news, 'post_type' => 'news', 'posts_per_page' => 18); 
                                $qr = new WP_Query($args);
                                $counter = 0;
                                if($qr->have_posts())
                                {
                                    while($qr->have_posts())
                                    {
                                        $qr->the_post();
                                        
                                        $permalink = get_permalink($post->ID);
                                        $imagepath = get_post_meta($post->ID, 'news_image', true);
                                        $out .= '<div class="slide">';
                                        $out .= '<a href="'.$permalink.'" class="loader async-img" rel="'.$imagepath.'"></a>';
                                        $out .= '<h2><a href="'.$permalink.'">'.$post->post_title.'</a></h2>';
                                        $out .= '</div>';
                                        $counter++;
                                    }
                                }                        
                                wp_reset_query();
                            $out .= '</div>'; // slides wrapper 
                                
                            $out .= '<ul>';
                            for($i = 0; $i < $counter; $i++)
                            {
                                $out .= '<li>'.($i+1).'</li>';    
                            }
                            $out .= '</ul>';
                            $out .= '<div class="clear-both"></div>';
                               
                        $out .= '</div>';
                        echo $out;    
                    }
                }
              
                $archive_for_text = '';
                if(isset($_GET['news_month']))
                {
                    $archive_for_text .= '<a href="'.get_permalink($pageid).'" class="news-archive-reset">Reset search</a><div class="clear-both"></div>'; 
                    $archive_for_text .= '<h5 class="news-archive-for">Archive for '.date('F', mktime(0, 0, 0, (int)$_GET['news_month'], 1, 2010));
                    if(isset($_GET['news_day']))
                    {
                        $archive_for_text .= ' '.$get_news_day;
                    }
                    $archive_for_text .= ', '.$get_news_year.'</h5>';
                                                                                                          
                } else
                {
                     $archive_for_text .= '<h5 class="news-archive-for">Recent news</h5>'; 
                }
                
                $out = '<div class="news-archive-bar">'.$archive_for_text;
                $search_form = '[dcs_abs_flat_tabs tab1="Search in Archive" def="0" align="right" width="300" float="right"]
                [dcs_abs_flat_tab padding="20px 10px 10px 10px" bg="#000000" width="240" framed="true" height="190" opacity="98" border="true"]'.$nc.                
                '[/dcs_abs_flat_tab]
                [/dcs_abs_flat_tabs]';
                                                
                $out .= do_shortcode($search_form);
                $out .= '<div class="clear-both"></div></div>';
                echo $out;
                                
                $querydate = '';
                if($news_featured != '' and $exclude_news != '')
                {
                    $querydate .= "AND $wpdb->posts.ID NOT IN (".$news_featured.') ';    
                }
                $querydate .= $get_news_day != '' ? " AND DAY($wpdb->posts.post_date) = ".$get_news_day.' ' : ''; 
                $querydate .= $get_news_month != '' ? " AND MONTH($wpdb->posts.post_date) = ".$get_news_month.' ' : ''; 
                $querydate .= $get_news_year != '' ? " AND YEAR($wpdb->posts.post_date) = ".$get_news_year.' ' : ''; 
                
                $querystr = "
                    SELECT COUNT(DISTINCT ID) AS 'count'
                    FROM $wpdb->posts
                    LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                    LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                    LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
                    WHERE $wpdb->posts.post_type = 'news' ". 
                    $querydate. 
                    "AND $wpdb->posts.post_status = 'publish'
                    AND $wpdb->term_taxonomy.taxonomy = 'news_cat'
                    AND ($subquery)";

                $news_list = $wpdb->get_results($querystr, OBJECT);                 
                $news_count = $news_list[0]->count;                            
                
                $querystr = "
                    SELECT *
                    FROM $wpdb->posts
                    LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
                    LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
                    LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
                    WHERE $wpdb->posts.post_type = 'news'".
                    $querydate.
                    "AND $wpdb->posts.post_status = 'publish'
                    AND $wpdb->term_taxonomy.taxonomy = 'news_cat'
                    AND ($subquery)
                    GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC".$limit;

                $news_list = $wpdb->get_results($querystr, OBJECT);       

                $c_news_list = count($news_list);
                if($c_news_list > 0)
                {
                    echo '<div class="news-page">';
                     
                    foreach($news_list as $news)
                    {   

                        setup_postdata($news);                        
                        
                        $permalink = get_permalink($news->ID);
                        $imagepath = get_post_meta($news->ID, 'news_image', true); 
                        $thumbpath = get_post_meta($news->ID, 'news_thumb_image', true);
                        $minithumbpath = get_post_meta($news->ID, 'news_mini_thumb_image', true); 
                        $imagedesc = get_post_meta($news->ID, 'news_image_desc', true);
                        $postdesc = get_post_meta($news->ID, 'news_desc', true);                        
                        $novoting = get_post_meta($news->ID, 'news_novoting', true); 
                        
                        
                        
                        $month = get_the_time('n', $news->ID);
                        $year = get_the_time('Y', $news->ID);                        
                        
                        
                        
                        $out = '';
                        $out .= '<div class="dcs-thin-spliter"></div>';
                        $out .= '<div class="item">';
                        
                            $out .= '<div class="leftcontent">';
                                $out .= '<div class="image framed">';
                                    $rel = ' rel="'.get_bloginfo('template_url').'/thumb.php?src='.$imagepath.'&w=180&h=100&zc=1'.'" '; 
                                    $out .= '<a href="'.$permalink.'" '.$rel.' class="image-loader async-img-s"></a>';
                                    $out .= '<a href="'.$imagepath.'" rel="lightbox[news_image]" class="zoom" title="'.$imagedesc.'"></a>';
                                $out .= '</div>';
                                
                                $pt_list = get_the_terms($news->ID, 'news_cat');
                                //var_dump($pt_list);
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
                                
                                if($news->comment_status == 'open')
                                {
                                    $temp = '';
                                    if($news->comment_count == 0) { $temp = 'No comments'; }
                                    if($news->comment_count == 1) { $temp = 'One comment'; }
                                    if($news->comment_count > 1) { $temp = $news->comment_count.' comments'; }
                                    
                                    $out .= 'Comments: '.'<a href="'.get_comments_link($news->ID).'">'.$temp.'</a>';
                                }
                                $out .= '<div class="clear-both"></div>'; 
                                $newstags = wp_get_object_terms($news->ID, 'news_tag');
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
                                    $out .= '<span class="date-left"></span><span class="date">'.get_the_time('F j, Y', $news->ID).'</span><span class="date-right"></span>';
                                    
                        $out .= '<span class="when">'.dcf_calculatePastTime('', get_the_time('H', $news->ID), get_the_time('i', $news->ID), 
                            get_the_time('s', $news->ID), get_the_time('n', $news->ID), get_the_time('j', $news->ID), get_the_time('Y', $news->ID)).'</span>';                                     
                                    
                                $out .= '</div>';
                                $out .= '<h3><a target="_self" href="'.$permalink.'">'.$news->post_title.'</a></h3>';
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
                                    $oldpost = $post;
                                    $post = $news; 
                                    $out .= apply_filters('the_content', get_the_content('Read&nbsp;more'));
                                    $post = $oldpost;
                                }
                                $page = $old_page;
                                // content end          
                            $out .= '</div>';                            
                            $out .= '<div class="clear-both"></div>';
                        $out .= '</div>'; 
                        echo $out;
                        
                        
                    }
                    echo '</div>'; // news-page
                } else // if 
                {
                    echo '<span style="color:#888888;font-size:11px;">Sorry, no archives matched your criteria.</span>';    
                } 

                if($news_per_page != '')
                {
                    $max_page = ceil($news_count / $news_per_page);
                    GetDCCPInterface()->getIGeneral()->renderSitePagination($paged, $max_page);                
                }
           ?>
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



