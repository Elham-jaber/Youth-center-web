<style>
    .login-container {
        width: 350px;
        margin: 60px auto;
        padding: 25px;
        border-radius: 10px;
        background: #ffffff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: 600;
    }

    .login-container label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #444;
    }

    .login-container input[type="input"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .login-container input[type="submit"] {
        width: 100%;
        margin-top: 20px;
        padding: 10px;
        background: #4e73df;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .login-container input[type="submit"]:hover {
        background: #2e59d9;
    }

    .error-message {
        color: red;
        margin-top: 10px;
        text-align: center;
    }
   
    .ci-error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

</style>

<div class="login-container">
    <h2><?php echo $titre; ?></h2>

    <div class="error-message">
        <?= session()->getFlashdata('error') ?>
    </div>

    <?php echo form_open('index.php/compte/connecter'); ?>
    <?= csrf_field() ?>

        <label for="pseudo">Pseudo :</label>
        <input type="input" name="pseudo" value="<?= set_value('pseudo') ?>">
        <div class="ci-error"><?= validation_show_error('pseudo') ?></div>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">
        <div class="ci-error"><?= validation_show_error('mdp') ?></div>
        <input type="submit" name="submit" value="Se connecter">

    </form>
</div>
