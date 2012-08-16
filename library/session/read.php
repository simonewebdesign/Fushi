<?php

/* BEGIN get the $session from db */
$verbose[] = "(session_read.php) looking in db for a record with the same id of the current session...";	
$look_for_session_query = "SELECT `_id`, 	`user_id`, 	`sessionId`, 	`ipAddress`, 	`userAgent`, 	date_format(`entryDate`, '".DATE_FORMAT_TIME."') AS `entryDate`, 	`lastActivity` ";
$look_for_session_query.= "FROM sessions ";
$look_for_session_query.= "WHERE sessionId = '".session_id()."' ";
$look_for_session_query.= "AND ipAddress = '".IP_ADDRESS."' ";
$look_for_session_query.= "LIMIT 1"; // unique row

$session_db = $db->query($look_for_session_query);

if ( $session_db ) {
	$session = $session_db->fetchObject(); // or fetch(PDO::FETCH_ASSOC);
}
/* END get the $session from db */

if ( !empty($session) ) {

	$verbose[] = "(session_read.php) session FOUND.";

} else {

	$verbose[] = "(session_read.php) ERROR: session NOT FOUND.";

}