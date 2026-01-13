<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivre ma demande</title>

    <!-- BOOTSTRAP CSS pour que ta NAVBAR fonctionne -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding-top: 90px; /* espace sous la navbar */
        }

        .tracking-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            width: 450px;
            text-align: center;
        }

        .tracking-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .tracking-label {
            font-size: 16px;
            text-align: left;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            display: block;
        }

        .tracking-input {
            width: 100%;
            padding: 14px;
            border: 2px solid #dcdde1;
            border-radius: 10px;
            font-size: 16px;
            margin-bottom: 10px;
            background: #f7f9fc;
            transition: 0.2s;
        }

        .tracking-input:focus {
            border-color: #4c87ff;
            background: #ffffff;
            box-shadow: 0 0 6px rgba(76, 135, 255, 0.2);
        }

        .tracking-btn {
            width: 100%;
            padding: 14px;
            border: none;
            background: #007bff;
            color: white;
            font-size: 18px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .tracking-btn:hover {
            background: #0056b3;
        }

        .error-msg {
            color: #e74c3c;
            font-weight: bold;
            margin: 10px 0;
        }

        .btn-home {
            position: absolute;
            top: 20px;
            right: 25px;
            background: #007bff;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-home:hover {
            background: #0056b3;
        }
    </style>

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm fixed-top">
    <div class="container px-5">
        <a class="navbar-brand">
            <span class="fw-bolder text-primary">assosciation dédiée aux jeunes</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- 🌟 FIN DE TA NAVBAR 🌟 -->


<!-- BOUTON ACCUEIL (je le laisse car tu l’avais) -->
<a href="<?= base_url('/') ?>" class="btn-home">Accueil</a>

<div class="tracking-box">
    <div class="tracking-title"> Suivre ma demande</div>
    <p>Entrez votre code de suivi (20 caractères) :</p>

    <?= form_open('index.php/contact/verifier') ?>

        <label class="tracking-label" for="code">Code de suivi</label>

        <input 
            type="text" 
            id="code" 
            name="code" 
            class="tracking-input" 
            maxlength="20"
            placeholder="Ex : A7f9GgT8pL92kQxYwB3"
            value="<?= set_value('code') ?>" 
        >

        <!-- ERREUR validation -->
        <?php if (validation_show_error('code')) : ?>
            <div class="error-msg">
                <?= validation_show_error('code') ?>
            </div>
        <?php endif; ?>

        <button type="submit" class="tracking-btn">Visualiser</button>

    </form>

    <!-- Flashdata -->
    <?php if (session()->getFlashdata('message')) : ?> <!--on verifie s'il ya un message-->
        <div class="error-msg">
            <?= session()->getFlashdata('message') ?><!--affixhe le message-->
        </div>
    <?php endif; ?>

</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
