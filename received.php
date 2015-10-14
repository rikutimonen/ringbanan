<?php
session_start();

	require_once ("config/config.php");

 	$first_name = $_SESSION['enimi'];
    $last_name = $_SESSION['snimi'];
    $email_from = $_SESSION['email']; 
 	$telephone = $_SESSION['puhnro'];
    $comments = $_SESSION['cart'];

    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

    $email_message = "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Order: ".clean_string($comments)."\n";

    

 	
 	$email_from = $_SESSION['email'];
    //$email_message .= $_SESSION['email'] . $_SESSION['cart'];
    $email_to = "mrbadgerofficial@gmail.com";
 
    $email_subject = "Uusi tilaus";


    $headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 

require_once('functions/functions.php');
include('index.php');


?>

<h3>Thank you for your order!<h3>


