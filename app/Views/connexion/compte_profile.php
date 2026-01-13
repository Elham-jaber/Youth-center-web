<?php $session = session(); ?>  
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace d'administration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Nunito', sans-serif;
        }

        .header-zone {
            background: #2c3e50;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
            color: white;
        }

        h2 {
            font-weight: 700;
            letter-spacing: 1px;
            color: #1abc9c;
            text-transform: uppercase;
        }

        .btn-retour {
            background: #1abc9c;
            border: none;
            color: white;
            font-weight: 600;
        }

        .btn-retour:hover {
            background: #16a085;
            color: white;
        }

        .card {
            border: none;
            border-radius: 12px !important;
        }

        .gradient-custom {
            background: linear-gradient(135deg, #2c3e50, #34495e);
        }

        .card-body strong {
            color: #1abc9c;
        }

        hr {
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <!-- HEADER -->
    <div class="header-zone mb-4">
        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="m-0">Espace personnelle</h2>
                <small>
                    Connecté en tant que : <strong><?= $session->get('user'); ?></strong>
                </small>
            </div>

            <a href="<?= base_url('index.php/compte/index3') ?>" class="btn btn-retour">
                <i class="fa fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </div>

    <!-- CARTE PROFIL -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 mb-4">

                    <div class="card shadow-sm">
                        <div class="row g-0">

                            <!-- Avatar -->
                            <div class="col-md-4 gradient-custom text-center text-white"
                                 style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                                <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png"
                                     alt="Avatar neutre"
                                     class="img-fluid my-5"
                                     style="width: 80px;" />

                                <h5 class="mt-2"><?= $user->pfl_prenom ?></h5>

                            </div>

                            <!-- Infos -->
                            <div class="col-md-8">
                                <div class="card-body p-4">

                                 
                                    <div class="d-flex justify-content-end mb-2">
                                       
                                    </div>

                                    <h6 class="text-uppercase">Informations</h6>
                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <strong>Email</strong>
                                            <p class="text-muted small mb-0"><?= $user->pfl_email ?></p>
                                        </div>
                                        <div class="col-6">
                                            <strong>Téléphone</strong>
                                            <p class="text-muted small mb-0"><?= $user->pfl_num_de_tel ?></p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <strong>Nom</strong>
                                            <p class="text-muted small mb-0"><?= $user->pfl_nom ?></p>
                                        </div>
                                        <div class="col-6">
                                            <strong>Prénom</strong>
                                            <p class="text-muted small mb-0"><?= $user->pfl_prenom ?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
             </div>
        </div>
    </section>

</div>

</body>
</html>
