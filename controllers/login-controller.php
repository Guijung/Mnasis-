<?php

$formErrors = [];
//Vérification du formulaire de connexion
if(isset($_POST['email'])){
    $ehpad = new ehpad();
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet ehpad
            $ehpad->email = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] = EMAIL_ERROR_WRONG;
        }
    }else{
        $formErrors['email'] = EMAIL_ERROR_EMPTY;
    }

    if(empty($_POST['password'])){
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
    }

    if(empty($formErrors)){
        //On récupère le hash de l'utilisateur
       $hash = $ehpad->getEhpadPasswordHash();

       //Si le hash correspond au mot de passe saisi
       if(password_verify($_POST['password'], $hash)){
           //On récupère son profil
            $ehpadProfil = $ehpad->getEhpadProfile();
            //On met en session ses informations
            $_SESSION['profile']['id'] = $ehpadProfil->id;
            $_SESSION['profile']['email'] = $ehpadProfil->email;
            //On redirige vers une autre page.
            header('location:profile-ehpad.php');
            exit();
       }else{
           $formErrors['password'] = $formErrors['email'] = LOGIN_ERROR;
       }
    }

}
