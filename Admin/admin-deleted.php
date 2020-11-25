<?php
include("connexion.php");
include("Class/Clients.php");
include("Class/Deleted_entree.php");
include("Class/Deleted_plats.php");
include("Class/Deleted_dessert.php");
include("Class/Deleted_boisson.php");
include("Class/Deleted_menus.php");
include("Class/Admin.php");
include("Function/Function.php");
try {
    $request = $db->query("SELECT * FROM Deleted_entree");
    $request->setFetchMode(PDO::FETCH_CLASS, 'Deleted_entree');
    $lesEntree = $request->fetchAll();
} catch (Exception $exE) {
    echo $exE;
}

try {
    $request2 = $db->query("SELECT * FROM Deleted_plats");
    $request2->setFetchMode(PDO::FETCH_CLASS, 'Deleted_plats');
    $lesPlats = $request2->fetchAll();
} catch (Exception $exP) {
    echo $exP;
}

try {
    $request3 = $db->query("SELECT * FROM Deleted_dessert");
    $request3->setFetchMode(PDO::FETCH_CLASS, 'Deleted_dessert');
    $lesDesserts = $request3->fetchAll();
} catch (Exception $exD) {
    echo $exD;
}

try {
    $request4 = $db->query("SELECT * FROM Deleted_boisson");
    $request4->setFetchMode(PDO::FETCH_CLASS, 'Deleted_boisson');
    $lesBoissons = $request4->fetchAll();
} catch (Exception $exB) {
    echo $exB;
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
    <link rel="stylesheet" media="screen" href="css/main.css">
    <link rel="stylesheet" media="screen" href="css/admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
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
                            <th scope="col" style="text-align:center; background-color: white; border-color:white; color:black; font-size:20px;">Les Entrées</th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesEntree as $entree) {   ?>
                            <tr>
                                <th scope="row"><?php echo $entree->getImage(); ?></th>
                                <td><?php echo $entree->getNom(); ?></td>
                                <td><?php echo $entree->getDescription(); ?></td>
                                <td><?php echo $entree->getPrix_Entree(); ?></td>
                                <td><a href="Modifications/modification.php?idEntree=<?php echo $entree->getId_Entree();?>" class="far fa-edit"></a> <a href="" style="color:red" class="far fa-trash-alt"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xl">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="text-align:center; background-color: white; border-color:white; color:black; font-size:20px;">Les Plats</th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesPlats as $plat) {   ?>
                            <tr>
                                <th scope="row"><?php echo $plat->getImage(); ?></th>
                                <td><?php echo $plat->getNom(); ?></td>
                                <td><?php echo $plat->getDescription(); ?></td>
                                <td><?php echo $plat->getPrix_Plat(); ?></td>
                                <td><a href="Modifications/modification.php?idPlat=<?php echo $plat->getId_Plat();?>" class="far fa-edit"></a> <a href="" style="color:red" class="far fa-trash-alt"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xl">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="text-align:center; background-color: white; border-color:white; color:black; font-size:20px;">Les Desserts</th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesDesserts as $dessert) {   ?>
                            <tr>
                                <th scope="row"><?php echo $dessert->getImage(); ?></th>
                                <td><?php echo $dessert->getNom(); ?></td>
                                <td><?php echo $dessert->getDescription(); ?></td>
                                <td><?php echo $dessert->getPrix_Dessert(); ?></td>
                                <td><a href="Modifications/modification.php?idDessert=<?php echo $dessert->getId_Dessert();?>" class="far fa-edit"></a> <a href="" style="color:red" class="far fa-trash-alt"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xl">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="text-align:center; background-color: white; border-color:white; color:black; font-size:20px;">Les Boissons</th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                            <th scope="col" style="background-color: white; border-color:white;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lesBoissons as $boisson) {   ?>
                            <tr>
                                <th scope="row"><?php echo $boisson->getImage(); ?></th>
                                <td><?php echo $boisson->getNom(); ?></td>
                                <td><?php echo $boisson->getDescription(); ?></td>
                                <td><?php echo $boisson->getPrix_Boisson(); ?></td>
                                <td><a href="Modifications/modification.php?idBoisson=<?php echo $boisson->getId_Boisson();?>" class="far fa-edit"></a> <a href="" style="color:red" class="far fa-trash-alt"></a></td>
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
</body>

</html>