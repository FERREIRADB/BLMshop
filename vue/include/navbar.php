<?php include_once('../modele/fonctions.php');
if($_SESSION['connected']){$genre = LireGenre($_SESSION['genre'])->nameGenre;}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#accueil.php">
        <img
          src="../img/logo/BLMshopLogo.png"
          height="50"
          alt="BLMshop"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./accueil.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          Produits
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="produits.php">Tous nos produits</a>
          </li>
          <li><hr class="dropdown-divider" /></li>
          <?= AfficherCategorie() ?>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
          Modele
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href=" modeles.php">Tous nos modeles</a>
          </li>
          <li><hr class="dropdown-divider" /></li>
          <?= AfficherModele()?>
        </ul>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Projects</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="link-secondary me-3" href="panier.php">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <?php if($_SESSION['connected']){
          
            
      echo '<img src="../img/pp/'.$genre.'.jpg"
            class="rounded-circle"
            height="35"
            alt="Pas connecter"
            loading="lazy"
          />';}?>
        </a>
        <?php if(!$_SESSION['connected']){
          echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" href="./login.php">S\'Identifier</a>
        </li></ul>';
        }?>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="account.php">Mon Compte</a>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">Se Déconnetcer</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</nav>
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- Custom scripts -->
  </body>
</html>












<!--<link rel="stylesheet" src="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./accueil.php"><img src="../img/logo/BLMshopLogo.png" style="width:50px; height:50px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="./accueil.php">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./produits.php">Produits</a>
        </li>
        
        



        <li class="nav-item">
          <a class="nav-link" href="./about.php">A propos de nous</a>
        </li>
        <li class="nav-item">
          <?php if (!isset($_SESSION['user_id'])) : ?>
            <a class="nav-link" href="login.php">Connexion</a>
          <?php endif ?>
          <?php if (isset($_SESSION['user_id'])) : ?>
            <a class="nav-link" href="account.php"><?= $_SESSION['user'] ?></a>
            <?= ($_SESSION['user'] == "admin@gmail.com") ? "<a href=\"admin.php\">Admin</a>" : ""; ?>
            <a class="nav-link" href="logout.php">Déconnexion</a>
            <li class="nav-item">
          <a class="nav-link" href="panier.php"><img src="../img/panier.png" width="25" alt=""></a>
        </li>
          <?php endif ?>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
          -->