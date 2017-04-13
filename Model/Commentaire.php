<?php
require_once 'Modele.php';
/**
* 
*/
class Commentaire extends Modele
{

  // Renvoie la liste des commentaires associés à un billet
  public function getCommentaires($idBillet) {
  	$sql = 'SELECT ID, pseudo as auteur, commentaire as contenu, id_billet, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date FROM commentaires WHERE id_billet = ?';
    $commentaires = $this->executerRequete($sql, array($idBillet));
    return $commentaires;

  }

  public function ajouterCommentaire($auteur, $contenu, $idBillet) {
    $sql = 'INSERT INTO `commentaires`(`date_creation`, `pseudo`, `commentaire`, `id_billet`) VALUES ( ?, ?, ?, ?)';
    $date = date("Y-m-d H:i:s");// Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
   
  }

  public function signalerCom($idCom, $idBillet){

    $sql = 'UPDATE commentaires SET signaler = 1 WHERE ID = ?';
    $this->executerRequete($sql, array($idCom));
  }
  /*//Signal un commentaire
  public function signalerCommentaire($commentaireId) {
    
    $info = $this->getCommentaires($commentaireId);
    
    $sql = 'UPDATE commentaires SET signaler = 1 WHERE ID = ?';
    $this->executerRequete($sql, array($commentaireId));

    //header('Location:index.php?action=billet&id='.$_GET['id'] );

  }*/

}