<?php

class Dessert{

private $Id_Dessert;
private $Image;
private $Nom;
private $Description;
private $Prix_Dessert;
private $Deleted;


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
 * Get the value of Prix_Dessert
 */ 
public function getPrix_Dessert()
{
return $this->Prix_Dessert;
}

/**
 * Set the value of Prix_Dessert
 *
 * @return  self
 */ 
public function setPrix_Dessert($Prix_Dessert)
{
$this->Prix_Dessert = $Prix_Dessert;

return $this;
}

/**
 * Get the value of Id_Dessert
 */ 
public function getId_Dessert()
{
return $this->Id_Dessert;
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
