<?php

error_reporting(E_ALL); ini_set("display_errors", 1); //Display errors


	//Avoid injections in case of HTML Mail
        $nom = htmlentities($_POST['nom']);
        $email_from = htmlentities($_POST['email']); 
        $message = htmlentities($_POST['message']);


	//Check if mail host allow \r
    if(preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $email_from))
    {
        $passage_ligne = "\n";
    }
    else
    {
        $passage_ligne = "\r\n";
    }

    $email_to = "cindie.jouvin@gmail.com"; //Recipient
    $email_subject = "Contact extranetGBAF"; //Subject
    $boundary = md5(rand()); // Random boundary key

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    } 
    
    $headers = "From: \"".$nom."\"<".$email_from.">" . $passage_ligne; //Sender
    $headers.= "Reply-to: \"".$nom."\" <".$email_from.">" . $passage_ligne; //Sender
    $headers.= "MIME-Version: 1.0" . $passage_ligne; //MIME Version
    $headers.= 'Content-Type: multipart/mixed; boundary='.$boundary .' '. $passage_ligne; //Content (2 versions ex:text/plain et text/html)

    $email_message = '--' . $boundary . $passage_ligne; //Opening boundary
    $email_message .= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne; //Content type
    $email_message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne; //Encoding
    $email_message .= $passage_ligne .clean_string($message). $passage_ligne; //Content
    
	
                
    $email_message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Closing boundary
                
    if(mail($email_to,$email_subject, $email_message, $headers)==true){  //Sending mail
        header('Location: view/contact.php'); //Redirection
    }

?>