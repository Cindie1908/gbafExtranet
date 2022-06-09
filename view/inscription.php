<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >
<form class="formulaire-de-création"  action="index.php?page=users::creation" method="post">
    <img class="logo-header" alt="logo GRBF" src="https://zupimages.net/up/22/18/baeh.png")>
    <p>Pour créer un compte, merci de renseigner les champs suivants :</p>
    <div class="page-creation">
        <div class="mb">
            <label for="username" class="form-label">Nom utilisateur :</label>
            <input placeholder="ex : prénom.nom" type="htmlspecialchars" class="form-control" id="username" name="username" aria-describedby="username-help" placeholder="prénom.nom">
        </div>
        <div class="mb">
            <label for="password" class="form-label">Mot de passe :</label>
            <input placeholder="password" type="password" class="form-control" id="password" name="password">
        </div>
        <div class="flexrow">
            <div class="mb">
                <label for="nom" class="form-label">Nom :</label>
                <input placeholder="nom" type="htmlspecialchars" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb">
                <label for="prénom" class="form-label">Prénom :</label>
                <input placeholder="prénom" type="htmlspecialchars" class="form-control" id="prénom" name="prénom">
            </div>
            <div class="mb">
                <label for="email" class="form-label">Email :</label>
                <input placeholder="email" type="htmlspecialchars" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="flexrow">
            <div class="mb">
                <label for="question" class="form-label">Question pour récupérer votre mot de passe :</label>
                <select id="question" name="question">
                    <option>1 - Quel est le nom de ton animal de compagnie préféré ?</option>
                    <option>2 - Quel est le prénom de ton père ?</option>
                    <option>3 - Quelle est ta ville de naissance ?</option>
                    <option>4 - Quel est le prénom de ta mère ?</option>
                </select>
            </div>
            <div class="mb">
                <label for="réponse" class="form-label">Réponse :</label>
                <input placeholder="réponse" type="htmlspecialchars" class="form-control" id="réponse" name="réponse">
            </div>
        </div>    
    </div>
    <button class="seconnecter" type="submit" class="btn btn-primary">Créer</button>
</form>