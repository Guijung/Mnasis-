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
        foreach($messagesList = $message) {
          ?>
      <tr>
        <td><?= $message->message; ?></td>
        <td><?= $message->author; ?></td>
        <td><?= $message->date; ?></td>
        <
        <td></td>
        <td><a class="btn btn-mnesis btn-round" href="send-message.php?id=<?= $message->id ?>">Modifier</a></td>
        <td><button class="btn btn-mnesis btn-round" data-toggle="modal" data-target="#delete-modal" data-delete="<?= $message->id ?>">Supprimer</button></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>

<?php include 'parts/footer.php';
?>
