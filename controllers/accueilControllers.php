<!--
Auteur: Ferreira Bryan / Lucas Chavanne
Date: 19.10.2022
Description: Projet personnel BLMshop
-->
<?php 

//function qui recupere tous les produits dans la bdd et les affiche en aleatoire
function produitsAlea()
{
    //recupere les produits dans la bdd
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM produits");
    $statement->execute();
    $row = $statement->fetchAll(PDO::FETCH_ASSOC);
    $tableauProduitsAelat = [];
    //$arrayName = array('' => , );
    echo '
    <section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>Quelques produits</h2>
                </div>
            </div>
        </div>
        <div class="row">';
        //for qui qui affiche 4 produits unique dans l'accueil 
    for ($i = 0; $i < 4; $i++) {
        $chiffrealea = rand(0, 6);

        foreach ($tableauProduitsAelat as $key => $value) {
            if (in_array($row[$chiffrealea]['name'], $tableauProduitsAelat)) {
                $chiffrealea = rand(0, 6);
            }
        }
            echo '<!-- Single Product -->
            
                <div class="col-md-6 col-lg-4 col-xl-3">
                
                    <div id="product-'.$row[$chiffrealea]['idProduits'].'" class="single-product">
                    
                        <div class="part-1"> 
                        </div>
                        <div class="part-2">
                        <a href="index.php?url=detail&idProduits='.$row[$chiffrealea]['idProduits'].'" style="text-decoration: none; color: black;">
                            <h3 class="product-title"> ' . $row[$chiffrealea]['name'] . '</h3>
                            </a>
                            <h4 class="product-price">' .number_format($row[$chiffrealea]['price'], 0, '', '\''). '</h4>
                        </div>
                        
                    </div>
                    
                </div>
            ';
        $tableauProduitsAelat[] = $row[$chiffrealea]['name'];
    }
    echo '
    </div>
    </div>
    </section>';    

}

include "vue/accueil.php";?>
