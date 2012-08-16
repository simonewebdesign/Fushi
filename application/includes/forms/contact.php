<?php
if (isset($_POST['submit'])) {

	$header = "From: ".$_POST['name']." <".$_POST['email'].">";
	
	/* mail(to,subject,message,additional_headers,additional_parameters) */
	if (!mail(MAIL_TO, $_POST['subject'], $_POST['message'], $header))
		echo "<p style='color:#800'>Il messaggio non è stato inviato. Riprovare.</p>";
	else
		echo "<p style='color:green'>Il messaggio è stato recapitato correttamente.</p>";
}
?>

<form id=contact-form method=POST action="<?=ROOT?>contatti">
	
	<fieldset><legend>Modulo contatti</legend>
	
		<p class=clearfix>
			<label for=name>Nome <span class="required asterisk" title="Questo campo è obbligatorio.">*</span></label>
			<input id=name name=name type=text required>
		</p>
		<p class=clearfix>
			<label for=email>Email <span class="required asterisk" title="L'indirizzo email è obbligatorio.">*</span></label>
			<input id=email name=email type=email required>
		</p>
		<p class=clearfix>
			<label for=subject>Oggetto</label>
			<input id=subject name=subject type=text maxlength=50>
		</p>
		<p class=clearfix>
			<label for=message>Richiesta <span class="required asterisk" title="Questo campo è obbligatorio.">*</span></label>
			<textarea id=message name=message rows=10 cols=30 required></textarea>
		</p>
		
		<input type="submit" name="submit" value="Invia Email">
		
	</fieldset>
	
</form>

<small>La informiamo che il suo indirizzo email ed eventualmente i suoi recapiti saranno utilizzati esclusivamente per rispondere alla sua richiesta, e verranno trattati secondo i termini descritti dall'Informativa sulla privacy.</small>