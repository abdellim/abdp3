<?php

require_once 'Modele.php';

class Billet extends Modele{

  //Renvoi la liste de tous les billets
  public function getBillets($depart, $billetParPage) {
    $sql = 'select ID as id, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date, titre, image, contenu from billets LIMIT '.$depart. ' , ' .$billetParPage;
    $billets = $this->executerRequete($sql);
    return $billets;
  }
  // PAGINATION
  public function nbreDeBillet() {
    $sql = 'SELECT * FROM billets';
    $billetTotal = $this->executerRequete($sql);
    return $billetTotal;
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

}
