<?php

$edit = false;
$readonly = "readonly";


if (empty($_SESSION['user_id'])) {
    header('Location: index.php?url=accueil');
}
//function qui recupere en objet les info d'un user et les return
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
$user = UserDetails($_SESSION['user_id']);

// Edit
if (isset($_POST['btn-edit'])) {
    $edit = true;
}
if (isset($_POST['btn-logout'])) {
    header('location: index.php?url=logout');
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

include "vue/account.php";?>