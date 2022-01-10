<!DOCTYPE html>
<html lang="fr">
<?php

include './functions.php';

include './head.php';


session_start();



if (!isset($_SESSION['panier'])) {

  $_SESSION['panier'] = [];
}


if (isset($_POST['commandeValidée'])) {

  emptypanier(false);
}


if (isset($_POST['inscription'])) {
  inscriptionUtilisateur();
}

if (isset($_POST['connexion'])) {
  //var_dump($_POST);        //  1) vérifier que tu transmets bien tes infos en POST
  connexionUtilisateur();
}

if (isset ($_POST['deconnexion'])) {
  deconnexion();
} 

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

    <div class="container text-center my-5">
      <div class="row mx-auto">

        <?php

        showArticles(getArticles());

        ?>

      </div>
    </div>


  </main>

  <?php include './footer.php'; ?>
</body>

</html>