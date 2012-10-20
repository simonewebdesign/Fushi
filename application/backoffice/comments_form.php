<?php /* form injected via Ajax */

/* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

include_once CFG . 'database.php';
include_once LIB . 'db.php';

$categories = $db->prepare("SELECT * FROM `categories` WHERE is_published=1 ORDER BY name ASC");
$categories->execute();

if ( $action == 'update' ) {

	$object_db = $db->query("SELECT * FROM `$table_name` WHERE `_id`={$id}");
	$object = $object_db->fetchObject();
	/* debug
	var_dump($object);
	//*/
}

?>

<form method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>

		<legend>Articolo</legend>

		<p>
			<label for=title>Titolo</label>
			<input id=title name=title type=text required value="<?=isset($object->title) ? $object->title : ''?>" maxlength=100>
		</p>

		<p>
			<label for=category_id>Categoria</label>
			<select id=category_id name=category_id>
				<?php while ( $category = $categories->fetchObject() ) { ?>
				<option value="<?=$category->_id?>" <?=(isset($object->category_id) && $category->_id == $object->category_id) ? 'selected' : ''?>><?=$category->name?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for=body>Contenuto</label>
			<textarea id=body name=body><?=isset($object->body) ? $object->body : ''?></textarea>
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