<?php
    $vehiculeData = new VehiculeController();
    $idVehicule = $url[2];
    $vehicule = $vehiculeData->findById($idVehicule);
    $vehiculeData->delVehicule($idVehicule);
?>