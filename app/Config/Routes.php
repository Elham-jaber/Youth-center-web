<?php
use App\Controllers\Delete;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Compte;
use App\Controllers\Actualite;
use App\Controllers\Message;
use App\Controllers\Contact;
use App\Controllers\Reservation;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Accueil::afficher');

$routes->get('compte/lister', [Compte::class, 'lister']);
$routes->get('actualite/afficher/(:num)', [Actualite::class, 'afficher']);
$routes->get('actualite/tab_actu', [Actualite::class, 'tab_actu']);
$routes->get('afficher_message/(:any)', [Message::class, 'afficher_message']);
$routes->get('compte/creer', [Compte::class, 'creer']);
$routes->post('compte/creer', [Compte::class, 'creer']);

// ROUTES CONTACT
$routes->get('contact/index', 'Contact::index');        //  form
$routes->post('contact/envoi', 'Contact::envoi'); 

$routes->get('contact/message', 'Contact::message');
$routes->get('contact/index1', 'Contact::index1');
$routes->post('contact/verifier', 'Contact::verifier');

$routes->get('contact/index2', 'Contact::index2');

$routes->get('contact/afficher_message2', 'Contact::afficher_message2');


$routes->get('compte/connecter', [Compte::class, 'connecter']); 
$routes->post('compte/connecter', [Compte::class, 'connecter']);


$routes->get('compte/index', [Compte::class, 'index']); 

$routes->get('compte/deconnecter', [Compte::class, 'deconnecter']); 
$routes->get('compte/afficher_profil', [Compte::class, 'afficher_profil']); 

$routes->get('compte/index2', [Compte::class, 'index2']); 

$routes->get('compte/index3', [Compte::class, 'index3']); 

$routes->get('compte/lister2', [Compte::class, 'lister2']); 


$routes->get('compte/afficher_formulaire', [Compte::class, 'afficher_formulaire']); 
$routes->get('compte/afficherlistemessage', 'Compte::afficherlistemessage');
$routes->get('compte/afficherlistemessage/(:num)', 'Compte::afficherlistemessage/$1');
$routes->post('compte/enregistrerReponse', 'Compte::enregistrerReponse');

$routes->get('compte/affichercreneau', [Compte::class, 'affichercreneau']);
$routes->get('compte/affichercreneau1', [Compte::class, 'affichercreneau1']);

$routes->get('compte/reserver_action', 'Compte::reserver_action');
$routes->post('compte/reserver_action', 'Compte::reserver_action');

$routes->get('compte/reserver_action1', 'Compte::reserver_action1');
$routes->post('compte/reserver_action1', 'Compte::reserver_action1');


$routes->get('compte/afficher_ressource', 'Compte::afficher_ressource');
$routes->post('compte/reserver_action1', 'Compte::reserver_action1');

$routes->get('delete/delete_ress', [Delete::class, 'delete_ress']);
$routes->post('delete/delete_ress', [Delete::class, 'delete_ress']);


$routes->get('compte/formulaire_ress', 'Compte::formulaire_ress');

$routes->post('reservation/save_ress', 'Reservation::save_ress');










