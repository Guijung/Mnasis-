
<nav class="navbar navbar-expand-lg navbar-light bg-white px-2 mb-4">
  <a class="navbar-brand" href="index.php">
    <img class="nav-logo" src="./assets/img/logov7.png" alt="logo">
  </a>
  <!-- collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- collaspe content -->
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav justify-content-around w-100">
      <?php
      // Menu lorsque l'utilisateur est connecté
      if(isset($_SESSION['profile'])) {
    ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="/profile-ehpad.php">Votre profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/residents-list.php">Vos résidents</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/messages-list.php">Vos messages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php">Se déconnecter</a>
      </li>
      <?php
      // Menu par défault
    } else {
      ?>
      <li class="nav-item p-2">
        <a class="btn btn-mnesis btn-round" href="/login.php">Se connecter</a>
      </li>
      <li class="nav-item p-2">
        <a class="btn btn-outline-mnesis btn-round" href="/register-ehpad.php">S'inscrire</a>
      </li>
      <?php
    }
    ?>
    </ul>
  </div>
</nav>
