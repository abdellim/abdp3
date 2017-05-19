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
  // PAGINATION
    $billetTotal = $this->billet->nbreDeBillet()->rowCount(); //compte le nombre de billet
    $billetParPage = 3;
    $pageTotal = ceil($billetTotal/$billetParPage); // nombre de page
    //On vérifie si la varible de page existe ou non
    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pageTotal) {
        $_GET['page'] = intval($_GET['page']); //sécurise la variable (pour avoir que des chiffres)
        $pageCourante = $_GET['page'];
    } else { //si cette variable n'est pas defini ou vide
        $pageCourante = 1; // on se retrouvera sur la 1ere page
    } 
    $depart = ($pageCourante-1)*$billetParPage; // pour la limit
// END PAGINATION
    $billets = $this->billet->getBillets($depart, $billetParPage);
    $billetTotal = $billets->rowCount(); // On recupère le nombre de billet
    $vue = new Vue("Accueil");
    $vue->generer(array(
      'billets' => $billets,
      'pageTotal' => $pageTotal,
      'pageCourante' =>$pageCourante,
      'billetTotal' => $billetTotal
      ));
  }
}
