<?php

require_once 'Model/Admin.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {
	private $admin;

  	public function __construct() {
    	$this->admin = new Admin(); // nouvelle objet du model Admin
  	}

  	//AFFICHE LA VUE ADMIN
  	public function AcceuilAdm() {

      //$compte = $this->admin->getAlertes();
      $modifArticle = '';
      

    	//AFFICHE L'EPISODE A MODIFIER
    	if (isset($_GET['modifier']) && !empty($_GET['modifier'])) {
	        $modifArticle = $this->admin->edit();
    	}

    	//EDIT UN EPISODE
	    if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['id'])) {
	        $title = htmlspecialchars($_POST['title']);
	        $body = htmlspecialchars($_POST['body']);
	        $id = intval($_POST['id']);
	        $this->admin->edit_post($title, $body, $id);
	        header('location: index.php');
	        $message = 'L\'épisode à bien été modifier ! ';
    	}


      // AJOUTE UN EPISODE
      if (!isset($_POST['id']) && isset($_POST['title'])) {
          if (!empty($_POST['title']) && !empty($_POST['body'])) {
          $_POST['title'] = $_POST['title'];
          $_POST['body'] = $_POST['body'];
          $this->admin->add();

          $message = 'Episode ajouter avec succès !';

          }else {
              $message = 'Verifier vos informations';
          }
      }

      // SUPPRIME UN EPISODE
      if (isset($_GET['supprimer'])) {
        $this->admin->delete();
        header('location: index.php');
        $message = 'L\'épisode à bien été modifier ! ';
      }

      // VALIDE UNE ALERTE
      if (isset($_GET['valide']) AND !empty($_GET['valide'])) {
        $this->admin->ValAlertes();
        header('location: index.php');
      }

      // SUPPRIME UNE ALERTE
      if (isset($_GET['suppr']) AND !empty($_GET['suppr'])) {
        $this->admin->SupAlertes();
        header('location: index.php');
      }
      $billets = $this->admin->getBillets();
      $alertes = $this->admin->getAlertes();
      unset($_POST);
      $vue = new Vue("Admin");
      $vue->generer(array(
        'billets' => $billets, 
        'alertes' => $alertes, 
        'modifArticle' => $modifArticle));
  }
}