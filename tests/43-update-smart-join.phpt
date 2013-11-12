--TEST--
Update with smart join
--SKIPIF--
postgres does not handle UPDATE table1 JOIN table2
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->update('author')
	->set(array('user_type' => 'author'))
	->where('country.id', 1);

echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
*/
?>
--EXPECTF--
UPDATE author
    LEFT JOIN country ON country.id = author.country_id SET user_type = ?
WHERE country.id = ?
Array
(
    [0] => author
    [1] => 1
)
