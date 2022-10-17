<?php include '../modele/config.php'; 
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
    echo '      <img src="../img/logo/BLMshopLogo.png" alt="logo" class="card-logo">';
    echo '      <img src="../img/produits/' . $detailProduit->nameImage . '" alt="Voiture" class="product-img" height="200" style="margin-left:70%; margin-top:2.5%;">';
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
    echo '        <span class="product-price" style="margin-top:10px; margin-left:12%">';

    if (isset($_SESSION['user'])) {
        echo '                <a style="color:white; font-size:23px; text-decoration:none;" href="panierControllers.php?idProduits=' . $id . '"><b>Ajouter au panier</b></a>';
    } else {
        echo '<span style="color:red; font-size:19px;">Veuillez vous connecter pour ajouter ce produit au panier</span>';
    }
    echo '              </span>';

    echo '      </div>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}
include "../vue/detail.php";

?>







        