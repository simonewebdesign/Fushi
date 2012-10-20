<?php /* form injected via Ajax */

/* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

if ($action == 'update') {

	include_once CFG . 'database.php';
	include_once LIB . 'db.php';

	$object_db = $db->query("SELECT * FROM `$table_name` WHERE `_id`=$id");
	$object = $object_db->fetchObject();
	/* debug
	var_dump($object);
	//*/
}

?>

<form method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>

		<legend>Impostazione</legend>

		<p>
			<label for=name>Nome</label>
			<input id=name name=name type=text required value="<?=isset($object->name) ? $object->name : ''?>" size=40 maxlength=100>
		</p>

		<p>
			<label for=value>Valore</label>
			<input id=value name=value type=text value="<?=isset($object->value) ? $object->value : ''?>" size=90 maxlength=255>
		</p>

		<p>
			<label for=group>Gruppo</label>
			<input id=group name=group type=text value="<?=isset($object->group) ? $object->group : ''?>" size=40 maxlength=100>
		</p>

		<p>
			<input name=submit type=submit value=Invio>
		</p>

	</fieldset>

	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>

</form>