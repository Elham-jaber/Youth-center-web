<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votre Portail Privé</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            background: linear-gradient(135deg, #7b2ff7, #f107a3);
            font-family: Arial, sans-serif;
        }

        /* Layout général */
        body {
            display: flex;
            flex-direction: column;
        }

        /* Votre navbar ancienne ira ici */
        header {
            width: 100%;
            padding: 20px;
            background: rgba(0,0,0,0.35);
            backdrop-filter: blur(6px);
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        /* Centre le bloc glass */
        .glass-wrap {
            flex: 1; /* prend tout l'espace disponible */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        /* Bloc glass */
        .glass-box {
            max-width: 800px;
            width: 90%;
            padding: 30px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0px 10px 30px rgba(0,0,0,0.25);
            color: white;
        }

        h1, h2, strong {
            color: white;
        }

        /* Footer fixé en bas, transparent */
        footer {
            width: 100%;
            padding: 15px 0;
            background: rgba(0,0,0,0.3);
            color: white;
            text-align: center;
            font-size: 16px;
            backdrop-filter: blur(5px);
        }

        .alert-warning {
            background-color: rgba(255, 193, 7, 0.9);
            color: black;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<!-- 🟣 NAVBAR ORIGINALE (mets la tienne ici) -->
<header>
    Votre Portail Privé
</header>


<div class="glass-wrap">
    <div class="glass-box">

        <!-- TON CODE EXACT, SANS MODIFICATION -->
        <div class="container mt-4">
            <h1>Votre  Portail privé  </h1><br>
            <h2><?php echo $info->mess_sujet ; ?></h2>
            <p>
                <strong>Date de la demande </strong>
                <?php echo $info-> mess_date ; ?>
                <br><br>

                <strong>Contenu de message </strong>
                <?php echo $info->mess_contenu  ; ?>
                <br><br>

                <strong>Contact de l'expéditeur </strong>
                <?php echo $info->mess_mail_pers ; ?>
                <br><br>

                <?php if (!empty($info->mess_reponse )) : ?>
                    <strong>Réponse : </strong> <br>
                    <?php echo $info->mess_reponse;?>
                    <br><br>

                    <strong>rédigé par :</strong>
                    <?php echo $info->cpt_pseudo;?>
                <?php else : ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        <strong>⚠️ Pas de réponse envoyée pour ce message !</strong>
                    </div>
                <?php endif; ?>
            </p>
        </div>


    </div>
</div>


<footer>
    © 2025 — Portail Privé Jeunesse
</footer>

</body>
</html>
