<?php session_start()
?>
<!DOCTYPE html>
<html lang="fr">

<?php include('../../Include/Admin/head_adm.php'); ?>
<body>
    <?php
        require_once '../Database.php';
        if (isset($_POST) AND !empty($_POST)) {
            if (!empty(htmlspecialchars($_POST['user'])) AND !empty(htmlspecialchars($_POST['pass']))) { // Verification que les champs ne soit pas vide
            $req = $bdd->prepare('SELECT * FROM user WHERE user = :user AND pass = :pass'); // on fait une requete preparer
            $req->execute([
            'user' => $_POST['user'],
            'pass' => $_POST['pass']
            ]);
            $user = $req->fetchObject(); //on sauvegarde dans la variable user
                if ($user) { // si il y a des données dans la variable le code va s'executer 
                $_SESSION['admin'] = $_POST['user'];
                header('location:../vueAdmin.php'); // On redirige vers la page d'accueil
                }else{
                $error = 'Identifiants incorrect'; // Sinon on a une erreur
                }
            }
            else{
            $error = '<div>' . 'Veuillez remplir tous les champs !' . '</div>'; // Si champs identifiants et mot de passe vide erreur
            }
        }

    ?>

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Connexion</h2>
        <label for="user" class="sr-only">Nom d'utilisateur</label>
        <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
        <label for="pass" class="sr-only">Mot de passe</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Envoyer</button>
      </form>
    </div> <!-- /container -->

  </body>
</html>