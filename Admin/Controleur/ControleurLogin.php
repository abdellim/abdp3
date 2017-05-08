
<?php
require_once 'Model/Login.php';
require_once 'Vue/Vue.php';

class ControleurLogin {
  private $login;

  public function __construct() {
    $this->login = new login(); // nouvelle objet du model login
  }

  public function Connexion() {
	$vue = new Vue("Log");
	$vue->generer(array());

    if (isset($_POST) AND !empty($_POST)) {
    	// Verification que les champs ne soit pas vide
    	if (!empty(htmlspecialchars($_POST['user'])) AND !empty(htmlspecialchars($_POST['pass']))) { 
	    $this->login->getLogin();
	    header('location:index.php');
	   	//$pass = $this->login->hashPassword();
		   	}

		}
	}
  
}