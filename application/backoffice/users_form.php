<?php /* form injected via Ajax */

//* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

if ($action == 'update') {

	include_once CFG . 'database.php';
	include_once LIB . 'db.php';

	$object_db = $db->query("SELECT * FROM `$table_name` WHERE `_id`={$id}");
	$object = $object_db->fetchObject();
	//* debug
	var_dump($object);
	//*/
}

?>

<form method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>

		<legend>Utente</legend>

		<p>
			<label for=_id>ID</label>
			<input id=_id name=_id type=text value="<?=isset($object->_id) ? $object->_id : ''?>" size=4 disabled>
		</p>
		
		<p>
			<label for=login>Login</label>
			<input id=login name=login type=text value="<?=isset($object->login) ? $object->login : ''?>" maxlength=30>
		</p>
		
		<p>
			<label for=name>Nome</label>
			<input id=name name=name type=text value="<?=isset($object->name) ? $object->name : ''?>" maxlength=50>
		</p>

		<p>
			<label for=surname>Cognome</label>
			<input id=surname name=surname type=text value="<?=isset($object->surname) ? $object->surname : ''?>" maxlength=50>
		</p>

		<p>
			<label for=email>Email</label>
			<input id=email name=email type=email value="<?=isset($object->email) ? $object->email : ''?>" size=30 maxlength=100 required>
		</p>	

		<p>
			<label for=address>Indirizzo</label>
			<input id=address name=address type=text value="<?=isset($object->address) ? $object->address : ''?>" size=50 maxlength=100>
		</p>

		<p>
			<label for=cap>CAP</label>
			<input id=cap name=cap type=text value="<?=isset($object->cap) ? $object->cap : ''?>" size=5 maxlength=5>
		</p>

		<p>
			<label for=city>Provincia</label>
			<input id=city name=city type=text value="<?=isset($object->city) ? $object->city : ''?>" maxlength=50>
		</p>

		<p>
			<label for=bio>Biografia</label>
			<textarea id=bio name=bio><?=isset($object->bio) ? $object->bio : ''?></textarea>
		</p>
		
		<p>
			<label for=birthday>Data di nascita</label>
			<input id=birthday name=birthday type=date value="<?=isset($object->birthday) ? $object->birthday : ''?>" maxlength=30>
		</p>

		<p>
			<label for=is_admin>Amministratore</label>
			<input id=is_admin name=is_admin type=checkbox<?=empty($object->is_admin) ? '' : ' checked'?>>
		</p>		

		<p>
			<label for=password>Cambia password<br><small>(Lascia vuoto se vuoi mantenere quella attuale)</small></label>
			<input id=password name=password type=password maxlength=50>
		</p>	
		
		<p>
			<input name=submit type=submit value=Invio>
		</p>

	</fieldset>

	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>

</form>