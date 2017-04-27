<?php $titre = "- " .$this->titre; ?>

<div class="jumbotron" style="background-color: #FCFAE1">
<article>
  <header style="text-align: center;">
  <img class="featurette-image img-responsive center-block" src="<?= $billet['image'] ?>" alt="Generic placeholder image">
    <h1 class="lead" style="color: green;"><?= $billet['titre'] ?></h1>
    <p>Publié le <?= $billet['date'] ?></p>
  </header>
  <hr>
  <p><?= $billet['contenu'] ?></p>
</article>
</div>
<nav aria-label="...">
  <ul class="pager">
    <li class="Précédent"><a href="index.php?action=billet&id=<?= $billet['ID'] ?>">&larr; Previous</a></li>
    <li class="Suivant"><a href="index.php?action=billet&id=<?= $billet['ID'] ?>">Next &rarr;</a></li>
  </ul>
</nav>
<hr />
<div class="jumbotron">
  <h2>Laisser un commentaire:</h2><hr>
   <form method="post" action="index.php?action=commenter">
    <div class="form-group">
      <label for="auteur">Pseudo:</label>
      <input type="Pseudo" class="form-control" id="auteur" name="auteur">
    </div>
    <div class="form-group">
      <label for="contenu">Commentaire:</label>
      <textarea class="form-control" rows="5" id="contenu" name="contenu"></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $billet['ID'] ?>" />
    <button type="submit" class="btn btn-success">Envoyer</button>
  </form>
</div>
<header class="jumbotron">
    <h2 style="text-align: center; color: blue;">Commentaires - <?= $billet['titre'] ?></h2>
</header>
<?php foreach ($commentaires as $commentaire): ?>
  <div class="jumbotron">
  <p><?= $commentaire['date'] ?> :</p>
  <p><?= $commentaire['auteur'] ?> dit :</p>
  <p><?= $commentaire['contenu'] ?></p>
  <a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $commentaire['ID'] ?>&id=<?= $commentaire['id_billet'] ?>" name="id" value="<?= $commentaire['id_billet'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a> 
  <a class="btn btn-info" href="index.php?repondre=<?= $commentaire['ID'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Répondre</a>
<?php endforeach; ?>


