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
                        <h4 class="card-title">Ajout véhicule</h4>
                    </div>
                    <a href="<?= URL ?>user" class="btn btn-xs btn-primary light mr-1">Liste Utilisateur</a>
                </div>

                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= URL ?>vehicule/added" method="post">



                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Numéro d'immatriculation
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="numeroimmatriculation"required/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">

                                    <label class="col-lg-4 col-form-label" for="val-digits">Année de circulation <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="mdate" name="anneeCirculation">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Marque
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="marque">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Type
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="type">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-digits">Puissance <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-digits" name="puissance">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Série
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="serie">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Etat
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="etat">
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
</div>


<!--**********************************
           fin body
        ***********************************-->






<!--**********************************
           Support ticket button end
        ***********************************-->


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

<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="../vendor/moment/moment.min.js"></script>
<script src="../vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="../vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="../vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="../vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="../vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="../vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<script src="../vendor/pickadate/picker.js"></script>
<script src="../vendor/pickadate/picker.time.js"></script>
<script src="../endor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="../js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="../js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="../js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="../js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="../js/plugins-init/pickadate-init.js"></script>



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