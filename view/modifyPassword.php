<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >
<form class="formulaire-de-création"  action="index.php?page=users::modifyPassword" method="post">
    <img class="logo-header" alt="logo GRBF" src="https://zupimages.net/up/22/18/baeh.png")>
    <p>Pour modifier votre mot de passe, merci de renseigner le champs suivant :</p>
    <div class="page-creation">
        <div class="mb">
            <p>Nom utilisateur : <?php echo $_SESSION['username'];?></p>
        </div>
        <div class="mb">
            <label for="password" class="form-label">Mot de passe :</label>
            <input placeholder="***" type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <button class="seconnecter" type="submit" class="btn btn-primary">Modifier</button>
</form>