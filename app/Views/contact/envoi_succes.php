<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande envoyée</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .success-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }

        .success-title {
            font-size: 28px;
            font-weight: bold;
            color: #2c7a2c;
        }

        #code-suivi {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            color: #333;
            padding: 10px;
            border: 2px dashed #2c7a2c;
            border-radius: 8px;
            display: inline-block;
        }

        .btn-suivi {
            margin-top: 25px;
            display: inline-block;
            padding: 12px 25px;
            background: #007bff;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn-suivi:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="success-box">
    <div class="success-title">YUPI !</div>
    <p>Votre demande a été envoyée avec succès.</p>
    <p>Voici votre code de suivi (20 caractères) :</p>

    <!-- ⭐ CODE RÉEL (envoyé par le controller) -->
    <div id="code-suivi"><?= $code ?></div>
    <p><strong>Conservez impérativement ce code, car il est requis pour accéder au suivi de votre demande.</strong></p>
    


    <!-- Bouton home -->
    <a href="<?= base_url() ?>" class="btn-suivi">Accueil</a>
</div>

</body>
</html>
