--TEST--
where('column', null)
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')->where('user_type', null);

echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT author.*
FROM author
WHERE user_type is NULL
