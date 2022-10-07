<?php
require_once '../modele/config.php';

$edit = false;
$readonly = "readonly";

/**
 * Get User Details
 * 
 * @param int $user_ind
 * @return mixed
 */
function UserDetails(int $user_id)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT idUser, pseudo, email, password FROM users WHERE idUser=:user_id");
        $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_OBJ);
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}

if (empty($_SESSION['user_id'])) {
    header('Location: accueil.php');
}
$user = UserDetails($_SESSION['user_id']);

// Edit
if (isset($_POST['btn-edit'])) {
    $edit = true;
}
if (isset($_POST['btn-logout'])) {
    header('location: logout.php');
}
if ($edit) {
    $readonly = "";
} else {
    $readonly = "readonly";
}
// Modifier ses informations
if (isset($_POST['btn-save'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'];
    $id = $_SESSION['user_id'];

    $query = $pdo->prepare("SELECT * from users WHERE idUser=?");
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_OBJ);

    $res = $user->idUser;
    if ($res == $id) {
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE users set pseudo='$pseudo', email='$email', password='$newPassword' WHERE idUSer=$id";
        $stmt = $pdo->prepare($update);
        $stmt->execute();
    }
}

?>

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
    <?php include_once 'include/navbar.php' ?>
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

<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .well {
        align-items: center;
        justify-content: center;
        width: 500px;
        border: 2px solid black;
        padding: 10px;
    }
</style>