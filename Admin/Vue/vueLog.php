    <div class="container" style="margin-top: 50px;">
      <form action = "index.php" method="post" class="form-signin" style="background-color: white; opacity: 0.9;">
        <h2 class="form-signin-heading">Connexion</h2>
        <label for="user" class="sr-only">Adresse e-mail</label>
        <input type="text" name="user" class="form-control" placeholder="Nom d'utilisateur"  autofocus>
        <label for="pass" class="sr-only">Mot de passe</label> <br>
        <input type="password" name="pass" class="form-control" placeholder="Mot de passe" ><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        <?php if (isset($message) && !empty($message)) : ?>
            <div class="alert alert-success" role="alert" style="margin-top: 60px; margin-bottom: -30px">
                <?php echo $message; ?>
                <span class="sr-only">Error:</span>
            </div>
        <?php endif; ?>
      </form>
    </div>
    <?php //var_dump($message); ?>