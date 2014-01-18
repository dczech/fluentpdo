<?php
error_reporting(E_ALL | E_STRICT);
include dirname(__FILE__) . "/../vendor/autoload.php";

$pdo = new PDO("pgsql:dbname=fblog", "postgres");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$fpdo = new FluentPDO($pdo);
//~ $software->debug = true;
