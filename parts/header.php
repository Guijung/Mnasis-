<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" href="./assets/css/style.css"/>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container ">
      <diV class="logo">
      <a class="navbar-brand" href="index.php">
        <img src="./assets/img/logov1.png" alt="logo">
      </a>
      </diV>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./login.php">Connexion</a>
          <a class="dropdown-item" href="./subscribe-members.php">inscription</a>
          </li>
        </ul>
      </div><!--fin Div COLLAPSE-->
    </div><!--fin Div CONTAINER-->
    <input id="search" name="search" type="text" placeholder="" />
    <button type="submit" class="btn btn-sm " name="sendSearch">Rechercher</button>
  </nav>

 