<!-- default template -->

<div id=left-column class=left>

<?php include_once APP . 'accounts/login.php' ?>

<?php if ($session->user_id > 0) { ?>

	<p>You are logged in.</p>

<?php } else { ?>

	<p>This is an example paragraph. Please login.<br>
	Username: <b>demo</b><br>
	Password: <b>demo</b></p>

<?php } ?>

	<p>Questo è un paragrafo d'esempio. Lorem ipsum dolor sit amet, consecutetur adipiscing elit.</p>		
</div>
<div id=middle-column class=left role=main>
	<h1><?=$template['h1']?></h1>
	<h2><?=$template['h2']?></h2>
  <p>And this is just a paragraph.</p>

	<h1>BIG HOUSE<br>PARTY</h1>
	<h2>- January 1 2013 -</h2>
	
	<?php include_once APP . 'countdown/countdown.php'; ?>

	<div>
		<h3>The new year is coming.</h3>
		<a href="<?=ROOT?>accounts/register">Sign Up NOW</a> and join<br>the biggest party ever.
	</div>	
	
</div>
<div id=right-column class=left>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed mi a sem sollicitudin
	vulputate et ac nisl. Nam vitae tincidunt mauris. Vestibulum mattis eros eget diam scelerisque
	sed faucibus est accumsan. Quisque suscipit consequat varius. Donec tristique sodales leo a
	pulvinar. Etiam id lorem quam, vitae molestie lacus. Aenean et tellus diam, a consequat nisi.
	Sed non velit ac tellus vulputate tempor.</p>
</div>