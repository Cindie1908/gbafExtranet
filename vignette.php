<?php include_once('variables.php'); ?>
    <?foreach ($actors as $actor): ?> 
        <div class="vignette">
            <div >
                <img class="logo-vignette" alt=<?php echo $actor['logo']; ?> src="<?php echo $actor['logo']; ?>")>
            </div>
            <div class="displayvignette">
                <p><?php echo $actor['nom']; ?></p>
                <p><?php echo substr($actor['description'],0,120); ?> ...</p>
                <button class="lirelasuite">Lire la suite</button>
            </div>
    </div>
    <?php endforeach ?>