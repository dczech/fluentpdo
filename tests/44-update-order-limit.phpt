--TEST--
Update with ORDER BY and LIMIT
--SKIPIF--
postgres does not handle UPDATE .. ORDER BY .. LIMIT
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->update('author')
	->set(array('user_type' => 'author'))
	->where('id', 2)
	->orderBy('name')
	->limit(1);

echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
*/
?>
--EXPECTF--
UPDATE author SET user_type = ?
WHERE id = ?
ORDER BY name
LIMIT 1
Array
(
    [0] => author
    [1] => 2
)
