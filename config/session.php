<?php

define('SESSION_NAME',		'fushi_sessid'); // The name of the session cookie.
define('SESSION_LIFETIME',	0); 	// Lifetime of the session cookie, defined in seconds.
define('SESSION_PATH',		'/');	// Path on the domain where the cookie will work. Use a single slash ('/') for all paths on the domain.
define('SESSION_DOMAIN',	false); // Cookie domain, for example 'www.php.net'. To make cookies visible on all subdomains then the domain must be prefixed with a dot like '.php.net'. 
define('SESSION_SECURE',	false); // If TRUE cookie will only be sent over secure connections. 
define('SESSION_HTTPONLY',	true);	// If set to TRUE then PHP will attempt to send the httponly flag when setting the session cookie.

define('IP_ADDRESS',	$_SERVER['REMOTE_ADDR']);
define('USER_AGENT',	$_SERVER['HTTP_USER_AGENT']);