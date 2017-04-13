<?php
require_once 'Database.php';
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$userParPage = 2;
$userTotalReq = $bdd->query('SELECT id FROM billets');
//<!-- On calcul le nombre dentre dans la table -->
$userTotal = $userTotalReq->RowCount();
//On déclare la variable pagetotal et on utilise la fonction ceil pour arrondir au nombre superieur
$pagesTotal = ceil($userTotal/$userParPage);

//On vérifie si la varible de page existe ou non
if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotal) {
    $_GET['page'] = intval($_GET['page']); //sécurise la variable (pour avoir que des chiffres)
    $pageCourante = $_GET['page'];
} else { //si cette variable n'est pas defini ou vide
    $pageCourante = 1; // on se retrouvera sur la 1ere page (ex: index.php)
} 
// pour la limit
$depart = ($pageCourante-1)*$userParPage;
?>


<?php
if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
    $supprime = (int) $_GET['supprime'];
    $req = $bdd->prepare('DELETE FROM billets WHERE ID = ?');
    $req->execute(array($supprime));
}
?>


<div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
          <th>Episode</th>
          <th>Titre</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php    
//<!-- On affiche les elements de la base de données -->
$user = $bdd->query('SELECT * FROM billets ORDER BY ID DESC LIMIT '.$depart. ',' .$userParPage);
while ($result = $user->fetch()){
?>
        <tr>
            <td><?php echo $result['ID']; ?></td>
            <td><?php echo $result['titre']; ?></td>
            <td>
                <a class="btn btn-danger" href="home.php?supprime=<?= $result['ID'] ?>">Supprimer</a>
                <a class="btn btn-info" id="Bouton" href="edit.php?ID=<?= $result['ID'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier</a>
                <a class="btn btn-success" href="../entry.php?ID=<?= $result['ID'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Voir</a>
            </td>
        </tr>

<?php
}
?>
    </tbody>
</table>
</div>

<?php}?>






<div style="text-align :center;">
<div class="pagination">
    <?php 
    if ($pageCourante == 1) { ?>
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
    <?php 
    } else { ?>
        <li><a href="VueAdmin.php?page=<?php echo $pageCourante-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span></a></li> <?php
    }?>


    <?php
    for($i=1;$i<=$pagesTotal;$i++) {
        if ($i == $pageCourante) {
        echo '<li class="active"><a href="admin/home.php?page='.$i.'">'.$i.'<span class="sr-only"></span></a></li>';
        } else {
        echo '<li><a href="home.php?page='.$i.'">'.$i.'</a></li> ';
        }
    }
    ?>
    <?php 
    if ($pagesTotal == $pageCourante) { ?>
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
    <?php } else { ?>
        <li><a href="VueAdmin.php?page=<?php echo $pageCourante+1; ?>" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span></a></li> <?php
    }?>

</div>
</div>