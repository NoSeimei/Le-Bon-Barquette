<?php

class Passe_boisson{

private $Id_Commande;
private $Id_Boisson;
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
 * Get the value of Id_Boisson
 */ 
public function getId_Boisson()
{
return $this->Id_Boisson;
}
}
