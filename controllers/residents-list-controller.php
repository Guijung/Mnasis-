<?php

$resident = new resident();
// On utilise l'id de l'epad identifiée dans la session
$resident->idEhpad = $_SESSION['profile']['id'];

// Supression d'un résident. Id du résisent est contenu dans la variable idResident
if(isset($_POST['idResident'])){
  $resident->id = $_POST['idResident'];
  $resident->deleteResident();
}

$residentsList = $resident->getAllResidents();
?>
