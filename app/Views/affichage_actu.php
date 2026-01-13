<div class="actus-container" style="width:80%; margin:20px auto;">

    <h3 style="
        text-align:center;
        background: #8000ff;;
        color:white;
        padding:10px;
        border-radius:5px;
        letter-spacing:1px;
    ">
        <?= isset($titre_page) ? esc($titre_page) : 'Fil d’actualités' ?>
    </h3>

    <table style="
        border-collapse:collapse;
        width:100%;
    ">
        <thead>
            <tr style="background:#f2f2f2;">
                <th style="border:1px solid #ccc; padding:8px;">Titre</th>
                <th style="border:1px solid #ccc; padding:8px;">Description</th>
                <th style="border:1px solid #ccc; padding:8px;">Date</th>
                 <th style="border:1px solid #ccc; padding:8px;">Auteur</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($actus)): ?>
                <?php foreach ($actus as $actu): ?>
                    <tr>
                        <td style="border:1px solid #ccc; padding:8px;">
                            <?= esc($actu['actu_titre']) ?>
                        </td>

                        <td style="border:1px solid #ccc; padding:8px;">
                            <?= esc($actu['actu_contenu']) ?>
                        </td>

                        <td style="border:1px solid #ccc; padding:8px;">
                            <?= esc($actu['actu_date']) ?>
                        </td>
                         <td style="border:1px solid #ccc; padding:8px;">
                            <?= esc($actu['cpt_pseudo']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center; padding:15px;">
                        Aucune actualité trouvée
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
