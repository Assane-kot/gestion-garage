<?php


$demandeInterventionController = new DemandeInterventionController();
if (isset($_POST['ajouter'])) {
	$date = date('Y-m-d');
	$kilometrage = $_POST['kilometrage'];
	$demandeur = $_POST['demandeur'];
	$vehicule = $_POST['vehicule'];
	$commentaire = $_POST['commentaire'];
	//$intervenant = $_POST['intervenant'];
	//instance de classe User
	$demandeIntervention = new DemandeIntervention($date, $kilometrage, $demandeur, $vehicule, $commentaire);
     
	$demandeInterventionController->addDemandeIntervention($demandeIntervention);
}