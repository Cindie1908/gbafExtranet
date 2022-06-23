<?php 
for($i=0; $i < count($sumLikes);$i++) : 
    $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);  
    $id = $_GET['id'];
    if($sumLikes[$i]->getIdActor() === $id){
?>
    <div class="commentsTable">
            <p class="like-dislike">: <?= $sumLikes[$i]->getLikeSum(); ?></p>
    </div>
    <?php 

}endfor; 
?>