<?php require_once '../modele/config.php'; ?>
<?php require_once '../modele/fonctions.php'; ?>
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
            <?php //categorie(); 
            ?>
        </div>
    </ol>
    <header>
        <!-- The HTML5 video element that will create the background video on the header -->
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="width:1800px; height:750px; margin-top:100px;">
            <source src="../img/Venom F82 BMW M4 on TE37s [4K].mp4" type="video/mp4">
        </video>
    </header>

    <div style="text-align:center;">
        <h1>Bienvenu sur notre site de vente de pièces BMW</h1>
        <p>Fait par des passionné pour des passionné</p>
    </div>
    <?php
        $request = "select * from produits ";
    ?>

    <article class="articleProduct" style="width: 100%; text-align: center;"><?= produitsAlea() ?></article>



</body>

</html>