<link rel="stylesheet" src="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./accueil.php"><img src="../img/BLMshopLogo.png" style="width:50px; height:50px;"></a>
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
          <a class="nav-link" href="./produits.php">Produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./about.php">A propos de nous</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link" href="panier.php">Panier</a>
        </li>
        <?php if (!isset($_SESSION['user_id'])) : ?>
                        <div class="navbar-nav ms-auto">
                            <a href="login.php">Connexion</a>
                        </div>
                    <?php endif ?>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <div class="navbar-nav ms-auto">
                            <a href="account.php"><?= $_SESSION['user'] ?></a>
                        <?= ($_SESSION['user'] == "admin@gmail.com") ? "<a href=\"admin.php\">Admin</a>" : ""; ?>
                            <a href="logout.php">Déconnexion</a>
                            <a href="panier.php"><img src="img/panier.png" width="25" alt=""></a>


                        </div>
                    <?php endif ?>
      </ul>
    </div>
  </div>
</nav>

