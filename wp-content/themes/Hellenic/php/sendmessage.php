<?php
/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)     
* 
* File name:   
*      sendmessage.php
* Brief:       
*      Implementation on email sending functionality.
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com 
***********************************************************************/
?>
<?php

    // collect data from post table in local variables
    $name = $_POST["name"];
    $email = $_POST["mail"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $maildest = $_POST["maildest"];
 
    // prepare parameters for email function
    
    // header that describe email
    $headers = "From: $name" . " <$email>" . "\r\n" .
               "Reply-To: " . "$email" . "\r\n" .
               "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
               
    $message .= "<br /><br /><br /><strong>Additional information:</strong><br />";
    $message .= "Name: ".$name."<br />"; 
    $message .= "From: ".$email."<br />"; 
    $message .= "IP Address: ".$_SERVER['REMOTE_ADDR']."<br />";            
    $message .= "Time: ".date("F j, Y, H:i:s")."<br />"; 
                                           
    // send email           
    $ret = mail($maildest, $subject, $message, $headers);    
    
    // check mail return value, true - email was accepted to send, other false
    if($ret)
    {
        // if true return text "okay"
        echo "okay";
    } else
    {
        // if false return text "error"
        echo "error";
    } 
    
?>