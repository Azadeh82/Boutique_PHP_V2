<?php
include './head.php'
?>


<header>
  
  <nav class="navbar navbar-expand-lg bg-info bg-opacity-50 my-2">
    <div class="container-fluid">
      <a href="./index.php"><img src="./photos/logo.png" class="logo mx-md-5 img-fluid" alt="logo" style="width: 4rem;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active fs-3 mx-2" aria-current="page" style="color: white;" href="./index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-3 mx-3" style="color: white;" href="./gamme.php">Gammes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-3 mx-3" style="color: white;" href="./panier.php">Panier</a>
          </li>
        
          <?php 
          if (!isset ($_SESSION['infosClient'])) {
           echo" <li class=\"nav-item\">
            <a class=\"nav-link active fs-3 mx-3\" style=\"color: white;\" href=\"./inscription.php\">Inscription</a>
          </li>";
            echo "<li class=\"nav-item\">
              <a class=\"nav-link active fs-3 mx-3\" style=\"color: white;\" href=\"./connexion.php\">connexion</a>
            </li>";
          } else {

              echo "<li class=\"nav-item\">
                <a class=\"nav-link active fs-3 mx-3\" style=\"color: white;\" href=\"./account.php\">Mon Compte</a>
              </li>";
 
              echo "<li class=\"nav-item nav-link active fs-3 mx-3\">
              <form method=\"POST\" action=\"./index.php\">
                <input type=\"hidden\" name=\"deconnexion\">
                <input style=\"border: none; color: white;\" class=\"bg-info bg-opacity-10\" type=\"submit\" value=\"Déconnexion\">
              </form>
              </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  
</header>

<section class="container-fluid" id="imgheader"></section>