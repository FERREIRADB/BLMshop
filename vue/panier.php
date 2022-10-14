<?php
include_once('../modele/fonctions.php');
if(!$_SESSION['connected']){header('Location: login.php');}
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$idProduits = filter_input(INPUT_GET, 'idProduits', FILTER_VALIDATE_INT);
$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='../css/style.css'>
    <link rel='stylesheet' type='text/css' href='../css/panier.css'>
    <title>Panier</title>
</head>

<body>
    <?php include 'include/navbar.php' ?>
    <main>
        <?php
        if (!isset($_SESSION['user'])) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }

        if ($idProduits != null) {
            $statement = getDb()->prepare("INSERT INTO panier (idUser, idProduits) VALUES (?, ?)");
            $statement->execute([$_SESSION['user_id'], $idProduits]);


        }
        if ($id != null) {
            deleteArticlePanier($id);
        }
        if ($idUser != null) {
            viderPanier($idUser);
        } ?>
        <article>
            <?= afficherPanier() ?>
        </article>

        <?php
            include "include/paiement.php";
        ?>

    </main>
    <?php include "include/footer.php";?>

</body>

</html>