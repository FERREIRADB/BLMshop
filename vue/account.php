<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="css/footer.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css ">
    <title>Account</title>
</head>

<body>
    <?php include_once '../controllers/include/navbarControllers.php' ?>
    <div class="m-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCollapse">



                </div>
            </div>
        </nav>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="mt-5" width="150px" src="../img/logo/BLMshopLogo.png">
            <form action="" method="post">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Reglages profil</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Pseudo</label><input type="text" class="form-control" name="pseudo" <?= $readonly ?> placeholder="Pseudo" value="<?= ucfirst($user->pseudo) ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" name="email" <?= $readonly ?> placeholder="email" value="<?= $user->email ?>"></div>
                        <div class="col-md-6"><label class="labels">Mot de passe</label><input type="password" name="password" class="form-control" <?= $readonly ?> value="<?= $user->password ?>"></div>

                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn profile-button" style="margin:10px; color:green;" name="btn-edit" type="submit">Modifier</button>
                        <button class="btn profile-button" style="color:green;" name="btn-save" type="submit">Sauvegarder</button>
                        <a href="commande.php" target="_blank" class="btn profile-button" name="btn-commande" style="color:green;">
                            Mes Commandes
                        </a>
                    </div>

                </div>
        </div>
        </form>


    </div>
    </div>
    </div>
    </div>
    <?php include "include/footer.php";?>

</body>
</html>