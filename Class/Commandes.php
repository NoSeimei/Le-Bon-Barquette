<?php

class Commandes{

private $Id_Commande;    
private $dateCommande;
private $PrixCommande;
private $Id_Client;
private $Id_Menu;
private $Deleted;


/**
 * Get the value of dateCommande
 */ 
public function getDateCommande()
{
return $this->dateCommande;
}

/**
 * Set the value of dateCommande
 *
 * @return  self
 */ 
public function setDateCommande($dateCommande)
{
$this->dateCommande = $dateCommande;

return $this;
}

/**
 * Get the value of PrixCommande
 */ 
public function getPrixCommande()
{
return $this->PrixCommande;
}

/**
 * Set the value of PrixCommande
 *
 * @return  self
 */ 
public function setPrixCommande($PrixCommande)
{
$this->PrixCommande = $PrixCommande;

return $this;
}

/**
 * Get the value of Id_Client
 */ 
public function getId_Client()
{
return $this->Id_Client;
}

/**
 * Set the value of Id_Client
 *
 * @return  self
 */ 
public function setId_Client($Id_Client)
{
$this->Id_Client = $Id_Client;

return $this;
}

/**
 * Get the value of Id_Menu
 */ 
public function getId_Menu()
{
return $this->Id_Menu;
}

/**
 * Set the value of Id_Menu
 *
 * @return  self
 */ 
public function setId_Menu($Id_Menu)
{
$this->Id_Menu = $Id_Menu;

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
 * Get the value of Deleted
 */ 
public function getDeleted()
{
return $this->Deleted;
}

/**
 * Set the value of Deleted
 *
 * @return  self
 */ 
public function setDeleted($Deleted)
{
$this->Deleted = $Deleted;

return $this;
}
}

?>