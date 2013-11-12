--TEST--
Disable and enable smart join feature
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('opinion')
		->select('author.name')
		->orderBy('article.published_at')
		->getQuery();
echo "-- Plain:\n$query\n\n";

$query = $fpdo->from('opinion')
		->select('author.name')
		->disableSmartJoin()
		->orderBy('article.published_at')
		->getQuery();
echo "-- Disable:\n$query\n\n";

$query = $fpdo->from('opinion')
		->disableSmartJoin()
		->select('author.name')
		->enableSmartJoin()
		->orderBy('article.published_at')
		->getQuery();
echo "-- Disable and enable:\n$query\n\n";

?>
--EXPECTF--
-- Plain:
SELECT author.name
FROM opinion
    LEFT JOIN author ON author.id = opinion.author_id
    LEFT JOIN article ON article.id = opinion.article_id
ORDER BY article.published_at

-- Disable:
SELECT author.name
FROM opinion
ORDER BY article.published_at

-- Disable and enable:
SELECT author.name
FROM opinion
    LEFT JOIN author ON author.id = opinion.author_id
    LEFT JOIN article ON article.id = opinion.article_id
ORDER BY article.published_at

