<?php
include("../connexion.php");
include("../Class/Clients.php");
include("../Class/Entree.php");
include("../Class/Plats.php");
include("../Class/Dessert.php");
include("../Class/Boisson.php");
include("../Class/Admin.php");
include("../Function/Function.php");

/****************** CHECK ***********************/  
if(isset($_GET["idEntree"])){
    $id = $_GET["idEntree"];
    $idName = "idEntree";
    $title = "Entrée";
}elseif(isset($_GET["idPlat"])){
    $id = $_GET["idPlat"];
    $idName = "idPlat";
    $title = "Plat";  
}elseif(isset($_GET["idDessert"])){
    $id = $_GET["idDessert"];
    $idName = "idDessert";
    $title = "Dessert";
}elseif(isset($_GET["idBoisson"])){
    $id = $_GET["idBoisson"];
    $idName = "idBoisson";
    $title = "Boisson";
}
/***********************************************/ 

/****************** INSERT ********************/  

if(isset($_POST["idEntree"]))
{
    $entree = new Entree();

    $entree->setNom($_POST["Nom"]);
    $entree->setDescription($_POST["Description"]);
    $entree->setPrix_Entree($_POST["Prix"]);
    $entree->setDeleted(0);
    try{
    $request = $db->prepare("INSERT INTO entree (Nom, Description, Prix_Entree, Deleted)
    VALUES (:Nom, :Description, :Prix_Entree, :Deleted)");
    $request->execute(dismount($entree));
    header("Location: ../Admin/admin.php");
    }catch(Exception $ex)
    {
      echo $ex;
    }

}else if(isset($_POST["idPlat"])){
    $plat = new Plats();

    $plat->setNom($_POST["Nom"]);
    $plat->setDescription($_POST["Description"]);
    $plat->setPrix_Plat($_POST["Prix"]);
    $plat->setDeleted(0);
    try{
    $request = $db->prepare("INSERT INTO plats (Nom, Description, Prix_Plat, Deleted)
    VALUES (:Nom, :Description, :Prix_Plat, :Deleted)");
    $request->execute(dismount($plat));
    header("Location: ../Admin/admin.php");
    }catch(Exception $ex)
    {
        echo $ex;
    }

}else if(isset($_POST["idDessert"])){
    $dessert = new Dessert();

    $dessert->setNom($_POST["Nom"]);
    $dessert->setDescription($_POST["Description"]);
    $dessert->setPrix_Dessert($_POST["Prix"]);
    $dessert->setDeleted(0);
    try{

    $request = $db->prepare("INSERT INTO dessert (Nom, Description, Prix_Dessert, Deleted)
    VALUES (:Nom, :Description, :Prix_Dessert, :Deleted)");
    $request->execute(dismount($dessert));
    header("Location: ../Admin/admin.php");
    }catch(Exception $ex)
    {
        echo $ex;
    }
}else if(isset($_POST["idBoisson"])){
    $boisson = new Boisson();

    $boisson->setNom($_POST["Nom"]);
    $boisson->setDescription($_POST["Description"]);
    $boisson->setPrix_Boisson($_POST["Prix"]);
    $boisson->setDeleted(0);
    try{
    $request = $db->prepare("INSERT INTO boisson (Nom, Description, Prix_Boisson, Deleted)
    VALUES (:Nom, :Description, :Prix_Boisson, :Deleted)");
    $request->execute(dismount($boisson));
    header("Location: ../Admin/admin.php");
    }catch(Exception $ex)
    {
        echo $ex;
    }
}


/**********************************************/ 

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Modification</title>
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

	<!-- Header -->
	<header>
	</header>
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../images/bg-title-page-02.jpg);">
		<h2 class="tit6 t-center">
			Ajouter
		</h2>
	</section>
	<!-- Reservation -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Ajouter
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							<?php echo $title ?>
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="ajouter.php">
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
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="number" step="0.01" name="Prix" required="required" placeholder="Prix" >
								</div>
						</div>
					<div class="wrap-btn-booking flex-c-m m-t-6">
						<!-- Button3 -->
						<input type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" value="Ajouter">
						<input type="reset" class="btn3 flex-c-m size13 txt11 trans-0-4" style="margin-left: 30px;" name="Annuler" value="Effacer">
                        <input type="hidden" value="<?php echo $id; ?>" name="<?php echo $idName; ?>">
					</div>
					<div class="wrap-btn-booking flex-c-m m-t-6" style="margin-top: 60px;">
					<button type="submit" href="../Admin/admin.php" class="btn3 flex-c-m size13 txt11 trans-0-4">Retour</button>
					</div>
				</div>
				</form>
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