<?php 

include_once LIB . 'get_user_by_session_id.php';

if ($user) { // logged in
	
	// do some stuff if page...
	//if ($template_name == 'backoffice') {
	//	include_once BO . 'content.php';
	//} else {
?>  
    <!--  <p class="navbar-text pull-right">
        Logged in as <a href="<?=ROOT . "users/{$user->_id}/{$user->login}"?>" class="navbar-link"><?=$user->login?></a>
      </p>
      -->
    <div class="btn-group pull-right">
      <a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i> <?=$user->login?></a>
      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li>
          <a href="#"><i class="icon-pencil"></i> Edit</a>
        </li>
        <li>
          <a href="#"><i class="icon-trash"></i> Delete</a>
        </li>
        <li>
          <a href="#"><i class="icon-ban-circle"></i> Ban</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="#"><i class="i"></i> Make admin</a>
        </li>
      </ul>
    </div>      
      
<?php
	//}
	
	
} else { // not logged in

	include_once INC . 'forms/login.php';
}