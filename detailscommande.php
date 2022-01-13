<!DOCTYPE html>
<html lang="fr">
<?php

include './functions.php';
include './head.php';
session_start();

//var_dump(recupererDetailsCommande($_POST['idcommande']));

?>

<body>

  <?php
  include './header.php'; ?>

  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3">DETAILS DE COMMANDE</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row text-center">
        <div class="col">
          <table class="table">
            <h2 class="fw-bolder">Command <?= $_POST['numerocommande'] ?></h2>
            <h3>Date <?= $_POST['datecommande'] ?> - montant total <?= $_POST['prixcommande'] ?></h3>
            <thead>
              <tr>
                <th scope="col">NOM ARTICLE</th>
                <th scope="col">PRIX</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">MONTANT</th>
              </tr>
            </thead>
            <tbody>
              <?php
              showOrderDetails()
              ?>
            </tbody>
          </table>
          <a href="./account.php"> <button class="btn btn-info mt-5" style="color: white;" type="submit" name="validerCommand"> Retour Au Compte </button></a>
        </div>
      </div>
    </div>


  </main>

  <?php include './footer.php'; ?>
</body>

</html>