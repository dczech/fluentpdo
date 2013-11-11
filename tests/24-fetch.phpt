--TEST--
fetch 
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

echo $fpdo->from('author', 1)->fetch('name') . "\n";
print_r($fpdo->from('author', 1)->fetch());
if ($fpdo->from('author', 3)->fetch() === false) echo "false\n";
if ($fpdo->from('author', 3)->fetch('name') === false) echo "false\n";

?>
--EXPECTF--
Marek
Array
(
    [id] => 1
    [country_id] => 1
    [user_type] => admin
    [name] => Marek
)
false
false
