--TEST--
callable arguments for FluentStructure
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$structure = new FluentStructure();
echo $structure->getForeignKey('author') . "\n";
echo $structure->getPrimaryKey('author') . "\n";
$structure = new FluentStructure('%s_id', null);
echo $structure->getForeignKey('author') . "\n";
echo $structure->getPrimaryKey('author') . "\n";

$prefix = 'prefix_';
$structure = new FluentStructure(function($table) use($prefix) {
    $table = substr($table, 0, strlen($prefix)) == $prefix ? substr($table, strlen($prefix)) : $table;
    return $table.'_id';
}, null);
echo $structure->getForeignKey($prefix.'author') . "\n";
echo $structure->getPrimaryKey($prefix.'author') . "\n";
?>
--EXPECTF--
author_id
id
author_id
author_id
author_id
author_id
