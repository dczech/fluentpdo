--TEST--
join in where
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->select('author.name as author');
echo $query->getQuery() . "\n";

?>
--EXPECTF--
SELECT author.name as author
FROM article
    LEFT JOIN author ON author.id = article.author_id
