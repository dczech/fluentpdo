--TEST--
join in where
--FILE--
<?php
include_once dirname(__FILE__) . "/connect.inc.php";
/* @var $fpdo FluentPDO */

$query = $fpdo->from('article')->groupBy('author.user_type')
		->select(null)->select('author.user_type, count(article.id) as article_count');
echo $query->getQuery() . "\n";
$result = $query->fetchAll();
print_r($result);
?>
--EXPECTF--
SELECT author.user_type, count(article.id) as article_count
FROM article
    LEFT JOIN author ON author.id = article.author_id
GROUP BY author.user_type
Array
(
    [0] => Array
        (
            [user_type] => admin
            [article_count] => 2
        )

    [1] => Array
        (
            [user_type] => author
            [article_count] => 1
        )

)
