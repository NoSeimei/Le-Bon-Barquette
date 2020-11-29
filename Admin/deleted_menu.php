<?php
include("../connexion.php");
if(!isset($_SESSION['identAd'])){
    $ok="";
    session_destroy();
    header('location: ../index.php');
}
include("../Class/Menu_Complet.php");
include("../Class/Admin.php");
include("../Function/Function.php");

if(isset($_GET["idMenuD"])){
    $idMenuD = $_GET["idMenuD"];
    $Deleted = 1;
    $request = $db->prepare("UPDATE menus SET Deleted = :Deleted WHERE Id_Menu = :IdMenuD");
    $request->execute(array('Deleted' => $Deleted,'IdMenuD' => $idMenuD));
    header("Location: ..\Admin\admin_menu.php");	
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

<body >

    <?php include("admin-navbar.php"); ?>
    
    <div class="left">
<?php try {
    $request = $db->query("SELECT * FROM menu_complet ORDER BY Id_Menu");
    $request->setFetchMode(PDO::FETCH_CLASS, 'Menu_Complet');
    $lesMenus = $request->fetchAll();
    foreach($lesMenus as $leMenu){
    ?>
                        <div class="container-fluid" style="width: auto; display: inline-block;">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;"><u>Menu</u></h4>
                                    <h5 class="card-title"><?php echo $leMenu->getNom(); ?></h5>
                                    <p class="card-text"><?php echo $leMenu->getdescription(); ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h6 class="card-title">Entrée</h6><?php echo $leMenu->getEntree(); ?>
                                    </li>
                                    <li class="list-group-item">
                                        <h6 class="card-title">Plat</h6><?php echo $leMenu->getPlat(); ?>
                                    </li>

                                    <li class="list-group-item">
                                        <h6 class="card-title">Dessert</h6><?php echo $leMenu->getDessert(); ?>
                                    </li>

                                    <li class="list-group-item">
                                        <h6 class="card-title">Boisson</h6><?php echo $leMenu->getBoisson(); ?>
                                    </li>

                                    <li class="list-group-item" style="text-align: center;">
                                        <h6 class="card-title" style="text-align: center;"><u>Prix</u></h6><?php echo $leMenu->getPrix(); ?>
                                    </li>
                                </ul>
                                <div class="card-body" style="text-align: center;">
                                    <a href="../Modifications/modification_menu.php?idMenu=<?php echo $leMenu->getId_Menu(); ?>" class="far fa-edit"></a>
                                    <a href="admin_menu.php?idMenuD=<?php echo $leMenu->getId_Menu(); ?>" style="color:red; padding-left:10%;" class="far fa-trash-alt"></a>
                                    </tr>
                   
                                </div>
                            </div>
                        </div>
<?php   
    }
}catch (Exception $exE) {
    echo $exE;
} ?>
</div>
   
    <?php include("admin-footer.php"); ?>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>