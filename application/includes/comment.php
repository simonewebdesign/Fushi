<?php
$comment->karma = $comment->likes - $comment->dislikes;
?>
<div class="article-comment" id="comment-<?=$comment->id?>">
	<div></div>
	<a><?=htmlentities($comment->author)?></a>
	<time><?=secondsToHumanReadableTerm(time() - $comment->postTimestamp)?> fa - <?=$comment->postDate?>
		<span class="comment-karma" title="<?=$comment->likes?> mi piace, <?=$comment->dislikes?> non mi piace" style="<?=($comment->karma != 0) ? 'visibility:visible' : 'visibility:hidden'?>; <?=($comment->karma > 0) ? 'color:#0c0' : 'color:red'?>">
			<?=$comment->karma?>
		</span>
		<span class="thumb_mini <?=($comment->karma > 0) ? 'up' : 'down'?>" style="<?=($comment->karma != 0) ? 'visibility:visible' : 'visibility:hidden'?>"></span>	
	</time>
	<p><?=htmlentities($comment->content)?></p>
	<button class="comment-like"></button>
	<button class="comment-dislike"></button>
</div>