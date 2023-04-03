<?php
    include('DemandeInterventionController.php');
    $DemandeIntervention = new DemandeIntervention();
    $idDemandeIntervention=$_GET['idDemandeIntervention'];
    $DemandeInterventionController->delDemandeIntervention($idDemandeIntervention);
?>