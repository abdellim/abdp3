<div style="text-align :center;">
<div class="pagination">
    <?php
    if ($pageCourante == 1) { ?>
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
    <?php 
    } else { ?>
        <li><a href="index.php?page=<?php echo $pageCourante-1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span></a></li> <?php
    }?>

    <?php
    for($i=1;$i<=$pageTotal;$i++) {
        if ($i == $pageCourante) {
        echo '<li class="active"><a href="index.php?page='.$i.'">'.$i.'<span class="sr-only"></span></a></li>';
        } else {
        echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li> ';
        }
    }
    ?>
    <?php 
    if ($pageTotal == $pageCourante) { ?>
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
    <?php } else { ?>
        <li><a href="index.php?page=<?php echo $pageCourante+1; ?>" aria-label="Previous">
        <span aria-hidden="true">&raquo;</span></a></li> <?php
    }?>

</div>
</div>