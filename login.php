<?php
include("connexion.php");
include("Class/Clients.php");
include("Class/Admin.php");
include("Function/Function.php");

if (isset($_POST["identifiant"]) && isset($_POST["motdepasse"])) {

  $user = $_POST["identifiant"];
  $pass = $_POST["motdepasse"];

  /*$request = $db->prepare("SELECT * FROM admin WHERE userAdmin = :userAdmin AND pass = :pass");
    $request->execute(array(':userAdmin' => $user, ':pass' => $pass));
    $resultat = $request->fetch();*/
  try {
    $requete = $db->query("SELECT * FROM admin");
    $requete->setFetchMode(PDO::FETCH_CLASS, 'Admin');
    $admin = $requete->fetchAll();

    foreach ($admin as $theAdmin) {

      if ($theAdmin->getUserAdmin() === $user && $theAdmin->getPass() === $pass) {

        header("Location: admin.php");
        break;
      } else {
        echo "Mauvais identifiant ou Mot de passe";
      }
    }
  } catch (Exception $ex) {

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
    <div class="container-form">
      <div class="form-group">
        <h1 class="only">Connexion</h1><br>
        <form action="login.php" method="POST">
          <label for="">Identifiant</label>
          <input type="text" class="form-control" required="required" name="identifiant" id="identifiant" aria-describedby="helpId" placeholder="" value="">
          <label for="">Mot de passe</label>
          <input type="password" class="form-control" required="required" name="motdepasse" id="motdepasse" aria-describedby="helpId" placeholder="" value=""><br>
          <a href="formulaire_connexion.php">Pas encore de compte ?</a>
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