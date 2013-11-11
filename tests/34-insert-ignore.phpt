--TEST--
insert ignore
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->insertInto('article',
		array(
			'author_id' => 1,
			'title' => 'new title',
			'content' => 'new content',
		))->ignore();

echo $query->getQuery() . "\n";

?>
--EXPECTF--
INSERT IGNORE INTO article (author_id, title, content)
VALUES (1, 'new title', 'new content')
