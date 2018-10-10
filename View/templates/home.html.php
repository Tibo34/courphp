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

<?php for ($i=$p;$i<$last;$i++) : ?>
    <div>
        <h2><?= $articles[$i]->getTitle() ?></h2>
        <p><?= $articles[$i]->getHead() ?></p>
        <p><a class="btn btn-default" href="/index.php?page=article&id=<?= $articles[$i]->getId() ?>" role="button">View details &raquo;</a></p>
    </div>
<?php endfor; ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
            $j=1;
            for($i=0;$i<$nbpage;$i++){
                echo  '<li><a href="index.php?p='.$i.'">'.$j.'</a></li>';
                $j++;
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