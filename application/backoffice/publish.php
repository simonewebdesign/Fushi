<?php
include_once '../config/database.php';
include_once '../library/db.php';

$bool = (int) (isset($params[4]) ? $params[4] : 0);
$query = "UPDATE $table_name SET is_published=:publish WHERE _id=:_id";

$sql_data = array(
	'_id' => $id,
	'publish' => $bool
);

$statement = $db->prepare($query);

if ( $statement->execute($sql_data) ) {

	if ( $bool ) {
		echo "<span class='icon true'>L'oggetto è stato pubblicato. (ID=$id)</span>";
	} else {
		echo "<span class='icon false'>L'oggetto è stato nascosto. (ID=$id)</span>";
	}

} else {

	echo "<span class='icon error'>Errore: lo stato di pubblicatione dell'oggetto non è stato modificato. (ID=$id)</span>";
	//$response = $negative; non usabile poiché la pagina non viene ricaricata. Puoi comunque aggiungere classi (al div#response) per dare uno stile all'evento success di AJAX, se lo desideri.
}