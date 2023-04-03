<?php

class  User{
    
    private  string $prenom , $nom , $mail, $pwd, $profil;
    private int $iduser;

    public function __construct($prenom = false, $nom= false, $mail=false, $pwd=false, $profil=false){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->pwd = $pwd;
        $this->profil = $profil;
    }



    public function __construct1( $iduser = false, $prenom = false, $nom= false, $mail=false, $pwd=false, $profil=false){
        $this->iduser = $iduser;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->pwd = $pwd;
        $this->profil = $profil;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * Get the value of pwd
     */ 
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */ 
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of iduser
     */ 
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set the value of iduser
     *
     * @return  self
     */ 
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }
}   
?>