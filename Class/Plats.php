<?php

class Plats{

private $Id_Plat;
private $Nom;
private $Description;
private $Prix_Plat;
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
 * Get the value of Description
 */ 
public function getDescription()
{
return $this->Description;
}

/**
 * Set the value of Description
 *
 * @return  self
 */ 
public function setDescription($Description)
{
$this->Description = $Description;

return $this;
}

/**
 * Get the value of Prix_Plat
 */ 
public function getPrix_Plat()
{
return $this->Prix_Plat;
}

/**
 * Set the value of Prix_Plat
 *
 * @return  self
 */ 
public function setPrix_Plat($Prix_Plat)
{
$this->Prix_Plat = $Prix_Plat;

return $this;
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

/**
 * Get the value of Id_Plat
 */ 
public function getId_Plat()
{
return $this->Id_Plat;
}
}

?>