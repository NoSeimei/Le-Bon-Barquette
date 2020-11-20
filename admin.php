<?php
include("connexion.php");
include("Class/Clients.php");
include("Class/Entree.php");
include("Class/Admin.php");
include("Function/Function.php");

$request = $db->query("SELECT * FROM entree");
$request->setFetchMode(PDO::FETCH_CLASS,'Entree');
$lesEntree = $request->fetchAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  
 <div class="container-admin">
  <table class="table">
  <thead class="thead-dark">
    <tr>    
      <th scope="col">Image</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($lesEntree as $entree)
        {   ?>
    <tr>
      <th scope="row"><?php echo $entree->getImage();?></th>
      <td><?php echo $entree->getNom();?></td>
      <td><?php echo $entree->getDescription();?></td>
      <td><?php echo $entree->getPrix_Entree();?></td>
    </tr>
    <?php
        }
      ?>
  </tbody>
</table>
</div>

<div class="container-button">
 <a name="" id="btn" class="btn btn-primary" href="Ajouter_manger/ajouter_entree.php" role="button">Ajouter une Entrée</a>
 <a name="" id="btn" class="btn btn-primary" href="Ajouter_manger/ajouter_entree.php" role="button">Ajouter un Plat</a>
 <a name="" id="btn" class="btn btn-primary" href="Ajouter_manger/ajouter_entree.php" role="button">Ajouter un Dessert</a>
 </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>