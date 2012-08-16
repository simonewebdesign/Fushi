<?php

/* Production email settings
define('MAIL_FROM','test <info@.it>');
define('MAIL_TO','test <info@.it>');
define('MAIL_REPLY_TO','test <info@.it>');
//*/

//* Test email settings
define('MAIL_FROM','foo@bar.com');
define('MAIL_TO','hello@simonewebdesign.it');
define('MAIL_REPLY_TO','');
//*/

define('MAIL_HEADER_HTML', 	'From: ' . MAIL_FROM . '\r\n' . 
							'Reply-To: ' . MAIL_REPLY_TO . '\r\n' .
							'MIME-Version: 1.0' . '\r\n' .
							'Content-Type: text/html; charset=UTF-8' . '\r\n');