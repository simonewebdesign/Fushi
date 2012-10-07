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
			<input id=name name=name type=text required value="<?=isset($object->name) ? $object->name : ''?>" maxlength=100>
		</p>

		<p class=clearfix>
			<label for=price>Prezzo</label>
			<input id=price name=price type=text value="<?=isset($object->price) ? euro($object->price, 2, false) : 0?>" size=10 maxlength=10 dir=rtl>&nbsp;&euro;
		</p>

		<p class=clearfix>
			<label for=isPublished>Pubblicato</label>
			<input id=isPublished name=isPublished type=checkbox<?=empty($object->isPublished) ? '' : ' checked'?>>
		</p>

		<p class=clearfix>
			<input name=submit type=submit value=Invio>
		</p>

	</fieldset>

	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>

</form>