<!-- BEGIN : home.html.php -->

<form action="index.php" method="get">
    <div>
        <label for="num">Nombre à afficher :</label>
        <input type="number" id="num" name="num" value="<?= $articles['limit'] ?>">
    </div>    
</form>

<?php foreach($articles['affiche'] as $article): ?>
    <div>
        <h2><?= $article->getTitle() ?></h2>
        <p><?= $article->getHead() ?></p>
        <p><a class="btn btn-default" href="/index.php?page=article&id=<?= $article->getId() ?>" role="button">View details &raquo;</a></p>
    </div>
<?php endforeach; ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
               
            for($i=1;$i<=$articles['nombre'];$i++){
                echo  '<li><a href="index.php?p='.$i.'&num='.$articles{'limit'}.'">'.$i.'</a></li>';             
            }
        ?>        
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<!-- END : home.html.php -->