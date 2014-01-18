--TEST--
Basic update
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
use FluentPDO\FluentLiteral;
/* @var $fpdo FluentPDO */

$query = $fpdo->update('article')->set('published_at', new FluentLiteral('NOW()'))->where('author_id', 1);
echo $query->getQuery() . "\n";
print_r($query->getParameters()) . "\n";
?>
--EXPECTF--
UPDATE article SET published_at = NOW()
WHERE author_id = ?
Array
(
    [0] => 1
)
