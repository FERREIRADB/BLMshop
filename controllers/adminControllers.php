<?php

// if ($_SESSION['user'] != "admin@gmail.com") {
//     http_response_code(403);
//     header('Location: index.php');
// }
$query = "SELECT * FROM produits";
$statement = $pdo->prepare($query);
$statement->execute();
$produits = $statement->fetchAll(PDO::FETCH_OBJ);

function afficherArticle($produits)
{



    foreach ($produits as $index => $produit) {
        echo '
    <tr style="height: 45px;">
        <td>'.$produit->name.'</td>
        <td>$'.number_format($produit->price) .'</td>
        <td>'.$produit->puissance.' Ch</td>
        <td>'.$produit->couple.' Nm</td>
        <td>'.$produit->moteur.'</td>
        <td>'.$produit->consoVille.'L/100</td>
        <td>'.$produit->consoAuto.'L/100</td>
        <td> <a href="index.php?url=edit&id='.$produit->idProduits.'">Modifier le produit</a></td>
        <td> <a href="index.php?url=delete&id='.$produit->idProduits.'">Supprimer le produit</a> </td>
    </tr>';
    }
}
include "vue/admin.php";
