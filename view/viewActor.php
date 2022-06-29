<?php 
ob_start(); 
?>
<div class="body-vignette">
    <div class="container-vignette">
        <h2>Notre partenaire <?= $actorById->getTitre(); ?></h2>
        <div class="vignettewhite">
            <div >
                <img class="logo-vignette" alt=<?= $actorById->getLogo(); ?> src="<?= $actorById->getLogo(); ?>")>
            </div>
            <div class="displayvignettewhite">
                <h3><?= $actorById->getTitre(); ?></h3>
                <p><?= $actorById->getDescription(); ?></p>
                                     
                <a class="goback" href="?page=actors::viewActors">Revenir à la liste des partenaires :<img class="logo-profile" alt="goback" src="./Images/back.png" )>   </a> 
            </div>
        </div>
    </div>
        <div class="table-comments">
        <h3>Commentaires</h3>
        <div class="container-like">
                    <a href="?page=likes::postLikeForAnActor&id=<?= $id ?>"><img class="logo-profile" alt="like" src="./Images/like.png" )></a>
                        <?php $id = $_GET['id'];
                        /*if($sumLikes->getSumLikeById($id) !== null){
                            echo $sumLikes->getLikeSum();
                        }*/
                        if($sumLikes !== null){
                            for($i=0; $i < count($sumLikes);$i++) : 
                            $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);  
                            $id = $_GET['id'];
                            $test=$sumLikes[$i]->getIdActor();
                            //dump($sumLikes[$i],$test);
                            if($sumLikes[$i]->getIdActor() === $id){
                                echo $sumLikes[$i]->getLikeSum();
                            }
                            endfor; 
                        }
                        ?> 
                    <a href="?page=likes::postDislikeForAnActor&id=<?= $id ?>"><img class="logo-profile" alt="dislike" src="./Images/dislike.png" )></a>   
                        <?php $id = $_GET['id'];
                        //echo $sumLikes->getDislikeSum();
                        //dump($sumLikes);
                        if($sumLikes !== null){
                            for($i=0; $i < count($sumLikes);$i++) : 
                            $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);  
                            $id = $_GET['id'];
                            $test=$sumLikes[$i]->getIdActor();
                            //dump($sumLikes[$i],$test);
                            if($sumLikes[$i]->getIdActor() === $id){
                                echo $sumLikes[$i]->getDislikeSum();
                            }
                            endfor; 
                        }

                           
                        ?>   
                    <?php $id = $_GET['id'];
                    ?>   
                </div>                
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
<?php
$content = ob_get_clean();
$titre = $actorById->getTitre();
require "template.php";
?>


