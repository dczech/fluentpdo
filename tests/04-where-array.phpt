--TEST--
where(array(...))
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->where(array(
	'id' => 2,
	'user_type' => 'author',
));

echo $query->getQuery() . "\n";
print_r($query->getParameters());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE id = ?
    AND user_type = ?
Array
(
    [0] => 2
    [1] => author
)
