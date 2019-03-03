<?php

require_once('parser' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoloader.php');

use parser\models\HtmlData;
use parser\models\HtmlParser;

$url = 'https://habr.com/ru/';
$data = new HtmlData();
$data->loadByUrl($url);

$parser = new HtmlParser($data);
$collection = $parser->parseTags();

echo 'Total tags: ' . count($collection->getAllTags());
