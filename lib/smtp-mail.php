<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

function send_email_notification($to_address, $subject, $body, $alt_body = null) {

	if (!config('send_mail')) {

		return true;

	}

	if (!empty($to_address)) {

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
			$mail->isSMTP(); // Send using SMTP
			$mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'talentickjobportal@gmail.com'; // SMTP username
			$mail->Password = '#dragonFly_6'; // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port = 465; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('talentickjobportal@gmail.com', "TalenTick Job Portal");

			$mail->addAddress($to_list);

			// Content
			$mail->isHTML(true); // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AltBody = $alt_body ?? strip_tags($body);

			$mail->send();
			echo 'Message has been sent';
			return true;

		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	} else {
		return false;
	}

}