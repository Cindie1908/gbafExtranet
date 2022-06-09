<?php 
require_once "Controller/CommentsController.php";
    $CommentController = new \Controller\CommentsController();
?>
<form method="POST" action="?page=actors::addComment&id=<?/*=$actors[$i]->getIdActor(); */?>">
    <div class="mb">
        <input type="text" class="commentmsg" id="commentmsg" name="commentmsg" placeholder="Votre commentaire">
    </div>
        <button class="seconnecter" type="submit" >Envoyer</button>
</form>
