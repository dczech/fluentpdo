--TEST--
from($table, $id) as stdClass
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author', 2)->asObject();

echo $query->getQuery() . "\n";
print_r($query->fetch());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE author.id = ?
stdClass Object
(
    [id] => 2
    [country_id] => 1
    [user_type] => author
    [name] => Robert
)
