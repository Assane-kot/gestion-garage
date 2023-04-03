<?php

    @session_start();

    require_once('Model/DemandeIntervention.php');
    require_once('Model/Verification.php');

    class DemandeInterventionController extends Verification{
        
        public function getDemandeIntervention(){
            $sql = "SELECT idDemandeIntervention,
            d.date date, 
            d.kilometrage kilometrage, 
            usd.idUser idUsDem, 
            usd.nom nomDemandeur, 
            usd.prenom prenomDemandeur,
            usd.profil profilDemandeur,
            veh.numeroimmatriculation numeroimmatriculation,
            veh.marque marque,
            d.commentaire commentaire
            FROM `demandeIntervention` d 
            LEFT JOIN `user` usd on d.demandeur=usd.idUser
            LEFT JOIN `vehicule` veh on d.vehicule=veh.idVehicule";
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
        
        /**Fonction ajouter */

        public function addDemandeIntervention(DemandeIntervention $demandeIntervention) {
            
        /** commande d'insertion dans la base de donnees */
        $sql = "INSERT INTO `demandeIntervention` (`date`, `kilometrage`, `demandeur`, `vehicule`, `commentaire`, `etat`) 
                    VALUES (:date, :kilometrage, :demandeur, :vehicule, :commentaire, :'En Cours')";
                $connexion = $this->Connection();
                /**requettes prepare */
                $stmt = $connexion->prepare($sql);
                //var_dump($user->getLogin());die();
                $stmt->bindValue (':date',$demandeIntervention->getDate(),PDO::PARAM_STR);
                $stmt->bindValue (':kilometrage',$demandeIntervention->getKilometrage(),PDO::PARAM_INT);
                $stmt->bindValue (':demandeur',$demandeIntervention->getDemandeur(),PDO::PARAM_INT);
                $stmt->bindValue (':vehicule',$demandeIntervention->getVehicule(),PDO::PARAM_STR);
                $stmt->bindValue (':commentaire',$demandeIntervention->getCommentaire(),PDO::PARAM_STR);
                $stmt->bindValue (':etat',$demandeIntervention->getEtat(),PDO::PARAM_STR);
                $stmt->execute();
                header("location:../demandeIntervention");
                //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
                //header("Location:index.php");
            }

        // requette pour avoir les details de l'utilisateur
        public function findById($idD) {
            $sql ="SELECT * FROM `demandeintervention` WHERE `IdDemandeIntervention` =:idD";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idD',$idD,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function findByIdFull($idD) {
            $sql = "SELECT idDemandeIntervention,
            d.date dateIntervention, 
            d.kilometrage kilometrage, 
            demandeur,
            veh.numeroimmatriculation numeroimmatriculation,
            veh.marque marque,
            d.commentaire commentaire,
            veh.idVehicule idVehiculeDi
            FROM `demandeIntervention` d 
            LEFT JOIN `vehicule` veh on d.vehicule=veh.idVehicule
            WHERE d.idDemandeIntervention =:idD";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idD',$idD,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }
        

         // requette pour faire un update sur l'utilisateur 

        public function updateDemandeIntervention(DemandeIntervention $demandeIntervention,$idDemandeIntervention) {
            $sql = "UPDATE demandeIntervention SET date =:date, kilometrage =:kilometrage, demandeur =:demandeur, vehicule =:vehicule, commentaire =:commentaire WHERE idDemandeIntervention=:idDemandeIntervention" ;
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue (':date',$demandeIntervention->getDate(),PDO::PARAM_STR);
            $stmt->bindValue (':kilometrage',$demandeIntervention->getKilometrage(),PDO::PARAM_STR);
            $stmt->bindValue (':demandeur',$demandeIntervention->getDemandeur(),PDO::PARAM_INT);
            $stmt->bindValue (':vehicule',$demandeIntervention->getVehicule(),PDO::PARAM_INT);
            $stmt->bindValue (':commentaire',$demandeIntervention->getCommentaire(),PDO::PARAM_STR);
            $stmt->bindValue (':idDemandeIntervention',$idDemandeIntervention,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->execute()){
                header("location:../demandeIntervention");
            }
            else{
                header("location:../demandeIntervention");
            }
        }

        // supression de l'utilisateur

        public function delDemandeIntervention($idDemandeIntervention) {
            $sql="DELETE FROM demandeIntervention WHERE idDemandeIntervention=:idDemandeIntervention";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idDemandeIntervention',$idDemandeIntervention,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->execute()){
                header("location:../demandeIntervention");
            }
        }
        

        public function getUserDemandeur()
        {
            $sql = 'SELECT * FROM user where profil = "demandeur"';
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getUserIntervenant()
        {
            $sql = 'SELECT * FROM user where profil = "intervenant"';
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getDemandeInterventionDemandeur($idDemandeur){
            $sql = "SELECT idDemandeIntervention,
            d.date date, 
            d.kilometrage kilometrage, 
            usd.idUser idUsDem, 
            usd.nom nomDemandeur, 
            usd.prenom prenomDemandeur,
            usd.profil profilDemandeur,
            veh.numeroimmatriculation numeroimmatriculation,
            veh.marque marque,
            d.commentaire commentaire
            FROM `demandeIntervention` d 
            LEFT JOIN `user` usd on d.demandeur=usd.idUser
            LEFT JOIN `vehicule` veh on d.vehicule=veh.idVehicule
            WHERE usd.idUser=$idDemandeur";
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        
    }
?>