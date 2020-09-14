<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/resident.php';
include 'controllers/update-resident-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>

<!-- Start container
le container fluid occupe 100% de la page -->
<div class="container-lg">
<?php
    if (isset($success)){
  ?>
  <p>Votre modification a été effectuée.</p>
  <?php
    } else {
  ?>
  <h1>Modifier un résident</h1>
  <form method="post">
    <div class="form-group">
      <label for="firstName">Prénom</label>
      <input type="text" class="form-control" id="firstName" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : $residentProfile->first_name; ?>" required>
      <div class="invalid-feedback">Veuillez renseigner le prénom du résident.</div>
    </div>
    <div class="form-group">
      <label for="lastName">Nom</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : $residentProfile->last_name; ?>" required>
      <div class="invalid-feedback">Veuillez renseigner le nom du résident.</div>
    </div>
    <div class="form-group">
      <label for="yearOfBirth">Année de naissance</label>
      <select class="form-control" id="yearOfBirth" name="yearOfBirth" required>
      <option value="" disabled>--- Choississez une année de naissance ---</option>
        <?php
          // Récupère l'année de naissance pour sélectionner la bonne valeur dans le select
          $yearOfBirth = isset($_POST['yearOfBirth']) ? $_POST['yearOfBirth'] : $residentProfile->year_of_birth;
          $currentYear = date('Y');
          // affiche les années de naissances entre 70 et 110 ans
          for ($year =  $currentYear - 110; $year <= $currentYear - 65; $year++) {
        ?>
        <option value="<?=$year;?>" <?php if($year == $yearOfBirth) { echo 'selected'; }?> ><?=$year;?></option>
        <?php
          }
        ?>
      </select>
      <div class="invalid-feedback">Veuillez renseigner l'année de naissance du résident.</div>
    </div>
    <div class="form-group">
      <label for="description">Un petit mot à propos de votre résident</label>
      <textarea class="form-control" id="description" name="description" maxlength="255" rows="3"><?= isset($_POST['description']) ? $_POST['description'] : $residentProfile->description; ?></textarea>
      <small class="text-muted">Maximum 255 charactères</small>
    </div>
    <button class="btn btn-mnesis btn-round" type="submit" name="updateResident">Modifier</button>
  </form>
  <?php } ?>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
