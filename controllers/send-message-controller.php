<?php
$formErrors = [];

// Permet de savoir si un message a été envoyé
$isMessageSent = false;

if(isset($_POST['addMessage'])){
  $message = new message();

  if(!empty($_POST['message'])){
    $message->message= htmlspecialchars($_POST['message']);
  }else{
    $formErrors['message'] = MESSAGE_ERROR_EMPTY;
  }

  if(!empty($_POST['author'])){
    $message->author = htmlspecialchars($_POST['author']);
  }else{
    $formErrors['author'] = MESSAGE_AUTHOR_ERROR_EMPTY;
  }

  // On ajoute la date courante
  $message->date= date('Y-m-d H:i:s');

  // On associe le résident sélectionné au message
  $message->idResident = $_POST['idResident'];

  // si le formulaire est valide
  if(empty($formErrors)){
    // On ajoute le message
    $message->addMessage();
    $isMessageSent = true;
  }
}
