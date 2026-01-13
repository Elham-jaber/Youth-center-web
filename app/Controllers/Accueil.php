<?php 
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;
class Accueil extends BaseController
{
public function afficher()
{  // Charger le modèle
        $model = new Db_model();

        // Récupérer les actualités
        $data['actus'] = $model->lister_actu();  // Méthode du modèle

        // Envoyer les données à la vue
        return view('templates/haut')
             . view('templates/container',$data )
             . view('templates/bas');


}
}
?>
