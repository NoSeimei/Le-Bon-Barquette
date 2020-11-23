<?php
include("connexion.php");
include("Class/Clients.php");
include("Function/Function.php");

if(isset($_POST["nom"]))
{
  try{ 
    $client = new Clients();

    $client->setNom($_POST["nom"]);
    $client->setPrenom($_POST["prenom"]);
    $client->setTelephone($_POST["telephone"]);
    $client->setEmail($_POST["email"]);
    $client->setIdentifiant($_POST["identifiant"]);
    $client->setMotDePasse($_POST["motdepasse"]);

   $request = $db->prepare("INSERT INTO clients (Nom,Prenom,Telephone,Email,Identifiant,MotDePasse)
   VALUES (:Nom,:Prenom,:Telephone,:Email,:Identifiant,:MotDePasse)");
   $request->execute(dismount($client));
   
   if (!isset($ex)){
    header("location: login.php");
    $_SESSION['login']= $client->getIdentifiant();
 
  }
  }catch(Exception $ex){

      echo $ex;

  }
 
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Inscription</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="back">
  <div class="middle">
        <div class="container">
            <div class="form-group">
                <h1 class="only">Formulaire d'inscription</h1><br>
                <form action="formulaire_connexion.php" method="POST">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" required="required" name="nom" id="nom" aria-describedby="helpId" placeholder="">
                    <label for="">Prénom</label>
                    <input type="text" class="form-control"  required="required" name="prenom" id="prenom" aria-describedby="helpId" placeholder="" value="">
                    <label for="">Téléphone</label>
                    <input type="number" class="form-control"  required="required" name="telephone" id="telephone" aria-describedby="helpId" placeholder="069">
                    <label for="">Email</label>
                    <input type="email" class="form-control"  required="required" name="email" id="email" aria-describedby="helpId" placeholder="" value="">
                    <div class="block">
                    <label for="">Identifiant</label>
                    <input type="text" class="form-control" required="required" name="identifiant" id="identifiant" aria-describedby="helpId" placeholder="" value="">
                    <label for="">Mot de passe</label>
                    <input type="password" class="form-control" required="required" name="motdepasse" id="motdepasse" aria-describedby="helpId" placeholder="" value=""><br>
                    </div>
                    <input type="submit" class="btn btn-primary" id="center" value="Envoyer">
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