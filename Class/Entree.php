<?php

class Entree{

private $Id_Entree;
private $Nom;
private $Description;
private $Prix_Entree;
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
 * Get the value of Prix_Entree
 */ 
public function getPrix_Entree()
{
return $this->Prix_Entree;
}

/**
 * Set the value of Prix_Entree
 *
 * @return  self
 */ 
public function setPrix_Entree($Prix_Entree)
{
$this->Prix_Entree = $Prix_Entree;

return $this;
}

/**
 * Get the value of Id_Entree
 */ 
public function getId_Entree()
{
return $this->Id_Entree;
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