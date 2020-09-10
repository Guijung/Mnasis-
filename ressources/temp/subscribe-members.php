<?php
include 'config.php';
include 'models/member.php';
include 'controllers/subscribe-members-controller.php';
include 'parts/header.php';
?>

<!-- Start container -->
<div class="container-fluid">
  <h1 class="text-white text-center">Créer son compte</h1>
  <div class="row">
    <!-- Start side image -->
    <div class="col-2">
      <img src="./assets/img/Mnesismess2.png" />
    </div>
    <!-- End side image -->
    <!-- Start form -->

    <div class="col-10">
      <form action="subscribe-members.php" method="POST">

        <!-- Start Name establishment fields-->
        <div class="form-row">
          <div class="form-group col-12 text-white">
            <label for="inputname">Nom Etablissement</label>
            <input type="text" class="form-control" id="name" name="name">
            <?php if (isset($formErrors['name'])) { ?>
          <p class="text-danger"><?= $formErrors['name'] ?></p>
        <?php } else { ?>
          <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre nom d'établissement</small>
        <?php } ?>
          </div>
          <!-- End Name establishment field-->
          <!-- Start Email field -->
          <div class="form-group col-12 text-white">
            <label for="inputmail">Email</label>
            <input type="mail" class="form-control" id="email" name="mail">
            <?php if (isset($formErrors['mail'])) { ?>
            <p class="text-danger"><?= $formErrors['mail'] ?></p>
          <?php } else { ?>
            <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre adresse messagerie</small>
          <?php } ?>
          </div>
          <!--affiche erreur-->
         
        </div>
    </div>
    <div class="form-check mb-2 mr-sm-2">
      <input class="form-check-input" type="checkbox" id="inlineFormCheck">
      <label class="form-check-label" for="inlineFormCheck">
        Remember me
      </label>
    </div>
    <!-- End email field -->

    <!-- Start password field -->
    <div class="form-row">
      <div class="form-group col-6 text-white">
        <label for="inputpassword">Mot de passe</label>
        <input type="password" class="form-control" id="Password" name="password">
        <!--affiche erreur-->
        <?php if (isset($formErrors['password'])) { ?>
          <p class="text-danger"><?= $formErrors['password'] ?></p>
        <?php } else { ?>
          <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
        <?php } ?>
      </div>
      <div class="form-group col-6 text-white">
        <label for="inputPassword4">Confirmation Mot de passe</label>
        <input type="password" class="form-control" id="Password" name="passwordVerify">
        <!--affiche erreur-->
        <?php if (isset($formErrors['passwordVerify'])) { ?>
          <p class="text-danger"><?= $formErrors['passwordVerify'] ?></p>
        <?php } else { ?>
          <small id="passwordVerifyHelp" class="form-text text-muted">Merci de confirmer votre mot de passe</small>
        <?php } ?>
      </div>
    </div>
    <!-- End password field -->

    <!--start nickname field -->
    <div class="form-row">
      <div class="form-group col-6 text-white">
        <label for="inputpassword">Pseudo</label>
        <input type="login" class="form-control" id="inputLogin" name="username">
      </div>
    </div>
    <!--end nickname field -->

    <div class="form-row">
      <button type="submit" class="btn btn-primary justify-center" name="register">Enregistrez</button>
    </div>
   </div>
  </form>
  <!-- End form -->
</div>
<!-- End container -->
<?php include 'parts/footer.php';
?>

