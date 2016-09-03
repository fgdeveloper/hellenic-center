<?php
    
function getUserIP()
{ 
    $ip = null;
    if($_SERVER['HTTP_X_FORWARDED_FOR']) 
    { 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } else 
    { 
        $ip = $_SERVER['REMOTE_ADDR']; 
    } 

    return $ip; 
} 

echo getUserIP();
    
?>