<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .error-box {
            background:white;
            padding:30px 40px;
            border-radius:10px;
            box-shadow:0 8px 20px rgba(0,0,0,0.15);
            text-align:center;
            max-width:500px;
        }
        .error-title {
            font-size:22px;
            font-weight:bold;
            color:#e74c3c;
            margin-bottom:10px;
        }
        .error-message {
            font-size:16px;
            margin-bottom:20px;
        }
        .error-btn {
            display:inline-block;
            padding:10px 18px;
            border-radius:6px;
            border:none;
            background:#007bff;
            color:white;
            text-decoration:none;
            font-weight:bold;
        }
        .error-btn:hover {
            background:#0056b3;
        }
    </style>
</head>
<body>

<div class="error-box">
    <div class="error-title">⚠️ Erreur</div>
    <p class="error-message">
        <?= esc($message) ?>
    </p>
    <a href="<?= site_url('index.php/contact/index1') ?>" class="error-btn">
        Retour au formulaire
    </a>
</div>

</body>
</html>
