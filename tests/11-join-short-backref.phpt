--TEST--
short join back reference
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->innerJoin('article:');
echo $query->getQuery() . "\n";
$query = $fpdo->from('author')->innerJoin('article: with_articles');
echo $query->getQuery() . "\n";
$query = $fpdo->from('author')->innerJoin('article: AS with_articles');
echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT author.*
FROM author
    INNER JOIN article ON article.author_id = author.id
SELECT author.*
FROM author
    INNER JOIN article AS with_articles ON with_articles.author_id = author.id
SELECT author.*
FROM author
    INNER JOIN article AS with_articles ON with_articles.author_id = author.id
