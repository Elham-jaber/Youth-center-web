<!-- app/Views/menu_visiteur.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
    <div class="container px-5">
        <a class="navbar-brand" href="<?= base_url('/') ?>">
            <span class="fw-bolder text-primary">Association dédiée aux jeunes</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVisiteur" aria-controls="navbarVisiteur" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarVisiteur">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/contact/index') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('index.php/contact/index1') ?>">Suivre ma demande</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="<?= base_url('index.php/compte/connecter') ?>">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
