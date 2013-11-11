--TEST--
where('column', 'value')
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->where('user_type', 'author');

echo $query->getQuery() . "\n";
print_r($query->getParameters());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE user_type = ?
Array
(
    [0] => author
)
