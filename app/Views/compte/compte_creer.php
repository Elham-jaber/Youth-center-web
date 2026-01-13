<div style="
    width: 60%;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
">
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

    <h2 style="
        text-align:center;
        background:#34495e;
        color:white;
        padding:12px;
        border-radius:6px;
        text-transform:uppercase;
        letter-spacing:1px;
        font-weight:700;
        margin-bottom:25px;
    ">Créer un nouveau compte invité</h2>

    <!-- MESSAGE DE SUCCÈS -->
    <?php if (isset($success)): ?>
        <div style="
            background:#2ecc71;
            color:white;
            padding:12px;
            border-radius:6px;
            margin-bottom:15px;
            text-align:center;
            font-weight:bold;
        ">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <!-- ERREUR : pseudo déjà existant -->
    <?php if (isset($erreur_pseudo)): ?>
        <div style="
            background:#e74c3c;
            color:white;
            padding:12px;
            border-radius:6px;
            margin-bottom:15px;
            text-align:center;
            font-weight:bold;
        ">
            <?= $erreur_pseudo ?>
        </div>
    <?php endif; ?>

    <!-- Erreurs validation CI4 -->
   

    <?= form_open('index.php/compte/creer'); ?>
    <?= csrf_field() ?>

    <!-- Pseudo -->
    <label for="pseudo" style="font-weight:600;">Pseudo :</label>
    <input 
        type="text" 
        name="pseudo"
        value="<?= set_value('pseudo') ?>"
        style="
            width:100%;
            padding:10px;
            border-radius:6px;
            border:1px solid #ccc;
            margin-bottom:5px;
        "
    >
    <small style="color:#e74c3c;"><?= validation_show_error('pseudo') ?></small>

    <br><br>

    <!-- Mot de passe -->
    <label for="mdp" style="font-weight:600;">Mot de passe :</label>
    <input 
        type="password" 
        name="mdp"
        style="
            width:100%;
            padding:10px;
            border-radius:6px;
            border:1px solid #ccc;
            margin-bottom:5px;
        "
    >
    <small style="color:#e74c3c;"><?= validation_show_error('mdp') ?></small>

    <br><br>

    <!-- Bouton -->
    <button 
        type="submit"
        style="
            background:#1abc9c;
            border:none;
            padding:12px 20px;
            border-radius:6px;
            color:white;
            font-weight:700;
            width:100%;
            cursor:pointer;
            transition:0.2s;
        "
        onmouseover="this.style.background='#16a085'"
        onmouseout="this.style.background='#1abc9c'"
    >
        Créer un nouveau compte
    </button>

    </form>

</div>
