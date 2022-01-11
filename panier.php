<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
include './functions.php';
include './head.php';

// ajout au panier
if (isset($_POST['articleid'])) {

  $articlePanier = getArticleFromIdDatabase($_POST['articleid']);

  addToCart($articlePanier);
}

// ajout au quantite

if (isset($_POST['newQuantity'])) {

  changeQuantity($_POST['articlePanierid'], $_POST['newQuantity']);
}

// suprimer article
if (isset($_POST['articleToDeleteId'])) {

  //var_dump($_POST['articleToDeleteId']);

  deleteArticle($_POST['articleToDeleteId']);
}

// empty Panier 
if (isset($_POST['emptyPanier'])) {

  //var_dump($_POST['emptyPanier']);

  emptypanier();
}


?>


<body>
  <?php
  include './header.php'; ?>
  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3"> PANIER </h2>
    
    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container-fluid text-center">
      <div class="row mx-5">
        <div class="col">

          <?php
          // appel fonction afficher contenu panier
          showArticesPanier('panier.php')
          ?>

        </div>
      </div>
    </div>


    <div class="container-fluid text-center my-5">
      <div class="row">
        <div class="col border-success border-5">

          <?php
          //var_dump(totalPurchases());
          showtotal();
          ?>

        </div>
      </div>
    </div>


    <div class="container-fluid textcenter text-center">
      <div class="row">
        <div class="col">

          <form method="post" action="panier.php">
            <button class="btn btn-danger mt-5 mb-4" type="submit" name="emptyPanier">vider panier</button>
          </form>
  
          <?php
          if (count($_SESSION['panier']) > 0) {

          echo"<a href=\"./validation.php\"> <button class=\"btn btn-info mt-3 mb-5\" style=\"color: white;\"  
          type=\"submit\" name=\"validerCommand\"> valider la commande </button></a>";
          
          }
        ?>
        </div>
      </div>

    </div>
    </div>

  </main>
  <?php include './footer.php'; ?>
</body>

</html>