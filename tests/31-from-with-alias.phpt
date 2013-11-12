--TEST--
FROM with alias
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('author author')->getQuery();
echo "$query\n";
$query = $fpdo->from('author AS author')->getQuery();
echo "$query\n";
$query = $fpdo->from('author AS author', 1)->getQuery();
echo "$query\n";
$query = $fpdo->from('author AS author')->select('country.name')->getQuery();
echo "$query\n";

?>
--EXPECTF--
SELECT author.*
FROM author author
SELECT author.*
FROM author AS author
SELECT author.*
FROM author AS author
WHERE author.id = ?
SELECT country.name
FROM author AS author
    LEFT JOIN country ON country.id = author AS author.country_id
