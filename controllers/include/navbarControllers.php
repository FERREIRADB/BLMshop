<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php
//function qui va recupere le genre de l'utilisateur
function LireGenre($idGenre){
    global $pdo;
    $statement = $pdo->prepare("SELECT nameGenre FROM genre where idGenre = $idGenre");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
}
//function qui affiche les categorie de produits
function AfficherCategorie(){
    global $pdo;
    foreach ($pdo->query('SELECT * FROM categorie') as $row)
        echo '<li>
            <a class="dropdown-item" href="index.php?url=produits&data='.$row['idCategorie'].'">'.$row['nameCategorie'].'</a>
        </li>';
}
//function qui affiche les modeles de produits

function AfficherModele(){
    global $pdo;
    foreach ($pdo->query('SELECT * FROM modele ORDER BY nameModele ASC') as $row)
        echo '<a class="dropdown-item" href="index.php?url=produits&modele='.$row['idModele'].'">'.$row['nameModele'].'</a>';
}
if($_SESSION['connected']){$genre = LireGenre($_SESSION['genre'])->nameGenre;}
include "vue/include/navbar.php";


function categorie()
{
    global $pdo;
    foreach ($pdo->query('SELECT * FROM categorie') as $row) {        
        echo '<a class="dropdown-item" href="index.php?url=produits&data='.$row['idCategorie'].'">'.$row['nameCategorie'].'</a>';
    }
}


?>