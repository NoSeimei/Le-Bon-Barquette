<?php

class Menus{

private $Id_Menu;
private $Image;
private $Nom;
private $Description;
private $Id_Entree;
private $Id_Plats;
private $Id_Dessert;
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
 * Get the value of Id_Entree
 */ 
public function getId_Entree()
{
return $this->Id_Entree;
}

/**
 * Set the value of Id_Entree
 *
 * @return  self
 */ 
public function setId_Entree($Id_Entree)
{
$this->Id_Entree = $Id_Entree;

return $this;
}

/**
 * Get the value of Id_Plats
 */ 
public function getId_Plats()
{
return $this->Id_Plats;
}

/**
 * Set the value of Id_Plats
 *
 * @return  self
 */ 
public function setId_Plats($Id_Plats)
{
$this->Id_Plats = $Id_Plats;

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
 * Set the value of Id_Dessert
 *
 * @return  self
 */ 
public function setId_Dessert($Id_Dessert)
{
$this->Id_Dessert = $Id_Dessert;

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