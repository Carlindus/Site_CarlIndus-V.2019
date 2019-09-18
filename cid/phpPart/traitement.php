<?php

// Récupération de PHPMailer

require 'PHPMailer/PHPMailerAutoload.php';

//Correspond au nom du bouton d'envoi (submit)

if (isset($_POST['sendForm'])){

  // Conversion des champs de formulaire en variables

  $nom = strip_tags(htmlspecialchars($_POST['name']));
  $prenom = strip_tags(htmlspecialchars($_POST['firstname']));
  $email_address = strip_tags(htmlspecialchars($_POST['email']));
  $message = strip_tags(htmlspecialchars($_POST['message']));

// Traitement des données récupérées

  $email = new PHPMailer();
  $email->IsHTML(true);
  $email->CharSet = 'UTF-8';
  $email->From      = 'contact@monmail.com';
  $email->FromName  = $nom.' '.$prenom;
  $email->Subject   = '[formulaire CID] from '.$nom.' '.$prenom;
  $email->Body      = 'Vous avez reçu un message de '.$nom.' '.$prenom.'<br /><br /><strong>Email :</strong> : '.$email_address.'<br /><strong>Message : </strong>'.$message;
  $email->AddAddress( 'carlindusdesign@gmail.com' );


// $_SERVER['QUERY_STRING'] != "" ?
// $redirection = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] : $redirection = $_SERVER['PHP_SELF'];
//
// header("Location: ".$redirection."");

header("Location: https://www.carlindusdesign.fr/cid/phpPart/merci.php");
  return $email->Send();

}
else{
  echo 'Ca marche pas.';
}
?>
