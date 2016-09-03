<?php
/**********************************************************************
* DIGITAL CAVALRY WP NEWSLETTER SYSTEM PLUGIN 
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
*  REGISTER USER TO NEWSLETTER
********************************************/
if($_POST['action'] == 'register') 
{
    $out = '';
    $mysqli = new mysqli(DCP_NEWSLETTER_DB_HOST, DCP_NEWSLETTER_DB_USER, DCP_NEWSLETTER_DB_PASSWORD, DCP_NEWSLETTER_DB_NAME);
    if(!mysqli_connect_error())
    {
       $que = "SELECT * FROM ".DCP_NEWSLETTER_DB_TABLE." WHERE email = '".$_POST['email']."' AND meta = '".$_POST['meta']."' ";
       $result = $mysqli->query($que);
       
       if($result->num_rows > 0)
       {
           $object = new stdClass();
           $object->exist = true;
           $out = json_encode($object);       
       } else
       {
           $que = "INSERT INTO ".DCP_NEWSLETTER_DB_TABLE." (email, meta) VALUES ('".$_POST['email']."', '".$_POST['meta']."')";          
           $result = $mysqli->query($que);
           
           $object = new stdClass();           
           $object->exist = false;
           if($result)
           {                                     
               $object->registered = true;
           } else
           {
               $object->registered = true;
           } 
           $out = json_encode($object);               
       }
                   
       $mysqli->close();
    } else
    {
      $out = 'MySQL Access Error.';  
    }   
       
    echo $out;    
} 

/*******************************************
*  UNREGISTER USER FROM NEWSLETTER
********************************************/
if($_POST['action'] == 'unregister') 
{
    $out = '';
    $mysqli = new mysqli(DCP_NEWSLETTER_DB_HOST, DCP_NEWSLETTER_DB_USER, DCP_NEWSLETTER_DB_PASSWORD, DCP_NEWSLETTER_DB_NAME);
    if(!mysqli_connect_error())
    {
       $que = "SELECT * FROM ".DCP_NEWSLETTER_DB_TABLE." WHERE email = '".$_POST['email']."' AND meta = '".$_POST['meta']."' ";
       $result = $mysqli->query($que);
       
       if($result->num_rows > 0)
       {
           $que = "DELETE FROM ".DCP_NEWSLETTER_DB_TABLE." WHERE email = '".$_POST['email']."' AND meta = '".$_POST['meta']."' ";          
           $result = $mysqli->query($que);

           $object = new stdClass();
           $object->exist = true;
           
           if($result)
           {
              $object->unregistered = true;  
           } else
           {
              $object->unregistered = false;  
           }
           $out = json_encode($object);       
       } else
       {
           $object = new stdClass();           
           $object->exist = false;                               
           $object->unregistered = false;
           $out = json_encode($object);               
       }
                   
       $mysqli->close();
    } else
    {
      $out = 'MySQL Access Error.';  
    }   
       
    echo $out;    
} 

?>