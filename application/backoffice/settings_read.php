<h3>Gestione delle impostazioni</h3>

<?php

include_once BO . 'table_settings_form.php';
$table = new Table($db, $table_name);
echo $table->table();
echo $table->paginate();