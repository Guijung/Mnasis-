<?php

$resident = new resident();
// On utilise l'id de l'epad identifiée dans la session
$resident->idEhpad = $_SESSION['profile']['id'];

$residentsList = $resident->getAllResidents();
?>
