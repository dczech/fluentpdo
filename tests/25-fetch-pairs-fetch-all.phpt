--TEST--
fetch pairs, fetch all
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$result = $fpdo->from('author')->fetchPairs('id', 'name');
print_r($result);
$result = $fpdo->from('author')->fetchAll();
print_r($result);

?>
--EXPECTF--
Array
(
    [1] => Marek
    [2] => Robert
)
Array
(
    [0] => Array
        (
            [id] => 1
            [country_id] => 1
            [user_type] => admin
            [name] => Marek
        )

    [1] => Array
        (
            [id] => 2
            [country_id] => 1
            [user_type] => author
            [name] => Robert
        )

)
