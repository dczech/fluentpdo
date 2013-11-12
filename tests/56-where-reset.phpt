--TEST--
WHERE reset
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->where('id > ?', 0)->orderBy('name');
$query = $query->where(null)->where('name = ?', 'Marek');
echo $query->getQuery() . "\n";
print_r($query->getParameters());
print_r($query->fetch());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE name = ?
ORDER BY name
Array
(
    [0] => Marek
)
Array
(
    [id] => 1
    [country_id] => 1
    [user_type] => admin
    [name] => Marek
)
