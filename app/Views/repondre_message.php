<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Répondre au message</title>
    <link href="<?= base_url() ?>templateprivé/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:800px;">

    <h3 style="background:#34495e; color:white; padding:10px; border-radius:6px;">
        Répondre au message
    </h3>

    <!-- Informations du message -->
    <p><strong>Sujet :</strong> <?= esc($message['mess_sujet']) ?></p>
    <p><strong>Date :</strong> <?= esc($message['mess_date']) ?></p>
    <p><strong>Email :</strong> <?= esc($message['mess_mail_pers']) ?></p>
    <p><strong>Question :</strong><br><?= nl2br(esc($message['mess_contenu'])) ?></p>

    <hr>

    <!-- Formulaire de réponse -->
    <form action="<?= base_url('index.php/menu/enregistrerReponse') ?>" method="post">
        <?= csrf_field() ?>

        <input type="hidden" name="id" value="<?= $message['mess_id'] ?>">

        <label><strong>Votre réponse :</strong></label>
        <textarea name="mess_reponse" class="form-control" rows="5"
                  placeholder="Écrivez votre réponse ici..."></textarea>

        <button type="submit" class="btn btn-success mt-3">
            Envoyer la réponse
        </button>
    </form>

</div>

</body>
</html>
