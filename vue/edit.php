<?php

include_once('../modele/fonctions.php');


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$query = "SELECT * FROM produits WHERE idProduits = ?";
$statement = $pdo->prepare($query);
$statement->execute([$id]);
$produit = $statement->fetch(PDO::FETCH_OBJ);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$productType = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if (isset($_POST['edit'])) {

    $query = "UPDATE produits SET name = ?, lastName = ?, price = ?, productType = ?, brand = ?, note = ? WHERE idProduits = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$name, $lastName, $price, $productType, $brand, $note, $id]);
    header('Location: admin.php');

}

// if (isset($_FILES['fileToUpload'])) {
//     var_dump($_FILES);
//     var_dump($_FILES["fileToUpload"]["name"]);
//     $target_dir = "img/produits/";
//     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     // Check if image file is a actual image or fake image
//     if (isset($_POST["submit"])) {
//         $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//         if ($check !== false) {
//             $uploadOk = 1;
//         } else {
//             echo "File is not an image.";
//             $uploadOk = 0;
//         }
//     }
//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//         // if everything is ok, try to upload file
//     } else {
//         if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

//             echo "Sorry, there was an error uploading your file.";
//         }
//     }
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='css/produits.css'>
    <title>Document</title>
</head>

<body>
    <?php require_once 'include/navbar.php'; ?>
    <form action="" method="post">
        <div>
            <label for="name">Name : </label>
            <input type="text" name="name" value="<?= $produit->name ?>">
        </div>

        <div>
            <label for="name">Price : </label>
            <input type="text" name="price" value="<?= $produit->price ?>">
        </div>

        <div>
            <label for="name">Puissance : </label>
            <input type="text" name="puissance" value="<?= $produit->puissance ?>">
        </div>

        <div>
            <label for="name">Couple : </label>
            <input type="text" name="couple" value="<?= $produit->couple ?>">
        </div>

        <div>
            <label for="name">Moteur : </label>
            <input type="text" name="moteur" value="<?= $produit->moteur ?>">
        </div>

        <div>
            <label for="name">Consomation en ville : </label>
            <input type="text" name="consoVille" value="<?= $produit->consoVille ?>">
        </div>
        <div>
            <label for="name">Consomation sur autoroute : </label>
            <input type="text" name="consoAuto" value="<?= $produit->consoAuto ?>">
        </div>
        <div>
            <label for="name">Type produit</label>
            <input type="text" name="productType" value="<?= $produit->productType ?>">
        </div>
        <button type="submit" name="edit">Modifier</button>
    </form>
    <?php require_once 'include/footer.php'; ?>

</body>

</html>