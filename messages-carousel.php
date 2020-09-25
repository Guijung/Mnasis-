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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script  type="text/javascript" src="./assets/js/script.js"></script>
</body>
</html>
