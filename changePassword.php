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
  if (isset($_POST['modifPassword'])) {
  changePassword();
  }
  ?>
  <main>

    <p class="placeholder-glow">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <h2 class="text-center fst-italic fs-1 my-3">CHANGER MOT DE PASSE</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>

    <div class="container my-5">
      <div class="row mx-auto">
        <div class="col">
          <form method="POST" class="row g-3" action="./changePassword.php">
            <input type="hidden" name="modifPassword" value="changePassword">
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">Old Password</label>
              <input required type="password" class="form-control" name="oldPassword" >
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">New Password</label>
              <input required type="password" class="form-control" name="newPassword" >
            </div>
            <div class="col-12 text-center">
              <button class="btn btn-info" type="submit">modifier Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>