<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php

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
        $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        if (filter_var($email)) {
            $sql = 'SELECT * from users where email = :email';
            $statement = $pdo->prepare($sql); // Prépare une requête
            $p = ['email' => $email];
            $statement->execute($p);


            // Requête pour créer l'utilisateur dans la base de données
            if ($statement->rowCount() == 0) // Si l'email n'existe pas encore
                $sql = "INSERT INTO users 
                (pseudo, email, `password`, idGenre) 
                values(:pseudo,:email,:pass,:idGenre)";

            try {
                // Insertion du user dans la base de données
                $handle = $pdo->prepare($sql);
                $params = [
                    ':pseudo' => $pseudo,
                    ':email' => $email,
                    ':pass' => $hashPassword,
                    ':idGenre' => $genre
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
include "vue/inscription.php";?>


