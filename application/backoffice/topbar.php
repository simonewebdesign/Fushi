<div id="topbar">

	<div id="topbar_favicon"></div>

	<div id="topbar_date"><?=ucfirst(utf8_encode(strftime(STRFTIME_DATETIME)))?></div>
	
	<div id="topbar_nav">

		<?php

		foreach ( $valid_table_names as $valid_table_name => $readable_table_name ) {
			echo '<a href="' . ROOT . 'backoffice/' . $valid_table_name . '"'; 
			
			if ( $table_name == $valid_table_name ) {
				echo ' class="current"';
			}
			
			echo '>' . $readable_table_name . '</a>';
		}
		?>
		
	</div>
	
	<div id="topbar_logout">Loggato come <b><?=$user->login?></b> <small>(<a href="<?=ROOT?>backoffice/logout">logout</a>)</small></div>

</div>