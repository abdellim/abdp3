<?php
require_once 'Model/Admin.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {

  private $admin;
  public $message;
  public $modifArticle;

    public function __construct() {
      $this->admin = new Admin(); // nouvelle objet du model Admin
    }

    public function editEpisode($title, $body, $id) {
      $this->admin->edit_post($title, $body, $id);
      $this->message = 'L\'épisode à bien été modifier ! ';
    }

    public function suppEpisode() {
      $this->admin->delete();
      $this->message = 'L\'épisode à bien été supprimer ! ';
    }

    public function validCom() {
      $this->admin->ValAlertes();
      $this->message = 'Le commentaire à bien été valider !';
    }

    public function supprCom() {
      $this->admin->SupAlertes();
      $this->message = 'Le commentaire à bien été supprimer !';
    }

    //AFFICHE LA VUE ADMIN
    public function AcceuilAdm() {
      
      //AFFICHE L'EPISODE A MODIFIER
      if (isset($_GET['modifier']) && !empty($_GET['modifier'])) {
          $this->modifArticle = $this->admin->edit();
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
                $this->message = 'Erreur ! Votre image doit être au format jpg !';
              }
            }
          $this->admin->add();
          $this->message = 'Episode ajouter avec succès !';
          }else {
              $this->message = 'Merci de remplir tous les champs !';
          }
      }

// PAGINATION
      $billetTotal = $this->admin->nbreDeBillet()->rowCount(); //compte le nombre de billet
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

      $billets = $this->admin->getBillets($depart, $billetParPage);
      $alertes = $this->admin->getAlertes();
      $compteAlerte = $alertes->rowCount();
      unset($_POST);
      $vue = new Vue("Admin");
      $vue->generer(array(
        'billets' => $billets,
        'billetTotal' => $billetTotal,
        'pageTotal' => $pageTotal,
        'pageCourante' =>$pageCourante,
        'alertes' => $alertes,
        'message' => $this->message,
        'compteAlerte' => $compteAlerte, 
        'modifArticle' => $this->modifArticle)); 
  }
}