<?php
if (!isset($_SESSION['login']) || (trim($_SESSION['login']) == '')) {
    header("location: ..");
    exit();
}
?>

<?php
@session_start();
require_once('Controller/usercontroller.php');
require_once('Model/User.php');
$userData = new userController();

$idUser = $url[2];
$user = $userData->findById($idUser);
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
            <a href="index.html" <h1><img class="brand-logo" src="../images/logoSagamCirculaire.png" style="width : 150px; height : 70px;"></img> </h1></a>
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
                                    <a href="<?= URL ?>deconnexion" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
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
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php if ($_SESSION['profillog'] === 'demandeur') : ?>
            <?php ($id = $_SESSION['idlog']) ?>


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
                <?php elseif ($_SESSION['profillog'] === 'intervenant')  : ?>

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
        <?php else : ?>



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
        <?php endif; ?>



        <!--**********************************
            body
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Modifier utilisateur</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="<?= URL ?>utilisateur/updated" method="post">

                                    <input type="hidden" class="form-control" name="idUser" value="<?= $user['iduser']; ?>">

                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Prenom
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="preUser" value="<?= $user['prenom']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Nom
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="nomUser" value="<?= $user['nom']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-email" name="email" value="<?= $user['mail']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-password">Password
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="val-password" name="pwd" value="<?= $user['pwd']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Profil
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="val-skill" name="profil">
                                                <option value="<?= $user['profil']; ?>"><?= $user['profil']; ?></option>
                                                <option value="demandeur">Administrateur</option>
                                                <option value="demandeur">Demandeur</option>
                                                <option value="intervenant">Intervenant</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn mr-2 btn-primary" name="modifier">Enregistrer</button>
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
                Footer start
            ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © SAGAM. Tous droits réservés. Gestion des garages 2023</p>
        </div>
    </div>

    <!--**********************************
            Main wrapper end
        ***********************************-->




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

    <!--**********************************
        Scripts
    ***********************************-->
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