<?php

$table_name = 'users';

include_once '../config/database.php';
include_once '../library/db.php';

$query = "UPDATE `$table_name` SET `isDeleted`=1 WHERE `_id`=$id";

if ( $db->exec($query) ) {
	$response = "Eliminazione eseguita correttamente.";
} else {
	$response = "Si è verificato un errore durante l'eliminazione.";
}
$response.= " (ID=$id)";
echo $response;