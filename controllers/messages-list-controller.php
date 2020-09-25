<?php

$message = new message();
// On utilise l'id de l'epad identifiée dans la session
$message->idEhpad = $_SESSION['profile']['id'];

// Supression d'un message. Id du message est contenu dans la variable idMessage
if(isset($_POST['idMessage'])){
  $message->id = $_POST['idMessage'];
  $message->deleteMessage();
}

$messagesList = $message->getAllMessages();

?>

