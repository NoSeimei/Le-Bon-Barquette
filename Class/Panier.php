<?php
class Panier{

    public function __construct(){
        if(!isset($_SESSION)){
            sesssion_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }

    public function add($product_id){
        $_SESSION['panier'][$product_id] = 1;
    }
}
?>