<!DOCTYPE html>
<html lang="fr">
<?php include 'Include/headAdm.php'; ?>
<body>

<?php 
    if (isset($_SESSION['admin'])): ?>
 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tableau de bord</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Voir le site</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="Include/logout.php"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li>
    </ul>
  </div>
</nav>
<?php endif; ?>
<?= $contenu ?>
<?php 
    if (isset($_SESSION['admin'])): ?>
    <footer>
        <div style="background-color: aqua; height: 110px;">
            
        </div>
    </footer>
<?php endif; ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    $(function(){
            $("div.alert").show("slow").delay(4000).hide("slow");
           
    });
    </script>
</body>
</html>
