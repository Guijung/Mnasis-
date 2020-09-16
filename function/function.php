<?php
 function checkPasswordAvailable($pass, &$error){
  $errorNotAvailable = $error;
   if (passlenght($pass) < 8 ){
     $errors[] = "Le password est trop court !";
   }
   if (!preg_match("#[0-9]+#", $pass)) {
    $errors[] = "Le password doit inclure au moins un chiffre!";
}

if (!preg_match("#[a-zA-Z]+#", $pass)) {
    $errors[] = "Le password doit inclure au moins une lettre!";
}     

return ($errors == $errorNotAvailable);
}

?>