<?php

require_once 'Model/Modele.php';


class login extends Modele {

  //Verifi session admin
  public function getLogin() {
      if (isset($_POST) AND !empty($_POST)) {
            if (!empty(htmlspecialchars($_POST['user'])) AND !empty(htmlspecialchars($_POST['pass']))) { // Verification que les champs ne soit pas vide
            $sql = 'SELECT * FROM user WHERE user = :user AND pass = :pass'; // on fait une requete preparer
            $login = $this->executerRequete($sql, array('user' => $_POST['user'], 'pass' => $_POST['pass']
            ));
            $user = $login->fetchObject(); //on sauvegarde dans la variable user
            }

        if ($user) { // si il y a des données dans la variable le code va s'executer 
            $_SESSION['admin'] = $_POST['user'];
        }else{
            $error = 'Identifiants incorrect'; // Sinon on a une erreur
        }
      }
  }

}

        

