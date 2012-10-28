<!-- PHP Template name: users -->

<div id=left-column role=complementary class=left>
	<p>left-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p>
</div>
<div id=middle-column role=main class=left>
	<h1><?=$template['h1']?></h1>
	
	<?php 
	
	if (isset($user_action)) {
		include_once APP . "users/{$user_action}.php";
	}
	
	?>

</div>
<div id=right-column class=left>
	<p>right-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p>
</div>
