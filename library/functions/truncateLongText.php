<?php
// Original PHP code by Chirp Internet: www.chirp.com.au
// Please acknowledge use of this code by including this header.
function truncateLongText ($string, $limit, $break=".", $pad="...") {
	// return with no change if string is shorter than $limit
	$string = strip_tags($string, '<b><i><u><a><s><br><strong><em>');
	
	if(strlen($string) <= $limit)
		return $string;
	// is $break present between $limit and the end of the string? 
	if ( false !== ($breakpoint = strpos($string, $break, $limit)) ) {
		if($breakpoint < strlen($string) - 1) {
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	}
	return $string;
}