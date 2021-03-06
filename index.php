<?php
session_start();
include 'parts/header.php';
include 'parts/top-nav.php';
?>
<!-- Intro section -->
<div class="py-4">
  <div class="container-lg">
    <div class="row align-items-center">
      <div class="col-12 col-md-6 order-md-2">
        <div class="px-2 text-center text-md-left">
          <img class="img-fluid" src="/assets/img/Mnesistotem2.png">
        </div>
      </div>
      <div class="col-12 col-md-6 order-md-1">
        <div class="px-3 text-center text-md-left">
          <h1 class="text-uppercase">Notre but</h1>
          <p>Nous souhaitons permettre de diminuer l'isolement des personnes agées en ehpad en
            leur permettant de recevoir des messages d'anonymes qu'ils peuvent découvrir chaque jours au sein de leurs
            établissements.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin intro section -->
<!-- But section section -->
<div class="py-4 bg-light">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="d-flex flex-column align-items-center px-3">
          <h1 class="text-center text-uppercase">Ecrivez à une personne agée</h1>
          <p class="text-center w-50">Juste quelques mots suffisent à faire sourire </p>
          <a class="btn btn-mnesis btn-round" href="/send-message.php">Envoyez votre message</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin but section -->
<!-- Comment ca marche section -->
<div class="py-4">
  <div class="container-lg">
    <h1 class="text-center text-uppercase mb-5">Comment ça marche ?</h1>
    <div class="row align-items-center my-5">
      <div class="col-12 col-md-6 order-md-2">
        <div class="px-3 text-center text-md-left">
          <h3>Ecrivez !</h3>
          <p>Tapez votre message pour un résident en ehpad choisi au hasard.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 order-md-1 text-center">
        <div class="px-2">
          <img class="img-fluid" src="/assets/img/mamy1.png">
        </div>
      </div>
    </div>
    <div class="row align-items-center my-5">
      <div class="col-12 col-md-6">
        <div class="px-3 text-center text-md-left">
          <h3>Envoyez !</h3>
          <p>Votre message sera recu électroniquement au sein de l'ehpad de votre destinataire.</p>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="px-2">
          <img class="img-fluid" src="/assets/img/undraw_coming_home_52ir.svg">
        </div>
      </div>
    </div>
    <div class="row align-items-center my-5">
      <div class="col-12 col-md-6 order-md-2">
        <div class="px-3 text-center text-md-left">
          <h3>Appréciez !</h3>
          <p>Votre message est ensuite diffusé sur les écrans de l'ehpad de votre destinataire. Ce dernier découvira
            avec plaisir la petite attention que vous lui avez laissé </p>
        </div>
      </div>
      <div class="col-12 col-md-6 order-md-1">
        <div class="px-2">
          <img class="img-fluid" src="/assets/img/undraw_online_reading_np7n.svg">
        </div>
      </div>
    </div>
  </div>
  <!-- Fin Comment ca marche section -->
</div>



<?php include 'parts/footer.php';
?>
