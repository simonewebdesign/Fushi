<?php
$paginator = new Paginator( $table->getNumberOfRowsFromResult(), $_SESSION['rows_per_page'] );
$paginator->setPage($_SESSION['page']);
?>

<span class="elementsDisplayed"><?=$paginator->getDisplayedElements()?> elementi visualizzati, da <?=$paginator->getElementsFrom()?> a <?=$paginator->getElementsTo()?> (Totale: <?=$paginator->getElements()?>)</span>

<?php if ($paginator->getPages() > 1) { ?>
<p class="pages">Pagina <?=$_SESSION['page']?> di <?=$paginator->getPages()?></p>
<?php } ?>

<?php echo $paginator->paginateURL(ROOT . 'backoffice/' . $table_name . '/$1');