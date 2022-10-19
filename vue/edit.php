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
    <link rel='stylesheet' type='text/css' href='css/produits.css'>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="name">Name : </label>
            <input type="text" name="name" value="<?= $produit->name ?>">
        </div>

        <div>
            <label for="name">Price : </label>
            <input type="text" name="price" value="<?= $produit->price ?>">
        </div>

        <div>
            <label for="name">Puissance : </label>
            <input type="text" name="puissance" value="<?= $produit->puissance ?>">
        </div>

        <div>
            <label for="name">Couple : </label>
            <input type="text" name="couple" value="<?= $produit->couple ?>">
        </div>

        <div>
            <label for="name">Moteur : </label>
            <input type="text" name="moteur" value="<?= $produit->moteur ?>">
        </div>

        <div>
            <label for="name">Consomation en ville : </label>
            <input type="text" name="consoVille" value="<?= $produit->consoVille ?>">
        </div>
        <div>
            <label for="name">Consomation sur autoroute : </label>
            <input type="text" name="consoAuto" value="<?= $produit->consoAuto ?>">
        </div>
        <button type="submit" name="edit">Modifier</button>
    </form>

</body>

</html>