<?php

/* Da qui passano tutte le richieste Ajax.
Questa pagina serve solamente ad includere la pagina appropriata a seconda di quale richiesta ajax è stata effettuata.
Ci penserà la pagina inclusa a gestire la richiesta, pertanto non c'è bisogno di usare db o altro: il bootstrap qui non è necessario.
*/

include '../config/paths.php'; // i percorsi sono ora disponibili in tutte le pagine iniettate via Ajax.

// get url from $_POST
$href = isset($_POST['url']) ? $_POST['url'] : false;

if ($href) {
	/* debug *
	echo "the url from _POST: "; var_dump($href);
	//*/

	/* removing ROOT from $href, just to avoid issues while in environments different than 127.0.0.1 */
	$replacement = '';
	$start = 0;
	$length = strlen(ROOT);
	$href = substr_replace( $href, $replacement, $start, $length);
	$params = explode('/', $href);
	list($template_name, $table_name, $action) = $params; // template_name, table_name, action
	$id = isset($params[3]) ? $params[3] : 0;
}

if ( $template_name ) {
	if ( $table_name ) {
		if ( $action ) {
			if ( $action == 'publish' || $action == 'delete' ) {
				include "../application/$template_name/$action.php";
				
			} else if ( $action == 'create' || $action == 'update' ) {
				include "../application/$template_name/$table_name"."_form.php";
				
			} else {
				include "../application/$template_name/$table_name"."_$action.php";
			}

		} else {
			include "../application/$template_name/$table_name.php";
		}
	}
}