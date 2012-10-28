<?php

$menu = array(
	'' 						=> 'Home',
	'news'				=> 'News',
	'chi-siamo'  	=> 'Chi Siamo',
	'dove-siamo' 	=> 'Dove Siamo',
	'prodotti' 		=> 'Prodotti',
	'servizi' 		=> 'Servizi',
	'contatti' 		=> 'Contatti',
	'users/register' => 'Sign Up'
);

echo '<ul class="nav">';

foreach ( $menu as $menu_slug => $menu_entry ) {

	$active = $menu_slug == $template_name ?: false;

  echo $active ? '<li class="active">' : '<li>';
	if ($active) { $menu_slug .= '#'; }
	echo '<a href="' . ROOT . $menu_slug . '"';
  echo empty($menu_slug) ? ' ' : ''; // class="icon-home icon-white"
  echo '>' . $menu_entry . '</a>';
	echo "</li>";
}
echo '</ul>';