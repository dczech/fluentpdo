--TEST--
join in where
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->where('opinion:content <> "" AND author.country.id = ?', 1);
echo $query->getQuery() . "\n";

?>
--EXPECTF--
SELECT article.*
FROM article
    LEFT JOIN opinion ON opinion.article_id = article.id
    LEFT JOIN author ON author.id = article.author_id
    LEFT JOIN country ON country.id = author.country_id
WHERE opinion.content <> ""
    AND country.id = ?
