<!DOCTYPE html>
<html lang="fr">
<?php include 'Include/headAdm.php'; ?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Mes Alertes ()</a></li>
                <li><a href="Include/logout.php"><i class="fa fa-lock" aria-hidden="true"></i>Déconnexion</a></li>
            </ul>
            <a class="navbar-brand" href="#">Tableau de bord</a>
        </div>
    </div>
</nav>
<?= $contenu ?>
<footer>
    <div style="background-color: aqua; height: 110px;">
        
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
</html>