<h3>Inserimento, modifica e cancellazione attributi</h3>

<?php

include_once BO . 'table_settings_form.php';
$actions = array('update' => 'Modifica nome attributo',
			     'delete' => 'Elimina');
$table = new Table($db, $table_name, false, $actions);

echo $table->table();
include_once BO . 'pagination.php';