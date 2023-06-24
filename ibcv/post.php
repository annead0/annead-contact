<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['email'], $_POST['subject'], $_POST['name'], $_POST['msg'])) {
	// Validate email adress
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Email no existeix!';
	}
	// Make sure the form fields are not empty
	if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) {
		$responses[] = 'Ompli tot per favor!';
	} 
	// If there are no errors
	if (!$responses) {
		// Where to send the mail? It should be your email address
		$to      = 'annead.ibcv@gmail.com';
		// Send mail from which email address?
		$from = 'noreply@annead-contact.vercel.app';
		// Mail subject
		$subject = $_POST['subject'];
		// Mail message
		$message = $_POST['msg'];
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		// Try to send the mail
		if (mail($to, $subject, $message, $headers)) {
			// Success
			$responses[] = 'Message enviat!';		
		} else {
			// Fail
			$responses[] = 'No sa enviat!';
		}
	}
}
?>
