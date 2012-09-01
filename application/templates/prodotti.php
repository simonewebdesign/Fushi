<!-- PHP Template name: prodotti -->
			
<div id=left-column role=complementary class=left>
	<p>left-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p> 
</div>
<div id=middle-column role=main class=left>
	<h1><?=$template['h1']?></h1>
	<h2><?=$template['h2']?></h2>
	<p>These fruits are from database. Pagination is done by the Paginator2 class.</p> 	
  
  
  <?php
  
  $all_fruits = $db->query("SELECT COUNT(*) FROM fruits");
  $count = $all_fruits->fetch();
  $page = (int) (isset($get[1]) ? $get[1] : 1);  
  $elements_per_page = 20;

  $paginator = new Paginator2;
  $paginator->setElements( $count[0] );
  $paginator->setElementsPerPage($elements_per_page);
  $paginator->setPage($page);
  $paginator->setURL(ROOT . $template_name . '/$1');
  $offset = $paginator->getOffset();

  $fruits_will_paginate = $db->query("SELECT * FROM fruits LIMIT $offset, $elements_per_page");
  
  ?>
  
  <ul style="text-align:left">
  <?php
  while ($f = $fruits_will_paginate->fetchObject()) {
    echo '<li>' . $f->_id . ') ' . $f->name . '</li>';
  }
  ?>
  </ul>
  <?php
  echo $paginator->paginate();
  
  ?>

  <h4>Some info about pagination</h4>
  
  <span class="elementsDisplayed">
    <?=$paginator->getDisplayedElements()?> elementi visualizzati,
    da <?=$paginator->getElementsFrom()?> a <?=$paginator->getElementsTo()?> 
    (Totale: <?=$paginator->getElements()?>)
  </span>

  <?php if ($paginator->getPages() > 1) { ?>
  <p class="pages">Pagina <?=$page?> di <?=$paginator->getPages()?></p>
  <?php } ?>
  
</div>
<div id=right-column class=left>
	<p>right-column paragraph with <b>bold</b>, <i>italic</i> and <u>underlined</u> sample text.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nunc sed lorem condimentum ut venenatis sapien fermentum. Integer quis risus augue. Suspendisse aliquet quam id quam commodo id tristique dolor malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce in mauris a turpis tempus vulputate vitae et justo. Integer quis cursus nisi. Integer vel neque sit amet tortor facilisis pulvinar vel at nisl.</p> 	
</div>
