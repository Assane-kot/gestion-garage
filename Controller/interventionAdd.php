<?php


$InterventionController = new InterventionController();
if (isset($_POST['ajouter'])) {
	$dateDebut = $_POST['dateDebut'];
	$dateFin = $_POST['dateFin'];
	$type = $_POST['type'];
	$demandeIntervention = $_POST['demandeIntervention'];
	$observation = $_POST['observation'];
	$intervention = new Intervention($dateDebut, $dateFin, $type, $demandeIntervention, $observation);
     
	$InterventionController->addIntervention($intervention);
}