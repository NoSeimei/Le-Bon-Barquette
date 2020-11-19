<?php

class Plats{

private $Image;
private $Nom;
private $Description;
private $Prix_Plat;


/**
 * Get the value of Image
 */ 
public function getImage()
{
return $this->Image;
}

/**
 * Set the value of Image
 *
 * @return  self
 */ 
public function setImage($Image)
{
$this->Image = $Image;

return $this;
}

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
}

?>