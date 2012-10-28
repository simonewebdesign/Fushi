<?php

/***** The Custom Boot *****/

$css = add_css('bootstrap');
$css .= add_css('bootstrap-responsive');
$css .= add_css("templates/{$template['name']}");

$css .= add_css('classes/icons');
$css .= add_css('modules/login-form');


switch ($template['name']) {

	case 'contatti':
		$css .= add_css('modules/contact-form'); break;
			
	case 'backoffice':
		$css .= add_css('modules/topbar'); break;
	
	case 'users':
		$css .= add_css('modules/registration-form'); break;
	
	default:
		$css .= add_css('modules/countdown');

}


if ($template_name == 'users') {
	$account_action = isset($get[1]) ? $get[1] : false;
}