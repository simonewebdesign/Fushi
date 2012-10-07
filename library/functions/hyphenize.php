<?php

/* Author: Simone Vittori - http://simonewebdesign.it
Reference (unsafe characters): http://blooberry.com/indexdot/html/topics/urlencoding.htm
Last update: 2 April 2012
*/

function hyphenize ($str) {
	$result = trim($str);
	$result = strtolower($result);

	/* Reserved characters
		Dollar ("$")
		Ampersand ("&")
		Plus ("+")
		Comma (",")
		Forward slash/Virgule ("/")
		Colon (":")
		Semi-colon (";")
		Equals ("=")
		Question mark ("?")
		'At' symbol ("@")
	*/
	$result = str_replace("$","", $result);
	$result = str_replace("&","", $result);
	$result = str_replace("+","", $result);
	$result = str_replace(",","", $result);
	$result = str_replace("/","", $result);
	$result = str_replace(":","", $result);
	$result = str_replace(";","", $result);
	$result = str_replace("=","", $result);
	$result = str_replace("?","", $result);
	$result = str_replace("@","", $result);

	/* Unsafe characters
		Space
		Quotation marks
		'Less Than' symbol ("<")
		'Greater Than' symbol (">")
		'Pound' character ("#")
		Percent character ("%")
	*/
	$result = str_replace("'","",$result);
	$result = str_replace('"',"", $result);
	$result = str_replace("<","", $result);
	$result = str_replace(">","", $result);
	$result = str_replace("#","", $result);
	$result = str_replace("%","", $result);

	/* Miscellaneous characters */
	$result = str_replace("à","a",$result);
	$result = str_replace("è","e",$result);
	$result = str_replace("é","e",$result);
	$result = str_replace("ì","i",$result);
	$result = str_replace("ò","o",$result);
	$result = str_replace("ù","u",$result);
	$result = str_replace(".","", $result);
	$result = str_replace("!","", $result);
	$result = str_replace("(","", $result);
	$result = str_replace(")","", $result);
	$result = str_replace("[","", $result);
	$result = str_replace("]","", $result);
	$result = str_replace("{","", $result);
	$result = str_replace("}","", $result);
	$result = str_replace("|","", $result);
	$result = str_replace("\\","",$result);
	$result = str_replace("^","", $result);
	$result = str_replace("~","", $result);
	$result = str_replace("`","", $result);

	/* final */
	$result = str_replace("-","",$result);
	$result = str_replace("   ","-",$result);	// three consecutive spaces
	$result = str_replace("  ","-",$result);	// two consecutive spaces
	$result = str_replace(" ","-",$result);

	return $result;
}