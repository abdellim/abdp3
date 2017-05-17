<?php

require_once 'Model/Modele.php';

class Admin extends Modele {

  //Renvoi la liste de tous les billets
  public function getBillets() {
    $sql = 'select ID as id, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date, titre, image, contenu from billets LIMIT 0,5';
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  //-----------------     GESTION DES COMMENTAIRES SIGNALES     -------->>

  //Affiche les alertes
  public function getAlertes() {
    $sql = 'SELECT ID, id_billet, pseudo, commentaire FROM commentaires WHERE signaler = 1';
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



  //------------------------      REDACTION / EDITION / SUPPRESSION      ----------------------->>>>

  //Supprime un épisode
  public function delete(){
    $supprime = (int) $_GET['supprimer'];
    $sql = 'DELETE FROM billets WHERE ID = ?';
    $this->executerRequete($sql, array($supprime));
  }

  //Ajoute un épisode
  public function add(){
    $image = 'Image/' . $_FILES['fichier']['name'];
    //$_GET['modifier'] = htmlspecialchars($_GET['modifier']); sert à rien???
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
	        } else {
	            $message = 'L\'article n\'existe pas';
              return $message;
	        }
  }

  //Modifie l'épisode
  public function edit_post($title, $body, $id) {
    $sql = 'UPDATE billets SET titre = ?, contenu = ?, date_creation = NOW() WHERE id = ?';
    //$billetTotal = $sql->rowCount();
    $this->executerRequete($sql, array($title, $body, $id));
  }
 
  //------------------------

}