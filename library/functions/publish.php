<?php
function publish ($table_name, $bool, $row_id) {
	$html = '<a class="action ';
	$html.= $bool ? 'true' : 'false';
	$html.= '" ';
	$html.= 'href="' . ROOT . 'backoffice/' . $table_name . '/publish/' . $row_id . '/';
	$html.= $bool ? 0 : 1;
	$html.= '">';
	$html.= $bool ? 'Sì' : 'No';
	$html.= '</a>';
	return $html;
}