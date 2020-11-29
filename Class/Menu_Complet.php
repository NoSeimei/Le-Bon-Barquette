<?php 
class Menu_Complet{

    private $Id_Menu;
    private $Nom;
    private $description;
    private $prix;
    private $entree;
    private $plat;
    private $dessert;
    private $boisson;


    /**
     * Get the value of Id_Menu
     */ 
    public function getId_Menu()
    {
        return $this->Id_Menu;
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of entree
     */ 
    public function getEntree()
    {
        return $this->entree;
    }

    /**
     * Set the value of entree
     *
     * @return  self
     */ 
    public function setEntree($entree)
    {
        $this->entree = $entree;

        return $this;
    }

    /**
     * Get the value of plat
     */ 
    public function getPlat()
    {
        return $this->plat;
    }

    /**
     * Set the value of plat
     *
     * @return  self
     */ 
    public function setPlat($plat)
    {
        $this->plat = $plat;

        return $this;
    }

    /**
     * Get the value of dessert
     */ 
    public function getDessert()
    {
        return $this->dessert;
    }

    /**
     * Set the value of dessert
     *
     * @return  self
     */ 
    public function setDessert($dessert)
    {
        $this->dessert = $dessert;

        return $this;
    }

    /**
     * Get the value of boisson
     */ 
    public function getBoisson()
    {
        return $this->boisson;
    }

    /**
     * Set the value of boisson
     *
     * @return  self
     */ 
    public function setBoisson($boisson)
    {
        $this->boisson = $boisson;

        return $this;
    }
    }

   






?>