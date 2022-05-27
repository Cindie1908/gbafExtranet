<?php 
ob_start(); 
?>



<?php 
    for($i=0; $i < count($actors);$i++) : 
?>
    <div class="vignette">
        <div >
            <img class="logo-vignette" alt=<?= $actors[$i]->getLogo(); ?> src="<?= $actors[$i]->getLogo(); ?>")>
        </div>
        <div class="displayvignette">
            <p><?= $actors[$i]->getTitre(); ?></p>
            <p><?= substr($actors[$i]->getDescription(),0,120); ?> ...</p>
            <a class="lirelasuite" href="<?= URL ?>actor/view/<?=$actors[$i]->getIdActor(); ?>">Lire la suite</a>
        </div>
    </div>
    <?php endfor; ?>
<?php
    

$content = ob_get_clean();
$titre = "Liste d'acteurs";
require "template.php";
?>
