<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(!empty($_POST['company'])) {
   		exit;
	}

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);


	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    	exit;
	}

	if(preg_match("/[\r\n]/",$email)){
	    exit;
	}
	

    $to = "stephanie.n.dykes@gmail.com";

    $subject = "Portfolio Contact Form";

    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "From: noreply@stephaniedykes.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to,$subject,$body,$headers)) {
        echo "Message sent successfully! I'll get back to you soon.";
    }
    else {
        echo "Unfortunately, that didn't seem to work. Please contact me via email or LinkedIn instead.";
    }

}

?>