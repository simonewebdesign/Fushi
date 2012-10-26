<?php

/***** The Custom Boot *****/

$css .= add_css('classes/icons');
$css .= add_css('modules/login-form');


switch ($template['name']) {

	case 'contatti':
		$css .= add_css('modules/contact-form'); break;
			
	case 'backoffice':
		$css .= add_css('modules/topbar'); break;
	
	case 'accounts':
		$css .= add_css('modules/registration-form'); break;
	
	default:
		$css .= add_css('modules/countdown');

}


if ($template_name == 'accounts') {
	$account_action = isset($get[1]) ? $get[1] : false;
}