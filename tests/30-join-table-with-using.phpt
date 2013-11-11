--TEST--
join using USING
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo2 FluentPDO */
$fluent_structure2 = new FluentStructure('%s_id', '%s_id');
$fpdo2 = new FluentPDO($pdo, $fluent_structure2);

$query = $fpdo2->from('article')
		->innerJoin('author USING (author_id)')
		->select('author.*')
		->getQuery();
echo "$query\n";

$query = $fpdo2->from('article')
		->innerJoin('author u USING (author_id)')
		->select('u.*')
		->getQuery();
echo "$query\n";

$query = $fpdo2->from('article')
		->innerJoin('author AS u USING (author_id)')
		->select('u.*')
		->getQuery();
echo "$query\n";

unset($fluent_structure2);
unset($fpdo2);

?>
--EXPECTF--
SELECT article.*, author.*
FROM article
    INNER JOIN author USING (author_id)
SELECT article.*, u.*
FROM article
    INNER JOIN author u USING (author_id)
SELECT article.*, u.*
FROM article
    INNER JOIN author AS u USING (author_id)
