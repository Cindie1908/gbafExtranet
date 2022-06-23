<?php 
ob_start(); 
?>


<?php include "generalities.php";?>
<h2>Nos partenaires :</h2>
<div class="generalities">
    <p>Les produits et services bancaires sont nombreux et très variés. Afin de vous aider à renseigner au mieux les clients, vous bénéficiez en tant que salarié des 340 agences des banques et assurances en France de la liste des financeurs.</p>
    <p>Vous trouverez ci-dessous le répertoire des partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires. Vous pourrez y retrouver un grand nombre d'informations sur les partenaires et acteurs du groupe aisin que sur les produits et services bancaires et financiers. Vous pourrez lire les différents commentaires et y poster votre avis.</p>
</div>

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
            <a class="lirelasuite" href="?page=actors::viewAnActor&id=<?=$actors[$i]->getIdActor(); ?>">Lire la suite</a>
        </div>
    </div>
<?php endfor; ?>
<?php
    

$content = ob_get_clean();
$titre = "Liste d'acteurs";
require "template.php";
?>
