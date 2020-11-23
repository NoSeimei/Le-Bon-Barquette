<?php
include("../connexion.php");
include("../Class/Clients.php");
include("../Class/Entree.php");
include("../Class/Plats.php");
include("../Class/Dessert.php");
include("../Class/Admin.php");
include("../Function/Function.php");

if(isset($_POST["image"]))
{
    $entree = new Entree();

    $entree->setImage($_POST["image"]);
    $entree->setNom($_POST["nom"]);
    $entree->setDescription($_POST["description"]);
    $entree->setPrix_Entree($_POST["prix"]);
    try{

    $request = $db->prepare("INSERT INTO entree (Image, Nom, Description, Prix_Entree)
    VALUES (:Image, :Nom, :Description, :Prix_Entree)");
    $request->execute(dismount($entree));
    header("Location: ..\admin.php");
    }catch(Exception $ex)
    {
      echo $ex;
    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Ajout d'un entrer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="back">
  <div class="middle">
        <div class="container">
            <div class="form-group">
                <h1 class="only">Ajout d'un entrer</h1><br>
                <form action="ajouter_entree.php" method="POST">
                    <label for="">Image</label>
                    <input type="text" class="form-control" required="required" name="image" id="image" aria-describedby="helpId" placeholder="">
                    <label for="">Nom</label>
                    <input type="text" class="form-control"  required="required" name="nom" id="nom" aria-describedby="helpId" placeholder="" value="">
                    <label for="">Description</label>
                    <input type="textarea" class="form-control"  required="required" name="description" id="description" aria-describedby="helpId" placeholder="">
                    <label for="">Prix</label>
                    <input type="decimal" class="form-control"  required="required" name="prix" id="prix" aria-describedby="helpId" placeholder="" value="" step="any" ><br>
                    <input type="submit" class="btn btn-primary" id="center" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
