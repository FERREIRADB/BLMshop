<?php 

include_once('../modele/fonctions.php');


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = "DELETE FROM produits WHERE idProduits = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
header('Location: admin.php');

?>