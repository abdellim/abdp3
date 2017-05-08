<?php

require_once 'Model/Modele.php';


class login extends Modele {

  //Verifi session admin
  public function getLogin() {

    $sql = 'SELECT * FROM user WHERE user = :user AND pass = :pass'; // on fait une requete preparer
    $login = $this->executerRequete($sql, array('user' => $_POST['user'], 'pass' => $_POST['pass']
    ));
    $user = $login->fetchObject(); //on sauvegarde dans la variable user
    if ($user) {
              //on donne la session
              $_SESSION['admin'] = $_POST['user'];
              return $user;
    }
  }
}



      