<?php
include 'parts/header.php';
?>

<!-- Start container -->
<div class="container-fluid">
  <h1 class="text-white text-center">Créer son compte</h1>
  <div class="row">
    <!-- Start side image -->
    <div class="col-2">
      <img src="./assets/img/Mnesismess2.png" />
    </div>
    <!-- End side image -->
    <!-- Start form -->
    <div class="col-10">
    <form action="suscribe-members.php" method="POST">

        <!-- Start Name fields 
        <div class="form-row">
          <div class="form-group col-6 text-white">
            <label for="inputlastname">Prénom</label>
            <input type="text" class="form-control" id="inputlastname">
          </div>
          <div class="form-group col-6 text-white">
            <label for="inputsurname">Nom</label>
            <input type="text" class="form-control" id="inputsurname">
          </div>
        </div>
        End Name fields -->
 <!--start nickname field -->
 <div class="form-row">
          <div class="form-group col-6 text-white">
            <label for="inputpassword">Pseudo</label>
            <input type="email" class="form-control" id="inputLogin">
          </div>
        </div>
        <!--end nickname field -->
      
        <!-- Start password field -->
        <div class="form-row">
          <div class="form-group col-6 text-white">
            <label for="inputpassword">Mot de passe</label>
            <input type="password" class="form-control" id="inputPassword">
          </div>
         <!-- End password field -->
      <button type="submit" class="btn btn-primary justify-center">Se connecter</button>
      </form><!--fin form post-->
    </div><!--fin div password-->
    
  </div>

</div>
<!-- End container -->
<?php include 'parts/footer.php';





