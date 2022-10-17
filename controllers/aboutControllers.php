<?php require_once "../modele/config.php"; 
function createurs()
{

    $nomCreateurs = [
        "Lucas" => "Fonctionnalités php",
        "Bryan" => "design complet du site"
    ];

    foreach ($nomCreateurs as $key => $value) {
        echo ' <div class="card" style="height:23rem; width: 16rem; margin:15px; display:inline-block;">
                    <img class="card-img-top" src="../img/pp/pp' . $key . '.png" height="60%">
                <div class="card-body">
                    <h5 class="card-title">' . $key . '</h5>
                    <h7 style="color:gray;">' . $value . '</h7>
                </div>
              </div>';
    }
}
include "../vue/about.php";
?>
