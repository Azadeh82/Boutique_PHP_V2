<!DOCTYPE html>
<html lang="fr">
<?php

include './functions.php';
include './head.php';
session_start();

//var_dump(recupererCommandes());

?>

<body>

  <?php
  include './header.php'; ?>

  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3">LES COMMANDES</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row mx-auto">
        <div class="col">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">numéro</th>
                <th scope="col">Date</th>
                <th scope="col">Montant</th>
                <th scope="col">Détail</th>
              </tr>
            </thead>
            <tbody>
            <?php
            showOrderList()
            ?>
            </tbody>
            </table>
        </div>
      </div>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>