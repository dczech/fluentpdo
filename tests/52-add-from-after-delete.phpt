--TEST--
add FROM after DELETE if doesn't set
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->delete('author', 'id', 1);
echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";

?>
--EXPECTF--
DELETE
FROM author
WHERE id = ?
Array
(
    [0] => 1
)
