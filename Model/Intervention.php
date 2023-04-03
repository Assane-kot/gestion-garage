<?php

class  Intervention{
    
    private  string $dateDebut, $dateFin, $type, $observation;
    private int $demandeIntervention;
    public function __construct( $dateDebut= false, $dateFin = false,  $type= false, $demandeIntervention= false, $observation= false){
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->type = $type;+
        $this->demandeIntervention = $demandeIntervention;
        $this->observation = $observation;
    }

   

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
    /**
     * Get the value of demandeIntervention
     */ 
    public function getDemandeIntervention()
    {
        return $this->demandeIntervention;
    }

    /**
     * Set the value of demandeIntervention
     *
     * @return  self
     */ 
    public function setDemandeIntervention($demandeIntervention)
    {
        $this->demandeIntervention = $demandeIntervention;

        return $this;
    }

    /**
     * Get the value of observation
     */ 
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set the value of observation
     *
     * @return  self
     */ 
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }
}   
?>