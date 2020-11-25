<?php
include("../connexion.php");
include("../Class/Clients.php");
include("../Class/Entree.php");
include("../Class/Plats.php");
include("../Class/Dessert.php");
include("../Class/Boisson.php");
include("../Class/Menus.php");
include("../Class/Admin.php");
include("../Function/Function.php");

try {
    $request = $db->query("SELECT * FROM entree");
    $request->setFetchMode(PDO::FETCH_CLASS, 'Entree');
    $lesEntree = $request->fetchAll();
} catch (Exception $exE) {
    echo $exE;
}

try {
    $request2 = $db->query("SELECT * FROM plats");
    $request2->setFetchMode(PDO::FETCH_CLASS, 'Plats');
    $lesPlats = $request2->fetchAll();
} catch (Exception $exP) {
    echo $exP;
}

try {
    $request3 = $db->query("SELECT * FROM dessert");
    $request3->setFetchMode(PDO::FETCH_CLASS, 'Dessert');
    $lesDesserts = $request3->fetchAll();
} catch (Exception $exD) {
    echo $exD;
}

try {
    $request4 = $db->query("SELECT * FROM boisson");
    $request4->setFetchMode(PDO::FETCH_CLASS, 'Boisson');
    $lesBoissons = $request4->fetchAll();
} catch (Exception $exB) {
    echo $exB;
}

if(isset($_POST["Nom"])){

    $menu = new Menus;
    $menu->setNom($_POST["Nom"]);
    $menu->setDescription($_POST["Description"]);
    $menu->setPrix($_POST["Prix"]);
    $menu->setId_Entree($_POST["entree"]);
    $menu->setId_Plat($_POST["plat"]);
    $menu->setId_Dessert($_POST["dessert"]);
    $menu->setId_Boisson($_POST["boisson"]);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reservation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../images/bg-title-page-02.jpg);">
        <h2 class="tit6 t-center">
            Création
        </h2>
    </section>

    <!-- Reservation -->
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">


            <div class="t-center">
                <span class="tit2 t-center">
                    Création
                </span>

                <h3 class="tit3 t-center m-b-35 m-t-2">
                    MENU
                </h3>
                </br>
            </div>


            <div class="col-lg-12 p-b-30">

                <form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="ajouter_menu.php">
                    <div class="row">
                        <!-- Nom -->
                        <span class="txt9">
                            Nom
                        </span>
                        <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="Nom" required="required" placeholder="Nom">
                        </div>
                        <!-- Description -->
                        <span class="txt9">
                            Description
                        </span>
                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="Description" placeholder="Description">
                        </div>
                        <!-- Prix -->
                        <span class="txt9">
                            Prix
                        </span>
                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="Prix" required="required" placeholder="Prix" step="any">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Time -->
                            <span class="txt9">
                                Entree
                            </span>
                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->

                                <select class="selection-1" name="entree">
                                    <?php foreach ($lesEntree as $lEntree) { ?> <option value="<?php echo $lEntree->getId_Entree(); ?>"> <?php echo $lEntree->getNom(); ?></option> <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Time -->
                            <span class="txt9">
                                Plat
                            </span>
                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->

                                <select class="selection-1" name="plat">
                                    <?php foreach ($lesPlats as $lePlat) { ?> <option value="<?php echo $lePlat->getId_Plat(); ?>"> <?php echo $lePlat->getNom(); ?></option> <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Time -->
                            <span class="txt9">
                                Dessert
                            </span>
                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->

                                <select class="selection-1" name="dessert">
                                    <?php foreach ($lesDesserts as $leDessert) { ?> <option value="<?php echo $leDessert->getId_Dessert(); ?>"> <?php echo $leDessert->getNom(); ?></option> <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Time -->
                            <span class="txt9">
                                Boisson
                            </span>
                            <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <!-- Select2 -->

                                <select class="selection-1" name="boisson">
                                    <?php foreach ($lesBoissons as $laBoisson) { ?> <option value="<?php echo $laBoisson->getId_Boisson(); ?>"> <?php echo $laBoisson->getNom(); ?></option> <?php } ?>
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="wrap-btn-booking flex-c-m m-t-6">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                            commander
                        </button>
                </form>
            </div>
        </div>
        </div>

        </div>

        </div>
    </section>


    <!-- Footer -->
    <footer class="bg1">

        <div class="end-footer bg2">
            <div class="container">
                <div class="flex-sb-m flex-w p-t-22 p-b-22">
                    <div class="txt17 p-r-20 p-t-5 p-b-5">
                        Copyright &copy; </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>



    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="../js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/parallax100/parallax100.js"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script src="../js/main.js"></script>

</body>

</html>