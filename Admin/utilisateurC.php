<?php
include("../connexion.php");
if(!isset($_SESSION['identAd'])){
    $ok="";
    session_destroy();
    header('location: ../index.php');
}
include("../Class/Clients.php");
include("../Class/Admin.php");
include("../Function/Function.php");

try {
    //on séléctionne tout les clients qui existent(non supprimés)
    $requete = $db->query("SELECT * FROM `clients`");
    $requete->setFetchMode(PDO::FETCH_CLASS, 'Clients');
    $client = $requete->fetchAll();
} catch (Exception $ex) {
	
    echo $ex;
  }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="../css/main.css">
    <link rel="stylesheet" media="screen" href="../css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
</head>

<body>
   <?php include("admin-navbar.php");?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="text-align:center; background-color: white; border-color:white; color:black; font-size:20px;">Les Utilsateurs</th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        <?php foreach ($client as $lesClient) {   ?>
                            <tr>
                                <th scope="row"><?php echo $lesClient->getNom(); ?></th>
                                <td><?php echo $lesClient->getPrenom(); ?></td>
                                <td><?php echo $lesClient->getIdentifiant(); ?></td>
                                <td><?php echo $lesClient->getTelephone(); ?></td>
                                <td><?php echo $lesClient->getEmail(); ?></td>
                                
                                <td><a href="modifCA.php?iduser=<?php echo $lesClient->getId_Client();?>" class="far fa-edit"></a> 
                                <a id="SuppClient" onclick="verif2(<?php echo $lesClient->getId_Client();?>);"  style="color:red" class="far fa-trash-alt" href="#" ></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include("admin-footer.php");?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="../js/main.js"></script>
    <script src="../sweetalert2.all.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  	<script src="../js/sweet.js"></script>
   
</body>

</html>