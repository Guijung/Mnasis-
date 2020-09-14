<?php

$ehpad = new ehpad();
// On utilise l'email de l'epad identifiée dans la session
$ehpad->email = $_SESSION['profile']['email'];

$profile = $ehpad->getEhpadProfile();
?>
