<?php

include_once('../modele/fonctions.php');

// if ($_SESSION['user'] != "admin@gmail.com") {
//     http_response_code(403);
//     header('Location: index.php');
// }

$query = "SELECT * FROM produits";
$statement = $pdo->prepare($query);
$statement->execute();
$produits = $statement->fetchAll(PDO::FETCH_OBJ);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    h1 {
        text-align: center;
        margin: 10px;
        padding: 10px;
    }

    
    .produits {
        margin: auto;
        width: 80%;
        padding: 10px;
    }

    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }


    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #1127e9;
        color: white;
    }
</style>

<body>
    <?php require_once 'include/navbar.php' ?>
    <h1>Admin</h1>
    <div class="produits">
        <table id="customers" style="margin-left: 25px; border-collapse: collapse;">
            <tr style="margin: 10px;">
                <th>Name</th>
                <th>Price</th>
                <th>Puissance</th>
                <th>Couple</th>
                <th>Moteur</th>
                <th>Consomation en Ville</th>
                <th>Consomation sur autoroute</th>
                <th>Type produit</th>
                <th>Modifier</th>
                <th>Supprimer</th>
                
            </tr>
            <?php foreach ($produits as $index => $produit) : ?>
                <tr style="height: 45px;">
                    <td><?= $produit->name ?></td>
                    <td>$<?= number_format($produit->price) ?></td>
                    <td><?= $produit->puissance ?> Ch</td>
                    <td><?= $produit->couple ?> Nm</td>
                    <td><?= $produit->moteur ?></td>
                    <td><?= $produit->consoVille ?> L/100</td>
                    <td><?= $produit->consoAuto ?> L/100</td>
                    <td><?= $produit->productType ?></td>
                    <td> <a href="edit.php?id=<?= $produit->idProduits ?>">Modifier le produit</a></td>
                    <td> <a href="delete.php?id=<?= $produit->idProduits ?>">Supprimer le produit</a> </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php require_once 'include/footer.php' ?>

</body>

</html>