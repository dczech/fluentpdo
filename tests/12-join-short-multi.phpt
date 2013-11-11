--TEST--
join same two tables
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('opinion')->leftJoin('article.author');
echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT opinion.*
FROM opinion
    LEFT JOIN article ON article.id = opinion.article_id
    LEFT JOIN author ON author.id = article.author_id
