<?php

// Credits: http://cubiq.org/the-perfect-php-clean-url-generator

/*
@param $str the string to convert
@param $replace an array or a single character to be replaced in $str with a white space
@param $delimiter the character to use for delimiting words
*/

// 22/10/2012 FUNCTION RENAMED TO slug(). Was: toAscii()

//setlocale(LC_ALL, 'en_US.UTF8');

function slug ($str, $replace=array("'"), $delimiter='-') {

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

echo slug("Mess'd up --text-- just (to) stress /test/ ?our! `little` \\clean\\ url fun.ction!?-->");
echo "<br>";
echo "expected:<br> messd-up-text-just-to-stress-test-our-little-clean-url-function<br><br>";

echo slug("Perché l'erba è verde?"); // Italian
echo "<br>";
echo "expected:<br> perche-l-erba-e-verde<br><br>";

echo slug("Peux-tu m'aider s'il te plaît?", "'"); // French
echo "<br>";
echo "expected:<br> peux-tu-m-aider-s-il-te-plait<br><br>";

echo slug("Tänk efter nu – förr'n vi föser dig bort"); // Swedish
echo "<br>";
echo "expected:<br> tank-efter-nu-forrn-vi-foser-dig-bort<br><br>";

echo slug("ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöùúûüýÿ");
echo "<br>";
echo "expected:<br> aaaaaaaeceeeeiiiidnooooouuuuyssaaaaaaaeceeeeiiiidnooooouuuuyy<br><br>";

echo slug("Custom`delimiter*example", array('*', '`'));
echo "<br>";
echo "expected:<br> custom-delimiter-example<br><br>";

echo slug("My+Last_Crazy|delimiter/example", '', ' ');
echo "<br>";
echo "expected:<br> my last crazy delimiter example<br><br>";

echo slug("Perché non provi l'mi novo caffe'?LOL-.***asd@#[]#@:_°ç^?=''\'");
echo "<br>";
echo "perche-non-provi-l-mi-novo-caffe-lol-asd-0<br><br>";

//*/