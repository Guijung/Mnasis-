<?php
session_start();

// Destruction de la session
session_destroy();
// Redirection vers la page de login
header('location:login.php');
?>
