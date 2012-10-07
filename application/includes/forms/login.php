<form id=login-form method=POST>

	<fieldset>

		<p>
			<label for=username>Username</label>
			<input id=username name=username type=text maxlength=30 required>
		</p>

		<p>
			<label for=password>Password</label>
			<input id=password name=password type=password maxlength=30 required>
		</p>

		<input name=login type=submit value=Login>

	</fieldset>

</form>

<?php if ( !empty($login_error) ) { ?>
	<p class="icon error login"><?=$login_error?></p>
<?php } ?>