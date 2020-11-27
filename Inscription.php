<?php


include("connexion.php");


include("Class/Clients.php");
include("Class/Admin.php");
include("Function/Function.php");
if(!isset($_SESSION['ident'])){
	$_SESSION['ident']="";
}
if(!isset($_SESSION['nom'])){
	
	$_SESSION['nom']="";
	$_SESSION['prenom']="";
	$_SESSION['tel']="";
	$_SESSION['mail']="";
}

if (isset($_POST["identifiant"]) && isset($_POST["password"])) {

  $user = $_POST["identifiant"];
  $pass = $_POST["password"];


  /*$request = $db->prepare("SELECT * FROM admin WHERE userAdmin = :userAdmin AND pass = :pass");
    $request->execute(array(':userAdmin' => $user, ':pass' => $pass));
    $resultat = $request->fetch();*/
    
	try {
		$requete = $db->query("SELECT * FROM `clients` WHERE Deleted =0 ");
		$requete->setFetchMode(PDO::FETCH_CLASS, 'Clients');
		$client = $requete->fetchAll();
		$pass = MD5($pass);
		foreach ($client as $theClient) {
			
		  if ($theClient->getIdentifiant() === $user && $theClient->getPassword() === $pass) {
			$_SESSION['ident2']= $theClient->getIdentifiant();
			$_SESSION['nom2']= $theClient->getNom();
			$_SESSION['prenom2']= $theClient->getPrenom();
			$_SESSION['leClient2'] = $theClient->getId_Client();
			$_SESSION['mail2'] = $theClient->getEmail();
			$_SESSION['telephone2'] = $theClient->getTelephone();

			header("Location: index.php");
			break;
		  } 
		  
		  else {
		  echo  " <script>
					window.onload = function() 
					  {
						mafonction();
					  }; 
				  </script>";
		  }
		}
	  } catch (Exception $ex) {
	
		echo $ex;
	  }
	}
	elseif (isset($_POST["nom"]))
	{
		 
		try{ 
		  /////////////////////////
		  $ident = $_POST["ident"];
		  $requete = $db->query("SELECT * FROM `clients` WHERE Identifiant = '$ident'");
		  $requete->setFetchMode(PDO::FETCH_CLASS, 'Clients');
		  $client = $requete->fetchAll();
		  
		  
			  
			if (empty($client) ) {
				
				$client = new Clients();
				$client->setNom($_POST["nom"]);
				$client->setPrenom($_POST["prenom"]);
				$client->setTelephone($_POST["phone"]);
				$client->setEmail($_POST["email"]);
				$client->setIdentifiant($_POST["ident"]);
				$client->setPassword($_POST["pass"]);
				$client->setDeleted(0);
				$_SESSION['nom']="";
				$_SESSION['prenom']="";
				$_SESSION['tel']="";
				$_SESSION['mail']="";
			   $request = $db->prepare("INSERT INTO clients (Nom,Prenom,Telephone,Email,Identifiant,Password, Deleted)
			   VALUES (:Nom,:Prenom,:Telephone,:Email,:Identifiant,MD5(:Password), :Deleted)");
			   $request->execute(dismountC($client));
			   $_SESSION['ident']=$client->getIdentifiant();
			   echo  " <script>
				window.onload = function() 
				  {
					validation();
				  }; 
			    </script>";
				
			}
			else
			{	
				$_SESSION['nom']=$_POST["nom"];
				$_SESSION['prenom']=$_POST["prenom"];
				$_SESSION['tel']=$_POST["phone"];
				$_SESSION['mail']=$_POST["email"];

				echo  " <script>
				window.onload = function() 
				  {
					mafonction2();
				  }; 
			    </script>";
				
			
			}
			
			
				

			//////////////////
		
		 }
		 
		
		catch(Exception $ex){
	  
			echo $ex;
	  
		}
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
    <!-- Booking -->
</br></br>
	<section class="section-booking bg1-pattern p-t-100 p-b-110">
	<form nom="conn" action="Inscription.php" method="post">
	<div class="container">
			<div class="row">
				<div class="col-lg-6 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Connexion
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Clients
						</h3>
					</div>

					<form class="wrap-form-booking">
						<div class="row">
							<div class="col-md-6">

								<span class="txt9">
									Identifiant
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="identifiant" placeholder="identifiant" value="<?php echo  $_SESSION['ident']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<!-- Name -->
								<span class="txt9">
									Mot de passe
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="mot de passe">
								</div>

							</div>
						</div>
						<div class="wrap-btn-booking flex-c-m m-t-6">

							<!-- Button3 -->
							<input type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4" value="Se connecter" ondblclick="RedirectionJavascript()">
							
						</div>
					</form>
				</div>

				<div class="col-lg-6 p-b-30 p-t-18">
					<div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/event-01.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
		</form>
		<form nom="insc" action="Inscription.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							Inscription
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Clients
						</h3>
					</div>

					<form class="wrap-form-booking">
						<div class="row">
							<div class="col-md-6">

								<span class="txt9">
									Nom
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo $_SESSION['nom']; ?>">
								</div>

								<span class="txt9">
									téléphone
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone" placeholder="Téléphone" value="<?php echo $_SESSION['tel']; ?>">
								</div>

								<span class="txt9">
									identifiant
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="ident" placeholder="identifiant">
								</div>
							</div>

							<div class="col-md-6">
								<!-- Name -->
								<span class="txt9">
									Prenom
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="prenom" placeholder="Prenom" value="<?php echo $_SESSION['prenom']; ?>">
								</div>

								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['mail']; ?>">
								</div>

								<!-- Email -->
								<span class="txt9">
									Mot de passe 
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pass" placeholder="Mot de passe">
								</div>

							</div>
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" name="insc" class="btn3 flex-c-m size13 txt11 trans-0-4">
								S'inscrire
							</button>
						</div>
					</form>
				</div>

				<div class="col-lg-6 p-b-30 p-t-18">
					<div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="images/booking-01.jpg" alt="IMG-OUR">
					</div>
				</div>
			</div>
		</div>
  		</form>
		
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
    <script src="sweetalert2.all.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  	<script src="js/sweet.js"></script>

</body>
</html>
	