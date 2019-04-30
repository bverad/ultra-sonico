	<?php

	// Replace this with your own email address
	$siteOwnersEmail = 'bruno.zeroleft@gmail.com';


	if($_POST) {
		
		$name = trim(stripslashes($_POST['name']));
		$email = trim(stripslashes($_POST['email']));
		$subject = trim(stripslashes($_POST['subject']));
		$contact_message = trim(stripslashes($_POST['message']));
		$error= null;
		/*// Check Name
		if (strlen($name) < 2) {
			$error['name'] = "Por favor ingresa tu nombre.";
		}
		// Check Email
		if (!preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $email)) {
			$error['email'] = "Por favor, ingresa una dirección de correo electrónico válida.";
		}
		// Check Message
		if (strlen($contact_message) < 15) {
			$error['message'] = "Por favor ingresa tu mensaje. Debería tener al menos 15 caractéres.";
		}
		// Subject
		
		if ($subject == '') { 					
			$subject = "Formulario de contacto"; 					
		}*/
		// Set Message		
		$message = null;
		$message .= "De: " . $name . "<br />";
		$message .= "Correo electrónico: " . $email . "<br />";
		$message .= "Mensaje: <br />";
		$message .= $contact_message;
		$message .= "<br /> ----- <br /> Este email fué enviado desde el formulario de contacto de tu sitio web. <br />";

		// Set From: header
		$from =  $name . " <" . $email . ">";
		$headers = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		//trigger exception in a "try" block
		try {
			ini_set("sendmail_from", $siteOwnersEmail); // for windows server
			$mail = mail($siteOwnersEmail, $subject, $message, $headers);
			echo "OK";
		}
		
		//catch exception
		catch(Exception $e) {
			echo 'Ocurrio un error no controlado : ' .$e->getMessage();
		}

		/*if (!$error) {

			ini_set("sendmail_from", $siteOwnersEmail); // for windows server
			$mail = mail($siteOwnersEmail, $subject, $message, $headers);

			if ($mail) { echo "El mensaje ha sido enviado con éxito"; }
			else { echo "Algo anduvo mal. Por favor inténtalo más tarde."; }
			
		} # end if - no validation error

		else {

			$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
			$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
			$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
			
			echo $response;

		} # end if - there was a validation error*/

		
	}

	?>