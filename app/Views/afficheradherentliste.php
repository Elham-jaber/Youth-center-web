<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste Comptes / Profils</title>

    <!-- Custom fonts -->
    <link href="<?= base_url() ?>templateprivé/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="<?= base_url() ?>templateprivé/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .section-title {
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

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #2c3e50, #34495e);">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Espace Adhérent</div>
            </a>

            <!-- Bouton retour -->
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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow" style="background:#2c3e50;">

                    <ul class="navbar-nav ml-auto">


                    </ul>
                </nav>
                <!-- End Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-11">

                            <h3 class="section-title">Liste des Comptes Adhérents</h3>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Login</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>E-mail</th>
                                            <th>Statut</th>
                                            <th>Rôle</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if (!empty($adhuser)): ?>
                                            <?php foreach ($adhuser as $login): ?>
                                                <tr>
                                                    <td><?= esc($login['cpt_pseudo']) ?></td>
                                                    <td><?= esc($login['pfl_nom']) ?></td>
                                                    <td><?= esc($login['pfl_prenom']) ?></td>
                                                    <td><?= esc($login['pfl_email']) ?></td>
                                                    <td><?= esc($login['cpt_etat']) ?></td>
                                                    <td><?= esc($login['pfl_role']) ?> :Adherent</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center py-3">Aucun compte trouvé.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>&copy; Youth Center</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

</body>

</html>
