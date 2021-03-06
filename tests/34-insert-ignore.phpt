--TEST--
insert ignore
--SKIPIF--
postgres does not handle INSERT IGNORE
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */
/*
$query = $fpdo->insertInto('article',
		array(
			'author_id' => 1,
			'title' => 'new title',
			'content' => 'new content',
		));

echo $query->getQuery() . "\n";
$lastInsert = $query->execute(true);
echo $lastInsert > 3 ? 'OK' : 'FAILED', "\n";
$pdo->query('DELETE FROM article WHERE id > 3')->execute();
*/
?>
--EXPECTF--
INSERT INTO article (author_id, title, content)
VALUES (1, 'new title', 'new content')
OK
