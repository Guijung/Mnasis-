<?php
include 'models/member.php';
include 'controllers/suscribe-memberscontroller.php';
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

        <!-- Start Email field -->
        <form class="form-inline text-white">
          <label for="inlineFormInputName2">Email</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="MarieLeduc">

          <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="gmail.com">
          </div>

          <div class="form-check mb-2 mr-sm-2">
            <input class="form-check-input" type="checkbox" id="inlineFormCheck">
            <label class="form-check-label" for="inlineFormCheck">
              Remember me
            </label>
          </div>
          <!-- End email field -->

          <!-- Start password field -->
          <div class="form-row">
            <div class="form-group col-6 text-white">
              <label for="inputpassword">Mot de passe</label>
              <input type="email" class="form-control" id="inputPassword">
            </div>
            <div class="form-group col-6 text-white">
              <label for="inputPassword4">Confirmation Mot de passe</label>
              <input type="password" class="form-control" id="inputPassword">
            </div>
          </div>
          <!-- End password field -->

          <!--start nickname field -->
          <div class="form-row">
            <div class="form-group col-6 text-white">
              <label for="inputpassword">Pseudo</label>
              <input type="login" class="form-control" id="inputLogin">
            </div>
          </div>
          <!--end nickname field -->

          <div class="form-row">
            <button type="submit" class="btn btn-primary justify-center">Enregistrez</button>
          </div>
        </form>
    </div>
    </form>
    <!-- End form -->
  </div>
</div>
<!-- End container -->
<?php include 'parts/footer.php';