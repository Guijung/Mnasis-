<?php
session_start();

// Destruction de la session
session_destroy();
// Redirection vers la page
header('location:login.php');
exit();
?>
