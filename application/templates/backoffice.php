<?php

/*** BACKOFFICE's BOOT ***/

error_reporting(1);
ini_set('display_errors', 'On');


/* Write here the tables you want to DISPLAY to the user in backoffice.
Even if you don't write a table here below, it will always be accessible by URL
if you know the table name. */
$valid_table_names = array(
  'fruits'		          => 'Frutti',
  'attributes_names'    => 'Attributi',
  'attributes_values'   => 'Valori',
  'articles'            => 'Articoli',
  'categories'          => 'Categorie',
  'comments'            => 'Commenti',
//* You may want to hide the following tables to final users.
  'settings' 		        => 'Impostazioni',
  'templates' 	        => 'Template',
  'users'			          => 'Utenti');
//*/


$table_name = isset($get[1]) ? $get[1] : false;

// $action can also be the current page.
$action	= isset($get[2]) ? $get[2] : false;
if  ( is_numeric($action) && $action > 0 ) { // page is set in url
	$_SESSION['page']	= (int) $action;
	//unset ( $action );
	$action = false;
} else { // action is set in url

	$_SESSION['page'] = 1; // default page.

	if ($action == 'order') {

		$order_by = isset($get[3]) ? $get[3] : false;
		if ($order_by) {
			$_SESSION['order_by'] = $order_by;

			$order_type = isset($get[4]) ? $get[4] : false;
			if ( $order_type ) {
				$valid_order_types = array('asc','desc');
				if ( in_array($order_type, $valid_order_types) ) {
					$_SESSION['order_type'] = $order_type;
				}
			}
		}
	}
}


/* Begin default #response messages */
$create_positive = "Inserimento avvenuto con successo.";
$create_negative = "Errore: inserimento fallito. Riprovare.";
$update_positive = "Aggiornamento avvenuto con successo.";
$update_negative = "Errore: aggiornamento fallito. Riprovare.";
//$delete_positive = "Eliminazione eseguita correttamente.";
//$delete_negative = "Errore: eliminazione fallita. Riprovare.";
/* End default #response messages */


/* Begin Backoffice Session handling */
include_once APP . 'get_user_by_session_id.php';

if ($user) {
	// user is LOGGED
	$verbose[] = "(backoffice.php) user n. {$user->_id} is logged.";
	include_once BO . 'content.php';

} else {
	// user is NOT LOGGED
	include_once APP . 'post_login.php';
}
/* End Backoffice Session handling */