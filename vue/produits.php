<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">


    <title>Produits</title>
</head>

<body>
    <div style="margin-left:50px;">
        <a>Ordonner par :</a>
        <a href="index.php?url=produits&order=asc">Ordre alphabétique</a>
        <a href="index.php?url=produits&order=idCategorie">Type de produit</a>
        <a href="index.php?url=produits&order=priceplus">Le moins cher (vous êtes pauvres)</a>
        <a href="index.php?url=produits&order=pricemoins">Le plus cher (vous êtes riches)</a>
    </div>
    </ul>
    <?php include "include/carousel.php"; ?>
    <article class="articleProduct" style="width: 100%; text-align: center;"><?= produitsDiv($request) ?></article>

</body>

</html>