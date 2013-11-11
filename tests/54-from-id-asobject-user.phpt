--TEST--
from($table, $id) as User class
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

class User { public $id, $country_id, $user_type, $name; }
$query = $fpdo->from('author', 2)->asObject('User');

echo $query->getQuery() . "\n";
print_r($query->fetch());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE author.id = ?
User Object
(
    [id] => 2
    [country_id] => 1
    [user_type] => author
    [name] => Robert
)
