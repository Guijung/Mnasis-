<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/ehpad.php';
include 'controllers/update-profile-ehpad-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>

<div class="container-lg">
  <?php
    if (isset($success)){
  ?>
  <p>Votre modification a été effectuée.</p>
  <?php
    } else {
  ?>
  <h1>Modifier votre profil</h1>
  <form method="post">
    <div class="form-group">
      <label for="name">Nom de l'établissement</label>
      <input type="text" class="form-control" id="name" name="name"
        value="<?= isset($_POST['name']) ? $_POST['name'] : $profile->name; ?>" required>
      <?php if (isset($formErrors['name'])) { ?>
      <p class="text-danger"><?= $formErrors['name'] ?></p>
      <?php } else { ?>
      <small id="nameHelp" class="form-text text-muted">Merci de renseigner votre nom d'établissement</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email"
        value="<?= isset($_POST['email']) ? $_POST['email'] : $profile->email; ?>" required>
      <?php if (isset($formErrors['email'])) { ?>
      <p class="text-danger"><?= $formErrors['email'] ?></p>
      <?php } else { ?>
      <small id="mailHelp" class="form-text text-muted">Merci de renseigner votre adresse messagerie</small>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="city">Ville</label>
      <input type="text" class="form-control" id="city" name="city"
        value="<?= isset($_POST['city']) ? $_POST['city'] : $profile->city; ?>" required>
      <?php if (isset($formErrors['city'])) { ?>
      <p class="text-danger"><?= $formErrors['city'] ?></p>
      <?php } else { ?>
      <small id="cityHelp" class="form-text text-muted">Merci de renseigner votre ville</small>
      <?php } ?>
    </div>
    <button name="updateEhpad" class="btn btn-mnesis btn-round" type="submit">Modifier</button>
  </form>
  <?php } ?>
</div>

<?php include 'parts/footer.php';
