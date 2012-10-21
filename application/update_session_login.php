<?php

$update_session = $db->prepare("UPDATE sessions SET 
user_id=?, 
lastActivity=? 
WHERE sessionId=?");

$update_session->execute(
	array(
		$user->_id,
		time(),	
		session_id()
	)
);