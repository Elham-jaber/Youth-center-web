<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;
class Delete extends BaseController{

public function __construct()
{
    helper('form');
} 
public function delete_ress(){
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'A'){
        return redirect()->to('index.php/compte/connecter');
    }

    // Récupérer l’ID envoyé en POST
    $id = $this->request->getPost('ress_id');

    if (!$id) {
        // Sécurité : aucun ID => rien à supprimer
        return redirect()->to('index.php/compte/afficher_ressource')
                         ->with('error', 'ID ressource manquant.');
    }

    $model = new Db_model();

    // Supprimer la ressource
    $model->delete_ressource($id);

    return redirect()->to('index.php/compte/afficher_ressource')
                     ->with('success', 'Ressource supprimée.');
}}