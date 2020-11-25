<?php

class Menus{

private $Id_Menu;
private $Image;
private $Nom;
private $Description;
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
 * Get the value of Id_Menu
 */ 
public function getId_Menu()
{
return $this->Id_Menu;
}
}

?>