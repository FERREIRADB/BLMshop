<?php require_once "../modele/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">


    <title>Modele</title>
</head>

<body>
    <?php include "include/navbar.php";
    $request = "select * from modele "; ?>
    <div style="margin-left:50px;">
        <a>Ordonner par :</a>
        <a href="produits.php?order=asc">Ordre alphabétique</a>
        <a href="produits.php?order=idModele">Type de produit</a>
        <a href="produits.php?order=priceplus">Le moins cher (vous êtes pauvres)</a>
        <a href="produits.php?order=pricemoins">Le plus cher (vous êtes riches)</a>
    </div>
    </ul>

    <?php
    $request = "select * from modele ";


    if (isset($_GET['data'])) {
        $request .= "WHERE idCategorie = '" . $_GET['data'] . "'";
    }
    if (isset($_GET['order']) && $_GET['order'] != "asc") {
        if ($_GET['order'] == "priceplus") {
            $request .= " ORDER BY price ASC";
        } else if ($_GET['order'] == "pricemoins") {
            $request .= " ORDER BY price DESC";
        } else {
            $request .= " ORDER BY " . $_GET['order'];
        }
    }
    if (isset($_GET['order']) && $_GET['order'] == "asc") {
        $request .= " ORDER BY name ASC";
    }
    ?>
    <article class="articleProduct" style="width: 100%; text-align: center;">
    <?php modele();?>
        </article>
    <?php include "include/footer.php"; ?>

</body>

</html>