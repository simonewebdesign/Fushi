<h2>Categorie</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi nuova categoria</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action	= $_POST['action'];
	$_id = isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$is_published = (int) (isset($_POST['is_published']) ? 1 : 0);

	// binding SQL data
	$sql_data = array(
		$_id,
		$name,
		$is_published
	);

	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (_id, `name`, `is_published`) VALUES (?, ?, ?)";
		$positive = $create_positive;
		$negative = $create_negative;
		//unset($sql_data[0]);
	}
	else
	if ( $action == 'update' ) {
		// UPDATE
		$sql_data[] = $_id;
		$query_string = "UPDATE `$table_name` SET _id=?, name=?, is_published=? WHERE `_id`=?";
		$positive = $update_positive;
		$negative = $update_negative;
	}
	else {
		die('Azione non valida: ' . htmlentities($action));
	}

		$statement = $db->prepare($query_string);	
		if ( $statement->execute($sql_data) ) {
			$response = $positive;
		} else {
			$response = $negative;
		}
	
	$id = $action == 'create' ? $db->lastInsertId() : $_id;
	$response.= " (ID = $id)";
}