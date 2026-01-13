<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Contact - Association Jeunes</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE DIRECTEMENT DANS LE FICHIER -->
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .contact-wrapper {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .contact-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #34495e;
        }

        .contact-input, .contact-textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #dcdde1;
            border-radius: 10px;
            font-size: 1rem;
            background: #f7f9fc;
            transition: 0.3s;
        }

        .contact-input:focus, .contact-textarea:focus {
            border-color: #4c87ff;
            background: #ffffff;
            box-shadow: 0 0 8px rgba(76,135,255,0.2);
        }

        .contact-textarea {
            height: 150px;
            resize: none;
        }

        .contact-btn {
            width: 100%;
            background: #4c87ff;
            border: none;
            padding: 14px 0;
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .contact-btn:hover {
            background: #3c6ee6;
        }

        .contact-error {
            margin-top: 6px;
            color: #e74c3c;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>

</head>

<body class="d-flex flex-column">

<main class="flex-shrink-0">
<style>
.error {
    color: red;
    font-weight: bold;
    margin: 10px 0;
}
</style>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">
                <span class="fw-bolder text-primary">Association dédiée aux jeunes</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" >Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <section class="py-5">
        <div class="container px-5">

            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary text-white rounded-3 mb-3">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h1 class="fw-bolder">Get in touch</h1>
                </div>

                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">

                        <div class="contact-wrapper">

                            <!-- MESSAGE GLOBAL -->
                            <?= session()->getFlashdata('error') ?>

                            <!-- FORMULAIRE CODEIGNITER -->
                            <?php echo form_open('index.php/contact/envoi'); ?>
                            <?= csrf_field(); ?>

                            <!-- SUJET -->
                            <div class="mb-3">
                                <label class="contact-label" for="sujet">Sujet</label>
                                <input class="contact-input" id="sujet" name="sujet" type="text"
                                       value="<?= set_value('sujet') ?>">
                                <div class="error"><?= validation_show_error('sujet') ?></div>
                            </div>

                            <!-- EMAIL -->
                            <div class="mb-3">
                                <label class="contact-label" for="email">Email</label>
                                <input class="contact-input" id="email" name="email" type="email"
                                       value="<?= set_value('email') ?>">
                            <!--//Sans ça, le champ sera vide après chaque erreur.-->
                                <div class="error"><?= validation_show_error('email') ?></div>
                            </div>

                            <!-- MESSAGE -->
                            <div class="mb-3">
                                <label class="contact-label" for="message">Message</label>
                                <textarea class="contact-textarea" id="message" name="message"><?= set_value('message') ?></textarea>
                                <div class="error"><?= validation_show_error('message') ?></div>
                            </div>

                            <!-- BOUTON -->
                            <button class="contact-btn" type="submit">Valider</button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>


<!-- Footer -->
<footer class="bg-white py-4 mt-auto">
    <div class="container px-5 text-center small">
        © Association Jeunes 2025
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
