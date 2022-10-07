<?php

// Importation de la base de données
require_once '../modele/config.php';

// Si submit est cliqué
if (isset($_POST['submit'])) {
    // Si chaque valeur du formulaire a été rentré
    if (
        isset(
            $_POST['pseudo'],
            $_POST['email'],
            $_POST['password']
        )
        && !empty($_POST['pseudo'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])
    ) {

        // Filtre pour les entrées
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        if (filter_var($email)) {
            $sql = 'SELECT * from users where email = :email';
            $statement = $pdo->prepare($sql); // Prépare une requête
            $p = ['email' => $email];
            $statement->execute($p);


            // Requête pour créer l'utilisateur dans la base de données
            if ($statement->rowCount() == 0) // Si l'email n'existe pas encore
                $sql = "INSERT INTO users 
                (pseudo, email, `password`) 
                values(:pseudo,:email,:pass)";

            try {
                // Insertion du user dans la base de données
                $handle = $pdo->prepare($sql);
                $params = [
                    ':pseudo' => $pseudo,
                    ':email' => $email,
                    ':pass' => $hashPassword
                ];

                $handle->execute($params);
                $success = 'User has been created successfully';
            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        } else {
            $valPseudo = $pseudo;
            $valEmail = '';
            $valPassword = $password;

            $errors[] = 'Email address already registered';
        }
    }

    // Gérér les erreurs
    else {
        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            $errors[] = 'pseudo is required';
        } else {
            $valPseudo = $_POST['pseudo'];
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errors[] = 'Email is required';
        } else {
            $valEmail = $_POST['email'];
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $errors[] = 'Password is required';
        } else {
            $valPassword = $_POST['password'];
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
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p class="pt-2"> Back to <a href="login.php">Login</a></p>
        </form>
    </div>
    <?php include "include/footer.php";?>

</body>

</html>