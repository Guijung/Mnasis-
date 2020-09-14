<?php

$ehpad = new ehpad();
// On utilise l'email de l'epad identifiée dans la session
$ehpad->email = $_SESSION['profile']['email'];

// On récupère les infos de l'ehpad pour les afficher dans le formulaire de modification
$profile = $ehpad->getEhpadProfile();

if (isset($_POST['updateEhpad'])) {
  if(!empty($_POST['email'])){
    // Vérifie si le format de l'email est valide
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $ehpad->email = htmlspecialchars($_POST['email']);
    }else{
      $formErrors['email'] = EMAIL_ERROR_WRONG;
    }
  } else{
    $formErrors['email'] = EMAIL_ERROR_EMPTY;
  }

  if(!empty($_POST['name'])){
    $ehpad->name = htmlspecialchars($_POST['name']);
  } else{
    $formErrors['name'] = EHPAD_NAME_ERROR_EMPTY;
  }

  if(!empty($_POST['city'])){
    $ehpad->city = htmlspecialchars($_POST['city']);
  } else{
    $formErrors['city'] = CITY_ERROR_EMPTY;
  }

  if (empty($formErrors)) {
    // On modifie les infos de l'ehpad
    if ($ehpad->updateEhpad()){
      $success = 'Votre profil a bien été modifié';
    }
   }
}

?>
