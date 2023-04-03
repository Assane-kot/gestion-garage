<?php
    require_once('Controller/demandeInterventionController.php');
    require_once('Model/DemandeIntervention.php');
?>

<?php ob_start() ?>
    <!--**********************************
                    body
    ***********************************-->


<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="mr-auto mb-sm-0 mb-3">
                        <h4 class="card-title mb-2">Ajouter demande intervention</h4>
                    </div>
                    <a href="<?= URL ?>demandeIntervention" class="btn btn-xs btn-primary light mr-1">Liste demande intervention</a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= URL ?>demandeIntervention/added" method="post">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Date Intervention <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date-time" class="form-control" id="mdate" name="date">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Kilométrage <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-digits" name="kilometrage">
                                        <input type="text" class="form-control" id="val-digits" name="demandeur" value="<?= $_SESSION['idlog']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">vehicule <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="vehicule">
                                            <option > Choisir un vehicule</option>
                                            <?php $VehiculeController = new VehiculeController(); ?>
                                            <?php if ($VehiculeController->getVehicule()) : ?>
                                                <?php foreach ($VehiculeController->getVehicule() as $vehicule) : ?>
                                                    <option value="<?php echo $vehicule['idVehicule']; ?>"> <?= $vehicule['numeroimmatriculation'] ."  ". $vehicule['marque'] ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Commentaire</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="4" id="comment" name="commentaire"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn mr-2 btn-primary" name="ajouter">Enregistrer</button>
                            <button type="submit" class="btn btn-light">Retour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--**********************************
            Main wrapper end
    ***********************************-->

    <!--**********************************
                Scripts
    ***********************************-->
<!-- Required vendors -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="../vendor/global/global.min.js"></script>
<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="../vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="../vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="../js/dashboard/dashboard-1.js"></script>

<script src="../vendor/owl-carousel/owl.carousel.js"></script>
<script src="../js/custom.min.js"></script>
<script src="../js/deznav-init.js"></script>
<script src="../js/demo.js"></script>
<script src="../js/styleSwitcher.js"></script>

<?php
$content = ob_get_clean();
require "template.php"
?>

</body>

</html>