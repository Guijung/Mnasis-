<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/message.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-fluid">
  <h1>Vos messages</h1>
  <a href="/messages-carousel.php">Démarrer le slideshow des messages pour vos résidents</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Message</th>
        <th scope="col">Auteur</th>
        <th scope="col">Date</th>
        <th scope="col">Destinataire</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $message = new message();
        $messages = $message->getAllMessagesByEhpad($_SESSION['profile']['id']);

        for($i = 0; $i < count($messages); $i++) {
          ?>
      <tr>
        <td><?=$messages[$i]['message'];?></td>
        <td><?=$messages[$i]['author'];?></td>
        <td><?=$messages[$i]['date'];?></td>
        <td><?=$messages[$i]['first_name'].' '.$messages[$i]['last_name'];?></td>
        <td></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>

<?php include 'parts/footer.php';
?>
