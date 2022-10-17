<?php
if(!$_SESSION['connected'])
{
    header('Location: index.php?url=login');
}
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$idProduits = filter_input(INPUT_GET, 'idProduits', FILTER_VALIDATE_INT);
$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);

function affichagePanier($row)
{
    echo '<div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                            <tr>
                                <td width="90">
                                    <div>
                                    <img class="card-img-top" src="img/produits/' . $row['nameImage'] . '" alt="' . $row['name'] . '">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                    <a href="index.php?url=detail&idProduits=' . $row['idProduits'] . '" class="text-navy">
                                    ' . $row['name'] . '
                                    </a>
                                    <div class="m-t-sm">
                                        <a href="index.php?url=panier&.php?id=' . $row['idProduits'] . '" class="text-muted"><i class="fa fa-trash"></i> Supprimer item</a>
                       </div>
                                </td>
                                <td>
                                    <h4>
                                        $' . number_format($row['price'], 0, '', '\'') . '
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>';
}


function afficherPanier()
{

    global $pdo;
    $total = 0;
    

    foreach ($pdo->query('SELECT * FROM produits JOIN panier ON panier.idProduits = produits.idProduits WHERE panier.idUser = ' . $_SESSION['user_id']) as $row) {
        $total += $row['price'];
    }
    echo '<div class="container">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row" style="display:flex; justify-content:center;">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-title">
                    
                    <span style="font-size: 15px; margin:0;padding:0;" class="pull-right"><a class="pull-right" href="panierControllers.php?idUser=' . $_SESSION['user_id'] . '"> Vider mon panier</a></span>
                        <span style="font-size: 15px;margin:10px" class="pull-right">Total : $' . number_format($total, 0, '', '\'') . '</span>
                       
                        <img class="petit_panier" src="img/logo/panier.png" alt="panier" style="width: 30px;">
                    </div>';
    foreach ($pdo->query('SELECT * FROM produits JOIN panier ON panier.idProduits = produits.idProduits WHERE panier.idUser = ' . $_SESSION['user_id']) as $row) {
        if (countProducts($_SESSION['user_id'], $row['idProduits']) <= 1) {
            affichagePanier($row);
        }
        elseif (countProducts($_SESSION['user_id'], $row['idProduits']) > 1) {
            echo countProducts($_SESSION['user_id'], $row['idProduits']);
            affichagePanier($row);
        break;
        }
    }


    echo '
    <div class="ibox-content" style="display:flex; justify-content:center;">
    <a href="produits.php">
    <button class="btn btn-white" style="font-size:15px;"><i class="fa fa-arrow-left"></i> Continuer les achats</button>
    </a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>';
}
function viderPanier($idUser)
{
    if ($idUser != "") {
        $statement = getDb()->prepare("DELETE FROM `panier` WHERE idUser = ?");
        $param = [$idUser];
        $statement->execute($param);
        return $statement;
    }
}

function deleteArticlePanier($id)
{
    if ($id != "") {
        $statement = getDb()->prepare("DELETE FROM `panier` WHERE idProduits = ?");
        $param = [$id];
        $statement->execute($param);
        return $statement;
    }
}

function countProducts($idUser, $idProduit) 
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM panier where idUser = ? AND idProduits = ?");
    $statement->execute([$idUser, $idProduit]);
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    $nbProduit = count($row);
    return $nbProduit;
}
include "vue/panier.php";

