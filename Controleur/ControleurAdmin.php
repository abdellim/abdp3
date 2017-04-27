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
	$pageCourante = getBillets();
	$pagesTotal  = getBillets();
	$i = getNbreAlertes();
  	require 'Vue/Admin/vueAdmin.php';
}

function suppBillet() {
	$suppr = supBillet();
	$billets = getBillets();
	require 'Vue/Admin/vueAdmin.php';
}

function modBillet(){ //affiche le billet à modifier
	$edireq = modiBillet();
	$i = getNbreAlertes();
	require 'Vue/Admin/vueModif.php';
}
/*
function modBillet() {
	require 'Vue/Admin/vueAdmin.php';
}

function ajoutBillet() {
	$ajout = ajtBillet();

	require 'Vue/Admin/vueAdmin.php';
}*/

function erreur($msgErreur){
	require 'Vue/vueErreur.php';

}
