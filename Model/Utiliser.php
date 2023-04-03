<?php

class  Utiliser{
    
    private  int $idIntervention , $idPiece , $quantite;

    public function __construct($idIntervention = false, $idPiece= false, $quantite=false){
        $this->idIntervention = $idIntervention;
        $this->idPiece = $idPiece;
        $this->quantite = $quantite;
    }



    public function __construct1( $idIntervention = false, $idPiece = false, $quantite= false){
        $this->idIntervention = $idIntervention;
        $this->idPiece = $idPiece;
        $this->quantite = $quantite;
    }
    

    /**
     * Get the value of idIntervention
     */ 
    public function getIdIntervention()
    {
        return $this->idIntervention;
    }

    /**
     * Set the value of idIntervention
     *
     * @return  self
     */ 
    public function setIdIntervention($idIntervention)
    {
        $this->idIntervention = $idIntervention;

        return $this;
    }

    /**
     * Get the value of idPiece
     */ 
    public function getIdPiece()
    {
        return $this->idPiece;
    }

    /**
     * Set the value of idPiece
     *
     * @return  self
     */ 
    public function setIdPiece($idPiece)
    {
        $this->idPiece = $idPiece;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
}   
?>