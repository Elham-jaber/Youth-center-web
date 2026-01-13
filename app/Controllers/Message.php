<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;
class Message extends BaseController
{
public function __construct()
{
    helper('form'); //Un helper (ou “aide”) est un fichier de fonctions utilitaires que tu peux charger quand tu en as besoin.
//Il contient des petites fonctions prêtes à l’emploi pour t’aider à faire certaines tâches rapidement (formulaires, URLs, fichiers, texte, etc.).
//helper('form') → pour créer des formulaires
    $this->model=model(Db_model::class);
}
//public function afficher_message($string){
    //$data['titre']="suivi de votre demande ";
   // $data['info']=$this->model->get_mess($string);
    //return view('templates/haut')
      //     .view('suivi_message', $data)
        //   .view('templates/bas'); 

}


