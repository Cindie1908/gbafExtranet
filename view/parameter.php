<?php 
ob_start(); 
?>

<?php $user=$this->getUser(); ?>
<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >
<form class="formulaire-de-création"  action="index.php?page=users::update" method="post">
    <p>Vous êtes sur le compte de <?php echo $user->getPrenom(); ?> <?php echo $user->getNom(); ?>, votre identifiant est <?php echo $user->getUsername(); ?>. Pour modifier vos informations, cliquer sur les champs suivants :</p>
    <div class="page-creation">
        <div class="mb">
            <label for="password" class="form-label">Mot de passe :</label>
            <input placeholder="<?php echo $user->getPassword(); ?>" type="password" class="form-control" id="password" name="password">
        </div>
        <div class="flexrow">
            <div class="mb">
                <label for="email" class="form-label">Email :</label>
                <input placeholder="<?php echo $user->getEmail(); ?>" type="htmlspecialchars" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="flexrow">
            <div class="mb">
                <label for="question" class="form-label">Question pour récupérer votre mot de passe :</label>
                <select id="question" name="question" placeholder="<?php echo $user->getQuestion(); ?>">
                    <option value="" disabled selected hidden><?php echo $user->getQuestion(); ?></option>
                    <option>1 - Quel est le nom de ton animal de compagnie préféré ?</option>
                    <option>2 - Quel est le prénom de ton père ?</option>
                    <option>3 - Quelle est ta ville de naissance ?</option>
                    <option>4 - Quel est le prénom de ta mère ?</option>
                </select>
            </div>
            <div class="mb">
                <label for="réponse" class="form-label">Réponse :</label>
                <input placeholder="<?php echo $user->getReponse(); ?>" type="htmlspecialchars" class="form-control" id="réponse" name="réponse">
            </div>
        </div>    
    </div>
    <button class="seconnecter" type="submit" class="btn btn-primary">Modifier</button>
</form>
    <button class="seconnecter" class="btn btn-primary"><a href="index.php?page=actors::viewActors">Retour</a></button>

<?php 
$content = ob_get_clean();
$titre = "gestion du compte";
require "template.php";
?>