<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php

if(!$_SESSION['connected']){
    http_response_code(403);
    echo '<meta http-equiv="refresh" content="0;url=index.php?url=index.php?url=accueil">';
}
if ($_SESSION['user'] != "admin@gmail.com" || !$_SESSION['connected']) {
     http_response_code(403);
     echo '<meta http-equiv="refresh" content="0;url=index.php?url=index.php?url=accueil">';

 }
//recupere en objet tous les produits
$query = "SELECT * FROM produits";
$statement = $pdo->prepare($query);
$statement->execute();
$produits = $statement->fetchAll(PDO::FETCH_OBJ);

//function qui affiche tous les produits de la bdd
function afficherArticle($produits)
{
    //foreach qui parcours l'objet oû est stocker tous les produits et les affiche en html
    foreach ($produits as $index => $produit) {
        echo '
    <tr style="height: 45px;">
        <td>' . $produit->name . '</td>
        <td>$' . number_format($produit->price) . '</td>
        <td>' . $produit->puissance . ' Ch</td>
        <td>' . $produit->couple . ' Nm</td>
        <td>' . $produit->moteur . '</td>
        <td>' . $produit->consoVille . 'L/100</td>
        <td>' . $produit->consoAuto . 'L/100</td>
        <td> <a href="index.php?url=edit&id=' . $produit->idProduits . '">Modifier le produit</a></td>
        <td> <a href="index.php?url=delete&id=' . $produit->idProduits . '">Supprimer le produit</a> </td>
    </tr>';
    }
}
include "vue/admin.php";
