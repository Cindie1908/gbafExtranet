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
            <form action="<?= $actors[$i]->getIdActor(); ?>" method="GET">
                <button class="lirelasuite"  type="submit" class="btn btn-primary" id="id_actor" value="<?= $actors[$i]->getIdActor(); ?>">Lire la suite</button>
            </form>
        </div>
    </div>
    <?php endfor; ?>
<?php
    

$content = ob_get_clean();
require "template.php";
?>

<?php /*dd($actor);
require_once("Model/myPDO.php");
require_once("Model/actorsManager.php");
require_once("Controller/ActorsController.php");

actorManager::getActors();
foreach (Actor::$actors as $actor) {
    echo $actor;
}
?>


<?php
include_once('Model/ActorsManager.php');
$actors = getActors();
*/
//foreach ($actors as $actor) {?>