<?php
class Boisson{

private $Image;
private $Nom;
private $Description;
private $Prix_Boisson;



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
 * Get the value of Prix_Boisson
 */ 
public function getPrix_Boisson()
{
return $this->Prix_Boisson;
}

/**
 * Set the value of Prix_Boisson
 *
 * @return  self
 */ 
public function setPrix_Boisson($Prix_Boisson)
{
$this->Prix_Boisson = $Prix_Boisson;

return $this;
}

}


?>