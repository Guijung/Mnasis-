<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/resident.php';
include 'controllers/register-resident-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>

<!-- Start container
le container fluid occupe 100% de la page -->
<div class="container-fluid">
  <h1>Ajouter un résident</h1>
  <form method="post">
    <div class="form-group">
      <label for="firstName">Prénom</label>
      <input type="text" class="form-control" id="firstName" name="firstName" required>
      <div class="invalid-feedback">Veuillez renseigner le prénom du résident.</div>
    </div>
    <div class="form-group">
      <label for="lastName">Nom</label>
      <input type="text" class="form-control" id="lastName" name="lastName" required>
      <div class="invalid-feedback">Veuillez renseigner le nom du résident.</div>
    </div>
    <div class="form-group">
      <label for="yearOfBirth">Année de naissance</label>
      <select class="form-control" id="yearOfBirth" name="yearOfBirth" required>
      <option value="" disabled selected>--- Choississez une année de naissance ---</option>
        <?php
          $currentYear = date('Y');
          // affiche les années de naissances entre 70 et 110 ans
          for ($year =  $currentYear - 110; $year <= $currentYear - 70; $year++) {
        ?>
        <option value="<?=$year;?>"><?=$year;?></option>
        <?php
          }
        ?>
      </select>
      <div class="invalid-feedback">Veuillez renseigner l'année de naissance du résident.</div>
    </div>
    <div class="form-group">
      <label for="description">Un petit mot à propos de votre résident</label>
      <textarea class="form-control" id="description" name="description" maxlength="255" rows="3"></textarea>
      <small class="text-muted">Maximum 255 charactères</small>
    </div>
    <button class="btn btn-primary" type="submit" name="register">Ajouter</button>
  </form>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
