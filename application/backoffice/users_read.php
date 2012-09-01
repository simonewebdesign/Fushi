<h3>Gestione utenti</h3>

<?php

$query = "SELECT 
`_id` AS `ID`, 
`name` AS `nome`, 
`surname` AS `cognome`,
`email` AS `indirizzo_email`,
date_format(`registrationDate`, '". DATE_FORMAT_DATETIME ."') AS `data_di_registrazione`
FROM `users`
WHERE `isDeleted`=0 AND `_id`>0";

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name, $query);

echo $table->table();
include_once BO . 'pagination.php';