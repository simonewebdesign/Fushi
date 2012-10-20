<h2>Commenti</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi un nuovo commento a un articolo</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action	= $_POST['action'];
	$_id = isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$title 			= isset($_POST['title']) ? trim($_POST['title']) : '';
	$body 			= isset($_POST['body']) ? trim($_POST['body']) : '';	
	$is_published = (int) (isset($_POST['is_published']) ? 1 : 0);
	$category_id	= isset($_POST['category_id']) ? $_POST['category_id'] : 1;	

	// binding SQL data
	$sql_data = array(
		$_id,
		$title,
		$body,
		$is_published,
		$category_id,
		$user->_id,//author_id		
		date(MYSQL_DATETIME)//created_at
	);

	if ($action == 'create') {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (_id, title, body, is_published, category_id, author_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$positive = $create_positive;
		$negative = $create_negative;
		//unset($sql_data[0]);
	}
	else
	if ($action == 'update') {
		// UPDATE
		$sql_data[] = $_id;
		$query_string = "UPDATE `$table_name` SET _id=?, title=?, body=?, is_published=?, category_id=?, author_id=?, updated_at=? WHERE `_id`=?";
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