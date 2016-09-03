<?php
/**********************************************************************
* DIGITAL CAVALRY WP VOTING SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      shortcodes.php
* Brief:       
*      Plugin wp shortcodes implementation
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    
   
class dcpVotingShortCodes 
{
    /*********************************************************** 
    * Constructor
    ************************************************************/       
    public function __construct()
    {                                                              
        add_shortcode('dcp_votestars', array(&$this, 'dcp_votestars'));
        $this->_options = get_option(DC_VOTING_SYSTEM_OPT);
    }
    
    /*********************************************************** 
    * Public memebers
    ************************************************************/   
    
    public $_options = Array();
    private $_comment_post_id = -1;
    private $_comment_post_meta_checked = false;
    
    /*********************************************************** 
    * Public functions
    ************************************************************/           
    public function dcp_votestars($atts, $content=null, $code="")
    {
        
        global $post;
        $out = '';         
        
        $defatts = Array(
          'postid' => -1,
          'stars' => 5,
          'align' => 'left',
        );
        
        $atts = shortcode_atts($defatts, $atts);        
        
        $stars_num = $atts['stars'];
        if($stars_num < 2) { $stars_num = 2; }
        if($stars_num > 10) { $stars_num = 10; }
                                    
        $align = $atts['align'];                             
        if($align != 'left' and $align != 'right')
        {
           $align = 'right'; 
        }
        
        $postid = $atts['postid'];
        
        if($postid == -1)
        {
            isset($post);
            {
                $postid = $post->ID;
            }
        }
        
        if($postid != -1)
        {
            $out = $this->votePostStarsCreate($postid, $stars_num, $align);                                   
        } else
        {
            $out = '{dcp_votestars shortcode error: No post ID}';
        }

        
        return $out;    
    } 
                      
    public function votePostStarsCreate($postid, $stars_num, $align, $post_type)
    {
        global $wpdb;
        
        $dbobj = null; 
        $out = '';         

        // try to get voting data for this post
        $data = null;
        $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
          
        // if record not exist       
        if(!$data)
        {
            // create new voting record for this post
            $wpdb->query( $wpdb->prepare("INSERT INTO $wpdb->dcp_voting_post (post_id, vote_type, max_stars, post_type) VALUES (%d, %d, %d, %s)", $postid, DCP_VOTING_STARS, $stars_num, $post_type));
            // get created record
            $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
            $dbobj = $data[0]; 
        } else
        { 
            // if record exist we must check thet it have the same type as we can handle with this short code
            // if not, we delete it and create new, adjusted for 5 stars voting system
            if($data[0]->vote_type != DCP_VOTING_STARS or ($data[0]->vote_type == DCP_VOTING_STARS and $data[0]->max_stars != $stars_num))
            {
               $wpdb->query($wpdb->prepare("DELETE FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
               $wpdb->query($wpdb->prepare("INSERT INTO $wpdb->dcp_voting_post (post_id, vote_type, max_stars, post_type) VALUES (%d, %d, %d, %s)", $postid, DCP_VOTING_STARS, $stars_num, $post_type));
               $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid)); 
            }
            $dbobj = $data[0]; 
        }
        
        
        $show_stats = $this->_options['show_post_voting_stats'];
        $cookiename = 'dcp_votepost_'.$postid; 
        $cookieexpire = $this->_options['post_exp_seconds'] + $this->_options['post_exp_minutes']*60 + $this->_options['post_exp_hours']*60*60 + $this->_options['post_exp_days']*24*60*60; // in seconds                                
        $mouseover = ' onmouseover="dcp_starMouseOver(this);" ';
        
        $rating = 0;
        if($dbobj->votes != 0)
        {               
            $rating = $dbobj->sum / $dbobj->votes;
        }
        $ratestring = sprintf('%.1f', round($rating, 1));
        
        $mouseout = ' onmouseout="dcp_starMouseOut(this, '.$rating.', '.$stars_num.');" ';       

        $out = '';
        $out .= '<div style="text-align:'.$align.';" class="dcp-vote-stars">';
               
        for($i = 0; $i < $stars_num; $i++)
        {
            $onclick = ' onclick="dcp_votePostStars(this, \''.$cookiename.'\', '.$postid.', '.($i+1).', '.$cookieexpire.');" ';
            $actions = $mouseover.' '.$mouseout.' '.$onclick;
            $title = '';
            $class = ' class="star"  ';
            if(isset($_COOKIE[$cookiename])) 
            {
                $actions = '';
                $title = ' title="'.$dbobj->votes.' votes, avarge '.$ratestring.' out of '.$stars_num.'" ';     
            } else
            {
               $title = ' title="Rate this '.($i+1).' star out of '.$stars_num.'" ';
            }
            $actions = $class.$title.$actions; 
            
                          
            
            if($rating >= ($i+1))
            {
               $out .= '<img '.$actions.' src="'.$this->_options['star'].'" alt="" />';  
            } else
            if($rating >= $i+0.75)
            {
               $out .= '<img '.$actions.' src="'.$this->_options['star3'].'" alt="" />';  
            } else 
            if($rating >= $i+0.5)
            {
               $out .= '<img '.$actions.' src="'.$this->_options['star2'].'" alt="" />';  
            } else
            if($rating >= $i+0.25)
            {
               $out .= '<img '.$actions.' src="'.$this->_options['star1'].'" alt="" />';  
            } else                     
            {
               $out .= '<img '.$actions.' src="'.$this->_options['starb'].'" alt="" />'; 
            }
        }             
     
        
        $out .= '<span class="rating">'.$ratestring.'</span><span class="max-rate">/'.$stars_num.'</span><span class="votes-num">'.$dbobj->votes.'</span>';
        if($show_stats)
        {
           $out .= '<a class="votes-text">'.($dbobj->votes == 1 ? 'vote' : 'votes').'</a>';  
        } else
        {
           $out .= '<span class="votes-text">'.($dbobj->votes == 1 ? 'vote' : 'votes').'</span>';  
        }
        
        
        if($show_stats)
        {      
            $out .= '<div class="dcp-vote-stat">';
            $out .= '<span class="head">Voting statistics:</span><img class="close" src="'.DCP_VOTING_URL.'img/close.png'.'" alt="" />';
            $out .= '<table>';
            $out .= '<thead><tr><th>Rate</th><th>Percentage</th><th>Votes</th></tr></thead>';
            
            $stats = Array(
                0 => $dbobj->votes1,
                1 => $dbobj->votes2,
                2 => $dbobj->votes3,
                3 => $dbobj->votes4,
                4 => $dbobj->votes5,
                5 => $dbobj->votes6,
                6 => $dbobj->votes7,
                7 => $dbobj->votes8,
                8 => $dbobj->votes9,
                9 => $dbobj->votes10                                                
            );
            
            $proc = Array();
            
            if($dbobj->votes != 0)
            {
            
                $maxproc = round($stats[0]/$dbobj->votes, 2)*100; 
                for($i = 0; $i < 10; $i++)
                {
                   $proc[$i] = round($stats[$i]/$dbobj->votes, 2)*100; 
                   if($proc[$i] > $maxproc)
                   {
                      $maxproc = $proc[$i]; 
                   }
                }
            } else
            {
                $maxproc = 1;
            }
            
            
            
            $out .= '<tbody>';
            for($i = ($stars_num-1); $i >= 0; $i--)
            {
                $out .= '<tr><td>'.($i+1).'</td>';                 
                 $out .= '<td class="proc"><img src="'.DCP_VOTING_URL.'img/bar.jpg'.'" style="width:'.(round(100*$proc[$i]/$maxproc)).'px;" alt="" />'.round($proc[$i]).'%</td>';
                $out .= '<td>'.$stats[$i].'</td></tr>';  
            }
            $out .= '</tbody>';
            
            $out .= '</table>';
            $out .= '</div>';       
        }      
              
        $out .= '</div>';          
        
        return $out;
    }
    
    public function getVotePostStars($postid, $stars_num)
    {
        global $wpdb;
        
        $dbobj = null; 
        $out = '';         

        // try to get voting data for this post
        $data = null;
        $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
          
        // if record not exist       
        if(!$data)
        {
            // create new voting record for this post
            $wpdb->query( $wpdb->prepare("INSERT INTO $wpdb->dcp_voting_post (post_id, vote_type, max_stars) VALUES (%d, %d, %d)", $postid, DCP_VOTING_STARS, $stars_num));
            // get created record
            $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
            $dbobj = $data[0]; 
        } else
        { 
            // if record exist we must check thet it have the same type as we can handle with this short code
            // if not, we delete it and create new, adjusted for 5 stars voting system
            if($data[0]->vote_type != DCP_VOTING_STARS or ($data[0]->vote_type == DCP_VOTING_STARS and $data[0]->max_stars != $stars_num))
            {
               $wpdb->query($wpdb->prepare("DELETE FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid));
               $wpdb->query($wpdb->prepare("INSERT INTO $wpdb->dcp_voting_post (post_id, vote_type, max_stars) VALUES (%d, %d, %d)", $postid, DCP_VOTING_STARS, $stars_num));
               $data = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->dcp_voting_post WHERE post_id = %d", $postid)); 
            }
            $dbobj = $data[0]; 
        }
        
        return $dbobj;        
    }
    
    public function voteCommentCreate($commentid, $align)
    {
        global $wpdb;
        global $comment;
        global $post;
        
        $dbobj = null; 
        $out = '';        
        
        $cookiename = 'dcp_votecomment_'.$commentid; 
        $cookieexpire = $this->_options['comment_exp_seconds'] + $this->_options['comment_exp_minutes']*60 + $this->_options['comment_exp_hours']*60*60 + $this->_options['comment_exp_days']*24*60*60; // in seconds         
        $check_IP = $this->_options['check_comment_author_ip'];
                     
        // comment meta
        $dummydata = (object) Array('up' => 0, 'down' => 0, 'sum' => 0);        
        $commentmeta = get_comment_meta($commentid, 'dcp_votecomment', true);
        if($commentmeta == '')
        {
            update_comment_meta($commentid, 'dcp_votecomment', $dummydata);
            $commentmeta = $dummydata;     
        }
        
        // post meta
        $dummypostdata = (object) Array('cid' => -1, 'sum' => 0);
        // avoid multiple db call for get post meta data
        if($this->_comment_post_id != $post->ID or !$this->_comment_post_meta_checked)
        {
            $postmeta = get_post_meta($post->ID, 'dcp_votecomment_top', true);
            if($postmeta == '')
            {
                update_post_meta($post->ID, 'dcp_votecomment_top', $dummypostdata);
                $postmeta = $dummypostdata;    
            }
            $this->_comment_post_id = $post->ID;
            $this->_comment_post_meta_checked = true;
        }        
        
        // is voting locked vor this visitor
        $locked = false;
        if(($comment->comment_author_IP == $_SERVER['REMOTE_ADDR'] and $check_IP) or isset($_COOKIE[$cookiename]))
        {
            $locked = true;
        }
        
        $stats = '';
                                                                    
        $out .= '<div id="'.$cookiename.'" class="dcp-vote-comment">';
        if($locked)
        {
            $out .= '<img class="img-locked unitPng" src="'.DCP_VOTING_URL.'img/locked.png'.'" title="You can\'t vote this comment" /> ';    
        } else
        {
            $onclick_up =  ' onclick="dcp_voteCommentUpDown(this, \''.$cookiename.'\', '.$commentid.', 1, '.$cookieexpire.', '.$post->ID.')" ';
            $onclick_down =  ' onclick="dcp_voteCommentUpDown(this, \''.$cookiename.'\', '.$commentid.', -1, '.$cookieexpire.', '.$post->ID.')" ';
            $out .= '<img class="img-locked unitPng" src="'.DCP_VOTING_URL.'img/locked.png'.'" title="You can\'t vote this comment" style="display:none;" /> ';
            $out .= '<img '.$onclick_up.' class="img-up unitPng" src="'.DCP_VOTING_URL.'img/up.png'.'" title="I like this comment" /> ';
            $out .= '<img '.$onclick_down.' class="img-down unitPng" src="'.DCP_VOTING_URL.'img/down.png'.'" title="I don\'t like this comment" /> ';              
        }
        
        $out .= '<span class="up">+'.$commentmeta->up.'</span>/<span class="down">-'.$commentmeta->down.'</span>';
        $out .= '<span class="sum">('.($commentmeta->up - $commentmeta->down).')</span>';
        
        $proc_up = 0;
        $proc_down = 0; 
        if($commentmeta->up + $commentmeta->down != 0)
        {
            $proc_up = round($commentmeta->up / ($commentmeta->up + $commentmeta->down), 2)*100;
            $proc_down = round($commentmeta->down / ($commentmeta->up + $commentmeta->down), 2)*100;
            
            // check round problem
            if($proc_up + $proc_down > 100)
            {
                if($proc_up > $proc_down)
                {
                    $proc_up -= ($proc_up + $proc_down) - 100;    
                } else
                {
                    $proc_down -= ($proc_up + $proc_down) - 100; 
                }       
            } 
        }

        $out .= '<span class="procentage">+'.$proc_up.'%/-'.$proc_down.'%</span>';        
        $out .= '</div>';
        
        return $out;        
    } 
    
    public function getPostTopVotedComment($postid)
    {
        $result = null;
        $meta = get_post_meta($postid, 'dcp_votecomment_top', true);        
        if($meta != '')
        {
            if($meta->cid != -1)
            {
                $commentmeta = get_comment_meta($meta->cid, 'dcp_votecomment', true);
                if($commentmeta != '')
                {
                    $out = '';
                    $out .= '<div class="dcp-vote-comment">';          
                    $out .= '<span class="up">+'.$commentmeta->up.'</span>/<span class="down">-'.$commentmeta->down.'</span>';
                    $out .= '<span class="sum">('.($commentmeta->up - $commentmeta->down).')</span>';
                    
                    $proc_up = 0;
                    $proc_down = 0; 
                    if($commentmeta->up + $commentmeta->down != 0)
                    {
                        $proc_up = round($commentmeta->up / ($commentmeta->up + $commentmeta->down), 2)*100;
                        $proc_down = round($commentmeta->down / ($commentmeta->up + $commentmeta->down), 2)*100;
                        
                        // check round problem
                        if($proc_up + $proc_down > 100)
                        {
                            if($proc_up > $proc_down)
                            {
                                $proc_up -= ($proc_up + $proc_down) - 100;    
                            } else
                            {
                                $proc_down -= ($proc_up + $proc_down) - 100; 
                            }       
                        } 
                    }

                    $out .= '<span class="procentage">+'.$proc_up.'%/-'.$proc_down.'%</span>';        
                    $out .= '</div>'; 
                    
                    $result = Array();
                    $result['text'] = $out;
                    $result['cid'] = $meta->cid;
                    $result = (object) $result;               
                    
                } else
                {
                    // find new top comment, previous was not deleted or is not set
                
                }
            }           
        } else
        {
            $dummypostdata = (object) Array('cid' => -1, 'sum' => 0);
            update_post_meta($postid, 'dcp_votecomment_top', $dummypostdata); 
        }
        
        return $result;
    }
    
} // class   

    global $dcp_votingshortcodes;
    $dcp_votingshortcodes = new dcpVotingShortCodes();    
    
?>
