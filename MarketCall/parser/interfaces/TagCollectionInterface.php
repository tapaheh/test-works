<?php
namespace parser\interfaces;

interface TagCollectionInterface
{
    public function getAllTags();
    public function getByTagName(string $tag);
}