<?php

require 'Controleur/ControleurAdmin.php';
//require 'Controleur/ControleurAlerte.php';

try {

  if(isset($_GET['action'])) {
  	if ($_GET['action'] == 'alerte') {
  		alerte();

	} else
      throw new Exception("Action non valide");
  }
  //valide une alerte
  else if(isset($_GET['valide'])) {
  	alerte();
  }
  //supprime une alerte
  else if(isset($_GET['suppr'])) {
	alerte();
  }
  //supprime un billet
  elseif (isset($_GET['supprimer'])) {
  	supBillet();
  	admin();
  }
  //modifie un billet
  elseif (isset($_GET['modifier'])) {
  	modBillet();
  }
  //ajoute un billet
  elseif (isset($_GET['ajouter'])) {
  	ajtBillet();
  }
  else {
  	admin();
  }
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
}
