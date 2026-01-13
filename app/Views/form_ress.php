    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Espace Administrateur</title>

        <!-- Fonts -->
        <link href="<?= base_url() ?>templateprivé/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
            rel="stylesheet" />

        <!-- SB Admin -->
        <link href="<?= base_url() ?>templateprivé/css/sb-admin-2.min.css" rel="stylesheet">

        <style>
            body {
                font-family: "Plus Jakarta Sans", sans-serif;
                background: #f3f6fb;
            }

            /* Sidebar */
            .sidebar {
                background: linear-gradient(135deg, #2c3e50, #34495e) !important;
            }

            .sidebar .nav-link,
            .sidebar .sidebar-brand-text {
                color: #ecf0f1 !important;
                font-weight: 600;
            }

            .topbar {
                background: #2c3e50 !important;
                color: white !important;
            }

            .btn-top {
                background: #1abc9c;
                color: white !important;
                padding: 6px 14px;
                border-radius: 6px;
                margin-left: 10px;
                font-weight: 600;
                transition: 0.2s;
                text-decoration: none !important;
            }

            .btn-top:hover {
                background: #16a085;
            }

            /* STYLE FORMULAIRE MODERNE */
            .form-wrapper {
                background: #ffffff;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            }

            .form-label-custom {
                font-weight: 600;
                margin-bottom: 6px;
                color: #34495e;
            }

            .form-input,
            .form-textarea {
                width: 100%;
                padding: 14px 18px;
                border: 2px solid #dcdde1;
                border-radius: 10px;
                background: #f7f9fc;
                transition: 0.3s ease;
                font-size: 1rem;
            }

            .form-input:focus,
            .form-textarea:focus {
                border-color: #4c87ff;
                background: #ffffff;
                box-shadow: 0 0 8px rgba(76,135,255,0.2);
            }

            .form-textarea {
                height: 130px;
                resize: none;
            }

            .btn-submit {
                width: 100%;
                padding: 14px;
                font-size: 1.2rem;
                font-weight: 600;
                background: #4c87ff;
                border: none;
                color: white;
                border-radius: 10px;
                transition: 0.3s;
            }

            .btn-submit:hover {
                background: #3c6ee6;
            }

            .ci-error {
                margin-top: 5px;
                color: #e74c3c;
                font-weight: 500;
                font-size: 0.9rem;
            }

            h3.section-title {
                text-align: center;
                background: #34495e;
                color: white;
                padding: 12px;
                border-radius: 5px;
                letter-spacing: 1px;
                margin-bottom: 25px;
                text-transform: uppercase;
                font-weight: 700;
            }
        </style>
    </head>

    <body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Espace Administrateur</div>
            </a>

            <!-- Retour -->
            <li class="nav-item mt-3">
                <a class="nav-link" href="<?= base_url('index.php/compte/afficher_ressource') ?>">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour</span>
                </a>
            </li>

            <hr class="sidebar-divider">

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow">
                    

                


                    
                    </ul>
                </nav>

                <!-- Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-8 col-xl-6">

                            <h3 class="section-title">Ajouter une ressource</h3>

                            <div class="form-wrapper">

                                <!-- Flash message -->
                                <?php if(session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <i class="fas fa-check-circle"></i>
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->has('warning')) : ?>
        <div style="background:#fff3cd; padding:10px; border:1px solid #ffeeba; margin-bottom:10px;">
            <?= session('warning') ?>
        </div>
    <?php endif; ?>




                                <!-- FORMULAIRE -->
                                <form action="<?= base_url('index.php/reservation/save_ress') ?>" method="post">
                                    <?= csrf_field() ?>

                                    <!-- Nom -->
                                    <label class="form-label-custom">Nom de la ressource :</label>
                                    <input class="form-input" type="text" name="nom" value="<?= set_value('nom') ?>">
                                    <div class="ci-error"><?= validation_show_error('nom') ?></div>

                                    <!-- Détails -->
                                    <label class="form-label-custom mt-3">Détails :</label>
                                    <textarea class="form-textarea" name="details"><?= set_value('details') ?></textarea>
                                    <div class="ci-error"><?= validation_show_error('details') ?></div>

                                    <!-- Nombre max -->
                                    <label class="form-label-custom mt-3">Nombre maximum :</label>
                                    <input class="form-input" type="number" name="nb_max" 
                                        value="<?= set_value('nb_max') ?>">
                                    <div class="ci-error"><?= validation_show_error('nb_max') ?></div>

                                    <input type="hidden" name="image" >

                                    <button class="btn-submit mt-4" type="submit">
                                        Enregistrer la ressource
                                    </button>

                                </form>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <footer class="bg-white text-center py-3 mt-auto">
                <span>private©Youth Center</span>
            </footer>

        </div>
    </div>

    </body>
    </html>
