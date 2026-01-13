<?php 
namespace App\Controllers;

use App\Models\Db_model;

class Contact extends BaseController
{
 public function __construct()
    {
       helper('form');
       $this->model = model(Db_model::class);
    }
    public function index()
    {
      
        return view('contact/form');
    }
        public function index1()
    {
      
        return view('contact/suivre_demande');
    }

  public function envoi()
{
    if ($this->request->getMethod() === "POST")
    {
        // 1 Validation
        if (!$this->validate([
            'sujet'   => 'required|min_length[2]|max_length[255]',
            'email'   => 'required|valid_email|max_length[255]',
            'message' => 'required|min_length[10]'
        ] ,
        [        // Configuration des messages d’erreurs
          'sujet' => [
             'required' => 'Veuillez entrer un sujet (au moins 5 caractères !)',
          ],
          'email' => [
             'required' => 'Veuillez entrez un mail valide : email@gmail.com',
             'min_length' => 'Le mail entré est trop court  !'],
          'message'  => [
             'required' => 'Le champs message est requis !',
             'min_length' => 'Le message entré est trop court (au moins 20 caractère)!', 
          ]
        ]
        ))
        {
            return view('contact/form', ['valider' => $this->validator]);
        }

        //  Récupère les données validées
        $data = $this->validator->getValidated();

        // 3 Génère un code de 20 caractères
        $code = bin2hex(random_bytes(10)); // 20 caractères

        // 4 Ajoute le code aux données
        $data['code'] = $code;

        // 5Insert dans la base
        $this->model->set_message($data);

        // 6 Envoie du code vers la vue
        return view('contact/envoi_succes', [
            'code' => $code,
            'sujet' => $data['sujet'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);
    }

    return view('contact/form');
}

 


public function afficher_message2(){
    $code = session()->get('code_suivi'); // On récupère le code ici
    if ($code===null) {
        return redirect()->to('/');
    }
    $data['titre']="suivi de votre demande ";
    $data['info']=$this->model->get_mess($code);
    return view('templates/haut')
           .view('suivi_message', $data)
           .view('templates/bas');   

}


public function verifier()
{
    if ($this->request->getMethod() === "POST")
    {
        // Validation en français
        if (! $this->validate([
            'code' => [
                'rules'  => 'required|exact_length[20]',
                'errors' => [
                    'required'     => 'Veuillez entrer le code de suivi.',
                    'exact_length' => 'Le code doit contenir exactement 20 caractères.'
                ]
            ]
        ]))
        {
            return view('contact/suivre_demande', [
                'validation' => $this->validator  // ✔ envoyer les erreurs
            ]);
        }

        // Récupération du code
        $code = $this->request->getPost('code');

        // Vérification en base
        $resultat = $this->model->verifier_code($code);

        if (empty($resultat))
        {
            //  On envoie un message via flashdata
            session()->setFlashdata('message', 'Aucune demande trouvée correspondant au code saisi !');
            return redirect()->to('https://obiwan.univ-brest.fr/~e22110297/index.php/contact/index1');
        }

        // Succès
        session()->set('code_suivi', $code);
        return redirect()->to('index.php/contact/afficher_message2');
    }

    return view('contact/suivre_demande');
}
}