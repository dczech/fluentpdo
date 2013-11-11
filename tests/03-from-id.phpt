--TEST--
from($table, $id)
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author', 2);

echo $query->getQuery() . "\n";
print_r($query->getParameters());
print_r($query->fetch());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE author.id = ?
Array
(
    [0] => 2
)
Array
(
    [id] => 2
    [country_id] => 1
    [user_type] => author
    [name] => Robert
)
