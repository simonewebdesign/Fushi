<?php

/*** BACKOFFICE's BOOT ***/
error_reporting(1);
ini_set('display_errors', 'On');

$table_name = isset($get[1]) ? $get[1] : false;

// $action can also be the current page.
$action	= isset($get[2]) ? $get[2] : false;
if  ( is_numeric($action) && $action > 0 ) { // page is set in url
	$_SESSION['page']	= (int) $action;
	//unset ( $action );
	$action = false;
} else { // action is set in url

	$_SESSION['page'] = 1; // default page.

	if ($action == 'order') {

		$order_by = isset($get[3]) ? $get[3] : false;
		if ($order_by) {
			$_SESSION['order_by'] = $order_by;

			$order_type = isset($get[4]) ? $get[4] : false;
			if ( $order_type ) {
				$valid_order_types = array('asc','desc');
				if ( in_array($order_type, $valid_order_types) ) {
					$_SESSION['order_type'] = $order_type;
				}
			}
		}
	}
}


/* Begin VALID TABLE NAMES */
$valid_table_names = array( 'fruits'		=> 'Frutti',
							'attributes_names' => 'Attributi',
							'attributes_values' => 'Valori',
							//* Hidden tables
							'settings' 		=> 'Impostazioni',
							'templates' 	=> 'Template',
							'users'			=> 'Utenti'
							//*/
						   );
/* End VALID TABLE NAMES */


/* Begin default #response messages */
$create_positive = "Inserimento avvenuto con successo.";
$create_negative = "Errore: inserimento fallito. Riprovare.";
$update_positive = "Aggiornamento avvenuto con successo.";
$update_negative = "Errore: aggiornamento fallito. Riprovare.";
//$delete_positive = "Eliminazione eseguita correttamente.";
//$delete_negative = "Errore: eliminazione fallita. Riprovare.";
/* End default #response messages */


/* Begin Backoffice Session handling */
if ( !empty($session->user_id) ) {
	// looking for the user that is currently logged in
	$user_query = "SELECT `_id`, 	`login`, 	`name`, 	`surname`, 	`email`, 	`password`,	`isAdmin`, 	`birthDate`, 	date_format(registrationDate, '" . DATE_FORMAT_DATETIME . "') as registrationDate,	address, 	cap, 	city FROM users WHERE _id = {$session->user_id}";
	$user_db = $db->query($user_query);
	$user = $user_db->fetchObject();
}

if ( !empty($user) ) {
	// user is LOGGED
	$verbose[] = "(backoffice.php) user n. {$user->_id} is logged.";

	include_once BO . 'content.php';

} else {
	// user is NOT LOGGED
	if ( isset($_POST['login']) ) {
		// user is trying to log in
		$verbose[] = "(backoffice.php) an user is trying to log in.";

		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		$verbose[] = "(backoffice.php) checking posted username and password...";

		if ( !empty($username) && !empty($password) ) {

			$verbose[] = "(backoffice.php) user and password are not empty.";

			$sql_data = array(
				'login' => $username,
				'password' => $password
			);

			$verbose[] = "(backoffice.php) querying the database looking for the user...";

			$user_login_query = "SELECT * FROM `users` WHERE `login` = :login && `password` = PASSWORD(:password)";
			$user_db = $db->prepare($user_login_query);
			$user_db->execute($sql_data);
			$user = $user_db->fetchObject();

			if ( !empty($user) ) {
				// user is now logged in
				$verbose[] = "(backoffice.php) user FOUND";
				$verbose[] = "(backoffice.php) user n. {$user->_id} is now logged in.";

				$verbose[] = "(backoffice.php) updating session table...";

				$update_session_user_query = "UPDATE sessions SET user_id=:user_id, lastActivity=:lastActivity WHERE sessionId=:sessionId";

				$sql_data = array(
					'sessionId' => session_id(),
					'lastActivity' => time(),
					'user_id' => $user->_id
				);

				$update_session_user_db = $db->prepare($update_session_user_query);
				$update_session_user_db->execute($sql_data);

				$verbose[] = "(backoffice.php) session table successfully updated.";

				// including backoffice's content
				include_once BO . 'content.php';

			} else {
				$verbose[] = "(backoffice.php) WARNING: user NOT FOUND.";
				$login_error = "Username o password errati.";

				$verbose[] = "(backoffice.php) showing login form...";
				include_once INC . 'forms/login.php';
				$verbose[] = "(backoffice.php) login form shown.";
			}
		} else {
			$verbose[] = "(backoffice.php) WARNING: the user has sent empty data from the login form.";
			$login_error = "Non puoi lasciare i campi vuoti.";

			$verbose[] = "(backoffice.php) showing login form...";
			include_once INC . 'forms/login.php';
			$verbose[] = "(backoffice.php) login form shown.";
		}

	} else {

		$verbose[] = "(backoffice.php) showing login form...";
		include_once INC . 'forms/login.php';
		$verbose[] = "(backoffice.php) login form shown.";
	}

}
/* End Backoffice Session handling */