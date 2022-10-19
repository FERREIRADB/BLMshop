<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
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
<!-- Example single danger button -->
<div class="btn-group">
  <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:#1127e9;opacity:50%;color:white;border-radius:50px;">
    Ordonner par :
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="index.php?url=produits&order=asc">Ordre alphabétique</a></li>
    <li><a class="dropdown-item" href="index.php?url=produits&order=idCategorie">Type de produit</a></li>
    <li><a class="dropdown-item" href="index.php?url=produits&order=priceplus">Croissant</a></li>
    <li><a class="dropdown-item" href="index.php?url=produits&order=pricemoins">Décroissant</a></li>
  </ul>
</div>
    <?php include "include/carousel.php"; ?>
    <article class="articleProduct" style="width: 100%; text-align: center;"><?= produitsDiv($request) ?></article>

</body>

</html>