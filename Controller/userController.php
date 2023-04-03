<?php
    @session_start();

    require_once('model/User.php');
    require_once('model/Verification.php');

    class UserController extends Verification{
        
        public function getUser(){
            //$connect = new Verification();
            $sql = "SELECT idUser, prenom, nom , mail , pwd, profil FROM User";
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getUserDemandeur(){
            //$connect = new Verification();
            $sql = 'SELECT idUser, prenom, nom FROM User where profil = "demandeur"';
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getUserIntervenant(){
            //$connect = new Verification();
            $sql = 'SELECT idUser, prenom, nom FROM User where profil = "intervenant"';
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        
        /**Fonction ajouter */

        public function addUser(User $user) {
            
        /** commande d'insertion dans la base de donnees */
        $sql = "INSERT INTO `User` (`prenom`, `nom`, `mail`, `pwd`, `profil`) 
                    VALUES (:prenom, :nom, :mail, :pwd, :profil)";
                $connexion = $this->Connection();
                /**requettes prepare */
                $stmt = $connexion->prepare($sql);
                //var_dump($user->getLogin());die();
                $stmt->bindValue (':prenom',$user->getPrenom(),PDO::PARAM_STR);
                $stmt->bindValue (':nom',$user->getNom(),PDO::PARAM_STR);
                $stmt->bindValue (':mail',$user->getMail(),PDO::PARAM_STR);
                $stmt->bindValue (':pwd',$user->getPwd(),PDO::PARAM_STR);
                $stmt->bindValue (':profil',$user->getProfil(),PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION['alert']=[
                    "type" => "success",
                    "msg" => "Utilisateur ajouté avec succès"
                ];
                header("location:../user");
                //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
                //header("Location:index.php");
            }


            //CONNEXTION A LA BASE 

            

        public function authentification($mail, $pwd){
            $sql = "SELECT * FROM user WHERE mail=:mail AND pwd=:pwd";
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue (':mail',$mail ,PDO::PARAM_STR);
            $stmt->bindValue (':pwd',$pwd,PDO::PARAM_STR);
            $stmt->execute();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        }
        // requette pour avoir les details de l'utilisateur
        public function findById($idU) {
            $sql ="SELECT * FROM user WHERE idUser=:idU";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idU',$idU,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
    }

         // requette pour faire un update sur l'utilisateur 

        public function updateUser(User $user,$idUser) {
            $sql = "UPDATE user SET prenom =:prenom, nom =:nom, mail =:mail, pwd =:pwd ,profil =:profil WHERE idUser=:idUser" ;
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue (':prenom',$user->getPrenom(),PDO::PARAM_STR);
            $stmt->bindValue (':nom',$user->getNom(),PDO::PARAM_STR);
            $stmt->bindValue (':mail',$user->getMail(),PDO::PARAM_STR);
            $stmt->bindValue (':pwd',$user->getPwd(),PDO::PARAM_STR);
            $stmt->bindValue (':profil',$user->getProfil(),PDO::PARAM_STR);
            $stmt->bindValue (':idUser',$idUser,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->execute()){
                header("location:../user");
            }
            else{
                header("location:../user");
            }
        }

        


        // supression de l'utilisateur

        public function delUser($idUser) {
            $sql="DELETE FROM user WHERE idUser=:idUser";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idUser',$idUser,PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->execute()){
                header("location:../../user");
            }
        }

        
    }
?>