<?php
$formErrors = [];

if(isset($_POST['register'])){
  $resident = new resident();

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

  // On associe le résident à l'ehpad identifiée dans la session
  $resident->idEhpad = $_SESSION['profile']['id'];

  // si le formulaire est valide
  if(empty($formErrors)){
    // On ajoute le résident
    $resident->addResident();
    // Redirection vers la liste des résidents
    header('location:residents-list.php');
  }
}
