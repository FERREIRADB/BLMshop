<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = "SELECT * FROM produits WHERE idProduits = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
$produit = $statement->fetch(PDO::FETCH_OBJ);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$puissance = filter_input(INPUT_POST, 'puissance', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$couple = filter_input(INPUT_POST, 'couple', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$moteur = filter_input(INPUT_POST, 'moteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$consoVille = filter_input(INPUT_POST, 'consoVille', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$consoAuto = filter_input(INPUT_POST, 'consoAuto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$productType = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if (isset($_POST['edit'])) {

    $query = "UPDATE produits SET `name` = ?, price = ?, puissance = ?, couple = ?, moteur = ?, consoVille = ?, consoAuto = ? WHERE idProduits = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $price, $puissance, $couple, $moteur, $consoVille, $consoAuto, $id]);
    header('Location: index.php?url=admin&');

}
include "vue/edit.php";

?>

