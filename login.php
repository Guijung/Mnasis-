<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'models/ehpad.php';
include 'controllers/login-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// si l'utilisateur est déjà connecté
if(isset($_SESSION['profile'])) {
  // Redirection vers la page de profil
  header('location:profile-ehpad.php');
}
?>

<!-- Start container
le container fluid occupe 100% de la page -->
<div class="container-lg">
  <h1>Login</h1>
  <form method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
      <div class="invalid-feedback">Veuillez renseigner un email valide.</div>
    </div>
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password">
      <div class="invalid-feedback">Veuillez renseigner un mot de passe valide</div>
      <small class="text-muted">Le mot de passe doit contenir au moins 8 caractères.</small>
    </div>
    <button class="btn btn-mnesis btn-round" type="submit">S'identifier</button>
  </form>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
