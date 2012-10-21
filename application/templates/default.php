<!-- default template -->

<div id=left-column class=left>
	<p>Questo è un paragrafo d'esempio. Lorem ipsum dolor sit amet, consecutetur adipiscing elit.</p>
	<?php include_once INC . 'modules/login.php' ?>
	<p>Questo è un paragrafo d'esempio. Lorem ipsum dolor sit amet, consecutetur adipiscing elit.</p>		
</div>
<div id=middle-column class=left role=main>
			<?php
			//* BEGIN DEBUG
			echo "<pre style='font-size:.7em;text-align:left;'>";
			echo "DEBUG:\n";
			//echo '$_SESSION = '; 	var_dump($_SESSION);
			echo '$verbose = ';		var_dump($verbose);
			//echo '$template_name = ';var_dump($template_name);
			//echo '$table_name = ';var_dump($table_name);
			//echo '$action = ';		var_dump($action);
			//echo '$id = ';				var_dump($id);
			echo '$session = ';		var_dump($session);
			echo '$user = ';			var_dump($user);
			//echo '$_GET = ';			var_dump($_GET);
			//echo '$get = ';				var_dump($get);
			echo '$_POST = ';			var_dump($_POST);
			echo "</pre>";
			//* END DEBUG */
			?>	
	<h1><?=$template['h1']?></h1>
	<h2><?=$template['h2']?></h2>
  <p>And this is just a paragraph.</p>

</div>
<div id=right-column class=left>right-column content.</div>