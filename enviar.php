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

  $email_message = "Contenido del Mensaje.\n\n";

  $email_message .= "Nombre: ".$first_name."\n";
 
    $email_message .= "Apellido: ".$last_name."\n";
 
    $email_message .= "Email: ".$email_from."\n";
 
    $email_message .= "Teléfono: ".$telephone."\n";
 
    $email_message .= "Mensaje: ".$message."\n";

  $headers = 'MIME-Version: 1.0' . "\r\n"
  .'Content-type: text/html; charset=utf-8' . "\r\n"
  .'From: ' . $email_from . "\r\n";

  if(mail($email_to,$email_subject,$email_message,$headers)){
    header("Location:response.html");
    exit();
  } else{
    header("Location:response2.html");
    exit();
  }

}else{
  header("Location:response2.html");
  exit();
}

?>