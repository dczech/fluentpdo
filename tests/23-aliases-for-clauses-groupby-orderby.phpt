--TEST--
aliases for clauses: group -> groupBy, order -> orderBy
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->group('author_id')->order('id');
echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT article.*
FROM article
GROUP BY author_id
ORDER BY id
