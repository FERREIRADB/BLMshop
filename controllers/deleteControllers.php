<?php 
//recupere l'id du produits
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
//supprime le produits
$query = "DELETE FROM produits WHERE idProduits = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
header('Location: index.php?url=admin');

?>