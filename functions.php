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

//***********afficher article aacueil******** */
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
        <h5 class=\"card-title text-center text-decoration-underline fw-bolder \"> Le prix : " . $article['prix'] . " " . "€" . "</h5>
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

//************afficher tous les details un produit *********** */
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
    <h5 class=\"card-title text-center text-decoration-underline fw-bolder\"> Le prix : " . $article['prix'] . " " . "€" . "</h5>
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

//*************************afficher page gamme ****************** */
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
        echo "<h5 class=\"text-center fw-bolder fs-2 my-5  text-info\">" . $gamme['nom'] . "</h5>";

        $articles = getArticlesByGamme($gamme['id']);

        echo "<class=\"container\">
        <div class=\"row\">";
        showArticles($articles);
        echo "</div>
        </div>";
    }
}


//++++++++++++++++++++++++++++++++++++++++++++++++++inscription et connexion  ++++++++++++++++++++++++++++++++++++++++++

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

function checkLength()
{
    $lengthProblem = false;

    if (isset($_POST['nom'])) {
        if (strlen($_POST['nom']) > 25 || strlen($_POST['nom']) < 3) {
            echo "The lenght of name input is not correct<br>";
            $lengthProblem = true;
        }
    }

    if (isset($_POST['prenom'])) {
        if (strlen($_POST['prenom']) > 25 || strlen($_POST['prenom']) < 3) {
            echo "The lenght of prenom input is not correct<br>";
            $lengthProblem = true;
        }
    }

    if (isset($_POST['email'])) {
        if (strlen($_POST['email']) > 40 || strlen($_POST['email']) < 3) {
            echo "The lenght of mail input is not correct<br>";
            $lengthProblem = true;
        }
    }

    if (isset($_POST['adresse'])) {
        if (strlen($_POST['adresse']) > 40 || strlen($_POST['adresse']) < 3) {
            echo "The lenght of address input is not correct<br>";
            $lengthProblem = true;
        }
    }

    if (isset($_POST['ville'])) {
        if (strlen($_POST['ville']) > 40 || strlen($_POST['ville']) < 3) {
            echo "The lenght of city input is not correct<br>";
            $lengthProblem = true;
        }
    }

    if (isset($_POST['code_postal'])) {
        if (strlen($_POST['code_postal']) !== 5) {
            echo "The lenght of postal code input is not correct<br>";
            $lengthProblem = true;
        }
    }

    return $lengthProblem;
}

// ***************** vérifier caracter de nom et prenom  ****************



// ***************** vérifier si le password est sécurisé ****************


function checkPassword($password)
{
    $regex = "^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@$!%?/&])(?=\S+$).{8,15}$^";
    return preg_match($regex, $password);
}




// ***************** valider inscription utilisateur ****************

function inscriptionUtilisateur()
{
    // 1) connexion à la base

    $db = getConnection();

    // 2) vérif champs vides (créer autre fonction et l'appeler)

    if (checkEmptyFields()) { // cas où au moins un champ est vide
        return;
    } else {

        // 3) si pas de champs vides : vérifier longueur des champs (via autre fonction)

        if (checkLength()) {  //cas où au moins un input n'a pas la bonne longueur
            return;
        } else {

            // 4) si ok : vérifier si le password est sécurisé (via autre fonction)
            if (!checkPassword($_POST['mot_de_passe'])) {
                echo "password is not securisé";
            } else {

                // 5) si ok : hasher le mot de passe (via password_hash) 

                $password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

                //inscrire l'utilisateur en base via une requête (dans la table clients)

                $clients = $db->prepare("INSERT INTO clients (nom , prenom, email , mot_de_passe) VALUES (?, ?, ?, ?)");
                $clients->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $password]);

                $idClient = $db->lastInsertId();  // récupération de l'id du client créé

                // 6) insérer son adresse dans la table adresses via une autre requête

                $adresses = $db->prepare("INSERT INTO adresses (id_client, adresse, code_postal, ville) VALUES (? , ?,  ?, ?)");
                $adresses->execute([$idClient, $_POST['adresse'], $_POST['code_postal'], $_POST['ville']]);

                //7) afficher un alert de confirmation

                echo "<script> alert(\"votre inscription a bien été enregistré !\");</script>";
            }
        }
    }
}

//*******************conxtion de client ******************** */

function recupereClient() // recuperer client 
{
    $db = getConnection();
    $recupereClient = $db->prepare("SELECT * FROM `clients` WHERE email = ?");
    $recupereClient->execute([$_POST['email']]);
    return $recupereClient->fetch(); //on retourne le résultat : les infos du client;
}


function checkPasswordConnexion($password)
{
    return password_verify($_POST['mot_de_passe'], $password);
}

//************************ recupere les information de adresse client **************** */
function getAdressesClient()
{
    $db = getConnection();
    $adresses = $db->prepare("SELECT * FROM `adresses` WHERE id_client = ?");
    $adresses->execute([$_SESSION['infosClient']['id']]);
    return $adresses->fetch();
}

// ****************** connection de utilisateur ***********************

function connexionUtilisateur()
{

    // 1) connexion à la base
    $db = getConnection();


    // 2) vérif champs vides (créer autre fonction et l'appeler)
    if (checkEmptyFields()) { // cas où au moins un champ est vide
        return;
    } else {

        //   3) vérifier si l'email existe => requête qui va chercher les infos de la table client là où il y a l'email donné

        $infosClient = recupereClient();

        if (!$infosClient) { // si le client existe, cette fonction renvoie un résultat => évalué à true
            // si il n'existe pas => cette fonction ne renvoie rien => évalué à false
            // si rien n'est renvoyé => message d'erreur et return => on sort de la fonction.
            //  4) si cela ne retourne rien => mail pas bon => erreur
            echo "<script> alert(\"votre adreese mail n'est pas bon !\");</script>";
        } else {
            //   5) si ça retourne des infos => comparer mdp saisi avec celui présent dans les infos récupérés
            //   6) si mdp correct => on connecte l'utilisateur et on stocke ses infos dans la session
            if (checkPasswordConnexion($infosClient['mot_de_passe'])) {
                $_SESSION['infosClient'] = $infosClient;
                $adressesClient = getAdressesClient();
                $_SESSION['adresseClient'] = $adressesClient;
                echo "<script>alert('Vous êtes connecté !')</script>";
                echo "Bonjour " . $infosClient['prenom'] . $infosClient['nom'] . "<br> vous êtes bien connecté à votre compte. ";
            } else {
                //   7) si mdp pas bon => on renvoie une erreur
                echo "<script> alert(\"votre mot de passe n'est pas bon !\");</script>";
            }
        }
    }
}


//************************* deconnecter client à son compte ************/

function deconnexion()
{
    $_SESSION = [];
    echo "<script>alert('Vous êtes Déconnecté !')</script>";
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++changement des infos et adress  et password++++++++++++++++++++++++++++

// **************** Changer des information de clients **********************//

function changeInfos()
{
    if (checkEmptyFields()) {
        return;
    } else {
        if (checkLength()) {
            return;
        } else {
            $db = getConnection();

            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $email = strip_tags($_POST['email']);

            $query = $db->prepare("UPDATE clients SET nom = :nom , prenom = :prenom , email = :email WHERE id = :id");
            $query->execute(array(
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "id" => $_SESSION['infosClient']['id']
            ));

            $_SESSION['infosClient']['nom'] = $nom;
            $_SESSION['infosClient']['prenom'] = $prenom;
            $_SESSION['infosClient']['email'] = $email;

            echo "<script>alert('Changements validés !')</script>";
        }
    }
}

// **************** Changer Adresse de clients **********************//

function changeAdresse()
{

    if (checkEmptyFields()) {
        return;
    } else {
        if (checkLength()) {
            return;
        } else {
            $db = getConnection();

            $adresse = strip_tags($_POST['adresse']);
            $code_postal = strip_tags($_POST['code_postal']);
            $ville = strip_tags($_POST['ville']);

            $query = $db->prepare("UPDATE adresses SET adresse = :adresse , code_postal = :code_postal , ville = :ville WHERE id_client = :id_client");
            $query->execute(array(
                "adresse" => $adresse,
                "code_postal" => $code_postal,
                "ville" => $ville,
                "id_client" => $_SESSION['infosClient']['id']
            ));

            $_SESSION['adresseClient']['adresse'] = $adresse;
            $_SESSION['adresseClient']['code_postal'] = $code_postal;
            $_SESSION['adresseClient']['ville'] = $ville;

            echo "<script>alert('Changements validés !')</script>";
        }
    }
}

// **************** Changer Adresse de clients **********************//

// 0) créer page updatePassword.php : formulaire avec actuel + nouveau mdp
// 1)  // on vérifie d'abord si il n'y a pas de champs vides. Si oui, message d'erreur et fin de la fonction.
// 2) // on récupère le mdp actuel en base (hashé)
// 3)   // on vérifie le mdp actuel saisi (en clair) par rapport à l'actuel en base (hashé) avec password_verify()
// 4) // si mdp actuel saisi = mdp actuel en base, on passe à la suite. Sinon fin de la fonction et message d'erreur
// 5)   // on nettoie le nouveau mdp choisi avec strip_tags() (facultatif)
// 6)    // on vérifie que le nouveau mdp choisi respecte la regex (avec fonction déjà créée). Si pas bon => sortie et message d'erreur
// 7)     //si nouveau mdp ok => on le sauvegarde en le hâchant avec password_hash()

function changePassword()
{
    if (checkEmptyFields()) {
        return;
    } else {
        $oldPasswordDatabas = $_SESSION['infosClient']['mot_de_passe'];
        if (password_verify($_POST['oldPassword'], $oldPasswordDatabas)) {
            $newPassword = strip_tags($_POST['newPassword']);
            if (checkPassword($newPassword)) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $_SESSION['infosClient']['mot_de_passe'] = $newPassword;
                $db = getConnection();
                $query = $db->prepare("UPDATE clients SET mot_de_passe = ? WHERE id = ?");
                // $query = $db->prepare("UPDATE clients SET mot_de_passe = :password WHERE id = :id")
                $query->execute(
                    array(
                        $newPassword,
                        $_SESSION['infosClient']['id']
                    )
                );
                echo "<script> alert(\"new password saved!\");</script>";
            } else {
                echo "<div class=\"container w-50 text-center p-3 mt-2 bg-danger\"> Attention : sécurité du mot de passe insuffisante !</div>";
            }
        } else {
            echo "votre mot de passe actuel n'est pas correct!";
        }
    }
}


//++++++++++++++++++++++++++++++++++++++Account de client +++++++++++++++++++++++++++++++++++++
//****************infos client **************/
function showInfosClient($pageName)
{
    echo "<div class=\"col-md-6 mx-auto border border-info border-2\">
    <form method=\"POST\" class=\"row g-3\" action=\"" . $pageName . "\">
    <input type=\"hidden\" name=\"modifInfo\" value=\"changeInformation\">
    <div class=\"col-md-4 mx-auto  my-3\">
      <label for=\"validationCustom01\" class=\"form-label\">Nom</label>
      <input required type=\"text\" class=\"form-control text-center\" name=\"nom\" value=\"" . $_SESSION['infosClient']['nom'] . "\">
    </div>
    <div class=\"col-md-4 mx-auto my-3\">
      <label for=\"validationCustom02\" class=\"form-label\">Prenom</label>
      <input required type=\"text\" class=\"form-control text-center\" name=\"prenom\" value=\"" . $_SESSION['infosClient']['prenom'] . "\">
    </div>
    <div class=\"col-md-6 mx-auto my-3\">
      <label for=\"validationCustom03\" class=\"form-label\">Mail</label>
      <input required type=\"email\" class=\"form-control text-center\" name=\"email\" value=\"" . $_SESSION['infosClient']['email'] . "\">
    </div>
    <div class=\"col-12 text-center mx-auto\">
      <button class=\"btn btn-info my-3\" type=\"submit\" style=\"color: white;\">modifier mes infomations</button>
    </div>
  </form></div>";
}
//********************Adress client ************* */
function showAdresseClient($pageName)
{
    echo "<div class=\"col-md-6 mx-auto border border-info border-2\">
            <form method=\"POST\" class=\"row g-3\" action=\"" . $pageName . "\">
            <input type=\"hidden\" name=\"modifAdresse\" value=\"changeAdresse\">
            <div class=\"col-md-6  mx-auto  my-3\">
              <label for=\"validationCustom03\" class=\"form-label\">Adresse</label>
              <input required type=\"text\" class=\"form-control text-center\" name=\"adresse\" value=\"" . $_SESSION['adresseClient']['adresse'] . "\">
            </div>
            <div class=\"col-md-3 mx-auto  my-3\">
              <label for=\"validationCustom05\" class=\"form-label\">Code postal</label>
              <input required type=\"text\" class=\"form-control text-center\" name=\"code_postal\" value=\"" . $_SESSION['adresseClient']['code_postal'] . "\">
            </div>
            <div class=\"col-md-3 mx-auto  my-3\">
              <label for=\"validationCustom05\" class=\"form-label\">Ville</label>
              <input required type=\"text\" class=\"form-control text-center\" name=\"ville\" value=\"" . $_SESSION['adresseClient']['ville'] . "\">
            </div>
            <div class=\"col-12 text-center\">
              <button class=\"btn btn-info my-3\" type=\"submit\"  style=\"color: white;\">modifier mon adresse</button>
            </div>
          </form></div>";
}

// ++++++++++++++++++++++++++++++++PANIER++++++++++++++++++++++++++++
//**********************ajouter article 
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

// ****************supprimer article 
function deleteArticle($id)
{
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if ($id == $_SESSION['panier'][$i]['id']) {
            array_splice($_SESSION['panier'], $i, 1);
        }
    }
}
//*****************supprimer tous les article de panier 
function emptypanier($showMessage = true)
{
    $_SESSION['panier'] = [];
    if ($showMessage) {
        echo "<script> alert(\"Le panier a bien été vidé!\");</script>";
    }
}


//***********************show article */
function showArticesPanier($pageName)
{
    foreach ($_SESSION['panier'] as $articlePanier) {
        echo "<div class=\"card border-info border-5 my-5 p-3\"><div class=\"row \">
                <div class=\"col-md-3 my-auto\">
                    <img src=\"./photos/" . $articlePanier['image'] . "\" class=\"img-fluid rounded-start\" alt=\"photoArticle\" >
                </div>
                <div class=\"card col-md-4 my-auto\">
                    <div class=\"card-body\">
                    <h5 class=\"card-title fw-bolder fs-2\"> " . $articlePanier['nom'] . "</h5>
                    <p class=\"card-text fst-italic fs-5\">" . $articlePanier['description'] . "</p>
                    </div>
                </div>
                <div class=\"card col-md-1 my-auto text-decoration-underline text-center border-0\">
                    <h5> " . $articlePanier['prix'] . " " . "€" . "</h5>
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
//++++++++++++++++++++++++++++++++++++++++++++++++++++++ORDER++++++++++++++++++++++++++++++++++++++++

//*********************** commandes *********************************** */
// 1) connexion à la base
// 2) on formule la requête qui va insérer la commande (prepare + requête) : syntaxe avec les variables (:variable)
// 3) on l'exécute en lui passant les bonnes infos dans un tableau associatif
// - id client : il est dans la session
// - numéro : à générer avec la fonction rand (7 chiffres au hasard). Il doit faire exactement 7 chiffres.
// - date : à récupérer avec la fonction date() de php. il faut une précision à la seconde.
// - prix : on le récupère avec la fonction qui calcule le prix total
// Ensuite : sauvegarde du détail de la commande (dans la même fonction, à la suite)
// 1) on récupère l'id de la commande qu'on vient de créer
// 2) on prépare la requête d'insertion, qui va insérer les infos suivante dans la table "commande_articles"
// 3) on boucle sur le panier, et pour chaque article, on exécute la requête avec les infos suivantes :
// - id_commande (toujours le même, qu'on a récupéré en 1
// - id_article (celui de l'article en question)
// - quantité (idem)
function saveOrder()
{
    $db = getConnection();
    $query = $db->prepare("INSERT INTO commandes (id_client , numero , date_commande , prix) VALUES (:id_client , :numero , :date_commande , :prix)");
    $query->execute(
        array(
            "id_client" => $_SESSION['infosClient']['id'],
            "numero" => rand(1000000, 9999999),
            "date_commande" => date("Y-m-d h:i:s"),
            "prix" => FinalPayment()
        )
    );

    $idcommande = $db->lastInsertId();
    $query = $db->prepare("INSERT INTO commande_articles (id_commande , id_article , quantite) VALUES (:id_commande , :id_article , :quantite)");

    foreach ($_SESSION['panier'] as $articlePanier) {
        $query->execute(
            array(
                "id_commande" => $idcommande,
                "id_article" => $articlePanier['id'],
                "quantite" => $articlePanier['quantity']
            )
        );
    }
}

//******************************Afficher détail des commandes******************************/

// 1) transmettre id de commande en post avec un input hidden, via un petit formulaire autour du bouton "détails commande"
// 2) récupérer cet id sur page detailsCommande.php (tester qu'on le reçoit)
// 3) créer une fonction qui prend cet id en paramètre, et qui fait une requête pour récupérer dans commande_articles toutes les lignes associées à cette commande ET les infos des articles correspondants. On fait cela en utilisant un INNER JOIN (jointure entre 2 tables)

function recupererCommandes()
{
    $db = getConnection();
    $commandes = $db->prepare("SELECT * FROM `commandes` WHERE id_client = ?");
    $commandes->execute([$_SESSION['infosClient']['id']]);
    return $commandes->fetchAll();
}

function showOrderList()
{
    $commandes = recupererCommandes();
    if (count($commandes) > 0) {
        foreach ($commandes as $commande) {
            echo "
        <tr>
        <th scope=\"row\">" . $commande['numero'] . "</th>
        <td>" . $commande['date_commande'] . "</td>
        <td>" . $commande['prix'] . " " . "€" . "</td>
        <td><form action=\"detailscommande.php\" method=\"post\"> 
            <input type=\"hidden\" name=\"idcommande\" value=\"" . $commande['id'] . "\">
            <input type=\"hidden\" name=\"numerocommande\" value=\"" . $commande['numero'] . "\">
            <input type=\"hidden\" name=\"datecommande\" value=\"" . $commande['date_commande'] . "\">
            <input type=\"hidden\" name=\"prixcommande\" value=\"" . $commande['prix'] . " " . "€" . "\">
            <button type=\"submit\" class=\"btn btn-outline-light\">
            <a title=\"Details produit\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"35\" height=\"35\" fill=\"darkColor\" class=\"bi bi-eye\" viewBox=\"0 0 16 16\">
            <path d=\"M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z\"/>
            <path d=\"M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z\"/>
            </svg></a>
            </button>
        </form></td>
      </tr>";
        }
    }
}

//***********************afficher tous les details un commande **************** */
function recupererDetailsCommande($commandeid)
{
    $db = getConnection();
    $query = $db->prepare("SELECT * FROM commande_articles AS ca INNER JOIN articles AS a ON ca.id_article = a.id WHERE id_commande = ?");
    $query->execute(array($commandeid));
    return $query->fetchAll();
}

function showOrderDetails()
{
    $commande = recupererDetailsCommande($_POST['idcommande']);
    $quantity = 0;
    foreach ($commande as $article) {
        $quantity += $article['quantite'];
        echo "
        <th scope=\"row\">" . $article['nom'] . "</th>
        <td>" . $article['prix'] . " " . "€" .  "</td>
        <td>" . $article['quantite'] . "</td>
        <td>" . $article['quantite'] * $article['prix'] . " " . "€" . "</td>
      </tr>";
    }
    echo " <tr>
    <td >frais de Port</td>
    <td >3 €</td>
    <td >" . $quantity . "</td>
    <td >" . $quantity * 3 . " " . "€" . "</td>
  </tr>";
}

//+++++++++++++++++++++++++++++++++++++++++++++ QUANTITY ET PAYMENT +++++++++++++++++++++++
//**************changer quantity 
function changeQuantity($id, $quantity)
{
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if ($id == $_SESSION['panier'][$i]['id']) {
            $_SESSION['panier'][$i]['quantity'] = $quantity;
        }
    }
}
//******************totale de chaque article  */
function totalPurchases()
{
    $totalPurchases = 0;
    if (count($_SESSION['panier']) > 0) {
        foreach ($_SESSION['panier'] as $articlePanier) {
            $totalPurchases += $articlePanier['quantity'] * $articlePanier['prix'];
        }
    }
    return $totalPurchases;
}

//*******************total des article panier  */
function showtotal()
{

    $totalPurchases = totalPurchases();
    echo "<div class=\"col-md-6 card mx-auto border-info border-2\">
                <div class=\"card-body bg-light\">
                Total des achats :" . " " . number_format($totalPurchases, 2, ',', ' ') . " " . "€" . " 
                </div></div>";
}
//******************** frais de port  */
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

//*************total payment avec frais de port  */
function FinalPayment()
{
    return totalPurchases() + fraisPort();
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
//+++++++++++++++++++++++++++++++++++++++++++++++++++++DATE++++++++++++++++++++++++++++++
//*************Date de expedité   */
function showDate()
{
    setlocale(LC_TIME, 'fr_FR.utf8', 'fra');       // passage au fuseau horaire français

    $date = date("Y-m-d");                         // récupère date du jour (2021-12-23)

    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 2 days")));

    // date du jour + 2 jours  / transformation en temps Unix avec strtotime / strftime => formatage => dimanche 25 décembre 2021
}
//***************date livraison  */
function showDateDelivery()
{
    $date = date("Y-m-d");
    echo utf8_encode(strftime("%A %d %B %Y", strtotime($date . " + 5 days")));
}
