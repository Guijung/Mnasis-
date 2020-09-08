<?php
include 'models/member.php';
include 'controllers/login-controller.php';
include 'parts/header.php';
?>
<!-- Start container
le container fluid occupe 100% de la page -->
<h1>connexion</h1>
<div class="container-fluid">
  <div class="row">
    <!-- Start side image -->
    <div class="col-2">
      <img src="./assets/img/Mnesismess2.png" />
    </div>
    <!-- End side image -->
    <!-- Start form -->
    <div class="col-10">
      <form method="post">
        <div class="form-group text-white text-center">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <?php if (isset($formErrors['mail'])) { ?>
            <p class="text-danger"><?= $formErrors['mail'] ?></p>
          <?php } else { ?>
            <small id="emaildHelp" class="form-text text-muted">Merci de renseigner votre adresse messagerie</small>
          <?php } ?>
          <div class="invalid-feedback">Veuillez renseigner un email valide.</div>
        </div>
        <div class="form-group text-white text-center">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password">
          <?php if (isset($formErrors['password'])) { ?>
            <p class="text-danger"><?= $formErrors['password'] ?></p>
          <?php } else { ?>
            <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
          <?php } ?>
          <div class="invalid-feedback">Veuillez renseigner un mot de passe valide</div>
          <small class="text-muted">Le mot de passe doit contenir au moins 8 caractères.</small>
        </div>
        <button class="btn btn-primary" type="submit">S'identifier</button>
      </form>
    </div>
  </div>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
