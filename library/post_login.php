<?php

	if ( isset($_POST['login']) ) {
		// user is trying to log in
		$verbose[] = "(post_login.php) an user is trying to log in.";

		$username = isset($_POST['username']) ? trim($_POST['username']) : '';
		$password = isset($_POST['password']) ? trim($_POST['password']) : '';

		$verbose[] = "(post_login.php) checking posted username and password...";

		if ( !empty($username) && !empty($password) ) {

			$verbose[] = "(post_login.php) user and password are not empty.";

			$sql_data = array(
				'login' => $username,
				'password' => $password
			);

			$verbose[] = "(post_login.php) querying the database looking for the user...";
			include_once 'get_user_by_post_login.php';

			if ($user) {
				// user is now logged in
				$verbose[] = "(post_login.php) user FOUND";
				$verbose[] = "(post_login.php) user n. {$user->_id} is now logged in.";
				$verbose[] = "(post_login.php) updating session table...";

				include_once 'update_session_login.php';

				$verbose[] = "(post_login.php) session table successfully updated.";
				// including backoffice's content
				//include_once BO . 'content.php';
				include_once 'login_successful.php'

			} else { // !user
			
				$verbose[] = "(post_login.php) WARNING: user NOT FOUND.";
				$login_error = "Username o password errati.";

				$verbose[] = "(post_login.php) showing login form...";
				include_once INC . 'forms/login.php';
				$verbose[] = "(post_login.php) login form shown.";
			}
			
		} else { // empty form
			$verbose[] = "(post_login.php) WARNING: the user has sent empty data from the login form.";
			$login_error = "Non puoi lasciare i campi vuoti.";

			$verbose[] = "(post_login.php) showing login form...";
			include_once INC . 'forms/login.php';
			$verbose[] = "(post_login.php) login form shown.";
		}

	} else { // not a post request

		$verbose[] = "(post_login.php) showing login form...";
		include_once INC . 'forms/login.php';
		$verbose[] = "(post_login.php) login form shown.";
	}