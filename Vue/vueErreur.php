<?php ob_start() ?>
<?php $titre = '| Erreur'; ?>
<div class="alert">
	<h2 style="color: red; text-align: center;">Une erreur est survenue : <?= $msgErreur ?> !</h2>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>