<?php 
include_once('../modele/fonctions.php');

$id = filter_input(INPUT_GET, 'id');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="css/footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        /*if (!isset($_SESSION['user'])) {
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }*/
        
        $idProduits = filter_input(INPUT_GET, 'idProduits', FILTER_VALIDATE_INT);
    if ($idProduits != null) {
        //$statement = getDb()->prepare("SELECT name, lastName, nameImage, price, brand, note FROM produits WHERE idProduits = ?;");
        $statement = getDb()->prepare("INSERT INTO panier (idUser, idProduits) VALUES (?, ?)");
        $statement->execute([$_SESSION['user_id'], $idProduits]);
    }
        ?>

                    </main>
    <form action="" method="post">
        </form>
        
        <article>
            <?= afficherPanier()?>
        </article>
    </main>
    <footer>
    </footer>
</body>

</html>