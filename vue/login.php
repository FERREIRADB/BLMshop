<?php
require_once '../modele/config.php';
require_once '../modele/config.php'; 
var_dump($_SESSION);
$errorMsg = "";
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];

    if (empty($email)) {
        $errors[] = "Please enter email";
    } else if (empty($password)) {
        $errors[] = "Please enter password";
    }

    if (!empty($email) && !empty($password)) {
        try {
            // Sélectionne le user qui a l'email correspondant
            $statement = $pdo->prepare("SELECT * FROM users WHERE email=:email");
            $statement->execute(array(':email' => $email));
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // User trouvé
            if ($statement->rowCount() > 0) {
                if ($email == $row['email']) {
                    // On vérifie que le mot de passe correspond
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['user'] = $row['email'];
                        $_SESSION['user_id'] = $row['idUser'];
                        $_SESSION['connected'] = true;
                        $success = "Login success";
                        header('Location: account.php');
                    }
                    // Si correspond pas, erreur
                    else {
                        $errors[] = "Wrong password";
                    }
                } else {
                    $errors[] = "Wrong email";
                }
            } else {
                $errors[] = "Wrong email";
            }
        }
        // Si la requête n'a pas marché
        catch (PDOException $e) {
            echo "PDO Error : $e";
        }
    }
}

?>


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
<?php include "include/navbar.php";?>

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
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo ($valEmail ?? '') ?>">
            <p></p>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword ?? '') ?>">

            <p></p>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p class="pt-2"> Create an  <a href="inscription.php">account</a></p>
        </form>
    </div>
</body>

</html>