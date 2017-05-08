<?php $titre = '| Liste des épisodes'; ?>


<?php foreach ($billets as $billet): ?>
    <div class="col-md-4">
      <img class="featurette-image img-responsive center-block" src="<?= '../' . $billet['image']; ?>" alt="Generic placeholder image" style="height: 250px";>
      <header>
        <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
          <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        </a>
        <p>Publié le <?= $billet['date'] ?></p>
      </header>
      <p><?= substr($billet['contenu'], 0, 250) . "..." ?></p>
      <a class="btn btn-default" href="<?= "index.php?action=billet&id=" . $billet['id'] ?>" role="button">Voir plus</a>
        <hr />
    </div>

<?php endforeach; ?>
