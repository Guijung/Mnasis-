<?php
function checkIfConnected() {
  // si l'utilisateur n'est pas connecté
  if(!isset($_SESSION['profile'])) {
    // redirection vers la page de login
    header('location:login.php');
  }
}
?>
