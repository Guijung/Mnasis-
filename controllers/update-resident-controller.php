<?php

// Vérifie que l'id du resident a été spécifié dans l'url
if (!empty($_GET['id'])){
  $resident = new resident();
  // On utilise l'id de l'epad identifiée dans la session
  $resident->id = $_GET['id'];

  // On récupère les infos du résident pour les afficher dans le formulaire de modification
  $residentProfile = $resident->getResidentProfile();

  if (isset($_POST['updateResident'])) {
    if(!empty($_POST['firstName'])){
      $resident->firstName = htmlspecialchars($_POST['firstName']);
    }else{
      $formErrors['firstName'] = RESIDENT_FIRST_NAME_ERROR_EMPTY;
    }

    if(!empty($_POST['lastName'])){
      $resident->lastName = htmlspecialchars($_POST['lastName']);
    }else{
      $formErrors['lastName'] = RESIDENT_LAST_NAME_ERROR_EMPTY;
    }

    if(!empty($_POST['yearOfBirth'])){
      $resident->yearOfBirth = $_POST['yearOfBirth'];
    }else{
      $formErrors['yearOfBirth'] = RESIDENT_YEAR_OF_BIRTH_ERROR_EMPTY;
    }

    // Vérifie si la description ne dépasse pas 255 caractères
    if(strlen($_POST['description']) <= 255){
      $resident->description = htmlspecialchars($_POST['description']);
    }else{
      $formErrors['description'] = RESIDENT_DESCRIPTION_ERROR_TOO_LONG;
    }

    if (empty($formErrors)) {
      // On modifie les infos du resident
      if ($resident->updateResident()){
        $success = 'Le profil du résident a bien été modifié';
      }
    }
  }
}
?>
