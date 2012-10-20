<?php
$paginator = new Paginator;
$paginator->setElements( $table->getNumberOfRowsFromResult() );
$paginator->setElementsPerPage($_SESSION['rows_per_page']);
$paginator->setPage($_SESSION['page']);
$paginator->setURL(ROOT . $template_name . '/' . $table_name . '/$1');
?>

<span class="elementsDisplayed">
	<?=$paginator->getDisplayedElements()?> elementi visualizzati,
	da <?=$paginator->getElementsFrom()?> a <?=$paginator->getElementsTo()?>
	(Totale: <?=$paginator->getElements()?>)
</span>
	
<?php if ($paginator->getPages() > 1) { ?>
<p class="pages">Pagina <?=$_SESSION['page']?> di <?=$paginator->getPages()?></p>
<?php } ?>

<?php echo $paginator->paginate(ROOT . 'backoffice/' . $table_name . '/$1');