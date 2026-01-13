<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste Comptes & Messages</title>

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
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" 
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 shadow" style="background:#2c3e50;">
                    <ul class="navbar-nav ml-auto"></ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!--  MESSAGE SUCCESS/ERROR AFFICHE ICI -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success text-center">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger text-center">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <!-- FIN MESSAGES -->

                    <!-- LISTE DES MESSAGES -->
                    <h3 class="section-title">Messages</h3>

                    <div class="table-responsive mb-5">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Sujet</th>
                                    <th>Contenu</th>
                                    <th>Date</th>
                                    <th>Réponse</th>
                                    <th>E-mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                           <tbody>
<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $m): ?>

        <tr>
            <td><?= esc($m['mess_sujet']) ?></td>
            <td><?= esc($m['mess_contenu']) ?></td>
            <td><?= esc($m['mess_date']) ?></td>
            <td><?= esc($m['mess_reponse'] ?? '') ?></td>
            <td><?= esc($m['mess_mail_pers']) ?></td>

            <td class="text-center">

                <?php if (empty($m['mess_reponse'])): ?>
                    <a href="<?= base_url('index.php/compte/afficherlistemessage/'.$m['mess_id']) ?>"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-reply"></i> Répondre
                    </a>
                <?php else: ?>
                    <button class="btn btn-secondary btn-sm" disabled>Déjà répondu</button>
                <?php endif; ?>

            </td>
        </tr>

        <!-- FORMULAIRE SOUS LE MESSAGE -->
        <?php if (isset($id_message_a_repondre) && $id_message_a_repondre == $m['mess_id']): ?>
            <tr>
                <td colspan="6">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('index.php/compte/enregistrerReponse') ?>" method="post">
                        <?= csrf_field() ?>

                        <input type="hidden" name="id" value="<?= $m['mess_id'] ?>">

                        <label><strong>Votre réponse :</strong></label>
                        <textarea name="mess_reponse" class="form-control" rows="3"
                                  placeholder="Écrire la réponse ici..."></textarea>

                        <button type="submit" class="btn btn-success mt-2">Envoyer la réponse</button>

                        <a href="<?= base_url('index.php/compte/afficherlistemessage') ?>"
                           class="btn btn-secondary mt-2">Annuler</a>
                    </form>
                </td>
            </tr>
        <?php endif; ?>

    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-center py-3">Aucun message trouvé.</td>
    </tr>
<?php endif; ?>
</tbody>

</table>
</div>

</div>
</div>

</div>

</body>
</html>
