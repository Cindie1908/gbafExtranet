<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >

<form class="formulaire-de-création"  action="index.php?page=users::getNewPassword" method="post">
    <img class="logo-header" alt="logo GRBF" src="https://zupimages.net/up/22/18/baeh.png")>
    <div class="page-creation">
        <div class="flexrow">
            <div class="mb">
                <label for="question" class="form-label">Pour modifier votre mot de passe, merci de répondre à la question suivante :</label>
                <select id="question" name="question" placeholder="<?php echo $_SESSION["question"]; ?>">
                    <option value="" disabled selected hidden><?php echo $_SESSION["question"]; ?></option>
                </select>
            </div>
            <div class="mb">
                <label for="reponse" class="form-label">Réponse :</label>
                <input placeholder="***" type="htmlspecialchars" class="form-control" id="reponse" name="reponse">
            </div>
        </div>    
    </div>
    <button class="seconnecter" type="submit" class="btn btn-primary">Envoyer</button>
</form>
