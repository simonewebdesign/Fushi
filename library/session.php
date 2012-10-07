<?php

$session = null;
$user = null;

// cleaning old sessions... (old session: the ones where the user hasn't done any actions for a whole hour).
$expire_time = time()-ONE_HOUR;
$clean_old_sessions_query = "DELETE FROM sessions WHERE lastActivity < $expire_time";
$db->exec($clean_old_sessions_query);

session_name(SESSION_NAME);

session_set_cookie_params(
	SESSION_LIFETIME,
	SESSION_PATH,
	SESSION_DOMAIN,
	SESSION_SECURE,
	SESSION_HTTPONLY
	);

session_start();
$verbose[] = "(session.php) session_start() called.";

if ( isset( $_COOKIE[session_name()] ) ) {

	$verbose[] = "(session.php) a cookie named ".session_name()." exists. (value=".$_COOKIE[session_name()].")";
	include LIB . 'session/read.php';
	include LIB . 'session/update.php';

} else {

	$verbose[] = "(session.php) a cookie named ".session_name()." does NOT exist.";
	include LIB . 'session/create.php';
	include LIB . 'session/read.php';

}