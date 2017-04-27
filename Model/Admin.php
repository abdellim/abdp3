<?php

function getBdd(){
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $bdd;
}
// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
  $billetParPage = 3;
  $bdd = getBdd();
  $billetTotalReq = $bdd->query('select ID FROM billets');
  $billetTotal = $billetTotalReq->rowCount();
  $pagesTotal = ceil($billetTotal/$billetParPage);
 
  
  if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0) {
    $_GET['page'] = intval($_GET['page']);
    $pageCourante = $_GET['page'];
  } else {
    $pageCourante = 1;
  }
  $depart = ($pageCourante-1)*$billetParPage;
  $billets = $bdd->query('select ID as id, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date, titre, image, contenu from billets ORDER BY ID LIMIT '.$depart.','.$billetParPage);
   

  return $billets;

}

//Renvoi les nombres d'alerte
function getNbreAlertes() {
	$bdd = getBdd();
    //variable qui compte le nombre de commentaire signaler
    $requette= $bdd->query('SELECT signaler FROM commentaires WHERE signaler = 1');
    //<!-- $i renvoi le nombre de commentaire signaler -->
    $i = $requette->RowCount();
    return $i;
}
//Recupere les commentaire signaler
function getAlertes() {
  $bdd = getBdd();
  $Alertes = $bdd->prepare('SELECT ID, id_billet, pseudo, commentaire FROM commentaires WHERE signaler = 1');
  $Alertes->execute(array());
  
  return $Alertes;
}

//Valide les commentaire signaler
function valAlertes() {
  $bdd = getBdd();
  if (isset($_GET['valide']) AND !empty($_GET['valide'])) {
    $confirme = $_GET['valide'];
    $req = $bdd->prepare('UPDATE commentaires SET signaler = 0 WHERE ID = ?');
    $req->execute(array($confirme));
    $requette= $bdd->query('SELECT signaler FROM commentaires WHERE signaler = 1');

  }
}
//Supprime un commentaire signaler
function SupAlertes() {
  $bdd = getBdd();
  if (isset($_GET['suppr']) AND !empty($_GET['suppr'])) {
    $suppr = $_GET['suppr'];
    $req = $bdd->prepare('DELETE FROM commentaires WHERE ID = ?');
    $req->execute(array($suppr));
    $requette= $bdd->query('SELECT signaler FROM commentaires WHERE signaler = 1');
    if($req)
    {
      echo("La suppression à été correctement effectuée") ;
    }
    else
    {
      echo("La suppression à échouée") ;
    }
  }
}

function modiBillet() { //Affiche le billet à modifier
  $bdd = getBdd();
  if (isset($_GET['modifier']) AND !empty($_GET['modifier'])) {
  $mod = $_GET['modifier'];
  $edireq = $bdd->prepare('SELECT * FROM billets WHERE ID = ?');
  $edireq->execute(array($mod));
  return $edireq;
  }
}

function supBillet() { //supprime le billet
  $bdd = getBdd();
  if (isset($_GET['supprimer']) AND !empty($_GET['supprimer'])) {
    $suppr = $_GET['supprimer'];
    $req = $bdd->prepare('DELETE FROM billets WHERE ID = ?');
    $req->execute(array($suppr));
  }
}

function ajtBillet($titre, $contenu) {
  $bdd = getBdd();
  $titre = $_POST['titre'];
  $req = $bdd->prepare('INSERT INTO billets (titre, image, contenu, date_creation) VALUES(?, ?, ?, NOW())');
  $req->execute(array($_POST['titre'], $_POST['contenu']));       
}