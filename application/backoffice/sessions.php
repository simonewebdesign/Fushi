<h3>Ultimi utenti connessi</h3>

<?php
$table_name = 'sessions'; // needed because it isn't set in $get[1].

$query = "SELECT
u.`name` AS `nome`,
DATE_FORMAT(s.`entryDate`, '" . DATE_FORMAT_TIME . "') AS `collegato_dalle`,
s.`lastActivity` AS `ultimo_click`
FROM `sessions` AS s
INNER JOIN `users` AS u
ON u.`_id` = s.`user_id`
GROUP BY s.`sessionId`";
$actions = false;
$table = new Table($db, $table_name, $query, $actions);

foreach ($table->rows as $row) {
	$row->ultimo_click = getElapsedTime( time() -$row->ultimo_click);
	$row->ultimo_click = $row->ultimo_click ? : 'un attimo';
	$row->ultimo_click.= ' fa';
}

echo $table->table();
//echo $table->paginate();