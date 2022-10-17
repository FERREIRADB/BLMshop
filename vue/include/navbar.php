<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

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
      <a class="navbar-brand mt-2 mt-lg-0" href="index.php?url=accueil">
        <img
          src="img/logo/BLMshopLogo.png"
          height="50"
          alt="BLMshop"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php?url=accueil">Accueil</a>
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
            <a class="dropdown-item" href="index.php?url=produits">Tous nos produits</a>
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
          <?= AfficherModele()?>
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
          Types
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= categorie()?>
        </ul>
      </li>




      
        <li class="nav-item">
          <a class="nav-link" href="index.php?url=about">A Propos</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <?php if($_SESSION['connected']){
        echo '
      <a class="link-secondary me-3" href="index.php?url=panier">
        <i class="fas fa-shopping-cart"></i>
      </a>';}?>
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
          
            
      echo '<img src="img/pp/'.$genre.'.jpg"
            class="rounded-circle"
            height="35"
            alt="Pas connecter"
            loading="lazy"
          />';}?>
        </a>
        <?php if(!$_SESSION['connected']){
          echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <a class="nav-link" href="index.php?url=login">S\'Identifier</a>
        </li></ul>';
        }?>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
          style="margin-left:-100px; margin-top: 10px;"
        >
          <li>
            <a class="dropdown-item" href="index.php?url=account">Mon Compte</a>
          </li>
          <li>
            <a class="dropdown-item" href="index.php?url=logout">Se Déconnetcer</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</nav>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
  </body>
</html>