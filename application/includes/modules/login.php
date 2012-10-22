<?php 

include_once LIB . 'get_user_by_session_id.php';

if ($user) { // logged in

	echo "utente loggato. la tua login è " . $user->login;// do some stuff
	
} else { // not logged in

	include_once INC . 'forms/login.php';
}