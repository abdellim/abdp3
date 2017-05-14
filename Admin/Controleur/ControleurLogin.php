
<?php
require_once 'Model/Login.php';
require_once 'Vue/Vue.php';

class ControleurLogin {
  private $login;
  public $message;

  public function __construct() {
    $this->login = new login(); // nouvelle objet du model login
  }

  public function Connexion() {

    if (isset($_POST) AND !empty($_POST)) {
    	// Verification que les champs ne soit pas vide
    	if (!empty(htmlspecialchars($_POST['user'])) AND !empty(htmlspecialchars($_POST['pass']))) { 
	    $this->login->getLogin();
	    	if (isset($_SESSION['admin'])) {
	    		header('location:index.php');
	    	} else {
	    	$this->message = 'Nom d\'utilisateur ou mot de passe incorrect !';
	    	}
		} else {
			$this->message = 'Merci de remplir tous les champs !';
		}
	 
	}
	$vue = new Vue("Log");
	$vue->generer(array('message' => $this->message));
	}
  
}