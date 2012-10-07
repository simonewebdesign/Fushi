<?php

/* printList() - developed by http://simonewebdesign.it
This functions transforms a tree-structured Array in a HTML list.

// USAGE EXAMPLE:

$menu = array(

	array( 'title' => 'home',
		   'child' => array()
		),

	array( 'title' => 'prodotti',
		   'child' => array()
		),

	array( 'title' => 'servizi',
		   'child' => array(
							array( 'title' => 'riparazione pc',
								   'child' => array(
												array( 'title' => 'pc nuovi',
													   'child' => array()
													),
												array( 'title' => 'pc usati',
													   'child' => array()
													),
												),
								),
							array( 'title' => 'vendita pc',
								   'child' => array(
												array( 'title' => 'pc nuovi',
													   'child' => array()
													),
												array( 'title' => 'pc usati',
													   'child' => array()
													),
												),
								),
							array( 'title' => 'assistenza a domicilio',
								   'child' => array(),
								),
						   ),
		),

	array( 'title' => 'contatti',
		   'child' => array()
		)
);

printList($menu); // prints an HTML list.

*/


function printList ($arrayOfItems) {
	echo "<ul>";
	foreach ($arrayOfItems as $item) {
		echo "<li>".$item['title']."</li>";
		if (!empty($item['child'])) {
			printList($item['child']);
		}
	}
	echo "</ul>";
}