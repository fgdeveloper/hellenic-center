<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)      
* 
* File name:   
*      cms_functions.php
* Brief:       
*      Theme CMS functions file
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/


/*****************************************************************
    NAME: dcf_naviTree  
    
    PARAMETERS:
        $id - post or page id
        $level - should be set to zero
        $title - if page dont have title you can set it here
        $extraname - name of extra link inserted before selected page
        $extralink - url for extra link
        
    RETURN VALUE:
        none
         
*****************************************************************/ 
function dcf_naviTree($id, $level, $title='', $extraname='', $extralink='')
{
    $p = null;
    $parent = 0;
    if($id !== null)
    {    
        $p = get_page($id);
        $parent = $p->post_parent;
    }
    
    if($parent != 0)
    {
        dcf_naviTree($parent, $level+1);    
    } else
    {
        echo '<a class="link" href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
    }  
    
    if($level == 0)
    {
        if($extraname != '')
        {
            echo '&nbsp;\&nbsp;<a href="'.$extralink.'" class="link">'.$extraname.'</a>';    
        }        
        
        if($title == '')
        {
            echo '&nbsp;\&nbsp;<a class="selected">'.$p->post_title.'</a>';
        } else
        {        
            echo '&nbsp;\&nbsp;<a class="selected">'.$title.'</a>';
        }
    } else
    {
        echo '&nbsp;\&nbsp;<a href="'.get_permalink($p->ID).'" class="link">'.$p->post_title.'</a>';
    }     
}     
  
/*****************************************************************
    NAME: dcf_neatTrim
    
    PARAMETERS:
        $str - string to trim
        $n - max number of displayed chars
        $delim - small string added on the end of generated string
        $cuted - true if string was cuted  
        
    RETURN VALUE:
        Cuted string  
*****************************************************************/ 
function dcf_neatTrim($str, $n, $delim='...', & $cuted=null) 
{
    $str = str_replace("\n",'',$str);
    $str = str_replace("\r",'',$str);
    $str = strip_tags($str);
 
   $len = strlen($str); 
   if ($len > $n) { 
       
       if(isset($cuted))
       {
           $cuted = true;
       }
       
       
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);           
        
       return rtrim($matches[1]) . $delim; 
   } 
   else { 
       if(isset($cuted))
       {
           $cuted = false;
       }           
       
       return $str; 
   } 
}

/*****************************************************************
    NAME: dcf_neatTrim
    
    PARAMETERS:
        $str - string to trim
        $n - max number of displayed chars
        $delim - small string added on the end of generated string
        $cuted - true if string was cuted  
        
    RETURN VALUE:
        Cuted string  
*****************************************************************/ 
function dcf_getTwitterTweets($username, $password, $count, &$add) {
    
    if($count < 1) $count = 1;
    
    $format = 'json'; // set format    
    $url = 'http://api.twitter.com/statuses/user_timeline/'.$username.'.'.$format.'?count='.$count;    
    
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Set curl to return the data instead of printing it to the browser
   // curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($ch, CURLOPT_URL, $url);
 
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $result = false;
    if($httpCode == 200) // 503 overloading, 404 not exist, 200 success
    {
        $data = json_decode($data);
        
        $result = Array();
        $count = count($data);
        for($i = 0; $i < $count; $i++)
        {
            $obj = new DCC_TwitterTweet();
            $obj->_text = $data[$i]->text;
            $obj->_date = date('F j, Y, g:i a', strtotime($data[$i]->created_at));
            $obj->_source = $data[$i]->source;
            array_push($result, $obj);
        }                             
        
        $url = "http://twitter.com/users/".$username.".json";    
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Set curl to return the data instead of printing it to the browser.
        // curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_URL, $url);       
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);    
        $data = json_decode($data); 

        $add = $data;
    }
                  
    return $result;
} 


/*****************************************************************
    NAME: dcf_comments_number   
*****************************************************************/
function dcf_calculatePastTime($pre, $hour, $minute, $second, $month, $day, $year)
{
    $old = mktime($hour, $minute, $second, $month, $day, $year);
    $new = mktime();
    $value = $new - $old;
    
    $second = $value;
    if($second < 0) { $second = 0; } 
    $minute = floor($second/60);
    $hour = floor($second/60/60);
    $day = floor($second/60/60/24);
    $month = floor($second/60/60/24/30);
    $year = floor($second/60/60/24/365);
    
    // check years
    if($year > 0)
    {
        if($year == 1) { $value = $pre.'1 year ago'; } else { $value = $pre.$year.' years ago'; }
    } else // check months
    if($month > 0)
    {
        if($month == 1) { $value = $pre.'1 month ago'; } else { $value = $pre.$month.' months ago'; }
    } else // check days
    if($day > 0)
    {
        if($day == 1) { $value = $pre.'1 day ago'; } else { $value = $pre.$day.' days ago'; }
    } else // check hours
    if($hour > 0)
    {
        if($hour == 1) { $value = $pre.'1 hour ago'; } else { $value = $pre.$hour.' hours ago'; }
    } else // check minutes        
    if($minute > 0)
    {
        if($minute == 1) { $value = $pre.'1 minute ago'; } else { $value = $pre.$minute.' minutes ago'; }
    } else // check seconds
    if($second >= 0)
    {
        if($second == 0) { $value = 'Right now'; } else
        if($second == 1) { $value = $pre.'1 second ago'; } else { $value = $pre.$second.' seconds ago'; }
    }                        
    
    return $value;
}

/*****************************************************************
    NAME: dcf_comments_number   
*****************************************************************/
function dcf_comments_number($zero='No comments', $one='One commnet', $more="% comments")
{
    
} 


/*****************************************************************
    NAME: dcf_next_post 
*****************************************************************/
function dcf_next_post($type='post', $tax='', $terms='')
{   
    global $wpdb;
    global $post;
                             
    $current_date = $post->post_date;
    
    $querydate = '';
    $querydate .= " AND $wpdb->posts.post_date > TIMESTAMP('$current_date') ";                   
    
    $subquery = '';        
    if($terms != '')
    {
        $a_terms = explode(',', $terms);
        $count_terms = count($a_terms);                
        if($count_terms > 0)
        {
            for($i = 0; $i < $count_terms; $i++)
            {
                if($i > 0)
                {
                    $subquery .= ' OR ';    
                }
                $subquery .= "$wpdb->terms.slug = '".$a_terms[$i]."' ";
            }
            $subquery = ' AND ('.$subquery.') ';
        }
    }          

    $querytax = '';
    if($tax != '')
    {
        $querytax = " AND $wpdb->term_taxonomy.taxonomy = '$tax' "; 
    }
    
    $querystr = "
        SELECT ID, post_title, post_date
        FROM $wpdb->posts
        LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
        LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
        LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
        WHERE $wpdb->posts.post_type = '$type'".
        $querydate.
        "AND $wpdb->posts.post_status = 'publish' ".
        $querytax.
        $subquery.
        "GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date ASC LIMIT 1";

    $list = $wpdb->get_results($querystr, OBJECT);                
    $count = count($list);    
    
    $value = false;
    if($count > 0) { $value = $list[0]; }
    return $value;
}  

/*****************************************************************
    NAME: dcf_prev_post 
*****************************************************************/
function dcf_prev_post($type='post', $tax='', $terms='')
{   
    global $wpdb;
    global $post;
                             
    
    $current_date = $post->post_date;
    
    $querydate = '';
    $querydate .= " AND $wpdb->posts.post_date < TIMESTAMP('$current_date') ";                   
    
    $subquery = '';        
    if($terms != '')
    {
        $a_terms = explode(',', $terms);
        $count_terms = count($a_terms);                
        if($count_terms > 0)
        {
            for($i = 0; $i < $count_terms; $i++)
            {
                if($i > 0)
                {
                    $subquery .= ' OR ';    
                }
                $subquery .= "$wpdb->terms.slug = '".$a_terms[$i]."' ";
            }
            $subquery = ' AND ('.$subquery.') ';
        }
    }          
    
    $querytax = '';
    if($tax != '')
    {
        $querytax = " AND $wpdb->term_taxonomy.taxonomy = '$tax' "; 
    }
    
    $querystr = "
        SELECT ID, post_title, post_date
        FROM $wpdb->posts
        LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID = $wpdb->term_relationships.object_id)
        LEFT JOIN $wpdb->term_taxonomy ON($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
        LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id = $wpdb->terms.term_id)
        WHERE $wpdb->posts.post_type = '$type'".
        $querydate.
        "AND $wpdb->posts.post_status = 'publish' ".
        $querytax.
        $subquery.
        "GROUP BY $wpdb->posts.ID ORDER BY $wpdb->posts.post_date DESC LIMIT 1";

    $list = $wpdb->get_results($querystr, OBJECT);             
    $count = count($list); 
    
    $value = false;
    if($count > 0) { $value = $list[0]; }
    return $value;       
} 

?>