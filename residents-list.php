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
  <h1>Vos résidents</h1>
  <a class="btn btn-mnesis btn-round" href="/register-resident.php">Ajouter un résident</a>
  <table class="table table-striped table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Age</th>
        <th scope="col">Description</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
        for($i = 0; $i < count($residentsList); $i++) {
          ?>
      <tr>
        <td><?= $residentsList[$i]->last_name; ?></td>
        <td><?= $residentsList[$i]->first_name; ?></td>
        <td><?= $residentsList[$i]->age; ?></td>
        <td><?= $residentsList[$i]->description; ?></td>
        <td><a class="btn btn-mnesis btn-round" href="update-resident.php?id=<?= $residentsList[$i]->id; ?>">Modifier</a></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>

<?php include 'parts/footer.php';
?>
