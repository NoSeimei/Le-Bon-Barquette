<?php

class Clients{

private $Id_Client;  
private $Nom;
private $Prenom;
private $Telephone;
private $Email;
private $Identifiant;
private $Password;
private $Deleted;



/**
 * Get the value of Nom
 */ 
public function getNom()
{
return $this->Nom;
}

/**
 * Set the value of Nom
 *
 * @return  self
 */ 
public function setNom($Nom)
{
$this->Nom = $Nom;

return $this;
}

/**
 * Get the value of Prenom
 */ 
public function getPrenom()
{
return $this->Prenom;
}

/**
 * Set the value of Prenom
 *
 * @return  self
 */ 
public function setPrenom($Prenom)
{
$this->Prenom = $Prenom;

return $this;
}

/**
 * Get the value of Telephone
 */ 
public function getTelephone()
{
return $this->Telephone;
}

/**
 * Set the value of Telephone
 *
 * @return  self
 */ 
public function setTelephone($Telephone)
{
$this->Telephone = $Telephone;

return $this;
}

/**
 * Get the value of Email
 */ 
public function getEmail()
{
return $this->Email;
}

/**
 * Set the value of Email
 *
 * @return  self
 */ 
public function setEmail($Email)
{
$this->Email = $Email;

return $this;
}

/**
 * Get the value of Identifiant
 */ 
public function getIdentifiant()
{
return $this->Identifiant;
}

/**
 * Set the value of Identifiant
 *
 * @return  self
 */ 
public function setIdentifiant($Identifiant)
{
$this->Identifiant = $Identifiant;

return $this;
}

/**
 * Get the value of Password
 */ 
public function getMotDePasse()
{
return $this->Password;
}

/**
 * Set the value of Password
 *
 * @return  self
 */ 
public function setMotDePasse($Password)
{
$this->Password = $Password;

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