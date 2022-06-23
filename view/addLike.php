<?php 
require_once "Controller/LikesController.php";
    $CommentController = new \Controller\LikesController();

        $id_actor = $_GET['id'];

?>
<form method="POST" action="?page=comments::postLikeForAnActor">
    <div class="mb">
        <input type="text" class="commentmsg" id="commentmsg" name="commentmsg" placeholder="Votre commentaire">
    </div>
    <input class="" value="1" id="likeOk" name="likeOk"></p>
        <button class="seconnecter" type="submit" >J'aime</button>
        <input class="" value="1" id="dislikeOk" name="dislikeOk"></p>
        <button class="seconnecter" type="submit" >Je n'aime pas</button>
</form>