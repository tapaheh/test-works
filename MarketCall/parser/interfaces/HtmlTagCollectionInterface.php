<?php
namespace parser\interfaces;

interface HtmlTagCollectionInterface
{
    public function getAllTags();
    public function getByTagName(string $tag);
}