--TEST--
Basic update
--SKIPIF--
postgres does not handle UPDATE table1 JOIN table2
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->update('author')
	->outerJoin('country ON country.id = author.country_id')
	->set(array('name' => 'keraM', '`user_type`' => 'author'))
	->where('id', 1);

echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
*/
?>
--EXPECTF--
UPDATE author OUTER JOIN country ON country.id = author.country_id SET name = ?, `user_type` = ?
WHERE id = ?
Array
(
    [0] => keraM
    [1] => author
    [2] => 1
)
