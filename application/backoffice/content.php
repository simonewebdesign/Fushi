<?php

if ( $user->isAdmin ) {
	//user has admin privileges
	$verbose[] = "(content.php) user n. {$user->_id} has admin privileges.";
	$verbose[] = "(content.php) showing backoffice's content...";
	
	include_once BO . 'topbar.php';
	
	/*** BEGIN BO's CONTENT ***/
	
		echo '<h1>';
			echo '<a href="' . ROOT . 'backoffice">' . $template['h1'] . '</a>';
		echo '</h1>';
		echo '<h2>' . $template['h2'] . '</h2>';
	
		if ( $table_name ) {
			
			if ( $table_name == 'logout' ) { 
				include_once BO . 'logout.php'; 
			}
			
			if ( file_exists( BO . $table_name . '.php' ) ) {
			
				include BO . $table_name . '.php';
				
				/* begin response */
				$html_response = '<div id="response"';
				
				$response = isset($response) ? $response : '';
				
				if ( !empty($response) ) {
				
					$positive = isset($positive) ? $positive : '';
					$negative = isset($negative) ? $negative : '';
					
					$html_response.= 'class="icon ' . $action;
					
					if ( $response == $positive ) {
						$html_response.= ' positive';
					} else
					if ( $response == $negative ) {
						$html_response.= ' negative';
					}
					$html_response.= '" style="display:block">' . $response;
					
					/* debug
					var_dump($response);
					var_dump($positive);
					var_dump($negative);
					//*/
					
				} else {
					$html_response.= '>';
				}
				$html_response.= '<div id="response-close">x</div>';
				$html_response.= '</div>';
				echo $html_response;
				/* end response */
				
				include BO . $table_name . '_read.php'; // based on CRUD: Read the database's table
				
			} else {
				$verbose[] = "(content.php) ERROR: file doesn't exist.";
				die('Dati non disponibili.');
			}
			
		} else { 
			include_once BO . 'main.php';
		}
	/*** END BO's CONTENT ***/
} else {
	//user does NOT have admin privileges
	$verbose[] = "(content.php) user doesn't have admin privileges.";
	$verbose[] = "(content.php) redirecting to home...";

	?>
	
	<p>Spiacente, non hai il permesso di visualizzare questa pagina.<br>Stai per essere reindirizzato alla home...</p>
	
	<script type="text/javascript">
	setTimeout("window.location = '<?=ROOT?>'", 5000);
	</script>
	
	<?php	
	
	die('<small><a href="'.ROOT.'">Clicca qui se non vuoi attendere oltre.</a></small>');
}