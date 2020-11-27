<?php 
    include('connexion.php');
    include('Class/Panier.php');
    $panier = new Panier();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $type = $_GET['type'];
        if($type = "boisson"){
        $result = $db->query("SELECT Id_Boisson FROM boisson WHERE Id_Boisson=$id");
        header('location: panier.php');
        }
        else if($type = "entree"){
            $result = $db->query("SELECT Id_Entree FROM entree WHERE Id_Entree=$id");
            header('location: panier.php');
            }
        else if($type = "plat"){
            $result = $db->query("SELECT Id_Plat FROM plat WHERE Id_Plat=$id");
            header('location: panier.php');
            } 
        else if($type = "dessert"){
            $result = $db->query("SELECT Id_Dessert FROM dessert WHERE Id_Dessert=$id");
            header('location: panier.php');
            }
        else if(empty($result)){
            die("Ce produits n'existe pas");
            header('location: index.php');
        }
        
    }
?>