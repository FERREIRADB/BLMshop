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
    <link rel='stylesheet' type='text/css' href='css/accueil.css'>
    <title>Document</title>
    <style>
    </style>
</head>

<body>
    <ol>
        <div>
        </div>
    </ol>
    <div style="text-align:center;">
        <h1>Bienvenue sur notre site de vente de pièces BMW</h1>
        <p>Fait par des passionnés pour des passionnés</p>
    </div>
    <header style="display:flex; justify-content:center;">
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" style="width:1800px; height:750px; display:flex; justify-content:center;">
            <source src="img/Venom F82 BMW M4 on TE37s [4K].mp4" type="video/mp4">
        </video>
    </header>
    <?php
    $request = "select * from produits ";
    ?>

    <article class="articleProduct" style="width: 100%; text-align: center;">
        <?= produitsAlea(); ?>
    </article>

</body>

</html>