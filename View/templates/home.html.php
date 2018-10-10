<!-- BEGIN : home.html.php -->
<?php

//var_dump(sizeof($articles));
$nbpage=sizeof($articles)/3;
if(isset($_GET['p'])){
    var_dump($_GET['p']);
    $p=$_GET['p']*3;
    $last=$p+3;
    if($last>sizeof($articles)){
        $last=sizeof($articles);
    }
    //var_dump($p." ".$last);
}
else{
    $p=0;
    $last=3;
}
?>
<form action="index.php" method="post">
    <div>
        <label for="num">Nom :</label>
        <input type="number" id="num" name="num">
    </div>    
</form>

<?php foreach($articles as $article): ?>
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
            
            for($i=1;$i<=$number;$i++){
                echo  '<li><a href="index.php?p='.$i.'">'.$i.'</a></li>';             
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