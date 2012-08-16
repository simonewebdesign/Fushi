<?php

/* Show PHP informations
phpinfo();
//*/

/*
* Uncomment the following rules while in PRODUCTION environment. 
* This usually isn't needed since  * there are php_flags in .htaccess. Also check if your hosting service allows php.ini editing.
*/

/*
error_reporting(0);
ini_set('display_errors','Off');
ini_set('magic_quotes_gpc','Off');
//*/

setlocale(LC_ALL, "", "it", "it_IT", "IT", "it-IT", "IT.UTF-8", "it_IT.UTF-8", "IT.UTF8", "it_IT.UTF8");


/* LIBRARY
* Including all constants, classes and functions. 
* I can't include variables: they won't be available since scope is restricted inside the function.
*/
function include_folder ($folder) {
	$files = scandir($folder);
	foreach ( $files as $file ) {
		if ( is_file($folder.$file) ) {
			include_once ($folder.$file);
		}
	}
	return false;
}

$library = array(
	'../config/',
	'../library/classes/',
	'../library/functions/'
);
foreach ( $library as $folder ) {
	include_folder($folder);
}


/* DB */
include_once LIB . 'db.php';

/* SETTINGS */
include_once LIB . 'settings.php';

/* SESSION */
include_once LIB . 'session.php';


/* TRE - TEMPLATE RENDERING ENGINE */

$get = array();
// sanitizing HTTP GET variables
foreach ( $_GET as $g ) {
	$g = trim($g);
	$g = preg_match(REGEX_ALPHANUMERIC_WITH_HYPHENS_AND_UNDERSCORES, $g) ? strtolower($g) : false;
	$get[] = $g;
}

$template_name = isset($get[0]) ? $get[0] : false;

if ( $template_name ) {
	// fetching templates looking for the current one
	$templates_db = $db->query("SELECT * FROM templates");
	$found = false;
	
	while ( !$found && ( $template = $templates_db->fetch(PDO::FETCH_ASSOC) ) ) {
		
		if ( $template_name == $template['name'] ) {
			// FOUND!
			$found = true;
		}
	}
	
	if ( !$found || $template_name == 'default') {
		$verbose[] = "Template not found: $template_name";
		$verbose[] = "Sending header Status: 404 Not Found...";		
		header('HTTP/1.1 404 Not Found');
		$verbose[] = "Header sent.";
		$verbose[] = "Serving 404 error page...";
		include_once('static/errordocs/404.php');
		$verbose[] = "die.";
		die;
	}
	
} else {
	// loading the default template. It's the first one in db
	$template_db = $db->query("SELECT * FROM templates WHERE _id = 1 LIMIT 1");
	
	if ( $template_db->rowCount() > 0 ) {
		$template = $template_db->fetch(PDO::FETCH_ASSOC);
	}else{
		die('FATAL ERROR: Default template record not found in database.');
	}
}



/* CSS */
$css = '';
$stylesheets = array(
	'style', 						 // global CSS
//	'helpers', 						 // custom helpers
	'templates/' . $template['name'] // current template's CSS
);
foreach ($stylesheets as $stylesheet) {
	$css.= '<link rel="stylesheet" href="' . ROOT . 'css/' . $stylesheet . '.css" media="screen">';
}
/* other custom stylesheets must be included inside the custom boot.php


/* CUSTOM BOOT */
include_once '../application/boot.php';




/********* DEBUG ********/

/*
echo "<pre>";
//*/


/* SESSION debug
print_r($session);
//*/


/* VERBOSE debug (put it where you want)
foreach ($verbose as $v) {
	$verbose_content.= $v . "\n";
	file_put_contents('../tmp/logs/verbose.txt', $verbose_content);
}
//*/