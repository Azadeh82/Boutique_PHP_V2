<?php

// ** connexion à la base de données OK**

function getConnection()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8',
            'Azadeh',
            'Web.Pro.Job',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC)
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}


function getArticles()
{

    $db = getConnection();
    $query = $db->query("SELECT * FROM `articles`");
    return $query->fetchAll();
}



function showArticles($articles)
{

    foreach ($articles as $article) {

        echo "
        <div class=\"col-md-4\">
        <div class=\"card m-3 border-info border-5\">
        <img src=\"./photos/"  . $article['image'] . "\" class=\"card-img-top my-3 p-3\" alt=\"photo\">
        <div class=\"card-body\">
        <h5 class=\"card-title text-center fw-bolder fs-2\">" . $article['nom'] . "</h5>
        <h5 class=\"card-title text-center text-decoration-underline\"> Le prix : " . $article['prix'] . "</h5>
        <p class=\"card-text text-center fst-italic fs-5\">" . $article['description'] . "</p>
        <div class=\"row\">
            <div class=\"col-md-6\">
                <form action=\"product.php\" method=\"post\"> 
                    <input type=\"hidden\" name=\"articleid\" value=\"" . $article['id'] . "\">
                    <button type=\"submit\" class=\"btn btn-outline-light\">
                    <a title=\"Details produit\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"darkColor\" class=\"bi bi-eye\" viewBox=\"0 0 16 16\">
                    <path d=\"M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z\"/>
                    <path d=\"M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z\"/>
                    </svg></a>
                    </button>
                </form>
            </div>
            <div class=\"col-md-6\">
                <form action=\"panier.php\" method=\"post\"> 
                    <input type=\"hidden\" name=\"articleid\" value=\"" . $article['id'] . "\">
                    <button type=\"submit\" class=\"btn btn-outline-light\"> 
                    <a title=\"Ajouter au panier\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"darkColor\" class=\"bi bi-cart-plus\" viewBox=\"0 0 16 16\">
                    <path d=\"M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z\"/>
                    <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>
                  </svg></a>
                    </button>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>";
    }
}


function getArticleFromIdDatabase($id)
{
    $db = getConnection();
    $query = $db->prepare("SELECT * FROM `articles` WHERE id = ?");
    $query->execute([$id]);
    return $query->fetch();
}


function showArticle($article)
{

    echo "<div class=\"card col-md-5 mx-auto m-3 border-info border-5\">
    <img src=\"./photos/" . $article['image'] . "\" class=\"card-img-top my-3 \" alt=\"photo\">
    <div class=\"card-body\">
    <h5 class=\"card-title text-center fw-bolder fs-2\">" . $article['nom'] . "</h5>
    <h5 class=\"card-title text-center text-decoration-underline\"> Le prix : " . $article['prix'] . "</h5>
    <p class=\"card-text fst-italic fs-5\">" . $article['description_detaillee'] . "</p>
    <form action=\"panier.php\" method=\"post\"> 
        <input type=\"hidden\" name=\"articleid\" value=\"" . $article['id'] . "\">
        <button type=\"submit\" class=\"btn bg-info\" style=\"color: white;\" > Ajouter au panier 
        <a title=\"Ajouter au panier\" style=\"color: white;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"currentColor\" class=\"bi bi-cart-plus\" viewBox=\"0 0 16 16\">
        <path d=\"M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z\"/>
        <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>
        </svg></a>
        </button>
        </form>
    </div>
    </div>";
}

function getGammesFromDatabase()
{
    $db = getConnection();
    $query = $db->query("SELECT * FROM `gammes`");
    return $query->fetchAll();
}



function getArticlesByGamme($id_gamme)
{
    $db = getConnection();
    $query = $db->prepare("SELECT * FROM `articles` WHERE id_gamme = ?");
    $query->execute([$id_gamme]);
    return $query->fetchAll();
}



function showGammes()
{
    $gammes = getGammesFromDatabase();

    foreach ($gammes as $gamme) {
        echo "<h5 class=\"text-center fw-bolder fs-2\">" . $gamme['nom'] . "</h5>";

        $articles = getArticlesByGamme($gamme['id']);

        echo "<class=\"container\">
        <div class=\"row\">";
        showArticles($articles);
        echo "</div>
        </div>";
    }
}

// ***************** vérifier champs vides ****************

function checkEmptyFields()
{
    $champ_vide = FALSE;
    $message = "";

    foreach ($_POST as $champ => $saisie) {

        if (empty($saisie)) {
            $message .= "Vous n'avez pas rempli le champ " . $champ . "<br>";
            $champ_vide = TRUE;
        }
    }

    echo $message;
    return $champ_vide;
}

// ***************** vérifier langeur des champs ****************

//
function checkLength()
{
    $lengthProblem = false;

    if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) {
        echo "The lenght of name input is not correct<br>";
        $lengthProblem = true;
    }

    if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) {
        echo "The lenght of prenom input is not correct<br>";
        $lengthProblem = true;
    }

    if (strlen($_POST['email']) > 25 || strlen($_POST['email']) < 3) {
        echo "The lenght of mail input is not correct<br>";
        $lengthProblem = true;
    }

    if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 3) {
        echo "The lenght of address input is not correct<br>";
        $lengthProblem = true;
    }

    if (strlen($_POST['ville']) > 40 || strlen($_POST['ville']) < 3) {
        echo "The lenght of city input is not correct<br>";
        $lengthProblem = true;
    }

    if (strlen($_POST['code_postal']) !== 5) {
        echo "The lenght of postal code input is not correct<br>";
        $lengthProblem = true;
    }

    return $lengthProblem;
}

// ***************** vérifier si le password est sécurisé ****************


function checkPassword() {
   
    $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%?/&])(?=\S+$).{8,15}$^";
    return preg_match($regex, $_POST["mot_de_passe"]);
}




// ***************** valider inscription utilisateur ****************

function inscriptionUtilisateur()
{
    // 1) connexion à la base

    $db = getConnection();  

    // 2) vérif champs vides (créer autre fonction et l'appeler)

    if (checkEmptyFields()) { // cas où au moins un champ est vide
        return;

    } else

    // 3) si pas de champs vides : vérifier longueur des champs (via autre fonction)

    if (checkLength()) {  //cas où au moins un input n'a pas la bonne longueur
        return;

    } else

    // 4) si ok : vérifier si le password est sécurisé (via autre fonction)
    if (!checkPassword()) {
        echo "password is not securisé";

    } else {

    // 5) si ok : hasher le mot de passe (via password_hash) et inscrire l'utilisateur en base via une requête (dans la table clients)

    $password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $clients = $db->prepare("INSERT INTO clients (nom , prenom, email , mot_de_passe) VALUES (?, ?, ?, ?)");
    $clients->execute([$_POST['nom'] , $_POST['prenom'] , $_POST['email'] , $password]);

    $idClient = $db->lastInsertId();  // récupération de l'id du client créé

    // 6) insérer son adresse dans la table adresses via une autre requête

    $adresses = $db ->prepare("INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES (? , ?,  ?, ?)");
    $adresses->execute([$idClient, $_POST['adresse'] , $_POST['code_postal'] , $_POST['ville']]);

    //7) afficher un alert de confirmation

    echo "<script> alert(\"votre inscription a bien été enregistré !\");</script>";

    }
}

function connection () {

    
}









function addToCart($article)
{

    if (count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $articlePanier) {
            if ($articlePanier['id'] == $article['id']) {
                echo "<script> alert(\"Article déjà présent dans le panier !\");</script>";
                return;
            }
        }
    }

    $article["quantity"] = 1;
    $_SESSION['panier'][] = $article;
}


function showArticesPanier($pageName)
{

    foreach ($_SESSION['panier'] as $articlePanier) {

        echo "<div class=\"card border-info border-5 my-5 p-3\"><div class=\"row \">

                <div class=\"col-md-3 my-auto\">
                    <img src=\"" . $articlePanier['picture'] . "\" class=\"img-fluid rounded-start\" alt=\"photoArticle\" >
                </div>

                <div class=\"card col-md-4 my-auto\">
                    <div class=\"card-body\">
                    <h5 class=\"card-title fw-bolder fs-2\"> " . $articlePanier['name'] . "</h5>
                    <p class=\"card-text fst-italic fs-5\">" . $articlePanier['description'] . "</p>
                    </div>
                </div>

                <div class=\"card col-md-1 my-auto text-decoration-underline text-center border-0\">
                    <h5> " . $articlePanier['price'] . "</h5>
                </div>

                <div class= \"card col-md-3 my-auto border-0\">
                    <form action=\"" . $pageName . "\" method=\"post\">
                    <div class=\"col my-auto\">
                    <input id=\"numberpanier\" type=\"number\" min=\"1\" max=\"10\" name=\"newQuantity\" value=\"" . $articlePanier['quantity'] . "\">
                    <input type=\"hidden\" class=\"btn \" name=\"articlePanierid\" value=\"" . $articlePanier['id'] . "\">
                    <button type=\"submit\" class=\"btn bg-info mx-4\" style=\"color: white;\"> Modifier Quantite </button>
                    </div>  
                    </form>
                </div>

                <div class=\"card col-md-1 my-auto border-0\">
                    
                    <form action=\"" . $pageName . "\" method=\"post\"> 
                    <input type=\"hidden\" name=\"articleToDeleteId\" value=\"" . $articlePanier['id'] . "\">
                    <button type=\"submit\" class=\"btn\">
                    <a title=\"Suprimer Article\" style=\"color: white;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"BlackColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                    <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>
                    <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>
                    </svg></a>
                    </button>
                    </form>
                </div>
            </div>
        </div>";
    }
}


function changeQuantity($id, $quantity)
{

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        if ($id == $_SESSION['panier'][$i]['id']) {

            $_SESSION['panier'][$i]['quantity'] = $quantity;
        }
    }
}


function deleteArticle($id)
{

    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        if ($id == $_SESSION['panier'][$i]['id']) {

            array_splice($_SESSION['panier'], $i, 1);
        }
    }
}


function totalPurchases()
{

    $totalPurchases = 0;

    if (count($_SESSION['panier']) > 0) {

        foreach ($_SESSION['panier'] as $articlePanier) {

            $totalPurchases += $articlePanier['quantity'] * $articlePanier['price'];
        }
    }

    return $totalPurchases;
}


function showtotal()
{

    $totalPurchases = totalPurchases();

    echo "<div class=\"col-md-6 card mx-auto border-info border-2\">
    
                <div class=\"card-body bg-light\">
                Total des achats :" . " " . number_format($totalPurchases, 2, ',', ' ') . " " . "€" . " 
                </div>
    
        </div>";
}


function emptypanier($showMessage = true)
{

    $_SESSION['panier'] = [];

    if ($showMessage) {
        echo "<script> alert(\"Le panier a bien été vidé!\");</script>";
    }
}


function fraisPort()
{

    $frais = 0;

    if (count($_SESSION['panier']) > 0) {

        foreach ($_SESSION['panier'] as $articlePanier) {

            $frais += $articlePanier['quantity'] * 3;
        }
    }

    return $frais;
}


function showFrais()
{

    echo "<div class=\"col-md-6 card mx-auto border-info border-2\">
    
                <div class=\"card-body bg-light\">
                Frais de port (3 € par chaque frame) :" . " " . fraisPort() . " " . "€" . " 
                </div>
    
          </div>";
}


function FinalPayment()
{

    $FinalPayment = 0;

    return $FinalPayment = totalPurchases() + fraisPort();
}


function showFinalPayment()
{

    $FinalPayment = FinalPayment();

    echo "<div class=\"col-md-6 card mx-auto border-info border-2\">
    
                <div class=\"card-body bg-light\">
                TOTAL A PAYER :" . " " . number_format($FinalPayment, 2, ',', ' ') . " " . "€" . "  
                </div>
                
          </div>";
}

function showDate()
{
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');       // passage au fuseau horaire français

    $date = date("Y-m-d");                         // récupère date du jour (2021-12-23)

    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 2 days")));

    // date du jour + 2 jours  / transformation en temps Unix avec strtotime / strftime => formatage => dimanche 25 décembre 2021

}

function showDateDelivery()
{

    $date = date("Y-m-d");
    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 5 days")));
}
}