<?php 

// I assume $user was already found from db (lookup by session_id)

if ($user) { // logged in
	
?>
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

} else { // not logged in

  include_once INC . 'forms/login.php';
  
}