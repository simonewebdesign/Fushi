<?php /* form injected via Ajax */

/* debug
var_dump($template_name);
var_dump($table_name);
var_dump($action);
var_dump($id);
//*/

include_once DEF . 'euro.php';

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

<form class="form-horizontal" method=POST action="<?=ROOT?>backoffice/<?=$table_name?>">

  <fieldset>

    <legend>Frutto</legend>

    <div class="control-group">
      <label class="control-label" for="name">Nome</label>
      <div class="controls">
        <input type="text" id="name" name="name" placeholder="Nome" value="<?=isset($object->name) ? $object->name : ''?>" required>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="price">Prezzo</label>
      <div class="controls">
        <div class="input-append">
          <input type="text" id="price" name="price" placeholder="Prezzo" value="<?=isset($object->price) ? euro($object->price, 2, false) : 0?>" maxlength=10><span class="add-on">&euro;</span>
        </div>
      </div>
    </div>
    
    <div class="control-group">
      <div class="controls">
        <label for=is_published class="checkbox">
          <input type="checkbox" id=is_published name=is_published<?=empty($object->is_published) ? '' : ' checked'?>> Pubblicato
        </label>
        <button name=submit type="submit" class="btn">Invio</button>
      </div>
    </div>

  </fieldset>

  <!-- hidden fields -->
  <input type=hidden name=action value=<?=$action?>>
  <input type=hidden name=id value=<?=$id?>>

</form>