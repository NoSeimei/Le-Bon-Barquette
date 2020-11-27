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

if (isset($_GET["iduser"])) {
    echo  " <script>
    window.onload = function() 
      {
        verif();
      }; 
    </script>";
    try {
        $IdClient = $_GET["iduser"];
        $Deleted = 1;
        $request = $db->prepare("UPDATE clients SET Deleted = :Deleted
        WHERE Id_Client= :IdClient");
        $request->execute(array('Deleted' => $Deleted,'IdClient' => $IdClient));
        header("Location: utilisateurC.php");	
        
    }
    catch (Exception $ex) 
    {
	
    echo $ex;
    }
}
?>
<script src="js/main.js"></script>
    <script src="sweetalert2.all.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  	<script src="js/sweet.js"></script>