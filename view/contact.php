<link rel="stylesheet" href="http://localhost/gbafExtranetCode/public/styles.css" type="text/css" >

<div class="container-nav">
<a href="http://localhost/gbafExtranetCode/index.php?page=actors::viewActors"><img class="logo-header" alt="logo GRBF" src="https://zupimages.net/up/22/18/baeh.png")></a>
</div>

<h2 class="formContactTitle">Formulaire de contact</h2>
<form class="formContact" action="Model/mail.php" method="post" enctype="multipart/mixed">
	<label for="nom">Votre nom</label>
	<input type="text" name="nom" required/>
	<label for="email">Votre email</label>
	<input type="email" name="email" required/>
	<label for="message">Votre demande</label>
	<textarea name="message" rows="2" cols="50" required></textarea>
	<input class="contactSend" type="submit" value="Envoyer">
	<a class="gobackContact" href="http://localhost/gbafExtranetCode/index.php?page=actors::viewActors">Retour<img class="logo-profile" alt="goback" src="http://localhost/gbafExtranetCode/Images/back.png" )></a>
</form>
