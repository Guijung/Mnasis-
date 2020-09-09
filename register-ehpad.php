<?php
include 'config.php';
include 'models/ehpad.php';
include 'lang/FR_FR.php';
//include 'controllers/subscribe-members-controller.php';
include 'controllers/register-ehpadCtrl.php';
include 'parts/header.php';
?>
<!-- Start container
le container fluid occupe 100% de la page -->
<h1>Créez votre compte</h1>
<div class="container-fluid text-white text-center">
  <form action="register-ehpad.php" method="post">
    <div class="form-group  col-8 text-white text-center">
      <label for="name">Nom de l'établissement</label>
      <input type="text" class="form-control" id="name" name="name"/>
      <?php if (isset($formErrors['name'])) { ?>
        <p class="text-danger"><?= $formErrors['name'] ?></p>
      <?php } else { ?>
        <small id="nameHelp" class="form-text text-muted">Merci de renseigner votre nom d'établissement</small>
      <?php } ?>
    </div>
    <div class="form-group col-8">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email"/>
      <!--affiche erreur-->
      <?php if (isset($formErrors['email'])) { ?>
        <p class="text-danger"><?= $formErrors['email'] ?></p>
      <?php } else { ?>
        <small id="emailHelp" class="form-text text-muted">Merci de renseigner votre adresse messagerie</small>
      <?php } ?>
    </div>
    <div class="form-group col-8">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password"/>
      <?php if (isset($formErrors['password'])) { ?>
        <p class="text-danger"><?= $formErrors['password'] ?></p>
      <?php } else { ?>
        <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
      <?php } ?>
    </div>
    <div class="form-group col-8">
      <label for="confirm-password">Confirmation mot de passe</label>
      <input type="password" class="form-control" id="confirm-password" name="passwordVerify"/>
      <?php if (isset($formErrors['passwordVerify'])) { ?>
        <p class="text-danger"><?= $formErrors['passwordVerify'] ?></p>
      <?php } else { ?>
        <small id="passwordVerifyHelp" class="form-text text-muted">Merci de confirmer votre mot de passe</small>
      <?php } ?>
    </div>
    <div class="form-group col-8">
      <label for="city">Ville</label>
      <input type="text" class="form-control" id="city" name="city"/>
      <?php if (isset($formErrors['city'])) { ?>
        <p class="text-danger"><?= $formErrors['city'] ?></p>
      <?php } else { ?>
        <small id="cityHelp" class="form-text text-muted">Merci de renseigner votre ville</small>
      <?php } ?>
    </div>
    <button class="btn btn-primary" type="submit" name="register">S'inscrire</button>
  </form>
  <div class="col-4">
    <img src="./assets/img/Mnesismess2.png" />
  </div>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
