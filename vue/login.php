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
    <link rel="stylesheet" href="css/inscription.css">
    <title>Inscription</title>
</head>

<body>

    <div id="container">
        <p>Connecetez-vous</p>
        <?php
        // Messages d'erreurs si erreur
        if (isset($errors)) {
            foreach ($errors as $error) {
        ?>
                <div class="error">
                    <strong><?= $error; ?></strong>
                </div>
            <?php
            }
        }

        // Si login message de succès
        if (isset($success)) {
            ?>
            <div class="success">
                <strong><?= $success; ?></strong>
            </div>
        <?php
        }
        ?>
        <form action="" method="post">

            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo ($valEmail ?? '') ?>">
            <p></p>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword ?? '') ?>">

            <p></p>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p class="pt-2"> Create an <a href="index.php?url=inscription">account</a></p>
        </form>
    </div>

</body>

</html>