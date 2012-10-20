<h3>Gestione dei dati</h3>

<?php

$query = "SELECT
`_id` `ID`,
`name` `nome`,
`price` `prezzo`,
date_format(`created_at`, '". DATE_FORMAT_DATETIME ."') `data_di_creazione`,
`is_published` `pubblicato`
FROM `fruits`
WHERE `is_deleted`=0";

include_once BO . 'search.php';

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

foreach ($table->rows as $row) {
	$row->prezzo = euro($row->prezzo, 2);
	$row->pubblicato = $table->publish($row->pubblicato, $row->ID);
}

echo $table->table();

include_once BO . 'pagination.php';
include_once BO . 'search_form.php';