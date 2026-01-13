<?php
namespace App\Models;
use CodeIgniter\Model;
class Db_model extends Model
{
protected $db;
public function __construct()
{
$this->db = db_connect(); //charger la base de données
// ou
// $this->db = \Config\Database::connect();
}
public function get_all_compte()
{
$resultat = $this->db->query("SELECT* FROM t_compte_cpt left join t_profil_pfl using (cpt_id) order by cpt_etat ;");
return $resultat->getResultArray();
}
public function compter_comptes()
{
$resultat = $this->db->query("SELECT COUNT(*) as total from t_compte_cpt");
return $resultat->getRow();
}

    /*...*/
    /* Fonction membre à ajouter sous le constructeur et get_all_compte() : */
    public function get_actualite($numero)
    {
    $requete="SELECT * FROM t_actualite_actu WHERE actu_id=".$numero.";";
    $resultat = $this->db->query($requete);
    return $resultat->getRow();
    }

    public function afficher()
{
$resultat = $this->db->query("SELECT actu_titre FROM t_actualite_actu;");
return $resultat->getResultArray();
}

    public function lister_actu()
    {
    $requete="SELECT `actu_contenu`, `actu_titre`, `actu_etat`, `actu_date` , cpt_pseudo FROM t_actualite_actu join t_compte_cpt using (cpt_id) where actu_etat='A'  ORDER BY actu_date DESC limit 5;";
    $resultat = $this->db->query($requete);
    return $resultat->getResultArray();
    }
  public function get_mess($code)
{
    $sql = "SELECT  cpt_pseudo, `mess_contenu`, `mess_sujet`, `mess_code`, `mess_date`, `mess_reponse`, `mess_mail_pers`, `cpt_id`
     FROM `t_message_mess` left join t_compte_cpt using (cpt_id) WHERE mess_code = ?";

    // On exécute la requête avec le paramètre $code
    $resultat = $this->db->query($sql, [$code]);

    // On récupère une seule ligne (objet)
    return $resultat->getRow();
}

 public function get_nb_comptes()
   {
    // Fonction créée et testée dans le précédent tutoriel
    $resultat=$this->db->query("SELECT COUNT(*) as nb FROM t_compte_cpt;");
    return $resultat->getRow();
   }
 public function set_compte($saisie)
{
    //Récupération des données du formulaire
    $login = $saisie['pseudo'];
    $mot_de_passe = $saisie['mdp'];

    // 1. Vérifier si le pseudo existe déjà
    $sql1 = "SELECT COUNT(*) AS nb FROM t_compte_cpt WHERE cpt_pseudo = ?";
    $query = $this->db->query($sql1, array($login));
    $result = $query->getRow();


    // 2. Si COUNT = 0 → insertion
    if ($result->nb == 0) {
        $sql2 = "INSERT INTO t_compte_cpt (cpt_id, cpt_mot_de_passe, cpt_pseudo, cpt_etat)
                 VALUES (NULL, ?, ?, 'A')";
        return $this->db->query($sql2, array($mot_de_passe, $login));
    } else {
        // Pseudo déjà existant
        return false;
    }
}


   
   public function set_message($saisie)
{
    // Récupération des champs du formulaire
    $sujet   = $saisie['sujet'];
    $email   = $saisie['email'];
    $message = $saisie['message'];
    $code    = $saisie['code']; // code de 20 caractères généré avant

    // Requête SQL brute (comme ton style)
  $sql = "INSERT INTO t_message_mess
        VALUES (NULL, ?, ?, ?, CURRENT_DATE(), NULL, ?, NULL)";

return $this->db->query($sql, [
    $message,
    $sujet,
    $code,
    $email
]);
}
public function verifier_code($code)
{
 

    // Requête SQL classique
    $sql = "SELECT  cpt_pseudo, `mess_contenu`, `mess_sujet`, `mess_code`, `mess_date`, `mess_reponse`, `mess_mail_pers`, `cpt_id`
     FROM `t_message_mess` left join t_compte_cpt using (cpt_id) WHERE mess_code = ?";
    $query = $this->db->query($sql, [$code]);

    // Retourner la ligne (ou null si non trouvée)
    return $query->getRowArray();
}

 public function connect_compte($u, $p)
{
    // NE PAS hasher ici, le trigger le fait déjà !
    
    $sql = "SELECT cpt_id, cpt_pseudo, cpt_mot_de_passe, pfl_role
            FROM t_compte_cpt
            left JOIN t_profil_pfl USING (cpt_id)
            WHERE cpt_pseudo = ?
            AND cpt_mot_de_passe = SHA2(CONCAT('OnRajouteDuSelPourAllongerLeMDP123!~45678__Test', ?), 256) 
             AND cpt_etat='A'" ;
    
    $result = $this->db->query($sql, [$u, $p]);

    if ($result->getNumRows() > 0) {
        return $result->getRow();
    } else {
        return false;
    }


    }

    /**
     * Liste des réservations pour un utilisateur
     */
public function lister_reservation($username, $role)
{
    //CAS : INVITÉ → pas de profil
    if ($role === NULL) {

        $sql = "
            
        SELECT
            cpt_pseudo,
            ress_nom,
            res_date,
            res_heure_debut,
            res_etat,
            (
                SELECT GROUP_CONCAT(c2.cpt_pseudo SEPARATOR ', ')
                FROM t_inscription_ins i2
                JOIN t_compte_cpt c2 USING (cpt_id)
                WHERE i2.res_id = res.res_id
            ) AS participants
        FROM t_ressource_ress r
        JOIN t_reservation_res res USING (ress_id)
        JOIN t_inscription_ins ins USING (res_id)
        JOIN t_compte_cpt cpt USING (cpt_id)
        WHERE res.res_date >= CURDATE()
          AND res.res_heure_debut > CURTIME()
          AND cpt.cpt_pseudo = '".$username."' AND res.res_etat='A'
        ORDER BY res.res_date ASC, res.res_heure_debut ASC
    
        ";

        return $this->db->query($sql)->getResultArray();
    }

    // CAS : G ou A → ses réservations
    $sql = "
        SELECT
            cpt_pseudo,
            ress_nom,
            res_date,
            res_heure_debut,
            (
                SELECT GROUP_CONCAT(c2.cpt_pseudo SEPARATOR ', ')
                FROM t_inscription_ins i2
                JOIN t_compte_cpt c2 USING (cpt_id)
                WHERE i2.res_id = res.res_id
            ) AS participants
        FROM t_ressource_ress r
        JOIN t_reservation_res res USING (ress_id)
        JOIN t_inscription_ins ins USING (res_id)
        JOIN t_compte_cpt cpt USING (cpt_id)
        WHERE res.res_date >= CURDATE()
          AND res.res_heure_debut > CURTIME()
          AND cpt.cpt_pseudo = ?
        ORDER BY res.res_date ASC, res.res_heure_debut ASC
    ";

    return $this->db->query($sql, [$username])->getResultArray();
}




public function get_all_infos($user){
    $requete="SELECT * From t_compte_cpt JOIN t_profil_pfl USING (cpt_id) where 
    cpt_pseudo=?";
     return $this->db->query($requete, [$user])->getRow();
}

public function lister_adherent(){
    $sql="SELECT * FROM t_compte_cpt left join t_profil_pfl using(cpt_id) where pfl_role ='A' order by cpt_etat;";
     return $this->db->query($sql)->getResultArray();
}

public function listertoutmessage(){
  $sql = "SELECT *
        FROM t_message_mess
        ORDER BY mess_reponse IS NULL DESC, mess_date DESC";


     return $this->db->query($sql)->getResultArray();
}
public function enregistrerReponse($id, $reponse, $user)
{
    // Récupérer cpt_id du pseudo
    $sql1 = "SELECT cpt_id FROM t_compte_cpt WHERE cpt_pseudo = ?";
    $row = $this->db->query($sql1, [$user])->getRow();

    if (!$row) {
        return false; // pseudo introuvable
    }

    $cpt_id = $row->cpt_id;

    // Mise à jour du message
    $sql = "UPDATE t_message_mess
            SET mess_reponse = ?, cpt_id = ?
            WHERE mess_id = ?";

    return $this->db->query($sql, [$reponse, $cpt_id, $id]);
}

public function get_reservation($date)
{
    // Vérifier le nombre de réservations
    $nbsql = "SELECT nb_reservations(?) AS nb;";
    $nbRow = $this->db->query($nbsql, [$date])->getRow();

    if (!$nbRow || $nbRow->nb == 0) {
        return []; //  retourner un tableau vide
    }

    // Requête principale + utiliser une vue 
    $sql = "
       SELECT * FROM v_reservations_details 
        WHERE DATE(res_date) = ? AND res_etat='A'
        ORDER BY ress_nom;
    ";

    return $this->db->query($sql, [$date])->getResult(); 
   
}

public function get_all_ressource(){
    $sql="SELECT * FROM t_ressource_ress";
     return $this->db->query($sql)->getResultArray(); 
}

public function delete_ressource($id)
{
    $sql = "DELETE FROM t_ressource_ress WHERE ress_id = ?";
    return $this->db->query($sql, [$id]);
}
public function ajout_ress($jauge,$details, $nom){
    $sql="INSERT INTO `t_ressource_ress`(`ress_id`, `ress_image`, `ress_nb_max`, `ress_liste_materiel`, `ress_nom`) 
    VALUES (NULL,'',?,?,?)";
    return $this->db->query($sql,[
    $jauge,         // ress_nb_max
    $details,       // ress_liste_materiel
    $nom            // ress_nom
]);
}
public function ressourceExister($nom)
{
    $query = $this->db->query("CALL ressource_exister(?)", [$nom]);
    $result = $query->getRow();



    return ($result->total > 0);
}

}

