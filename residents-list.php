<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/resident.php';
include 'controllers/residents-list-controller.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-lg">
  <h1 class="title">Vos résidents</h1>
  <a class="btn btn-mnesis btn-round" href="/register-resident.php">Ajouter un résident</a>
 
  <table class="table table-striped table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Age</th>
        <th scope="col">Description</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($residentsList as $resident){
          ?>
      <tr>
        <td><?= $resident->last_name; ?></td>
        <td><?= $resident->first_name; ?></td>
        <td><?= $resident->age; ?></td>
        <td><?= $resident->description; ?></td>
        <td><a class="btn btn-mnesis btn-round" href="update-resident.php?id=<?= $resident->id ?>">Modifier</a></td>
        <td><button class="btn btn-mnesis btn-round" data-toggle="modal" data-target="#delete-modal" data-delete="<?= $resident->id ?>">Supprimer</button></td>
        
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>
<div class="modal" tabindex="-1" role="dialog" id="delete-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
      <script> </script> 
      </p>
      </div>
      <div class="modal-footer">
        <form>
          <input type="hidden" id="delete-resident" value="">
        <button type="submit" class="btn btn-secondary">Oui</button>
        </form>
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">Non</button>
      </div>
    </div>
  </div>
</div>
<?php include 'parts/footer.php';
?>
