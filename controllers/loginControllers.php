<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php
$errorMsg = "";
if($_SESSION['connected']){
    echo '<meta http-equiv="refresh" content="0;url=index.php?url=account">';
}
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $errors = [];

    if (empty($email)) {
        $errors[] = "Please enter email";
    } if (empty($password)) {
        $errors[] .= "Please enter password";
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
                        $_SESSION['genre'] = $row['idGenre'];
                        $success = "Login success";
                        echo '<meta http-equiv="refresh" content="0;url=index.php?url=account">';
                        exit;
                        
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
include "vue/login.php";
?>


