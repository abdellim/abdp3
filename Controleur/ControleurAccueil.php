<?php

require_once 'Model/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  private $billet;

  public function __construct() {
    $this->billet = new Billet();
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $billets = $this->billet->getBillets();
    $billetTotal = $billets->rowCount(); // On recupère le nombre de billet
    $vue = new Vue("Accueil");
    $vue->generer(array(
      'billets' => $billets,
      'billetTotal' => $billetTotal
      ));
  }
}
