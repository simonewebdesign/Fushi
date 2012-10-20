<h2>Utenti</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi nuovo utente</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action			= $_POST['action'];
	$_id 			= isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$login			= isset($_POST['login']) ? trim($_POST['login']) : '';
	$name 			= isset($_POST['name']) ? trim($_POST['name']) : '';
	$surname 		= isset($_POST['surname']) ? trim($_POST['surname']) : '';
	$email 			= isset($_POST['email']) ? trim($_POST['email']) : '';
	$address 		= isset($_POST['address']) ? trim($_POST['address']) : '';
	$cap 				= isset($_POST['cap']) ? trim($_POST['cap']) : '';
	$city 			= isset($_POST['city']) ? trim($_POST['city']) : '';
	$bio 				= isset($_POST['bio']) ? trim($_POST['bio']) : '';
	$is_admin 	= (int) (isset($_POST['is_admin']) ? 1 : 0);
	$birthday 	= isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
	$password 	= isset($_POST['password']) ? trim($_POST['password']) : '';

	
	// binding SQL data
	$sql_data = array(
		$login,
		$name,
		$surname,
		$email,
		$address,
		$cap,
		$city,
		$bio,
		$is_admin,
		$birthday,
		date(MYSQL_DATETIME)
	);

	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (
		login,
		name,
		surname,
		email,
		address,
		cap,
		city,
		bio,
		is_admin,
		birthday,
		created_at
		) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$positive = $create_positive;
		$negative = $create_negative;

	} else
	if ( $action == 'update' ) {
		// UPDATE
		$query_string = "UPDATE `$table_name` SET
		login=?,
		name=?,
		surname=?,
		email=?,
		address=?,
		cap=?,
		city=?,
		bio=?,
		is_admin=?,
		birthday=?,
		created_at=?
		WHERE `_id`=?";
		$sql_data[] = $_id;
		
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
	
	if ( !empty($password) ) {
		$query_string = "UPDATE `$table_name` SET `password`=PASSWORD(?) WHERE _id=?";
		$sql_data = array($password, $id);
		$statement = $db->prepare($query_string);
		if ( $statement->execute($sql_data) ) {
			echo "Password modificata con successo per l'utente con ID=$id."; 
		} else {
			echo "ERRORE durante la modifica della password per l'utente con ID=$id.";
		}
	}
}