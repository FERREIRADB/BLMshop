<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>Inscription</title>
</head>

<body>
<?php include "../controllers/include/navbarControllers.php";?>

    <div id="container">
        <p>Créez un compte</p>
        <?php
        if (isset($errors) && count($errors) > 0) {
            // Affichage des erreurs si il y en a
            foreach ($errors as $error) {
                echo '<div class="alert-danger">' . $error . '</div>';
            }
        }
        if (isset($success)) {
            echo '<div class="alert-success">' . $success . '</div>';
        }
        ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo ($valEmail ?? '') ?>">
            <p></p>
            <input type="text" name="pseudo" placeholder="Enter pseudo" class="form-control" value="<?php echo ($valPseudo ?? '') ?>">
            <p></p>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword ?? '') ?>">
            <p></p>
            <select name="genre">
                    <?php
                    foreach ($pdo->query('SELECT * FROM genre') as $row) {
                        echo '<option value= '.$row['idGenre'].'> '.$row['nameGenre'] .'</option>';
                    }
                    ?>
                </select>
      
            <p></p>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p class="pt-2"> Back to <a href="login.php">Login</a></p>
        </form>
    </div>
    <?php include "include/footer.php";?>

</body>

</html>