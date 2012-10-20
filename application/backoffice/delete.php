<?php

include_once '../config/database.php';
include_once '../library/db.php';

$query = "UPDATE `$table_name` SET `is_deleted`=1 WHERE `_id`=$id"; // this doesn't DELETE but just UPDATE.

if ( $db->exec($query) ) {
	$response = "<span class='icon delete'>Eliminazione eseguita correttamente. (ID=$id)</span>";
} else {
	$response = "<span class='icon delete'>Si è verificato un errore durante l'eliminazione. (ID=$id)</span>";
}
echo $response;