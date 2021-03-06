<?php


//on teste la session 
include('connexion.php');
if(isset($_SESSION['ident2'])&& isset($_SESSION['nom2']) && isset($_SESSION['prenom2'])){
	$_SESSION['ok']="tuesco";
}
else
{
    $_SESSION['ok']="";
    header('location: index.php');
}
if(!isset($leClient)){
    $leClient = "";
          $nomC ="";
          $prenomC="";
          $mailC="";
          $identC="";
          $telephoneC="";
}

include('Class/Clients.php');
include("Function/Function.php");

if(!isset($_SESSION['nom'])){
	
	$_SESSION['nom']="";
	$_SESSION['prenom']="";
	$_SESSION['tel']="";
	$_SESSION['mail']="";
}

	
		 
		try{ 
            //on selectionne le client qu'on veut modifier ici le client lui même
            $uncli = $_SESSION['leClient2'];
		    $requete = $db->query("SELECT * FROM `clients` WHERE Identifiant = $uncli");
		    $requete->setFetchMode(PDO::FETCH_CLASS, 'Clients');
		    $client = $requete->fetchAll();


            $leClient = $_SESSION['leClient2'];
            $nomC= $_SESSION['nom2'];
            $prenomC= $_SESSION['prenom2'];
            $mailC= $_SESSION['mail2'];
            $identC= $_SESSION['ident2'];
            $telephoneC= $_SESSION['telephone2'] ;
			//si seul le numero de téléphone est modifier on fais en sorte de modifier seulemetn le téléphone dans la bdd
         if (isset($_POST['phone']) && !isset($_POST['pass2'])){
             
            $phone= $_POST["phone"];
           $request = $db->prepare("UPDATE clients SET Telephone = :Telephone
           WHERE Id_Client= :IdClient");
           $request->execute(array('Telephone'=>$phone,'IdClient'=>$leClient));
           $_SESSION['telephone2'] = $phone;
           $telephoneC= $_SESSION['telephone2'] ;
		 }
		 //ici on vérifie que le mdp est bien renseigné puis on vérifie que les deux mdp soient egaux
         elseif(isset($_POST['pass2']) && isset($_POST['confpass'])){
             $confpass=$_POST['confpass'];
             $passw= $_POST['pass2'];

             if($passw === $confpass){
                $phone= $_POST["phone"];
                $request2 = $db->prepare("UPDATE clients SET Telephone = :Telephone, Password = MD5(:Password)
                WHERE Id_Client= :IdClient");
                $request2->execute(array('Telephone'=>$phone,'Password'=>$passw,'IdClient'=>$leClient));
                $_SESSION['telephone2'] = $phone;
                $telephoneC= $_SESSION['telephone2'] ;
             }
             else{
                echo  " <script>
                    mafonction3();
                </script>";
             }
            
         }
         
		  
		  /*
			  
			if (empty($client) ) {
				
				$client = new Clients();
				$client->setTelephone($_POST["phone"]);
				$client->setPassword($_POST["pass"]);
			   $request = $db->prepare("UPDATE clients Telephone = '$client->getTelephone()',Password ='$client->getPassword()'
			   WHERE Id_Client=$leClient");
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
				
			
			}*/
			
			
				

			//////////////////
		
		 }
		 
		
		catch(Exception $ex){
	  
			echo $ex;
	  
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
</head>
<body class="animsition" style="display:grid;">

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
										<a href="modificationC.php">mon compte</a>
									</li>
									<li>
										<a href="deco.php">Déconnexion</a>
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
			<br>	<li class="t-center m-b-13">
					<a href="index.html" class="txt19">Acceuil</a>
				</li>
				
	
			<br>	<li class="t-center">
					<!-- Button3 -->
					<a href="modificationC.php" class="txt19">
						Mon compte
					</a>
				</li>
			<br>	<li class="t-center">
					<!-- Button3 -->
					<a href="deco.php" class="txt19">
						Déconnexion
					</a>
				</li>
			<br>	<li class="t-center">
					<!-- Button3 -->
					<a href="panier.php"> <i class="fas fa-shopping-cart fa-2x"></i></a>
				</li>
	
			</ul>
	
			<!-- - -->
		</aside>
    <!-- Booking -->

	<section class="section-booking bg1-pattern p-t-100 p-b-110" style="margin-top:auto; margin-bottom:auto;" >
		<form nom="insc" action="modificationC.php" method="post" id="insc">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							mon compte
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
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="nom" name="nom" placeholder="Nom" value="<?php echo $nomC;?>"readonly="true">
								</div>

								<span class="txt9">
									téléphone
								</span>

								<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="phone" placeholder="Téléphone" value="<?php echo $telephoneC; ?>">
								</div>

								<span class="txt9">
									identifiant
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="ident" placeholder="identifiant" value="<?php echo $identC; ?>" readonly="true">
								</div>
							</div>

							<div class="col-md-6">
								<!-- Name -->
								<span class="txt9">
									Prenom
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="prenom" placeholder="Prenom" value="<?php echo $prenomC; ?>"readonly="true">
								</div>

								<!-- Email -->
								<span class="txt9">
									Email
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input required="required" class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email" value="<?php echo $mailC; ?>"readonly="true">
								</div>

								<!-- Email -->
								<span class="txt9">
									Mot de passe 
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input  class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pass2" placeholder="Mot de passe">
								</div>
                                <!-- Email -->
								<span class="txt9">
									Confirmation 
								</span>

								<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input  class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="confpass" placeholder="Mot de passe" >
								</div>

							</div>
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="button" name="insc" class="btn3 flex-c-m size13 txt11 trans-0-4" onclick="verif();">
								Modifier
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