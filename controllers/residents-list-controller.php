<?php

$resident = new resident();
// On utilise l'id de l'epad identifiée dans la session
$resident->idEhpad = $_SESSION['profile']['id'];

if(!empty($_GET['id'])){
  $resident->id = $_GET['id'];
  $resident->deleteresident();
}

$residentsList = $resident->getAllResidents();
?>
