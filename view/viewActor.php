<?php 
ob_start(); 
?>
<div class="body-vignette">
    <div class="container-vignette">
        <h2>Notre partenaire <?= $actorById->getTitre(); ?></h2>
        <div class="vignette">
            <div >
                <img class="logo-vignette" alt=<?= $actorById->getLogo(); ?> src="<?= $actorById->getLogo(); ?>")>
            </div>
            <div class="displayvignette">
                <h3><?= $actorById->getTitre(); ?></h3>
                <p><?= $actorById->getDescription(); ?></p>
                <div class="container-like">
                    <a href="?page=likes::postLikeForAnActor&id=<?= $id ?>"><img class="logo-profile" alt="like" src="./Images/like.png" )></a>
                        <?php $id = $_GET['id'];
                        if($sumLike->getLikeSum() !== null){
                            echo $sumLike->getLikeSum();
                        }
                        ?> 
                    <a href="?page=likes::postDislikeForAnActor&id=<?= $id ?>"><img class="logo-profile" alt="dislike" src="./Images/dislike.png" )></a>   
                        <?php $id = $_GET['id'];
                        echo $sumLike->getDislikeSum();?>   
                    <?php $id = $_GET['id'];
                    ?>   
                </div>                                     
                <a class="goback" href="?page=actors::viewActors">Revenir à la liste des partenaires :<img class="logo-profile" alt="goback" src="./Images/back.png" )>   </a> 
            </div>
        </div>
        <div class="table-comments">
        <h3>Commentaires</h3>
            <?php include "addComment.php";?>
            <?php 
            for($i=0; $i < count($comments);$i++) : 
                $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);  
                $id = $_GET['id'];
                if($comments[$i]->getIdActor() === $id){
            ?> 
                <div class="commentsTable">
                    <p class="header-comments">commentaire de <?= $comments[$i]->getFirstname(); ?> du <?=date($comments[$i]->getCommentDate()); ?></p>
                    <p><?= $comments[$i]->getCommentText(); ?></p>
                </div>
                <?php 
                }endfor; 
                ?>                       
        </div>
    </div>
</div>    
<?php
$content = ob_get_clean();
$titre = $actorById->getTitre();
require "template.php";
?>


