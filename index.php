<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>GBAF Extranet</title>
        <link rel="stylesheet" href="styles.css" type="text/css" >
    </head>



<?php
require('query.php');

$users = getDatas();
// Validation du formulaire
if (isset($_POST['username']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['username'] === $_POST['username'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'username' => $user['username'],
            ];
        } else {
            $errorMessage = sprintf('Erreur identifiée : (%s/%s)',
                $_POST['username'],
                $_POST['password']
            );
        }
    }
}
?>

<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if(!isset($loggedUser)): ?>
<form class="formulaire-de-connexion" action="index.php" method="post">
    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <img class="logo-header" alt="logo GRBF" src="https://zupimages.net/up/22/18/baeh.png")>
    <p>Vous êtes sur l'extranet GBAF, pour accéder à la suite, merci de vous connecter :</p>
    <div class="page-connex">
        <div class="mb">
            <label for="username" class="form-label">Nom utilisateur :</label>
            <input type="htmlspecialchars" class="form-control" id="username" name="username" aria-describedby="username-help" placeholder="prénom.nom">
        </div>
        <div class="mb">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <button class="seconnecter" type="submit" class="btn btn-primary">Se connecter</button>
</form>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    
    <body class="corpsite">
        <div class="container">

            <!-- Si l'utilisateur existe, on affiche la page -->
            <?php if(isset($loggedUser)): ?>

            <!-- Navigation -->
            <?php include_once('header.php'); ?>


            <!-- Entête -->
            <?php include_once('title.php'); ?>

            <!-- Liste -->
            <?php include_once('vignette.php'); ?>
            <?php include_once('description.php'); ?>  

            <!-- pied -->
            <?php include_once('footer.php'); ?>

<?php endif; ?>

</body>
</html>

<?php endif; ?>