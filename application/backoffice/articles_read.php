<h3>Gestione dei dati</h3>

<?php

$query = "SELECT
`_id` ID,
`title` titolo,
`body` corpo,
`is_published` pubblicato,
date_format(`created_at`, '".DATE_FORMAT_DATETIME."') creato_il,
date_format(`updated_at`, '".DATE_FORMAT_DATETIME."') aggiornato_il,
SUM(`likes` + `hates`) piaciuto
FROM `articles`
WHERE `is_deleted`=0";

include_once BO . 'search.php';

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

foreach ($table->rows as $row) {
	$row->pubblicato = publish($row->pubblicato, $row->ID);
  $row->corpo = truncateLongText($row->corpo);
  $row->piaciuto .= ' volte';
  if ($row->aggiornato_il == '00/00/0000 00:00') $row->aggiornato_il = 'mai';
}

echo $table->table();

include_once BO . 'pagination.php';
include_once BO . 'search_form.php';