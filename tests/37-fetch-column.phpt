--TEST--
fetch column
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

echo $fpdo->from('author', 1)->fetchColumn() . "\n";
echo $fpdo->from('author', 1)->fetchColumn(3) . "\n";
if ($fpdo->from('author', 3)->fetchColumn() === false) echo "false\n";
if ($fpdo->from('author', 3)->fetchColumn(3) === false) echo "false\n";

?>
--EXPECTF--
1
Marek
false
false
