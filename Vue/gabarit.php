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
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
  </body>

  <!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function($) {
          $('.reply').click(function(e) {
              e.preventDefault();
              var $form = $('#form-comment');
              var $this = $(this);
              var parent_id = $this.data('id');
              var $comment = $('#comment-' + parent_id);
              $form.find('h4').text('Répondre à ce commentaire');
              $('#parent_id').val(parent_id);
              $comment.after($form);
          })
        });
      </script>
</html>
