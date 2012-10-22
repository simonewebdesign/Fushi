<?php // var_dump($article); ?>

<article>

	<header>
		<h2><a href="<?=ROOT.'news/'.slug($article->title)?>"><?=$article->title?></a></h2>
		<time><?=$article->elapsedTime?> fa - <?=$article->datetime?></time>
	</header>
	
	<section>
		<?=$article->content?>
	</section>
	
	<footer>
		<p>Autore: <b><?=$article->author?></b></p>
		<p>Categoria: <a><?=$article->category?></a></p>
		<div>
			<a class="comment" title="Commenta"><?=$article->number_of_comments?></a>
			<a class="heart" title="Mi piace"><?=$article->likes?></a>
			<a class="skull" title="Non mi piace"><?=$article->hates?></a>
		</div>
	</footer>
	
	<div id="comments-article-id<?=$article->_id?>"></div>
	<a class="scrollTop gray-link" href="#header">Torna su</a>
	
</article>