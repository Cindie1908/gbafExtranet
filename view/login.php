<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >


<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<?php if(!isset($loggedUser)): ?>
<form class="formulaire-de-connexion"  action="index.php?page=users::login" method="post">
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
<div class="insline">
<p>Mot de passe oublié, cliquer <a href="?page=users::invite">ici</a></p>
    <p>Pas encore inscrit, cliquer <a href="?page=users::inscription">ici</a></p>
</div>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    
    <body class="corpsite">
        <div class="container">

            <!-- Si l'utilisateur existe, on affiche la page -->
            <?php if(isset($loggedUser)): 
                return $isconnected = "true";
                ?>


    <?php endif; ?>
            </div>
    </body>
</html>

<?php endif; ?>