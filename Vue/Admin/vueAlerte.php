<?php ob_start(); ?>
<?php $titre = '| Commentaire signaler'; ?>
<h1 class="page-header" style="text-align: center; margin-top: 70px;">Mes Alertes</h1>       
<a class="btn btn-success" href="indexadmin.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Tableau de bord</a><p></p>
<div class="well" style="background-color: #EFECCA;">
    <table class="table table-striped">
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
        <div class="btn-group btn-group-justified">    
          <td><?= $alerte['id_billet'] ?></td>
          <td><?= $alerte['pseudo'] ?></td>
          <td><?= $alerte['commentaire'] ?></td>
          <td>
              <a class="btn btn-danger" id=<?= $alerte['ID'] ?> href="indexadmin.php?suppr=<?= $alerte['ID'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</a> 
              <a class="btn btn-info" href="indexadmin.php?valide=<?= $alerte['ID'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Valider</a>
          </td>
        </div>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabaritAdmin.php'; ?>