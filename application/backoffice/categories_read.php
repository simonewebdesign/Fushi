<h3>Gestione dei dati</h3>

<?php

$query = "SELECT c._id `ID`, c.name nome, c.is_published pubblicata, COUNT( a._id ) articoli
FROM categories c
LEFT JOIN articles a ON c._id = a.category_id 
WHERE c.`is_deleted`=0
GROUP BY c._id";

include_once BO . 'search.php';

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

foreach ($table->rows as $row) {
	$row->pubblicata = $table->publish($row->pubblicata, $row->ID);
}

echo $table->table();

include_once BO . 'pagination.php';
include_once BO . 'search_form.php';