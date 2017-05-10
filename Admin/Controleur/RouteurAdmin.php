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
                    //EDIT UN EPISODE 
                    if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['id'])) {
                        $title = htmlspecialchars($_POST['title']);
                        $body = htmlspecialchars($_POST['body']);
                        $id = intval($_POST['id']);
                        $this->ctrlAdmin = new ControleurAdmin();
                        $this->ctrlAdmin->editEpisode($title, $body, $id);
                    }
                    //supp épisode
                    if (isset($_GET['supprimer'])) {
                        $this->ctrlAdmin = new ControleurAdmin();
                        $this->ctrlAdmin->suppEpisode();
                        header('location: index.php');
                    }
                    //valide un commentaire
                    if (isset($_GET['valide']) AND !empty($_GET['valide'])) {
                        $this->ctrlAdmin = new ControleurAdmin();
                        $this->ctrlAdmin->validCom();
                        $message = 'com valide';
                    }//supprime un commentaire
                    if (isset($_GET['suppr']) AND !empty($_GET['suppr'])) {
                        $this->ctrlAdmin = new ControleurAdmin();
                        $this->ctrlAdmin->supprCom();
                    }

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