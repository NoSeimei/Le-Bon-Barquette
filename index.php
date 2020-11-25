<?php
include('connexion.php');
include('Class/Clients.php');
include('Class/Commandes.php');
include('Class/Dessert.php');
include('Class/Entree.php');
include('Class/Boisson.php');
include('Class/Menus.php');
include('Class/Plats.php');
include("Function/Function.php");

	try {
	$requete = $db->query("SELECT * from menus");
	$requete->setFetchMode(PDO::FETCH_CLASS,'Menus');
	$lesmenus=$requete->fetchAll();
	} catch (Exception $exM) {
	
		echo $exM;
	}
	//var_dump($lesmenus);
	try {
		$requete1 = $db->query("SELECT * FROM entree");
		$requete1->setFetchMode(PDO::FETCH_CLASS, 'Entree');
		$lesEntree = $requete1->fetchAll();
	} catch (Exception $exE) {
	
		echo $exE;
	}
	
	try {
		$requete2 = $db->query("SELECT * FROM plats");
		$requete2->setFetchMode(PDO::FETCH_CLASS, 'Plats');
		$lesPlats = $requete2->fetchAll();
	} catch (Exception $exP) {
	
		echo $exP;
	}
	
	try {
		$requete3 = $db->query("SELECT * FROM dessert");
		$requete3->setFetchMode(PDO::FETCH_CLASS, 'Dessert');
		$lesDesserts = $requete3->fetchAll();
	} catch (Exception $exD) {
	
		echo $exD;
	}

	try {
		$requete4 = $db->query("SELECT * FROM boisson");
		$requete4->setFetchMode(PDO::FETCH_CLASS, 'Boisson');
		$lesBoissons = $requete4->fetchAll();
	} catch (Exception $exB) {
	
		echo $exB;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Accueil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html">
							<img src="images/icons/logo.png" alt="IMG-LOGO" data-logofixed="images/icons/logo2.png">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="index.php">Accueil</a>
								</li>
								<li>
									<a href="reservation.php">Reservation</a>
								</li>
								<li>
									<a href="login.php">Se connecter</a>
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
				<a href="reservation.php" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Reservation
				</a>
			</li>

		<br>	<li class="t-center">
				<!-- Button3 -->
				<a href="formulaire_connexion.php" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Se connecter
				</a>
			</li>

		</ul>

		<!-- - -->
	</aside>

	<!-- Slide1 -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(images/slide1-01.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Bienvenue au
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							BON BARQUETTE
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
							<!-- Button1 -->
							<a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Voir le menu
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item2-slick1" style="background-image: url(images/master-slides-02.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Bienvenue au
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
							BON BARQUETTE
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
							<!-- Button1 -->
							<a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Voir le menu
							</a>
						</div>
					</div>
				</div>

				<div class="item-slick1 item3-slick1" style="background-image: url(images/master-slides-01.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Bienvenue au 
						</span>

						<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							BON BARQUETTE
						</h2>

						<div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
							<!-- Button1 -->
							<a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
								Voir le menu
							</a>
						</div>
					</div>
				</div>

			</div>

			<div class="wrap-slick1-dots"></div>
		</div>
	</section>

	<!-- Welcome -->
	<section class="section-welcome bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Le Bon Barquette Restaurant
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							Bienvenue
						</h3>

						<p class="t-center m-b-22 size3 m-l-r-auto">
						Le bon barquette, Un restaurant traditionnel qui vous propose une cuisine conviviale et familiale à base de produits en général, locaux et régionaux. Ce dernier vous permet de déguster les meilleurs mets issus de la gastronomie traditionnelle afin de retrouver les saveurs d'antan. Le tout avec un service irréprochable.						</p>

						<a href="about.html" class="txt4">
							En savoir davantage
							<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
						</a>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/our-story-01.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
		<h2 class="tit6 t-center">
			Nos Menus
		</h2>
	</section>


	<!-- Main menu -->
	<section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
					<div class="wrap-item-mainmenu p-b-22">
						<h3 class="tit-mainmenu tit10 p-b-25">
							ENTRÉE
						</h3>

						<!-- Item mainmenu -->
						<?php foreach($lesEntree as $entree) { ?>
						<div class="item-mainmenu m-b-36">
							<div class="flex-w flex-b m-b-3">
								
								<a href="#" class="name-item-mainmenu txt21">
								<?php echo $entree->getNom() ?>
								</a>

								<div class="line-item-mainmenu bg3-pattern"></div>

								<div class="price-item-mainmenu txt22">
								<?php echo $entree->getPrix_entree() ?> €
								<a href=""><img src="..\images\mettreaupanier.jpg" style = "width:30px; height:30px"> </img></a>
								</div>
							</div>

							<span class="info-item-mainmenu txt23">
							<?php echo $entree->getDescription() ?>
							</span>
						</div>
						<?php } ?>

					</div>

					<div class="wrap-item-mainmenu p-b-22">
						<h3 class="tit-mainmenu tit10 p-b-25">
							Boissons
						</h3>

						<!-- Item mainmenu -->
						<?php foreach($lesBoissons as $boisson) { ?>
						<div class="item-mainmenu m-b-36">
							<div class="flex-w flex-b m-b-3">	
								<a href="#" class="name-item-mainmenu txt21">
								<?php echo $boisson->getNom() ?> 
								</a>

								<div class="line-item-mainmenu bg3-pattern"></div>

								<div class="price-item-mainmenu txt22">
								<?php echo $boisson->getPrix_Boisson() ?> €
								<a href=""><img src=".\images\mettreaupanier.jpg" style = "width:30px; height:30px"> </img></a>
								</div>
							</div>

							<span class="info-item-mainmenu txt23">
							<?php echo $boisson->getDescription() ?>
							</span>
						</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
					<div class="wrap-item-mainmenu p-b-22">
						<h3 class="tit-mainmenu tit10 p-b-25">
							PLATS
						</h3>

						<!-- Item mainmenu -->
						<?php foreach($lesPlats as $plat) { ?>
						<div class="item-mainmenu m-b-36">
							<div class="flex-w flex-b m-b-3">
								<a href="#" class="name-item-mainmenu txt21">
								<?php echo $plat->getNom() ?>
								</a>

								<div class="line-item-mainmenu bg3-pattern"></div>

								<div class="price-item-mainmenu txt22">
								<?php echo $plat->getPrix_Plat() ?>
								<a href=""><img src=".\images\mettreaupanier.jpg" style = "width:80px; height:30px"> </img></a>
								</div>
							</div>

							<span class="info-item-mainmenu txt23">
							<?php echo $plat->getDescription() ?>
							</span>
						</div>
						<?php } ?>
					</div>

					<div class="wrap-item-mainmenu p-b-22">
						<h3 class="tit-mainmenu tit10 p-b-25">
							DESSERT
						</h3>

						<!-- Item mainmenu -->
						<?php foreach($lesDesserts as $dessert) { ?>
						<div class="item-mainmenu m-b-36">
							<div class="flex-w flex-b m-b-3">
								<a href="#" class="name-item-mainmenu txt21">
								<?php echo $dessert->getNom() ?>
								</a>

								<div class="line-item-mainmenu bg3-pattern"></div>

								<div class="price-item-mainmenu txt22">
								<?php echo $dessert->getPrix_dessert()  ?> €	
								<a href=""><img src=".\images\mettreaupanier.jpg" style = "width:30px; height:30px"> </img></a>
								</div>
							</div>

							<span class="info-item-mainmenu txt23">
							<?php echo $dessert->getDescription() ?>
							</span>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Lunch -->
	<section class="section-lunch bgwhite">
		<div class="header-lunch parallax0 parallax100" style="background-image: url(images/header-menu-01.jpg);">
			<div class="bg1-overlay t-center p-t-170 p-b-165">
				<h2 class="tit4 t-center">
					MENU DU JOUR
				</h2>
			</div>
		</div>

		<div class="container">
			<div class="row p-t-108 p-b-70">
				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<?php foreach($lesmenus as $menu) { ?>
					<div class="blo3 flex-w flex-col-l-sm m-b-30">

						<div class="text-blo3 size21 flex-col-l-m">
							<span class="txt21 m-b-3">
								<?php echo $menu->getNom() ?>
							</span>

							<span class="txt23">
							<?php echo $menu->getDescription() ?>
							</span>

							<span class="txt22 m-t-20">
							<?php echo $menu->getPrix() ?>€
							</span>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>


	<!-- Dinner -->
	<section class="section-dinner bgwhite">
		<div class="header-dinner parallax0 parallax100" style="background-image: url(images/header-menu-02.jpg);">
			<div class="bg1-overlay t-center p-t-170 p-b-165">
				<h2 class="tit4 t-center">
					Dinner
				</h2>
			</div>
		</div>

		<div class="container">
			<div class="row p-t-108 p-b-70">
				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-01.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Maecenas tristique
							</a>

							<span class="txt23">
								Aenean pharetra tortor dui in pellentesque
							</span>

							<span class="txt22 m-t-20">
								$29.79
							</span>
						</div>
					</div>

					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-03.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Pine nut sbrisalona
							</a>

							<span class="txt23">
								Aenean condimentum ante erat
							</span>

							<span class="txt22 m-t-20">
								$45.09
							</span>
						</div>
					</div>

					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-05.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Suspendisse eu
							</a>

							<span class="txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>

							<span class="txt22 m-t-20">
								$12.75
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-02.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Cras maximus
							</a>

							<span class="txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>

							<span class="txt22 m-t-20">
								$29.79
							</span>
						</div>
					</div>

					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-04.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Pine nut sbrisalona
							</a>

							<span class="txt23">
								Sed fermentum eros vitae eros
							</span>

							<span class="txt22 m-t-20">
								$45.09
							</span>
						</div>
					</div>

					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="images/dinner-06.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								Tempor malesuada
							</a>

							<span class="txt23">
								Duis massa nibh porttitor nec imperdiet eget
							</span>

							<span class="txt22 m-t-20">
								$12.75
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Sign up -->
	<div class="section-signup bg1-pattern p-t-85 p-b-85">

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
