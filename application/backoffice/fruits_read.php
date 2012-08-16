<h3>Gestione dei dati</h3>

<?php

$query = "SELECT 
`_id` AS `ID`, 
`name` AS `nome`, 
`price` AS `prezzo`, 
date_format(`creationDate`, '". DATE_FORMAT_DATETIME ."') AS `data_di_creazione`, 
`isPublished` AS `pubblicato`
FROM `fruits`
WHERE `isDeleted`=0";

include_once BO . 'search.php';

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

foreach ($table->rows as $row) {
	$row->prezzo = euro($row->prezzo, 2);
	$row->pubblicato = publish($row->pubblicato, $row->ID);
}

echo $table->table();
echo $table->paginate();

include_once BO . 'search_form.php';