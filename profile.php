<?php
session_start();
include 'utils/sessions.php';
include 'parts/header.php';
include 'parts/top-nav.php';

// cette page n'est accesible qu'après identification
checkIfConnected();
?>
<div class="container-fluid">
  <h1>Ehpad profil</h1>
</div>

<?php include 'parts/footer.php';
?>
