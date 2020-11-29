<?php 
include("connexion.php");
if(isset($_SESSION['ident2'])&& isset($_SESSION['nom2']) && isset($_SESSION['prenom2'])){
    $_SESSION['ok']="tuesco";
}
else
{
    $_SESSION['ok']="";
    //header('location: index.php');
}
if(!empty($_SESSION["panier"])){
	$LesPaniers = $_SESSION["panier"];
    
}

if(isset($_GET["idArray"])){
	$id = $_GET["idArray"];
	unset($LesPaniers[$id]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Accueil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="fontawesome-free-5.15.1-web/css/all.css" rel="stylesheet">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<body class="animsition" style="display:grid">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<span class="tit2 t-center">
								Le Bon Barquette
							</span>
						</div>


					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="index.php">Accueil</a>
								</li>
								<li>
									<a href="login.php">Se connecter</a>
								</li>
								<li>
									<a href="panier.php"> <i class="fas fa-shopping-cart fa-2x"></i></a>
								</li>
							</ul>
						</nav>
					</div>

					<div class="social flex-w flex-l-m p-r-20">
						<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="index.html" class="txt19">Acceuil</a>
			</li>
			
			<li class="t-center">
				<!-- Button3 -->
				<a href="formulaire_connexion.php" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Se connecter
				</a>
			</li>

		</ul>

		<!-- - -->
	</aside>
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
		<h2 class="tit6 t-center">
			Panier
		</h2>
	</section>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Produits</th>
                            
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach($LesPaniers as $idArray => $lesValeurs){
						if(isset($lesValeurs["prixEntree"])){
							$total = 0;
								$total = $total + $lesValeurs["prixEntree"];
							}elseif(isset($lesValeurs["prixPlat"])){
								$total = $total + $lesValeurs["prixPlat"];
						}elseif(isset($lesValeurs["prixDessert"])){
							$total = $total + $lesValeurs["prixDessert"];
					}elseif(isset($lesValeurs["prixBoisson"])){
						$total = $total + $lesValeurs["prixBoisson"];
				}
					//echo $lesValeurs["idEntree"]; ?>
						<?php if(isset($lesValeurs["idEntree"])) { 
							$countE =+ 1;
							?>
                        <tr>
                            <td><?php echo $lesValeurs["nomEntree"]; ?></td>
                            <td><?php echo $countE ?></td>
                            <td class="text-right"><?php echo $lesValeurs["prixEntree"]; ?> €</td>
                            <td class="text-right"><a href="panier.php?idArray=<?php echo $idArray ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
						</tr>
						<?php } ?>
						<?php if(isset($lesValeurs["idPlat"])) {
								$countP += 1;
								?>
						<tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td><?php echo $lesValeurs["nomPlat"]; ?></td>
                            <td>1</td>
                            <td class="text-right"><?php echo $lesValeurs["prixPlat"]; ?> €</td>
                            <td class="text-right"><a href="panier.php?idArray=<?php echo $idArray ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
						</tr>
						<?php } ?>
						<?php if(isset($lesValeurs["idDessert"])) {
								$countD =+ 1;?>
						<tr>
                            <td><?php echo $lesValeurs["nomDessert"]; ?></td>
                            <td><?php echo $countD ?></td>
                            <td class="text-right"><?php echo $lesValeurs["prixDessert"]; ?> €</td>
                            <td class="text-right"><a href="panier.php?idArray=<?php echo $idArray ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
						</tr>
						<?php } ?>
						<?php if(isset($lesValeurs["idBoisson"])) {
								$countB =+ 1;?>
						<tr>
                            <td><?php echo $lesValeurs["nomBoisson"]; ?></td>
                            <td><?php echo $countB ?></td>
                            <td class="text-right"><?php echo $lesValeurs["prixBoisson"]; ?> €</td>
                            <td class="text-right"><a href="panier.php?idArray=<?php echo $idArray ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
						</tr>
						<?php } ?>
					<?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo $total?> €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a  href="index.php"  class="btn btn-block btn-light">Retourner au menu</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-block btn-success">Procéder au paiement</a>
                </div>
            </div>
        </div>
    </div>
</div>


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-70 p-b-70">

	</div>


	<!-- Footer -->
	<footer class="bg1">
		
		</div>

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
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
