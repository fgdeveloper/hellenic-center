<?php
/**********************************************************************
* DIGITAL CAVALRY WP VOTING SYSTEM PLUGIN 
* (WP voting system)   
* 
* File name:   
*      actions.php
* Brief:       
*      Plugin actions script
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
**********************************************************************/    
   
require_once('dbconfig.php');   
 
/*******************************************
*  VOTE COMMENT 
********************************************/
if($_POST['action'] == 'votecomment') 
{
    $out = '';
    $mysqli = new mysqli(DCP_VOTING_DB_HOST, DCP_VOTING_DB_USER, DCP_VOTING_DB_PASSWORD, DCP_VOTING_DB_NAME);
    if(!mysqli_connect_error())
    {
       $que = "SELECT * FROM wp_commentmeta WHERE comment_id = ".$_POST['commentid']." AND meta_key = 'dcp_votecomment' ";
       $result = $mysqli->query($que);
       if($result)
       {       
           $obj = $result->fetch_object();
           $meta_value_obj = unserialize($obj->meta_value);
           if($_POST['value'] > 0)
           {
                $meta_value_obj->up += 1;    
           } else
           {
                $meta_value_obj->down += 1; 
           }
           $meta_value_obj->sum = $meta_value_obj->up - $meta_value_obj->down;
           
           $meta_value_str = serialize($meta_value_obj);
           $obj->meta_value = $meta_value_str;
           
           $que = 'UPDATE wp_commentmeta SET '; 
           $que .= " meta_value = '$obj->meta_value'";
           $que .= ' WHERE comment_id = '.$_POST['commentid']." AND meta_key = 'dcp_votecomment' ";
           
           $mysqli->query($que); 
           
           // calculata procentage
            $proc_up = 0;
            $proc_down = 0; 
            if($meta_value_obj->up + $meta_value_obj->down != 0)
            {
                $proc_up = round($meta_value_obj->up / ($meta_value_obj->up + $meta_value_obj->down), 2)*100;
                $proc_down = round($meta_value_obj->down / ($meta_value_obj->up + $meta_value_obj->down), 2)*100;
                
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
           
           $meta_value_obj->proc_up = $proc_up;
           $meta_value_obj->proc_down = $proc_down; 
                                                       
           $out = json_encode($meta_value_obj);
           
           // check and update top comment for post   
           $que = "SELECT * FROM wp_postmeta WHERE post_id = ".$_POST['postid']." AND meta_key = 'dcp_votecomment_top' ";
           $result = $mysqli->query($que);
           if($result)
           {
               $obj = $result->fetch_object();
               $postmeta_value_obj = unserialize($obj->meta_value);
               
               if($meta_value_obj->sum > $postmeta_value_obj->sum or $_POST['commentid'] == $postmeta_value_obj->cid)
               {
                    $postmeta_value_obj->sum = $meta_value_obj->sum;
                    $postmeta_value_obj->cid = $_POST['commentid']; 
                    $postmeta_value_str = serialize($postmeta_value_obj); 
                    $obj->meta_value = $postmeta_value_str; 
                    
                   $que = 'UPDATE wp_postmeta SET '; 
                   $que .= " meta_value = '$obj->meta_value'";
                   $que .= ' WHERE post_id = '.$_POST['postid']." AND meta_key = 'dcp_votecomment_top' ";
                   
                   $mysqli->query($que);                        
               }          
           } // if result                                             
       } // if result   
            
       
       $mysqli->close();
    } else
    {
      $out = 'MySQL Access Error.';  
    }   
       
    echo $out;    
} 

/*******************************************
*  VOTE POST 
********************************************/    
if($_POST['action'] == 'votepost')
{
    $out = '';
    $mysqli = new mysqli(DCP_VOTING_DB_HOST, DCP_VOTING_DB_USER, DCP_VOTING_DB_PASSWORD, DCP_VOTING_DB_NAME);
    if(!mysqli_connect_error())
    {
       
       $que = "SELECT * FROM ".DCP_VOTING_POST_DB_TABLE." WHERE post_id = ".$_POST['postid'];
       $result = $mysqli->query($que);
       if($result)
       {
            $obj = $result->fetch_object();

            // add vote to sum
            $obj->sum += $_POST['value'];
            // increase votes number
            $obj->votes += 1; 
            // increase particular votes for statistics
            switch($_POST['value'])
            {
                case 1: $obj->votes1 += 1; break;
                case 2: $obj->votes2 += 1; break;
                case 3: $obj->votes3 += 1; break;
                case 4: $obj->votes4 += 1; break;
                case 5: $obj->votes5 += 1; break;
                case 6: $obj->votes6 += 1; break;
                case 7: $obj->votes7 += 1; break;
                case 8: $obj->votes8 += 1; break;
                case 9: $obj->votes9 += 1; break;
                case 10: $obj->votes10 += 1; break;   
            } // switch
            
            $que = 'UPDATE '.DCP_VOTING_POST_DB_TABLE.' SET ';

            $que .= " sum = $obj->sum";
            $que .= ", votes = $obj->votes ";
            
            $que .= ", votes1 = $obj->votes1 ";
            $que .= ", votes2 = $obj->votes2 ";
            $que .= ", votes3 = $obj->votes3 ";
            $que .= ", votes4 = $obj->votes4 ";
            $que .= ", votes5 = $obj->votes5 ";
            $que .= ", votes6 = $obj->votes6 ";
            $que .= ", votes7 = $obj->votes7 ";
            $que .= ", votes8 = $obj->votes8 ";
            $que .= ", votes9 = $obj->votes9 ";
            $que .= ", votes10 = $obj->votes10 ";
            
            $que .= ' WHERE post_id = '.$_POST['postid']; 
            $mysqli->query($que);  
            
            $out = json_encode($obj);             
       }
        
        $mysqli->close();
    } else
    {
      $out = 'MySQL Access Error.';  
    }    
    
    
    echo  $out;    
}  
  
    
?>