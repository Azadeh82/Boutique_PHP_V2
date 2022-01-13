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

    <h2 class="text-center fst-italic fs-1 my-3">ACCOUNT</h2>

    <p class="placeholder-wave">
      <span class="placeholder col-12 bg-info bg-opacity-75"></span>
    </p>



    <div class="container border border-4">
      <div class="row m-md-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Prenom</th>
              <th scope="col">Mail</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $_SESSION['infosClient']['nom'] ?></td>
              <td><?= $_SESSION['infosClient']['prenom'] ?></td>
              <td><?= $_SESSION['infosClient']['email'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row m-md-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Adresse</th>
              <th scope="col">Code Postal</th>
              <th scope="col">Ville</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?= $_SESSION['adresseClient']['adresse'] ?></td>
              <td><?= $_SESSION['adresseClient']['code_postal'] ?></td>
              <td><?= $_SESSION['adresseClient']['ville'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div class="container my-5">
      <div class="row text-center">

        <div class="d-flex flex-column col-md-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle mx-auto my-2" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
          <a href="./changeInformations.php"><button class="btn btn-info" style="color: white;"> Modifier Mes informations</button></a>
        </div>

        <div class="d-flex flex-column col-md-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-house-fill mx-auto my-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
          </svg>
          <a href="./changeAdresse.php"><button class="btn btn-info" style="color: white;"> Modifier Mon Adresse</button></a>
        </div>

        <div class="d-flex flex-column col-md-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-key-fill mx-auto my-2" viewBox="0 0 16 16">
            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
          </svg>
          <a href="./changePassword.php"><button class="btn btn-info" style="color: white;"> Modifier Mon mot de passe</button></a>
        </div>

        <div class="d-flex flex-column col-md-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bag-fill mx-auto my-2" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
          </svg>
          <a href="./commande.php"><button class="btn btn-info" style="color: white;"> Voir mes Commende</button></a>
        </div>

      </div>
    </div>

  </main>

  <?php include './footer.php'; ?>
</body>

</html>