<?php
$articles = $db->query("SELECT *, u.name author, c.name category, COUNT(com._id) number_of_comments, a.body content
FROM ((articles a 
	INNER JOIN categories c 
		ON c._id = a.category_id 
	) INNER JOIN users u
		ON u._id = a.author_id
	) LEFT JOIN comments com
		ON a._id = com.article_id
WHERE a.is_deleted=0
GROUP BY a._id
ORDER BY a._id DESC");
while ($article = $articles->fetchObject()) {
	$article->timestamp = strtotime($article->created_at);
	$article->elapsedTime = getElapsedTime(time() - $article->timestamp);
	$article->datetime = strftime(STRFTIME_DATETIME, $article->timestamp);
	include INC . 'article.php';
}