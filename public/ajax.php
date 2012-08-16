<?php

/* Da qui passano tutte le richieste ajax. 
Questa pagina serve solamente ad includere la pagina appropriata a seconda di quale richiesta ajax è stata effettuata.
Ci penserà la pagina inclusa a gestire la richiesta, pertanto non c'è bisogno di usare db o altro: il bootstrap qui non è necessario.
*/

include '../config/paths.php';

// get url from $_POST
$href = isset($_POST['url']) ? $_POST['url'] : false;

if ($href) {
	/* debug *
	echo "the url from _POST: "; var_dump($href);
	//*/
	
	/* removing ROOT from $href, just to avoid issues while in environments different than localhost. */
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
			include "../application/" . $template_name . "/" . $table_name . "_" . $action . ".php";
		} else {
			include "../application/" . $template_name . "/" . $table_name . ".php";
		}
	}
}