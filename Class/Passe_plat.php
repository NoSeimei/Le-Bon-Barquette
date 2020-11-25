<?php

class Passe_plat{

private $Id_Commande;   
private $Id_Plat;
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
 * Get the value of Id_Plat
 */ 
public function getId_Plat()
{
return $this->Id_Plat;
}
}
