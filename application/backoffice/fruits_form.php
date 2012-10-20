<?php /* form injected via Ajax */

/* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

include_once FUNC . 'euro.php';

if ($action == 'update') {

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

		<p>
			<label for=name>Nome</label>
			<input id=name name=name type=text required value="<?=isset($object->name) ? $object->name : ''?>" maxlength=100>
		</p>

		<p>
			<label for=price>Prezzo</label>
			<input id=price name=price type=text value="<?=isset($object->price) ? euro($object->price, 2, false) : 0?>" size=10 maxlength=10 dir=rtl>&nbsp;&euro;
		</p>

		<p>
			<label for=is_published>Pubblicato</label>
			<input id=is_published name=is_published type=checkbox<?=empty($object->is_published) ? '' : ' checked'?>>
		</p>

		<p>
			<input name=submit type=submit value=Invio>
		</p>

	</fieldset>

	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>

</form>