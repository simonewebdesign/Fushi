<h2>Impostazioni</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Crea nuova</a>

<?php

if ( isset($_POST['submit']) ) {
	
	// hidden fields
	$action			= $_POST['action'];
	$_id 			= isset($_POST['id']) ? $_POST['id'] : 0;
	
	// fields
	$name 			= isset($_POST['name']) ? trim($_POST['name']) : '';
	$value 			= isset($_POST['value']) ? trim($_POST['value']) : '';
	$group 			= isset($_POST['group']) ? trim($_POST['group']) : '';

	// binding SQL data
	$sql_data = array(
		'_id'			=> $_id,
		'name'			=> $name,
		'value'			=> $value,
		'group'			=> $group
	);
	
	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (`name`, `value`, `group`) VALUES (:name, :value, :group)";	
		$positive = $create_positive;
		$negative = $create_negative;
		unset($sql_data['_id']);
	} else	
	if ( $action == 'update' ) {
		// UPDATE
		$query_string = "UPDATE `$table_name` SET `name`=:name, `value`=:value, `group`=:group WHERE `_id`=:_id";
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