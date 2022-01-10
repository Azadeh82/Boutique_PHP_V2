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

    <h2 class="text-center fst-italic fs-1 my-3">CONNEXION</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row mx-auto">
        <div class="col">

          <form method="POST" action="./index.php" class="row g-3">
            <input type="hidden" name="connexion" value="true">
            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">Mail</label>
              <input required type="email" class="form-control" name="email">
            </div>

            <div class="col-md-6">
              <label for="validationCustom05" class="form-label">Mot de passe</label>
              <input required type="password" class="form-control" name="mot_de_passe">
            </div>

            <div class="col-12 text-center mb-5">
              <button class="btn btn-info" type="submit">connexion</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="container text-center mt-5">
      <h3>Pas encore inscrit ?</h3>
      <a href="./inscription.php"><button class="btn btn-info"> Je crée mon compte</button></a>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>