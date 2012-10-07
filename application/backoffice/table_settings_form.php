<?php
if ( isset($_POST['rows_per_page']) ) { // isset($_POST['update_table']); this won't work because if I submit the form with javascript, <the input type="submit"> will be empty.
	$_SESSION['page'] = 1;
	$_SESSION['rows_per_page'] = (int) $_POST['rows_per_page'];
}
?>

<form id=table_settings method=POST>

	<fieldset>
		<select id=rows_per_page name=rows_per_page>
			<?php

			$rows_per_page_values = array(10,20,50,100);

			foreach ($rows_per_page_values as $rows_per_page_value) {

				echo '<option value='.$rows_per_page_value;

				if ( isset($_SESSION['rows_per_page']) ) {
					if ( $rows_per_page_value == $_SESSION['rows_per_page'] ) {
						echo ' selected';
					}
				}
				echo '>'.$rows_per_page_value.'</option>';

			}
			?>
		</select>
		<label for=rows_per_page>Elementi per pagina</label>

		<input type=submit name=update_table value=Aggiorna>

	</fieldset>

</form>