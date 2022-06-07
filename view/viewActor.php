<?php 
ob_start(); 
$commentsModalController = new \Controller\CommentsModalController();
require_once "Controller/CommentsController.php";
    $CommentController = new \Controller\CommentsController();
    $SumLikeController = new \Controller\SumLikesController();
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
                    <img class="logo-profile" alt="like" src="./Images/like.png" )>
                        <?php $id = $_GET['id'];
                        echo $SumLikeController->viewSumLikes($id);?> 
                    <img class="logo-profile" alt="dislike" src="./Images/dislike.png" )>   
                        <?php $id = $_GET['id'];
                        echo $SumLikeController->viewSumDislikes($id);?>                                  
                </div>
            </div>
        </div>
        <div class="table-comments">
        <h3>Commentaires</h3>
            <!--<form>
                <div class="mb">
                    <input type="htmlspecialchars" class="commentmsg" id="commentmsg" name="commentmsg" placeholder="Votre commentaire">
                </div>
                <button class="seconnecter" type="submit" >Envoyer</button>
            </form>-->
            <?php include "addComment.php";?>
            <?php $id = $_GET['id'];
            echo $CommentController->viewComments($id)?>            
        </div>
    </div>
</div>    
<?php
$content = ob_get_clean();
$titre = $actorById->getTitre();
require "template.php";
?>


