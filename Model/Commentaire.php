<?php
require_once 'Modele.php';
/**
* 
*/
class Commentaire extends Modele
{

  //Renvoie la liste des commentaires associés à un billet
  public function getCommentaires($idBillet) {
  	$sql = 'SELECT ID, pseudo as auteur, parent_id, commentaire as contenu, id_billet, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date FROM commentaires WHERE id_billet = ?';
    $commentaires = $this->executerRequete($sql, array($idBillet))->fetchAll();
    return $commentaires;
  }

  //Ajoute un commentaire
 public function ajouterCommentaire($auteur, $contenu, $idBillet, $parent_id) {
  $parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
    $sql = 'INSERT INTO `commentaires`(`date_creation`, `pseudo`, `commentaire`, `id_billet`, `parent_id`) VALUES ( ?, ?, ?, ?, ?)';
    $date = date("Y-m-d H:i:s");// Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet, $parent_id));
  }

  //Signal un commentaire
  public function signalerCom($idCom, $idBillet){
    $sql = 'UPDATE commentaires SET signaler = 1 WHERE ID = ?';
    $this->executerRequete($sql, array($idCom));
  }

}