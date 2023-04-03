<?php ob_start() ?>
<!--**********************************
            body
        ***********************************-->
<script type="text/javascript">
    window.onload = function(){
    if(!localStorage.getItem('cookies-agreed')){
      var agree_div = document.createElement('div');
      agree_div.id = 'cookies-agreed';
      agree_div.innerHTML = '<div style="background-color:#000; color:#fff; padding:20px; position:fixed; bottom:0; width:100%;">Nous utilisons des cookies pour améliorer votre expérience sur notre site. Cliquez sur Accepter pour consentir à notre utilisation des cookies.<div style="float:right;"><button onclick="acceptCookies()">Accepter</button></div></div>';
      document.body.appendChild(agree_div);
    }
  }
  function acceptCookies(){
    localStorage.setItem('cookies-agreed', true);
    document.getElementById('cookies-agreed').remove();
  }
</script>

<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="mr-auto mb-sm-0 mb-3">
                        <h4 class="card-title mb-2">Ajouter utilisateur</h4>
                    </div>
                    <a href="<?= URL ?>user" class="btn btn-xs btn-primary light mr-1">Liste Utilisateur</a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="../Controller/Useradd.php" method="post">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Prenom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="preUser">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Nom
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="nomUser">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-email" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-password">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-password" name="pwd">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-skill">Profil
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-skill" name="profil">
                                        <option > Choisir un profil</option>
                                        <option value="demandeur">Administrateur</option>
                                        <option value="demandeur">Demandeur</option>
                                        <option value="intervenant">Intervenant</option>
                                    </select>
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
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
<script src="vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
<script src="js/dashboard/dashboard-1.js"></script>

<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Form validate init -->
<script src="js/plugins-init/jquery.validate-init.js"></script>

<script src="vendor/owl-carousel/owl.carousel.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>
<script src="js/demo.js"></script>
<script src="js/styleSwitcher.js"></script>

<?php
$content = ob_get_clean();
require "template.php";
?>

</body>

</html>