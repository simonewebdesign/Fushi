<h3>Gestione utenti</h3>

<?php

$query = "SELECT
_id ID,
login,
name nome,
surname cognome,
email,
city provenienza,
is_admin amministratore,
date_format(`created_at`, '". DATE_FORMAT_DATETIME ."') registrato_il
FROM users
WHERE `is_deleted`=0 AND `_id`>0";

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

echo $table->table();
include_once BO . 'pagination.php';