<!-- PHP Template name: users -->

<div class="container-fluid">

  <div class="navbar navbar-inverse navbar-fixed-top">
    <?php include_once INC . 'navbar.php' ?>
  </div>

  <div class="page-header">
    <h1><?=$template['h1']?> <small><?=$template['h2']?></small></h1>
  </div>
  
  
	<?php 
	if (isset($user_action)) {
		include_once APP . "users/{$user_action}.php";
	}
	?>
  
  <hr>
  
  <footer>
    <p>Copyleft &copy; <?=YEAR?> <?=$settings['site']['name']?>. All rights reversed.</p>
  </footer>

</div>