<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Dashboard Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admin_menu.php">Voir les menus</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter_menu.php">Créer un menu</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ajouter
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idEntree=1">Ajouter une entrée</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idPlat=2">Ajouter un plat</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idDessert=3">Ajouter un dessert</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idBoisson=4">Ajouter une boisson</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Elements supprimés
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idEntree=1">Les entrées</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idPlat=2">Les plats</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idDessert=3">Les desserts</a>
          <a class="dropdown-item" href="../Ajouter_manger/ajouter.php?idBoisson=4">Les boissons</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../Deleted/deleted_menu.php">Les menus</a>
        </div>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <a name="" id="" class="btn btn-outline-danger my-2 my-sm-0" href="#" role="button">Deconnexion</a>
  </div>
</nav>