<?php 
    require 'connexion.php';
    require 'Class/Panier.php';
    $panier = new Panier();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $db->query("SELECT Id_Boisson FROM boisson WHERE Id_Boisson=$id");
        
        if(empty($result)){
            die("Ce produits n'existe pas");
        }
        $panier->add($id);
        var_dump($panier);
    }
?>