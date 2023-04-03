<?php
$DemandeInterventionController = new DemandeInterventionController();
if (isset($_POST['modifier'])) {
	$date = $_POST['date'];
	$kilometrage = $_POST['kilometrage'];
	$demandeur = $_SESSION['idlog'];
	$vehicule = $_POST['vehicule'];
	$commentaire = $_POST['commentaire'];
	$idDemandeIntervention = $_POST['idDemandeIntervention'];

	$demandeIntervention = new DemandeIntervention($date, $kilometrage, $demandeur, $vehicule, $commentaire);

	$DemandeInterventionController->updateDemandeIntervention($demandeIntervention,$idDemandeIntervention);
}