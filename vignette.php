<?php

$actors = getActors();

foreach ($actors as $actor) {
    ?>
        <div class="vignette">
            <div >
                <img class="logo-vignette" alt=<?php echo $actor['Logo']; ?> src="<?php echo $actor['Logo']; ?>")>
            </div>
            <div class="displayvignette">
            <p><?php echo $actor['Titre']; ?></p>
                <p><?php echo substr($actor['Description'],0,120); ?> ...</p>
                <button class="lirelasuite">Lire la suite</button>
            </div>
    </div>
    <?php
    }
?>




