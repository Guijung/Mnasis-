<?php

$message = new message();
// On utilise l'id de l'epad identifiée dans la session
$message->idEhpad = $_SESSION['profile']['id'];

$messagesList = $message->getAllMessages();

if(isset($_POST['residentid'])){
  $resident->id = $_POST['residentid'];
  $resident->deleteMessages()();
}

?>
