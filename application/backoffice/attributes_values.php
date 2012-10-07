<h2>Valori degli attributi</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi nuovo</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action			= $_POST['action'];
	$_id 			= isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$name_id		= (int) (isset($_POST['name_id']) ? $_POST['name_id'] : 0);
	$value 			= isset($_POST['value']) ? trim($_POST['value']) : '';

	// binding SQL data
	$sql_data = array(
		'_id'			=> $_id,
		'name_id'		=> $name_id,
		'value'			=> $value
	);
	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (`value`, `name_id`) VALUES (:value, :name_id)";
		$positive = $create_positive;
		$negative = $create_negative;
		unset($sql_data['_id']);
	} else
	if ( $action == 'update' ) {
		// UPDATE
		$query_string = "UPDATE `$table_name` SET `value`=:value, `name_id`=:name_id WHERE `_id`=:_id";
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