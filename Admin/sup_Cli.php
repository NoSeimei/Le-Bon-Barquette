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