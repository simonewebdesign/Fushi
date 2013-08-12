<?php
include_once '../library/bootstrap.php';
header('Content-Type: text/html; charset=UTF-8');
?>
<!doctype html>


<?=CREDITS?>


<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="it"> <!--<![endif]-->
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?=empty($template['title']) ? '' : $template['title'] . ' | '?><?=$settings['site']['name']?></title>
  <meta name="description" content="<?=$template['metaDescription']?>">
  <meta name="keywords"	content="<?=$template['metaKeywords']?>">
  <meta name="author" content="<?=SITE_AUTHOR?>">
  <meta name="robots" content="<?=($template == 'backoffice') ? 'noindex,nofollow' : 'index,follow'?>">
  <meta name="viewport" content="width=device-width; "> <!-- user-scalable=0 -->
  <link rel="icon" type="image/png" href="<?=ROOT?>favicon.png">
  <?=$css?>
</head>
<body>

	<?php
	/* BEGIN DEBUG
	echo "<pre style='font-size:.7em;text-align:left;'>";
	echo "DEBUG:\n";
	echo '$_SESSION = '; 	var_dump($_SESSION);
	echo '$verbose = ';		var_dump($verbose);
	echo '$template_name = ';var_dump($template_name);
	echo '$table_name = ';var_dump($table_name);
	echo '$action = ';		var_dump($action);
	echo '$id = ';				var_dump($id);
	echo '$session = ';		var_dump($session);
	echo '$user = ';			var_dump($user);
	echo '$_GET = ';			var_dump($_GET);
	echo '$get = ';				var_dump($get);
	echo '$_POST = ';			var_dump($_POST);
	echo "</pre>";
	//* END DEBUG */
	?>


  <div id=wrapper>

	  <div id=header>
			<h1>
				<a href=<?=ROOT?>><?=$settings['site']['name']?></a>
			</h1>
	  </div>

	  <div id=navbar role=navigation>
			<?php include_once INC . 'menus/main.php' ?>
	  </div>

	  <div id=main class=clearfix>	
			<?php include_once "../application/templates/{$template['name']}.php" ?>
	  </div>

	  <div id=footer role=contentinfo>
			Copyleft &copy; <?=YEAR . ' ' . $settings['site']['name']?>. All rights reversed. 
			Tel: 123 4567890 - Fax: 123 4567890
	  </div>

	  <div id=outer-footer>
			<a href="https://github.com/simonewebdesign/Fushi">Powered by Fushi</a>
	  </div>

  </div>

  <!-- End of Content /// JavaScript Begin --->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

  <script>
	var ROOT = '<?=ROOT?>';
	var ABSOLUTE_ROOT = '<?=ABSOLUTE_ROOT?>';
  </script>

  <!-- <script src="<?=ROOT?>js/script.js"></script> -->

  <?php if ( $template['name'] == 'backoffice' ) { ?>
  <script src="<?=ROOT?>js/ajax.js"></script>
  <script src="<?=ROOT?>js/backoffice.js"></script>
  <?php } ?>

	<?php if ($settings['countdown']['is_active'] == "true") { ?>
	<script src="<?=ROOT?>js/countdown.js"></script>
	<script>
		jQuery(document).ready(function(){
			$('#countdown').countDown({
				targetDate: {
					'day': 		<?=$settings['countdown']['day']?>,
					'month': 	<?=$settings['countdown']['month']?>,
					'year': 	<?=$settings['countdown']['year']?>,
					'hour': 	<?=$settings['countdown']['hours']?>,
					'min': 		<?=$settings['countdown']['minutes']?>,
					'sec': 		<?=$settings['countdown']['seconds']?>
				}
			});
		});
	</script>
	<?php } ?>
	
  <script>
    var _gaq=[['_setAccount','<?=ANALYTICS_CODE?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

</body>
</html>