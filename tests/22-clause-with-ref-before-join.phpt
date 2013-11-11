--TEST--
clause with referenced table before join
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->select('author.name')->innerJoin('author');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->select('author.name')->innerJoin('author as author');
echo $query->getQuery() . "\n";
$query = $fpdo->from('author')->select('article:title')->innerJoin('article:');
echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT article.*, author.name
FROM article
    INNER JOIN author ON author.id = article.author_id
SELECT article.*, author.name
FROM article
    INNER JOIN author AS author ON author.id = article.author_id
SELECT author.*, article.title
FROM author
    INNER JOIN article ON article.author_id = author.id
