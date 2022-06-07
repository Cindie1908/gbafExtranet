<form action="mail.php" method="post" enctype="multipart/mixed">
	<label for="nom">Votre nom</label>
	<input type="text" name="nom" required/>
	<label for="email">Votre email</label>
	<input type="email" name="email" required/>
	<label for="message">Votre demande</label>
	<textarea name="message" rows="2" cols="50" required></textarea>
	<input type="submit" value="Envoyer">
</form>