<?php ob_start(); ?>
<?php $titre = '| Liste des épisodes'; ?>
<h1 class="page-header" style="text-align: center; margin-top: 50px;">Tableau de bord</h1>       
<h2 class="sub-header">Listes des épisodes <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un épisode</button></h2>
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
