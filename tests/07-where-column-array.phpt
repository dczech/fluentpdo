--TEST--
where('column', array(..))
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->where('id', array(1,2,3));

echo $query->getQuery() . "\n";
print_r($query->getParameters());
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE id IN (1, 2, 3)
Array
(
)
