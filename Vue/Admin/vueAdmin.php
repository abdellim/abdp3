<?php ob_start(); ?>
<?php $titre = '| Liste des épisodes'; ?>
                <h1 class="page-header" style="text-align: center; margin-top: 50px;">Tableau de bord</h1> 
                <h2 class="sub-header">Listes des épisodes <button id="Bouton1" class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un épisode</button></h2>
                    
                    <div id="tonDiv1" style="display:none;">
                            <h3>Nouvel article</h3>
                            <form method="post" action="home.php">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Titre</span>
                                    <input type="text" class="form-control" placeholder="Titre de l'épisode" aria-describedby="sizing-addon2" name="titre" required>
                                </div><p></p>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Contenu</span>
                                    <textarea class="form-control" placeholder="Contenu de l'épisode" aria-describedby="sizing-addon2" id="texte" name="contenu" required></textarea>
                                </div><p></p>
                                <input type="submit" class="btn btn-primary" value="Ajouter" style="float:right; " /><br />
                                <?php
                                if (isset($_POST) AND !empty($_POST)) {
                                    if(isset($_POST['titre']) && isset($_POST['contenu']) ){
                                        $req = $bdd->prepare("INSERT INTO billets(titre, extrait, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr) VALUES(?, ?, ?, NOW())");
                                        $req->execute(array($_POST['titre'], $_POST['extrait'], $_POST['contenu']));       
                                    }
                                }
                                ?>
                            </form>
                                        
                    <script>
                    document.querySelector("#Bouton1").onclick = function() { 
                    document.querySelector("#tonDiv1").style.display=(window.getComputedStyle(document.querySelector('#tonDiv1')).display=='none') ? "block" : "none"; 
                    }
             </script><br /><br />

                </div>
            </div>
        </div>
      </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script>
    $(function(){
            $("div.alert").show("slow").delay(4000).hide("slow");
           
    });
    </script>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Extrait</th>
          <th>Date de création</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <?php foreach ($billets as $billet): ?>
      <tbody>
        <tr>
        <div class="btn-group btn-group-justified">    
          <td><?= $billet['titre'] ?></td>
          <td width=30%><?= substr($billet['contenu'], 0, 250) . "..." ?></td>
          <td><?= $billet['date'] ?></td>
          <td>
              <a class="btn btn-danger" href="indexadmin.php?supprimer=<?= $billet['id'] ?> "><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</a> 
              <a class="btn btn-info" href="indexadmin.php?modif=<?= $billet['id'] ?> "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</a>
          </td>
        </div>
        </tr>
      </tbody>
      <?php endforeach; ?>
      
      
    </table>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabaritAdmin.php'; ?>
