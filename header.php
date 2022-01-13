<?php
include './head.php'
?>


<header>
  
  <nav class="navbar navbar-expand-lg bg-info bg-opacity-50 my-1">
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
                <input type=\"hidden\" name=\"deconnexion\" value=\"\">
                <button type=\"submit\" class=\"btn\">
                <a title = \"Déconnexion\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"currentColor\" class=\"bi bi-power\" viewBox=\"0 0 16 16\">
                <path d=\"M7.5 1v7h1V1h-1z\"/>
                <path d=\"M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z\"/></a>
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