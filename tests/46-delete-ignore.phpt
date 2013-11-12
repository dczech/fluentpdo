--TEST--
Basic delete
--SKIPIF--
postgres does not handle DELETE IGNORE
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->deleteFrom('author')
	->ignore()
	->where('id', 1);

echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
*/
?>
--EXPECTF--
DELETE IGNORE
FROM author
WHERE id = ?
Array
(
    [0] => 1
)
