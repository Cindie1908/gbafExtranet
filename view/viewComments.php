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
    /*}else{
        ?><p>Soyez le premier à commenter !</p>
    <?php*/
}endfor; 
?>

