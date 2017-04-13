<?php

require 'Controleur/ControleurAdmin.php';

try {

  if(isset($_GET['action'])) {
  	if ($_GET['action'] == 'alerte') {
  		alerte();
	} else
      throw new Exception("Action non valide");

  }
  else if(isset($_GET['valide'])) {
  	alerte();
  }
  else if(isset($_GET['suppr'])) {
	alerte();
  }


  else {
  	admin();
  }
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
}
