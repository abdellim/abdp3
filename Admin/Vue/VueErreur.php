<?php ob_start() ?>

<div class="alert">
	<h2 style="color: red; text-align: center;">Une erreur est survenue : <?= $msgErreur ?> ! <a class="btn btn-info" href="index.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Retour</a></h2>

</div>
<?php $form = '';?>
<?php $contenuAlerte = '';?>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>