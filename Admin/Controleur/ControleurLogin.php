<?php

require_once 'Model/Login.php';
require_once 'Vue/Vue.php';

class ControleurLogin {
	private $login;

  	public function __construct() {
    	$this->login = new login(); // nouvelle objet du model login
  	}
  	

  	public function Connexion() {

  		$user = $this->login-> getLogin();
  		if ($user) {
			$vue = new Vue("Admin");
		  	$vue->generer(array('user' => $user));
  		} else {
  			$vue = new Vue("Log");
  			$vue->generer(array('user' => $user));
  		}
        
    	
  	}
}


