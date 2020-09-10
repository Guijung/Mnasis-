<?php
$formErrors = [];
//Vérification du formulaire d'inscription
if(isset($_POST['register'])){
    $ehpad = new ehpad();
    /**
     * Cette variable sert à savoir si les vérifications du mot de passe et de sa confirmation se sont déroulés avec succès
     */
    $isPasswordOk = true;
    if(!empty($_POST['email'])){
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $ehpad->email = htmlspecialchars($_POST['email']);
        }else{
            $formErrors['email'] = EMAIL_ERROR_WRONG;
        }
    }else{
        $formErrors['email'] = EMAIL_ERROR_EMPTY;
    }

    if(!empty($_POST['name'])){
        //J'hydrate mon instance d'objet user
        $ehpad->name = htmlspecialchars($_POST['name']);
    }else{
        $formErrors['name'] = NAME_ERROR_EMPTY;
    }

    if(!empty($_POST['city'])){
        //J'hydrate mon instance d'objet user
        $ehpad->city = htmlspecialchars($_POST['city']);
    }else{
        $formErrors['city'] = CITY_ERROR_EMPTY;
    }

    if(empty($_POST['password'])){
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
        $isPasswordOk = false;
    }
    if(empty($_POST['passwordVerify'])){
        $formErrors['passwordVerify'] = PASSWORDVERIFY_ERROR_EMPTY;
        $isPasswordOk = false;
    }
    //Si les vérifications des mots de passe sont ok
    if($isPasswordOk){
        if($_POST['passwordVerify'] == $_POST['password']){
            //On hash le mot de passe avec la méthode de PHP
            $ehpad->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $formErrors['password'] = $formErrors['passwordVerify'] = PASSWORD_ERROR_NOTEQUAL;
        }
    }

    if(empty($formErrors)){
        $isOk = true;
        //On vérifie si l'email est libre
        if($ehpad->checkEhpadUnavailabilityByFieldName(['email'])){
            $formErrors['email'] = EMAIL_ERROR_ALREADYUSED;
            $isOk = false;
        }
        //Si c'est bon on ajoute l'ehpad
        if($isOk){
            $ehpad->addEhpad();
            header('location:profile.php');
            exit();
        }
    }
}

?>
