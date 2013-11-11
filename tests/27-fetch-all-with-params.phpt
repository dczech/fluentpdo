--TEST--
fetch all with params
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$result = $fpdo->from('author')->fetchAll('id', 'user_type, name');
print_r($result);

?>
--EXPECTF--
Array
(
    [1] => Array
        (
            [id] => 1
            [user_type] => admin
            [name] => Marek
        )

    [2] => Array
        (
            [id] => 2
            [user_type] => author
            [name] => Robert
        )

)
