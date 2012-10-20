<h3>Gestione delle impostazioni</h3>

<?php

$query = "SELECT
_id ID,
`name` nome,
`value` valore,
`group` gruppo
FROM settings
WHERE is_deleted=0";

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);
echo $table->table();
include_once BO . 'pagination.php';