<?php
//function qui affiche tous les produits dans la page produits
function produitsDiv($param)
{
    echo '<div class="container-fluid d-flex justify-content-center"><div class="row mt-5">';
    //foreach qui parcours les produits dans la bdd
    foreach (getDb()->query($param) as $row) {
        echo '
            <div class="col-sm-4">
                <div class="card">
                    <img src="img/produits/' . $row['nameImage'] . '" class="img-produits">
                    <div class="card-body pt-0 px-0">
                        <div class="d-flex flex-row justify-content-between mb-0 px-3">
                            <small class="text-muted mt-1">' . $row['name'] . '</small>
                            <h6>&dollar;' . number_format($row['price'], 0, '', '\'') . '</h6>
                        </div>
                        <hr class="mt-2 mx-3">
                        <div class="d-flex flex-row justify-content-between px-3 pb-4">
                            <div class="d-flex flex-column"><span class="text-muted">Conso. essence</span><small class="text-muted">L/100KM&ast;</small></div>
                            <div class="d-flex flex-column">
                                <h5 class="mb-0">' . $row['consoVille'] . '/' . $row['consoAuto'] . '</h5><small class="text-muted text-right">(Ville/Autoroute)</small>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between p-3 mid">
                            <div class="d-flex flex-column"><small class="text-muted mb-1">MOTEUR</small>
                                <div class="d-flex flex-row"><img src="https://imgur.com/iPtsG7I.png" width="35px" height="25px">
                                    <div class="d-flex flex-column ml-1"><small class="ghj">' . $row['moteur'] . '</small></div>
                                </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">CHEVAUX</small>
                                <div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png">
                                    <h6 class="ml-1">' . $row['puissance'] . ' CH / ' . $row['couple'] . ' NM</h6>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?url=detail&idProduits=' . $row['idProduits'] . '"><div class="mx-3 mt-3 mb-2"><button type="button" class="btn-danger btn-block" style="background-color:#1127e9;color:white; border-color:#1127e9; border-radius:50px;"><small>Voir en détail</small></button></div></a>
                    </div>
                </div>
            </div>';
    }
    echo '</div></div>';
}

$request = "select * from produits ";

//permet de trier les produits par ordre croissant, decroissant, ordre alphabetique et par types
    if (isset($_GET['data'])) {
        $request .= "WHERE idCategorie = '" . $_GET['data'] . "'";
    }
    if (isset($_GET['modele'])) {
        $request .= "WHERE idModele = '" . $_GET['modele'] . "'";
    }
    if (isset($_GET['order']) && $_GET['order'] != "asc") {
        if ($_GET['order'] == "priceplus") {
            $request .= " ORDER BY price ASC";
        } else if ($_GET['order'] == "pricemoins") {
            $request .= " ORDER BY price DESC";
        } else {
            $request .= " ORDER BY " . $_GET['order'];
        }
    }
    if (isset($_GET['order']) && $_GET['order'] == "asc") {
        $request .= " ORDER BY name ASC";
    }
     
    
    include "vue/produits.php";
