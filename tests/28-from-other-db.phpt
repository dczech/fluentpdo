--TEST--
FROM table from other database
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('db2.author')->order('db2.author.name')->getQuery();
echo "$query\n";

?>
--EXPECTF--
SELECT db2.author.*
FROM db2.author
ORDER BY db2.author.name
