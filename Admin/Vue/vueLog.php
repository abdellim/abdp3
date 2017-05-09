    <div class="container" style="margin-top: 50px;">
      <form action = "index.php" method="post" class="form-signin" style="background-color: white; opacity: 0.9;">
        <h2 class="form-signin-heading">Connexion</h2>
        <label for="user" class="sr-only">Adresse e-mail</label>
        <input type="text" name="user" class="form-control" placeholder="Nom d'utilisateur"  autofocus>
        <label for="pass" class="sr-only">Mot de passe</label> <br>
        <input type="password" name="pass" class="form-control" placeholder="Mot de passe" ><br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      </form>
    </div>
    <?php//var_dump($_SESSION['admin']); ?>