--TEST--
FROM table from other database
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author')
		->innerJoin('db2.user_types ON db2.user_types.id = author.user_type')
		->select('db2.user_types.*')
		->getQuery();
echo "$query\n";

?>
--EXPECTF--
SELECT author.*, db2.user_types.*
FROM author
    INNER JOIN db2.user_types ON db2.user_types.id = author.user_type
