<?php

/*
* @param $letter (in singular form).
* @param $value the quantity to check.
*/

function singularOrPlural ($letter, $value) {
	if ($value == 1) { // singular
	
		if ($letter == "a")
			return "a"; // La persona
		else
			return "o"; // Il cristiano
			
	} else { // plural
	
		if ($letter == "a")
			return "e"; // Le persone
		else
			return "i"; // I cristiani
	}
}