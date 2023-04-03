<?php

class  DemandeIntervention{
    
    private  string $date, $vehicule, $commentaire, $etat;
    private int $kilometrage, $demandeur;
    public function __construct( $date= false, $kilometrage = false, $demandeur = false, $vehicule= false, $commentaire= false, $etat= false){
        $this->date = $date;
        $this->kilometrage = $kilometrage;
        $this->demandeur = $demandeur;
        $this->vehicule = $vehicule;
        $this->commentaire = $commentaire;
        $this->etat = $etat;
    }
   

    /**
     * Get the value of kilometrage
     */ 
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set the value of kilometrage
     *
     * @return  self
     */ 
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of demandeur
     */ 
    public function getDemandeur()
    {
        return $this->demandeur;
    }

    /**
     * Set the value of demandeur
     *
     * @return  self
     */ 
    public function setDemandeur($demandeur)
    {
        $this->demandeur = $demandeur;

        return $this;
    }



    /**
     * Get the value of vehicule
     */ 
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set the value of vehicule
     *
     * @return  self
     */ 
    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
}   
?>