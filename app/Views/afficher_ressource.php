<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste Ressources</title>

    <link href="<?= base_url() ?>templateprivé/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">
    <link href="<?= base_url() ?>templateprivé/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* --- Titre amélioré --- */
        .section-title {
            background: #34495e;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 0;
        }

        /* Alignement du bouton à droite */
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px auto;
            width: 70%;
        }

        /* --- Tableau plus petit et centré --- */
        .table-small {
            width: 70% !important;
            margin: 0 auto !important;
            border: 2px solid #ccc;
        }

        .table-small th,
        .table-small td {
            padding: 6px !important;
            font-size: 14px;
            vertical-align: middle;
            text-align: center;
        }

        .table-small th {
            background-color: #ecf0f1 !important;
            font-weight: 700;
        }

        /* --- Image réduite --- */
        .table-small img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>

</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion"
        id="accordionSidebar"
        style="background: linear-gradient(135deg, #2c3e50, #34495e);">

        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-tools"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Espace Administrateur</div>
        </a>

        <li class="nav-item mt-3">
            <a class="nav-link" href="<?= base_url('index.php/compte/index3') ?>">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </li>

        <hr class="sidebar-divider">

    </ul>
    <!-- End Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow"
                 style="background:#2c3e50;">
                <ul class="navbar-nav ml-auto"></ul>
            </nav>

            <div class="container-fluid">

                <!-- HEADER AVEC TITRE + BOUTON À DROITE -->
                <div class="header-actions">
                    <h3 class="section-title">Liste des Ressources</h3>

                    <a href="<?= base_url('index.php/compte/formulaire_ress') ?>" 
                       class="btn btn-primary">
                        Ajouter une ressource
                    </a>
                </div>

                <!-- TABLEAU -->
                <div class="table-responsive">

                    <table class="table table-bordered table-small">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Capacité max</th>
                                <th>Détails</th>
                                <th>Supprimer</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>

                        <?php if (!empty($ressources)): ?>

                            <?php foreach ($ressources as $r): ?>
                                <tr>

                                    <!-- Image -->
                                    <td>
                                        <img src="<?= base_url($r['ress_image']) ?>" alt="">
                                    </td>

                                    <!-- Nom -->
                                    <td><strong><?= esc($r['ress_nom']) ?></strong></td>

                                    <!-- Capacité -->
                                    <td><?= esc($r['ress_nb_max']) ?></td>

                                    <!-- Détails -->
                                    <td><?= esc($r['ress_liste_materiel']) ?></td>

                                    <!-- Bouton Supprimer -->
                                    <td>
                                        <form action="<?= base_url('index.php/delete/delete_ress') ?>" 
                                              method="post" 
                                              style="display:inline;">
                                            <input type="hidden" name="ress_id" value="<?= $r['ress_id'] ?>">
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Supprimer cette ressource ? Attention, cette opération engendrera des modifications à votre organisation !');">
                                                Supprimer
                                            </button>
                                            <td>
    <button class="btn btn-primary btn-sm">Modifier</button>
    <button class="btn btn-warning btn-sm">visualiser</button>
</td>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="5" class="text-center py-3">
                                    Aucune ressource enregistrée.
                                </td>
                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="text-center my-auto">
                    <span>&copy; Youth Center</span>
                </div>
            </div>
        </footer>

    </div>

</div>

</body>
</html>
