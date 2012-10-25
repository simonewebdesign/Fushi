<form id=registration-form method=POST>

	<fieldset>

		<p>
			<label for=username>Username</label>
			<input id=username name=username type=text pattern="[A-Za-z0-9]{3,16}" title="3 to 16 characters, only letters and/or numbers" maxlength=16 required>
		</p>

		<p>
			<label for=email>Email</label>
			<input id=email name=email type=email required>
		</p>		
		
		<p>
			<label for=password>Password</label>
			<input id=password name=password type=password pattern=".{6,20}" title="6 to 20 characters" maxlength=20 required>
		</p>

		<p>
			<label for=password2>Retype Password</label>
			<input id=password2 name=password2 type=password required>
		</p>		
		
		<input name=submit_registration type=submit value="Sign Up">

	</fieldset>

</form>