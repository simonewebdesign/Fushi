<h2>Utenti</h2>

<a class="action create" href="<?=ROOT?>backoffice/<?=$table_name?>/create">Aggiungi nuovo utente</a>

<?php

if ( isset($_POST['submit']) ) {

	// hidden fields
	$action			= $_POST['action'];
	$_id 			= isset($_POST['id']) ? $_POST['id'] : 0;

	// fields
	$name 			= isset($_POST['name']) ? trim($_POST['name']) : '';
	$surname 		= isset($_POST['surname']) ? trim($_POST['surname']) : '';
	$email 			= isset($_POST['email']) ? trim($_POST['email']) : '';
	$birthDate 		= isset($_POST['birthDate']) ? trim($_POST['birthDate']) : '';
	$address 		= isset($_POST['address']) ? trim($_POST['address']) : '';
	$cap 			= isset($_POST['cap']) ? trim($_POST['cap']) : '';
	$city 			= isset($_POST['city']) ? trim($_POST['city']) : '';

	// binding SQL data
	$sql_data = array(
		'_id'			=> $_id,
		'name'			=> $name,
		'surname'		=> $surname,
		'email'			=> $email,
		'birthDate'		=> $birthDate,
		'address'		=> $address,
		'cap'			=> $cap,
		'city'			=> $city
	);

	if ( $action == 'create' ) {
		// INSERT
		$query_string = "INSERT INTO `$table_name` (`name`, `surname`, `email`, `birthDate`, `address`, `cap`, `city`, `registrationDate`) VALUES (:name, :surname, :email, :birthDate, :address, :cap, :city, NOW())";
		$positive = $create_positive;
		$negative = $create_negative;
		unset($sql_data['_id']);
	} else
	if ( $action == 'update' ) {
		// UPDATE
		$query_string = "UPDATE `$table_name` SET `name`=:name, `surname`=:surname, `email`=:email, `birthDate`=:birthDate, `address`=:address, `cap`=:cap, `city`=:city WHERE `_id`=:_id";
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
	//$id = $action == 'create' ? $db->lastInsertId() : $_id;
	//$response.= " (ID = $id)";
}