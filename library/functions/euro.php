<?php

function euro ( $number, $digits=0, $symbol='before' ) {
	
	$output = '';
	
	if ( $symbol == 'before' ) {
		$output.= '&euro; ';
	}

	$output.= number_format($number, $digits, ",", ".");
	
	if ( $symbol == 'after' ) {
		$output.= ' &euro;';
	}
	
	return $output;
}