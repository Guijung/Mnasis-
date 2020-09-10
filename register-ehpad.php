<?php
include 'lang/FR_FR.php';
include 'config.php';
include 'models/ehpad.php';
include 'controllers/register-ehpad-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';
?>


<!-- Start container
le container fluid occupe 100% de la page -->
<div class="container-fluid">
  <h1>Créez votre compte</h1>
  <form method="post">
    <div class="form-group">
      <label for="name">Nom de l'établissement</label>
      <input type="text" class="form-control" id="name" name="name" required>
      <?php if (isset($formErrors['name'])) { ?>
      <p class="text-danger"><?= $formErrors['name'] ?></p>
      <?php } else { ?>
      <small id="nameHelp" class="form-text text-muted">Merci de renseigner votre nom d'établissement</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
      <!--affiche erreur-->
      <?php if (isset($formErrors['email'])) { ?>
      <p class="text-danger"><?= $formErrors['email'] ?></p>
      <?php } else { ?>
      <small id="mailHelp" class="form-text text-muted">Merci de renseigner votre adresse messagerie</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password" required>
      <?php if (isset($formErrors['password'])) { ?>
      <p class="text-danger"><?= $formErrors['password'] ?></p>
      <?php } else { ?>
      <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="confirm-password">Confirmation mot de passe</label>
      <input type="password" class="form-control" id="passwordVerify" name="passwordVerify" required>
      <?php if (isset($formErrors['passwordVerify'])) { ?>
      <p class="text-danger"><?= $formErrors['passwordVerify'] ?></p>
      <?php } else { ?>
      <small id="passwordVerifyHelp" class="form-text text-muted">Merci de confirmer votre mot de passe</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="city">Ville</label>
      <input type="text" class="form-control" id="city" name="city" required>
      <?php if (isset($formErrors['city'])) { ?>
      <p class="text-danger"><?= $formErrors['city'] ?></p>
      <?php } else { ?>
      <small id="cityHelp" class="form-text text-muted">Merci de renseigner votre ville</small>
      <?php } ?>
    </div>
    <button name="register" class="btn btn-primary" type="submit">S'inscrire</button>
  </form>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
