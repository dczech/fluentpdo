--TEST--
full join
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')
		->select(array('article.*', 'author.name'))
		->leftJoin('author ON author.id = article.author_id')
		->orderBy('article.title');

echo $query->getQuery() . "\n";
foreach ($query as $row) {
	echo "$row[name] - $row[title]\n";
}
?>
--EXPECTF--
SELECT article.*, author.name
FROM article
    LEFT JOIN author ON author.id = article.author_id
ORDER BY article.title
Marek - article 1
Robert - article 2
Marek - article 3
