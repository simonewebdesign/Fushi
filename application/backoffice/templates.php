<h2>Templates</h2>

<a class="action create" href="<?=ROOT?>backoffice/templates/create">Add new</a>

<?php

// 'form' string is appended just to avoid issues with $template or $template_name.

if ( isset($_POST['form_template_submit']) ) {

	$_id = (int) (isset($_POST['_id']) ? $_POST['_id'] : 0);
	$action = $_POST['action'];
	$form_template_name = isset($_POST['form_template_name']) ? trim($_POST['form_template_name']) : '';
	$form_template_title = isset($_POST['form_template_title']) ? trim($_POST['form_template_title']) : '';
	$form_template_h1 	 = isset($_POST['form_template_h1']) ? trim($_POST['form_template_h1']) : '';
	$form_template_h2 	 = isset($_POST['form_template_h2']) ? trim($_POST['form_template_h2']) : '';
	$form_template_meta_description = isset($_POST['form_template_meta_description']) ? trim($_POST['form_template_meta_description']) : '';
	$form_template_meta_keywords = isset($_POST['form_template_meta_keywords']) ? trim($_POST['form_template_meta_keywords']) : '';

	$sql_data = array(
		'_id'			=> $_id,
		'name'			=> $form_template_name,
		'title'			=> $form_template_title,
		'h1'			=> $form_template_h1,
		'h2'			=> $form_template_h2,
		'metaDescription' => $form_template_meta_description,
		'metaKeywords'	=> $form_template_meta_keywords
	);

	if ( $action == 'update' ) {
		// update (UPDATE)
		$query_string = "UPDATE templates SET name=:name, title=:title, h1=:h1, h2=:h2, metaDescription=:metaDescription, metaKeywords=:metaKeywords WHERE _id=:_id";

		$positive = "Template aggiornato (UPDATE) con successo.";
		$negative = "Errore: il template non è stato aggiornato (UPDATE). Riprova.";

	} else
	if ( $action == 'create' ) {
		// create (INSERT)
		$query_string = "INSERT INTO templates
						(name, title, h1, h2, metaDescription, metaKeywords)
						VALUES
						(:name, :title, :h1, :h2, :metaDescription, :metaKeywords)";

		$positive = "Template aggiunto (INSERT) con successo.";
		$negative = "Errore: il template non è stato aggiunto. Riprova.";

		unset($sql_data['_id']);
	}

	$statement = $db->prepare($query_string);

	if ( $statement->execute($sql_data) ) {
		$response = $positive;

		if ( $action == 'create' ) {
			/* begin creating template's files */
			$template_frontend_filename = "{$form_template_name}.php";
			$template_frontend_content = '<!-- PHP Template name: ' . $form_template_name . ' -->

<div id=left-column role=complementary class=left>
	<p>left-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p>
</div>
<div id=middle-column role=main class=left>
	<h1><?=$template[\'h1\']?></h1>
	<h2><?=$template[\'h2\']?></h2>
	<p>middle-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p>
</div>
<div id=right-column class=left>
	<p>right-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p>
</div>
';
			$template_frontend = fopen(TEMPLATE . $template_frontend_filename, 'w');
			fwrite($template_frontend, $template_frontend_content);


			$template_css_path = "css/templates/";
			$template_css_filename = "{$form_template_name}.css";
			$template_css_content = '/*** CSS Template name: ' . $form_template_name . ' ***/

@import url(\'default.css\');
#left-column {

}
#middle-column {

}
#right-column {

}';


			$template_css = fopen($template_css_path . $template_css_filename, 'w');
			fwrite($template_css, $template_css_content);
			/* end creating template's files */
		}

	} else {
		$response = $negative;
	}

}