--TEST--
short join - default join is left join
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->leftJoin('author');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->leftJoin('author author');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->leftJoin('author AS author');
echo $query->getQuery() . "\n";

?>
--EXPECTF--
SELECT article.*
FROM article
    LEFT JOIN author ON author.id = article.author_id
SELECT article.*
FROM article
    LEFT JOIN author AS author ON author.id = article.author_id
SELECT article.*
FROM article
    LEFT JOIN author AS author ON author.id = article.author_id
