<?php

$menu = array(
	'' 						=> 'Home',
	'news'				=> 'News',
	'chi-siamo'  	=> 'Chi Siamo',
	'dove-siamo' 	=> 'Dove Siamo',
	'prodotti' 		=> 'Prodotti',
	'servizi' 		=> 'Servizi',
	'contatti' 		=> 'Contatti'
);

echo "<ul class=clearfix>";

foreach ( $menu as $menu_slug => $menu_entry ) {

	$current = $menu_slug == $template_name ?: false;

	echo "<li>";
		if ($current) { $menu_slug.= '#'; }
		echo '<a href="' . ROOT . $menu_slug . '"';
		if ($current) { echo ' class=current'; }
		echo '>' . $menu_entry . '</a>';
	echo "</li>";
}
echo "</ul>";