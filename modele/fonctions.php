<?php
require_once 'config.php';

function getDb()
{
    static $db;
    if ($db) {
        return $db;
    }
    return $db = new PDO("mysql:host=localhost;dbname=BLMshop", 'root', 'Super', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ));
}

//permet de cree les differentes div dans la page produis et qui affiche les produits avec la bdd
function produitsDiv($param)
{
    
    foreach (getDb()->query($param) as $row) {
        echo 
                '<div class="" style="width:550px; margin:1%; padding-left:5%; text-decoration: none;">
                    <img class="card-img-top" src="../img/' . $row['nameImage'] . '" alt="' . $row['name'] . '">
                    <div style="color:black;" class="card-body">
                    <h5 class="card-title">' . $row['name'] . '</h5>
                    <h6 class="meilleureOffre">Meilleure offre</h6>
                    <h4>' . number_format($row['price'], 0, '', '\'') . '$</h4>
                    </div>
                    </div></a>';
    }
}
?>