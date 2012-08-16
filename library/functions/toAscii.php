<?php

// Credits: http://cubiq.org/the-perfect-php-clean-url-generator

/*
@param $str the string to convert
@param $replace an array or a single character to be replaced in $str with a white space
@param $delimiter the character to use for delimiting words
*/

//setlocale(LC_ALL, 'en_US.UTF8');

function toAscii ($str, $replace=array("'"), $delimiter='-') {

	if ( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	while ( endsWith($clean, '-') ) {
		$clean = substr($clean, 0, -1);
	}	
	
	return $clean;
}


/* EXAMPLES:

echo toAscii("Mess'd up --text-- just (to) stress /test/ ?our! `little` \\clean\\ url fun.ction!?-->");
echo "returns: messd-up-text-just-to-stress-test-our-little-clean-url-function";

echo toAscii("Perché l'erba è verde?"); // Italian
echo "returns: perche-l-erba-e-verde";

echo toAscii("Peux-tu m'aider s'il te plaît?", "'"); // French
echo "returns: peux-tu-m-aider-s-il-te-plait";

echo toAscii("Tänk efter nu – förr'n vi föser dig bort"); // Swedish
echo "returns: tank-efter-nu-forrn-vi-foser-dig-bort";

echo toAscii("ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöùúûüýÿ");
echo "returns: aaaaaaaeceeeeiiiidnooooouuuuyssaaaaaaaeceeeeiiiidnooooouuuuyy";

echo toAscii("Custom`delimiter*example", array('*', '`'));
echo "returns: custom-delimiter-example";

echo toAscii("My+Last_Crazy|delimiter/example", '', ' ');
echo "returns: my last crazy delimiter example";

echo toAscii("Perché non provi l'mi novo caffe'?LOL-.***asd@#[]#@:_°ç^?=''\'");
echo "returns: my last crazy delimiter example";

//*/