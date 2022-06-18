<?php 
require_once "Controller/LikesController.php";
    $CommentController = new \Controller\LikesController();

        $id_actor = $_GET['id'];

?>
<form method="POST" action="?page=comments::postLikeForAnActor">
    <div class="mb">
        <input type="text" class="commentmsg" id="commentmsg" name="commentmsg" placeholder="Votre commentaire">
    </div>
    <input class="displayNone" value="<?= $id_actor ?>" id="id_actor" name="id_actor"></p>
        <button class="seconnecter" type="submit" >Envoyer</button>
</form>