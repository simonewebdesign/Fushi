<?php

$registration_notice = '';
$success = false;

if ( isset($_POST['submit_registration']) ) { // process registration

	$username 	= isset($_POST['username']) 	? trim($_POST['username']) 	: '';
	$email		 	= isset($_POST['email']) 			? trim($_POST['email']) 		: '';	
	$password 	= isset($_POST['password']) 	? trim($_POST['password']) 	: '';
	$password2	= isset($_POST['password2']) 	? trim($_POST['password2']) : '';
	
	if ( !empty($username) &&
	!empty($email) &&
	!empty($password) &&
	$password == $password2 ) {
	
		$registration = $db->prepare("INSERT INTO users (`login`, `email`, `password`, `created_at`) VALUES (?, ?, PASSWORD(?), ?)");
		
		$success = $registration->execute(
			array(
				$username,
				$email,
				$password,
				date(MYSQL_DATETIME)
			)
		);
		
		if ($success) {
		
			$registration_notice = "Registrazione eseguita correttamente. Ti è stata inviata un'email di conferma.";
			$success = true;
			
		} else { // fail
		
			$registration_notice = "Registrazione fallita. Per favore riprova.";		
		}
		
	} else { // invalid data

		$registration_notice = "Campi non validi. Per favore aggiorna la pagina e riprova.";
	}
	
	echo $registration_notice;
	if (!$success) { include_once INC . 'forms/register.php'; }
	
} else { // show registration form

  include_once INC . 'forms/register.php';
}
