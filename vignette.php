<?php
try
{
    //connection à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=gbaf_extranet;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    //récupération de l'erreur
    die('Erreur : ' . $e->getMessage());
}

//récupération des données de la table actors
$sqlQuery = "SELECT * FROM `actors`";
$Statement = $mysqlClient->prepare($sqlQuery);
$Statement->execute();
$actors = $Statement->fetchAll();   

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




