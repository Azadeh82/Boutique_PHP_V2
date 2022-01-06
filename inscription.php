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

    <h2 class="text-center fst-italic fs-1 my-3">BIENVENUE</h2>

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
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Prenom</label>
              <input required type="text" class="form-control" name="prenom">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Mail</label>
              <input required type="email" class="form-control" name="email">
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Mot de passe</label>
              <!--**********indique encryter pour mot de pass************-->
              <small id="emailHelp" class="form-text text-muted">Entre 8 et 15 caractères, minimum 1 lettre, 1 chiffre et 1 caractère spécial</small>
              <input required type="password" class="form-control" name="mot_de_passe">
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Adresse</label>
              <input required type="text" class="form-control" name="adresse">
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Code postal</label>
              <input required type="text" class="form-control" name="code_postal">
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>

            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Ville</label>
              <input required type="text" class="form-control"  name="ville">
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>

            <div class="col-12 text-center">
              <button class="btn btn-info" type="submit">Inscrire</button>
            </div>
          </form>


        </div>

      </div>
    </div>


  </main>

  <?php include './footer.php'; ?>
</body>

</html>