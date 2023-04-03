<?php
    @session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// Inclusion des contrôleurs
require_once 'controller/userController.php';
require_once 'controller/pieceController.php';
require_once 'controller/vehiculeController.php';
require_once 'controller/demandeInterventionController.php';


$userController = new UserController;
$pieceController = new PieceController;

$userController = new UserController;
$user = new User;
$vehiculeController = new VehiculeController;
$vehicule = new Vehicule;


try{
    if(empty($_GET['url'])){
    require "Vue/authentification.php";
    } else {
        $url = explode("/", filter_var($_GET['url']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "login" : 
                require "Vue/authentification.php";
            break;

            case "added" : 
                require "Controller/authentification.php";
            break;

            case "dashbord" : 
                require "Vue/dashbord.php";
            break;

            case "deconnexion" : 
                require "Controller/deconnexion.php";
            break;

            case "user" :
                if(empty($url[1])){
                    require "Vue/listeUser.php";
                } else if($url[1] === "ajoutUtilisateur") {
                    require "Vue/addUser.php"; 
                }
                else if($url[1] === "modifier") {
                    require "Vue/modifierUser.php";
                }
                else if($url[1] === "updated") {
                    require "Controller/userUpdate.php";
                }else if($url[1] === "added") {
                    require "Controller/userAdd.php";
                }else if($url[1] === "deleted") {
                    require "Controller/userDelete.php";
                }
            break;
            case "piece" :
                if(empty($url[1])){
                    require "Vue/listePiece.php";
                } else if($url[1] === "ajoutPiece") {
                    require "Vue/addPiece.php"; 
                }
                else if($url[1] === "modifier") {
                    require "Vue/modifierPiece.php";
                }
                else if($url[1] === "updated") {
                    require "Controller/pieceUpdate.php";
                }else if($url[1] === "added") {
                    require "Controller/pieceAdd.php";
                }else if($url[1] === "deleted") {
                    require "Controller/pieceDelete.php";
                }
            break;
            
            case "vehicule" :
                if(empty($url[1])){
                    require "Vue/listeVehicule.php";
                } else if($url[1] === "ajoutVehicule") {
                    require "Vue/addVehicule.php";
                }
                else if($url[1] === "modifierVehicule") {
                    require "Vue/modifierVehicule.php";
                }
                else if($url[1] === "updated") {
                    require "Controller/vehiculeUpdate.php";
                }else if($url[1] === "added") {
                    require "Controller/vehiculeAdd.php";
                }else if($url[1] === "deleted") {
                    require "Controller/vehiculeDelete.php";
                }
            break;
            
            case "demandeIntervention" :
                if(empty($url[1])){
                    require "Vue/listeDemandeIntervention.php";
                } else if($url[1] === "ajoutDemandeIntervention") {
                    require "Vue/addDemandeIntervention.php";
                }
                else if($url[1] === "modifierDemandeIntervention") {
                    require "Vue/modifierDemandeIntervention.php";
                }
                else if($url[1] === "updated") {
                    require "Controller/DemandeInterventionUpdate.php";
                }else if($url[1] === "added") {
                    require "Controller/DemandeInterventionAdd.php";
                }else if($url[1] === "deleted") {
                    require "Controller/demandeInterventionDelete.php";
                }
            break;
            
            case "intervention" :
                if(empty($url[1])){
                    require "Vue/listeIntervention.php";
                } else if($url[1] === "ajoutIntervention") {
                    require "Vue/addIntervention.php";
                }else if($url[1] === "modifierIntervention") {
                    require "Vue/modifierIntervention.php";
                }
                else if($url[1] === "updated") {
                    require "Controller/interventionUpdate.php";
                }else if($url[1] === "added") {
                    require "Controller/interventionAdd.php";
                }else if($url[1] === "detail") {
                    require "Vue/detail.php";
                }
            break;

            default : require"Vue/erreur.php";
        }
    }
}
catch(Exception $e){
    echo $e->getMessage();
    require"Vue/erreur.php";
}
?>


