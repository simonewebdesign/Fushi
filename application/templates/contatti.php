<!-- PHP Template name: contatti -->

<div class="container-fluid">

  <div class="page-header">
  <h1><?=$template['h1']?> <small><?=$template['h2']?></small></h1>
  </div>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <?php include_once INC . 'navbar.php' ?>
  </div>

	<?php include_once INC . 'forms/contact.php' ?>  
  <hr>
  
  <footer>
    <p>Copyleft &copy; <?=YEAR?> <?=$settings['site']['name']?>. All rights reversed.</p>
  </footer>
  
</div>