<h3>Gestione dei dati</h3>

<?php

$query = "SELECT
a.`_id` ID,
a.`title` titolo,
a.`body` corpo,
a.`is_published` pubblicato,
c.`name` categoria,
date_format(a.`created_at`, '".DATE_FORMAT_DATETIME."') creato_il,
date_format(a.`updated_at`, '".DATE_FORMAT_DATETIME."') aggiornato_il,
(a.`likes` - a.`hates`) piaciuto
FROM `articles` a LEFT JOIN `categories` c ON a.category_id = c._id
WHERE a.`is_deleted`=0";

include_once BO . 'search.php';

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

foreach ($table->rows as $row) {
	$row->pubblicato = $table->publish($row->pubblicato, $row->ID);
  $row->corpo = truncateLongText($row->corpo);
  $row->piaciuto .= ' volt' . singularOrPlural('a', $row->piaciuto);
  $row->aggiornato_il = ($row->aggiornato_il == '00/00/0000 00:00') ? 'mai' : $row->aggiornato_il;
	$row->categoria = empty($row->categoria) ? '<i style="color:#faa;">Nessuna</i>' : $row->categoria;
	
}

echo $table->table();

include_once BO . 'pagination.php';
include_once BO . 'search_form.php';