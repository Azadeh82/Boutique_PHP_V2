<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
include './functions.php';
include './head.php'; ?>

<body>
  <?php
  include './header.php'; ?>

  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3"> Detaills produit </h2>
    
    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container text-center my-5">
      <div class="row">

        <?php

        $article = getArticleFromIdDatabase($_POST['articleid']);
        showArticle($article);

        ?>

      </div>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>