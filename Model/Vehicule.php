<?php


class  Vehicule extends Verification{
    
    private  string $numeroImmatriculation , $anneeCirculation , $marque  , $type , $puissance , $série , $etat;

    public function __construct( $numeroImmatriculation = false, $anneeCirculation= false, $marque= false , $type= false , $puissance= false , $série= false , $etat= false ){
        $this->numeroImmatriculation = $numeroImmatriculation;
        $this->anneeCirculation = $anneeCirculation;
        $this->marque = $marque;
        $this->type = $type;
        $this->puissance = $puissance;
        $this->série = $série;
        $this->etat = $etat;
    }

    /**
     * Get the value of numeroImmatriculation
     */ 
    public function getNumeroImmatriculation()
    {
        return $this->numeroImmatriculation;
    }

    /**
     * Set the value of numeroImmatriculation
     *
     * @return  self
     */ 
    public function setNumeroImmatriculation($numeroImmatriculation)
    {
        $this->numeroImmatriculation = $numeroImmatriculation;

        return $this;
    }

    /**
     * Get the value of anneeCirculation
     */ 
    public function getAnneeCirculation()
    {
        return $this->anneeCirculation;
    }

    /**
     * Set the value of anneeCirculation
     *
     * @return  self
     */ 
    public function setAnneeCirculation($anneeCirculation)
    {
        $this->anneeCirculation = $anneeCirculation;

        return $this;
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

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
     * Get the value of puissance
     */ 
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Set the value of puissance
     *
     * @return  self
     */ 
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Get the value of série
     */ 
    public function getSérie()
    {
        return $this->série;
    }

    /**
     * Set the value of série
     *
     * @return  self
     */ 
    public function setSérie($série)
    {
        $this->série = $série;

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
    public function findById($idV) {
        $sql ="SELECT * FROM vehicule WHERE idVehicule=:idV";
        $stmt= $this->Connection()->prepare($sql);
        $stmt->bindValue(':idV',$idV,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
}
}   
?>