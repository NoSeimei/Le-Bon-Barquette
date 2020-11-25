<?php

class Passer_commandes{

private $Id_Commande;
private $Id_Menu;
private $quantité;


/**
 * Get the value of quantité
 */ 
public function getQuantité()
{
return $this->quantité;
}

/**
 * Set the value of quantité
 *
 * @return  self
 */ 
public function setQuantité($quantité)
{
$this->quantité = $quantité;

return $this;
}

/**
 * Get the value of Id_Commande
 */ 
public function getId_Commande()
{
return $this->Id_Commande;
}

/**
 * Get the value of Id_Menu
 */ 
public function getId_Menu()
{
return $this->Id_Menu;
}
}

?>