<?php

// You are inside <div id="ajax-response">.

// Including Database
include_once '../config/database.php';
include_once '../library/db.php';

$delete_query = '';

if ( !empty($id) ) {
	$delete_query = "DELETE FROM templates WHERE _id=$id";
	
	$template_query = "SELECT name FROM templates WHERE _id=$id";
	$template_to_delete_db = $db->query($template_query);
	$template_to_delete = $template_to_delete_db->fetchObject();	
}

if ( !empty($delete_query) ) {
	
	if ( $db->exec($delete_query) ) { 
		echo "Template eliminato con successo. ID=$id";
		
		/* begin deleting files */
		unlink('../application/templates/' . $template_to_delete->name . '.php');
		unlink('css/templates/' . $template_to_delete->name . '.css');
		/* end deleting files */
		
	} else {
		echo "Si è verificato un errore durante l'eliminazione del template. ID=$id";
	}

}