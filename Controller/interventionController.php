<?php

@session_start();


require_once('Model/Intervention.php');
require_once('Model/Verification.php');

class InterventionController extends Verification
{

    public function getIntervention()
    {
        $sql = "SELECT idIntervention,
            i.type typeIntervention,
            i.dateDebut dateDebut,
            i.dateFin dateFin,
            u.idUser idUsDem,
            u.prenom prenomDemandeur,
            u.nom nomDemandeur,
            v.numeroimmatriculation numeroimmatriculation,
            i.observation commentaire,
            d.idDemandeIntervention idDi
            FROM `intervention` i
            LEFT JOIN `demandeIntervention` d on i.demandeIntervention=d.IdDemandeIntervention
            LEFT JOIN `user` u on d.demandeur=u.idUser
            LEFT JOIN `vehicule` v on d.vehicule=v.idVehicule";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    /**Fonction ajouter */

    public function addIntervention(Intervention $intervention)
{
    $sql = "INSERT INTO `intervention` (`dateDebut`, `dateFin`, `type`, `demandeIntervention`, `observation`) 
            VALUES (:dateDebut, :dateFin, :type, :demandeIntervention, :observation)";
    $connexion = $this->Connection();
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':dateDebut', $intervention->getDateDebut(), PDO::PARAM_STR);
    $stmt->bindValue(':dateFin', $intervention->getDateFin(), PDO::PARAM_STR);
    $stmt->bindValue(':type', $intervention->getType(), PDO::PARAM_STR);
    $stmt->bindValue(':demandeIntervention', $intervention->getDemandeIntervention(), PDO::PARAM_INT);
    $stmt->bindValue(':observation', $intervention->getObservation(), PDO::PARAM_STR);
    $stmt->execute();

    if (!$stmt) {
        return false;
    }

    $idIntervention = $connexion->lastInsertId();

    foreach ($_POST['choixp'] as $i => $idPiece) {
        $quantitePiece = $_POST['case1'][$i];

        $stmt2 = $connexion->prepare("INSERT INTO `utiliser`(`idIntervention`, `idPiece`, `quantitePiece`) VALUES(:idIntervention,:idPiece,:quantitePiece)");
        $stmt2->bindValue(':idIntervention', $idIntervention, PDO::PARAM_INT);
        $stmt2->bindValue(':idPiece', $idPiece, PDO::PARAM_INT);
        $stmt2->bindValue(':quantitePiece', $quantitePiece, PDO::PARAM_INT);
        $stmt2->execute();

        if (!$stmt2) {
            return false;
        }

        $stmt3 = $connexion->prepare("UPDATE `piece` SET quantite = quantite - :quantitePiece WHERE idPiece = :idPiece");
        $stmt3->bindValue(':quantitePiece', $quantitePiece, PDO::PARAM_INT);
        $stmt3->bindValue(':idPiece', $idPiece, PDO::PARAM_INT);
        $stmt3->execute();

        $stmt4 = $connexion->prepare("UPDATE `demandeIntervention` SET etat = 'Traiter' WHERE idDemandeIntervention = :idDemandeIntervention");
        $stmt4->bindValue(':etat', 'Traiter', PDO::PARAM_STR);
        $stmt4->execute();

        if (!$stmt3) {
            return false;
        }
    }
    header("Location: ../intervention");
    return true;
    
    }

    // requette pour avoir les details de l'utilisateur
    public function findById($idI)
    {
        $sql = "SELECT * FROM intervention WHERE idIntervention=:idI";
        $stmt = $this->Connection()->prepare($sql);
        $stmt->bindValue(':idI', $idI, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function findByIdFull($idI)
    {
        $sql = "SELECT idIntervention,
            i.type typeIntervention,
            i.dateDebut dateDebut,
            i.dateFin dateFin,
            p.nomPiece nomPiece,
            u.idUser idUsDem,
            u.prenom prenomDemandeur,
            u.nom nomDemandeur,
            v.numeroimmatriculation numeroimmatriculation,
            i.observation commentaire,
            d.idDemandeIntervention idDi
            FROM `intervention` i
            LEFT JOIN `demandeIntervention` d on i.demandeIntervention=d.IdDemandeIntervention
            LEFT JOIN `user` u on d.demandeur=u.idUser
            LEFT JOIN `vehicule` v on d.vehicule=v.idVehicule";
        $stmt = $this->Connection()->prepare($sql);
        $stmt->bindValue(':idI', $idI, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    // requette pour faire un update sur l'utilisateur 

    public function updateIntervention(Intervention $intervention, $idIntervention)
    {
        $sql = "UPDATE intervention SET dateDebut =:dateDebut, dateFin =:dateFin, type =:type, demandeIntervention =:demandeIntervention, observation =:observation WHERE idIntervention=:idIntervention";
        $connexion = $this->Connection();
        $stmt = $connexion->prepare($sql);
        $stmt->bindValue(':dateDebut', $intervention->getDateDebut(), PDO::PARAM_STR);
        $stmt->bindValue(':dateFin', $intervention->getDateFin(), PDO::PARAM_STR);
        $stmt->bindValue(':type', $intervention->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':demandeIntervention', $intervention->getDemandeIntervention(), PDO::PARAM_INT);
        $stmt->bindValue(':observation', $intervention->getObservation(), PDO::PARAM_STR);
        $stmt->bindValue(':idIntervention', $idIntervention, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->execute()) {
            header("location:../intervention");
        } else {
            header("location:../intervention");
        }
    }




    // supression de l'utilisateur

    public function delintervention($idintervention)
    {
        $sql = "DELETE FROM intervention WHERE idintervention=:idintervention";
        $stmt = $this->Connection()->prepare($sql);
        $stmt->bindValue(':idintervention', $idintervention, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->execute()) {
            header("location:../intervention");
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

    public function getPieceUtilisees($idI){
    $sql = "SELECT i.idIntervention,
            p.nomPiece nomPiece,
            u.quantitePiece qpu,
            i.observation commentaire
            FROM `intervention` i
            LEFT JOIN `utiliser` u on u.idIntervention=i.idIntervention
            LEFT JOIN `piece` p on u.idPiece=p.idPiece
            WHERE i.idIntervention = :idI"; // ajouter la condition pour filtrer par idIntervention
    $stmt = $this->Connection()->prepare($sql);
    $stmt->bindValue(':idI', $idI, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(); // utiliser fetchAll() pour récupérer tous les résultats
    }
}

