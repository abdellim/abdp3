<!DOCTYPE html>
<html lang="fr">
  <?php require '/Include/Head.php'; ?>
  <body>
    <?php require '/Include/Nav.php'; ?>
    
    <?php require '/Include/Slide.php'; ?>
    <div class="container">
      <div class="starter-template" style="padding-top: 40px;">
        <div class="row">
              <?= $contenu; ?>
        </div>
      </div>
    </div><!-- /.container -->

  </body>

  <!-- SCRIPT -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
