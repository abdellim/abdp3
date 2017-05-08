<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new ControleurBillet();
  }

  // Traite une requête entrante exécute l'action associée
  public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                                        if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                    if ($_POST) {
                    $auteur = $this->getParametre($_POST, 'pseudo');
                    $contenu = $this->getParametre($_POST, 'content');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $parent_id  = $this->getParametre($_POST, 'parent_id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet, $parent_id);
                    unset($_POST);
                    
                }

                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'signaler') {
                    $idCom = $this->getParametre($_GET, 'commentaire');
                      $idBillet = $this->getParametre($_GET, 'id');
                      $this->ctrlBillet->signaler($idCom, $idBillet);
                }

                else {
                    throw new Exception("Action non valide");
                }
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }




            
           /*
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $_GET['page'] = intval($this->getParametre($_GET, 'page'));
                $pagin = $_GET['page'];
                $this->ctrlBillet->pagination($pagin);
            }else {
                $_GET['page'] = 1;
            }*/

        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}