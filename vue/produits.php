<?php require_once "../modele/fonctions.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">


    <title>Produits</title>
</head>
<body>
    <?php include "include/navbar.php"; $request = "select * from produits ";?>
    <article class="articleProduct" style="width: 100%; text-align: center;"><?= produitsDiv($request) ?></article>

</body>
</html>