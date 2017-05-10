<?php $this->titre = '- ' . $billet->titre; ?>
<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
  
  </ul>
</nav>
<div class="jumbotron" style="background-color: #FCFAE1">
<article>
  <header style="text-align: center;">
  <img class="featurette-image img-responsive center-block" src="<?= $billet->image; ?>" alt="Generic placeholder image">
    <h1 class="lead" style="color: green;"><?= $billet->titre ?></h1>
    <p>Publié le <?= $billet->date ?></p>
  </header>
  <hr>
  <p><?= $billet->contenu ?></p>
</article>
</div>
<hr />
<div class="jumbotron">
 
    <form action="" id="form-comment" method="post">
      <input type="hidden" name="parent_id" value="0" id="parent_id">
      <input type="hidden" name="id" value="<?= $billet->ID ?>" />
      <h4>Poster un commentaire</h4>
      <div class="form-group">
        <input name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo" required>      
      </div>
      <div class="form-group">
        <textarea name="content" id="content" class="form-control" placeholder="Votre commentaire" required></textarea>      
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Commenter</button>
      </div>
    </form>
</div>
    <?php
      if (isset($message) && !empty(($message))) { ?>

        <div class="alert alert-success" role="alert"><?php echo $message; ?>
          <span class="sr-only">Error:</span>
        </div>
    <?php }?>
<header class="jumbotron">
    <h2 style="text-align: center; color: blue;">Commentaires - <?= $billet->titre ?></h2>
</header>

<?php
foreach ($commentaires as $comment ) {
          $commentaireParId[$comment->ID] = $comment;
        }
        foreach ($commentaires as $k => $comment) {
          //verif si c'est une rep
          if ($comment->parent_id != 0) {
            $commentaireParId[$comment->parent_id]->children[] = $comment;
            //on sort les commentaires du tableaux commentaires 
            unset($commentaires[$k]);
          }
        }?>



<?php foreach ($commentaires as $comment): ?> 
    <div class="jumbotron">
      <div class="panel-body" id="comment-<?= $comment->ID; ?>">
        <strong><?php echo $comment->auteur; ?> à écrit le <?= $comment->date; ?> :</strong><br><hr>
        <?php echo $comment->contenu; ?><hr>
        <p class="text-right"><button class="btn btn-info reply" data-id="<?= $comment->ID; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Répondre</button> <a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $comment->ID ?>&id=<?= $comment->id_billet ?>" name="id" value="<?= $comment->id_billet ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a></p>
      </div>
    </div>
      <?php if (isset($comment->children)):?>
        <?php foreach ($comment->children as $comment): ?> 
          <div class="jumbotron" style="margin-left: 50px; background-color: aqua;">
            <div class="" id="comment-<?= $comment->ID; ?>">
              <strong><?php echo $comment->auteur; ?> à écrit le <?= $comment->date; ?> :</strong><br>
              <?php echo $comment->contenu; ?><hr>
             
              <p class="text-right"><button class="btn btn-info reply" data-id="<?= $comment->ID; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Répondre</button> <a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $comment->ID ?>&id=<?= $comment->id_billet ?>" name="id" value="<?= $comment->id_billet ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a></p>
            </div>
          </div>
          <?php if (isset($comment->children)):?>
              <?php foreach ($comment->children as $comment): ?>
                <div class="jumbotron" style="background-color: yellow; margin-left: 100px;">
                  <div class="" id="comment-<?= $comment->ID; ?>">  
                    <strong><?php echo $comment->auteur; ?> à écrit le <?= $comment->date; ?> :</strong><br>
                    <?php echo $comment->contenu; ?><hr>
                    <p class="text-right"><button class="btn btn-info reply" data-id="<?= $comment->ID; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Répondre</button> <a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $comment->ID ?>&id=<?= $comment->id_billet ?>" name="id" value="<?= $comment->id_billet ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a></p>
                  </div>
                </div>
                <?php if (isset($comment->children)):?>
                  <?php foreach ($comment->children as $comment): ?>
                    <div class="" style="margin-left: 150px;" id="comment-<?= $comment->ID; ?>">
                      <div class="jumbotron" style="background-color: orange;">
                        <strong><?php echo $comment->auteur; ?> à écrit le <?= $comment->date; ?> :</strong><br>           
                        <?php echo $comment->contenu; ?><hr>
                        <p class="text-right"><a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $comment->ID ?>&id=<?= $comment->id_billet ?>" name="id" value="<?= $comment->id_billet ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              <?php endforeach; ?>
          <?php endif; ?>
        <?php endforeach ?>
      <?php endif; ?>
    <?php endforeach; ?>















<?php /*foreach ($commentaires as $commentaire): ?>
  <div class="jumbotron">
  <p><?= $commentaire->date ?> :</p> <?= $commentaire->auteur ?> dit :</p>
  <p><?= $commentaire->contenu ?></p>
  <a class="btn btn-danger" href="index.php?action=signaler&commentaire=<?= $commentaire->ID ?>&id=<?= $commentaire->id_billet ?>" name="id" value="<?= $commentaire->id_billet ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Signaler</a> 
  <a class="btn btn-info" href="index.php?repondre=<?= $commentaire->ID ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Répondre</a>
  </div><?php //var_dump($commentaires) ?>
<?php endforeach; */?>


