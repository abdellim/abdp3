<div class="container">
    <!-- Example row of columns -->
  <div class="row">
    <?php
      if (isset($message) && !empty(($message))) { ?>

        <div class="alert alert-success" role="alert" style="margin-top: 60px; margin-bottom: -30px"><?php echo $message; ?>
          <span class="sr-only">Error:</span>
        </div>
    <?php }?>
    <div class="jumbotron" style=" margin-top: 55px;"> <?php var_dump($compteAlerte) ?>  
        <h2>Ajouter / Modifier un épisode</h2><hr>
        <div id="tonDiv1">
            <form method="POST" enctype="multipart/form-data">
                <?php if (isset($_GET['modifier'])) {?>
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['modifier'];?>"/>
                <?php } ?>
                <p><label for="title">Titre:</label><br />
                    <input type="text" id="title" name="title" <?php if (isset($_GET['modifier'])) { echo 'value="'.$modifArticle['titre'].'"';
                        }?> />
                </p>
                <p><label for="body">Contenu:</label><br />
                    <textarea name="body" id="body" rows="5" cols="35" ><?php if (isset($_GET['modifier'])) {
                        echo $modifArticle['contenu']; }?></textarea>
                </p>
                <label class="">
                <span class="fileupload-new"><input class="btn btn-default btn-file" type="file" id="image" name="fichier" /></span>
                </label>
                <input class="btn btn-info" type="submit" name="add_submit" value="Ajouter" /> <a class="btn btn-success" href="index.php"><i class="fa fa-undo" aria-hidden="true"></i> Annuler</a>
            </form>
            <hr>
            <?php if(!empty($message)) { echo '<p>', $message, '</p>'; }?> 
        </div>
    </div>
    <div class="jumbotron">
        <h2>Liste des épisodes</h2><hr>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($billets as $billet): ?>
                <tr>
                    <td><?= $billet['titre'] ?></td>
                    <td style ="width : 35%"><?= substr($billet['contenu'], 0, 200) . "..." ?></td>
                    <td><a class="btn btn-danger" href="index.php?supprimer=<?= $billet['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</a>
                        <a id="Bouton1" class="btn btn-info" href="index.php?modifier=<?= $billet['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="jumbotron" style = "<?php if ($compteAlerte == 0) { echo 'display : none'; }?>">
        <h2>Commentaires signaler</h2><hr>
            <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Episode</th>
                      <th>Pseudo</th>
                      <th>Commentaire</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($alertes as $alerte): ?>
                  <tbody>
                  <tr>
                    <td><?= $alerte['id_billet'] ?></td>
                    <td><?= $alerte['pseudo'] ?></td>
                    <td><?= $alerte['commentaire'] ?></td>
                    <td>
                        <a class="btn btn-danger" id=<?= $alerte['ID'] ?> href="index.php?suppr=<?= $alerte['ID'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</a> 
                        <a class="btn btn-info" href="index.php?valide=<?= $alerte['ID'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Valider</a>
                    </td>
                  </tr>
                  </tbody>
                  <?php endforeach; ?>
            </table>
    </div>
  </div>
</div> <!-- /container -->