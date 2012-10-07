<?php

$sverbose[] = "(session_delete.php) deleting session cookie...";

$session_cookie = session_get_cookie_params();

session_destroy();

$is_unset_cookie = setcookie( session_name(),
							  false,
							  $session_cookie['lifetime'],
							  $session_cookie['path'],
							  $session_cookie['domain'],
							  $session_cookie['secure'] );

if ( $is_unset_cookie ) {

	$verbose[] = "(session_delete.php) Cookie successfully deleted from user's PC.";
	//$verbose[] = "Forcing browser to refresh the page, by calling header()...";
	//header("Location: ".ROOT);

} else {

	$verbose[] = "(session_delete.php) Cookie deletion FAILED. (If output exists prior to calling setcookie(), it will fail and return FALSE.)";

}