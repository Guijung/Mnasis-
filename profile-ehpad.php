<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/ehpad.php';
include 'controllers/profile-ehpad-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-lg">

  <div class="card ">
    <!-- Card content -->
    <div class="card-body">
      <!-- Title -->
      <h4 class="card-title">Votre profil</h4>
      <!-- Text -->
      <p class="card-text">Nom : <?= $profile->name; ?></p>
      <p class="card-text">Ville : <?= $profile->city; ?></p>
      <p class="card-text">Adresse E-mail : <?= $profile->email; ?></p>
      <a class="btn btn-mnesis btn-round" href="update-profile-ehpad.php">Modifier vos informations</a>
    </div>
  </div>
</div>

<?php include 'parts/footer.php';
?>
