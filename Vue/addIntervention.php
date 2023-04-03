<?php
if (!isset($_SESSION['login']) || (trim($_SESSION['login']) == '')) {
    header("location: ..");
    exit();
}
?>
<?php
require_once('Controller/interventionController.php');
require_once('Model/Intervention.php');
require_once('controller/DemandeInterventionController.php');
require_once('Model/DemandeIntervention.php');
require_once('Controller/pieceController.php');
require_once('Model/Piece.php');


@session_start();
$Intervention = new InterventionController();
$idIntervention = $url[2];
$i = $Intervention->findById($idIntervention);
?>
<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Gestion Garage </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/logoSagamCirculaire.png">
    <link rel="stylesheet" href="../../vendor/chartist/css/chartist.min.css">
    <link href="../../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="../../vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="../../vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="../../vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="../../vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="../../stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="../../stylesheet" href="vendor/pickadate/themes/default.date.css">
    <link href="../../icon.css?family=Material+Icons" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="../../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>

    <!--*******************
            Preloader start
        ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
            Preloader end
        ********************-->

    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
                Nav header start
            ***********************************-->
        <div class="nav-header">
            <a href="index.html" <h1><img class="brand-logo" src="../../images/logoSagamCirculaire.png" style="width : 150px; height : 70px;"></img> </h1></a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!--**********************************
                Header start
            ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="input-group search-area right d-lg-inline-flex d-none">
                                <input type="text" class="form-control" placeholder="rechercher...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javascript:void(0)">
                                            <i class="flaticon-381-search-2"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="#">
                                    <i id="icon-light" class="fa fa-sun-o"></i>
                                    <i id="icon-dark" class="fa fa-moon-o"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewbox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                    <svg id="icon-minimize" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
                                        <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
                                    </svg>
                                </a>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="../images/profile/pic1.jpg" width="20" alt="">
                                    <div class="header-info">
                                        <span><?= $_SESSION['prenomlog'] . ' ' . $_SESSION['nomlog'] ?></span>
                                        <small><?= $_SESSION['profillog'] ?> <?= $_SESSION['idlog'] ?></small>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="page-login.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="sub-header">
                    <div class="d-flex align-items-center flex-wrap mr-auto">
                        <h5 class="dashboard_bar">Dashboard</h5>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll"> </br>
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li>
                        <a href="widget-basic.html" class="has-arrow ai-icon" aria-expanded="false">
                            <i class="flaticon-145-layout"></i>
                            <span class="nav-text">Dashbord</span>
                        </a>
                    </li>



                    <li class="nav-label">Gestion Garage</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span class="nav-text">Utilisateur</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= URL ?>user/ajoutUtilisateur">Ajouter utilisateur</a></li>
                            <li><a href="<?= URL ?>user">liste utilisateurs</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                            <span class="nav-text">Pièces</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= URL ?>piece/ajoutPiece">Ajouter pièce</a></li>
                            <li><a href="<?= URL ?>piece">liste pièces</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-car"></i>
                            <span class="nav-text">Véhicules</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= URL ?>vehicule/ajoutVehicule">Ajouter véhicule</a></li>
                            <li><a href="<?= URL ?>vehicule">liste véhicules</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-gear"></i>
                            <span class="nav-text">Intervention</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= URL ?>intervention">liste interventions</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-file"></i>
                            <span class="nav-text">Demande d'intervention</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= URL ?>demandeIntervention/ajoutDemandeIntervention">Ajouter demande</a></li>
                            <li><a href="<?= URL ?>demandeIntervention">liste demandes</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="copyright">
                    <br><strong>SAGAM SECURITE</strong> </br> © 2023 All Rights Reserved</p>
                    <p class="fs-12">Made </span> by DEV SAGAM</p>
                </div>
            </div>
        </div>



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
                                <form class="form-valide" action="<?= URL ?>intervention/added" method="post">

                                    <div class="form-group">
                                        <div class="form-group row">

                                            <label class="col-lg-4 col-form-label" for="val-digits">Date de début <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" id="date-format" class="form-control" name="dateDebut">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-group row">

                                            <label class="col-lg-4 col-form-label" for="val-digits">Date de fin <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" id="date-format" class="form-control" name="dateFin">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="demandeIntervention" value="<?= $idIntervention ?>">

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Type
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="val-skill" name="type">
                                                <option> Choisir le type d'intervention</option>
                                                <option value="curratif">Curatif</option>
                                                <option value="preventif">Préventif</option>
                                                <option value="preventif">Visite Technique</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-4 col-form-label" for="val-skill">
                                            <span class="text-danger"></span>
                                        </label>
                                        <div class="table-responsive">
                                            <table id="example" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Pièce</th>
                                                        <th>Quantité</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control" name="choixp[]">
                                                                <option> Choisir une pièce</option>
                                                                <?php $PieceController = new PieceController(); ?>
                                                                <?php if ($PieceController->getPiece()) : ?>
                                                                    <?php foreach ($PieceController->getPiece() as $piece) : ?>
                                                                        <option value="<?php echo $piece['idPiece']; ?>"> <?= $piece['nomPiece'] . " | " . $piece['reference'] ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="val-digits" name="case1[]">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        </br>
                                        <div class="boutons">
                                            <INPUT type="button" style="width: 150px;left: 100px;position:absolute" class="btn mr-2 btn-primary" value="Ajouter une ligne" onclick="addRow('example')" />
                                            <INPUT type="button" style="width: 150px;left: 400px;position:absolute" class="btn mr-2 btn-primary" value="Supprimer une ligne" onclick="deleteRow('example')" />
                                        </div>
                                    </div>
                                    </br>
                                    </br>





                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-suggestions">Observation <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="val-suggestions" name="observation" rows="5"></textarea>
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

    <SCRIPT language="javascript">
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;

            for (var i = 0; i < colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch (newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select-one":
                        newcell.childNodes[0].selectedIndex = 0;
                        break;
                }
            }
        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if (null != chkbox && true == chkbox.checked) {
                        if (rowCount <= 1) {
                            alert("On ne peut pas supprimer toutes les lignes.");
                            break;
                        }
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }


                }
            } catch (e) {
                alert(e);
            }
        }

        function change_case(ceci) {
            ceci.parentNode.childNodes[2].disabled = (ceci.checked) ? false : true;

        }
    </SCRIPT>


    <!-- Required vendors -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../../vendor/global/global.min.js"></script>
    <script src="../../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../../vendor/chart.js/Chart.bundle.min.js"></script>


    <script src="../../vendor/peity/jquery.peity.min.js"></script>
    <script src="../../vendor/apexchart/apexchart.js"></script>


    <script src="../../js/dashboard/dashboard-1.js"></script>

    <script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="../../js/plugins-init/jquery.validate-init.js"></script>

    <script src="../../vendor/owl-carousel/owl.carousel.js"></script>
    <script src="../../js/custom.min.js"></script>
    <script src="../../js/deznav-init.js"></script>
    <script src="../../js/demo.js"></script>
    <script src="../../js/styleSwitcher.js"></script>

</body>

</html>