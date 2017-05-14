<?php

require_once 'Modele.php';


class login extends Modele {

  //Verifi session admin
  public function getLogin() {

    $sql = 'SELECT * FROM user WHERE user = :user'; // on fait une requete preparer
    $req = $this->executerRequete($sql, array('user' => $_POST['user']));
    $userReq = $req->fetch();
    $password = $userReq['pass'];
    $verifMdp = password_verify($_POST['pass'], $password);
 
    if ($verifMdp == true AND !empty($userReq)) {
      //on donne la session
      $_SESSION['admin'] = $_POST['user'];
    } 
  }
}



      