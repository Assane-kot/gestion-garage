<?php

class  Piece{
    
    private  string $nomPiece , $reference , $quantite;

    public function __construct( $nomPiece = false, $reference= false, $quantite= false){
        $this->nomPiece = $nomPiece;
        $this->reference = $reference;
        $this->quantite = $quantite;
    }

    /**
     * Get the value of nomPiece
     */ 
    public function getNomPiece()
    {
        return $this->nomPiece;
    }

    /**
     * Set the value of nomPiece
     *
     * @return  self
     */ 
    public function setNomPiece($nomPiece)
    {
        $this->nomPiece = $nomPiece;

        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

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