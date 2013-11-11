--TEST--
Query with select, group, having, order
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo
	->from('author')
	->select(null)
	->select('user_type, count(id) AS user_type_count')
	->where('id > ?', 1)
	->groupBy('user_type')
	->having('user_type_count > ?', 1)
	->orderBy('name');

echo $query->getQuery() . "\n";
?>
--EXPECTF--
SELECT user_type, count(id) AS user_type_count
FROM author
WHERE id > ?
GROUP BY user_type
HAVING user_type_count > ?
ORDER BY name
