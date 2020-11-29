<?php 
    include('connexion.php');
    include('Class/Panier_class.php');
    $panier = new Panier();

    if (isset($_SESSION['panier'])){
        for( $i = 0; $i < count( $_SESSION['panier'] ); $i++ ){
        $id = $_SESSION['panier'][$i]['Id'];
        $type = $_SESSION['panier'][$i]['Type'];  
        }
        if($type = "boisson"){
        $result = $db->query("SELECT Id_Boisson FROM boisson WHERE Id_Boisson=$id");
    
        }
        else if($type = "entree"){
            $result = $db->query("SELECT Id_Entree FROM entree WHERE Id_Entree=$id");
           
            var_dump($_SESSION['panier']);
            }
        else if($type = "plat"){
            $result = $db->query("SELECT Id_Plat FROM plat WHERE Id_Plat=$id");
           
            } 
        else if($type = "dessert"){
            $result = $db->query("SELECT Id_Dessert FROM dessert WHERE Id_Dessert=$id");
           
            }
        else if(empty($result)){
            die("Ce produits n'existe pas");
        
        }
        // header('location: index.php');
    }
?>