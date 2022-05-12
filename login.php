<?php

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
<form action="home.php" method="post">
    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="username" class="form-label">Nom utilisateur</label>
        <input type="htmlspecialchars" class="form-control" id="username" name="username" aria-describedby="username-help" placeholder="prénom.nom">
        <div id="username-help" class="form-text">Le nom d'utilisateur à la création de compte.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<!-- 
    Si utilisateur/trice bien connectée on affiche un message de succès
-->
<?php else: ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser['prénom']; ?> <?php echo $loggedUser['nom']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>