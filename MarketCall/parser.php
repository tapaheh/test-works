<?php

require_once('parser' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoloader.php');

use parser\models\HtmlHtmlData;
use parser\models\HtmlHtmlParser;

$url = 'https://habr.com/ru/';
$data = new HtmlHtmlData();
$data->loadByUrl($url);

$parser = new HtmlHtmlParser($data);
$collection = $parser->parseTags();

echo 'Total tags: ' . count($collection->getAllTags());
