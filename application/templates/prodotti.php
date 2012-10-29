<!-- PHP Template name: prodotti -->

<div class="container-fluid">

  <div class="navbar navbar-inverse navbar-fixed-top">
    <?php include_once INC . 'navbar.php' ?>
  </div>

  <div class="page-header">
  <h1><?=$template['h1']?> <small><?=$template['h2']?></small></h1>
  </div>

  <?php

  $all_fruits = $db->query("SELECT COUNT(*) FROM fruits");
  $count = $all_fruits->fetch();
  $page = (int) (isset($get[1]) ? $get[1] : 1);
  $elements_per_page = 20;

  $paginator = new Paginator;
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

  

  <footer>
    <p>Copyleft &copy; <?=YEAR?> <?=$settings['site']['name']?>. All rights reversed.</p>
  </footer>
  
</div>
