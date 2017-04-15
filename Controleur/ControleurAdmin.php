<?php
require 'Model/Admin.php';

  
function alerte(){
	$confirme = valAlertes();
	$suppr = SupAlertes();
	$alertes = getAlertes();
	$i = getNbreAlertes();
	require 'Vue/Admin/vueAlerte.php';
}

function admin(){
	$billets = getBillets();
	$i = getNbreAlertes();
  	require 'Vue/Admin/vueAdmin.php';
}

function suppBillet() {
	$suppr = supBillet();
	$billets = getBillets();
	require 'Vue/Admin/vueAdmin.php';
}
/*
function modBillet() {
	require 'Vue/Admin/vueAdmin.php';
}

function ajtBillet() {
	require 'Vue/Admin/vueAdmin.php';
}*/

function erreur($msgErreur){
	require 'Vue/vueErreur.php';

}
