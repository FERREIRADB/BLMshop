<?php require_once '../modele/config.php'; ?>
<?php require_once '../modele/fonctions.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../css/accueil.css'>
    <title>Document</title>
    <style>
    </style>
</head>

<body>
    <?php
    include "include/navbar.php";
    ?>
    <ol>
        <div>
            <?php categorie();
            ?>
        </div>
    </ol>
    <div style="text-align:center;">
        <h1>Bienvenu sur notre site de vente de pièces BMW</h1>
        <p>Fait par des passionnés pour des passionnés</p>
    </div>
    <div style="display:flex; justify-content:center;">
        <iframe width="1800px" height="750px" src="https://www.youtube.com/embed/jPpucAll_Qk" title="YouTube video player" frameborder="0" autoplay="autoplay" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <?php
    $request = "select * from produits ";
    ?>

    <article class="articleProduct" style="width: 100%; text-align: center;"><?= produitsAlea() ?></article>


    <?php
    include "include/footer.php";
    ?>

</body>

</html>