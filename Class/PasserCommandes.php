<?php

class PasserCommandes{

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
}

?>