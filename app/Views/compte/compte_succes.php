<div style="
    width: 60%;
    margin: 40px auto;
    background: #ffffff;
    border-radius: 10px;
    padding: 25px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-left: 6px solid #1abc9c;
">

    <h3 style="
        text-align:center;
        background:#34495e;
        color:white;
        padding:12px;
        border-radius:6px;
        text-transform:uppercase;
        font-weight:700;
        letter-spacing:1px;
        margin-bottom:25px;
    ">
        Compte ajouté avec succès 🎉
    </h3>

    <p style="font-size:18px; font-weight:600; color:#27ae60;">
        Bravo ! Le formulaire a bien été envoyé.
    </p>

    <div style="font-size:16px; line-height:1.6; margin-top:15px;">
        <p><strong>Compte ajouté :</strong><br>
        <span style="color:#2c3e50;"><?= $le_compte ?></span></p>

        <p><strong>Message :</strong><br>
        <span style="color:#2c3e50;"><?= $le_message ?></span></p>

        <p><strong>Total des comptes :</strong><br>
        <span style="background:#1abc9c; color:white; padding:6px 12px; border-radius:6px; font-weight:700;">
            <?= $le_total->nb ?>
        </span></p>
    </div>

    <div style="text-align:center; margin-top:25px;">
        <a href="<?= base_url('index.php/compte/lister') ?>"
           style="
                background:#1abc9c;
                color:white;
                padding:10px 20px;
                border-radius:6px;
                font-weight:700;
                text-decoration:none;
                transition:0.2s;
           "
           onmouseover="this.style.background='#16a085'"
           onmouseout="this.style.background='#1abc9c'">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>

</div>
