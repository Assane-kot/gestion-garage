<?php
    @session_start();
    
    require_once('model/Piece.php');
    require_once('model/Verification.php');

    class PieceController extends Verification{
        
        public function getPiece(){
            //$connect = new Verification();
            $sql = "SELECT idPiece, nomPiece, reference, quantite FROM Piece";  
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        
        /**Fonction ajouter */

        public function addPiece(Piece $piece) {
            
        /** commande d'insertion dans la base de donnees */
        $sql = "INSERT INTO `piece` (`nomPiece`,reference, `quantite`) 
                    VALUES (:nomPiece, :reference, :quantite)";
                $connexion = $this->Connection();
                /**requettes prepare */
                $stmt = $connexion->prepare($sql);
                //var_dump($user->getLogin());die();
                $stmt->bindValue (':nomPiece',$piece->getNomPiece(),PDO::PARAM_STR);
                $stmt->bindValue (':reference',$piece->getReference(),PDO::PARAM_STR);
                $stmt->bindValue (':quantite',$piece->getQuantite(),PDO::PARAM_INT);
                $stmt->execute();
                $_SESSION['alert']=[
                    "type" => "success",
                    "msg" => "pièce ajoutée avec succès"
                ];
                header("location:../piece");
                //$SESSION['message'] = " UTILISATEUR AJOUTER AVEC SUCCES";
                //header("Location:index.php");
            }


        // requette pour avoir les details de l'utilisateur
        public function findById($idP) {
            $sql ="SELECT * FROM piece WHERE idPiece=:idP";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idP',$idP,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
    }

         // requette pour faire un update sur l'utilisateur 

        public function updatePiece(Piece $piece,$idPiece) {
            $sql = "UPDATE piece SET nomPiece =:nomPiece, reference =:reference, quantite =:quantite WHERE idPiece=:idPiece" ;
            $connexion = $this->Connection();
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue (':nomPiece',$piece->getNomPiece(),PDO::PARAM_STR);
            $stmt->bindValue (':reference',$piece->getReference(),PDO::PARAM_STR);
            $stmt->bindValue (':quantite',$piece->getQuantite(),PDO::PARAM_INT);
            $stmt->bindValue (':idPiece',$idPiece,PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['alert']=[
                "type" => "success",
                "msg" => "pièce modifiée avec succès"
            ];
            if($stmt->execute()){
                header("location:../piece");
            }
            else{
                header("location:../piece");
            }
        }

        


        // supression de l'utilisateur

        public function delPiece($idPiece) {
            $sql="DELETE FROM piece WHERE idPiece=:idPiece";
            $stmt= $this->Connection()->prepare($sql);
            $stmt->bindValue(':idPiece',$idPiece,PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['alert']=[
                "type" => "success",
                "msg" => "pièce supprimée avec succès"
            ];
            if($stmt->execute()){
                header("location:../../piece");
            }
        }

        
    }
?>