<?php
session_start();


include 'lang/FR_FR.php';
include 'config.php';
include 'models/resident.php';
include 'models/message.php';
include 'controllers/send-message-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';
?>

<!-- Start container
le container fluid occupe 100% de la page -->
<div class="container-lg">
  <?php
  // si le message n'est pas envoyé affiche le form
  if (!$isMessageSent) {
    // Tire un résident au hasard comme destinatire du messagge
    $resident = new resident();
    $randomResident = $resident->getRandomResident();
  ?>
  <?php
    // si il y un résident
    if ($randomResident) {
  ?>
    <h1>Envoyer un message à</h1>
    <p>
      <?= $randomResident['first_name'] . ' ' . $randomResident['age'] . ' ans, ' . $randomResident['name'] . ', ' .$randomResident['city']; ?>
    </p>
    <?php
      if (!empty($randomResident['description'])) {
      ?>
    <p><?= $randomResident['description']; ?></p>
    <?php
      }
      ?>
    <form method="post">
      <input type="hidden" name="idResident" value="<?= $randomResident['id']; ?>">
      <div class="form-group">
        <label for="message">De la part de</label>
        <input type="text" class="form-control" id="author" name="author" required>
        <div class="invalid-feedback">Veuillez renseigner votre nom.</div>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" required rows="3"></textarea>
        <div class="invalid-feedback">Veuillez écrire un message.</div>
        <small class="text-muted">Maximum 255 charactères</small>
      </div>
      <button class="btn btn-mnesis btn-round" type="submit" name="addMessage">Envoyer</button>
    </form>
  <?php
    } else {
  ?>
    <p>Il n'y a pour le moment aucun résident enregistré.</p>
  <?php
  }
  } else {
  ?>
  <p>Merci pour votre message !</p>
  <a class="btn btn-mnesis btn-round" href="/send-message.php">Envoyer un nouveau message</a>
  <?php
  }
 ?>
</div>
<!-- End container -->
<?php include 'parts/footer.php';
