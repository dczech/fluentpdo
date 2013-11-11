--TEST--
multi short join
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->innerJoin('opinion:author AS opinion_author');
echo $query->getQuery() . "\n";
print_r($query->fetch());
?>
--EXPECTF--
SELECT article.*
FROM article
    INNER JOIN opinion ON opinion.article_id = article.id
    INNER JOIN author AS opinion_author ON opinion_author.id = opinion.author_id
Array
(
    [id] => 1
    [author_id] => 1
    [published_at] => 2011-12-10 12:10:00
    [title] => article 1
    [content] => content 1
)
