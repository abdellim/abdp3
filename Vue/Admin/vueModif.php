<?php ob_start(); ?>
<?php $titre = '| Modifier épisode'; ?>

 <?php foreach ($edireq as $billet): ?>
                    <div id="" style="margin-top: 100px">
                    <a class="btn btn-success" href="indexadmin.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Tableau de bord</a><p></p>
                      <h1>Modification de l'épisode <?= $billet['titre']; ?></h1><hr>
                      <form method="post" action="indexadmin.php">
                          <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2">Titre</span>
                              <input type="text" class="form-control" placeholder="Titre de l'épisode" aria-describedby="sizing-addon2" name="titre" value="<?= $billet['titre']; ?>" required>
                          </div><p></p>

                          <span class="input-group-addon" id="sizing-addon2">Contenu</span>
                          <div class="input-group" style="width: 100%;">
                              <textarea class="form-control" id="texte" placeholder="Contenu de l'épisode" aria-describedby="sizing-addon2" name="contenu" required><?= $billet['contenu']; ?></textarea>
                          </div><p></p>
                          <input type="submit" class="btn btn-primary" value="Modifier" style="position: right;" /> 
                      </form>
                    </div>                    
  <?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabaritAdmin.php'; ?>