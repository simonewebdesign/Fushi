<?php 

include_once APP . 'get_user_by_session_id.php';

if ($user) { // logged in

	// do some stuff
	
} else { // not logged in

	include_once APP . 'post_login.php';
}