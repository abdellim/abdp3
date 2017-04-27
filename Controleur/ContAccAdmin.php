<?php

require_once 'Modele/ModeleAdmin.php';
require_once 'Vue/Admin/Vue.php';

class ControleurAccueil {

  private $billet;

  public function __construct() {
    $this->billet = new Billet();
  }

  // Affiche la liste de tous les billets du blog
  public function admin() {
    $billets = $this->billet->getBillets();
    $vue = new Vue("Admin");
    $vue->generer(array('billets' => $billets));
  }
}