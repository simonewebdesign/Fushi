<?php

/* BEGIN set the $session from db */

// starting a new session
$verbose[] = "(session/create.php) starting a new session...";

$save_session_query = "INSERT INTO sessions (";
$save_session_query.= "sessionId, ipAddress, userAgent, entryDate, lastActivity";
$save_session_query.= ") VALUES (";
$save_session_query.= " '" . session_id() . "', '" . IP_ADDRESS . "', '" . USER_AGENT . "', NOW(), '" . time() . "' )";

if ( $db->exec($save_session_query) ) {
	$verbose[] = "(session/create.php) new session record created in db.";
} else {
	$verbose[] = "(session/create.php) INSERT QUERY FAILED while creating a new session record in db.";
}

/* END set the $session from db */