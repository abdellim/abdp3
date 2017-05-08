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
      $message = '';

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
          $_POST['title'] = htmlentities($_POST['title'], ENT_HTML5 , 'UTF-8');
          $_POST['body'] = htmlentities($_POST['body'], ENT_HTML5 , 'UTF-8');

          // Ajoute un image si il y en à une
          if (isset($_FILES['fichier']) AND !empty($_FILES['fichier']['name'])) {
            $name = $_FILES['fichier']['name'];
            if(exif_imagetype($_FILES['fichier']['tmp_name']) == 2) {
              $chemin = '../Image/' . $name;
              move_uploaded_file($_FILES['fichier']['tmp_name'], $chemin);
            } else {
              $message = 'Erreur ! Votre image doit être au format jpg !';
            }
          }
          $this->admin->add();

          $message = 'Episode ajouter avec succès !';

          }else {
              $message = 'Verifier vos informations !';
          }

      } else {
        //$message = 'Merci de remplir tous les champs !';
      }



      // SUPPRIME UN EPISODE
      if (isset($_GET['supprimer'])) {
        $this->admin->delete();
        header('location: index.php');
        $message = 'L\'épisode à bien été supprimer ! ';
      }

      // VALIDE UNE ALERTE
      if (isset($_GET['valide']) AND !empty($_GET['valide'])) {
        $this->admin->ValAlertes();
        header('location: index.php');
        $message = 'Le commentaire à bien été valider !';
      }

      // SUPPRIME UNE ALERTE
      if (isset($_GET['suppr']) AND !empty($_GET['suppr'])) {
        $this->admin->SupAlertes();
        header('location: index.php');
        $message = 'Le commentaire à bien été supprimer !';
      }
      $billets = $this->admin->getBillets();
      $billetTotal = $billets->rowCount(); // On recupère le nombre de billet
      $alertes = $this->admin->getAlertes();
      unset($_POST);

      $vue = new Vue("Admin");
      $vue->generer(array(
        'billets' => $billets,
        'billetTotal' => $billetTotal, 
        'alertes' => $alertes,
        'message' => $message, 
        'modifArticle' => $modifArticle));
  }
}