<?php

/***** The Custom Boot *****/

$css .= add_css('classes/icons');
$css .= add_css('modules/login-form');


switch ($template['name']) {

	case 'contatti':
		$css .= add_css('modules/contact-form');
		break;
			
	case 'backoffice':
		$css .= add_css('modules/topbar');
		break;
			
	default:
		;

}