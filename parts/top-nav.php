<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container ">
    <diV class="logo">
      <a class="navbar-brand" href="index.php">
        <img src="./assets/img/logov1.png" alt="logo">
      </a>
    </diV>
    <?php
      // Menu lorsque l'utilisateur est connecté
      if(isset($_SESSION['profile'])) {
    ?>
    <a href="/profile.php">Votre profil</a>
    <a href="/residents.php">Vos résidents</a>
    <a href="/messages.php">Vos messages</a>
    <a href="/logout.php">Se déconnecter</a>
    <?php
      // Menu par défault
    } else {
      ?>
    <a href="/send-message.php">Envoyer un message à un résident</a>
    <a href="/login.php">Se connecter à son profil</a>
    <a href="/register-ehpad.php">Créer un profil</a>
    <?php
    }
    ?>
    <!--
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav d-flex justify-content-around align-items-sm-baseline ml-auto w-100">
          <li class="nav-item active">
            <a class="nav-link0 text-white" href="index.php">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link2" href="#">Tchat</a>
          </li>
          <li class="nav-item text-center">
            <a class="nav-link3" href="#">Jeux</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Mon compte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./login.php">Connexion</a>
              <a class="dropdown-item" href="./subscribe-members.php">inscription</a>
          </li>
        </ul>
      </div>
-->
    <!--fin Div COLLAPSE-->
  </div>
  <!--fin Div CONTAINER-->
  <!--
    <input id="search" name="search" type="text" placeholder="" />
    <button type="submit" class="btn btn-sm " name="sendSearch">Rechercher</button>
-->

</nav>
