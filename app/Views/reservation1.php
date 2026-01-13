<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Espace Administrateur</title>

    <!-- Custom fonts -->
    <link href="<?= base_url() ?>templateprivé/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="<?= base_url() ?>templateprivé/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* 🎨 Nouveau thème backend */
        .sidebar {
            background: linear-gradient(135deg, #2c3e50, #34495e) !important;
        }

        .sidebar .nav-item .nav-link,
        .sidebar .sidebar-brand-text {
            color: #ecf0f1 !important;
            font-weight: 600;
        }

        .sidebar .nav-item:hover .nav-link {
            background-color: rgba(255, 255, 255, 0.1) !important;
        }

        /* Topbar plus backend */
        .topbar {
            background: #2c3e50 !important;
            color: white !important;
        }

        .topbar .nav-link span {
            color: #ecf0f1 !important;
        }

        /* Boutons stylisés dans la topbar */
        .btn-top {
            background: #1abc9c;
            color: white !important;
            padding: 6px 14px;
            border-radius: 6px;
            margin-left: 10px;
            font-weight: 600;
            transition: 0.2s ease-in-out;
            text-decoration: none !important;
        }

        .btn-top:hover {
            background: #16a085;
            color: white !important;
        }

        h3.section-title {
            text-align: center;
            background: #34495e;
            color: white;
            padding: 12px;
            border-radius: 5px;
            letter-spacing: 1px;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 700;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar - backend style -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Espace Administrateur</div>
            </a>
             <!--  BOUTON LISTE PROFIL  -->
            <li class="nav-item mt-3">
             
               <a class="nav-link" href="<?= base_url('index.php/compte/index3') ?>">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour</span>
                </a>
            </li>

            <hr class="sidebar-divider">
        </ul>
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar backend -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow">

                    <ul class="navbar-nav ml-auto">

                        <!-- Bouton Déconnexion -->
                        <li class="nav-item">
                            <a href="<?= base_url('index.php/compte/deconnecter') ?>" class="btn-top">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Bouton Profil -->
                        <li class="nav-item">
                            <a href="<?= base_url('index.php/compte/index2') ?>" class="btn-top">
                                <i class="fas fa-user"></i> Profil
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- TABLEAU CENTRÉ -->
                    <div class="container d-flex justify-content-center mt-5">
                        <div style="width:80%;">

                            <h3 class="section-title">Créneau à consulter</h3>

<form action="<?= base_url('index.php/compte/reserver_action1') ?>" method="post" class="mt-4">
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
    <!-- Champ date -->
    <label for="date"><strong>Choisir une date :</strong></label>
    <input type="date" name="date" id="date" class="form-control" >

    <!-- Bouton -->
    <button type="submit" class="btn btn-primary mt-3">
        voir les réservations 
    </button>

</form>



                        </div>
                    </div>
                    <!-- END TABLEAU -->

                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container text-center my-auto">
                    <span>private©Youth Center</span>
                </div>
            </footer>

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

</body>
</html>
