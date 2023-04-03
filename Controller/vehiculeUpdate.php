<?php
$vehiculeController = new VehiculeController();
if (isset($_POST['modifier'])) {
	$numeroImmatriculation = $_POST['numeroImmatriculation'];
	$anneeCirculation = $_POST['anneeCirculation'];
	$marque = $_POST['marque'];
	$type = $_POST['type'];
	$puissance = $_POST['puissance'];
	$serie = $_POST['serie'];
	$etat = $_POST['etat'];
	$idVehicule = $_POST['idVehicule'];
	$vehicule = new Vehicule($numeroImmatriculation, $anneeCirculation, $marque, $type, $puissance, $serie, $etat );
	$vehiculeController->updateVehicule($vehicule,$idVehicule);
}