<?php
$vehiculeController = new VehiculeController();
if (isset($_POST['ajouter'])) {
	$numeroimmatriculation = $_POST['numeroimmatriculation'];
	$anneeCirculation = $_POST['anneeCirculation'];
	$marque = $_POST['marque'];
	$type = $_POST['type'];
	$puissance = $_POST['puissance'];
	$serie = $_POST['serie'];
	$etat = $_POST['etat'];
	$vehicule = new Vehicule($numeroimmatriculation, $anneeCirculation, $marque, $type, $puissance, $serie, $etat);
	$vehiculeController->addVehicule($vehicule);
}