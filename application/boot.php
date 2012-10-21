<?php

/***** The Custom Boot *****/

$css .= add_css('modules/login-form');

if ($template['name'] == 'contatti') {
	$css .= add_css('modules/contact-form');
}