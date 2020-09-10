<?php
session_start();
include 'lang/FR_FR.php';
include 'config.php';
include 'utils/sessions.php';
include 'models/resident.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-fluid">
  <h1>Vos résidents</h1>
  <a href="/register-resident.php">Ajouter un résident</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Age</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $resident = new resident();
        $residents = $resident->getAllResidentsByEhpad($_SESSION['profile']['id']);

        for($i = 0; $i < count($residents); $i++) {
          ?>
      <tr>
        <td><?=$residents[$i]['last_name'];?></td>
        <td><?=$residents[$i]['first_name'];?></td>
        <td><?=$residents[$i]['age'];?></td>
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
