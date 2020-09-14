<?php

$message = new message();
// On utilise l'id de l'epad identifiée dans la session
$message->idEhpad = $_SESSION['profile']['id'];

$messagesList = $message->getAllMessages();
?>
