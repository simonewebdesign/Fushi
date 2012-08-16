<?php /* form injected via AJAX */

//* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

include_once '../config/paths.php';

include_once CFG . 'database.php';
include_once LIB . 'db.php';

if ( $action == 'update' ) {
	
	$object_db = $db->query("SELECT * FROM `$table_name` WHERE `_id`={$id}");
	$object = $object_db->fetchObject();
	//* debug
	var_dump($object);
	//*/
}

$attributes_names_db = $db->query("SELECT * FROM `attributes_names`");
?>

<form method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

	<fieldset>
	
		<!--<legend></legend>-->
		
		<p class=clearfix>
			<label for=name_id>Attributo</label>
			<select name=name_id>
				<option value=0>Seleziona attributo...</option>
			<?php while ( $attribute = $attributes_names_db->fetchObject() ) { ?>
				<option value=<?=$attribute->_id?><?=( isset($object->name_id) && $object->name_id == $attribute->_id ) ? ' selected' : ''?>><?=$attribute->name?></option>
			<?php } ?>		
			</select>
		</p>
		
		<p class=clearfix>
			<label for=value>Valore</label>
			<input id=value name=value type=text required value="<?=isset($object->value) ? $object->value : ''?>">
		</p>
		
		<p class=clearfix>
			<input name=submit type=submit value=Invio>
		</p>
		
	</fieldset>
	
	<!-- hidden fields -->
	<input type=hidden name=action value=<?=$action?>>
	<input type=hidden name=id value=<?=$id?>>
	<!-- USE LAST INSERTED ID WHEN CREATING A NEW RECORD -->
	<input type=hidden name=value_id  value=<?=isset($parameter_ids->value_id) ? $parameter_ids->value_id : ''?>>

</form>