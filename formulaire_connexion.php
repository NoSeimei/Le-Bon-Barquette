<?php
include("connexion.php");

if(isset($_POST["lastname"]))
{
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $tel = $_POST["phone"];
    $mail = $_POST["mail"];
    $user =  $_POST["user"];
    $pass =  $_POST["password"];

    $request = $db->prepare("INSERT INTO Client 
    VALUES (:nom, :prenom, :tel, :date, :portefeuille, :ville");
   $request->execute(array(':id' => $id,':nom' => $nom, ':prenom' => $prenom, ':tel' => $tel, ':date' => $date, ':portefeuille' => $portefeuille, ':ville' => $ville));

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
  <body>
  <div class="middle">
        <div class="container">
            <div class="form-group">
                <h1 class="only">Formulaire d'inscription</h1><br>
                <form action="formulaire_connexion.php" method="POST">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="">
                    <label for="">Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="helpId" placeholder="" value="">
                    <label for="">Téléphone</label>
                    <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" placeholder="069">
                    <label for="">Email</label>
                    <input type="mail" class="form-control" name="mail" id="mail" aria-describedby="helpId" placeholder="" value="">
                    <div class="block">
                    <label for="">Identifiant</label>
                    <input type="text" class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="" value="">
                    <label for="">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" value=""><br>
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