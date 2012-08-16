<?php

// Credits: http://www.kavoir.com/2011/04/php-class-converting-plural-to-singular-or-vice-versa-in-english.html

/* Function edited by Simone Vittori
** www.simonewebdesign.it
** Last modify: 08/03/2012 (ripristinated)
************************************/

/**
* Returns a human-readable string from $word
*
* Returns a human-readable string from $word, by replacing
* underscores with a space, and by upper-casing the initial
* character by default.
*
* If you need to uppercase all the words you just have to
* pass 'all' as a second parameter.
*
* You can change the character to substitute by just declaring
* it as third parameter.
*
* @access public
* @static
* @param    string    $word    String to "humanize".
* @param    string    $uppercase    If set to 'all' it will uppercase all the words
* instead of just the first one.
* @param	string	  $char	   Character to replace with a space. By default it is an underscore (_).
* @return string Human-readable word
*/
function humanize ($word, $uppercase = '', $char = '_') {
	$uppercase = $uppercase == 'all' ? 'ucwords' : 'ucfirst';
	return $uppercase(str_replace($char,' ',preg_replace('/_id$/', '',$word)));
}