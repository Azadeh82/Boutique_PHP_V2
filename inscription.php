<!DOCTYPE html>
<html lang="fr">
<?php

include './functions.php';

include './head.php';


session_start();

?>

<body>

  <?php
  include './header.php'; ?>

  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3">INSCRIPTION</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row mx-auto">
        <div class="col">

          <form method="POST" action="./index.php" class="row g-3">
            <input type="hidden" name="inscription" value="true">
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Nom</label>
              <input required type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Prenom</label>
              <input required type="text" class="form-control" name="prenom">
            </div>

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Mail</label>
              <input required type="email" class="form-control" name="email">
            </div>

            <div class="col-md-6">
              <label for="validationCustom05" class="form-label">Mot de passe</label>
              <!--**********indique encryter pour mot de pass************-->
              <small id="emailHelp" class="form-text text-muted">Entre 8et15 caractères,minimum 1lettre, 1chiffre et 1caractère spécial</small>
              <input required type="password" class="form-control" name="mot_de_passe">
            </div>

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Adresse</label>
              <input required type="text" class="form-control" name="adresse">

            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Code postal</label>
              <input required type="text" class="form-control" name="code_postal">
            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Ville</label>
              <input required type="text" class="form-control"  name="ville">
            </div>

            <div class="col-12 text-center">
              <button class="btn btn-info" type="submit" style="color: white";>Inscrire</button>
            </div>
          </form>


        </div>

      </div>
    </div>


  </main>

  <?php include './footer.php'; ?>
</body>

</html>