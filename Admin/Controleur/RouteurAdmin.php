<?php session_start() ?>
<?php 
require_once 'Controleur/ControleurAdmin.php';
require_once 'Controleur/ControleurLogin.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAdmin;
  private $ctrlLogin;

  public function __construct() {
    
    
   
}
  // Traite une requête entrante exécute l'action associée
  public function routerRequete() {
        try {
                if (isset($_SESSION['admin'])) {
                    $this->ctrlAdmin = new ControleurAdmin();
                    $this->ctrlAdmin->AcceuilAdm();
                } else {
                    $this->ctrlLogin = new ControleurLogin();
                    $this->ctrlLogin->Connexion();   

                }
            }
        
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}