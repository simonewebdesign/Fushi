<?php

$table_name = 'attributes_values';

include_once '../config/database.php';
include_once '../library/db.php';

$query = "DELETE FROM `$table_name` WHERE `_id`=$id";

if ( $db->exec($query) ) {
	$response = "Eliminazione eseguita correttamente.";
} else {
	$response = "Si è verificato un errore durante l'eliminazione.";
}
$response.= " (ID=$id)";
echo $response;