--TEST--
don't create second join if table or alias was joined
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->innerJoin('author AS author ON article.author_id = author.id')
		->select('author.name');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->innerJoin('author ON article.author_id = author.id')
		->select('author.name');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->innerJoin('author AS author ON article.author_id = author.id')
		->select('author.country.name');
echo $query->getQuery() . "\n";
$query = $fpdo->from('article')->innerJoin('author ON article.author_id = author.id')
		->select('author.country.name');
echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT article.*, author.name
FROM article
    INNER JOIN author AS author ON article.author_id = author.id
SELECT article.*, author.name
FROM article
    INNER JOIN author ON article.author_id = author.id
SELECT article.*, country.name
FROM article
    INNER JOIN author AS author ON article.author_id = author.id
    LEFT JOIN country ON country.id = author.country_id
SELECT article.*, country.name
FROM article
    INNER JOIN author ON article.author_id = author.id
    LEFT JOIN country ON country.id = author.country_id
