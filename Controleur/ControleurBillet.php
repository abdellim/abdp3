<?php
require_once 'Model/Billet.php';
require_once 'Model/Commentaire.php';
require_once 'Vue/Vue.php';
class ControleurBillet {
  private $billet;
  private $commentaire;
  public $message;

  public function __construct() {
    $this->billet = new Billet();
    $this->commentaire = new Commentaire();
  }
  //Ajoute un commentaire à un billet
  public function commenter($auteur, $contenu, $idBillet, $parent_id) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet, $parent_id);
    $this->message = 'Merci pour votre commentaire !';
    // Actualisation de l'affichage du billet
  }

    //Signaler commentaire
  public function signaler($idCom, $idBillet) {
    $this->commentaire->signalerCom($idCom, $idBillet);
    $this->message = 'Merci de votre signalement !';
    $this->billet($idBillet);
  }

  // Affiche les détails sur un billet
  public function billet($idBillet) {
    if ($_POST) {
        $_POST['pseudo'] = htmlentities($_POST['pseudo']);
        $_POST['content'] = htmlentities($_POST['content']);
        $auteur = $this->getParametre($_POST, 'pseudo');
        $contenu = $this->getParametre($_POST, 'content');
        $idBillet = $this->getParametre($_POST, 'id');
        $parent_id  = $this->getParametre($_POST, 'parent_id');
        $this->commenter($auteur, $contenu, $idBillet, $parent_id);
        
    }
    $billet = $this->billet->getBillet($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet); // Affiche les commentaires
    $commentaireParId = []; //Tab qui contient les com organiser par leur id
    $vue = new Vue("Billet");
    $vue->generer(array(
      'billet' => $billet, 
      'commentaires' => $commentaires,
      'commentaireParId' => $commentaireParId,
      'message' => $this->message
      ));
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