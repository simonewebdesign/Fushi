<?php

if ($session->user_id > 0) {
	// looking for the user that is currently logged in
	$user_query = "SELECT * FROM users WHERE _id = {$session->user_id}";
	$user_db = $db->query($user_query);
	$user = $user_db->fetchObject();
}