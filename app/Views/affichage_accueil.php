<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Actualités</title>

  <!--  Bootstrap + DataTables CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <style>
    /*  Fond dégradé animé */
    body {
      background: linear-gradient(135deg, #43cea2, #185a9d, #667eea);
      background-size: 400% 400%;
      animation: gradientBG 12s ease infinite;
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /*  Conteneur principal */
    .glass-card {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 25px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: white;
      width: 95%;
      max-width: 1400px;
      padding: 40px;
      margin: 100px auto 50px;
    }

    /*  Bouton Home (plus clair et plus haut) */
    .home-btn {
      position: fixed;
      top: 25px;
      left: 35px;
      background: rgba(255, 255, 255, 0.5);
      border: 2px solid rgba(255, 255, 255, 0.6);
      color: #0d1b2a;
      padding: 10px 22px;
      border-radius: 14px;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      backdrop-filter: blur(8px);
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.3);
      transition: all 0.3s ease;
    }

    .home-btn:hover {
      background: white;
      color: #185a9d;
      transform: scale(1.07);
      box-shadow: 0 6px 20px rgba(255, 255, 255, 0.6);
    }

    /*  Titre */
    h2 {
      text-align: center;
      color: white;
      font-weight: 700;
      margin-bottom: 30px;
      letter-spacing: 0.5px;
    }

    /* Tableau */
    table {
      border-collapse: separate !important;
      border-spacing: 0;
      width: 100%;
      border-radius: 15px;
      overflow: hidden;
    }

    thead {
      background: rgba(255, 255, 255, 0.25);
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    tbody tr {
      background: rgba(255, 255, 255, 0.1);
      transition: 0.3s ease;
    }

    tbody tr:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: scale(1.01);
    }

    th, td {
      padding: 14px;
      text-align: center;
      color: #fff;
    }

    /*  DataTables champs et boutons stylés */
    .dataTables_filter input, 
    .dataTables_length select {
      background-color: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
      border-radius: 10px;
      padding: 6px 12px;
    }

    .dataTables_filter label,
    .dataTables_length label {
      color: white;
    }

    .paginate_button {
      color: white !important;
      background-color: rgba(255, 255, 255, 0.1) !important;
      border-radius: 10px !important;
      border: none !important;
    }

    .paginate_button.current {
      background-color: rgba(255, 255, 255, 0.3) !important;
    }
  </style>
</head>

<body>
  <!--  Bouton Home -->
  <a href="<?= base_url('/') ?>" class="home-btn">Home</a>

  <div class="glass-card">
    <h2> Liste des Actualités</h2>
    <div class="table-responsive">
      <table id="tableActu" class="table table-hover">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($actus)): ?>
            <?php foreach ($actus as $actu): ?>
              <tr>
                <td><?= esc($actu['actu_titre']) ?></td>
                <td><?= esc($actu['actu_contenu']) ?></td>
                <td><?= esc($actu['actu_date']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4">Aucune actualité trouvée</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#tableActu').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        },
        pageLength: 7,
        lengthMenu: [5, 10, 20, 50],
        order: [[0, 'desc']]
      });
    });
  </script>
</body>
</html>
