<?php
require_once 'config.php';
function getDb()
{
    static $db;
    if ($db) {
        return $db;
    }
    return $db = new PDO("mysql:host=localhost;dbname=BLMshop", 'root', 'Super', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ));
}

//page produits 

function produitsDiv($param)
{

    foreach (getDb()->query($param) as $row) {
        echo
        '<a class="produits" href="./detail.php?idProduits=' . $row['idProduits'] . '">
            <div class="img">
                <img class="img" src="../img/' . $row['nameImage'] . '" alt="' . $row['name'] . '">
            </div>
            <div class="text">
                <h5 class="card-title">' . $row['name'] . '</h5>
                <h6 class="meilleureOffre">Meilleure offre</h6>
                <h4>' . number_format($row['price'], 0, '', '\'') . '$</h4>
            </div>
        </a>';
    }
}

//Page about

function createurs()
{

    $nomCreateurs = [
        "Lucas" => "Fonctionnalités php",
        "Bryan" => "Il fait des trucs tkt"
    ];

    foreach ($nomCreateurs as $key => $value) {
        echo ' <div class="card" style="height:23rem; width: 16rem; margin:15px;">
                    <img class="card-img-top" src="../img/pp' . $key . '.png" height="60%">
                <div class="card-body">
                    <h5 class="card-title">' . $key . '</h5>
                    <h7 style="color:gray;">' . $value . '</h7>
                </div>
              </div>';
    }
}

//page detail

function detailProduit()
{
    $id = filter_input(INPUT_GET, 'idProduits', FILTER_VALIDATE_INT);

    if ($id != "") {
        $statement = getDb()->prepare("SELECT name, nameImage, price FROM produits WHERE idProduits = ?;");
        $statement->execute([$id]);
        $detailProduit = $statement->fetch(PDO::FETCH_OBJ);
    }
    echo '  <div class="container">';
    echo '  <div class="cardDetail" style="border-top: none; border-radius:25px">';
    echo '    <div class="card-head">';
    echo '      <img src="../img/BLMshopLogo.png" alt="logo" class="card-logo">';
    echo '      <img src="../img/' . $detailProduit->nameImage . '" alt="Voiture" class="product-img" height="200" style="margin-left:70%; margin-top:2.5%;">';
    echo '      <div class="product-detail">';
    echo '        <h2>' . $detailProduit->name;
    echo '      </div>';
    echo '      <span class="back-text">';
    echo '              BLMshop';
    echo '            </span>';
    echo '    </div>';
    echo '    <div class="card-body">';
    echo '      <div class="product-desc">';
    echo '        <span class="product-title">';
    echo '            <b>' . $detailProduit->name . '</b>';
    echo '                <span class="badge">';
    echo '                  New';
    echo '                </span>';
    echo '        </span>';
    echo '        <span class="product-caption">';
    echo '              </span>';
    echo '        <span class="product-price" style="margin-top:10px; margin-left:20px">';
    echo '                USD<b>' . number_format($detailProduit->price) . '</b>';
    echo '              </span>';
    echo '              </span>';
    echo '        <span class="product-price" style="margin-top:10px; margin-left:160px">';

    if (isset($_SESSION['user'])) {
        echo '                <a style="color:white; font-size:23px;" href="panier.php?idProduits=' . $id . '"><b>Ajouter au panier</b></a>';
    } else {
        echo '<span style="color:red; font-size:19px;">Veuillez vous connecter pour ajouter ce produit au panier</span>';
    }
    echo '              </span>';

    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}

//page panier

function afficherPanier()
{   

    global $pdo;
    $total = 0;

    foreach ($pdo->query('SELECT * FROM produits JOIN panier ON panier.idProduits = produits.idProduits WHERE panier.idUser = ' . $_SESSION['user_id']) as $row) {
        $total += $row['price'];
    }
    echo '<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-title">
                    
                    <span style="font-size: 15px; margin:0;padding:0;" class="pull-right"><a class="pull-right" href="panier.php?idUser=' . $_SESSION['user_id'] . '"> Vider mon panier</a></span>
                        <span style="font-size: 15px;margin:10px" class="pull-right">Total : $' . number_format($total, 0, '', '\'') . '</span>
                       
                        <img class="petit_panier" src="../img/panier.png" alt="panier" style="width: 30px;">
                    </div>';
    foreach ($pdo->query('SELECT * FROM produits JOIN panier ON panier.idProduits = produits.idProduits WHERE panier.idUser = ' . $_SESSION['user_id']) as $row) {
        echo '<div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table shoping-cart-table">
                                                <tbody>
                                                    <tr>
                                                        <td width="90">
                                                            <div>
                                                            <img class="card-img-top" src="../img/' . $row['nameImage'] . '" alt="' . $row['name'] . '">
                                                            </div>
                                                        </td>
                                                        <td class="desc">
                                                            <h3>
                                                            <a href="detail.php?idProduits='. $row['idProduits'] .'" class="text-navy">
                                                            ' . $row['name'] . '
                                                            </a>
                                                            <div class="m-t-sm">
                                                                <a href="panier.php?id=' . $row['idProduits'] . '" class="text-muted"><i class="fa fa-trash"></i> Supprimer item</a>';

        echo '                                                    </div>
                                                        </td>
                                                        <td>
                                                            <h4>
                                                                $' . number_format($row['price'], 0, '', '\'') . '
                                                            </h4>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   
                               ';
    }
    echo '
    <div class="ibox-content">
    <a href="paiement.php">
        <button class="btn pull-right" style="font-size:15px; color:rgba(0, 196, 0, 0.75)">
            <i class="fa fa fa-shopping-cart">
            </i> 
            Régler le paiement
        </button>
    </a>
    <a href="produits.php">
    <button class="btn btn-white" style="font-size:15px;"><i class="fa fa-arrow-left"></i> Continuer les achats</button>
    </a>
    </div>
   
</div>
   
    </div>
    </div>
</div>
</div>';
}
function viderPanier($idUser)
{
    if ($idUser != "") {
        $statement = getDb()->prepare("DELETE FROM `panier` WHERE idUser = ?");
        $param = [$idUser];
        $statement->execute($param);
        return $statement;
    }
}

function deleteArticlePanier($id)
{
    if ($id != "") {
        $statement = getDb()->prepare("DELETE FROM `panier` WHERE idProduits = ?");
        $param = [$id];
        $statement->execute($param);
        return $statement;
    }
}
