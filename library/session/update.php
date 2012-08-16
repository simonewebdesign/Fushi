<?php

if ( !empty($session) ) {

	$verbose[] = "(session_update.php) proceding updating record with new session_id...";
	
	if ( $session->ipAddress == IP_ADDRESS ) {

		$verbose[] = "(session_update.php) IP_ADDRESS not changed.";
		
		// regenerating session id
		if ( session_regenerate_id() ) {
			// session_id() regenerated.
			$verbose[] = "(session_update.php) session_id regenerated. (value=".session_id().")";
			$update_session_query = "UPDATE sessions ";
			$update_session_query.= "SET sessionId = '".session_id()."', ipAddress = '".IP_ADDRESS."', userAgent = '".USER_AGENT."', lastActivity = '".time()."' ";
			$update_session_query.= "WHERE sessionId = '".$_COOKIE[session_name()]."'";
			
			$sql_data = array(		
				'sessionId' => session_id(),
				'ipAddress' => IP_ADDRESS,
				'userAgent' => USER_AGENT,
				'lastActivity' => time(),
				'oldSessionId' => $_COOKIE[session_name()]
			);
			
			$session_update_db = $db->prepare($update_session_query);
			
			$verbose[] = "(session_update.php) updating record...";
			
			if ( $session_update_db->execute($sql_data) ) {
				$verbose[] = "(session_update.php) record updated successfully.";
			} else {
				$verbose[] = "(session_update.php) ERROR during updating session.";
			}
			
		} else {
			$verbose[] = "(session_update.php) ERROR during regenerating session id";
		}
	
	} else {
	
		$verbose[] = "(session_update.php) WARNING: IP_ADDRESS changed! (stealed cookie, maybe?)";
		$verbose[] = "(session_update.php) Session is not valid anymore.";

		require LIB . 'session_delete.php'; // It is recommended to use the require() function instead of include(), because scripts should not continue after an error.
	
		$verbose[] = "(session_update.php) Session and cookie successfully deleted.";
		$verbose[] = "(session_update.php) Forcing browser to refresh the page, by calling header(), and redirecting to home page";
		header("Location: ".ROOT);	// TODO $_SERVER['HTTP_REFERER'] instead of home
	}

} else {

	$verbose[] = "(session_update.php) Cookie exists in user's PC, but session not found in database. Probably the session was expired. However, the cookie is no more valid, so it must be deleted.";
	
	require LIB . 'session/delete.php'; // It is recommended to use the require() function instead of include(), because scripts should not continue after an error.
		
	$verbose[] = "(session_update.php) Forcing browser to refresh the page, by calling header(), and redirecting to home page";
	header("Location: ".ROOT); // TODO $_SERVER['HTTP_REFERER'] instead of home
	
}