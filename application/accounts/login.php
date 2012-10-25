<?php 

include_once LIB . 'get_user_by_session_id.php';

if ($user) { // logged in
	
	
	// do some stuff if page...
	if ($template_name == 'backoffice') {
		include_once BO . 'content.php';
	} else {
		echo "Welcome, <b>{$user->login}</b>";
	}
	
	
} else { // not logged in

	include_once INC . 'forms/login.php';
}