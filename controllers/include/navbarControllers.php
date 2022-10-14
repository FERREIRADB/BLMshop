<?php include_once('../modele/config.php');

function LireGenre($idGenre){
    global $pdo;
    $statement = $pdo->prepare("SELECT nameGenre FROM genre where idGenre = $idGenre");
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
}

function AfficherCategorie(){
    global $pdo;
    foreach ($pdo->query('SELECT * FROM categorie') as $row)
        echo '<li>
            <a class="dropdown-item" href="produitsControllers.php?data='.$row['idCategorie'].'">'.$row['nameCategorie'].'</a>
        </li>';
}

function AfficherModele(){
    global $pdo;
    foreach ($pdo->query('SELECT * FROM modele ORDER BY nameModele ASC') as $row)
        echo '
            <a class="dropdown-item" href="produitsControllers.php?modele='.$row['idModele'].'">'.$row['nameModele'].'</a>
        ';
}
if($_SESSION['connected']){$genre = LireGenre($_SESSION['genre'])->nameGenre;}
include "../vue/include/navbar.php";
?>