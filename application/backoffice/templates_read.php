<h3>Gestione dei template</h3> 

<?php

include_once BO . 'table_settings_form.php';
// 	function __construct ( $db, $table_name, $query='', $actions=array('update' => 'Modifica', 'delete' => 'Cancella') ) {
$table = new Table ($db, $table_name);
echo $table->table();
echo $table->paginate();