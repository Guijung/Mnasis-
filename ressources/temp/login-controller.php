<?php
// Declaration des constantes
define('MAIL_ERROR_WRONG', 'Le format de l\'email est invalid' );
define('MAIL_ERROR_EMPTY', 'le champs email n\'est pas complété');
define('PASSWORD_ERROR_EMPTY', 'le champ password n\'est pas complété');
define('LOGIN_ERROR', 'le mot de passe n\'est pas valide');

$formErrors = [];
//Vérification du formulaire de connexion
if(isset($_POST['login'])){
    $ehpad = new ehpad();
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet ehpad
            $Ehpad->mail = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] = MAIL_ERROR_WRONG;
        }
    }else{
        $formErrors['email'] = MAIL_ERROR_EMPTY;
    }

    if(empty($_POST['password'])){        
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
    }
    
    if(empty($formErrors)){
        //On récupère le hash de l'utilisateur
       $hash = $Ehpad->getEhpadPasswordHash();
       //Si le hash correspond au mot de passe saisi
       if(password_verify($_POST['password'], $hash)){
           //On récupère son profil
            $ehpadProfil = $ehpad->getEhpadProfile();
            //On met en session ses informations
            $_SESSION['profile']['id'] = $ehpadProfil->id;
            $_SESSION['profile']['username'] = $ehpadProfil->ehpadname;
            //On redirige vers une autre page.
            header('location:index.php');
            exit();
       }else{
           $formErrors['password'] = $formErrors['email'] = LOGIN_ERROR;
       }
    }
}