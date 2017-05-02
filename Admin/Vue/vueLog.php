    <div class="container">
      <form action="index.php" method="post" class="form-signin" style="background-color: white; opacity: 0.9;">
        <h2 class="form-signin-heading">Connexion</h2>
        <label for="user" class="sr-only">Adresse e-mail</label>
        <input type="text" name="user" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
        <label for="pass" class="sr-only">Mot de passe</label>
        <input type="password" name="pass" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox">
          <label>
                    <?php if (isset($error)) { // on traite les erreurs
        echo '<div style="color: red;">' . $error . '</div>';
        }?>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>
    </div>
    <?php //var_dump$_SESSION['admin']) ?>