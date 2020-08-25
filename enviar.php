<?php

if($_POST){

  $first_name = "";
  $last_name = "";
  $email_from = "";
  $telephone = "";
  $message = "";
  $email_to = "rj.garcia.ribeiro@gmail.com";
  $email_subject = "Contacto desde Web";

  if(isset($_POST['first_name'])){
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
  }

  if(isset($_POST['last_name'])){
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
  }

  if(isset($_POST['email'])) {
    $email_from = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
    $email_from = filter_var($email_from, FILTER_VALIDATE_EMAIL);
  }

  if(isset($_POST['telephone'])){
    $telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
  }

  if(isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
  }

  $headers  = 'MIME-Version: 1.0' . "\r\n"
  .'Content-type: text/html; charset=utf-8' . "\r\n"
  .'From: ' . $email_from . "\r\n";

  if(mail($email_to,$email_subject,$message,$headers)){
    echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
  } else{
    echo '<p>We are sorry but the email did not go through.</p>';
  }

}else{
  echo '<p>Something went wrong</p>';
}

?>