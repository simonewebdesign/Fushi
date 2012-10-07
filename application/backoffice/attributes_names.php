<h2>Nomi degli attributi</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi nuovo</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action			= $_POST['action'];
	$_id 			= isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$name 			= isset($_POST['name']) ? trim($_POST['name']) : '';

	// binding SQL data
	$sql_data = array(
		'_id'			=> $_id,
		'name'			=> $name
	);

	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (`name`) VALUES (:name)";
		$positive = $create_positive;
		$negative = $create_negative;
		unset($sql_data['_id']);
	} else
	if ( $action == 'update' ) {
		// UPDATE
		$query_string = "UPDATE `$table_name` SET `name`=:name WHERE `_id`=:_id";
		$positive = $update_positive;
		$negative = $update_negative;

	}
	else {
		die('Azione non valida: ' . htmlentities($action));
	}

	// executing statement
	$statement = $db->prepare($query_string);

	if ( $statement->execute($sql_data) ) {
		$response = $positive;
	} else {
		$response = $negative;
	}
	$id = $action == 'create' ? $db->lastInsertId() : $_id;
	$response.= " (ID = $id)";
}