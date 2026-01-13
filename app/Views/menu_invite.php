<div style="
    max-width: 600px;
    margin: 80px auto;
    padding: 30px;
    text-align: center;
    font-family: Arial, sans-serif;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
">
    <h2 style="color:#333; margin-bottom: 15px;">
        Accès invité
    </h2>

    <p style="font-size: 16px; color: #555; line-height: 1.6;">
        Vous êtes actuellement connecté avec un 
        <strong>compte invité</strong>.
    </p>

    <p style="font-size: 16px; color: #555; line-height: 1.6;">
        En tant qu’invité, vous ne disposez d’aucun accès 
        à l’espace privé de l’association.
    </p>

    <p style="font-size: 15px; color: #777; margin-top: 25px;">
        Pour accéder à l’ensemble des fonctionnalités,  
        veuillez vous connecter avec un compte membre.
    </p>

    <!-- Bouton avec redirection -->
    <button onclick="window.location.href='<?= base_url('index.php/compte/deconnecter') ?>';"

       style="
           margin-top: 25px;
           padding: 10px 20px;
           background: #007BFF;
           color: white;
           border: none;
           border-radius: 5px;
           font-size: 15px;
           cursor: pointer;
           transition: background 0.2s;
       "
       onmouseover="this.style.background='#0056b3'"
       onmouseout="this.style.background='#007BFF'">
        Retour 
    </button>
</div>
<div class="container d-flex justify-content-center mt-5">
                        <div style="width:80%;">

                            <h3 class="section-title">
                                Réservations à venir
                            </h3>

                            <table style="border-collapse:collapse; width:100%;">
                                <thead>
                                    <tr style="background:#f2f2f2;">
                                        <th style="border:1px solid #ccc; padding:8px;">Ressource réservée</th>
                                        <th style="border:1px solid #ccc; padding:8px;">Date</th>
                                        <th style="border:1px solid #ccc; padding:8px;">Heure</th>
                                        <th style="border:1px solid #ccc; padding:8px;">Participants</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($res)): ?>
                                        <?php foreach ($res as $item): ?>
                                            <tr>
                                                <td style="border:1px solid #ccc; padding:8px;">
                                                    <?= esc($item['ress_nom']) ?>
                                                </td>
                                                <td style="border:1px solid #ccc; padding:8px;">
                                                    <?= esc($item['res_date']) ?>
                                                </td>
                                                <td style="border:1px solid #ccc; padding:8px;">
                                                    <?= esc($item['res_heure_debut']) ?>
                                                </td>
                                                <td style="border:1px solid #ccc; padding:8px;">
                                                    <?= esc($item['participants']) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                           <td colspan="4" style="text-align:center; padding:25px; color:#1abc9c;">
                                                <strong>Aucune réservation trouvée !</strong>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- END TABLEAU -->

                </div>
                <!-- End Page Content -->
