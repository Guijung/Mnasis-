<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/message.php';
include 'controllers/messages-list-controller.php';
include 'parts/header.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>

<div class="messages-carousel">
  <?php
  // Liste tous les messages
    for($i = 0; $i < count($messagesList); $i++) {
  ?>
  <div class="messages-carousel-item">
    <div class="w-75">
      <p class="h4 text-italic text-black-50">Pour:</p>
      <p class="h1 text-primary"><?=$messagesList[$i]->first_name.' '.$messagesList[$i]->last_name;?></p>
      <p class="messages-carousel-message"><?=$messagesList[$i]->message;?></p>
      <p class="h4 text-italic text-black-50">Envoyé par:</p>
      <p class="h3"><?=$messagesList[$i]->author;?>
    </div>
  </div>
  <a class="messages-carousel-logo" href="/profile-ehpad.php">
    <img src="./assets/img/logov1.png" alt="logo">
  </a>
  <?php
  }
  ?>
</div>

<script type="text/javascript">
// Carousel
// Initialisations
var currentMessageIndex = 0;
// Recupère dans le document tous les élement .carousel-item
var items = document.querySelectorAll('.messages-carousel-item');
items[0].classList.add('active');

// Affiche un message tous les 5 secondes
setInterval(() => {
  currentMessageIndex++;
  // Modulo permet de cycler sur l'index
  currentMessageIndex = currentMessageIndex % items.length;
  for (var i = 0; i < items.length; i++) {
    var el = items[i];
    // Cache le message
    el.classList.remove('active');
    // Affiche le message correspondant à l'index courant
    if (i == currentMessageIndex) {
      el.classList.add('active');
    }
  }
}, 5000)
</script>

<?php include 'parts/footer.php';
?>
