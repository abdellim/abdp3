<?php

require_once 'Modele.php';

class Billet extends Modele{

    //Renvoi la liste de tous les billets
  public function getBillets() {
    $sql = 'select ID as id, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date, titre, image, contenu from billets LIMIT 0,5';
    //$billetTotal = $sql->rowCount();
    $billets = $this->executerRequete($sql);
    return $billets;
  }


  // Renvoie les informations sur un billet
  public function getBillet($idBillet) {
    $sql = 'SELECT ID, titre, image, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date FROM billets WHERE ID=?';
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch();  // Accès à la première ligne de résultat
    else
     throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
  }
/*
  public function UnePagination($pagin){
    $billetParPage = 3;

    $sql = 'SELECT ID FROM billets';
    $NbreBillet = $this->rowCount();
    $this->executerRequete($sql, array($pagin));
    var_dump($NbreBillet);
  }*/

}
