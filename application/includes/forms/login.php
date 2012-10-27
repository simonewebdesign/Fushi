<form id=login-form method=POST class="navbar-form pull-right">
	<fieldset>
    <input id=username class=span2 name=username type=text maxlength=30 placeholder=Username required>
    <input id=password class=span2 name=password type=password maxlength=30 placeholder=Password required>
    <button class=btn name=login type=submit>Log In</button>
	</fieldset>
</form>

<?php if ( !empty($login_error) ) { ?>
	<p class="icon error login"><?=$login_error?></p>
<?php } ?>