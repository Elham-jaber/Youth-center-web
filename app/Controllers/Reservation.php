<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Reservation extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function save_ress()
    {
        $session = session();

        // Vérification de la session utilisateur
        if (!$session->has('user') || $session->get('role') === 'A') {
            return redirect()->to('index.php/compte/connecter');
        }

        $model = new Db_model();

        if ($this->request->getMethod() == "POST") {

          
            // Validation des champs
     
            $validationRules = [
                'nom'     => 'required',
                'details' => 'required',
                'nb_max'  => 'required|integer|greater_than[0]',
            ];

            $validationMessages = [
                'nom' => ['required' => 'Veuillez entrer un nom pour la ressource !'],
                'details' => ['required' => 'Veuillez entrer des détails pour la ressource !'],
                'nb_max' => [
                    'required'     => 'Veuillez indiquer le nombre maximum de personnes !',
                    'integer'      => 'Le nombre doit être un entier.',
                    'greater_than' => 'Le nombre doit être supérieur à 0.'
                ]
            ];

            if (!$this->validate($validationRules, $validationMessages)) {
                return view('form_ress');
            }

          
            // Récupération des données
          
            $nom     = $this->request->getPost('nom');
            $details = $this->request->getPost('details');
            $nb_max  = $this->request->getPost('nb_max');

     
            // Vérifier avec  la procédure CALL si la ressource existe déjà
          
            if ($model->ressourceExister($nom)) {
                // Avertissement NON bloquant
                $session->setFlashdata(
                    'warning',
                    "Attention : une ressource nommée <strong>$nom</strong> existe déjà."
                );
            }

-
            // Ajouter la ressource (même si elle existe déjà)
           
            $model->ajout_ress($nb_max, $details, $nom);

            // Succès
            $session->setFlashdata('success', 'Ressource ajoutée avec succès !');

            return redirect()->to('index.php/compte/formulaire_ress');
        }

        // GET : afficher formulaire
        return view('form_ress');
    }
}
