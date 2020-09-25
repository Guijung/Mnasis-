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
  <table class="table table-striped table-responsive-sm mt-3">
    <thead>
      <tr>
        <th scope="col">Message</th>
        <th scope="col">Auteur</th>
        <th scope="col">Date</th>
        <th scope="col">Destinataire</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($messagesList as $message) {
          ?>
      <tr>
        <td><?= $message->message; ?></td>
        <td><?= $message->author; ?></td>
        <td><?= $message->date; ?></td>
        <td><?= $message->first_name.' '.$message->last_name; ?></td>

        <td></td>
        <td><button class="btn btn-mnesis btn-round" data-toggle="modal" data-target="#delete-message-modal"
            data-delete="<?= $message->id; ?>" data-author="<?= $message->author; ?>"
            data-destinataire="<?= $message->destinataire; ?>">Supprimer</button></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>
<div class="modal" tabindex="-1" role="dialog" id="delete-message-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="messageModal"></p>
      </div>
      <div class="modal-footer">
        <form method="post">
          <input type="hidden" id="delete-message" name="idMessage" value="">
          <button type="submit" class="btn btn-secondary">Oui</button>
        </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
<?php include 'parts/footer.php';
?>
