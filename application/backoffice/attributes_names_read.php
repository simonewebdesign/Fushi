<h3>Inserimento, modifica e cancellazione attributi</h3>

<?php


$query = "SELECT _id ID, name nome_attributo FROM $table_name WHERE is_deleted=0";

include_once BO . 'table_settings_form.php';
$actions = array('update' => 'Modifica nome attributo',
			     'delete' => 'Elimina');
$table = new Table($db, $table_name, $query, $actions);

echo $table->table();
include_once BO . 'pagination.php';