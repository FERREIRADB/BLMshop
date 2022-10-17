<?php
//header('location:controllers/accueilControllers.php');
$url = filter_input(INPUT_GET, 'url');

include "modele/config.php";

include 'controllers/include/navbarControllers.php';


if (empty($url)) {
        $url = 'accueil';
}
switch ($url) {
    case 'accueil':
        include('controllers/accueilControllers.php');
        break;
    case 'produits':
        include('controllers/produitsControllers.php');
        break;
    case 'detail':
        include('controllers/detailControllers.php');
        break;
    case 'admin':
        include('controllers/adminControllers.php');
        break;
    case 'login':
        include('controllers/loginControllers.php');
        break;
    case 'inscription':
        include('controllers/inscriptionControllers.php');
        break;
    case 'about':
        include('controllers/aboutControllers.php');
        break;
    case 'logout':
        include('controllers/logoutControllers.php');
        break;
    case 'account':
        include('controllers/accountControllers.php');
        break;
    case 'delete':
        include('controllers/deleteControllers.php');
        break;
    case 'edit':
        include('controllers/editControllers.php');
        break;
    case 'panier':
        include('controllers/panierControllers.php');
        break;
    default:
        include('controllers/accueilControllers.php');
}

include 'vue/include/footer.php';




?>