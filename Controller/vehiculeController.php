<?php
@session_start();

    require_once('Model/Vehicule.php');
    require_once('Model/Verification.php');

    class VehiculeController extends Verification{
       
        
        public function getVehicule(){
            //$connect = new Verification();
            $sql = "SELECT idVehicule, numeroimmatriculation, anneeCirculation, marque , type , puissance, serie, etat FROM Vehicule";
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        
        /**Fonction ajouter */

        public function addVehicule(Vehicule $vehicule) {
            
        /** commande d'insertion dans la base de donnees */
        $sql = "INSERT INTO `vehicule` (`numeroimmatriculation`,anneeCirculation, `marque`, `type`, `puissance`, `serie`, `etat`) 
                    VALUES (:numeroimmatriculation, :anneeCirculation, :marque, :type, :puissance, :serie, :etat)";
                $connexion = $this->Connection();
                /**requettes prepare */
                $stmt = $connexion->prepare($sql);
                //var_dump($user->getLogin());die();
                $stmt->bindValue (':numeroimmatriculation',$vehicule->getNumeroImmatriculation(),PDO::PARAM_STR);
                $stmt->bindValue (':anneeCirculation',$vehicule->getAnneeCirculation(),PDO::PARAM_STR);
                $stmt->bindValue (':marque',$vehicule->getMarque(),PDO::PARAM_STR);
                $stmt->bindValue (':type',$vehicule->getType(),PDO::PARAM_STR);
                $stmt->bindValue (':puissance',$vehicule->getPuissance(),PDO::PARAM_INT);
                $stmt->bindValue (':serie',$vehicule->getSérie(),PDO::PARAM_STR);
                $stmt->bindValue (':etat',$vehicule->getEtat(),PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION['alert']=[
                    "type" => "success",
                    "msg" => "vehicule ajouté avec succès"
                ];
                header("location:../vehicule");
                //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
                //header("Location:index.php");
            }


        // requette pour avoir les details de l'utilisateur
        public function findById($idV) {
            $sql ="SELECT * FROM vehicule WHERE idVehicule=:idV";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idV',$idV,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
    }

         // requette pour faire un update sur l'utilisateur 

        public function updateVehicule(Vehicule $vehicule,$idVehicule) {
            $sql = "UPDATE vehicule SET numeroimmatriculation =:numeroimmatriculation, anneeCirculation =:anneeCirculation, marque =:marque, type =:type ,puissance =:puissance ,serie =:serie ,etat =:etat WHERE idVehicule=:idVehicule" ;
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue (':numeroimmatriculation',$vehicule->getNumeroImmatriculation(),PDO::PARAM_STR);
            $stmt->bindValue (':anneeCirculation',$vehicule->getAnneeCirculation(),PDO::PARAM_STR);
            $stmt->bindValue (':marque',$vehicule->getMarque(),PDO::PARAM_STR);
            $stmt->bindValue (':type',$vehicule->getType(),PDO::PARAM_STR);
            $stmt->bindValue (':puissance',$vehicule->getPuissance(),PDO::PARAM_STR);
            $stmt->bindValue (':serie',$vehicule->getSérie(),PDO::PARAM_STR);
            $stmt->bindValue (':etat',$vehicule->getEtat(),PDO::PARAM_STR);
            $stmt->bindValue (':idVehicule',$idVehicule,PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['alert']=[
                "type" => "success",
                "msg" => "vehicule modifier avec succès"
            ];
            if($stmt->execute()){
                header("location:../vehicule");
            }
            else{
                header("location:../vehicule");
            }
        }

        


        // supression de l'utilisateur

        public function delVehicule($idVehicule) {
            $sql="DELETE FROM vehicule WHERE idVehicule=:idVehicule";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idVehicule',$idVehicule,PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['alert']=[
                "type" => "success",
                "msg" => "vehicule supprimé avec succès"
            ];
            if($stmt->execute()){
                header("location:../../vehicule");
            }
        }

        
    }
?>