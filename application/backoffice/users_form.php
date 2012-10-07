<?php /* form injected via AJAX */

/* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

include_once '../config/paths.php';
include_once FUNC . 'euro.php';

if ( $action == 'update' ) {

	include_once CFG . 'database.php';
	include_once LIB . 'db.php';

	$object_db = $db->query("SELECT * FROM `$table_name` WHERE `_id`={$id}");
	$object = $object_db->fetchObject();
	/* debug
	var_dump($object);
	//*/
}

?>

<form method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>

		<!--<legend></legend>-->

		<p class=clearfix>
			<label for=name>Nome</label>
			<input id=name name=name type=text value="<?=isset($object->name) ? $object->name : ''?>" maxlength=50>
		</p>

		<p class=clearfix>
			<label for=surname>Cognome</label>
			<input id=surname name=surname type=text value="<?=isset($object->surname) ? $object->surname : ''?>" maxlength=50>
		</p>

		<p class=clearfix>
			<label for=email>Email</label>
			<input id=email name=email type=email required value="<?=isset($object->email) ? $object->email : ''?>" size=30 maxlength=100>
		</p>

		<p class=clearfix>
			<label for=birthDate>Data di nascita</label>
			<input id=birthDate name=birthDate type=date value="<?=isset($object->birthDate) ? $object->birthDate : ''?>" maxlength=30>
		</p>

		<p class=clearfix>
			<label for=address>Indirizzo</label>
			<input id=address name=address type=text value="<?=isset($object->address) ? $object->address : ''?>" size=50 maxlength=100>
		</p>

		<p class=clearfix>
			<label for=cap>CAP</label>
			<input id=cap name=cap type=text value="<?=isset($object->cap) ? $object->cap : ''?>" size=5 maxlength=5>
		</p>

		<p class=clearfix>
			<label for=city>Provincia</label>
			<input id=city name=city type=text value="<?=isset($object->city) ? $object->city : ''?>" maxlength=50>
		</p>

		<p>
			<input name=submit type=submit value=Invio>
		</p>

	</fieldset>

	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>

</form>