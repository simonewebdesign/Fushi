<?php 

include_once LIB . 'get_user_by_session_id.php';

if ($user) { // logged in
	
	
	// do some stuff if page...
	if ($template_name == 'backoffice') {
		include_once BO . 'content.php';
	} else {
?>  
      <p class="navbar-text pull-right">
        Logged in as <a href="<?=ROOT . "users/{$user->_id}/{$user->login}"?>" class="navbar-link"><?=$user->login?></a>
      </p>
<?php
	}
	
	
} else { // not logged in

	include_once INC . 'forms/login.php';
}