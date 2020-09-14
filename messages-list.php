<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/message.php';
include 'controllers/messages-list-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-lg">
  <h1>Vos messages</h1>
  <a class="btn btn-mnesis btn-round" href="/messages-carousel.php">Démarrer la diffusion des messages</a>
  <table class="table table-striped table-responsive-sm">
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
        for($i = 0; $i < count($messagesList); $i++) {
          ?>
      <tr>
        <td><?= $messagesList[$i]->message; ?></td>
        <td><?= $messagesList[$i]->author; ?></td>
        <td><?= $messagesList[$i]->date; ?></td>
        <td><?= $messagesList[$i]->first_name.' '.$messagesList[$i]->last_name; ?></td>
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
