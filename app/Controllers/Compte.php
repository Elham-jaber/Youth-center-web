<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;
class Compte extends BaseController
{
public function __construct()
{
    helper('form');
}
public function lister()
{    
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'A') {
        return redirect()->to('index.php/compte/connecter');
    }
$model = model(Db_model::class);

$data['logins'] = $model->get_all_compte();

return view('affichercompte',$data);
}


public function lister2()//lister les compte adherent
{    
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'G'){
        return redirect()->to('index.php/compte/connecter');
    }
$model = model(Db_model::class);

$data['adhuser'] = $model->lister_adherent();

return view('afficheradherentliste',$data);
}


 public function creer()//fonction de creation de compte invite
{
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'A') {
        return redirect()->to('index.php/compte/connecter');
    }

    helper('form');
    $model = model(Db_model::class);

    if ($this->request->getMethod() == "POST") {

        // 1. Validation formulaire
        if (!$this->validate([
            'pseudo' => 'required|max_length[255]|min_length[2]',
            'mdp' => 'required|max_length[255]|min_length[8]'
        ],
        [
            'pseudo' => [
                'required' => 'Veuillez entrer un pseudo pour le compte !'
            ],
            'mdp' => [
                'required' => 'Veuillez entrer un mot de passe !',
                'min_length' => 'Le mot de passe saisi est trop court !'
            ]
        ])) {
            return view('compte/compte_creer', [
                'titre' => 'Créer un compte'
            ]);
        }

        // 2. Récupération
        $recuperation = $this->validator->getValidated();

        // 3. Vérification pseudo existant
        if ($model->set_compte($recuperation) === false) {

            return view('compte/compte_creer', [
                'titre' => 'Créer un compte',
                'erreur_pseudo' => 'Ce pseudo existe déjà, choisissez-en un autre !'
            ]);
        }

        // 4. SUCCÈS → on reste sur la même page
        return view('compte/compte_creer', [
            'titre' => 'Créer un compte',
            'success' => 'Le compte a été créé avec succès !'
        ]);
    }

    // Affichage normal du formulaire
    return view('compte/compte_creer', ['titre' => 'Créer un compte']);
}



public function connecter()//fonction de connexion 
{
    $model = model(Db_model::class);

    if ($this->request->getMethod() == "POST") {

        // validation du formulaire
        if (!$this->validate([
    'pseudo' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Le champ Pseudo est obligatoire.'
        ]
    ],
    'mdp' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Le champ Mot de passe est obligatoire.'
        ]
    ]
])){
            return view('templates/haut', ['titre' => 'Se connecter'])
                . view('connexion/compte_connecter')
                . view('templates/bas');
        }

        // récupération du login/mdp
        $username = $this->request->getVar('pseudo');
        $password = $this->request->getVar('mdp');

        // récupération du compte
        $compte = $model->connect_compte($username, $password);

        if ($compte != false) {

            $session = session();
            $session->set('user', $username);
            $session->set('role', $compte->pfl_role);  // NULL  invité

            //GESTIONNAIRE
            if ($compte->pfl_role === 'G') {
                $data['res'] = $model->lister_reservation($username, 'G');
                return view('menu_admin', $data);
            }

            //ADHERENT
            if ($compte->pfl_role === 'A') {
                $data['res'] = $model->lister_reservation($username, 'A');
                return view('menu_adherent', $data);
            }

            //INVITE (pas de profil → role = NULL)
            if ($compte->pfl_role === NULL) {
                $data['res'] = $model->lister_reservation($username, NULL);
                return view('menu_invite', $data);
            }
        }

        // mauvais identifiants
        session()->setFlashdata('error', 'Identifiants incorrects !');
        return redirect()->to('index.php/compte/connecter');
    }

    // simple affichage du formulaire
    return view('templates/haut', ['titre' => 'Se connecter'])
        . view('connexion/compte_connecter')
        . view('templates/bas');
}

public function index3()
{
    $session = session();
    $model   = model(Db_model::class);

    // récupérer le pseudo et le rôle
    $username = $session->get('user');
    $role     = $session->get('role');   // NULL pour un invité

    // si pas connecté du tout → redirection
    if (!$username) {
        return redirect()->to('index.php/compte/connecter');
    }

    // récupérer les réservations selon le rôle
    $data['res'] = $model->lister_reservation($username, $role);

    // dispatch
    if ($role === 'G') {
        return view('menu_admin', $data);
    }

    else if ($role === 'A') {
        return view('menu_adherent', $data);
    }

    // INVITÉ → rôle NULL
    return view('menu_invite', $data);
}
     public function index()
    {
       $session = session();

    if ($session->has('user')) {

        $model = model(Db_model::class);

        // récupérer le pseudo depuis la session
        $username = $session->get('user');

        // récupérer les réservations
        $data['res'] = $model->lister_reservation($username);

        return view('menu_admin', $data);
    }

    // si pas connecté, retour login
    return redirect()->to('index.php/compte/connecter');
    }


    public function deconnecter()
    {
        $session=session();
        $session->destroy();
        return view('templates/haut', ['titre' => 'Se connecter'])
            . view('connexion/compte_connecter')
            . view('templates/bas');
    }


      public function index2()
    {
       $session=session();
      if  ($session->has('user') && ($session->get('role') === 'A' ||$session->get('role') === 'G')){
         // récupérer le pseudo depuis la session
        $user = $session->get('user');
        $model = model(Db_model::class);
        $data['user']=$model->get_all_infos($user);
      return view('connexion/compte_profile',$data);
    }return redirect()->to('index.php/compte/connecter');

  
  }



public function afficher_formulaire(){
   $session = session();

    if  (!$session->has('user') || $session->get('role') === 'A')  {
          return redirect()->to('index.php/compte/connecter');}
        $model = model(Db_model::class);
  return view('compte/compte_creer');}
  



public function afficherlistemessage($id = null)
{
    $session = session();
    if  (!$session->has('user') || $session->get('role') === 'A') {
        return redirect()->to('index.php/compte/connecter');
    }

    $model = new Db_model();

    // Tous les messages
    $data['messages'] = $model->listertoutmessage();

    // ID du message choisi pour répondre
    $data['id_message_a_repondre'] = $id;

    return view('affichagemessages', $data);
}






public function enregistrerReponse()
{
    $session = session();

    if  (!$session->has('user') || $session->get('role') === 'A')  {
        return redirect()->to('index.php/compte/connecter');
    }

    // Récupérer les données
    $id = $this->request->getPost('id');
    $reponse = $this->request->getPost('mess_reponse');

    // Réponse vide → retourner au formulaire
    if (trim($reponse) === "") {
        return redirect()->to('index.php/compte/afficherlistemessage/'.$id)
                         ->with('error', 'Veuillez écrire une réponse.');
    }

    //  Ici ton pseudo est une simple string
    $pseudo = $session->get('user');  // OK ! C’est TON format

    // Charger modèle
    $model = new Db_model();

    // Enregistrer la réponse avec le pseudo de l'admin
    $model->enregistrerReponse($id, $reponse, $pseudo);

    return redirect()->to('index.php/compte/afficherlistemessage')
                     ->with('success', 'Réponse envoyée avec succès.');
}


public function affichercreneau(){
     $session = session();

    if (!$session->has('user') || $session->get('role') === 'G') {
        return redirect()->to('index.php/compte/connecter');
    }
    return view('reservation');

}

public function affichercreneau1(){
     $session = session();

    if (!$session->has('user') || $session->get('role') === 'A')  {
        return redirect()->to('index.php/compte/connecter');
    }
    return view('reservation1');

}

public function reserver_action()
{
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'G'){
        return redirect()->to('index.php/compte/connecter');
    }

    // IMPORTANT : récupérer le bon champ
    $date = $this->request->getPost('date');


    if (!$date) {
        return redirect()->to('index.php/compte/affichercreneau')
        ->with('error', 'Veuillez choisir une date.');
    }

    $model = new Db_model();

    $reservations = $model->get_reservation($date);

    $data = [
        'date' => $date,
        'reservations' => $reservations
    ];

    return view('reservation_jour', $data);
}


public function reserver_action1()
{
    $session = session();

    if(!$session->has('user') || $session->get('role') === 'A'){
        return redirect()->to('index.php/compte/connecter');
    }

    // IMPORTANT : récupérer le bon champ
    $date = $this->request->getPost('date');


    if (!$date) {
        return redirect()->to('index.php/compte/affichercreneau1')
        ->with('error', 'Veuillez choisir une date.');
    }

    $model = new Db_model();

    $reservations = $model->get_reservation($date);

    $data = [
        'date' => $date,
        'reservations' => $reservations
    ];

    return view('reservation_jour1', $data);
}

public function afficher_ressource(){
     $session = session();
    if(!$session->has('user') || $session->get('role') === 'A') {
        return redirect()->to('index.php/compte/connecter');
    }

    
    $model = new Db_model();
    $ressources = $model->get_all_ressource();
    $data=['ressources'=> $ressources];
    return view ('afficher_ressource', $data);


}

public function formulaire_ress(){
    $session = session();

    if (!$session->has('user') || $session->get('role') === 'A')  {
        return redirect()->to('index.php/compte/connecter');
    }
    return view('form_ress');
}





}