<!DOCTYPE html>
<html lang="fr">
<?php
include './functions.php';
include './head.php';
session_start();
?>

<body>

  <?php
  include './header.php';

  if (isset($_POST['modifInfo'])) {
    changeInfos();
  }
  ?>

  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3">CHANGER INFORMATION</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row mx-auto">
        <div class="col">
          <?php
          showInfosClient('changeInformations.php')
          ?>

        </div>
      </div>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>