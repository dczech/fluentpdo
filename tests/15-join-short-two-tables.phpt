--TEST--
join two tables via difference keys
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('opinion')
		->where('opinion.id', 1)
		->leftJoin('author opinion_author')->select('opinion_author.name AS opinion_name')
		->leftJoin('article.author AS article_author')->select('article_author.name AS author_name');
echo $query->getQuery() . "\n";
$result = $query->fetch();
print_r($result);

?>
--EXPECTF--
SELECT opinion.*, opinion_author.name AS opinion_name, article_author.name AS author_name
FROM opinion
    LEFT JOIN author AS opinion_author ON opinion_author.id = opinion.author_id
    LEFT JOIN article ON article.id = opinion.article_id
    LEFT JOIN author AS article_author ON article_author.id = article.author_id
WHERE opinion.id = ?
Array
(
    [id] => 1
    [article_id] => 1
    [author_id] => 2
    [content] => opinion 1.1
    [opinion_name] => Robert
    [author_name] => Marek
)
