<?php

try {
	$db = new PDO ( "mysql:host=" . HOSTNAME . ";dbname=" . DBNAME, USERNAME, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") ); // This is the right way to force mysql PDO driver to use UTF-8 for the connection: pass this as last parameter when building PDO.
} catch ( PDOException $e ) {
	die( "Database non raggiungibile: per favore riprovare più tardi. Messaggio di errore: ".$e->getMessage() );
}