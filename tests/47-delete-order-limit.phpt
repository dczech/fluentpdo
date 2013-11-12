--TEST--
Delete with ORDER BY and LIMIT
--SKIPIF--
postgres does not handle DELETE .. ORDER BY .. LIMIT
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->deleteFrom('author')
	->where('id', 2)
	->orderBy('name')
	->limit(1);

echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
*/
?>
--EXPECTF--
DELETE
FROM author
WHERE id = ?
ORDER BY name
LIMIT 1
Array
(
    [0] => 2
)
