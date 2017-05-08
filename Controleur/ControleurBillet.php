<?php

require_once 'Model/Billet.php';
require_once 'Model/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

  private $billet;
  private $commentaire;

  public function __construct() {
    $this->billet = new Billet();
    $this->commentaire = new Commentaire();
  }
  //Ajoute un commentaire à un billet
  public function commenter($auteur, $contenu, $idBillet, $parent_id) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet,$parent_id);
    // Actualisation de l'affichage du billet

  }

  // Affiche les détails sur un billet
  public function billet($idBillet) {
    $billet = $this->billet->getBillet($idBillet);
    $billetTotal = $this->billet->getBillets()->rowCount(); // On recupère le nombre de billet
    $commentaires = $this->commentaire->getCommentaires($idBillet);
    $commentaireParId = []; //Tab qui contient les com organiser par leur id
    $vue = new Vue("Billet");
    $vue->generer(array(
      'billet' => $billet, 
      'commentaires' => $commentaires,
      'commentaireParId' => $commentaireParId,
      'billetTotal' => $billetTotal
      ));
  }


  //Signaler commentaire
  public function signaler($idCom, $idBillet) {
    $this->commentaire->signalerCom($idCom, $idBillet);
    $this->billet($idBillet);
  }


  
}
