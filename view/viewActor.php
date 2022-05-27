<?php 
ob_start(); 
?>

<div class="vignette">
        <div >
            <img class="logo-vignette" alt=<?= $actorById->getLogo(); ?> src="<?= $actorById->getLogo(); ?>")>
        </div>
        <div class="displayvignette">
            <p><?= $actorById->getTitre(); ?></p>
            <p><?= $actorById->getDescription(); ?></p>
            <a class="showComments" href="<?= URL ?>actor/viewcomments/<?=$actorById->getIdActor(); ?>">Voir les commentaires</a>
        </div>
    </div>

<?php
    

$content = ob_get_clean();
$titre = $actorById->getTitre();
require "template.php";
?>