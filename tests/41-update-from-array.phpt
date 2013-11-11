--TEST--
Basic update
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->update('author')->set(array('name' => 'keraM', '`user_type`' => 'author'))->where('id', 1);
$query->execute();
echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";

$query = $fpdo->update('author')->set(array('name' => 'Marek', '`user_type`' => 'admin'))->where('id', 1);
$query->execute();
?>
--EXPECTF--
UPDATE author SET name = ?, `user_type` = ?
WHERE id = ?
Array
(
    [0] => keraM
    [1] => author
    [2] => 1
)
