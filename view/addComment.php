<?php 
require_once "Controller/CommentsController.php";
    $CommentController = new \Controller\CommentsController();
?>
<form method="POST" action="?page=actors::addComment&id=<?/*=$actors[$i]->getIdActor(); */?>">
    <div class="mb">
        <input type="text" class="commentmsg" id="commentmsg" name="commentmsg" placeholder="Votre commentaire">
    </div>
    <a href="?page=actors::addComment&id=<?=$actorById->getIdActor(); ?>">
        <button class="seconnecter" type="submit" >Envoyer</button>
    </a>
</form>
