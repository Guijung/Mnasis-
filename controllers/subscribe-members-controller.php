<?php
define('MAIL_ERROR_WRONG', 'le mail n\'est pas conforme');
define('MAIL_ERROR_EMPTY','le champs email n\'est pas complété');
define('NAME_ERROR_EMPTY','Le champs nom n\'est pas complété');
define('PASSWORD_ERROR_EMPTY','le  password n\'est pas renseigné');
define('PASSWORDVERIFY_ERROR_EMPTY','Veuillez confirmez votre mot de passe');
define('PASSWORD_ERROR_NOTEQUAL', 'Veuillez saisir le même mot de passe');
define('CITY_ERROR_EMPTY','le champs ville n\'est pas complété');
define('USERNAME_ERROR_ALREADYUSED', 'Le pseudo n\'est pas disponible');
define('MAIL_ERROR_ALREADYUSED', 'Le mail n\'est pas disponible');
//Vérification du formulaire d'inscription/ register=nom du bouton de validation
if(isset($_POST['register'])){
    $user = new users();
    /**
     * Cette variable sert à savoir si les vérifications du mot de passe et de sa confirmation se sont déroulés avec succès
     */
    $isPasswordOk = true;
    if(!empty($_POST['mail'])){
        if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $user->mail = htmlspecialchars($_POST['mail']);
        }else{
            $formErrors['mail'] = MAIL_ERROR_WRONG;
        }
    }else{
        $formErrors['mail'] = MAIL_ERROR_EMPTY;
    }
}
if(!empty($_POST['name'])){
        //J'hydrate mon instance d'objet user
        $user->name = htmlspecialchars($_POST['name']);
    }else{
        $formErrors['name'] = NAME_ERROR_EMPTY;
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
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $formErrors['password'] = $formErrors['passwordVerify'] = PASSWORD_ERROR_NOTEQUAL;
        }
    }
    if(!empty($_POST['city'])){
         $user->city = htmlspecialchars($_POST['city']);        
    }else{
        $formErrors['city'] = CITY_ERROR_EMPTY;
    }


    if(empty($formErrors)){
        $isOk = true;
       
        //On vérifie si le mail est libre
        if($user->checkUserUnavailabilityByFieldName(['mail'])){
            $formErrors['mail'] = MAIL_ERROR_ALREADYUSED;
           $isOk = false;
        }
        //Si c'est bon on ajoute l'utilisateur
        if($isOk){
            $user->addUser();
        }
    }

//Traitement de la demande AJAX
if(isset($_POST['fieldValue'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['fieldValue']) && !empty($_POST['fieldName'])){
        //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
        include_once './config.php';
        include_once './models/members.php';
        $user = new users();
        $input = htmlspecialchars($_POST['fieldName']);
        $user->$input = htmlspecialchars($_POST['fieldValue']);
        //Le echo sert à envoyer la réponse au JS
        echo $user->checkUserUnavailabilityByFieldName([htmlspecialchars($_POST['fieldName'])]);
    }else{
        echo 2;
    }
}

?>