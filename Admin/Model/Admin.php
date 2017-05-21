<?php

require_once 'Model/Modele.php';

class Admin extends Modele {

  //Renvoi la liste de tous les billets
  public function getBillets($depart, $billetParPage) {
    $sql = 'SELECT ID as id, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date, titre, image, contenu from billets LIMIT '.$depart. ' , ' .$billetParPage;
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  // PAGINATION
  public function nbreDeBillet() {
    $sql = 'SELECT * FROM billets';
    $billetTotal = $this->executerRequete($sql);
    return $billetTotal;
  }
  //-----------------GESTION DES COMMENTAIRES SIGNALES-------->>

  //Affiche les alertes
  public function getAlertes() {
    $sql = 'SELECT * FROM billets INNER JOIN commentaires WHERE billets.ID = commentaires.id_billet AND commentaires.signaler = 1';
    $alertes = $this->executerRequete($sql);
    return $alertes;
  }

  //Supprime les commentaires
  public function SupAlertes() {
  $suppr = $_GET['suppr'];
  $sql = 'DELETE FROM commentaires WHERE ID = ? OR parent_id = ?';
  $this->executerRequete($sql, array($suppr, $suppr));
  }

  //Valide les commentaires
  public function ValAlertes() {
  $confirme = $_GET['valide'];
  $sql = 'UPDATE commentaires SET signaler = 0 WHERE ID = ?';
  $this->executerRequete($sql, array($confirme));
  }

  //--------------REDACTION / EDITION / SUPPRESSION-------------->>>>

  //Supprime un épisode
  public function delete(){
    $supprime = (int) $_GET['supprimer'];
    $sql = 'DELETE FROM billets WHERE ID = ?';
    $this->executerRequete($sql, array($supprime));
  }

  //Ajoute un épisode
  public function add(){
    $image = 'Image/' . $_FILES['fichier']['name'];
    $sql = 'INSERT INTO billets(titre, image, contenu, date_creation) VALUES( ?, ?, ?, NOW())';
    $this->executerRequete($sql, array($_POST['title'], $image, $_POST['body']));
  }

  //Affiche un episode à modifier
  public function edit(){

    $sql = 'SELECT * FROM billets WHERE id = ?';
    $modifArticle = $this->executerRequete($sql, array($_GET['modifier']));
    //verifi si l'article existe
    if($modifArticle->rowCount() == 1) {
      $compte = 1;
      return $modifArticle->fetch();
    } 
  }

  //Modifie l'épisode
  public function edit_post($title, $body, $id) {
    $sql = 'UPDATE billets SET titre = ?, contenu = ?, date_creation = NOW() WHERE id = ?';
    $this->executerRequete($sql, array($title, $body, $id));
  }
 
  //-------------END REDACTION / EDITION / SUPPRESSION-------------->>>>
}