<?php

$resident = new resident();
// On utilise l'id de l'epad identifiée dans la session
$resident->idEhpad = $_SESSION['profile']['id'];

if(isset($_POST['residentid'])){
  $resident->id = $_POST['residentid'];
  $resident->deleteresident();
}
$residentsList = $resident->getAllResidents();
?>
