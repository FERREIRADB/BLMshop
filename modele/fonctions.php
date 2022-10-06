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
    echo '<div class="container-fluid d-flex justify-content-center"><div class="row mt-5">';
    foreach (getDb()->query($param) as $row) {
        echo '
            <div class="col-sm-4">
                <div class="card">
                    <img src="../img/produits/' . $row['nameImage'] . '" class="img-produits">
                    <div class="card-body pt-0 px-0">
                        <div class="d-flex flex-row justify-content-between mb-0 px-3">
                            <small class="text-muted mt-1">STARTING AT</small>
                            <h6>&dollar;' . number_format($row['price'], 0, '', '\'') . '&ast;</h6>
                        </div>
                        <hr class="mt-2 mx-3">
                        <div class="d-flex flex-row justify-content-between px-3 pb-4">
                            <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">L/100KM&ast;</small></div>
                            <div class="d-flex flex-column">
                                <h5 class="mb-0">8.5/7.1</h5><small class="text-muted text-right">(city/Hwy)</small>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between p-3 mid">
                            <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                <div class="d-flex flex-row"><img src="https://imgur.com/iPtsG7I.png" width="35px" height="25px">
                                    <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                                <div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png">
                                    <h6 class="ml-1">135 hp&ast;</h6>
                                </div>
                            </div>
                        </div>
                        <a href="./detail.php?idProduits=' . $row['idProduits'] . '"><div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block"><small>BUILD & PRICE</small></button></div></a>
                    </div>
                </div>
            </div>';
    }
    echo '</div></div>';
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
        echo '                <a style="color:white; font-size:23px; text-decoration:none;" href="panier.php?idProduits=' . $id . '"><b>Ajouter au panier</b></a>';
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
                                                            <a href="detail.php?idProduits=' . $row['idProduits'] . '" class="text-navy">
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






function categorie()
{
    global $pdo;
    foreach ($pdo->query('SELECT * FROM categories') as $row) {
        echo '<a  href="produits.php?data=' . $row['nameCategories'] . '">' . $row['nameCategories'] . '</a>';
    }
}

function ProduitAccueil($param)
{
    foreach (getDb()->query($param) as $row) {
        
}
}

function produitsAlea()
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM produits");
    $statement->execute();
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    $tableauProduitsAelat = [];
    //$arrayName = array('' => , );
    for ($i = 0; $i < 1; $i++) {
        $chiffrealea = rand(0, 11);

        foreach ($tableauProduitsAelat as $key => $value) {
            if (in_array($row[$chiffrealea]['lastName'], $tableauProduitsAelat)) {
                $chiffrealea = rand(0, 14);
            }
        }
        echo '
        <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Product -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-1" class="single-product">
                        <div class="part-1">
                            <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-old-price">$79.99</h4>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                </div>
                <!-- Single Product -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-2" class="single-product">
                        <div class="part-1">
                            <span class="discount">15% off</span>
                            <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                </div>
                <!-- Single Product -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-3" class="single-product">
                        <div class="part-1">
                            <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-old-price">$79.99</h4>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                </div>
                <!-- Single Product -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-4" class="single-product">
                        <div class="part-1">
                            <span class="new">new</span>
                            <ul>
                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';    
        $tableauProduitsAelat[] = $row[$chiffrealea]['lastName'];
    }
}
